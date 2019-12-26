<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_home');
    }

    public function index()
    {
        $role = $this->session->userdata('role');
        $status_login = $this->session->userdata('status');

        if ($status_login == NULL) {
            redirect('/');
        } else {

            if ($role == 'Admin') {

                $data['judul'] = 'Simulasi Rakit PC';
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('home', $data);
                $this->load->view('partials/footer');
            } elseif ($role == 'Member') {

                $data['judul'] = "Simulasi Rakit PC";
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_member');
                $this->load->view('home', $data);
                $this->load->view('partials/footer');
            }
        }
    }
}
