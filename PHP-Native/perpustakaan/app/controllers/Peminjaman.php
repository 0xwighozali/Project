<?php 

class Peminjaman extends Controller{
    public function index()
    {
        $data['judul'] = 'Data Peminjaman';
        $data['pmjmn'] = $this->model('Peminjaman_model')->getAllPeminjaman();
        $this->view('templates/side-bar', $data);
        $this->view('peminjaman/index', $data);
    
        $this->view('templates/footer');
    }

    public function add()
    {
        $data['judul'] = 'Tambah Peminjaman';
        $data['mmbr'] = $this->model('Member_model')->getAllMember();
        $data['ptgs'] = $this->model('Petugas_model')->getAllPetugas();
        $data['buku'] = $this->model('Peminjaman_model')->getAllBukuReady4Add();

        $idmax['pmjmn'] = $this->model('Peminjaman_model')->genIdPeminjaman();
        $maxid = $idmax['pmjmn']['idpeminjaman'];
        $nourut = (int) substr($maxid, 2, 4);
        $nourut++;
        $data['pmjmn'] = "PJ".sprintf("%03s", $nourut);

        $this->view('templates/side-bar', $data);
        $this->view('peminjaman/add', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit Peminjaman';
        $data['mmbr'] = $this->model('Member_model')->getAllMember();
        $data['ptgs'] = $this->model('Petugas_model')->getAllPetugas();
        $data['buku'] = $this->model('Peminjaman_model')->getAllBukuReady4Edit($id);
        $data['pmjmn'] = $this->model('Peminjaman_model')->getIdPeminjaman($id);

        $this->view('templates/side-bar', $data);
        $this->view('peminjaman/edit', $data);
        $this->view('templates/footer');
    }

    public function addProcess(){
        if($this->model('Peminjaman_model')->tambahDataPeminjaman($_POST) > 0)
        {
            header('Location: ' . BASEURL . '/peminjaman');
            exit;
        }
    }

    public function editProcess($id){
        if($this->model('Peminjaman_model')->editDataPeminjaman($_POST, $id) > 0)
        {
            header('Location: ' . BASEURL . '/peminjaman');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Peminjaman_model')->hapusDataPeminjaman($id) > 0 OR $this->model('Peminjaman_model')->hapusDataPeminjaman($id) > 0 ) {
            header('Location: ' . BASEURL . '/peminjaman');
            exit;
        }
    }

}