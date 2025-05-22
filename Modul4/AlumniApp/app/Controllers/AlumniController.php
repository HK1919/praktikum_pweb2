<?php

namespace App\Controllers;

use App\Models\AlumniModel; // Menggunakan AlumniModel yang baru dibuat

class AlumniController extends BaseController
{
  protected $alumniModel;

  public function __construct()
  {
    $this->alumniModel = new AlumniModel(); // Inisialisasi model [cite: 143]
  }

  // Menampilkan semua data alumni (Read)
  public function index()
  {
    $data['alumni'] = $this->alumniModel->orderBy('nama', 'ASC')->findAll(); // Mengambil semua data alumni [cite: 143]
    return view('alumni/index', $data); // Menampilkan view dengan data alumni
  }

  // Menampilkan form tambah data alumni (Create - Form)
  public function create()
  {
    return view('alumni/create'); // Menampilkan view form tambah [cite: 144]
  }

  // Menyimpan data alumni baru (Create - Action)
  public function store()
  {
    $data = [
      'nama'      => $this->request->getPost('nama'),
      'email'     => $this->request->getPost('email'),
      'jurusan'   => $this->request->getPost('jurusan'),
      'angkatan'  => $this->request->getPost('angkatan'),
      // Tambahkan field lain jika diperlukan
    ];

    // Simpan data menggunakan model, mirip dengan contoh store pada Modul 5 [cite: 144]
    $this->alumniModel->save($data);

    return redirect()->to('/alumni')->with('status', 'Data alumni berhasil ditambahkan!');
  }

  // Menampilkan form edit data alumni (Update - Form)
  public function edit($id)
  {
    $data['alumnus'] = $this->alumniModel->find($id); // Cari alumni berdasarkan ID
    if (empty($data['alumnus'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Alumni tidak ditemukan: ' . $id);
    }
    return view('alumni/edit', $data);
  }

  // Memperbarui data alumni (Update - Action)
  public function update($id)
  {
    $data = [
      'nama'      => $this->request->getPost('nama'),
      'email'     => $this->request->getPost('email'),
      'jurusan'   => $this->request->getPost('jurusan'),
      'angkatan'  => $this->request->getPost('angkatan'),
      // Tambahkan field lain jika diperlukan
    ];

    // Update data menggunakan model
    $this->alumniModel->update($id, $data);

    return redirect()->to('/alumni')->with('status', 'Data alumni berhasil diperbarui!');
  }

  // Menghapus data alumni (Delete)
  public function delete($id)
  {
    // Hapus data menggunakan model
    $this->alumniModel->delete($id);

    return redirect()->to('/alumni')->with('status', 'Data alumni berhasil dihapus!');
  }
}
