<?php
class Processor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_processor');
        $this->load->library('form_validation');
    }

    // PROCESSOR

    public function index()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Master Processor';
            $data['processor'] = $this->M_processor->tampil_processor()->result();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('processor', $data);
            $this->load->view('partials/footer');
        }
    }

    public function tambah_processor()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('brand_processor', 'Brand Processor', 'required|trim', [
                'required' => 'Brand Processor harus diisi.'
            ]);
            $this->form_validation->set_rules('processor', 'Processor', 'required|is_unique[m_processor.nama_processor]|trim', [
                'required' => 'Type Processor harus diisi.', 'is_unique' => 'Data sudah digunakan.'
            ]);

            if ($this->form_validation->run() == false) {
                $data['judul'] = 'Tambah Data Processor';
                $data['brand_processor'] = $this->M_processor->brand_processor()->result();
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('tambah_processor', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Ditambahkan');

                $brand_processor = htmlspecialchars($this->input->post('brand_processor', true));
                $nama_processor = htmlspecialchars($this->input->post('processor', true));

                $data = array(
                    'brand_processor_id' => $brand_processor,
                    'nama_processor' => $nama_processor
                );

                $this->db->insert('m_processor', $data);
                redirect('Processor/processor');
            }
        }
    }

    public function ubah_processor($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Ubah Data Processor';
            $where = array('processor_id' => $id);
            $data['processor'] = $this->M_processor->ubah_processor($where, 'processor')->result();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('ubah_processor', $data);
            $this->load->view('partials/footer');
        }
    }

    public function aksi_ubah_processor()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('nama_processor', 'Processor', 'required|trim|is_unique[m_processor.nama_processor]', [
                'required' => 'Type Processor harus diisi.', 'is_unique' => 'Data sudah digunakan.'
            ]);

            if ($this->form_validation->run() == false) {
                $id = htmlspecialchars($this->input->post('id', true));

                $data['judul'] = 'Ubah Data Processor';
                $where = array('processor_id' => $id);
                $data['processor'] = $this->M_processor->ubah_processor($where, 'processor')->result();
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('ubah_processor', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Diubah');

                $id = htmlspecialchars($this->input->post('id', true));
                $nama_processor = htmlspecialchars($this->input->post('nama_processor', true));

                $where = array('processor_id' => $id);

                $data = array(
                    'nama_processor' => $nama_processor
                );

                $this->db->where($where);
                $this->db->update('m_processor', $data);
                redirect('Processor');
            }
        }
    }

    public function hapus_processor($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->session->set_flashdata('flash', 'Dihapus');

            $where = array('processor_id' => $id);
            $this->M_processor->hapus($where, 'm_processor');
            redirect('Processor');
        }
    }

    public function search_processor()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $keyword = htmlspecialchars($this->input->post('keyword', true));
            $data['judul'] = 'Master Processor';
            $data['id'] = $this->db->get('m_processor')->row();
            $data['processor'] = $this->M_processor->get_keyword_processor($keyword);
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('search_processor', $data);
            $this->load->view('partials/footer');
        }
    }

    // BRAND PROCESSOR

    public function brand_processor()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Master Brand Processor';
            $data['processor'] = $this->M_processor->tampil_brand_processor()->result();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin', $data);
            $this->load->view('brand_processor', $data);
            $this->load->view('partials/footer');
        }
    }

    public function tambah_brand_processor()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('id_brand_processor', 'ID Brand Processor', 'required|is_unique[m_brand_processor.brand_processor_id]|trim|numeric|is_natural_no_zero|max_length[8]', [
                'required' => 'ID Brand Processor harus diisi.',
                'is_unique' => 'Data sudah digunakan.',
                'is_natural_no_zero' => 'ID Brand Processor hanya boleh berisi angka dan harus lebih besar dari nol.',
                'numeric' => 'ID Brand Processor harus berisi angka.',
                'max_length' => 'ID Brand Processor hanya boleh berisi 8 karakter.'
            ]);
            $this->form_validation->set_rules('brand_processor', 'Brand Processor', 'required|is_unique[m_brand_processor.brand_processor]|trim', [
                'required' => 'Brand Processor harus diisi.', 'is_unique' => 'Data sudah digunakan.'
            ]);

            if ($this->form_validation->run() == false) {
                $data['judul'] = 'Tambah Data Brand Processor';
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('tambah_brand_processor', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Ditambahkan');

                $brand_processor_id = htmlspecialchars($this->input->post('id_brand_processor', true));
                $brand_processor = htmlspecialchars($this->input->post('brand_processor', true));

                $data = array(
                    'brand_processor_id' => $brand_processor_id,
                    'brand_processor' => $brand_processor,
                );

                $this->db->insert('m_brand_processor', $data);
                redirect('Processor/brand_processor');
            }
        }
    }

    public function ubah_brand_processor($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Ubah Data Brand Processor';
            $where = array('brand_processor_id' => $id);
            $data['brand_processor'] = $this->M_processor->ubah_brand_processor($where)->result();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('ubah_brand_processor', $data);
            $this->load->view('partials/footer');
        }
    }

    public function aksi_ubah_brand_processor()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('brand_processor', 'Brand Processor', 'required|trim|is_unique[m_brand_processor.brand_processor]', [
                'required' => 'Brand Processor harus diisi.',
                'is_unique' => 'Data sudah digunakan.'
            ]);

            if ($this->form_validation->run() == false) {

                $id = htmlspecialchars($this->input->post('id', true));

                $data['judul'] = 'Ubah Data Brand Processor';
                $where = array('brand_processor_id' => $id);
                $data['brand_processor'] = $this->M_processor->ubah_brand_processor($where)->result();
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('ubah_brand_processor', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Diubah');

                $id = htmlspecialchars($this->input->post('id', true));
                $brand_processor = htmlspecialchars($this->input->post('brand_processor', true));

                $where = array('brand_processor_id' => $id);

                $data = array(
                    'brand_processor' => $brand_processor
                );

                $this->db->where($where);
                $this->db->update('m_brand_processor', $data);
                redirect('Processor/brand_processor');
            }
        }
    }

    public function hapus_brand_processor($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->session->set_flashdata('flash', 'Dihapus');

            $where = array('brand_processor_id' => $id);
            $this->M_processor->hapus($where, 'm_brand_processor');
            redirect('Processor/brand_processor');
        }
    }

    public function search_brand_processor()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $keyword = htmlspecialchars($this->input->post('keyword', true));
            $data['judul'] = 'Master Brand';
            $data['id'] = $this->db->get('m_brand_processor')->row();
            $data['processor'] = $this->M_processor->get_keyword_brand_processor($keyword);
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('search_brand_processor', $data);
            $this->load->view('partials/footer');
        }
    }
}
