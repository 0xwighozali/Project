<?php 

class Petugas extends Controller{
    public function index()
    {
        $data['judul'] = 'Data Petugas';
        $data['ptgs'] = $this->model('Petugas_model')->getAllPetugas();
        $this->view('templates/side-bar', $data);
        $this->view('petugas/index', $data);
        $this->view('templates/footer');
    }
    
    public function add(){
        $data['judul'] = 'Tambah Petugas';
        $idmax['ptgs'] = $this->model('Petugas_model')->genIdPetugas();
        $maxid = $idmax['ptgs']['idpetugas'];
        $nourut = (int) substr($maxid, 2, 3);
        $nourut++;
        $data['ptgs'] = "P".sprintf("%03s", $nourut);
        $this->view('templates/side-bar', $data);
        $this->view('petugas/add', $data);
        $this->view('templates/footer');
    }

    public function edit($id){
        $data['judul'] = 'Edit petugas';
        $data['ptgs'] = $this->model('Petugas_model')->getIdPetugas($id);
        $this->view('templates/side-bar', $data);
        $this->view('petugas/edit', $data);
        $this->view('templates/footer');
    }

    public function addProcess()
    {
        if ($this->model('Petugas_model')->tambahDataPetugas($_POST) > 0) {
            header('Location: ' . BASEURL . '/petugas');
            exit;
        }
    }

    public function editProcess($id)
    {
        if ($this->model('Petugas_model')->editDataPetugas($_POST, $id) > 0) {
            header('Location: ' . BASEURL . '/petugas');
            exit;
        }
    }

    
    public function hapus($id)
    {
        if ($this->model('Petugas_model')->hapusDataPetugas($id) > 0) {
            header('Location: ' . BASEURL . '/petugas');
            exit;
        }
    }
    

}