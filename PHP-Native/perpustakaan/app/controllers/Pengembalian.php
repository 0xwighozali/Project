<?php 

class Pengembalian extends Controller{
    public function index()
    {
        $data['judul'] = 'Data Pengembalian';
        $data['pngmbln'] = $this->model('Pengembalian_model')->getAllPengembalian();
        $this->view('templates/side-bar', $data);
        $this->view('pengembalian/index', $data);
        $this->view('templates/footer');
    }

    public function add()
    {
        $data['judul'] = 'Tambah Peminjaman';
        $data['pmjmn'] = $this->model('Pengembalian_model')->getIdPeminjaman4add();

        $idmax['pngmbln'] = $this->model('Pengembalian_model')->genIdPengembalian();
        $maxid = $idmax['pngmbln']['idpengembalian'];
        $nourut = (int) substr($maxid, 2, 4);
        $nourut++;
        $data['pngmbln'] = "PG".sprintf("%03s", $nourut);

        $this->view('templates/side-bar', $data);
        $this->view('pengembalian/add', $data);
        $this->view('templates/footer');
    }

    public function edit($id)
    {
        $data['judul'] = 'Edit Peminjaman';
        $data['pngmbln'] = $this->model('Pengembalian_model')->getIdPengembalian($id);
        $data['pmjmn'] = $this->model('Pengembalian_model')->getIdPeminjaman4edit($id);

        $this->view('templates/side-bar', $data);
        $this->view('pengembalian/edit', $data);
        $this->view('templates/footer');
    }

    public function getdata()
    {
        echo json_encode($this->model('Pengembalian_model')->getDataPeminjaman($_POST['id_peminjaman']));
    }

    public function addProcess(){
        if($this->model('Pengembalian_model')->tambahDataPengembalian($_POST) > 0)
        {
            header('Location: ' . BASEURL . '/pengembalian');
            exit;
        }
    }

    public function editProcess($id){
        if($this->model('Pengembalian_model')->editDataPengembalian($_POST, $id) > 0)
        {
            header('Location: ' . BASEURL . '/pengembalian');
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model('Pengembalian_model')->hapusDataPengembalian($id) > 0 ) {
            header('Location: ' . BASEURL . '/peminjaman');
            exit;
        }
    }

}