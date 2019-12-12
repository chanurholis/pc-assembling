<?php
class RAM extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_ram');
        $this->load->library('form_validation');
    }

    // BRAND RAM

    public function brand_ram()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Master Brand RAM';
            $data['brand_ram'] = $this->M_ram->tampil_brand_ram()->result();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('brand_ram', $data);
            $this->load->view('partials/footer');
        }
    }

    public function tambah_brand_ram()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('brand_ram', 'Brand RAM', 'required|trim|is_unique[m_brand_ram.brand_ram]');

            if ($this->form_validation->run() == false) {
                $data['judul'] = 'Tambah Brand RAM';
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('tambah_brand_ram');
                $this->load->view('partials/footer');
            } else {

                $this->session->set_flashdata('flash', 'Ditambahkan');

                $brand_ram = htmlspecialchars($this->input->post('brand_ram', true));

                $data = array(
                    'brand_ram' => $brand_ram
                );

                $this->db->insert('m_brand_ram', $data);
                redirect('RAM/brand_ram');
            }
        }
    }

    public function ubah_brand_ram($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Ubah Data Brand RAM';
            $where = array('id' => $id);
            $data['brand_ram'] = $this->M_ram->ubah_brand_ram($where)->result();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('ubah_brand_ram', $data);
            $this->load->view('partials/footer');
        }
    }

    public function aksi_ubah_brand_ram()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('brand_ram', 'Brand RAM', 'required|trim|is_unique[m_brand_ram.brand_ram]');

            if ($this->form_validation->run() == false) {
                $id = htmlspecialchars($this->input->post('id', true));

                $data['judul'] = 'Ubah Data Brand RAM';
                $where = array('id' => $id);
                $data['brand_ram'] = $this->M_ram->ubah_brand_ram($where)->result();
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('ubah_brand_ram', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Diubah');

                $id = htmlspecialchars($this->input->post('id', true));
                $brand_ram = htmlspecialchars($this->input->post('brand_ram', true));

                $where = array('id' => $id);

                $data = array(
                    'brand_ram' => $brand_ram
                );

                $this->db->where($where);
                $this->db->update('m_brand_ram', $data);
                redirect('RAM/brand_ram');
            }
        }
    }

    public function hapus_brand_ram($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->session->set_flashdata('flash', 'Dihapus');

            $where = array('id' => $id);
            $this->M_ram->hapus($where, 'm_brand_ram');
            redirect('RAM/brand_ram');
        }
    }

    public function search_brand_ram()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $keyword = htmlspecialchars($this->input->post('keyword', true));
            $data['judul'] = 'Master Brand';
            $data['id'] = $this->db->get('m_brand_processor')->row();
            $data['brand_ram'] = $this->M_ram->get_keyword_brand_ram($keyword);
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('search_brand_ram', $data);
            $this->load->view('partials/footer');
        }
    }

    // DDR RAM

    public function ddr_ram()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Master DDR RAM';
            $data['ddr'] = $this->M_ram->tampil_ddr()->result();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('ddr_ram', $data);
            $this->load->view('partials/footer');
        }
    }

    public function tambah_ddr_ram()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('ddr_ram', 'DDR RAM', 'required|trim|is_unique[m_ddr_ram.ddr]|numeric|is_natural_no_zero');

            if ($this->form_validation->run() == false) {
                $data['judul'] = 'Master DDR RAM';
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('tambah_ddr_ram', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Ditambahkan');

                $ddr_ram = htmlspecialchars($this->input->post('ddr_ram', true));

                $data = array(
                    'ddr' => $ddr_ram
                );

                $this->db->insert('m_ddr_ram', $data);
                redirect('RAM/ddr_ram');
            }
        }
    }

    public function ubah_ddr_ram($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Ubah Data DDR RAM';
            $where = array('id' => $id);
            $data['ddr'] = $this->M_ram->ubah_ddr_ram($where)->result();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('ubah_ddr_ram', $data);
            $this->load->view('partials/footer');
        }
    }

    public function aksi_ubah_ddr_ram()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('ddr_ram', 'DDR RAM', 'required|trim|is_unique[m_ddr_ram.ddr]|numeric|is_natural_no_zero');

            if ($this->form_validation->run() == false) {
                $id = htmlspecialchars($this->input->post('id', true));

                $data['judul'] = 'Ubah Data DDR RAM';
                $where = array('id' => $id);
                $data['ddr'] = $this->M_ram->ubah_ddr_ram($where)->result();
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('ubah_ddr_ram', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Diubah');

                $id = htmlspecialchars($this->input->post('id', true));
                $ddr_ram = htmlspecialchars($this->input->post('ddr_ram', true));

                $where = array('id' => $id);

                $data = array(
                    'ddr' => $ddr_ram
                );

                $this->db->where($where);
                $this->db->update('m_ddr_ram', $data);
                redirect('RAM/ddr_ram');
            }
        }
    }

    public function hapus_ddr_ram($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->session->set_flashdata('flash', 'Dihapus');

            $where = array('id' => $id);
            $this->M_ram->hapus($where, 'm_ddr_ram');
            redirect('RAM/ddr_ram');
        }
    }

    public function search_ddr_ram()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $keyword = htmlspecialchars($this->input->post('keyword', true));
            $data['judul'] = 'Master RAM';
            $data['ddr'] = $this->M_ram->get_keyword_ddr_ram($keyword);
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('search_ddr_ram', $data);
            $this->load->view('partials/footer');
        }
    }

    // KAPASITAS

    public function kapasitas_ram()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Master Kapasitas RAM';
            $data['kapasitas_ram'] = $this->M_ram->tampil_kapasitas_ram()->result();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('kapasitas_ram', $data);
            $this->load->view('partials/footer');
        }
    }

    public function tambah_kapasitas_ram()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('kapasitas_ram', 'Kapasitas RAM', 'required|trim|is_unique[m_kapasitas_ram.kapasitas_ram]');

            if ($this->form_validation->run() == false) {
                $data['judul'] = 'Tambah Data Kapasitas RAM';
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('tambah_kapasitas_ram');
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Ditambahkan');

                $kapasitas_ram =  htmlspecialchars($this->input->post('kapasitas_ram', true));
                $satuan =  htmlspecialchars($this->input->post('satuan', true));

                if ($kapasitas_ram == 0) {
                    $this->session->set_flashdata('message', '<small class="text-danger">
                    Terjadi Kesalahan!</small>');
                    redirect('RAM/tambah_kapasitas_ram');
                } else {

                    $data = array(
                        'kapasitas_ram' => $kapasitas_ram,
                        'satuan' => $satuan
                    );

                    $this->db->insert('m_kapasitas_ram', $data);
                    redirect('RAM/kapasitas_ram');
                }
            }
        }
    }

    public function ubah_kapasitas_ram($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Ubah Data Kapasitas RAM';
            $where = array('id' => $id);
            $data['kapasitas_ram'] = $this->M_ram->ubah_kapasitas_ram($where)->result();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('ubah_kapasitas_ram', $data);
            $this->load->view('partials/footer');
        }
    }

    public function aksi_ubah_kapasitas_ram()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('kapasitas_ram', 'Kapasitas RAM', 'required|trim|is_unique[m_kapasitas_ram.kapasitas_ram]');

            if ($this->form_validation->run() == false) {
                $id = htmlspecialchars($this->input->post('id', true));

                $data['judul'] = 'Ubah Data Kapasitas RAM';
                $where = array('id' => $id);
                $data['kapasitas_ram'] = $this->M_ram->ubah_kapasitas_ram($where)->result();
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('ubah_kapasitas_ram', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Diubah');

                $id = htmlspecialchars($this->input->post('id', true));
                $kapasitas_ram = htmlspecialchars($this->input->post('kapasitas_ram', true));

                if ($kapasitas_ram == 0) {
                    $this->session->set_flashdata('message', '<small class="text-danger">
                    Terjadi Kesalahan!</small>');
                    redirect('RAM/tambah_kapasitas_ram');
                } else {
                    $where = array('id' => $id);

                    $data = array('kapasitas_ram' => $kapasitas_ram);

                    $this->db->where($where);
                    $this->db->update('m_kapasitas_ram', $data);
                    redirect('RAM/kapasitas_ram');
                }
            }
        }
    }

    public function hapus_kapasitas_ram($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->session->set_flashdata('flash', 'Dihapus');

            $where = array('id' => $id);
            $this->db->where($where);
            $this->db->delete('m_kapasitas_ram');
            redirect('RAM/kapasitas_ram');
        }
    }

    public function search_kapasitas_ram()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $keyword = htmlspecialchars($this->input->post('keyword', true));
            $data['judul'] = 'Master Brand';
            $data['id'] = $this->db->get('m_brand_processor')->row();
            $data['kapasitas_ram'] = $this->M_ram->get_keyword_kapasitas_ram($keyword);
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('search_kapasitas_ram', $data);
            $this->load->view('partials/footer');
        }
    }

    // RAM

    public function index()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Master RAM';
            $data['ram'] = $this->M_ram->tampil_ram()->result();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('ram', $data);
            $this->load->view('partials/footer');
        }
    }

    public function tambah_ram()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('ddr', 'DDR', 'required|trim');
            $this->form_validation->set_rules('brand_ram', 'Brand RAM', 'required|trim');
            $this->form_validation->set_rules('nama_ram', 'Type RAM', 'required|trim');
            $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|trim');

            if ($this->form_validation->run() == false) {
                $data['judul'] = 'Tambah Data RAM';
                $data['ddr'] = $this->M_ram->tampil_ddr()->result();
                $data['brand'] = $this->M_ram->tampil_brand_ram()->result();
                $data['kapasitas'] = $this->M_ram->tampil_kapasitas_ram()->result();
                $data['ram'] = $this->M_ram->tampil_ram()->result();
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('tambah_ram', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Ditambahkan');

                $ddr = htmlspecialchars($this->input->post('ddr', true));
                $brand_ram = htmlspecialchars($this->input->post('brand_ram', true));
                $nama_ram = htmlspecialchars($this->input->post('nama_ram', true));
                $kapasitas = htmlspecialchars($this->input->post('kapasitas', true));
                $satuan_kapasitas = htmlspecialchars($this->input->post('satuan', true));

                $data = array(
                    'ddr' => $ddr,
                    'brand_ram' => $brand_ram,
                    'nama_ram' => $nama_ram,
                    'kapasitas' => $kapasitas,
                    'satuan' => $satuan_kapasitas
                );
                $this->db->insert('m_ram', $data);
                redirect('RAM');
            }
        }
    }

    public function ubah_ram($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Ubah Data RAM';
            $data['brand'] = $this->M_ram->tampil_brand_ram()->result();
            $data['ddr'] = $this->M_ram->tampil_ddr()->result();
            $data['ram'] = $this->M_ram->ubah_ram($id);
            $data['kapasitas'] = $this->M_ram->tampil_kapasitas_ram()->result();
            $data['result'] = $this->M_ram->ram($id)->result();

            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('ubah_ram', $data);
            $this->load->view('partials/footer');
        }
    }

    public function aksi_ubah_ram()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('ddr', 'DDR', 'required|trim');
            $this->form_validation->set_rules('brand_ram', 'Brand RAM', 'required|trim');
            $this->form_validation->set_rules('nama_ram', 'Type RAM', 'required|trim');
            $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required|trim');

            if ($this->form_validation->run() == false) {
                $id = htmlspecialchars($this->input->post('id', true));

                $data['judul'] = 'Ubah Data RAM';
                $data['ddr'] = $this->M_ram->tampil_ddr()->result();
                $data['brand'] = $this->M_ram->tampil_brand_ram()->result();
                $data['kapasitas'] = $this->M_ram->tampil_kapasitas_ram()->result();
                $data['ram'] = $this->M_ram->ubah_ram($id);
                $data['result'] = $this->M_ram->ram($id)->result();
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('ubah_ram', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Diubah');

                $id = htmlspecialchars($this->input->post('id', true));
                $ddr = htmlspecialchars($this->input->post('ddr', true));
                $brand_ram = htmlspecialchars($this->input->post('brand_ram', true));
                $nama_ram = htmlspecialchars($this->input->post('nama_ram', true));
                $kapasitas = htmlspecialchars($this->input->post('kapasitas', true));
                $satuan_kapasitas = htmlspecialchars($this->input->post('satuan', true));

                $where = array('id' => $id);

                $data = array(
                    'ddr' => $ddr,
                    'brand_ram' => $brand_ram,
                    'nama_ram' => $nama_ram,
                    'kapasitas' => $kapasitas,
                    'satuan' => $satuan_kapasitas
                );

                $this->db->where($where);
                $this->db->update('m_ram', $data);
                redirect('RAM');
            }
        }
    }

    public function hapus_ram($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->session->set_flashdata('flash', 'Dihapus');

            $where = array('id' => $id);
            $this->M_ram->hapus($where, 'm_ram');
            redirect('RAM');
        }
    }

    public function search_ram()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $keyword = htmlspecialchars($this->input->post('keyword', true));
            $data['judul'] = 'Master RAM';
            $data['ram'] = $this->M_ram->get_keyword_ram($keyword);
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('search_ram', $data);
            $this->load->view('partials/footer');
        }
    }
}
