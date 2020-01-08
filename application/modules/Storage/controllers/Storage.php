<?php
class Storage extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_storage');
        $this->load->library('form_validation');
    }

    // STORAGE

    public function index()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Master Storage';
            $data['storage'] = $this->M_storage->tampil_storage()->result();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('storage', $data);
            $this->load->view('partials/footer');
        }
    }

    public function tambah_storage()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('brand_storage', 'Brand Storage', 'required', [
                'required' => 'Brand Storage harus diisi.'
            ]);
            $this->form_validation->set_rules('nama_storage', 'Storage', 'required|trim|is_unique[m_storage.nama_storage]', [
                'required' => 'Storage harus diisi.',
                'is_unique' => 'Data sudah digunakan.'
            ]);
            $this->form_validation->set_rules('type', 'Type', 'required', [
                'required' => 'Type harus diisi.'
            ]);
            $this->form_validation->set_rules('kapasitas', 'Kapasitas', 'required', [
                'required' => 'Kapasitas harus diisi.'
            ]);


            if ($this->form_validation->run() == false) {
                $data['judul'] = 'Tambah Brand Storage';
                $data['brand_storage'] = $this->M_storage->tampil_brand_storage()->result();
                $data['type'] = ['HDD', 'SSD'];
                $data['kapasitas_storage'] = $this->M_storage->tampil_kapasitas()->result();
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('tambah_storage');
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Ditambahkan');

                $brand_storage = htmlspecialchars($this->input->post('brand_storage', true));
                $storage = htmlspecialchars(strtoupper($this->input->post('nama_storage', true)));
                $type = htmlspecialchars($this->input->post('type', true));
                $kapasitas = htmlspecialchars($this->input->post('kapasitas', true));

                $data = array(
                    'brand_storage_id' => $brand_storage,
                    'nama_storage' => $storage,
                    'type_storage' => $type,
                    'kapasitas_id' => $kapasitas
                );

                $this->db->insert('m_storage', $data);
                redirect('Storage');
            }
        }
    }

    public function ubah_storage($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Ubah Data Storage';
            $where = array('storage_id' => $id);
            $data['storage'] = $this->M_storage->ubah_storage($where)->result();
            $data['brand_storage'] = $this->M_storage->tampil_brand_storage()->result();
            $data['kapasitas'] = $this->M_storage->tampil_kapasitas()->result();
            $data['type'] = ['HDD', 'SSD'];
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('ubah_storage', $data);
            $this->load->view('partials/footer');
        }
    }

    public function aksi_ubah_storage()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('brand_storage', 'Brand Storage', 'required', [
                'required' => 'Brand Storage harus diisi.'
            ]);
            $this->form_validation->set_rules('nama_storage', 'Type Brand', 'required|trim|is_unique[m_storage.nama_storage]', [
                'required'  => 'Type Brand harus diisi.',
                'is_unique' => 'Data sudah digunakan.'
            ]);
            $this->form_validation->set_rules('type', 'Type Storage', 'required', [
                'required' => 'Type Storage harus diisi.'
            ]);


            if ($this->form_validation->run() == false) {
                $id = htmlspecialchars($this->input->post('id', true));

                $data['judul'] = 'Ubah Data Storage';
                $where = array('storage_id' => $id);
                $data['storage'] = $this->M_storage->ubah_storage($where)->result();
                $data['brand_storage'] = $this->M_storage->tampil_brand_storage()->result();
                $data['type'] = ['HDD', 'SSD'];
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('ubah_storage', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Diubah');

                $id = htmlspecialchars($this->input->post('id', true));

                $brand_storage = htmlspecialchars($this->input->post('brand_storage', true));
                $nama_storage = htmlspecialchars(strtoupper($this->input->post('nama_storage', true)));
                $type = htmlspecialchars($this->input->post('type', true));

                $where = array('id' => $id);

                $data = [
                    'brand_storage' => $brand_storage,
                    'nama_storage' => $nama_storage,
                    'type' => $type
                ];

                $this->db->where($where);
                $this->db->update('m_storage', $data);
                redirect('Storage');
            }
        }
    }

    public function hapus_storage($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->session->set_flashdata('flash', 'Dihapus');

            $where = array('storage_id' => $id);
            $this->db->where($where);
            $this->db->delete('m_storage');
            redirect('Storage');
        }
    }

    public function search_storage()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $keyword = htmlspecialchars($this->input->post('keyword', true));

            $data['judul'] = 'Master Storage';
            $data['id'] = $this->db->get('m_storage')->row();
            $data['storage'] = $this->M_storage->get_keyword_storage($keyword);
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('search_storage', $data);
            $this->load->view('partials/footer');
        }
    }

    // BRAND STORAGE

    public function brand_storage()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Master Brand Storage';
            $data['storage'] = $this->M_storage->tampil_brand_storage()->result();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('brand_storage', $data);
            $this->load->view('partials/footer');
        }
    }

    public function tambah_brand_storage()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('id_brand_storage', 'ID Brand Storage', 'required|trim|is_unique[m_brand_storage.brand_storage_id]|numeric|is_natural_no_zero|max_length[8]', [
                'required' => 'ID Brand Storage harus diisi.',
                'is_unique' => 'Data sudah digunakan.',
                'is_natural_no_zero' => 'ID Brand Storage hanya boleh berisi angka dan harus lebih besar dari nol.',
                'max_length' => 'ID Brand Storage harus berisi 8 karakter.'
            ]);
            $this->form_validation->set_rules('brand_storage', 'Brand Storage', 'required|trim|is_unique[m_brand_storage.brand_storage]', [
                'required' => 'Brand Storage harus diisi.',
                'is_unique' => 'Data sudah digunakan.'
            ]);
            $this->form_validation->set_rules('type', 'Type Storage', 'required', [
                'required' => 'Type Storage harus diisi.'
            ]);

            if ($this->form_validation->run() == false) {
                $data['judul'] = 'Tambah Brand Storage';
                $data['type'] = ['HDD', 'SSD'];
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('tambah_brand_storage');
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Ditambahkan');

                $id = htmlspecialchars($this->input->post('id_brand_storage', true));
                $brand_storage = htmlspecialchars(strtoupper($this->input->post('brand_storage', true)));
                $type = htmlspecialchars($this->input->post('type', true));

                $data = array(
                    'brand_storage_id' => $id,
                    'brand_storage' => $brand_storage,
                    'type_storage' => $type
                );

                $this->db->insert('m_brand_storage', $data);
                redirect('Storage/brand_storage');
            }
        }
    }

    public function ubah_brand_storage($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Ubah Data Brand Storage';
            $where = array('brand_storage_id' => $id);
            $data['storage'] = $this->M_storage->ubah_brand_storage($where)->result();
            $data['type'] = ['HDD', 'SSD'];
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('ubah_brand_storage', $data);
            $this->load->view('partials/footer');
        }
    }

    public function aksi_ubah_brand_storage()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('brand_storage', 'Brand Storage', 'required|trim|is_unique[m_brand_storage.brand_storage]');

            if ($this->form_validation->run() == false) {
                $id = htmlspecialchars($this->input->post('id', true));

                $data['judul'] = 'Ubah Data Brand Storage';
                $where = array('brand_storage_id' => $id);
                $data['storage'] = $this->M_storage->ubah_brand_storage($where)->result();
                $data['type'] = ['HDD', 'SSD'];
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('ubah_brand_storage', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Diubah');

                $id = htmlspecialchars($this->input->post('id', true));

                $brand_storage = htmlspecialchars(strtoupper($this->input->post('brand_storage', true)));
                $type = htmlspecialchars($this->input->post('type', true));

                $where = array('brand_storage_id' => $id);

                $data = [
                    'brand_storage' => $brand_storage,
                    'type_storage' => $type
                ];

                $this->db->where($where);
                $this->db->update('m_brand_storage', $data);
                redirect('Storage/brand_storage');
            }
        }
    }

    public function hapus_brand_storage($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->session->set_flashdata('flash', 'Dihapus');

            $where = array('brand_storage_id' => $id);
            $this->db->where($where);
            $this->db->delete('m_brand_storage');
            redirect('Storage/brand_storage');
        }
    }

    public function search_brand_storage()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $keyword = htmlspecialchars($this->input->post('keyword', true));

            $data['judul'] = 'Master Brand';
            $data['id'] = $this->db->get('m_brand_storage')->row();
            $data['storage'] = $this->M_storage->get_keyword_brand_storage($keyword);
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('search_brand_storage', $data);
            $this->load->view('partials/footer');
        }
    }

    // KAPASITAS STORAGE

    public function kapasitas_storage()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Master Kapasitas';
            $data['kapasitas_storage'] = $this->M_storage->tampil_kapasitas()->result();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('kapasitas_storage', $data);
            $this->load->view('partials/footer');
        }
    }

    public function tambah_kapasitas_storage()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('id_kapasitas_storage', 'ID Kapasitas Storage', 'required|numeric|is_unique[m_kapasitas_storage.kapasitas_id]|is_natural_no_zero', [
                'required' => 'ID Kapasitas Storage harus diisi.',
                'is_unique' => 'Data sudah digunakan.',
                'is_natural_no_zero' => 'ID Kapasitas Storage hanya boleh berisi angka dan lebih dari nol.'
            ]);
            $this->form_validation->set_rules('kapasitas_storage', 'Kapasitas Storage', 'required|numeric|is_unique[m_kapasitas_storage.kapasitas_storage]|is_natural_no_zero', [
                'required' => 'Kapasitas Storage harus diisi.',
                'is_unique' => 'Data sudah digunakan.',
                'is_natural_no_zero' => 'Kapasitas Storage hanya boleh berisi angka dan lebih dari nol.'
            ]);
            $this->form_validation->set_rules('satuan', 'Satuan Kapasitas', 'required', [
                'required' => 'Satuan Kapasitas harus diisi.'
            ]);

            if ($this->form_validation->run() == false) {
                $data['judul'] = 'Master Kapasitas';
                $data['kapasitas_storage'] = $this->M_storage->tampil_kapasitas()->result();
                $data['satuan'] = ['GB', 'TB'];
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('tambah_kapasitas_storage', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Ditambahkan');

                $id = htmlspecialchars($this->input->post('id_kapasitas_storage', true));
                $kapasitas_storage =  htmlspecialchars($this->input->post('kapasitas_storage', true));
                $satuan =  htmlspecialchars($this->input->post('satuan', true));

                $data = array(
                    'kapasitas_id' => $id,
                    'kapasitas_storage' => $kapasitas_storage,
                    'satuan' => $satuan
                );

                $this->db->insert('m_kapasitas_storage', $data);
                redirect('Storage/kapasitas_storage');
            }
        }
    }

    public function ubah_kapasitas_storage($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Ubah Data Kapasitas Storage';
            $where = array('kapasitas_id' => $id);
            $data['kapasitas_storage'] = $this->M_storage->ubah_kapasitas($where)->result();
            $data['satuan'] = ['GB', 'TB'];
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('ubah_kapasitas_storage', $data);
            $this->load->view('partials/footer');
        }
    }

    public function aksi_ubah_kapasitas_storage()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('kapasitas_storage', 'Kapasitas Storage', 'required|trim|is_unique[m_kapasitas_storage.kapasitas_storage]|is_natural_no_zero', [
                'required' => 'Kapasitas Storage harus diisi.',
                'is_unique' => 'Data sudah digunakan.',
                'is_natural_no_zero' => 'Kapasitas Storage hanya boleh berisi angka dan lebih dari nol.'
            ]);
            $this->form_validation->set_rules('satuan', 'Satuan', 'required', [
                'required' => 'Satuan harus diisi.'
            ]);

            if ($this->form_validation->run() == false) {
                $id = htmlspecialchars($this->input->post('kapasitas_id', true));

                $data['judul'] = 'Ubah Data Kapasitas Storage';
                $where = array('kapasitas_id' => $id);
                $data['kapasitas_storage'] = $this->M_storage->ubah_kapasitas($where)->result();
                $data['satuan'] = ['GB', 'TB'];
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('ubah_kapasitas_storage', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Diubah');

                $id = htmlspecialchars($this->input->post('kapasitas_id', true));

                $kapasitas_storage = htmlspecialchars($this->input->post('kapasitas_storage', true));
                $satuan = htmlspecialchars($this->input->post('satuan', true));

                $where = array('kapasitas_id' => $id);

                $data = [
                    'kapasitas_storage' => $kapasitas_storage,
                    'satuan' => $satuan
                ];

                $this->db->where($where);
                $this->db->update('m_kapasitas_storage', $data);
                redirect('Storage/kapasitas_storage');
            }
        }
    }

    public function hapus_kapasitas_storage($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->session->set_flashdata('flash', 'Dihapus');

            $where = array('kapasitas_id' => $id);
            $this->db->where($where);
            $this->db->delete('m_kapasitas_storage');
            redirect('Storage/kapasitas_storage');
        }
    }

    public function search_kapasitas_storage()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $keyword = htmlspecialchars($this->input->post('keyword', true));

            $data['judul'] = 'Master Kapasitas';
            $data['id'] = $this->db->get('m_kapasitas_storage')->row();
            $data['kapasitas_storage'] = $this->M_storage->get_keyword_kapasitas_storage($keyword);
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('search_kapasitas_storage', $data);
            $this->load->view('partials/footer');
        }
    }
}
