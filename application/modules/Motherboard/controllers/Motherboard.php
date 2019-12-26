<?php
class Motherboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_motherboard');
        $this->load->library('form_validation');
    }

    // MOTHERBOARD

    public function index()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Master Motherboard';
            $data['motherboard'] = $this->M_motherboard->tampil_motherboard()->result();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('motherboard', $data);
            $this->load->view('partials/footer');
        }
    }

    public function tambah_motherboard()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('brand_motherboard', 'Brand Motherboard', 'required', [
                'required' => 'Brand Motherboard harus diisi.'
            ]);
            $this->form_validation->set_rules('motherboard', 'Motherboard', 'required|trim|is_unique[m_motherboard.motherboard]', [
                'required' => 'Motherboard harus diisi.', 'is_unique' => 'Data sudah digunakan.'
            ]);

            if ($this->form_validation->run() == false) {
                $data['judul'] = 'Tambah Data Motherboard';
                $data['brand_motherboard'] = $this->M_motherboard->tampil_brand_motherboard()->result();
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('tambah_motherboard', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Ditambahkan');

                $brand_motherboard = htmlspecialchars($this->input->post('brand_motherboard', true));
                $motherboard = htmlspecialchars($this->input->post('motherboard', true));
                $data = array(
                    'brand_motherboard_id' => $brand_motherboard,
                    'motherboard' => $motherboard
                );
                $this->db->insert('m_motherboard', $data);
                redirect('Motherboard');
            }
        }
    }

    public function ubah_motherboard($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Ubah Data Motherboard';
            $where = array('motherboard_id' => $id);
            $data['motherboard'] = $this->M_motherboard->ubah_motherboard($where, 'motherboard')->result();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('ubah_motherboard', $data);
            $this->load->view('partials/footer');
        }
    }

    public function aksi_ubah_motherboard()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('nama_motherboard', 'Motherboard', 'required|trim|is_unique[m_motherboard.motherboard]', [
                'required' => 'Motherboard harus diisi.', 'is_unique' => 'Data sudah digunakan.'
            ]);

            if ($this->form_validation->run() == false) {
                $id = htmlspecialchars($this->input->post('id', true));

                $data['judul'] = 'Ubah Data Motherboard';
                $where = array('motherboard_id' => $id);
                $data['motherboard'] = $this->M_motherboard->ubah_motherboard($where, 'motherboard')->result();
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('ubah_motherboard', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Diubah');

                $id = htmlspecialchars($this->input->post('id', true));
                $nama_motherboard = htmlspecialchars($this->input->post('nama_motherboard', true));

                $where = array('motherboard_id' => $id);

                $data = array(
                    'motherboard' => $nama_motherboard
                );

                $this->db->where($where);
                $this->db->update('m_motherboard', $data);
                redirect('Motherboard');
            }
        }
    }

    public function hapus_motherboard($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->session->set_flashdata('flash', 'Dihapus');

            $where = array('motherboard_id' => $id);
            $this->M_motherboard->hapus($where, 'm_motherboard');
            redirect('Motherboard');
        }
    }

    public function search_motherboard()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $keyword = htmlspecialchars($this->input->post('keyword', true));
            $data['judul'] = 'Master Processor';
            $data['motherboard'] = $this->M_motherboard->get_keyword_motherboard($keyword);
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('search_motherboard', $data);
            $this->load->view('partials/footer');
        }
    }

    // BRAND MOTHERBOARD

    public function brand_motherboard()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Master Brand Motherboard';
            $data['motherboard'] = $this->M_motherboard->tampil_brand_motherboard()->result();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('brand_motherboard', $data);
            $this->load->view('partials/footer');
        }
    }

    public function tambah_brand_motherboard()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('brand_motherboard_id', 'Brand Motherboard', 'required|trim|is_unique[m_brand_motherboard.brand_motherboard_id]', [
                'required' => 'ID Brand Motherboard harus diisi.', 'is_unique' => 'Data sudah digunakan.'
            ]);
            $this->form_validation->set_rules('brand_motherboard', 'Brand Motherboard', 'required|trim|is_unique[m_brand_motherboard.brand_motherboard]', [
                'required' => 'Brand Motherboard harus diisi.', 'is_unique' => 'Data sudah digunakan.'
            ]);

            if ($this->form_validation->run() == false) {
                $data['judul'] = 'Tambah Data Brand Motherboard';
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('tambah_brand_motherboard', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Ditambahkan');

                $brand_motherboard_id = htmlspecialchars($this->input->post('brand_motherboard_id', true));
                $brand_motherboard = htmlspecialchars($this->input->post('brand_motherboard', true));
                $data = array('brand_motherboard_id' => $brand_motherboard_id, 'brand_motherboard' => $brand_motherboard);
                $this->db->insert('m_brand_motherboard', $data);
                redirect('Motherboard/brand_motherboard');
            }
        }
    }

    public function ubah_brand_motherboard($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Ubah Data Brand Motherboard';
            $where = array('brand_motherboard_id' => $id);
            $data['brand_motherboard'] = $this->M_motherboard->ubah_brand_motherboard($where)->result();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('ubah_brand_motherboard', $data);
            $this->load->view('partials/footer');
        }
    }

    public function aksi_ubah_brand_motherboard()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('brand_motherboard', 'Brand Motherboard', 'required|trim|is_unique[m_brand_motherboard.brand_motherboard]', [
                'required' => 'Brand Motherboard harus diisi.', 'is_unique' => 'Data sudah digunakan.'
            ]);

            if ($this->form_validation->run() == false) {
                $id = htmlspecialchars($this->input->post('id', true));

                $data['judul'] = 'Ubah Data Brand Motherboard';
                $where = array('brand_motherboard_id' => $id);
                $data['brand_motherboard'] = $this->M_motherboard->ubah_brand_motherboard($where)->result();
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('ubah_brand_motherboard', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Diubah');

                $id = htmlspecialchars($this->input->post('id', true));
                $brand_motherboard = htmlspecialchars($this->input->post('brand_motherboard', true));

                $where = array('brand_motherboard_id' => $id);

                $data = array(
                    'brand_motherboard' => $brand_motherboard
                );

                $this->db->where($where);
                $this->db->update('m_brand_motherboard', $data);
                redirect('Motherboard/brand_motherboard');
            }
        }
    }

    public function hapus_brand_motherboard($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->session->set_flashdata('flash', 'Dihapus');

            $where = array('brand_motherboard_id' => $id);
            $this->M_motherboard->hapus($where, 'm_brand_motherboard');
            redirect('Motherboard/brand_motherboard');
        }
    }

    public function search_brand_motherboard()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $keyword = htmlspecialchars($this->input->post('keyword', true));
            $data['judul'] = 'Master Brand';
            $data['id'] = $this->db->get('m_brand_motherboard')->row();
            $data['motherboard'] = $this->M_motherboard->get_keyword_brand_motherboard($keyword);
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('search_brand_motherboard', $data);
            $this->load->view('partials/footer');
        }
    }
}
