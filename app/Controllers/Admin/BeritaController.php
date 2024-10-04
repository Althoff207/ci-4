<?php

namespace App\Controllers\Admin;

use App\Models\BeritaModel;
use CodeIgniter\Controller;

class BeritaController extends Controller
{
    public function index()
    {
        $model = new BeritaModel();
        $data['berita'] = $model->findAll(); // Mengambil semua data berita dari database

        return view('admin/index', $data); // Mengirim data ke view
    }

    public function create()
    {
        return view('admin/create'); // View untuk menambah berita baru
    }

    public function store()
    {
        $model = new BeritaModel();
        $gambar = $this->request->getFile('gambar');

        // Pindahkan gambar ke folder public/uploads
        if ($gambar->isValid() && !$gambar->hasMoved()) {
            $gambarName = $gambar->getRandomName();
            $gambar->move(FCPATH . 'uploads', $gambarName); // Pindahkan gambar
        } else {
            return redirect()->back()->with('error', 'Gagal mengupload gambar')->withInput();
        }

        $data = [
            'gambar' => $gambarName,
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'penulis' => $this->request->getPost('penulis'),
            'jadwal' => $this->request->getPost('jadwal'),
        ];
        $model->save($data);
        session()->setFlashdata('success', 'Berita berhasil ditambahkan.');
        return redirect()->to('/admin'); // Redirect ke halaman admin setelah menyimpan
    }

    public function edit($id)
    {
        $model = new BeritaModel();
        $data['berita'] = $model->find($id); // Mengambil berita berdasarkan ID

        return view('admin/edit', $data); // Mengirim data ke view edit
    }

    public function update($id)
    {
        $model = new BeritaModel();
        $data = [
            'judul' => $this->request->getPost('judul'),
            'deskripsi' => $this->request->getPost('deskripsi'),
            'penulis' => $this->request->getPost('penulis'),
            'jadwal' => $this->request->getPost('jadwal'),
        ];

        $gambar = $this->request->getFile('gambar');
        if ($gambar && $gambar->isValid() && !$gambar->hasMoved()) {
            // Jika gambar baru diunggah, pindahkan dan simpan nama gambar
            $gambarName = $gambar->getRandomName();
            $gambar->move(FCPATH . 'uploads', $gambarName); // Pindahkan gambar
            $data['gambar'] = $gambarName;
        }

        $model->update($id, $data);
        session()->setFlashdata('success', 'Berita berhasil diupdate.');
        return redirect()->to('/admin'); // Redirect ke halaman admin setelah memperbarui
    }


    public function delete($id)
    {
        $model = new BeritaModel();
        $model->delete($id); // Menghapus berita berdasarkan ID
        session()->setFlashdata('success', 'Berita berhasil dihapus.');
        return redirect()->to('/admin'); // Redirect ke halaman admin setelah menghapus
    }
}
