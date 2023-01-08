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

    public function tambahDataMahasiswa($data)
    {
        $query = "INSERT INTO mahasiswa VALUES (:nim, :nama, :jurusan, :email)";
        $this->db->query($query);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->bind('email', $data['email']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataMahasiswa($nim)
    {
        $query = "DELETE FROM mahasiswa WHERE nim = :nim";
        $this->db->query($query);
        $this->db->bind('nim', $nim);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function ubahDataMahasiswa($data)
    {
        $query = "UPDATE mahasiswa SET nama = :nama, email = :email, jurusan = :jurusan WHERE nim = :nim";
        $this->db->query($query);
        $this->db->bind('nim', $data['nim']);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('email', $data['email']);
        $this->db->bind('jurusan', $data['jurusan']);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
?>