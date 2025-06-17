<?php

namespace App\Modules\Provider\Controllers;

use App\Models\ProviderModel;
use App\Controllers\BaseController;

class ProviderProfileController extends BaseController
{

    protected $provider_model;

    public function __construct()
    {
        $this->session = service('session');
        $this->provider_model                 = new ProviderModel();
    }

    public function profile()
    {
        $pvd_id = session()->get('user_id');

        // Fecth user data
        $provider_info = $this->provider_model->where('pvd_id', $pvd_id)->first();

        // Get provider details from the session
        $data = [
            'provider_info' => $provider_info,
        ];
        $this->render_provider('profile/view_profile', $data);
    }

    public function updateProfile()
    {
        try {
            $pvd_id = session()->get('user_id');

            if (!$pvd_id) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'User not authenticated.'
                ])->setStatusCode(401);
            }

            $pvd_phone   = $this->request->getPost('pvd_phone');
            $pvd_email   = $this->request->getPost('pvd_email');
            $pvd_address = $this->request->getPost('pvd_location');

            // Validate inputs
            if (empty($pvd_phone) || empty($pvd_email) || empty($pvd_address)) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'All fields are required.'
                ])->setStatusCode(400);
            }

            if (!filter_var($pvd_email, FILTER_VALIDATE_EMAIL)) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Invalid email format.'
                ])->setStatusCode(400);
            }

            // Update main profile info
            $provider_info = [
                'pvd_phone'   => $pvd_phone,
                'pvd_email'   => $pvd_email,
                'pvd_address' => $pvd_address,
            ];

            if (!$this->provider_model->update($pvd_id, $provider_info)) {
                return $this->response->setJSON([
                    'success' => false,
                    'message' => 'Failed to update profile. Please try again.'
                ])->setStatusCode(500);
            }

            return $this->response->setJSON([
                'success' => true,
                'message' => 'Profile updated successfully.'
            ]);
        } catch (\Exception $e) {
            return $this->response->setJSON([
                'success' => false,
                'message' => 'An error occurred: ' . $e->getMessage()
            ])->setStatusCode(500);
        }
    }
}
