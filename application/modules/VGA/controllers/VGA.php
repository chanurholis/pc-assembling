<?php
class VGA extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_vga');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Master VGA';
            $data['vga'] = $this->M_vga->tampil_vga()->result();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('vga', $data);
            $this->load->view('partials/footer');
        }
    }

    public function tambah_vga()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('nama_vga', 'VGA', 'required|trim|is_unique[m_vga.nama_vga]');
            $this->form_validation->set_rules('type', 'Type', 'required');

            if ($this->form_validation->run() == false) {
                $data['judul'] = 'Tambah Data Master VGA';
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('tambah_vga');
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Ditambahkan');

                $nama_vga = htmlspecialchars($this->input->post('nama_vga', true));
                $type = htmlspecialchars($this->input->post('type'));

                $data = [
                    'nama_vga' => $nama_vga,
                    'type' => $type
                ];

                $this->db->insert('m_vga', $data);
                redirect('VGA');
            }
        }
    }

    public function ubah_vga($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Ubah Data Master VGA';
            $where = ['id' => $id];
            $data['vga'] = $this->M_vga->ubah_vga($where)->result();
            $data['type'] = ['ADD-ON', 'ON-BOARD'];
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('ubah_vga', $data);
            $this->load->view('partials/footer');
        }
    }

    public function aksi_ubah_vga()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('nama_vga', 'VGA', 'required|trim|is_unique[m_vga.nama_vga]');
            $this->form_validation->set_rules('type', 'Type', 'required');

            if ($this->form_validation->run() == false) {
                $id = htmlspecialchars($this->input->post('id'));

                $data['judul'] = 'Ubah Data Master VGA';
                $where = ['id' => $id];
                $data['vga'] = $this->M_vga->ubah_vga($where)->result();
                $data['type'] = ['ADD-ON', 'ON-BOARD'];
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('ubah_vga', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Diubah');

                $id = htmlspecialchars($this->input->post('id', true));
                $nama_vga = htmlspecialchars($this->input->post('nama_vga', true));
                $type = htmlspecialchars($this->input->post('type', true));

                $where = ['id' => $id];

                $data = [
                    'nama_vga' => $nama_vga,
                    'type' => $type
                ];

                $this->db->where($where);
                $this->db->update('m_vga', $data);
                redirect('VGA');
            }
        }
    }

    public function search_vga()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $keyword = htmlspecialchars($this->input->post('keyword', true));
            $data['judul'] = 'Master VGA';
            $data['id'] = $this->db->get('m_vga')->row();
            $data['vga'] = $this->M_vga->get_keyword_vga($keyword);
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('search_vga', $data);
            $this->load->view('partials/footer');
        }
    }

    public function hapus_vga($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->session->set_flashdata('flash', 'Dihapus');

            $where = ['id' => $id];

            $this->db->where($where);
            $this->db->delete('m_vga');
            redirect('VGA');
        }
    }
}
