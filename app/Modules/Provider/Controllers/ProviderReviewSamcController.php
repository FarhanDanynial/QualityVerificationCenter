<?php

namespace App\Modules\Provider\Controllers;

use Mpdf\Mpdf;
use App\Models\SamcModel;
use App\Models\ProviderModel;
use App\Models\SamcReviewModel;
use App\Models\SamcPaymentModel;
use App\Models\NotificationModel;
use App\Controllers\BaseController;
use App\Models\ExpertiseFieldModel;
use App\Models\SamcAssessmentModel;
use App\Models\CourseContentOutlineModel;
use App\Models\AssessorExpertiseFieldModel;
use CodeIgniter\Database\Exceptions\DatabaseException;

class ProviderReviewSamcController extends BaseController
{

    protected $provider_model;
    protected $samc_model;
    protected $notification_model;
    protected $assessor_expertise_model;
    protected $expertise_model;
    protected $course_content_outline_model;
    protected $samc_assessment_model;
    protected $samc_payment_model;
    protected $samc_review;

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
        $this->samc_review                      = new SamcReviewModel();
    }


    //Display SAMC------------------------------------------------------------------

    // Get SAMC information and store it in session
    public function getSamcReviewResult($samcId)
    {
        $this->session->set('samc_Id', $samcId);

        // Redirect to samcDetails page
        return redirect()->to('/provider/review_samc/samc_review_details');
    }

    // Display SAMC information page
    public function samcReviewDetails()
    {
        $samcId = $this->session->get('samc_Id'); // Get stored ID from session

        if (!$samcId) {
            return redirect()->to('/provider/samc/my_samc')->with('error', 'No SAMC ID found in session');
        }

        $samc_data = $this->samc_model->find($samcId);

        /* Fetch review data
        Indicator
        First time review - Review 1
        0 - Review Draft
        1 - Review Submitted

        Second time review - Review 2
        2 - Review Draft
        3 - Review Submitted
        */
        $reviews_1 = $this->samc_review
            ->where('sr_samc_id', $samcId)
            ->whereIn('sr_counter', ['1'])
            ->first();

        $reviews_2 = [];

        if ($reviews_1 && $reviews_1->sr_counter == 1) {
            // Fetch review 2
            $reviews_2 = $this->samc_review
                ->where('sr_samc_id', $samcId)
                ->whereIn('sr_counter', ['3'])
                ->first();
        }

        // Fetch Samc Part 2 details
        $data = [
            'samc_data'                         => $samc_data,
            'reviews_1'                         => $reviews_1,
            'reviews_2'                         => $reviews_2,
        ];

        // dd($data);
        // Review one and two completed
        $this->render_provider('samc_review/view_review_result', $data);
    }
}
