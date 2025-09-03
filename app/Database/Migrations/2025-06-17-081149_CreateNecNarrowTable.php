<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNecNarrowTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nn_id' => [
                'type'           => 'SERIAL',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nn_nb_id' => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'nn_code' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'nn_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'nn_created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'nn_updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'nn_deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('nn_id');
        $this->forge->addForeignKey('nn_nb_id', 'nec_broad', 'nb_id', 'CASCADE', 'CASCADE');

        $this->forge->createTable('nec_narrow', true, ['schema' => 'qvc_upsi']);
    }

    public function down()
    {
        $this->forge->dropTable('qvc_upsi.nec_narrow', true);
    }
}
