<?php 

class Pengembalian_model{
    private $table = 'pengembalian';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPengembalian()
    {
        $this->db->query('SELECT * FROM 
                        pengembalian
                        LEFT JOIN buku ON buku.id_buku = pengembalian.id_bukuFK
                        LEFT JOIN member ON member.id_member = pengembalian.id_memberFK
                        LEFT JOIN petugas ON petugas.id_petugas = pengembalian.id_petugasFK
                        LEFT JOIN peminjaman ON peminjaman.id_peminjaman=pengembalian.id_peminjamanFK');
        return $this->db->resultSet();
    }

    public function getIdPeminjaman4add()
    {
        $this->db->query('SELECT id_peminjaman FROM peminjaman WHERE id_peminjaman NOT IN (SELECT id_peminjamanFK FROM pengembalian)');
        return $this->db->resultSet();
    }

    public function getIdPeminjaman4edit($id)
    {
        $this->db->query("SELECT id_peminjaman
         FROM peminjaman 
        WHERE id_peminjaman  NOT IN(SELECT id_peminjamanFK as FK FROM pengembalian WHERE id_pengembalian != :id OR id_pengembalian = :id)");
        $this->db->bind('id', $id);
        return $this->db->resultSet();
    }

    public function getIdPengembalian($id)
    {
        $this->db->query("SELECT id_pengembalian FROM pengembalian WHERE id_pengembalian = :id");
        $this->db->bind('id', $id);
        return $this->db->singleSet();
    }
    
    public function genIdPengembalian()
    {
        $this->db->query("SELECT MAX(id_pengembalian) AS idpengembalian FROM " . $this->table ." WHERE id_pengembalian LIKE 'PG%'");
        return $this->db->singleSet();
    }

    public function getDataPeminjaman($id)
    {
        $this->db->query("SELECT * FROM peminjaman WHERE id_peminjaman = :id_peminjaman");
        $this->db->bind('id_peminjaman', $id);

        return $this->db->singleSet();
    }

    public function tambahDataPengembalian($data)
    {
        $query = "INSERT INTO pengembalian VALUES (:id_pengembalian, :id_bukuFK, :id_petugasFK, :id_memberFK, :id_peminjamanFK, :tanggal_pengembalian)";

        $this->db->query($query);
        $this->db->bind('id_pengembalian', $data['id_pengembalian']);
        $this->db->bind('id_bukuFK', $data['id_buku']);
        $this->db->bind('id_petugasFK', $data['id_petugas']);
        $this->db->bind('id_memberFK', $data['id_member']);
        $this->db->bind('id_peminjamanFK', $data['id_peminjaman']);
        $this->db->bind('tanggal_pengembalian', date('Y-m-d H:i:s'));
        
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function editDataPengembalian($data, $id)
    {
        $query = "UPDATE pengembalian SET id_pengembalian = :id_pengembalian, id_bukuFK = :id_bukuFK, id_petugasFK = :id_petugasFK, id_memberFK = :id_memberFK, 
                id_peminjamanFK = :id_peminjamanFK WHERE id_pengembalian = :id";

        $this->db->query($query);
        $this->db->bind('id_pengembalian', $data['id_pengembalian']);
        $this->db->bind('id_bukuFK', $data['id_buku']);
        $this->db->bind('id_petugasFK', $data['id_petugas']);
        $this->db->bind('id_memberFK', $data['id_member']);
        $this->db->bind('id_peminjamanFK', $data['id_peminjaman']);
        $this->db->bind('id', $id);
    
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function hapusDataPengembalian($id)
    {
        $query = "DELETE FROM pengembalian WHERE id_pengembalian = :id_pengembalian";

        $this->db->query($query);
        $this->db->bind('id_pengembalian', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }
}