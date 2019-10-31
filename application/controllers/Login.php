<?php
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'valid_email|required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login PCA';
            $this->load->view('login', $data);
        } else {
            $email = htmlspecialchars($this->input->post('email', true));
            $password = htmlspecialchars($this->input->post('password', true));

            $user = $this->db->get_where('user', ['email' => $email])->row_array();

            $where = array(
                'email' => $user['email']
            );

            $cek = $this->M_login->cek($where);
            if ($cek != NULL) {
                if (password_verify($password, $cek->password)) {

                    $data_session = array(
                        'username' => $user['username'],
                        'level' => $user['role'],
                        'status' => 'login',
                    );

                    $this->session->set_userdata($data_session);
                    redirect('/home');
                } else {
                    $this->session->set_flashdata('message', '<small class="text-danger">
                    Terjadi Kesalahan!</small>');
                    redirect('/');
                }
            } else {
                $this->session->set_flashdata('message', '<small class="text-danger">
                Terjadi Kesalahan!</small>');
                redirect('/');
            }
        }
    }

    public function aksi()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = htmlspecialchars($this->input->post('password', true));

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        $where = array(
            'email' => $user['email']
        );

        $cek = $this->M_login->cek($where);
        if ($cek != NULL) {
            if (password_verify($password, $cek->password)) {

                $data_session = array(
                    'username' => $user['username'],
                    'level' => $user['role'],
                    'status' => 'login',
                );

                $this->session->set_userdata($data_session);
                redirect('/home');
            } else {
                redirect('/');
            }
        } else {
            redirect('/');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
