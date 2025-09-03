<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateMpqUATable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'mpq_id' => [
                'type'           => 'SERIAL',   // INT + auto-increment in PostgreSQL
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'mpq_address' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'mpq_email' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
            ],
            'mpq_phone' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'mpq_fax' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'null'       => true,
            ],
            'mpq_qu_id' => [
                'type'       => 'INT',
                'null'       => true,
            ],
            'mpq_image' => [
                'type'          => 'VARCHAR',   // INT + auto-increment in PostgreSQL
                'constraint'    => 255,
                'null'          => true,
            ],

            // Timestamps for soft deletes
            'mpq_created_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'mpq_updated_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
            'mpq_deleted_at' => [
                'type' => 'TIMESTAMP',
                'null' => true,
            ],
        ]);

        $this->forge->addPrimaryKey('mpq_id');
        $this->forge->createTable('mpqua', true, ['schema' => 'qvc_upsi']);
    }

    public function down()
    {
        $this->db->setDatabase('qvc_upsi');   // ensure the same schema
        $this->forge->dropTable('mpqua', true);
    }
}
