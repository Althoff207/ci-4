<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BeritaModel; // Tambahkan ini untuk menggunakan BeritaModel
use CodeIgniter\HTTP\ResponseInterface;

class User extends BaseController
{
    public function index()
    {
        return view('user/index');
    }

    public function catalog()
    {
        $beritaModel = new BeritaModel();
        $data['berita'] = $beritaModel->findAll(); // Mengambil semua data berita

        return view('user/catalog', $data); // Mengirim data berita ke view catalog.php
    }
}
