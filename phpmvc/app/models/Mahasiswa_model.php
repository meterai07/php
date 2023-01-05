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
}
?>