<?php

namespace App\Modules\Provider\Controllers;

use Mpdf\Mpdf;
use App\Models\SamcModel;
use App\Models\ProviderModel;
use App\Models\SamcPaymentModel;
use App\Models\NotificationModel;
use App\Controllers\BaseController;
use App\Models\ExpertiseFieldModel;
use App\Models\SamcAssessmentModel;
use App\Models\CourseContentOutlineModel;
use App\Models\AssessorExpertiseFieldModel;
use CodeIgniter\Database\Exceptions\DatabaseException;

class ProviderSamcController extends BaseController
{

    protected $provider_model;
    protected $samc_model;
    protected $notification_model;
    protected $assessor_expertise_model;
    protected $expertise_model;
    protected $course_content_outline_model;
    protected $samc_assessment_model;
    protected $samc_payment_model;
    public function __construct()
    {
        $this->session = service('session');
        $this->provider_model                   = new ProviderModel();
        $this->samc_model                       = new SamcModel();
        $this->notification_model               = new NotificationModel();
        $this->assessor_expertise_model         = new AssessorExpertiseFieldModel();
        $this->expertise_model                  = new ExpertiseFieldModel();
        $this->course_content_outline_model     = new CourseContentOutlineModel();
        $this->samc_assessment_model            = new SamcAssessmentModel();
        $this->samc_payment_model               = new SamcPaymentModel();
    }

    // Handle form submission (Submit)
    // public function submitSamc()
    // {
    //     $samc_pvd_id = $this->session->get('user_id');

    //     // Validate form inputs (add your own validation rules)
    //     $validation = \Config\Services::validation();
    //     $validation->setRules([
    //         'courseName'        => 'required',
    //         'mqfLevel'          => 'required',
    //         'courseField'       => 'required',
    //         'proforma'          => 'uploaded[proforma]|max_size[proforma,50000]|mime_in[proforma,application/pdf]',
    //         'proofOfPayment'    => 'uploaded[proofOfPayment]|max_size[proofOfPayment,50000]|mime_in[proofOfPayment,application/pdf]'
    //     ]);

    //     if (!$validation->withRequest($this->request)->run()) {
    //         return $this->response->setJSON([
    //             'status' => 'error',
    //             'message' => $validation->getErrors()
    //         ]);
    //     }

    //     // Get the proforma file from the post request
    //     $file = $this->request->getFile('proforma');
    //     if ($file->isValid() && !$file->hasMoved()) {
    //         // Get the current year
    //         $currentYear = date('Y');

    //         // Generate a unique file name by appending the current year, timestamp, and original file name
    //         $newName = $currentYear . '_' . time() . '_' . $file->getName(); // Example: prepend year and append timestamp

    //         // Define the path where the file will be stored
    //         $filePath = FCPATH . 'uploads/samc_proforma/' . $currentYear . '/' . $newName; // Store file under year-based folder

    //         // Ensure the directory exists (create it if it doesn't)
    //         $directoryPath = FCPATH . 'uploads/samc_proforma/' . $currentYear;
    //         if (!is_dir($directoryPath)) {
    //             mkdir($directoryPath, 0755, true); // Create directory with appropriate permissions
    //         }

    //         // Move the uploaded file to the destination folder with the new name
    //         $file->move($directoryPath, $newName);

    //         // Store the relative path in the database
    //         $relativePath = 'uploads/samc_proforma/' . $currentYear . '/' . $newName;
    //     } else {
    //         // Handle the error, file not valid or already moved
    //         echo 'Error uploading file.';
    //     }

    //     // Get proof of payment (pop)
    //     $popfile = $this->request->getFile('proofOfPayment');

    //     // Check if the file input exists
    //     if ($popfile && $popfile->getError() === UPLOAD_ERR_NO_FILE) {
    //         // No file was uploaded
    //         $popfilePath = null;
    //     } elseif ($popfile->isValid() && !$popfile->hasMoved()) {
    //         // File is valid and hasn't been moved
    //         $currentYear = date('Y');
    //         $newPopName = $currentYear . '_' . time() . '_' . $popfile->getName();
    //         $directoryPath = FCPATH . 'uploads/samc_payment_proof/' . $currentYear;

    //         // Ensure the directory exists
    //         if (!is_dir($directoryPath)) {
    //             mkdir($directoryPath, 0755, true);
    //         }

    //         // Move the file
    //         $popfile->move($directoryPath, $newPopName);

    //         $popfilePath = 'uploads/samc_payment_proof/' . $currentYear . '/' . $newPopName;
    //     } else {
    //         // Handle errors (other than no file uploaded)
    //         echo 'Error uploading file: ' . $popfile->getErrorString();
    //         $popfilePath = null; // Optional
    //     }
    //     // Handle Submit
    //     // Code to submit the form, e.g., move draft to submitted status
    //     $data = [
    //         'samc_course_name'      => $this->request->getPost('courseName'),
    //         'samc_mqf_level'        => $this->request->getPost('mqfLevel'),
    //         'samc_field'            => $this->request->getPost('courseField'),
    //         'samc_proforma'         => $relativePath,
    //         'samc_payment_proof'    => $popfilePath,
    //         'samc_pvd_id'           => $samc_pvd_id,
    //         'samc_submit_date'      => date('Y-m-d H:i:s'),
    //         'samc_status'           => 'Submitted',
    //     ];

    //     try {
    //         $this->samc_model->insert($data);

    //         // Add notification to QVC Admin
    //         $notification_data = [
    //             'n_user_type'           => 'admin',
    //             'n_title'               => 'SAMC SUBMISSION',
    //             'n_message'             => 'A new SAMC submission has been made by ' . $this->session->get('user_name'),
    //             'n_created_at'          => date('Y-m-d H:i:s'),
    //             'n_user_id'             => 3
    //         ];

    //         $this->notification_model->insert($notification_data);
    //     } catch (\Exception $e) { // Use \Exception for broader error handling
    //         log_message('error', 'Database Error: ' . $e->getMessage()); // Log the error

    //         if (strpos($e->getMessage(), 'duplicate key value') !== false) {
    //             session()->setFlashdata('error', 'The email address is already registered.');
    //         } else {
    //             session()->setFlashdata('error', 'Error: ' . $e->getMessage()); // Display full error message
    //         }

    //         return redirect()->back()->withInput();
    //     }

    //     return $this->response->setJSON([
    //         'status' => 'success',
    //         'message' => 'Form submitted successfully.'
    //     ]);
    // }

    // public function saveSamcDraft()
    // {
    //     $samc_pvd_id = $this->session->get('user_id');

    //     // Validate form inputs (add your own validation rules)
    //     $validation = \Config\Services::validation();
    //     $validation->setRules([
    //         'courseName'        => 'required',
    //         'mqfLevel'          => 'required',
    //         'courseField'       => 'required',
    //         'proforma'          => 'uploaded[proforma]|max_size[proforma,50000]|mime_in[proforma,application/pdf]',
    //         'proofOfPayment'    => 'max_size[proofOfPayment,50000]|mime_in[proofOfPayment,application/pdf]'

    //     ]);

    //     if (!$validation->withRequest($this->request)->run()) {
    //         return $this->response->setJSON([
    //             'status' => 'error',
    //             'message' => $validation->getErrors()
    //         ]);
    //     }

    //     // Get the proforma file from the post request
    //     $file = $this->request->getFile('proforma');
    //     if ($file->isValid() && !$file->hasMoved()) {
    //         // Get the current year
    //         $currentYear = date('Y');

    //         // Generate a unique file name by appending the current year, timestamp, and original file name
    //         $newName = $currentYear . '_' . time() . '_' . $file->getName(); // Example: prepend year and append timestamp

    //         // Define the path where the file will be stored
    //         $filePath = FCPATH . 'uploads/samc_proforma/' . $currentYear . '/' . $newName; // Store file under year-based folder

    //         // Ensure the directory exists (create it if it doesn't)
    //         $directoryPath = FCPATH . 'uploads/samc_proforma/' . $currentYear;
    //         if (!is_dir($directoryPath)) {
    //             mkdir($directoryPath, 0755, true); // Create directory with appropriate permissions
    //         }

    //         // Move the uploaded file to the destination folder with the new name
    //         $file->move($directoryPath, $newName);

    //         // Store the relative path in the database
    //         $relativePath = 'uploads/samc_proforma/' . $currentYear . '/' . $newName;
    //     } else {
    //         // Handle the error, file not valid or already moved
    //         echo 'Error uploading file.';
    //     }

    //     // Get proof of payment (pop)
    //     $popfile = $this->request->getFile('proofOfPayment');

    //     // Check if the file input exists
    //     if ($popfile && $popfile->getError() === UPLOAD_ERR_NO_FILE) {
    //         // No file was uploaded
    //         $popfilePath = null;
    //     } elseif ($popfile->isValid() && !$popfile->hasMoved()) {
    //         // File is valid and hasn't been moved
    //         $currentYear = date('Y');
    //         $newPopName = $currentYear . '_' . time() . '_' . $popfile->getName();
    //         $directoryPath = FCPATH . 'uploads/samc_payment_proof/' . $currentYear;

    //         // Ensure the directory exists
    //         if (!is_dir($directoryPath)) {
    //             mkdir($directoryPath, 0755, true);
    //         }

    //         // Move the file
    //         $popfile->move($directoryPath, $newPopName);

    //         $popfilePath = 'uploads/samc_payment_proof/' . $currentYear . '/' . $newPopName;
    //     } else {
    //         // Handle errors (other than no file uploaded)
    //         echo 'Error uploading file: ' . $popfile->getErrorString();
    //         $popfilePath = null; // Optional
    //     }

    //     $data = [
    //         'samc_course_name'      => $this->request->getPost('courseName'),
    //         'samc_mqf_level'        => $this->request->getPost('mqfLevel'),
    //         'samc_field'            => $this->request->getPost('courseField'),
    //         'samc_proforma'         => $relativePath,
    //         'samc_payment_proof'    => $popfilePath,
    //         'samc_pvd_id'           => $samc_pvd_id,
    //         'samc_status'           => 'Draft',
    //     ];

    //     try {
    //         // Save username and password
    //         $this->samc_model->insert($data);
    //     } catch (DatabaseException $e) {
    //         // Handle duplicate key error
    //         if (strpos($e->getMessage(), 'duplicate key value') !== false) {
    //             session()->setFlashdata('error', 'The email address is already registered.');
    //         } else {
    //             session()->setFlashdata('error', 'An unexpected error occurred. Please try again.');
    //         }

    //         return redirect()->back()->withInput();
    //     }
    //     // dd($data);

    //     return $this->response->setJSON([
    //         'status' => 'success',
    //         'message' => 'Form has been saved as draft.'
    //     ]);
    // }

    // Fetch SAMC Data for update
    // public function fetchSamcData($id)
    // {
    //     // Fetch the SAMC data by ID
    //     $samc = $this->samc_model->find($id);

    //     if ($samc) {
    //         return $this->response->setJSON([
    //             'status' => 'success',
    //             'samc' => $samc
    //         ]);
    //     } else {
    //         return $this->response->setJSON([
    //             'status' => 'error',
    //             'message' => 'Data not found'
    //         ]);
    //     }
    // }

    // Delete SAMC Proforma
    // public function delete_samc_proforma()
    // {
    //     $samcId = $this->request->getPost('samcId');

    //     $samc = $this->samc_model->find($samcId);

    //     if ($samc && $samc->samc_proforma) {
    //         $filePath = FCPATH . $samc->samc_proforma;

    //         // Delete file from storage
    //         if (file_exists($filePath)) {
    //             unlink($filePath);
    //         }

    //         // Update database (set proforma to NULL)
    //         $this->samc_model->update($samcId, ['samc_proforma' => null]);

    //         return $this->response->setJSON([
    //             'status' => 'success',
    //             'message' => 'Form submitted successfully!',
    //             'csrf_token' => csrf_hash() // Send new CSRF token
    //         ]);
    //     }

    //     return $this->response->setJSON([
    //         'status' => 'error',
    //         'message' => 'File not found.',
    //         'csrf_token' => csrf_hash()
    //     ]);
    // }

    // public function delete_samc_proofofpayment()
    // {
    //     $samcId = $this->request->getPost('samcId');

    //     $samc = $this->samc_model->find($samcId);

    //     if ($samc && $samc->samc_payment_proof) {
    //         $filePath = FCPATH . $samc->samc_payment_proof;

    //         // Delete file from storage
    //         if (file_exists($filePath)) {
    //             unlink($filePath);
    //         }

    //         // Update database (set proforma to NULL)
    //         $this->samc_model->update($samcId, ['samc_payment_proof' => null]);

    //         return $this->response->setJSON([
    //             'status' => 'success',
    //             'message' => 'Form submitted successfully!',
    //             'csrf_token' => csrf_hash() // Send new CSRF token
    //         ]);
    //     }

    //     return $this->response->setJSON([
    //         'status' => 'error',
    //         'message' => 'File not found.',
    //         'csrf_token' => csrf_hash()
    //     ]);
    // }

    // Update SAMC Draft
    // public function updateSamcDraft()
    // {
    //     $samc_pvd_id = $this->session->get('user_id');
    //     $samc_id = $this->request->getPost('samcId');
    //     // Validate form inputs (add your own validation rules)
    //     $validation = \Config\Services::validation();
    //     $validation->setRules([
    //         'courseNameEdit'        => 'required',
    //         'mqfLevelEdit'          => 'required',
    //         'courseFieldEdit'       => 'required',
    //         'proformaEdit'          => 'max_size[proformaEdit,50000]|mime_in[proformaEdit,application/pdf]',
    //         'proofOfPaymentEdit'    => 'max_size[proofOfPaymentEdit,50000]|mime_in[proofOfPaymentEdit,application/pdf]'

    //     ]);

    //     if (!$validation->withRequest($this->request)->run()) {
    //         return $this->response->setJSON([
    //             'status' => 'error',
    //             'message' => $validation->getErrors()
    //         ]);
    //     }

    //     // Get the proforma file from the post request
    //     $file = $this->request->getFile('proformaEdit');
    //     // Check if the file input exists
    //     if ($file && $file->getError() === UPLOAD_ERR_NO_FILE) {
    //         // No file was uploaded
    //         $proformaPath = null;
    //     } elseif ($file->isValid() && !$file->hasMoved()) {
    //         // Get the current year
    //         $currentYear = date('Y');

    //         // Generate a unique file name by appending the current year, timestamp, and original file name
    //         $newName = $currentYear . '_' . time() . '_' . $file->getName(); // Example: prepend year and append timestamp

    //         // Define the path where the file will be stored
    //         $filePath = FCPATH . 'uploads/samc_proforma/' . $currentYear . '/' . $newName; // Store file under year-based folder

    //         // Ensure the directory exists (create it if it doesn't)
    //         $directoryPath = FCPATH . 'uploads/samc_proforma/' . $currentYear;
    //         if (!is_dir($directoryPath)) {
    //             mkdir($directoryPath, 0755, true); // Create directory with appropriate permissions
    //         }

    //         // Move the uploaded file to the destination folder with the new name
    //         $file->move($directoryPath, $newName);

    //         // Store the relative path in the database
    //         $proformaPath = 'uploads/samc_proforma/' . $currentYear . '/' . $newName;
    //     } else {
    //         // Handle the error, file not valid or already moved
    //         echo 'Error uploading file.';
    //     }

    //     // Get proof of payment (pop)
    //     $popfile = $this->request->getFile('proofOfPaymentEdit');

    //     // Check if the file input exists
    //     if ($popfile && $popfile->getError() === UPLOAD_ERR_NO_FILE) {
    //         // No file was uploaded
    //         $popfilePath = null;
    //     } elseif ($popfile->isValid() && !$popfile->hasMoved()) {
    //         // File is valid and hasn't been moved
    //         $currentYear = date('Y');
    //         $newPopName = $currentYear . '_' . time() . '_' . $popfile->getName();
    //         $directoryPath = FCPATH . 'uploads/samc_payment_proof/' . $currentYear;

    //         // Ensure the directory exists
    //         if (!is_dir($directoryPath)) {
    //             mkdir($directoryPath, 0755, true);
    //         }

    //         // Move the file
    //         $popfile->move($directoryPath, $newPopName);

    //         $popfilePath = 'uploads/samc_payment_proof/' . $currentYear . '/' . $newPopName;
    //     } else {
    //         // Handle errors (other than no file uploaded)
    //         echo 'Error uploading file: ' . $popfile->getErrorString();
    //         $popfilePath = null; // Optional
    //     }

    //     $data = [
    //         'samc_course_name'   => $this->request->getPost('courseNameEdit'),
    //         'samc_mqf_level'     => $this->request->getPost('mqfLevelEdit'),
    //         'samc_field'         => $this->request->getPost('courseFieldEdit'),
    //         'samc_pvd_id'        => $samc_pvd_id,
    //         'samc_status'        => 'Draft',
    //     ];

    //     // Conditionally add `samc_proforma` if not empty
    //     if (!empty($proformaPath)) {
    //         $data['samc_proforma'] = $proformaPath;
    //     }

    //     // Conditionally add `samc_payment_proof` if not empty
    //     if (!empty($popfilePath)) {
    //         $data['samc_payment_proof'] = $popfilePath;
    //     }

    //     try {
    //         // Save username and password
    //         $this->samc_model->update($samc_id, $data);

    //         $action = $this->request->getPost('action');
    //         if ($action === 'draft') {
    //             return $this->response->setJSON([
    //                 'status' => 'success',
    //                 'message' => 'Form has been saved as draft.'
    //             ]);
    //         } else {

    //             $submit_data = [
    //                 'samc_submit_date'      => date('Y-m-d H:i:s'),
    //                 'samc_status'           => 'Submitted',
    //             ];

    //             $this->samc_model->update($samc_id, $submit_data);

    //             // Add notification to QVC Admin
    //             $notification_data = [
    //                 'n_user_type'           => 'admin',
    //                 'n_title'               => 'SAMC SUBMISSION',
    //                 'n_message'             => 'A new SAMC submission has been made by ' . $this->session->get('user_name'),
    //                 'n_created_at'          => date('Y-m-d H:i:s'),
    //                 'n_user_id'             => 3
    //             ];

    //             $this->notification_model->insert($notification_data);

    //             return $this->response->setJSON([
    //                 'status' => 'success',
    //                 'message' => 'Form has been saved as Submitted.'
    //             ]);
    //         }
    //     } catch (DatabaseException $e) {
    //         // Handle duplicate key error
    //         if (strpos($e->getMessage(), 'duplicate key value') !== false) {
    //             session()->setFlashdata('error', 'The email address is already registered.');
    //         } else {
    //             session()->setFlashdata('error', 'An unexpected error occurred. Please try again.');
    //         }

    //         return redirect()->back()->withInput();
    //     }
    // }

    // Fetch SAMC Data for dougnut chart
    // Get samc x expertise bar chart
    public function getSamcExpertiseData()
    {
        $asr_id = session()->get('user_id');

        // Get all assessors expertise data
        $assessor_expertise = $this->assessor_expertise_model
            ->select('expertise_field.ef_id, expertise_field.ef_desc')
            ->join('expertise_field', 'assessor_expertise_field.aef_ef_id = expertise_field.ef_id', 'left')
            ->where('assessor_expertise_field.aef_asr_id', $asr_id)
            ->findAll();


        // Get SAMC assignments for the assessor where status is 'Checking' or 'Assessment Completed'
        $samc_assigned = $this->samc_model
            ->select('samc_ef_id, COUNT(*) as total')
            ->where('samc_asr_id', $asr_id)
            ->groupStart()
            ->where('samc_status', 'AWAITING_REVIEWER_REVIEW')  // ✅ Use `where()` first
            ->orWhere('samc_status', 'ACCEPT')
            ->orWhere('samc_status', 'ACCEPT_WITH_AMENDMENT')
            ->orWhere('samc_status', 'RETURN')
            ->groupEnd()
            ->groupBy('samc_ef_id')
            ->findAll();
        log_message('debug', 'SAMC query: ' . $this->samc_model->getLastQuery());

        // Prepare data mapping
        $samc_count_map = [];
        foreach ($samc_assigned as $samc) {
            $samc_count_map[$samc->samc_ef_id] = $samc->total; // Map field ID to count
        }

        // Prepare data for the chart
        $chartData = [];
        foreach ($assessor_expertise as $expertise) {
            $chartData[] = [
                'label' => $expertise->ef_desc,
                'value' => $samc_count_map[$expertise->ef_id] ?? 0
            ];
        }

        // Sort the data in descending order based on value
        usort($chartData, function ($a, $b) {
            return $b['value'] <=> $a['value'];
        });

        // Extract sorted labels and data
        $labels = array_column($chartData, 'label');
        $data = array_column($chartData, 'value');

        return $this->response->setJSON([
            'labels' => $labels,
            'data' => $data
        ]);
    }

    //Display SAMC------------------------------------------------------------------

    // Get SAMC information and store it in session
    public function getSamcData($samcId)
    {
        $this->session->set('samc_Id', $samcId);

        // Redirect to samcDetails page
        return redirect()->to('/provider/samcDetails');
    }

    // Display SAMC information page
    public function samcDetails()
    {
        $samcId = $this->session->get('samc_Id'); // Get stored ID from session

        if (!$samcId) {
            return redirect()->to('/assessor')->with('error', 'No SAMC ID found in session');
        }

        // Fetch SAMC details
        $samcData = $this->samc_model
            ->select('samc.*, provider.*, assessor.asr_name')  // Select columns from both tables
            ->join('qvc_upsi.provider', 'provider.pvd_id = samc.samc_pvd_id', 'left')
            ->join('qvc_upsi.assessor', 'assessor.asr_id = samc.samc_asr_id', 'left')
            ->find($samcId); // Use the stored ID to fetch data

        if ($samcData) {
            $data = ['samcData' => $samcData];

            return $this->render_provider('samc/samc_details', $data);
        } else {
            return redirect()->to('/assessor')->with('error', 'SAMC data not found');
        }
    }

    //SAMC Registration / Form------------------------------------------------------------------

    // Add Another SAMC
    public function newSamc()
    {
        $this->session->remove('samc_created_id');

        return redirect()->to('/provider/samc/samc_form_p1');
    }

    //Display SAMC Form
    public function samcFormP1()
    {
        // Get samc_id from session.
        $samc_id = $this->session->get('samc_created_id');
        $samc_pvd_id = $this->session->get('user_id');

        // Fetch Provider Information
        $provider_info = $this->provider_model->find($samc_pvd_id);

        // Fetch available field
        $samc_field = $this->assessor_expertise_model
            ->select('DISTINCT ON (aef_ef_id) aef_ef_id, ef_desc')
            ->join('qvc_upsi.expertise_field', 'expertise_field.ef_id = assessor_expertise_field.aef_ef_id', 'left')
            ->orderBy('aef_ef_id, ef_desc') // Ensures consistent selection
            ->findAll();

        $samc_data = [];
        // Check samc_id exist or not.
        if ($samc_id) {
            // fetch existing data
            $samc_data = $this->samc_model->find($samc_id);
        }
        $data = [
            'provider_info'             => $provider_info,
            'samc_field'                => $samc_field,
            'samc_data'                 => $samc_data,
        ];
        $this->render_provider('samc/new_samc_form_p1', $data);
    }

    //show samc form for every part
    public function samcFormP2()
    {
        $samc_id = $this->session->get('samc_created_id');
        // Check if samc_id exist
        if ($samc_id) {
            $samc_data = $this->samc_model->find($samc_id);
            $samc_cco_data = $this->course_content_outline_model->where('cco_samc_id', $samc_id)->findAll();

            // Fetch Samc Part 2 details
            $data = [
                'samc_data' => $samc_data,
                'samc_cco_data' => $samc_cco_data
            ];

            $this->render_provider('samc/new_samc_form_p2', $data);
        }
        // If not exist redirect user to new samc form p1
        else {
            return redirect()->to('/provider/samc/new_samc');
        }
    }

    //show samc form for every part
    public function samcFormP3()
    {
        $samc_id = $this->session->get('samc_created_id');
        // Check if samc_id exist
        if ($samc_id) {
            $samc_data = $this->samc_model->find($samc_id);
            // Fetch 
            $samc_assessment_data = $this->samc_assessment_model
                ->where('sa_samc_id', $samc_id)
                ->where('sa_type', 'continuous')
                ->findAll();

            // Fetch Samc Part 2 details
            $data = [
                'samc_data' => $samc_data,
                'samc_continuous_assessment_data' => $samc_assessment_data
            ];
            $this->render_provider('samc/new_samc_form_p3', $data);
        }
        // If not exist redirect user to new samc form p1
        else {
            return redirect()->to('/provider/samc/new_samc');
        }
    }

    //show samc form for every part
    public function samcFormP4()
    {
        $samc_id = $this->session->get('samc_created_id');
        // Check if samc_id exist
        if ($samc_id) {
            $samc_data = $this->samc_model->find($samc_id);
            // Fetch 
            $samc_assessment_data = $this->samc_assessment_model
                ->where('sa_samc_id', $samc_id)
                ->where('sa_type', 'final')
                ->findAll();
            // Fetch Samc Part 2 details
            $data = [
                'samc_data' => $samc_data,
                'samc_final_assessment_data' => $samc_assessment_data
            ];
            $this->render_provider('samc/new_samc_form_p4', $data);
        }
        // If not exist redirect user to new samc form p1
        else {
            return redirect()->to('/provider/samc/new_samc');
        }
    }

    //show samc form for every part
    public function samcFormP5()
    {
        $samc_id = $this->session->get('samc_created_id');
        // Check if samc_id exist
        if ($samc_id) {
            $samc_data = $this->samc_model->find($samc_id);

            // Fetch provider name
            $pvd_info = $this->provider_model->select('pvd_name')->where('pvd_id', $samc_data->samc_pvd_id)->first();

            // Fetch samc field
            $samc_field = $this->expertise_model->select('ef_desc')->where('ef_id', $samc_data->samc_ef_id)->first();

            // Fetch Course Outline Info
            $samc_cco_data = $this->course_content_outline_model->where('cco_samc_id', $samc_id)->findAll();

            // Fetch  continuous assessment data
            $samc_continuous_assessment_data = $this->samc_assessment_model->where('sa_samc_id', $samc_id)->where('sa_type', 'continuous')->findAll();

            // Fetch  final assessment data
            $samc_final_assessment_data = $this->samc_assessment_model->where('sa_samc_id', $samc_id)->where('sa_type', 'final')->findAll();

            // check payment status
            $payment_status_result = $this->samc_payment_model
                ->join('samc_payment_item', 'samc_payment_item.spi_sp_id = samc_payment.sp_id', 'left')
                ->where('samc_payment_item.spi_samc_id', $samc_id)
                ->where('samc_payment.sp_status', 'PAID')
                ->first();


            $payment_status = $payment_status_result ? true : false;

            // dd($samc_id);
            // Fetch Samc Part 2 details
            $data = [
                'samc_data' => $samc_data,
                'samc_cco_data' => $samc_cco_data,
                'samc_continuous_assessment_data' => $samc_continuous_assessment_data,
                'samc_final_assessment_data' => $samc_final_assessment_data,
                'pvd_name' => $pvd_info->pvd_name,
                'samc_field' => $samc_field->ef_desc,
                'payment_status' => $payment_status,
            ];

            $this->render_provider('samc/new_samc_form_p5', $data);
        }
        // If not exist redirect user to new samc form p1
        else {
            return redirect()->to('/provider/samc/new_samc');
        }
    }

    // Edit SAMC
    public function editSamcForm($samc_id)
    {
        // Store samc_id to session
        $this->session->set('samc_created_id', $samc_id);
        return redirect()->to('/provider/samc/samc_form_p1');
    }

    // Save SAMC as Draft
    public function saveAsDraftForm()
    {
        try {
            // Get samc_id from session.
            $samc_id = $this->session->get('samc_created_id');

            // Validate samc_id
            if (!$samc_id) {
                return $this->response->setJSON([
                    'status'  => 'error',
                    'message' => 'No valid SAMC ID found in session.',
                ])->setStatusCode(400); // Bad Request
            }

            // Prepare draft data
            $draft_data = [
                'samc_status'     => 'DRAFT',
                'samc_updated_at' => date('Y-m-d H:i:s'),
            ];

            // Update database and check if successful
            if ($this->samc_model->update($samc_id, $draft_data)) {
                // Remove session after successful update
                $this->session->remove('samc_created_id');

                return $this->response->setJSON([
                    'status'       => 'success',
                    'message'      => 'SAMC Information Saved!',
                    'samc_id'      => $samc_id,
                    'redirect_url' => base_url('provider/samc/my_samc'),
                ]);
            } else {
                return $this->response->setJSON([
                    'status'  => 'error',
                    'message' => 'Failed to save SAMC information. Please try again.',
                ])->setStatusCode(500); // Internal Server Error
            }
        } catch (\Exception $e) {
            // Catch any unexpected errors
            return $this->response->setJSON([
                'status'  => 'error',
                'message' => 'An error occurred: ' . $e->getMessage(),
            ])->setStatusCode(500);
        }
    }

    // Insert and Save New SAMC Form
    public function saveForm($step)
    {
        // Get samc_id from session.
        $samc_id = $this->session->get('samc_created_id');
        $samc_pvd_id = $this->session->get('user_id');

        // Check for step number
        if ($step == 1) {

            // fetch form input
            $language = $this->request->getPost('language');
            $otherLanguage = $this->request->getPost('other_language');

            // If "Other" is selected, use the input from other_language
            if ($language === "Other") {
                $language = $otherLanguage;
            }

            // check current samc _status
            $samc_current_status = $this->samc_model->select('samc_status')->where('samc_id', $samc_id);

            if (empty($samc_current_status) || empty($samc_current_status->samc_status) || $samc_current_status->samc_status == 'DRAFT') {
                $samc_status = 'DRAFT';
            } else {
                $samc_status = $samc_current_status->samc_status;
            }

            $step1_data = [
                'samc_pvd_id'                       => $samc_pvd_id,
                'samc_course_name'                  => $this->request->getPost('samc_course_name'),
                'samc_mqf_level'                    => $this->request->getPost('samc_mqf_level'),
                'samc_duration_hours'               => $this->request->getPost('samc_duration_hours'),
                'samc_language'                     => $language,
                'samc_teaching_methods'             => $this->request->getPost('samc_teaching_methods'),
                'samc_academic_credits'             => $this->request->getPost('samc_academic_credits'),
                'samc_prior_knowledge'              => $this->request->getPost('samc_prior_knowledge'),
                'samc_synopsis'                     => $this->request->getPost('samc_synopsis'),
                'samc_intended_learning_outcomes'   => $this->request->getPost('samc_intended_learning_outcomes'),
                'samc_instructor'                   => $this->request->getPost('samc_instructor'),
                'samc_ef_id'                        => $this->request->getPost('samc_ef_field'),
                'samc_status'                       => $samc_status
            ];

            //If samc_id is exist update form
            if ($samc_id) {
                // update existing database
                $this->samc_model->update($samc_id, $step1_data);

                return $this->response->setJSON([
                    'status'  => 'success',
                    'message' => 'SAMC Information Saved!',
                    'samc_id' => $samc_id,
                    'redirect_url' => base_url('provider/samc/samc_form_p2') // Redirect to another page
                ]);
            } else {
                // insert new samc into database
                $this->samc_model->insert($step1_data);
                // insert new samc into database
                $insertedID = $this->samc_model->insertID();
                // Store samc_id to session
                $this->session->set('samc_created_id', $insertedID);
                return $this->response->setJSON([
                    'status'  => 'success',
                    'message' => 'SAMC Information Saved!',
                    'samc_id' => $insertedID,
                    'redirect_url' => base_url('provider/samc/samc_form_p2')
                ]);
            }
        } elseif ($step == 2) {

            /// Fetch and delete data if it exists
            $existing_cco_data = $this->course_content_outline_model->where('cco_samc_id', $samc_id)->first();
            if ($existing_cco_data) {
                $this->course_content_outline_model->where('cco_samc_id', $samc_id)->delete();
            }

            $cco_data = $this->request->getPost('data');
            // dd($cco_data);
            if ($cco_data) {
                foreach ($cco_data as $row) {

                    $data = [
                        'cco_samc_id'                       => $samc_id,
                        'cco_desc'                          => $row['cco_desc'],
                        'cco_clo'                           => $row['cco_clo'],
                        'cco_presentation'                  => (int) $row['cco_presentation'],
                        'cco_tutorial'                      => (int) $row['cco_tutorial'],
                        'cco_practical'                     => (int) $row['cco_practical'],
                        'cco_others'                        => (int) $row['cco_others'],
                        'cco_instruction_learning_hour'     => (int) $row['cco_instruction_learning_hour'],
                        'cco_independent_learning_hour'     => (int) $row['cco_independent_learning_hour'],
                    ];
                    $this->course_content_outline_model->insert($data);
                }
            }

            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'SAMC Information Saved!',
                'samc_id' => $samc_id,
                'redirect_url' => base_url('provider/samc/samc_form_p3') // Redirect to another page
            ]);
        } elseif ($step == 3) {
            /// Fetch and delete data if it exists
            $existing_sa_data = $this->samc_assessment_model
                ->where('sa_samc_id', $samc_id)
                ->where('sa_type', 'continuous')
                ->first();
            if ($existing_sa_data) {
                $this->samc_assessment_model
                    ->where('sa_samc_id', $samc_id)
                    ->where('sa_type', 'continuous')
                    ->delete();
            }
            $sa_data = $this->request->getPost('data');

            if ($sa_data) {
                foreach ($sa_data as $row) {

                    $data = [
                        'sa_samc_id'                       => $samc_id,
                        'sa_desc'                          => $row['sa_desc'],
                        'sa_type'                          => 'continuous',
                        'sa_percentage'                    => (int) $row['sa_percentage'],
                        'sa_instruction_learning_hour'     => (int) $row['sa_instruction_learning_hour'],
                        'sa_independent_learning_hour'     => (int) $row['sa_independent_learning_hour'],
                    ];

                    $this->samc_assessment_model->insert($data);
                }
            }
            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'SAMC Information Saved!',
                'samc_id' => $samc_id,
                'redirect_url' => base_url('provider/samc/samc_form_p4') // Redirect to another page
            ]);
        } elseif ($step == 4) {
            /// Fetch and delete data if it exists
            $existing_sa_data = $this->samc_assessment_model
                ->where('sa_samc_id', $samc_id)
                ->where('sa_type', 'final')
                ->first();
            if ($existing_sa_data) {
                $this->samc_assessment_model
                    ->where('sa_samc_id', $samc_id)
                    ->where('sa_type', 'final')
                    ->delete();
            }

            $sa_data = $this->request->getPost('data');

            if ($sa_data) {
                foreach ($sa_data as $row) {

                    $data = [
                        'sa_samc_id'                       => $samc_id,
                        'sa_desc'                          => $row['sa_desc'],
                        'sa_type'                          => 'final',
                        'sa_percentage'                    => (int) $row['sa_percentage'],
                        'sa_instruction_learning_hour'     => (int) $row['sa_instruction_learning_hour'],
                        'sa_independent_learning_hour'     => (int) $row['sa_independent_learning_hour'],
                    ];

                    $this->samc_assessment_model->insert($data);
                }
            }

            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'SAMC Information Saved!',
                'samc_id' => $samc_id,
                'redirect_url' => base_url('provider/samc/samc_form_p5') // Redirect to another page
            ]);
        } elseif ($step == 5) {

            // $submit_data = [
            //     'samc_status'       => 'Submitted',
            //     'samc_submit_date'  => date('Y-m-d H:i:s'),
            //     'samc_updated_at'   => date('Y-m-d H:i:s'),

            // ];

            // $this->samc_model->update($samc_id, $submit_data);

            // // Add notification to QVC Admin
            // $notification_data = [
            //     'n_user_type'           => 'admin',
            //     'n_title'               => 'SAMC SUBMISSION',
            //     'n_message'             => 'A new SAMC submission has been made by ' . $this->session->get('user_name'),
            //     'n_created_at'          => date('Y-m-d H:i:s'),
            //     'n_type'                => 'submission',
            //     'n_user_id'             => 1
            // ];

            // $this->notification_model->insert($notification_data);

            // $this->session->remove('samc_created_id');

            // return $this->response->setJSON([
            //     'status'  => 'success',
            //     'message' => 'SAMC Information Saved!',
            //     'samc_id' => $samc_id,
            //     'redirect_url' => base_url('provider/dashboard') // Redirect to another page
            // ]);
        } else {
        }
        return $this->response->setJSON([
            'status'  => 'error',
            'message' => 'Invalid step!'
        ]);
    }

    public function submitSamcForm()
    {
        // Get samc_id from session.
        $samc_id = $this->session->get('samc_created_id');

        $submit_data = [
            'samc_status'       => 'PENDING_PAYMENT',
            'samc_submit_date'  => date('Y-m-d H:i:s'),
            'samc_updated_at'   => date('Y-m-d H:i:s'),

        ];

        $this->samc_model->update($samc_id, $submit_data);

        // Add notification to QVC Admin
        $notification_data = [
            'n_user_type'           => 'admin',
            'n_title'               => 'SAMC SUBMISSION',
            'n_message'             => 'A new SAMC submission has been made by ' . $this->session->get('user_name'),
            'n_created_at'          => date('Y-m-d H:i:s'),
            'n_type'                => 'submission',
            'n_user_id'             => 1
        ];

        $this->notification_model->insert($notification_data);

        $this->session->remove('samc_created_id');

        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'SAMC Information Saved!',
        ]);
    }

    public function resubmitSamcForm()
    {
        // Get samc_id from session.
        $samc_id = $this->session->get('samc_created_id');

        // Fetch Assessor ID
        $appId = $this->samc_model->select('samc_asr_id')->where('samc_id', $samc_id)->first();

        // check if appId is not empty
        if ($appId->samc_asr_id == null) {
            $submit_data = [
                'samc_status'               => 'AWAITING_REVIEWER_ASSIGNMENT',
                'samc_admin_remarks'        => null,
                'samc_submit_date'          => date('Y-m-d H:i:s'),
                'samc_updated_at'           => date('Y-m-d H:i:s'),
            ];

            $this->samc_model->update($samc_id, $submit_data);

            // Give Admin Notification
            $assessor_notify_data = [

                'n_user_type'           => 'admin',
                'n_title'               => 'SAMC RE-SUBMISSION',
                'n_message'             => $this->session->get('user_name') . 'Has re-submit their SAMC',
                'n_created_at'          => date('Y-m-d H:i:s'),
                'n_user_id'             => 3
            ];

            $this->notification_model->insert($assessor_notify_data);
        } else {
            $submit_data = [
                'samc_status'               => 'AWAITING_REVIEWER_REVIEW',
                'samc_admin_remarks'        => null,
                'samc_submit_date'          => date('Y-m-d H:i:s'),
                'samc_updated_at'           => date('Y-m-d H:i:s'),

            ];

            $this->samc_model->update($samc_id, $submit_data);

            // Give Assessor Notification
            $assessor_notify_data = [
                'n_user_type'           => 'assessor',
                'n_title'               => 'SAMC ASSIGNATION NOTICE',
                'n_message'             => 'A new SAMC has been assign to you by Administrator',
                'n_created_at'          => date('Y-m-d H:i:s'),
                'n_user_id'             => $appId->samc_asr_id
            ];

            $this->notification_model->insert($assessor_notify_data);
        }




        $this->session->remove('samc_created_id');

        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'SAMC Information Saved!',
        ]);
    }

    // Insert and Save New SAMC Form
    public function samcPrevForm($step)
    {
        // Get samc_id from session.
        $samc_id = $this->session->get('samc_created_id');
        $samc_pvd_id = $this->session->get('user_id');

        // Check for step number
        if ($step == 2) {

            /// Fetch and delete data if it exists
            $existing_cco_data = $this->course_content_outline_model->where('cco_samc_id', $samc_id)->first();
            if ($existing_cco_data) {
                $this->course_content_outline_model->where('cco_samc_id', $samc_id)->delete();
            }

            $cco_data = $this->request->getPost('data');
            // dd($cco_data);
            if ($cco_data) {
                foreach ($cco_data as $row) {

                    $data = [
                        'cco_samc_id'                       => $samc_id,
                        'cco_desc'                          => $row['cco_desc'],
                        'cco_clo'                           => $row['cco_clo'],
                        'cco_presentation'                  => (int) $row['cco_presentation'],
                        'cco_tutorial'                      => (int) $row['cco_tutorial'],
                        'cco_practical'                     => (int) $row['cco_practical'],
                        'cco_others'                        => (int) $row['cco_others'],
                        'cco_instruction_learning_hour'     => (int) $row['cco_instruction_learning_hour'],
                        'cco_independent_learning_hour'     => (int) $row['cco_independent_learning_hour'],
                    ];
                    $this->course_content_outline_model->insert($data);
                }
            }

            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'SAMC Information Saved!',
                'samc_id' => $samc_id,
                'redirect_url' => base_url('provider/samc/samc_form_p1') // Redirect to another page
            ]);
        } elseif ($step == 3) {
            /// Fetch and delete data if it exists
            $existing_sa_data = $this->samc_assessment_model
                ->where('sa_samc_id', $samc_id)
                ->where('sa_type', 'continuous')
                ->first();
            if ($existing_sa_data) {
                $this->samc_assessment_model
                    ->where('sa_samc_id', $samc_id)
                    ->where('sa_type', 'continuous')
                    ->delete();
            }
            $sa_data = $this->request->getPost('data');

            if ($sa_data) {
                foreach ($sa_data as $row) {

                    $data = [
                        'sa_samc_id'                       => $samc_id,
                        'sa_desc'                          => $row['sa_desc'],
                        'sa_type'                          => 'continuous',
                        'sa_percentage'                    => (int) $row['sa_percentage'],
                        'sa_instruction_learning_hour'     => (int) $row['sa_instruction_learning_hour'],
                        'sa_independent_learning_hour'     => (int) $row['sa_independent_learning_hour'],
                    ];

                    $this->samc_assessment_model->insert($data);
                }
            }
            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'SAMC Information Saved!',
                'samc_id' => $samc_id,
                'redirect_url' => base_url('provider/samc/samc_form_p2') // Redirect to another page
            ]);
        } elseif ($step == 4) {
            /// Fetch and delete data if it exists
            $existing_sa_data = $this->samc_assessment_model
                ->where('sa_samc_id', $samc_id)
                ->where('sa_type', 'final')
                ->first();
            if ($existing_sa_data) {
                $this->samc_assessment_model
                    ->where('sa_samc_id', $samc_id)
                    ->where('sa_type', 'final')
                    ->delete();
            }

            $sa_data = $this->request->getPost('data');

            if ($sa_data) {
                foreach ($sa_data as $row) {

                    $data = [
                        'sa_samc_id'                       => $samc_id,
                        'sa_desc'                          => $row['sa_desc'],
                        'sa_type'                          => 'final',
                        'sa_percentage'                    => (int) $row['sa_percentage'],
                        'sa_instruction_learning_hour'     => (int) $row['sa_instruction_learning_hour'],
                        'sa_independent_learning_hour'     => (int) $row['sa_independent_learning_hour'],
                    ];

                    $this->samc_assessment_model->insert($data);
                }
            }

            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'SAMC Information Saved!',
                'samc_id' => $samc_id,
                'redirect_url' => base_url('provider/samc/samc_form_p3') // Redirect to another page
            ]);
        } elseif ($step == 5) {
            return $this->response->setJSON([
                'status'  => 'success',
                'message' => 'SAMC Information Saved!',
                'samc_id' => $samc_id,
                'redirect_url' => base_url('provider/samc/samc_form_p4') // Redirect to another page
            ]);
        } else {
        }
        return $this->response->setJSON([
            'status'  => 'error',
            'message' => 'Invalid step!'
        ]);
    }

    // print SAMC function
    public function printSamc()
    {
        $samc_id = $this->session->get('samc_created_id');
        // Check if samc_id exist
        if ($samc_id) {
            $samc_data = $this->samc_model->find($samc_id);

            // Fetch provider name
            $pvd_info = $this->provider_model->select('pvd_name')->where('pvd_id', $samc_data->samc_pvd_id)->first();

            // Fetch samc field
            $samc_field = $this->expertise_model->select('ef_desc')->where('ef_id', $samc_data->samc_ef_id)->first();

            // Fetch Course Outline Info
            $samc_cco_data = $this->course_content_outline_model->where('cco_samc_id', $samc_id)->findAll();

            // Fetch  continuous assessment data
            $samc_continuous_assessment_data = $this->samc_assessment_model->where('sa_samc_id', $samc_id)->where('sa_type', 'continuous')->findAll();

            // Fetch  final assessment data
            $samc_final_assessment_data = $this->samc_assessment_model->where('sa_samc_id', $samc_id)->where('sa_type', 'final')->findAll();

            // Fetch Samc Part 2 details
            $data = [
                'samc_data' => $samc_data,
                'samc_cco_data' => $samc_cco_data,
                'samc_continuous_assessment_data' => $samc_continuous_assessment_data,
                'samc_final_assessment_data' => $samc_final_assessment_data,
                'pvd_name' => $pvd_info->pvd_name,
                'samc_field' => $samc_field->ef_desc,
            ];

            // Load HTML View
            $html = view('Modules\Provider\Views\samc\samc_print_template', $data);

            // Load mPDF
            $mpdf = new Mpdf();
            $mpdf->WriteHTML($html);

            // Output PDF
            return $this->response
                ->setHeader('Content-Type', 'application/pdf')
                ->setHeader('Content-Disposition', 'inline; filename="Samc_Proforma.pdf"')
                ->setBody($mpdf->Output('', 'S')); // 'S' returns PDF as a string
        }
    }

    // MY SAMC ---------------------------------------------------------------------------------------
    public function mySamc()
    {

        $pvd_id = session()->get('user_id');

        // Provider Samc Information
        $samc_info = $this->samc_model
            ->join('qvc_upsi.expertise_field', 'expertise_field.ef_id = samc.samc_ef_id', 'left')
            ->where('samc_pvd_id', $pvd_id)
            ->findAll();

        $data = [
            'samc_info' => $samc_info
        ];
        $this->render_provider('samc/my_samc', $data);
    }

    // SAMC simple view
    public function viewSamc($samcId)
    {
        $this->session->set('samc_Id', $samcId);

        // Redirect to samcDetails page
        return redirect()->to('/provider/samc/samc_simple_view');
    }

    // Display SAMC information page
    public function samcSimpleView()
    {
        $samcId = $this->session->get('samc_Id'); // Get stored ID from session

        if (!$samcId) {
            return redirect()->to('/provider/samc/my_samc')->with('error', 'No SAMC ID found in session');
        }

        $samc_data = $this->samc_model->find($samcId);

        // Fetch samc field
        $samc_field = $this->expertise_model->select('ef_desc')->where('ef_id', $samc_data->samc_ef_id)->first();

        // Fetch Course Outline Info
        $samc_cco_data = $this->course_content_outline_model->where('cco_samc_id', $samcId)->findAll();

        // Fetch  continuous assessment data
        $samc_continuous_assessment_data = $this->samc_assessment_model->where('sa_samc_id', $samcId)->where('sa_type', 'continuous')->findAll();

        // Fetch  final assessment data
        $samc_final_assessment_data = $this->samc_assessment_model->where('sa_samc_id', $samcId)->where('sa_type', 'final')->findAll();

        // Fetch Samc Part 2 details
        $data = [
            'samc_data'                         => $samc_data,
            'samc_cco_data'                     => $samc_cco_data,
            'samc_continuous_assessment_data'   => $samc_continuous_assessment_data,
            'samc_final_assessment_data'        => $samc_final_assessment_data,
            'samc_field'                        => $samc_field->ef_desc,
        ];

        // dd($data);
        // Review one and two completed
        $this->render_provider('samc/samc_simple_view', $data);
    }
}
