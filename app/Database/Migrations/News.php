<?php
namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class News extends Migration
{
    public function up()
    {
        // Membuat kolom/field untuk tabel news
        $this->forge->addField([
            'id INT(5)',
            'title VARCHAR(255)'
        ]);

        // Membuat primary key
        $this->forge->addKey('id', TRUE);

        // Membuat tabel news
        $this->forge->createTable('news', TRUE);
    }

    //-------------------------------------------------------

    public function down()
    {
        // menghapus tabel news
        // $this->forge->dropTable('news');
    }
}