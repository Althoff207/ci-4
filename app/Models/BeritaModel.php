<?php

namespace App\Models;

use CodeIgniter\Model;

class BeritaModel extends Model
{
    protected $table = 'berita'; // Nama tabel di database
    protected $primaryKey = 'id';
    protected $allowedFields = ['gambar', 'judul', 'deskripsi', 'penulis', 'jadwal'];
}
