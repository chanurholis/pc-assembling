<?php
class Casing extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_casing');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['judul'] = 'Master Casing';
        $data['casing'] = $this->M_casing->tampil_casing()->result();
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar_admin');
        $this->load->view('casing', $data);
        $this->load->view('partials/footer');
    }

    public function tambah_casing()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('nama_casing', 'Casing', 'required|trim|is_unique[m_casing.nama_casing]');

            if ($this->form_validation->run() == false) {
                $data['judul'] = 'Tambah Data Master Casing';
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('tambah_casing', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Ditambahkan');

                $nama_casing = htmlspecialchars($this->input->post('nama_casing', true));

                $data = ['nama_casing' => $nama_casing];

                $this->db->insert('m_casing', $data);
                redirect('Casing');
            }
        }
    }

    public function ubah_casing($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Ubah Data Master Casing';
            $where = ['id' => $id];
            $data['casing'] = $this->M_casing->ubah_casing($where)->result();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('ubah_casing', $data);
            $this->load->view('partials/footer');
        }
    }

    public function aksi_ubah_casing()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('nama_casing', 'Casing', 'required|is_unique[m_casing.nama_casing]|trim');

            if ($this->form_validation->run() == false) {
                $id = htmlspecialchars($this->input->post('id', true));

                $data['judul'] = 'Ubah Data Master Casing';
                $where = ['id' => $id];
                $data['casing'] = $this->M_casing->ubah_casing($where)->result();
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('ubah_casing', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Diubah');

                $id = htmlspecialchars($this->input->post('id', true));
                $nama_casing = htmlspecialchars($this->input->post('nama_casing', true));

                $where = ['id' => $id];

                $data = ['nama_casing' => $nama_casing];

                $this->db->where($where);
                $this->db->update('m_casing', $data);
                redirect('Casing');
            }
        }
    }

    public function search_casing()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $keyword = htmlspecialchars($this->input->post('keyword', true));
            $data['judul'] = 'Master Casing';
            $data['id'] = $this->db->get('m_casing')->row();
            $data['casing'] = $this->M_casing->get_keyword_casing($keyword);
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('search_casing', $data);
            $this->load->view('partials/footer');
        }
    }

    public function hapus_casing($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->session->set_flashdata('flash', 'Dihapus');

            $where = ['id' => $id];

            $this->M_casing->hapus($where, 'm_casing');
            redirect('Casing');
        }
    }
}
