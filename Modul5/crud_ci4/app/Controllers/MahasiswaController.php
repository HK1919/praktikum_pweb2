<?php

namespace App\Controllers;

use App\Models\MahasiswaModel;
use CodeIgniter\Controller;

class MahasiswaController extends Controller
{
  protected $mahasiswaModel;

  public function __construct()
  {
    $this->mahasiswaModel = new MahasiswaModel();
  }
  public function index()
  {
    $data['mahasiswa'] = $this->mahasiswaModel->findAll();
    return view('mahasiswa/index', $data);
  }

  public function create()
  {
    return view('mahasiswa/create');
  }
  public function store()
  {
    $validation = \Config\Services::validation();

    // Aturan validasi
    $rules = [
      'nama' => 'required|min_length[3]',
      'email' => 'required|valid_email|is_unique[mahasiswa.email]'
    ];

    if (!$this->validate($rules)) {
      return redirect()->back()->withInput()->with('validation', $validation);
    }

    $this->mahasiswaModel->save([
      'nama' => $this->request->getPost('nama'),
      'email' => $this->request->getPost('email'),
    ]);

    return redirect()->to('/mahasiswa');
  }


  // Method untuk menampilkan form edit
  public function edit($id)
  {
    $data['mahasiswa'] = $this->mahasiswaModel->find($id);
    if (empty($data['mahasiswa'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Data Mahasiswa Tidak Ditemukan: ' . $id);
    }
    return view('mahasiswa/edit', $data);
  }

  // Method update
  public function update($id)
  {
    $validation = \Config\Services::validation();

    // Aturan validasi (email tidak wajib unik jika milik sendiri)
    $rules = [
      'nama' => 'required|min_length[3]',
      'email' => "required|valid_email|is_unique[mahasiswa.email,id,{$id}]"
    ];

    if (!$this->validate($rules)) {
      return redirect()->back()->withInput()->with('validation', $validation);
    }

    $this->mahasiswaModel->update($id, [
      'nama' => $this->request->getPost('nama'),
      'email' => $this->request->getPost('email'),
    ]);

    return redirect()->to('/mahasiswa');
  }


  // Method Delete
  public function delete($id = null)
  {
    $mahasiswa = $this->mahasiswaModel->find($id);

    if ($mahasiswa) {
      if ($this->mahasiswaModel->delete($id)) {
        session()->setFlashdata('message', 'Data mahasiswa berhasil dihapus.');
      } else {
        session()->setFlashdata('message', 'Gagal menghapus data mahasiswa.');
      }
    } else {
      session()->setFlashdata('message', 'Data mahasiswa tidak ditemukan untuk dihapus.');
    }

    return redirect()->to('/mahasiswa');
  }
}
