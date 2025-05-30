<?php

namespace App\Controllers;

use App\Models\AlumniModel;
use CodeIgniter\Controller;

class AlumniController extends Controller
{
    protected $alumniModel;
    public function __construct()
    {
        $this->alumniModel = new AlumniModel();
    }
    // Method read
    public function index()
    {
        $data['alumni'] = $this->alumniModel->orderBy('id', 'ASC')->findAll();
        return view('alumni/index', $data);
    }
    // Method Tambah Alumni
    public function create()
    {
        return view('alumni/create');
    }
    // Menyimpan data alumni baru
    public function store()
    {
        $data = [
            'nim'     => $this->request->getPost('nim'),
            'nama'      => $this->request->getPost('nama'),
            'jurusan'   => $this->request->getPost('jurusan'),
            'angkatan'  => $this->request->getPost('angkatan'),
        ];

        $this->alumniModel->save($data);
        session()->setFlashdata('success', 'Data alumni berhasil ditambahkan!');
        return redirect()->to('/alumni');
    }
    // Method Edit Alumni
    public function edit($id)
    {
        $data['alumni'] = $this->alumniModel->find($id);
        if (empty($data['alumni'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Alumni dengan ID ' . $id . ' tidak ditemukan');
        }
        return view('alumni/edit', $data);
    }
    // Method Update Alumni
    public function update($id)
    {
        $data = [
            'nama'      => $this->request->getPost('nama'),
            'email'     => $this->request->getPost('email'),
            'jurusan'   => $this->request->getPost('jurusan'),
            'angkatan'  => $this->request->getPost('angkatan'),
        ];
        $this->alumniModel->update($id, $data);
        session()->setFlashdata('success', 'Data alumni berhasil diperbarui!');
        return redirect()->to('/alumni');
    }
    // Method delete alumni
    public function delete($id)
    {
        $this->alumniModel->delete($id);
        return redirect()->to('/alumni');
    }
}
