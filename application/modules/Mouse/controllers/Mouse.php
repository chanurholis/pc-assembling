<?php
class Mouse extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_mouse');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Master Mouse';
            $data['mouse'] = $this->M_mouse->tampil_mouse()->result();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('mouse', $data);
            $this->load->view('partials/footer');
        }
    }

    public function tambah_mouse()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('nama_mouse', 'Mouse', 'required|trim|is_unique[m_mouse.nama_mouse]');

            if ($this->form_validation->run() == false) {
                $data['judul'] = 'Tambah Data Master Mouse';
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('tambah_mouse', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Ditambahkan');

                $nama_mouse = htmlspecialchars($this->input->post('nama_mouse', true));

                $data = ['nama_mouse' => $nama_mouse];

                $this->db->insert('m_mouse', $data);
                redirect('Mouse');
            }
        }
    }

    public function ubah_mouse($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Ubah Data Master Mouse';
            $where = ['id' => $id];
            $data['mouse'] = $this->M_mouse->ubah_mouse($where)->result();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('ubah_mouse', $data);
            $this->load->view('partials/footer');
        }
    }

    public function aksi_ubah_mouse()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('nama_mouse', 'Mouse', 'required|trim|is_unique[m_mouse.nama_mouse]');

            if ($this->form_validation->run() == false) {
                $id = htmlspecialchars($this->input->post('id'));

                $data['judul'] = 'Ubah Data Master Mouse';
                $where = ['id' => $id];
                $data['mouse'] = $this->M_mouse->ubah_mouse($where)->result();
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('ubah_mouse', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Diubah');

                $id = htmlspecialchars($this->input->post('id'));
                $nama_mouse = htmlspecialchars($this->input->post('nama_mouse'));

                $where = ['id' => $id];

                $data = ['nama_mouse' => $nama_mouse];

                $this->db->where($where);
                $this->db->update('m_mouse', $data);
                redirect('Mouse');
            }
        }
    }

    public function search_mouse()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $keyword = htmlspecialchars($this->input->post('keyword', true));
            $data['judul'] = 'Master Mouse';
            $data['id'] = $this->db->get('m_mouse')->row();
            $data['mouse'] = $this->M_mouse->get_keyword_mouse($keyword);
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('search_mouse', $data);
            $this->load->view('partials/footer');
        }
    }

    public function hapus_mouse($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->session->set_flashdata('flash', 'Dihapus');

            $where = ['id' => $id];

            $this->db->where($where);
            $this->db->delete('m_mouse');
            redirect('Mouse');
        }
    }
}
