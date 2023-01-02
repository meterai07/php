<?php
    class About extends Controller{
        public function index($nama = 'Rafi', $status = 'Mahasiswa')
        {
            $this->view("templates/header", ['judul' => 'About']);
            $this->view("about/index", ['nama' => $nama, 'status' => $status]);
            $this->view("templates/footer");
        }
        public function page()
        {
            $this->view("templates/header", ['judul' => 'Page']);
            $this->view("about/page");
            $this->view("templates/footer");
        }
    }
?>