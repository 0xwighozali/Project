<?php 

class About extends Controller{
    public function index($nama='alwi', $pekerjaan='makan')
    {
        $data['nama'] = $nama;
        $data['pekerjaan'] = $pekerjaan;
        $data['judul'] = 'Index Home';
        $this->view('templates/side-bar', $data);
        $this->view('About/index', $data);
        $this->view('templates/footer');
    }
    public function page()
    {
        $data['judul'] = 'Page';
        $this->view('templates/side-bar', $data);
        $this->view('About/page');
        $this->view('templates/footer');
    }
}