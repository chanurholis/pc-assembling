<?php
class Keyboard extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_keyboard');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Master Keyboard';
            $data['keyboard'] = $this->M_keyboard->tampil_keyboard()->result();
            $this->load->view('partials/header', $data);
            $this->load->view('partials/sidebar_admin');
            $this->load->view('keyboard', $data);
            $this->load->view('partials/footer');
        }
    }

    public function tambah_keyboard()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('keyboard_id', 'ID Keyboard', 'required|trim|is_unique[m_keyboard.keyboard_id]|numeric|is_natural_no_zero|max_length[8]', [
                'required' => 'ID Keyboard harus diisi.',
                'is_unique' => 'Data sudah digunakan.',
                'is_natural_no_zero' => 'ID Keyboard hanya boleh berisi angka dan harus lebih dari nol.',
                'max_length' => 'ID Keyboard hanya boleh berisi 8 karakter.'
            ]);
            $this->form_validation->set_rules('nama_keyboard', 'Keyboard', 'required|trim|is_unique[m_keyboard.nama_keyboard]', [
                'required' => 'Keyboard harus diisi.',
                'is_unique' => 'Data sudah digunakan.'
            ]);

            if ($this->form_validation->run() == false) {
                $data['judul'] = 'Tambah Data Master Keyboard';
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('tambah_keyboard');
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Ditambahkan');

                $id = htmlspecialchars($this->input->post('keyboard_id'));
                $nama_keyboard = htmlspecialchars($this->input->post('nama_keyboard', true));

                $data = [
                    'keyboard_id' => $id,
                    'nama_keyboard' => $nama_keyboard
                ];

                $this->db->insert('m_keyboard', $data);
                redirect('Keyboard');
            }
        }
    }

    public function ubah_keyboard($id)
    {
        $data['judul'] = 'Ubah Data Master Keyboard';
        $where = ['keyboard_id' => $id];
        $data['keyboard'] = $this->M_keyboard->ubah_keyboard($where)->result();
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar_admin');
        $this->load->view('ubah_keyboard', $data);
        $this->load->view('partials/footer');
    }

    public function aksi_ubah_keyboard()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('nama_keyboard', 'Keyboard', 'required|trim|is_unique[m_keyboard.nama_keyboard]', [
                'required' => 'Keyboard harus diisi.',
                'is_unique' => 'Data sudah digunakan.'
            ]);

            if ($this->form_validation->run() == false) {
                $id = htmlspecialchars($this->input->post('id', true));

                $where = ['keyboard_id' => $id];
                $data['keyboard'] = $this->M_keyboard->ubah_keyboard($where)->result();
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('ubah_keyboard', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Diubah');

                $id = htmlspecialchars($this->input->post('id', true));
                $nama_keyboard = htmlspecialchars($this->input->post('nama_keyboard'));

                $where = ['keyboard_id' => $id];

                $data = ['nama_keyboard' => $nama_keyboard];

                $this->db->where($where);
                $this->db->update('m_keyboard', $data);
                redirect('Keyboard');
            }
        }
    }

    public function hapus_keyboard($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->session->set_flashdata('flash', 'Dihapus');

            $where = ['keyboard_id' => $id];

            $this->db->where($where);
            $this->db->delete('m_keyboard');
            redirect('Keyboard');
        }
    }

    public function search_keyboard()
    {
        $keyword = htmlspecialchars($this->input->post('keyword', true));
        $data['judul'] = 'Master Keyboard';
        $data['id'] = $this->db->get('m_keyboard')->row();
        $data['keyboard'] = $this->M_keyboard->get_keyword_keyboard($keyword);
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar_admin');
        $this->load->view('search_keyboard', $data);
        $this->load->view('partials/footer');
    }
}
