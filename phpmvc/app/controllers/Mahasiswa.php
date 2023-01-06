<?php
    class Mahasiswa extends Controller {
        public function index ()
        {
            $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
            $this->view('templates/header', ['judul' => 'Daftar Mahasiswa']);
            $this->view('mahasiswa/index', $data);
            $this->view('templates/footer');
        }

        public function detail ($nim)
        {
            $data['mhs'] = $this->model('Mahasiswa_model')->getMahasiswaByNIM($nim);
            $this->view('templates/header', ['judul' => 'Detail Mahasiswa']);
            $this->view('mahasiswa/detail', $data);
            $this->view('templates/footer');
        }

        public function tambah ()
        {
            var_dump($_POST);
        }
    }
?>