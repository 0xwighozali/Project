<?php 

class Penulis_model{
    private $table = 'penulis';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPenulis()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getIdPenulis($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table .' WHERE id_penulis = :id_penulis');
        $this->db->bind('id_penulis', $id);
        return $this->db->singleSet();
        
    }
    
    public function genIdPenulis(){
        $this->db->query("SELECT MAX(id_penulis) AS idpenulis FROM " . $this->table ." WHERE id_penulis LIKE 'PS%'");
        return $this->db->singleSet();
    }

    public function tambahDataPenulis($data)
    {
        $query = "INSERT INTO penulis VALUES (:id_penulis, :nama_penulis, :alamat_penulis, :telp_penulis)";

        $this->db->query($query);
        $this->db->bind('id_penulis', $data['id_penulis']);
        $this->db->bind('nama_penulis', $data['nama_penulis']);
        $this->db->bind('alamat_penulis', $data['alamat_penulis']);
        $this->db->bind('telp_penulis', $data['telp_penulis']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function editDataPenulis($data, $id)
    {
        $query = "UPDATE penulis SET id_penulis = :id_penulis, nama_penulis = :nama_penulis, alamat_penulis = :alamat_penulis, telp_penulis = :telp_penulis WHERE id_penulis = :id";
        $this->db->query($query);
        $this->db->bind('id_penulis', $data['id_penulis']);
        $this->db->bind('nama_penulis', $data['nama_penulis']);
        $this->db->bind('alamat_penulis', $data['alamat_penulis']);
        $this->db->bind('telp_penulis', $data['telp_penulis']);
        $this->db->bind('id', $id);
    
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function hapusDataPenulis($id)
    {
        $query = "DELETE FROM penulis WHERE id_penulis = :id_penulis";

        $this->db->query($query);
        $this->db->bind('id_penulis', $id);

        $this->db->execute();
        return $this->db->rowCount();

    }
}