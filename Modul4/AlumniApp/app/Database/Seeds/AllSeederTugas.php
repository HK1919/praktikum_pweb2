<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time; // Untuk created_at, updated_at, dan tanggal_post
class AllSeederTugas extends Seeder
{
    public function run()
    {
        $now = Time::now()->toDateTimeString();
        // 1. Tabel alumni
        $alumniData = [
            [
                'id'            => 1,
                'nama'          => 'Haikal Kamil',
                'email'         => 'haikalkamil@example.com',
                'password'      => password_hash('password123', PASSWORD_DEFAULT),
                'jurusan'       => 'Sistem Informasi',
                'no_hp'         => '081234567890',
                'alamat'        => 'Jl. Percobaan No.123, Konoha',
                'angkatan'      => '2023',
                'foto_profil'   => 'haikal.png',
                'created_at'    => $now,
                'updated_at'    => $now,
            ],
            [
                'id'            => 2,
                'nama'          => 'Khalisa Bilkis',
                'email'         => 'khalisabilkis@example.com',
                'password'      => password_hash('password456', PASSWORD_DEFAULT),
                'jurusan'       => 'Desain Komunikasi Visual',
                'no_hp'         => '081234567891',
                'alamat'        => 'Jl. Bagus No.456, Wakanda',
                'angkatan'      => '2023',
                'foto_profil'   => 'khalisa.png',
                'created_at'    => $now,
                'updated_at'    => $now,
            ],
        ];
        $this->db->table('alumni')->insertBatch($alumniData);

        // 2. Tabel pendidikan
        $pendidikanData = [
            [
                'alumni_id'     => 1,
                'tingkat'       => 'SMA',
                'institusi'     => 'SMAN 1 Kadugede',
                'jurusan'       => 'IPA',
                'tahun_masuk'   => '2019',
                'tahun_lulus'   => '2022',
            ],
            [
                'alumni_id'     => 1,
                'tingkat'       => 'MTsN',
                'institusi'     => 'MTsN 5 Kuningan',
                'jurusan'       => null,
                'tahun_masuk'   => '2016',
                'tahun_lulus'   => '2019',
            ],
            [
                'alumni_id'     => 2,
                'tingkat'       => 'SMA',
                'institusi'     => 'SMAN 2 Kuningan',
                'jurusan'       => 'IPA',
                'tahun_masuk'   => '2019',
                'tahun_lulus'   => '2022',
            ],
            [
                'alumni_id'     => 2,
                'tingkat'       => 'MTsN',
                'institusi'     => 'MTsN 5 Kuningan',
                'jurusan'       => null,
                'tahun_masuk'   => '2016',
                'tahun_lulus'   => '2019',
            ],
        ];
        $this->db->table('pendidikan')->insertBatch($pendidikanData);


        // 3. Tabel pekerjaan
        $pekerjaanData = [
            [
                'alumni_id'     => 1,
                'perusahaan'    => 'PT. Kode Nusantara',
                'posisi'        => 'Software Engineer',
                'tahun_masuk'   => '2022',
                'tahun_keluar'  => null,
                'lokasi'        => 'Jakarta Selatan',
                'deskripsi'     => 'Mengembangkan dan memelihara aplikasi berbasis web dan mobile.',
            ],
            [
                'alumni_id'     => 2,
                'perusahaan'    => 'CV. Data Analitika Prima',
                'posisi'        => 'Junior Data Analyst',
                'tahun_masuk'   => '2023',
                'tahun_keluar'  => null,
                'lokasi'        => 'Bandung',
                'deskripsi'     => 'Menganalisis data penjualan dan membuat laporan.',
            ],
        ];
        $this->db->table('pekerjaan')->insertBatch($pekerjaanData);

        // 4. Tabel prestasi
        $prestasiData = [
            [
                'alumni_id'     => 1,
                'nama_prestasi' => 'Juara 1 Lomba Web Design Nasional',
                'tingkat'       => 'Nasional',
                'tahun'         => '2021',
                'deskripsi'     => 'Diselenggarakan oleh KEMKOMINFO.',
            ],
            [
                'alumni_id'     => 2,
                'nama_prestasi' => 'Mahasiswa Berprestasi Fakultas',
                'tingkat'       => 'Fakultas',
                'tahun'         => '2022',
                'deskripsi'     => 'Penghargaan atas IPK tertinggi dan keaktifan organisasi.',
            ],
        ];
        $this->db->table('prestasi')->insertBatch($prestasiData);

        // 5. Tabel organisasi
        $organisasiData = [
            [
                'alumni_id'       => 1,
                'nama_organisasi' => 'Paguyuban Barudak Komputer (PBK)',
                'posisi'          => 'Anggota Divisi Internal',
                'tahun_masuk'     => '2019',
                'tahun_keluar'    => '2021',
                'deskripsi'       => 'Menjaga Keharmonisan antar anggota.',
            ],
            [
                'alumni_id'       => 2,
                'nama_organisasi' => 'Badan Eksekutif Mahasiswa (BEM)',
                'posisi'          => 'Staf Departemen Sosial Masyarakat',
                'tahun_masuk'     => '2020',
                'tahun_keluar'    => '2022',
                'deskripsi'       => 'Terlibat dalam kegiatan bakti sosial dan pengabdian masyarakat.',
            ],
        ];
        $this->db->table('organisasi')->insertBatch($organisasiData);

        // 6. Tabel kontribusi
        $kontribusiData = [
            [
                'alumni_id'        => 1,
                'jenis_kontribusi' => 'Donasi Pembangunan Laboratorium Komputer',
                'deskripsi'        => 'Sumbangan sebesar Rp 5.000.000 untuk upgrade fasilitas lab.',
                'tanggal'          => '2024-01-15',
            ],
            [
                'alumni_id'        => 2,
                'jenis_kontribusi' => 'Menjadi Mentor Program Beasiswa Alumni',
                'deskripsi'        => 'Membimbing 2 mahasiswa penerima beasiswa angkatan 2023.',
                'tanggal'          => '2024-03-01',
            ],
        ];
        $this->db->table('kontribusi')->insertBatch($kontribusiData);

        // 7. Tabel berita_alumni
        $beritaAlumniData = [
            [
                'id'           => 1,
                'alumni_id'    => 1,
                'judul'        => 'Haikal Kamil Raih Penghargaan Inovasi Teknologi di Silicon Valley',
                'isi'          => 'Alumni Sistem Informasi 2023, Haikal Kamil, berhasil meraih penghargaan bergengsi atas inovasi startupnya di bidang AI...',
                'tanggal_post' => $now,
            ],
            [
                'id'           => 2,
                'alumni_id'    => null,
                'judul'        => 'Reuni Akbar Alumni Semua Angkatan Akan Segera Digelar!',
                'isi'          => 'Ikatan Alumni akan mengadakan Reuni Akbar pada tanggal 20 Desember 2025. Informasi pendaftaran dan detail acara akan diumumkan lebih lanjut...',
                'tanggal_post' => $now,
            ],
        ];
        $this->db->table('berita_alumni')->insertBatch($beritaAlumniData);

        // 8. Tabel forum_diskusi
        $forumDiskusiData = [
            [
                'id'           => 1,
                'alumni_id'    => 1,
                'judul'        => 'Diskusi: Tren Karir di Bidang Software Engineering 2025',
                'isi'          => 'Halo rekan-rekan alumni, mari kita diskusikan mengenai tren terkini dan prospek karir di bidang software engineering untuk tahun 2025. Skill apa saja yang paling dicari?',
                'tanggal_post' => $now,
            ],
            [
                'id'           => 2,
                'alumni_id'    => 2,
                'judul'        => 'Tips & Trik Lolos Wawancara Kerja di Perusahaan Big Tech',
                'isi'          => 'Bagi yang sudah berpengalaman atau baru mau mencoba, yuk share tips dan trik untuk bisa lolos tahapan wawancara di perusahaan teknologi besar!',
                'tanggal_post' => $now,
            ],
        ];
        $this->db->table('forum_diskusi')->insertBatch($forumDiskusiData);

        // 9. Tabel komentar_forum
        $komentarForumData = [
            [
                'forum_id'     => 1,
                'alumni_id'    => 2,
                'komentar'     => 'Menurut saya, penguasaan cloud computing dan DevOps akan sangat penting. Bagaimana menurut yang lain?',
                'tanggal_post' => $now,
            ],
            [
                'forum_id'     => 2,
                'alumni_id'    => 1,
                'komentar'     => 'Untuk Big Tech, problem-solving skill dan pemahaman algoritma dasar biasanya jadi kunci di tahap awal. Latihan di platform seperti LeetCode sangat membantu.',
                'tanggal_post' => $now,
            ],
        ];
        $this->db->table('komentar_forum')->insertBatch($komentarForumData);

        // 10. Tabel lowongan_kerja
        $lowonganKerjaData = [
            [
                'alumni_id'    => 1,
                'perusahaan'   => 'PT. Inovasi Digital Terpadu',
                'posisi'       => 'Senior Backend Developer (GoLang)',
                'kualifikasi'  => 'Pengalaman min 3 tahun dengan GoLang, Microservices, Kubernetes. Familiar dengan CI/CD. Bersedia WFO di Jakarta.',
                'lokasi'       => 'Jakarta Pusat',
                'tanggal_post' => $now,
            ],
            [
                'alumni_id'    => 2,
                'perusahaan'   => 'Startup EduTech Cerdas',
                'posisi'       => 'Product Manager Associate',
                'kualifikasi'  => 'Fresh graduate atau pengalaman max 1 tahun. Memiliki pemahaman baik tentang product development lifecycle. Komunikatif dan analitis.',
                'lokasi'       => 'Yogyakarta (Remote Friendly)',
                'tanggal_post' => $now,
            ],
        ];
        $this->db->table('lowongan_kerja')->insertBatch($lowonganKerjaData);
    }
}
