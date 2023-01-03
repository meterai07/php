<?php
    class Home extends Controller{
        public function index()
        {
            $data['nama'] = $this->model('User_model')->getUser();

            $this->view('templates/header', ['judul' => 'Home']);
            $this->view('home/index', $data);
            $this->view('templates/footer');
        }
    }
?>