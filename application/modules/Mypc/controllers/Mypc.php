<?php
class Mypc extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_mypc');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'My PC';
        $data['rakit'] = $this->M_mypc->tampil_mypc()->result();
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar_admin');
        $this->load->view('mypc', $data);
        $this->load->view('partials/footer');
    }

    public function detail($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Detail Data';
            $where = array('id' => $id);
            $data['result'] = $this->M_mypc->detail($where, 'rakit')->result();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('detail', $data);
            $this->load->view('partials/footer');
        }
    }

    public function hapus($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->session->set_flashdata('flash', 'Dihapus');

            $where = ['id' => $id];

            $this->db->where($where);
            $this->db->delete('rakit');
            redirect('Mypc');
        }
    }
}
