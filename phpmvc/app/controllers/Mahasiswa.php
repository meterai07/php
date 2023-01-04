<?php
    class Mahasiswa extends Controller {
        public function index ()
        {
            $data['mhs'] = $this->model('Mahasiswa_model')->getAllMahasiswa();
            $this->view('templates/header', ['judul' => 'Daftar Mahasiswa']);
            $this->view('mahasiswa/index', $data);
            $this->view('templates/footer');
        }
    }
?>