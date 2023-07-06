<?php 

class Rekap_model{
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getRekap()
    {
        $this->db->query("SELECT peminjaman.id_peminjaman AS id, peminjaman.tanggal_peminjaman AS tanggal, 'Peminjaman' AS jenis_transaksi, buku.judul_buku, member.nama_member, petugas.nama_petugas 
                        FROM(peminjaman
                        LEFT JOIN buku ON buku.id_buku = peminjaman.id_bukuFK
                        LEFT JOIN member ON member.id_member = peminjaman.id_memberFK
                        LEFT JOIN petugas ON petugas.id_petugas = peminjaman.id_petugasFK
                        )
                        UNION ALL SELECT pengembalian.id_pengembalian AS id, pengembalian.tanggal_pengembalian AS tanggal, 'Pengembalian' AS jenis_transaksi, buku.judul_buku, member.nama_member, petugas.nama_petugas
                        FROM (pengembalian 
                        LEFT JOIN buku ON buku.id_buku = pengembalian.id_bukuFK
                        LEFT JOIN member ON member.id_member = pengembalian.id_memberFK
                        LEFT JOIN petugas ON petugas.id_petugas = pengembalian.id_petugasFK) ORDER BY tanggal");
        return $this->db->resultSet();
    }
}