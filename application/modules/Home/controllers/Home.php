<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_home');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $role = $this->session->userdata('role');
        $status_login = $this->session->userdata('status');

        if ($status_login == NULL) {
            redirect('/');
        } else {

            if ($role == 'Admin') {

                $data['judul'] = 'Simulasi Rakit PC';
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('home', $data);
                $this->load->view('partials/footer');
            } elseif ($role == 'Member') {

                $data['judul'] = "Simulasi Rakit PC";
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_member');
                $this->load->view('home', $data);
                $this->load->view('partials/footer');
            }
        }
    }

    public function ubah_password()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Ubah Password';
            $this->load->view('partials/header', $data);
            if ($this->session->userdata('role') == 'Admin') {
                $this->load->view('partials/sidebar_admin');
            } else {
                $this->load->view('partials/sidebar_member');
            }
            $this->load->view('ubah_password');
            $this->load->view('partials/footer');
        }
    }

    public function aksi_ubah_password()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('password', 'Password', 'required|trim', [
                'required' => 'Password harus diisi.'
            ]);

            $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]|min_length[8]', [
                'required' => 'Password harus diisi.',
                'matches'  => 'Password tidak sesuai.',
                'min_length' => 'Password minimal 8 karakter.'
            ]);

            $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]|min_length[8]', [
                'required' => 'Password harus diisi.',
                'matches'  => 'Password tidak sesuai.',
                'min_length' => 'Password minimal 8 karakter.'
            ]);

            if ($this->form_validation->run() == false) {
                $data['judul'] = 'Ubah Password';
                $this->load->view('partials/header');
                if ($this->session->userdata('role') == 'Admin') {
                    $this->load->view('partials/sidebar_admin');
                } else {
                    $this->load->view('partials/sidebar_member');
                }
                $this->load->view('ubah_password');
                $this->load->view('partials/footer');
            } else {
                $where = ['username' => $this->session->userdata('username')];

                $cek = $this->db->get_where('user', $where)->row_array();

                $password_lama = htmlspecialchars($this->input->post('password'));

                if (password_verify($password_lama, $cek['password'])) {
                    $this->session->set_flashdata('flash', 'Diubah');

                    $where = ['username' => $this->session->userdata('username')];

                    $password = htmlspecialchars($this->input->post('password2'));

                    $data = ['password' => password_hash($password, PASSWORD_DEFAULT)];

                    $this->db->where($where);
                    $this->db->update('user', $data);
                    redirect('Home');
                } else {
                    $this->session->set_flashdata('message', '<small class="text-danger">
                    Mohon maaf, terjadi kesalahan.</small>');

                    $data['judul'] = 'Ubah Password';
                    $this->load->view('partials/header');
                    if ($this->session->userdata('role') == 'Admin') {
                        $this->load->view('partials/sidebar_admin');
                    } else {
                        $this->load->view('partials/sidebar_member');
                    }
                    $this->load->view('ubah_password');
                    $this->load->view('partials/footer');
                }
            }
        }
    }
}
