<?php
class User extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_user');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            if ($this->session->userdata('role') == 'Member') {
                $url = base_url('Home');
                redirect($url);
            } else {
                $data['judul'] = 'User';
                $data['user'] = $this->M_user->tampil_user()->result();
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('user', $data);
                $this->load->view('partials/footer');
            }
        }
    }

    public function tambah_user()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            if ($this->session->userdata('role') == 'Member') {
                $url = base_url('Home');
                redirect($url);
            } else {
                $this->form_validation->set_rules('username', 'Username', 'required|is_unique[user.username]|trim', [
                    'required' => 'Username harus diisi.',
                    'is_unique' => 'Username sudah digunakan.'
                ]);
                $this->form_validation->set_rules('role', 'Role', 'required', [
                    'required' => 'Role harus diisi.'
                ]);

                if ($this->form_validation->run() == false) {
                    $data['judul'] = 'Tambah Data Brand Processor';
                    $data['role']  = ['Admin', 'Member'];
                    $this->load->view('partials/header', $data);
                    $this->load->view('partials/sidebar_admin');
                    $this->load->view('tambah_user', $data);
                    $this->load->view('partials/footer');
                } else {
                    $this->session->set_flashdata('flash', 'Ditambahkan');

                    $username = htmlspecialchars($this->input->post('username'));
                    $password = password_hash($username, PASSWORD_DEFAULT);
                    $role = htmlspecialchars($this->input->post('role'));

                    $data = [
                        'username'  => $username,
                        'password'  => $password,
                        'role'      => $role,
                        'is_active' => 'Tidak Aktif'
                    ];

                    $this->db->insert('user', $data);
                    redirect('User');
                }
            }
        }
    }

    public function Ubah_user($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            if ($this->session->userdata('role') == 'Member') {
                $url = base_url('Home');
                redirect($url);
            } else {
                $where = ['id' => $id];
                $data['judul'] = 'Ubah User';
                $data['role'] = ['Admin', 'Member'];
                $data['status'] = ['Aktif', 'Tidak Aktif'];
                $data['user'] = $this->M_user->ubah_user($where)->result();
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('ubah_user', $data);
                $this->load->view('partials/footer');
            }
        }
    }

    public function aksi_ubah_user()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            if ($this->session->userdata('role') == 'Member') {
                $url = base_url('Home');
                redirect($url);
            } else {
                $this->form_validation->set_rules('username', 'Username', 'required|trim', [
                    'required' => 'Username harus diisi.'
                ]);

                $this->form_validation->set_rules('role', 'Role', 'required', [
                    'required' => 'Role harus diisi.'
                ]);

                $this->form_validation->set_rules('role', 'Role', 'required', [
                    'required' => 'Role harus diisi.'
                ]);

                if ($this->form_validation->run() == false) {
                    $id = htmlspecialchars($this->input->post('id'));
                    $where = ['id' => $id];
                    $data['judul'] = 'Ubah User';
                    $data['role'] = ['Admin', 'Member'];
                    $data['status'] = ['Aktif', 'Tidak Aktif'];
                    $data['user'] = $this->M_user->ubah_user($where)->result();
                    $this->load->view('partials/header', $data);
                    $this->load->view('partials/sidebar_admin');
                    $this->load->view('ubah_user', $data);
                    $this->load->view('partials/footer');
                } else {
                    $this->session->set_flashdata('flash', 'Diubah');

                    $id = htmlspecialchars($this->input->post('id'));
                    $username = htmlspecialchars($this->input->post('username'));
                    $role = htmlspecialchars($this->input->post('role'));
                    $status = htmlspecialchars($this->input->post('status'));

                    $where = ['id' => $id];

                    $data = [
                        'username' => $username,
                        'role' => $role,
                        'is_active' => $status
                    ];

                    $this->db->where($where);
                    $this->db->update('user', $data);
                    redirect('User');
                }
            }
        }
    }

    public function reset_password($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            if ($this->session->userdata('role') == 'Member') {
                $url = base_url('Home');
                redirect($url);
            } else {
                $this->session->set_flashdata('flash', 'Direset');

                $where = ['id' => $id];

                $username = $this->db->get_where('user', $where)->row_array();

                $data = ['password' => password_hash($username['username'], PASSWORD_DEFAULT)];

                $this->db->where($where);
                $this->db->update('user', $data);
                redirect('User');
            }
        }
    }

    public function search_user()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            if ($this->session->userdata('role') == 'Member') {
                $url = base_url('Home');
                redirect($url);
            } else {
                $keyword = htmlspecialchars($this->input->post('keyword', true));
                $data['judul'] = 'User';
                $data['id'] = $this->db->get('user')->row();
                $data['user'] = $this->M_user->get_keyword_user($keyword);
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('search_user', $data);
                $this->load->view('partials/footer');
            }
        }
    }

    public function hapus_user($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            if ($this->session->userdata('role') == 'Member') {
                $url = base_url('Home');
                redirect($url);
            } else {
                $this->session->set_flashdata('flash', 'Dihapus');

                $where = ['id' => $id];

                $this->db->where($where);
                $this->db->delete('user');
                redirect('User');
            }
        }
    }
}
