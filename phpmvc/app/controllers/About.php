<?php
    class About {
        public function index($nama = 'Rafi', $status = 'Mahasiswa')
        {
            echo "Halo nama saya $nama, saya adalah seorang $status";
        }
        public function page()
        {
            echo "about/page";
        }
    }
?>