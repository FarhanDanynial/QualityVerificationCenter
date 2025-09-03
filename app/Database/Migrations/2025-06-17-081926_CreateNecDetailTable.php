<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNecDetailTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nd_id' => [
                'type'           => 'SERIAL',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nd_nn_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'nd_code' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'nd_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'nd_created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'nd_updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'nd_deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);
        $this->forge->addPrimaryKey('nd_id');
        $this->forge->addForeignKey('nd_nn_id', 'nec_narrow', 'nn_id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('nec_detail', true, ['schema' => 'qvc_upsi']);
    }

    public function down()
    {
        $this->forge->dropTable('qvc_upsi.nec_detail', true);
    }
}
