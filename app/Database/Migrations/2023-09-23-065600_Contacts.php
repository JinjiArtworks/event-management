<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Contacts extends Migration
{
    public function up()
    // membuat tabel disini
    {
        $this->forge->addField([
            'id_contacts' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'name_contacts' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'alias_contacts' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
                'null' => true,
            ],
            'phone' => [
                'type'       => 'VARCHAR',
                'constraint' => '20',
                'null' => true,
            ],
            'email' => [
                'type'       => 'VARCHAR',
                'constraint' => '50',
            ],
            'address' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'info_contacts' => [
                'type'       => 'TEXT',
                'null' => true,
            ],
            'groups_id' => [
                'type'           => 'BIGINT',
                'constraint'     => 20,
                'unsigned'       => true,
            ],
            'created_at' => [
                'type'       => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type'       => 'DATETIME',
                'null' => true,
            ],
            'deleted_at' => [
                'type'       => 'DATETIME',
                'null' => true,
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('groups_id', 'groups', 'id','CASCADE','CASCADE');
        $this->forge->createTable('contacts');
    }

    public function down()
    {
        $this->forge->dropForeignKey('contacts','contacts_groups_id_foreign');
        $this->forge->dropTable('contacts');
    }
}
