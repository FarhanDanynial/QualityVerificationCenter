<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAsrNecMappingTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'anm_id' => [
                'type'           => 'SERIAL',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'anm_asr_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'anm_nd_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'anm_created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'anm_updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'anm_deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('anm_id');
        $this->forge->addForeignKey('anm_asr_id', 'assessor', 'asr_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('anm_nd_id', 'nec_detail', 'nd_id', 'CASCADE', 'CASCADE');

        // Create the table with schema (if supported by your DB and CI4 version)
        $this->forge->createTable('asr_nec_mapping', true, ['schema' => 'qvc_upsi']);
    }

    public function down()
    {
        $this->forge->dropTable('qvc_upsi.asr_nec_mapping', true);
    }
}
