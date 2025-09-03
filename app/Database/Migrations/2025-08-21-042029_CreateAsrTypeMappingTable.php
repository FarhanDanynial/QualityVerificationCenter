<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAsrTypeMappingTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'atm_id' => [
                'type'           => 'SERIAL',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'atm_at_id' => [
                'type'       => 'INT',
                'unsigned' => true
            ],
            'atm_asr_id' => [
                'type'       => 'INT',
                'unsigned' => true
            ],
            'atm_start_date' => [
                'type'       => 'DATE',
                'null' => true,
            ],
            'atm_end_date' => [
                'type'       => 'DATE',
                'null' => true,
            ],
            'atm_created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'atm_updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'atm_deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('atm_id');
        $this->forge->addForeignKey('atm_at_id', 'asr_types', 'at_id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('atm_asr_id', 'assessor', 'asr_id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('asr_type_mapping', true, ['schema' => 'qvc_upsi']);
    }

    public function down()
    {
        $this->forge->dropTable('qvc_upsi.asr_type_mapping', true);
    }
}
