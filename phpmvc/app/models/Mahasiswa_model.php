<?php
class Mahasiswa_model
{
    private $table = "mahasiswa"; // database handler
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMahasiswa()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getMahasiswaByNIM($nim)
    {
        $this->db->query("SELECT * FROM " . $this->table . " WHERE nim = :nim");
        $this->db->bind('nim', $nim);
        return $this->db->single();
    }
}
?>