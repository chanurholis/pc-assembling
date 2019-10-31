<?php
class Master extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_master');
        $this->load->library('form_validation');
    }

    public function index()
    {
        redirect('home');
    }



    // PROCESSOR

    public function processor()
    {
        $data['judul'] = 'Master Processor';
        $data['processor'] = $this->M_master->tampil_processor()->result();
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/processor', $data);
        $this->load->view('partials/footer');
    }

    public function tambah_processor()
    {
        $data['judul'] = 'Tambah Data Processor';
        $data['brand_processor'] = $this->M_master->brand_processor()->result();
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/tambah_processor', $data);
        $this->load->view('partials/footer');
    }

    public function aksi_processor()
    {
        $brand_processor = htmlspecialchars($this->input->post('brand_processor', true));
        $nama_processor = htmlspecialchars($this->input->post('processor', true));

        $data = array(
            'brand_processor' => $brand_processor,
            'nama_processor' => $nama_processor
        );

        $this->db->insert('m_processor', $data);
        redirect('master/processor');
    }

    public function brand_processor()
    {
        $data['judul'] = 'Master Brand Processor';
        $data['processor'] = $this->M_master->tampil_brand_processor()->result();
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/brand_processor', $data);
        $this->load->view('partials/footer');
    }

    public function tambah_brand_processor()
    {
        $this->form_validation->set_rules('brand_processor', 'Brand Processor', 'required|is_unique[m_brand_processor.brand_processor]|trim');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Tambah Data Brand Processor';
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar');
            $this->load->view('master/tambah_brand_processor', $data);
            $this->load->view('partials/footer');
        } else {
            $this->session->set_flashdata('flash', 'ditambah');

            $brand_processor = htmlspecialchars($this->input->post('brand_processor', true));

            $data = array(
                'brand_processor' => $brand_processor,
            );

            $this->db->insert('m_brand_processor', $data);
            redirect('master/brand_processor');
        }
    }

    public function ubah_processor($id)
    {
        $data['judul'] = 'Ubah Data Processor';
        $where = array('id' => $id);
        $data['processor'] = $this->M_master->ubah_processor($where, 'processor')->result();
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/ubah_processor', $data);
        $this->load->view('partials/footer');
    }

    public function aksi_ubah_processor()
    {
        $id = htmlspecialchars($this->input->post('id', true));
        $nama_processor = htmlspecialchars($this->input->post('nama_processor', true));

        $where = array('id' => $id);

        $data = array(
            'nama_processor' => $nama_processor
        );

        $this->db->where($where);
        $this->db->update('m_processor', $data);
        redirect('master/processor');
    }

    public function ubah_brand_processor($id)
    {
        $data['judul'] = 'Ubah Data Brand Processor';
        $where = array('id' => $id);
        $data['brand_processor'] = $this->M_master->ubah_brand_processor($where)->result();
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/ubah_brand_processor', $data);
        $this->load->view('partials/footer');
    }

    public function aksi_ubah_brand_processor()
    {
        $id = htmlspecialchars($this->input->post('id', true));
        $brand_processor = htmlspecialchars($this->input->post('brand_processor', true));

        $where = array('id' => $id);

        $data = array(
            'brand_processor' => $brand_processor
        );

        $this->db->where($where);
        $this->db->update('m_brand_processor', $data);
        redirect('master/brand_processor');
    }

    public function hapus_processor($id)
    {
        $where = array('id' => $id);
        $this->M_master->hapus($where, 'm_processor');
        redirect('master/processor');
    }

    public function hapus_brand_processor($id)
    {
        $where = array('id' => $id);
        $this->M_master->hapus($where, 'm_brand_processor');
        redirect('master/brand_processor');
    }

    public function search_brand_processor()
    {
        $keyword = htmlspecialchars($this->input->post('keyword', true));
        $data['judul'] = 'Master Brand';
        $data['id'] = $this->db->get('m_brand_processor')->row();
        $data['processor'] = $this->M_master->get_keyword_brand_processor($keyword);
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/search_brand_processor', $data);
        $this->load->view('partials/footer');
    }

    public function search_processor()
    {
        $keyword = htmlspecialchars($this->input->post('keyword', true));
        $data['judul'] = 'Master Processor';
        $data['id'] = $this->db->get('m_processor')->row();
        $data['processor'] = $this->M_master->get_keyword_processor($keyword);
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/search_processor', $data);
        $this->load->view('partials/footer');
    }



    // MOTHERBOARD

    public function motherboard()
    {
        $data['judul'] = 'Master Motherboard';
        $data['motherboard'] = $this->M_master->tampil_motherboard()->result();
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/motherboard', $data);
        $this->load->view('partials/footer');
    }

    public function tambah_motherboard()
    {
        $data['judul'] = 'Tambah Data Motherboard';
        $data['brand_motherboard'] = $this->M_master->tampil_brand_motherboard()->result();
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/tambah_motherboard', $data);
        $this->load->view('partials/footer');
    }

    public function aksi_motherboard()
    {
        $brand_motherboard = htmlspecialchars($this->input->post('brand_motherboard', true));
        $motherboard = htmlspecialchars($this->input->post('motherboard', true));
        $data = array(
            'brand_motherboard' => $brand_motherboard,
            'motherboard' => $motherboard
        );
        $this->db->insert('m_motherboard', $data);
        redirect('master/motherboard');
    }

    public function brand_motherboard()
    {
        $data['judul'] = 'Master Brand Motherboard';
        $data['motherboard'] = $this->M_master->tampil_brand_motherboard()->result();
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/brand_motherboard', $data);
        $this->load->view('partials/footer');
    }

    public function tambah_brand_motherboard()
    {
        $data['judul'] = 'Tambah Data Brand Motherboard';
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/tambah_brand_motherboard', $data);
        $this->load->view('partials/footer');
    }

    public function aksi_brand_motherboard()
    {
        $brand_motherboard = htmlspecialchars($this->input->post('brand_motherboard', true));
        $data = array('brand_motherboard' => $brand_motherboard);
        $this->db->insert('m_brand_motherboard', $data);
        redirect('master/brand_motherboard');
    }

    public function ubah_motherboard($id)
    {
        $data['judul'] = 'Ubah Data Motherboard';
        $where = array('id' => $id);
        $data['motherboard'] = $this->M_master->ubah_motherboard($where, 'motherboard')->result();
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/ubah_motherboard', $data);
        $this->load->view('partials/footer');
    }

    public function aksi_ubah_motherboard()
    {
        $id = htmlspecialchars($this->input->post('id', true));
        $nama_motherboard = htmlspecialchars($this->input->post('nama_motherboard', true));

        $where = array('id' => $id);

        $data = array(
            'nama_motherboard' => $nama_motherboard
        );

        $this->db->where($where);
        $this->db->update('m_motherboard', $data);
        redirect('master/motherboard');
    }

    public function ubah_brand_motherboard($id)
    {
        $data['judul'] = 'Ubah Data Brand Motherboard';
        $where = array('id' => $id);
        $data['brand_motherboard'] = $this->M_master->ubah_brand_motherboard($where)->result();
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/ubah_brand_motherboard', $data);
        $this->load->view('partials/footer');
    }

    public function aksi_ubah_brand_motherboard()
    {
        $id = htmlspecialchars($this->input->post('id', true));
        $brand_motherboard = htmlspecialchars($this->input->post('brand_motherboard', true));

        $where = array('id' => $id);

        $data = array(
            'brand_motherboard' => $brand_motherboard
        );

        $this->db->where($where);
        $this->db->update('m_brand_motherboard', $data);
        redirect('master/brand_motherboard');
    }

    public function hapus_motherboard($id)
    {
        $where = array('id' => $id);
        $this->M_master->hapus($where, 'm_motherboard');
        redirect('master/motherboard');
    }

    public function hapus_brand_motherboard($id)
    {
        $where = array('id' => $id);
        $this->M_master->hapus($where, 'm_brand_motherboard');
        redirect('master/brand_motherboard');
    }

    public function search_motherboard()
    {
        $keyword = htmlspecialchars($this->input->post('keyword', true));
        $data['judul'] = 'Master Processor';
        $data['motherboard'] = $this->M_master->get_keyword_motherboard($keyword);
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/search_motherboard', $data);
        $this->load->view('partials/footer');
    }

    public function search_brand_motherboard()
    {
        $keyword = htmlspecialchars($this->input->post('keyword', true));
        $data['judul'] = 'Master Brand';
        $data['id'] = $this->db->get('m_brand_motherboard')->row();
        $data['motherboard'] = $this->M_master->get_keyword_brand_motherboard($keyword);
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/search_brand_motherboard', $data);
        $this->load->view('partials/footer');
    }



    // RAM

    public function ram()
    {
        $data['judul'] = 'Master RAM';
        $data['ram'] = $this->M_master->tampil_ram()->result();
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/ram', $data);
        $this->load->view('partials/footer');
    }

    public function tambah_ram()
    {
        $data['judul'] = 'Tambah Data RAM';
        $data['ddr'] = $this->M_master->tampil_ddr()->result();
        $data['brand'] = $this->M_master->tampil_brand_ram()->result();
        $data['kapasitas'] = $this->M_master->tampil_kapasitas_ram()->result();
        $data['ram'] = $this->M_master->tampil_ram()->result();
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/tambah_ram', $data);
        $this->load->view('partials/footer');
    }

    public function aksi_ram()
    {
        $ddr = htmlspecialchars($this->input->post('ddr', true));
        $brand_ram = htmlspecialchars($this->input->post('brand_ram', true));
        $nama_ram = htmlspecialchars($this->input->post('nama_ram', true));
        $kapasitas = htmlspecialchars($this->input->post('kapasitas', true));
        $satuan_kapasitas = htmlspecialchars($this->input->post('satuan_kapasitas', true));

        $data = array(
            'ddr' => $ddr,
            'brand_ram' => $brand_ram,
            'nama_ram' => $nama_ram,
            'kapasitas' => $kapasitas,
            'satuan_kapasitas' => $satuan_kapasitas
        );
        $this->db->insert('m_ram', $data);
        redirect('master/ram');
    }

    public function ubah_ram($id)
    {
        $data['judul'] = 'Ubah Data RAM';
        $data['ddr'] = $this->M_master->tampil_ddr()->result();
        $data['brand'] = $this->M_master->tampil_brand_ram()->result();
        $data['kapasitas'] = $this->M_master->tampil_kapasitas_ram()->result();
        $data['ram'] = $this->M_master->ubah_ram($id);
        $data['result'] = $this->M_master->ram($id)->result();
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/ubah_ram', $data);
        $this->load->view('partials/footer');
    }

    public function aksi_ubah_ram()
    {
        $id = htmlspecialchars($this->input->post('id', true));
        $ddr = htmlspecialchars($this->input->post('ddr', true));
        $brand_ram = htmlspecialchars($this->input->post('brand_ram', true));
        $nama_ram = htmlspecialchars($this->input->post('nama_ram', true));
        $kapasitas = htmlspecialchars($this->input->post('kapasitas', true));
        $satuan_kapasitas = htmlspecialchars($this->input->post('satuan_kapasitas', true));

        $where = array('id' => $id);

        $data = array(
            'ddr' => $ddr,
            'brand_ram' => $brand_ram,
            'nama_ram' => $nama_ram,
            'kapasitas' => $kapasitas,
            'satuan_kapasitas' => $satuan_kapasitas
        );

        $this->db->where($where);
        $this->db->update('m_ram', $data);
        redirect('master/ram');
    }

    public function hapus_ram($id)
    {
        $where = array('id' => $id);
        $this->M_master->hapus($where, 'm_ram');
        redirect('master/ram');
    }

    public function ddr_ram()
    {
        $data['judul'] = 'Master DDR RAM';
        $data['ddr'] = $this->M_master->tampil_ddr()->result();
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/ddr_ram', $data);
        $this->load->view('partials/footer');
    }

    public function tambah_ddr_ram()
    {
        $data['judul'] = 'Master DDR RAM';
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/tambah_ddr_ram', $data);
        $this->load->view('partials/footer');
    }

    public function aksi_ddr_ram()
    {
        $ddr_ram = htmlspecialchars($this->input->post('ddr_ram', true));

        $data = array(
            'ddr' => $ddr_ram
        );

        $this->db->insert('m_ddr_ram', $data);
        redirect('master/ddr_ram');
    }

    public function hapus_ddr_ram($id)
    {
        $where = array('id' => $id);
        $this->M_master->hapus($where, 'm_ddr_ram');
        redirect('master/ddr_ram');
    }

    public function brand_ram()
    {
        $data['judul'] = 'Master Brand RAM';
        $data['brand_ram'] = $this->M_master->tampil_brand_ram()->result();
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/brand_ram', $data);
        $this->load->view('partials/footer');
    }

    public function tambah_brand_ram()
    {
        $data['judul'] = 'Tambah Brand RAM';
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/tambah_brand_ram');
        $this->load->view('partials/footer');
    }

    public function aksi_brand_ram()
    {
        $brand_ram = htmlspecialchars($this->input->post('brand_ram', true));

        $data = array(
            'brand_ram' => $brand_ram
        );

        $this->db->insert('m_brand_ram', $data);
        redirect('master/brand_ram');
    }

    public function ubah_ddr_ram($id)
    {
        $data['judul'] = 'Ubah Data DDR RAM';
        $where = array('id' => $id);
        $data['ddr'] = $this->M_master->ubah_ddr_ram($where)->result();
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/ubah_ddr_ram', $data);
        $this->load->view('partials/footer');
    }

    public function aksi_ubah_ddr_ram()
    {
        $id = htmlspecialchars($this->input->post('id', true));
        $ddr_ram = htmlspecialchars($this->input->post('ddr_ram', true));

        $where = array('id' => $id);

        $data = array(
            'ddr' => $ddr_ram
        );

        $this->db->where($where);
        $this->db->update('m_ddr_ram', $data);
        redirect('master/ddr_ram');
    }

    public function ubah_brand_ram($id)
    {
        $data['judul'] = 'Ubah Data Brand RAM';
        $where = array('id' => $id);
        $data['brand_ram'] = $this->M_master->ubah_brand_ram($where)->result();
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/ubah_brand_ram', $data);
        $this->load->view('partials/footer');
    }

    public function aksi_ubah_brand_ram()
    {
        $id = htmlspecialchars($this->input->post('id', true));
        $brand_ram = htmlspecialchars($this->input->post('brand_ram', true));

        $where = array('id' => $id);

        $data = array(
            'brand_ram' => $brand_ram
        );

        $this->db->where($where);
        $this->db->update('m_brand_ram', $data);
        redirect('master/brand_ram');
    }

    public function hapus_brand_ram($id)
    {
        $where = array('id' => $id);
        $this->M_master->hapus($where, 'm_brand_ram');
        redirect('master/brand_ram');
    }

    public function search_ram()
    {
        $keyword = htmlspecialchars($this->input->post('keyword', true));
        $data['judul'] = 'Master RAM';
        $data['ram'] = $this->M_master->get_keyword_ram($keyword);
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/search_ram', $data);
        $this->load->view('partials/footer');
    }

    public function search_ddr_ram()
    {
        $keyword = htmlspecialchars($this->input->post('keyword', true));
        $data['judul'] = 'Master RAM';
        $data['ddr'] = $this->M_master->get_keyword_ddr_ram($keyword);
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/search_ddr_ram', $data);
        $this->load->view('partials/footer');
    }

    public function search_brand_ram()
    {
        $keyword = htmlspecialchars($this->input->post('keyword', true));
        $data['judul'] = 'Master Brand';
        $data['id'] = $this->db->get('m_brand_processor')->row();
        $data['brand_ram'] = $this->M_master->get_keyword_brand_ram($keyword);
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/search_brand_ram', $data);
        $this->load->view('partials/footer');
    }

    public function kapasitas_ram()
    {
        $data['judul'] = 'Master Kapasitas RAM';
        $data['kapasitas_ram'] = $this->M_master->tampil_kapasitas_ram()->result();
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/kapasitas_ram', $data);
        $this->load->view('partials/footer');
    }

    public function tambah_kapasitas_ram()
    {
        $data['judul'] = 'Tambah Data Kapasitas RAM';
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/tambah_kapasitas_ram');
        $this->load->view('partials/footer');
    }

    public function aksi_kapasitas_ram()
    {
        $kapasitas_ram =  htmlspecialchars($this->input->post('kapasitas_ram', true));
        $satuan =  htmlspecialchars($this->input->post('satuan', true));

        $data = array(
            'kapasitas_ram' => $kapasitas_ram,
            'satuan' => $satuan
        );

        $this->db->insert('m_kapasitas_ram', $data);
        redirect('master/kapasitas_ram');
    }

    public function ubah_kapasitas_ram($id)
    {
        $data['judul'] = 'Ubah Data Kapasitas RAM';
        $where = array('id' => $id);
        $data['kapasitas_ram'] = $this->M_master->ubah_kapasitas_ram($where)->result();
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/ubah_kapasitas_ram', $data);
        $this->load->view('partials/footer');
    }

    public function aksi_ubah_kapasitas_ram()
    {
        $id = htmlspecialchars($this->input->post('id', true));
        $kapasitas_ram = htmlspecialchars($this->input->post('kapasitas_ram', true));

        $where = array('id' => $id);

        $data = array('kapasitas_ram' => $kapasitas_ram);

        $this->db->where($where);
        $this->db->update('m_kapasitas_ram', $data);
        redirect('master/kapasitas_ram');
    }

    public function hapus_kapasitas_ram($id)
    {
        $where = array('id' => $id);
        $this->db->where($where);
        $this->db->delete('m_kapasitas_ram');
        redirect('master/kapasitas_ram');
    }

    public function search_kapasitas_ram()
    {
        $keyword = htmlspecialchars($this->input->post('keyword', true));
        $data['judul'] = 'Master Brand';
        $data['id'] = $this->db->get('m_brand_processor')->row();
        $data['kapasitas_ram'] = $this->M_master->get_keyword_kapasitas_ram($keyword);
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/search_kapasitas_ram', $data);
        $this->load->view('partials/footer');
    }



    // HARDISK

    public function hardisk()
    {
        $data['judul'] = 'Master Hardisk';
        $data['hardisk'] = $this->M_master->tampil_hardisk()->result();
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/hardisk', $data);
        $this->load->view('partials/footer');
    }

    public function tambah_hardisk()
    {
        $data['judul'] = 'Tambah Data Hardisk';
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/tambah_hardisk');
        $this->load->view('partials/footer');
    }

    public function aksi_hardisk()
    {
        $hardisk = htmlspecialchars($this->input->post('hardisk', true));
        $data = array('hardisk' => $hardisk);
        $this->db->insert('master', $data);
        redirect('master/hardisk');
    }

    public function brand_hardisk()
    {
        $data['judul'] = 'Master Brand Hardisk';
        $data['brand_hardisk'] = $this->M_master->tampil_brand_hardisk()->result();
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/brand_hardisk', $data);
        $this->load->view('partials/footer');
    }

    public function tambah_brand_hardisk()
    {
        $data['judul'] = 'Tambah Brand Hardisk';
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('master/tambah_brand_hardisk');
        $this->load->view('partials/footer');
    }

    public function aksi_brand_hardisk()
    {
        $brand_hardisk = htmlspecialchars($this->input->post('brand_hardisk', true));

        $data = array(
            'brand_hardisk' => $brand_hardisk
        );

        $this->db->insert('m_brand_hardisk', $data);
        redirect('master/brand_hardisk');
    }

    public function ssd()
    {
        $data['judul'] = 'Master SSD';
        $data['master'] = $this->M_master->tampil()->result();
        $this->load->view('master/ssd', $data);
    }

    public function tambah_ssd()
    {
        $data['judul'] = 'Tambah Data SSD';
        $this->load->view('master/tambah_ssd', $data);
    }

    public function aksi_ssd()
    {
        $ssd = htmlspecialchars($this->input->post('ssd', true));
        $data = array('ssd' => $ssd);
        $this->db->insert('master', $data);
        redirect('master/ssd');
    }

    public function casing()
    {
        $data['judul'] = 'Master Casing';
        $data['master'] = $this->M_master->tampil()->result();
        $this->load->view('master/casing', $data);
    }

    public function tambah_casing()
    {
        $data['judul'] = 'Tambah Data Casing';
        $this->load->view('master/tambah_casing', $data);
    }

    public function aksi_casing()
    {
        $casing = htmlspecialchars($this->input->post('casing', true));
        $data = array('casing' => $casing);
        $this->db->insert('master', $data);
        redirect('master/casing');
    }

    public function vga()
    {
        $data['judul'] = 'Master VGA';
        $data['master'] = $this->M_master->tampil()->result();
        $this->load->view('master/vga', $data);
    }

    public function tambah_vga()
    {
        $data['judul'] = 'Tambah Data VGA';
        $this->load->view('master/tambah_vga', $data);
    }

    public function aksi_vga()
    {
        $vga = htmlspecialchars($this->input->post('vga', true));
        $data = array('vga' => $vga);
        $this->db->insert('master', $data);
        redirect('master/vga');
    }

    public function psu()
    {
        $data['judul'] = 'Master PSU';
        $data['master'] = $this->M_master->tampil()->result();
        $this->load->view('master/psu', $data);
    }

    public function tambah_psu()
    {
        $data['judul'] = 'Tambah Data PSU';
        $this->load->view('master/tambah_psu', $data);
    }

    public function aksi_psu()
    {
        $psu = htmlspecialchars($this->input->post('psu', true));
        $data = array('psu' => $psu);
        $this->db->insert('master', $data);
        redirect('master');
    }

    public function keyboard()
    {
        $data['judul'] = 'Master Keyboard';
        $data['master'] = $this->M_master->tampil()->result();
        $this->load->view('master/keyboard', $data);
    }

    public function tambah_keyboard()
    {
        $data['judul'] = 'Tambah Data Keyboard';
        $this->load->view('master/tambah_keyboard', $data);
    }

    public function aksi_keyboard()
    {
        $keyboard = htmlspecialchars($this->input->post('keybord', true));
        $data = array('keyboard' => $keyboard);
        $this->db->insert('master', $data);
        redirect('master/keyboard');
    }

    public function mouse()
    {
        $data['judul'] = 'Master Mouse';
        $data['master'] = $this->M_master->tampil()->result();
        $this->load->view('master/mouse', $data);
    }

    public function tambah_mouse()
    {
        $data['judul'] = 'Tambah Data Mouse';
        $this->load->view('master/tambah_mouse', $data);
    }

    public function aksi_mouse()
    {
        $mouse = htmlspecialchars($this->input->post('mouse', true));
        $data = array('mouse' => $mouse);
        $this->db->insert('master', $data);
        redirect('master/mouse');
    }

    public function monitor()
    {
        $data['judul'] = 'Master Monitor';
        $data['master'] = $this->M_master->tampil()->result();
        $this->load->view('master/monitor', $data);
    }

    public function tambah_monitor()
    {
        $data['judul'] = 'Tambah Data Monitor';
        $this->load->view('master/tambah_monitor', $data);
    }

    public function aksi_monitor()
    {
        $monitor = htmlspecialchars($this->input->post('monitor', true));
        $data = array('monitor' => $monitor);
        $this->db->insert('master', $data);
        redirect('master/monitor');
    }
}
