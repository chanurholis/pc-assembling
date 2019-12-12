<?php
class PSU extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_psu');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Master PSU';
            $data['psu'] = $this->M_psu->tampil_psu()->result();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('psu', $data);
            $this->load->view('partials/footer');
        }
    }

    public function tambah_psu()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('nama_psu', 'PSU', 'required|trim|is_unique[m_psu.nama_psu]');

            if ($this->form_validation->run() == false) {
                $data['judul'] = 'Tambah Data Master PSU';
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('tambah_psu', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Ditambahkan');

                $nama_psu = htmlspecialchars($this->input->post('nama_psu', true));

                $data = ['nama_psu' => $nama_psu];

                $this->db->insert('m_psu', $data);
                redirect('PSU');
            }
        }
    }

    public function ubah_psu($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Ubah Data Master PSU';
            $where = ['id' => $id];
            $data['psu'] = $this->M_psu->ubah_psu($where)->result();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('ubah_psu', $data);
            $this->load->view('partials/footer');
        }
    }

    public function aksi_ubah_psu()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('nama_psu', 'PSU', 'required|trim|is_unique[m_psu.nama_psu]');

            if ($this->form_validation->run() == false) {
                $id = htmlspecialchars($this->input->post('id'));

                $data['judul'] = 'Ubah Data Master PSU';
                $where = ['id' => $id];
                $data['psu'] = $this->M_psu->ubah_psu($where)->result();
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('ubah_psu', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Diubah');

                $id = htmlspecialchars($this->input->post('id'));
                $nama_psu = htmlspecialchars($this->input->post('nama_psu'));

                $where = ['id' => $id];

                $data = [
                    'nama_psu' => $nama_psu
                ];

                $this->db->where($where);
                $this->db->update('m_psu', $data);
                redirect('PSU');
            }
        }
    }

    public function search_psu()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $keyword = htmlspecialchars($this->input->post('keyword', true));
            $data['judul'] = 'Master PSU';
            $data['id'] = $this->db->get('m_psu')->row();
            $data['psu'] = $this->M_psu->get_keyword_psu($keyword);
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('search_psu', $data);
            $this->load->view('partials/footer');
        }
    }

    public function hapus_psu($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->session->set_flashdata('flash', 'Dihapus');

            $where = ['id' => $id];

            $this->db->where($where);
            $this->db->delete('m_psu');
            redirect('PSU');
        }
    }
}
