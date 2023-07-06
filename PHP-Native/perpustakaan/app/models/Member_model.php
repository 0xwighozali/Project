<?php 

class Member_model{
    private $table = 'member';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllMember()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getIdMember($id)
    {
        $this->db->query('SELECT * FROM ' . $this->table .' WHERE id_member = :id_member');
        $this->db->bind('id_member', $id);
        return $this->db->singleSet();   
    }
    
    public function genIdMember(){
        $this->db->query("SELECT MAX(id_member) AS idmember FROM " . $this->table ." WHERE id_member LIKE 'M%'");
        return $this->db->singleSet();
    }

    public function tambahDataMember($data)
    {
        $query = "INSERT INTO member VALUES (:id_member, :nama_member, :alamat_member, :telp_member)";

        $this->db->query($query);
        $this->db->bind('id_member', $data['id_member']);
        $this->db->bind('nama_member', $data['nama_member']);
        $this->db->bind('alamat_member', $data['alamat_member']);
        $this->db->bind('telp_member', $data['telp_member']);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function editDataMember($data, $id)
    {
        $query = "UPDATE member SET id_member = :id_member, nama_member = :nama_member, alamat_member = :alamat_member, telp_member = :telp_member WHERE id_member = :id";
        $this->db->query($query);
        $this->db->bind('id_member', $data['id_member']);
        $this->db->bind('nama_member', $data['nama_member']);
        $this->db->bind('alamat_member', $data['alamat_member']);
        $this->db->bind('telp_member', $data['telp_member']);
        $this->db->bind('id', $id);
    
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function hapusDataMember($id)
    {
        $query = "DELETE FROM member WHERE id_member = :id_member";

        $this->db->query($query);
        $this->db->bind('id_member', $id);

        $this->db->execute();
        return $this->db->rowCount();

    }
}