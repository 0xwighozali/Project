<?php 

class Petugas_model{
    private $table = 'petugas';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPetugas()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getIdPetugas($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table .' WHERE id_petugas = :id_petugas');
        $this->db->bind('id_petugas', $id);
        return $this->db->singleSet();
        
    }
    
    public function genIdPetugas(){
        $this->db->query("SELECT MAX(id_petugas) AS idpetugas FROM " . $this->table ." WHERE id_petugas LIKE 'P%'");
        return $this->db->singleSet();
    }

    public function tambahDataPetugas($data)
    {
        $query = "INSERT INTO petugas VALUES (:id_petugas, :nama_petugas, :alamat_petugas, :telp_petugas)";

        $this->db->query($query);
        $this->db->bind('id_petugas', $data['id_petugas']);
        $this->db->bind('nama_petugas', $data['nama_petugas']);
        $this->db->bind('alamat_petugas', $data['alamat_petugas']);
        $this->db->bind('telp_petugas', $data['telp_petugas']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function editDataPetugas($data, $id)
    {
        $query = "UPDATE petugas SET id_petugas = :id_petugas, nama_petugas = :nama_petugas, alamat_petugas = :alamat_petugas, telp_petugas = :telp_petugas WHERE id_petugas = :id";
        $this->db->query($query);
        $this->db->bind('id_petugas', $data['id_petugas']);
        $this->db->bind('nama_petugas', $data['nama_petugas']);
        $this->db->bind('alamat_petugas', $data['alamat_petugas']);
        $this->db->bind('telp_petugas', $data['telp_petugas']);
        $this->db->bind('id', $id);
    
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function hapusDataPetugas($id)
    {
        $query = "DELETE FROM petugas WHERE id_petugas = :id_petugas";

        $this->db->query($query);
        $this->db->bind('id_petugas', $id);

        $this->db->execute();
        return $this->db->rowCount();

    }
}