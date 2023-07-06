<?php 

class Member extends Controller{
    public function index()
    {
        $data['judul'] = 'Data Member';
        $data['mmbr'] = $this->model('Member_model')->getAllMember();
        $this->view('templates/side-bar', $data);
        $this->view('member/index', $data);
        $this->view('templates/footer');
    }
    
    public function add(){
        $data['judul'] = 'Tambah Member';
        $idbuku['mmbr'] = $this->model('Member_model')->genIdMember();
        $maxid = $idbuku['mmbr']['idmember'];
        $nourut = (int) substr($maxid, 2, 3);
        $nourut++;
        $data['mmbr'] = "M".sprintf("%03s", $nourut);
        $this->view('templates/side-bar', $data);
        $this->view('member/add', $data);
        $this->view('templates/footer');
    }

    public function edit($id){
        $data['judul'] = 'Edit Member';
        $data['mmbr'] = $this->model('Member_model')->getIdMember($id);
        $this->view('templates/side-bar', $data);
        $this->view('member/edit', $data);
        $this->view('templates/footer');
    }

    public function addProcess()
    {
        if ($this->model('Member_model')->tambahDataMember($_POST) > 0) {
            header('Location: ' . BASEURL . '/member');
            exit;
        }
    }

    public function editProcess($id)
    {
        if ($this->model('Member_model')->editDataMember($_POST, $id) > 0) {
            header('Location: ' . BASEURL . '/member');
            exit;
        }
    }

    
    public function hapus($id)
    {
        if ($this->model('Member_model')->hapusDataMember($id) > 0) {
            header('Location: ' . BASEURL . '/member');
            exit;
        }
    }
    

}