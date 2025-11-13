<?php

namespace App\Modules\AppMPQUA\Controllers;

use DateTime;
use App\Models\MPQUAModel;
use CodeIgniter\I18n\Time;
use App\Models\AsrTypesModel;
use App\Models\AssessorModel;
use App\Models\NECBroadModel;
use App\Models\NECDetailModel;
use App\Models\NECNarrowModel;
use CodeIgniter\Database\RawSql;
use App\Models\AsrNECMappingModel;
use App\Controllers\BaseController;
use App\Models\AsrTypeMappingModel;
use App\Models\ExpertiseFieldModel;
use App\Models\AssessorExpertiseFieldModel;
use CodeIgniter\DataCaster\Cast\TimestampCast;

class MPQUA_UniController extends BaseController
{
    protected $assessor_model;
    protected $expertise_model;
    protected $asrNECMapping_model;
    protected $asrTypeMapping_model;
    protected $asrType_model;
    protected $NECBroad_model;
    protected $NECNarrow_model;
    protected $NECDetail_model;
    protected $assessorExpertiseModel;
    protected $MPQUA_model;

    public function __construct()
    {
        $this->assessor_model                   = new AssessorModel();
        $this->asrTypeMapping_model             = new AsrTypeMappingModel();
        $this->asrType_model                    = new AsrTypesModel();
        $this->assessorExpertiseModel           = new AssessorExpertiseFieldModel();
        $this->expertise_model                  = new ExpertiseFieldModel();
        $this->expertise_model                  = new ExpertiseFieldModel();
        $this->asrNECMapping_model              = new AsrNECMappingModel();
        $this->NECDetail_model                  = new NECDetailModel();
        $this->NECBroad_model                   = new NECBroadModel();
        $this->NECNarrow_model                  = new NECNarrowModel();
        $this->MPQUA_model                      = new MPQUAModel();
        $this->session                          = service('session');
    }

    public function createAssessor()
    {
        
        $asr_name               = $this->request->getPost('asr_name');
        $asr_qu_id              = $this->request->getPost('asr_qu_id');
        $asr_gender             = $this->request->getPost('asr_gender');
        $asr_phone              = $this->request->getPost('asr_phone');
        $asr_fax                = $this->request->getPost('asr_fax');
        $asr_email              = $this->request->getPost('asr_email');
        $asr_retirement_date    = $this->request->getPost('asr_retirement_date');
        $asr_service_address    = $this->request->getPost('asr_service_address');
        $expertise              = $this->request->getPost('expertise');
        $nec_detail_id          = $this->request->getPost('nec_detail');
        $type_id                = $this->request->getPost('asr_type_multi');
        $asr_title_desc         = $this->request->getPost('asr_title_desc');
        $atm_start_date         = $this->request->getPost('atm_start_date');
        $atm_end_date           = $this->request->getPost('atm_end_date');
        $asr_type_other_text    = $this->request->getPost('asr_type_other_text'); // <-- new

        $asr_path = null;
        $imgFile = $this->request->getFile('asr_image');
        if ($imgFile && $imgFile->isValid() && !$imgFile->hasMoved()) {
            $newImgName = uniqid('img_') . '.' . $imgFile->getExtension();
            $uploadImgPath = FCPATH . 'uploads/assessors/images/';
            if (!is_dir($uploadImgPath)) {
                mkdir($uploadImgPath, 0777, true);
            }
            $imgFile->move($uploadImgPath, $newImgName);
            $asr_path = 'uploads/assessors/images/' . $newImgName;
        }

        // --- Handle file upload ---
        $cvPath = null;
        $cvFile = $this->request->getFile('asr_cv');
        if ($cvFile && $cvFile->isValid() && !$cvFile->hasMoved()) {
            $newCvName = uniqid('cv_') . '.' . $cvFile->getExtension();
            $uploadCvPath = FCPATH . 'uploads/assessors/cv/';
            if (!is_dir($uploadCvPath)) {
                mkdir($uploadCvPath, 0777, true);
            }
            $cvFile->move($uploadCvPath, $newCvName);
            $cvPath = 'uploads/assessors/cv/' . $newCvName;
        }

        $data = [
            'asr_name'            => $asr_name,
            'asr_qu_id'           => $asr_qu_id, 
            'asr_gender'          => $asr_gender,
            'asr_phone'           => $asr_phone,
            'asr_fax'             => $asr_fax,
            'asr_email'           => $asr_email,
            'asr_service_address' => $asr_service_address,
            'asr_cv_path'         => $cvPath, // Save path to DB
            'asr_image'           => $asr_path, // Save path to DB
            'asr_title_desc'      => $asr_title_desc,
            'asr_retirement_date' => $asr_retirement_date,
        ];

        $this->assessor_model->insert($data);
        $assessor_id = $this->assessor_model->getInsertID();

        $expertise = array_filter($expertise, function ($value) {
            return trim($value) !== "";
        });

        if ($expertise && is_array($expertise)) {
            foreach ($expertise as $exp_id) {
                $expertise_data[] = [
                    'aef_asr_id' => $assessor_id,
                    'aef_ef_id'  => $exp_id
                ];
            }

            if (!empty($expertise_data)) {
                $this->assessorExpertiseModel->insertBatch($expertise_data);
            }
        }

        if (!empty($nec_detail_id)) {
            // Always treat as array for multiple support
            $nec_detail_ids = (array)$nec_detail_id;

            $nec_data = [];
            foreach ($nec_detail_ids as $nd_id) {
                if (trim($nd_id) !== "") {
                    $nec_data[] = [
                        'anm_asr_id' => $assessor_id,
                        'anm_nd_id'  => $nd_id
                    ];
                }
            }
            if (!empty($nec_data)) {
                $this->asrNECMapping_model->insertBatch($nec_data);
            }
        }

        if (!empty($type_id)) {
            $type_ids = (array)$type_id;
            
            $type_data = [];
            foreach ($type_ids as $idx => $ty_id) {
                if (trim($ty_id) !== "") {
                    $startRaw = $atm_start_date[$idx] ?? null;
                    $endRaw   = $atm_end_date[$idx] ?? null;

                    // If user selected "other", insert (or reuse) a row in asr_types and use its id
                    if ($ty_id === 'other') {
                        $otherText = isset($asr_type_other_text[$idx]) ? trim($asr_type_other_text[$idx]) : '';
                        if ($otherText === '') {
                            // skip empty other entries
                            continue;
                        }

                        // try to find existing type (exact match)
                        $existingType = $this->asrType_model->where('at_type', $otherText)->first();

                        // If not found, insert new asr_type
                        if (!$existingType) {
                            $insertData = [
                                'at_type' => $otherText,
                                'at_desc' => null,
                            ];
                            $this->asrType_model->insert($insertData);
                            $newAtId = $this->asrType_model->getInsertID();
                        } else {
                            $newAtId = $existingType->at_id;
                        }

                        // use the resolved at_id for mapping
                        $atm_at_id_val = $newAtId;
                    } else {
                        // normal existing type id
                        $atm_at_id_val = (int) $ty_id;
                    }

                    $type_data[] = [
                        'atm_asr_id' => $assessor_id,
                        'atm_at_id'  => $atm_at_id_val,
                        'atm_start_date'=> $startRaw ? date('Y-m-d', strtotime($startRaw)) : null,
                        'atm_end_date'  => $endRaw ? date('Y-m-d', strtotime($endRaw)) : null,
                    ];
                }
            }
            if (!empty($type_data)) {
                $this->asrTypeMapping_model->insertBatch($type_data);
            }
        }

        return $this->response->setJSON([
            'success' => true,
            'message' => 'Assessor added successfully.',
            'csrf_token' => csrf_hash()
        ]);
    }

}

