<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class TblDepartamentos extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint'     => 15,
                'unsigned' => true,
                'auto_increment' => true,
            ],
            'nombre' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'area' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],
            'updated_at'    => [
                'type'  => 'datetime',
                'null'  => true,
            ],
            
            'created_at datetime default current_timestamp',
        ]);
        $this->forge->addPrimaryKey('id');
        $this->forge->createTable('tbl_departamentos');
    }

    public function down()
    {
        $this->forge->dropTable('tbl_departamentos');
    }
}
