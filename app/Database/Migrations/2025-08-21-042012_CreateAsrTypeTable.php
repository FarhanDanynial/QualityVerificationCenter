<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateAsrTypeTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'at_id' => [
                'type'           => 'SERIAL',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'at_type' => [
                'type'       => 'VARCHAR',
                'constraint'   => 255,
                'null' => true,
            ],
            'at_desc' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null' => true,
            ],
            'at_created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'at_updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'at_deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('at_id');

        $this->forge->createTable('asr_types', true, ['schema' => 'qvc_upsi']);
    }

    public function down()
    {
        $this->forge->dropTable('qvc_upsi.asr_types', true);
    }
}
