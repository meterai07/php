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
            if ($this->model('Mahasiswa_model')->tambahDataMahasiswa($_POST) > 0) {
                Flasher::setFlash('berhasil', 'ditambahkan', 'success');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            } else {
                Flasher::setFlash('gagal', 'ditambahkan', 'danger');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        }

        public function hapus ($nim)
        {
            if ($this->model('Mahasiswa_model')->hapusDataMahasiswa($nim) > 0) {
                Flasher::setFlash('berhasil', 'dihapus', 'success');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            } else {
                Flasher::setFlash('gagal', 'dihapus', 'danger');
                header('Location: ' . BASEURL . '/mahasiswa');
                exit;
            }
        }

        // public function getUbah ()
        // {
        //     echo json_encode($this->model('Mahasiswa_model')->getMahasiswaByNIM($_POST['nim']));
        // }
    }
?>