<?php 

class Rekap extends Controller{
    public function index()
    {
        $data['judul'] = 'Data Rekap';
        $data['rkp'] = $this->model('Rekap_model')->getRekap();
        $this->view('templates/side-bar', $data);
        $this->view('rekap/index', $data);
        $this->view('templates/footer');
    }
}