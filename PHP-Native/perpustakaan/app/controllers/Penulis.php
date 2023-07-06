<?php 

class Penulis extends Controller{
    public function index()
    {
        $data['judul'] = 'Data Penulis';
        $data['pnls'] = $this->model('Penulis_model')->getAllPenulis();
        $this->view('templates/side-bar', $data);
        $this->view('penulis/index', $data);
        $this->view('templates/footer');
    }
    
    public function add(){
        $data['judul'] = 'Tambah Penulis';
        $idmax['pnls'] = $this->model('Penulis_model')->genIdPenulis();
        $maxid = $idmax['pnls']['idpenulis'];
        $nourut = (int) substr($maxid, 2, 3);
        $nourut++;
        $data['pnls'] = "PS".sprintf("%03s", $nourut);
        $this->view('templates/side-bar', $data);
        $this->view('penulis/add', $data);
        $this->view('templates/footer');
    }

    public function edit($id){
        $data['judul'] = 'Edit Penulis';
        $data['pnls'] = $this->model('Penulis_model')->getIdPenulis($id);
        $this->view('templates/side-bar', $data);
        $this->view('penulis/edit', $data);
        $this->view('templates/footer');
    }

    public function addProcess()
    {
        if ($this->model('Penulis_model')->tambahDataPenulis($_POST) > 0) {
            header('Location: ' . BASEURL . '/penulis');
            exit;
        }
    }

    public function editProcess($id)
    {
        if ($this->model('Penulis_model')->editDataPenulis($_POST, $id) > 0) {
            header('Location: ' . BASEURL . '/penulis');
            exit;
        }
    }

    
    public function hapus($id)
    {
        if ($this->model('Penulis_model')->hapusDataPenulis($id) > 0 ) {
            header('Location: ' . BASEURL . '/penulis');
            exit;
        }
    }
    

}