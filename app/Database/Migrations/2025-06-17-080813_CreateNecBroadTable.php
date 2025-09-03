<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateNecBroadTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'nb_id' => [
                'type'           => 'SERIAL',
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nb_code' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
            ],
            'nb_name' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
            ],
            'nb_created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'nb_updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'nb_deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('nb_id');

        // Create with schema name (ensure DB supports it, e.g. PostgreSQL)
        $this->forge->createTable('nec_broad', true, ['schema' => 'qvc_upsi']);
    }

    public function down()
    {
        $this->forge->dropTable('qvc_upsi.nec_broad', true);
    }
}
