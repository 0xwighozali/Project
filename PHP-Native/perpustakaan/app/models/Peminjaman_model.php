<?php 

class Peminjaman_model{
    private $table = 'peminjaman';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllPeminjaman()
    {
        $this->db->query("SELECT DISTINCT peminjaman.id_peminjaman, peminjaman.tanggal_peminjaman, member.nama_member, petugas.nama_petugas, buku.judul_buku, IF(pengembalian.id_peminjamanFK IS NOT NULL, 'Dikembalikan', 'Belum Dikembalikan') AS status_tx 
        FROM peminjaman 
        LEFT JOIN buku ON buku.id_buku = peminjaman.id_bukuFK
        LEFT JOIN member ON member.id_member = peminjaman.id_memberFK
        LEFT JOIN petugas ON petugas.id_petugas = peminjaman.id_petugasFK
        LEFT JOIN pengembalian ON pengembalian.id_peminjamanFK = peminjaman.id_peminjaman");
        return $this->db->resultSet();
    }

    public function getAllBukuReady4Add(){
        $this->db->query("SELECT * FROM buku LEFT JOIN peminjaman ON peminjaman.id_bukuFK = buku.id_buku WHERE id_buku NOT IN (SELECT id_bukuFK FROM peminjaman)");

        return $this->db->resultSet();
    }

    public function getAllBukuReady4Edit($id){
        $this->db->query("SELECT id_buku FROM buku LEFT JOIN peminjaman ON peminjaman.id_bukuFK = buku.id_buku WHERE id_buku NOT IN (SELECT id_bukuFK FROM peminjaman WHERE id_peminjaman != :id_peminjaman)");
        $this->db->bind('id_peminjaman', $id);

        return $this->db->resultSet();
    }
    
    public function genIdPeminjaman(){
        $this->db->query("SELECT MAX(id_peminjaman) AS idpeminjaman FROM " . $this->table ." WHERE id_peminjaman LIKE 'PJ%'");
        return $this->db->singleSet();
    }

    public function getIdPeminjaman($id){
        $this->db->query("SELECT id_peminjaman FROM peminjaman WHERE id_peminjaman = :id_peminjaman");
        $this->db->bind('id_peminjaman', $id);

        return $this->db->singleSet();
    }

    public function tambahDataPeminjaman($data)
    {
        $query = "INSERT INTO peminjaman VALUES (:id_peminjaman, :id_bukuFK, :id_petugasFK, :id_memberFK, :tanggal_peminjaman)";

        $this->db->query($query);
        $this->db->bind('id_peminjaman', $data['id_peminjaman']);
        $this->db->bind('id_bukuFK', $data['id_buku']);
        $this->db->bind('id_petugasFK', $data['id_petugas']);
        $this->db->bind('id_memberFK', $data['id_member']);
        $this->db->bind('tanggal_peminjaman', date('Y-m-d H:i:s'));

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function editDataPeminjaman($data, $id)
    {
        $query = "UPDATE peminjaman SET id_peminjaman = :id_peminjaman, id_bukuFK = :id_bukuFK, id_petugasFK = :id_petugasFK, id_memberFK = :id_memberFK WHERE id_peminjaman = :id";
        $this->db->query($query);
        $this->db->bind('id_peminjaman', $data['id_peminjaman']);
        $this->db->bind('id_bukuFK', $data['id_buku']);
        $this->db->bind('id_petugasFK', $data['id_petugas']);
        $this->db->bind('id_memberFK', $data['id_member']);
        $this->db->bind('id', $id);
    
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function hapusDataPeminjaman($id)
    {
        $query = "DELETE FROM peminjaman WHERE id_peminjaman = :id_peminjaman";

        $this->db->query($query);
        $this->db->bind('id_peminjaman', $id);

        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataPengembalian($id){
        $query = 'DELETE FROM pengembalian WHERE id_peminjamanFK = :id_peminjaman';
        $this->db->query($query);

        $this->db->bind('id_peminjaman', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}