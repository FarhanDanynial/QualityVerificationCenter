<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AdminSeeder extends Seeder
{
    public function run()
    {
        $data_admin = [
            [
                'qa_name'           => 'BAHAGIAN PENGURUSAN KUALITI',
                'qa_email'          => 'bpq@upsi.edu.my',
                'qa_start_date'     => '2017-01-01',
                'qa_expired_date'   => '2050-01-01',
                'qa_qu_id'          => '14',
                'qa_level'          => 'admin',
                'qa_verification'   => 'true',
                'qa_created_at'     => date('Y-m-d H:i:s')
            ],

            [
                'qa_name'           => 'PENGARAH BPQ',
                'qa_email'          => 'pengarah.bpq@upsi.edu.my',
                'qa_start_date'     => '2017-01-01',
                'qa_expired_date'   => '2050-01-01',
                'qa_qu_id'          => '14',
                'qa_level'          => 'super_admin',
                'qa_verification'   => 'true',
                'qa_created_at'     => date('Y-m-d H:i:s')
            ],
        ];

        $this->db->table('qvc_upsi.qvc_admin')->insertBatch($data_admin);

        $data_auth = [
            [
                'au_user_id'        => '1',
                'au_username'       => 'bpq_upsi',
                'au_password'       => '$2y$10$7rG/S2S2EK17NDSCYsvnieKPrswXyP8jLNYdC1qcSgrtPc4i0VbjK',
                'au_type'           => 'admin',
                'au_qu_id'          => '14',
                'au_created_at'     => date('Y-m-d H:i:s')
            ],

            [
                'au_user_id'        => '2',
                'au_username'       => 'pengarah_bpq',
                'au_password'       => '$2y$10$7rG/S2S2EK17NDSCYsvnieKPrswXyP8jLNYdC1qcSgrtPc4i0VbjK',
                'au_qu_id'          => '14',
                'au_type'           => 'admin',
                'au_created_at'     => date('Y-m-d H:i:s')
            ],
        ];

        $this->db->table('qvc_upsi.auth_user')->insertBatch($data_auth);
    }
}
