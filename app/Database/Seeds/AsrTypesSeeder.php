<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AsrTypesSeeder extends Seeder
{
    public function run()
    {
        $data_types = [
            ['at_id' => '1',   'at_type' => 'MQA',    'at_desc' => 'Malaysian Qualifications Agency'],
            ['at_id' => '2',   'at_type' => 'SWA',    'at_desc' => 'Swaakreditasi'],
        ];

        // Insert data into the database
        $this->db->table('qvc_upsi.asr_types')->insertBatch($data_types);
    }
}
