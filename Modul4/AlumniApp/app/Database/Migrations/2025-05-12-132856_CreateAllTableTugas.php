<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;
use CodeIgniter\Database\RawSql;

class CreateAllTableTugas extends Migration
{
    public function up()
    {
        // 1. Tabel alumni
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'nama'          => ['type' => 'VARCHAR', 'constraint' => '255'],
            'email'         => ['type' => 'VARCHAR', 'constraint' => '255', 'unique' => true],
            'password'      => ['type' => 'VARCHAR', 'constraint' => '255'],
            'jurusan'       => ['type' => 'VARCHAR', 'constraint' => '100'],
            'no_hp'         => ['type' => 'VARCHAR', 'constraint' => '20', 'null' => true],
            'alamat'        => ['type' => 'TEXT', 'null' => true],
            'angkatan'      => ['type' => 'YEAR', 'null' => true],
            'foto_profil'   => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'created_at'    => ['type' => 'TIMESTAMP', 'null' => true, 'default' => new RawSql('CURRENT_TIMESTAMP')],
            'updated_at'    => ['type' => 'TIMESTAMP', 'null' => true, 'default' => new RawSql('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')],
        ]);
        $this->forge->addKey('id', true); // Primary Key
        $this->forge->createTable('alumni', true);

        // 2. Tabel pendidikan
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'alumni_id'     => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true],
            'tingkat'       => ['type' => 'VARCHAR', 'constraint' => '100'], // SD, SMP, SMA
            'institusi'     => ['type' => 'VARCHAR', 'constraint' => '255'],
            'jurusan'       => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => true],
            'tahun_masuk'   => ['type' => 'YEAR', 'null' => true],
            'tahun_lulus'   => ['type' => 'YEAR', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('alumni_id', 'alumni', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pendidikan', true);

        // 3. Tabel pekerjaan
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'alumni_id'     => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true],
            'perusahaan'    => ['type' => 'VARCHAR', 'constraint' => '255'],
            'posisi'        => ['type' => 'VARCHAR', 'constraint' => '100'],
            'tahun_masuk'   => ['type' => 'YEAR', 'null' => true],
            'tahun_keluar'  => ['type' => 'YEAR', 'null' => true], // Jika masih kerja
            'lokasi'        => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'deskripsi'     => ['type' => 'TEXT', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('alumni_id', 'alumni', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('pekerjaan', true);

        // 4. Tabel prestasi
        $this->forge->addField([
            'id'            => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'alumni_id'     => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true],
            'nama_prestasi' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'tingkat'       => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => true], // Provinsi, Nasional
            'tahun'         => ['type' => 'YEAR', 'null' => true],
            'deskripsi'     => ['type' => 'TEXT', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('alumni_id', 'alumni', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('prestasi', true);

        // 5. Tabel organisasi
        $this->forge->addField([
            'id'              => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'alumni_id'       => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true],
            'nama_organisasi' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'posisi'          => ['type' => 'VARCHAR', 'constraint' => '100', 'null' => true],
            'tahun_masuk'     => ['type' => 'YEAR', 'null' => true],
            'tahun_keluar'    => ['type' => 'YEAR', 'null' => true],
            'deskripsi'       => ['type' => 'TEXT', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('alumni_id', 'alumni', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('organisasi', true);

        // 6. Tabel kontribusi
        $this->forge->addField([
            'id'               => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'alumni_id'        => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true],
            'jenis_kontribusi' => ['type' => 'VARCHAR', 'constraint' => '255'],
            'deskripsi'        => ['type' => 'TEXT'],
            'tanggal'          => ['type' => 'DATE', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('alumni_id', 'alumni', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('kontribusi', true);

        // 7. Tabel berita_alumni
        $this->forge->addField([
            'id'           => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'alumni_id'    => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'null' => true], // Diubah constraint ke 5 agar konsisten
            'judul'        => ['type' => 'VARCHAR', 'constraint' => '255'],
            'isi'          => ['type' => 'TEXT'],
            'tanggal_post' => ['type' => 'TIMESTAMP', 'default' => new RawSql('CURRENT_TIMESTAMP'), 'null' => false],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('alumni_id', 'alumni', 'id', 'SET NULL', 'CASCADE');
        $this->forge->createTable('berita_alumni', true);

        // 8. Tabel forum_diskusi
        $this->forge->addField([
            'id'           => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'alumni_id'    => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true],
            'judul'        => ['type' => 'VARCHAR', 'constraint' => '255'],
            'isi'          => ['type' => 'TEXT', 'null' => true],
            'tanggal_post' => ['type' => 'TIMESTAMP', 'default' => new RawSql('CURRENT_TIMESTAMP'), 'null' => false],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('alumni_id', 'alumni', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('forum_diskusi', true);

        // 9. Tabel komentar_forum
        $this->forge->addField([
            'id'           => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'forum_id'     => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true],
            'alumni_id'    => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true], // Diubah constraint ke 5 agar konsisten
            'komentar'     => ['type' => 'TEXT'],
            'tanggal_post' => ['type' => 'TIMESTAMP', 'default' => new RawSql('CURRENT_TIMESTAMP'), 'null' => false],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('forum_id', 'forum_diskusi', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('alumni_id', 'alumni', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('komentar_forum', true);

        // 10. Tabel lowongan_kerja
        $this->forge->addField([
            'id'           => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true, 'auto_increment' => true],
            'alumni_id'    => ['type' => 'INT', 'constraint' => 5, 'unsigned' => true],
            'perusahaan'   => ['type' => 'VARCHAR', 'constraint' => '255'],
            'posisi'       => ['type' => 'VARCHAR', 'constraint' => '255'],
            'kualifikasi'  => ['type' => 'TEXT', 'null' => true],
            'lokasi'       => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'tanggal_post' => ['type' => 'TIMESTAMP', 'default' => new RawSql('CURRENT_TIMESTAMP'), 'null' => false],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('alumni_id', 'alumni', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('lowongan_kerja', true);
    }

    public function down()
    {
        $this->forge->dropTable('lowongan_kerja', true);
        $this->forge->dropTable('komentar_forum', true);
        $this->forge->dropTable('forum_diskusi', true);
        $this->forge->dropTable('berita_alumni', true);
        $this->forge->dropTable('kontribusi', true);
        $this->forge->dropTable('organisasi', true);
        $this->forge->dropTable('prestasi', true);
        $this->forge->dropTable('pekerjaan', true);
        $this->forge->dropTable('pendidikan', true);
        $this->forge->dropTable('alumni', true);
    }
}
