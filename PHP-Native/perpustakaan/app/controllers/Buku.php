<?php

class Buku extends Controller{
    public function index(){
        $data['judul'] = 'Buku';
        $row['bk'] = $this->model('Buku_model')->getAllBuku();
        $data['bku'] = array();

        foreach($row['bk'] as $bku):
            $id_buku = $bku['id_buku'];
            $kode_buku = $bku['kode_buku'];
            $judul_buku = $bku['judul_buku'];
            $penerbit_buku = $bku['penerbit_buku'];
            $tahun_penerbit = $bku['tahun_penerbit'];
            $nama_penulis = $bku['nama_penulis'];

            if (array_key_exists($id_buku, $data['bku'])) {
                $data['bku'][$id_buku]['nama_penulis'][] = $nama_penulis;
                $data['bku'][$id_buku]['kode_buku'] = $kode_buku;
                $data['bku'][$id_buku]['judul_buku'] = $judul_buku;
                $data['bku'][$id_buku]['penerbit_buku'] = $penerbit_buku;
                $data['bku'][$id_buku]['tahun_penerbit'] = $tahun_penerbit;
            } else {
                $data['bku'][$id_buku] = array(
                    'nama_penulis' => array($nama_penulis),
                    'judul_buku' => $judul_buku,
                    'kode_buku' => $kode_buku,
                    'penerbit_buku' => $penerbit_buku,
                    'tahun_penerbit' => $tahun_penerbit
                );
            }
        endforeach;

        $this->view('templates/side-bar', $data);
        $this->view('buku/index', $data);
        $this->view('templates/footer');
    }

    public function add(){
        $data['judul'] = 'Tambah Buku';
        $idmax['buku'] = $this->model('Buku_model')->genIdBuku();
        $maxid = $idmax['buku']['idbuku'];
        $nourut = (int) substr($maxid, 2, 3);
        $nourut++;
        $data['bk'] = "BK".sprintf("%03s", $nourut);
        $data['pnls'] = $this->model('Penulis_model')->getAllPenulis();
        
        $this->view('templates/side-bar', $data);
        $this->view('buku/add', $data);
        $this->view('templates/footer');
    }

    public function edit($id){
        $data['judul'] = 'Tambah Buku';
        $data['bku'] = $this->model('Buku_model')->getBukuById($id);
        $data['pnls'] = $this->model('Penulis_model')->getAllPenulis();

        $this->view('templates/side-bar', $data);
        $this->view('buku/edit', $data);
        $this->view('templates/footer');
    }

    public function addProcess()
    {
        if ($this->model('Buku_model')->tambahDataBuku($_POST) > 0 && $this->model('Buku_model')->tambahDataBukuHasPenulis($_POST)>0) {
            header('Location: ' . BASEURL . '/buku');
            exit;
        }
    }
    
    public function editProcess($id)
    {
        if ($this->model('Buku_model')->editDataBuku($_POST, $id) > 0 OR ($this->model('Buku_model')->hapusDataBukuHasPenulisByBuku($id) > 0  && $this->model('Buku_model')->tambahDataBukuHasPenulis($_POST)>0)) {
            header('Location: ' . BASEURL . '/buku');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Buku_model')->hapusDataBuku($id) > 0 && $this->model('Buku_model')->hapusDataBukuHasPenulisByBuku($id) > 0) {
            header('Location: ' . BASEURL . '/buku');
            exit;
        }
    }
}