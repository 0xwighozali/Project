<?php 

class Buku_model{
    private $table = 'buku';
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllBuku(){
        $this->db->query('SELECT * FROM '. $this->table. ' LEFT JOIN buku_has_penulis on buku_has_penulis.id_bukuFK = buku.id_buku 
        LEFT JOIN penulis on penulis.id_penulis = buku_has_penulis.id_penulisFK');
        return $this->db->resultSet();
    }

    public function getIdPenulis(){
        $this->db->query('SELECT id_penulis FROM penulis');
        return $this->db->resultSet();
    }

    public function getBukuById($id){
        $this->db->query('SELECT * FROM '.$this->table . ' WHERE id_buku = :id_buku');
        $this->db->bind('id_buku', $id);
        return $this->db->singleSet();
    }

    public function genIdBuku(){
        $this->db->query('SELECT MAX(id_buku) AS idbuku FROM '.$this->table. " WHERE id_buku LIKE 'BK%'");
        return $this->db->singleSet();
    }

    public function tambahDataBuku($data){
        $tahun_penerbit = date("Y-m-d", strtotime($_POST['tahun_penerbit']));
        $query = 'INSERT INTO buku VALUES (:id_buku, :kode_buku, :judul_buku, :penerbit_buku, :tahun_penerbit)';
        $this->db->query($query);

        $this->db->bind('id_buku', $data['id_buku']);
        $this->db->bind('kode_buku', $data['kode_buku']);
        $this->db->bind('judul_buku', $data['judul_buku']);
        $this->db->bind('penerbit_buku', $data['penerbit_buku']);
        $this->db->bind('tahun_penerbit', $tahun_penerbit);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function tambahDataBukuHasPenulis($data){
        $id_penulis_array = explode(',', $data['id_penulis']);
    
        $query = 'INSERT INTO buku_has_penulis (id_bukuFK, id_penulisFK) VALUES (:id_buku, :id_penulis)';
        $this->db->query($query);
    
        $this->db->bind('id_buku', $data['id_buku']);
    
        foreach ($id_penulis_array as $id_penulis) {
            $this->db->bind('id_penulis', $id_penulis);
            $this->db->execute();
        }
    
        return $this->db->rowCount();
    }

    public function editDataBuku($data, $id)
    {
        $tahun_penerbit = date("Y-m-d", strtotime($_POST['tahun_terbit']));

        $query = "UPDATE buku SET id_buku = :id_buku, kode_buku = :kode_buku, judul_buku = :judul_buku, penerbit_buku = :penerbit_buku, tahun_penerbit = :tahun_penerbit WHERE id_buku = :id";
        $this->db->query($query);
        $this->db->bind('id_buku', $data['id_buku']);
        $this->db->bind('kode_buku', $data['kode_buku']);
        $this->db->bind('judul_buku', $data['judul_buku']);
        $this->db->bind('penerbit_buku', $data['penerbit_buku']);
        $this->db->bind('tahun_penerbit', $tahun_penerbit);
        $this->db->bind('id', $id);
    
        $this->db->execute();
        return $this->db->rowCount();
    }
    
    public function hapusDataBuku($id){
        $query = 'DELETE FROM buku WHERE id_buku = :id_buku';
        $this->db->query($query);

        $this->db->bind('id_buku', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function hapusDataBukuHasPenulisByBuku($id){
        $query = 'DELETE FROM buku_has_penulis WHERE id_bukuFK = :id_buku';
        $this->db->query($query);

        $this->db->bind('id_buku', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }


}