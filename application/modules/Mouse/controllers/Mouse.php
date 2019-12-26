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
            $this->form_validation->set_rules('mouse_id', 'ID Mouse', 'required|trim|is_unique[m_mouse.mouse_id]|numeric|is_natural_no_zero|max_length[8]', [
                'required' => 'ID Mouse harus diisi.',
                'is_unique' => 'Data sudah digunakan',
                'is_natural_no_zero' => 'ID Mouse hanya boleh berisi angka dan harus lebih besar daru nol.',
                'max_length' => 'ID Mouse hanya boleh berisi 8 karakter.'
            ]);
            $this->form_validation->set_rules('nama_mouse', 'Mouse', 'required|trim|is_unique[m_mouse.nama_mouse]', [
                'required' => 'Mouse harus diisi.',
                'is_unique' => 'Data sudah digunakan.'
            ]);

            if ($this->form_validation->run() == false) {
                $data['judul'] = 'Tambah Data Master Mouse';
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('tambah_mouse', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Ditambahkan');

                $id = htmlspecialchars($this->input->post('mouse_id'));
                $nama_mouse = htmlspecialchars($this->input->post('nama_mouse', true));

                $data = [
                    'mouse_id' => $id,
                    'nama_mouse' => $nama_mouse
                ];

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
            $where = ['mouse_id' => $id];
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
            $this->form_validation->set_rules('nama_mouse', 'Mouse', 'required|trim|is_unique[m_mouse.nama_mouse]', [
                'required' => 'Mouse harus diisi.',
                'is_unique' => 'Data sudah digunakan.'
            ]);

            if ($this->form_validation->run() == false) {
                $id = htmlspecialchars($this->input->post('id'));

                $data['judul'] = 'Ubah Data Master Mouse';
                $where = ['mouse_id' => $id];
                $data['mouse'] = $this->M_mouse->ubah_mouse($where)->result();
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('ubah_mouse', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Diubah');

                $id = htmlspecialchars($this->input->post('id'));
                $nama_mouse = htmlspecialchars($this->input->post('nama_mouse'));

                $where = ['mouse_id' => $id];

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

            $where = ['mouse_id' => $id];

            $this->db->where($where);
            $this->db->delete('m_mouse');
            redirect('Mouse');
        }
    }
}
