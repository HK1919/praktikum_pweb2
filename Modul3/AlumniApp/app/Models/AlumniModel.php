<?php

namespace App\Models;

class AlumniModel
{
    private static $alumni = [];

    public function __construct()
    {
        if (!session()->has('alumni')) {
            session()->set('alumni', [
                ['id' => 1, 'nama' => 'Haikal Kamil', 'angkatan' => 2025, 'jurusan' => 'Sistem Informasi', 'email' => 'budi@example.com', 'telepon' => '08123456789'],
                ['id' => 2, 'nama' => 'Milchatun', 'angkatan' => 2025, 'jurusan' => 'Informatika', 'email' => 'siti@example.com', 'telepon' => '08125451729']
            ]);
        }
        self::$alumni = session()->get('alumni');
    }

    public function getAlumni()
    {
        return self::$alumni;
    }

    public function getAlumniById($id)
    {
        foreach (self::$alumni as $alumni) {
            if ($alumni['id'] == $id) {
                return $alumni;
            }
        }
        return null;
    }

    public function addAlumni($data)
    {
        $data['id'] = count(self::$alumni) + 1;
        self::$alumni[] = $data;
        session()->set('alumni', self::$alumni);
    }

    public function updateAlumni($id, $data)
    {
        foreach (self::$alumni as &$alumni) {
            if ($alumni['id'] == $id) {
                $alumni = array_merge($alumni, $data); // Update alumni data
                session()->set('alumni', self::$alumni);
                return true;
            }
        }
        return false;
    }

    public function deleteAlumni($id)
    {
        foreach (self::$alumni as $key => $alumni) {
            if ($alumni['id'] == $id) {
                unset(self::$alumni[$key]); // Remove alumni
                session()->set('alumni', self::$alumni);
                return true;
            }
        }
        return false;
    }
}
