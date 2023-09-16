<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Gawe extends Migration
{
    public function up()
    // membuat tabel disini
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'date' => [
                'type'       => 'DATE',
            ],
            'info' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('gawe');
    }

    public function down()
    {
        $this->forge->dropTable('gawe');
    }
}
