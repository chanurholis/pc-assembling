<?php
class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_login');
    }

    public function index()
    {
        $data['judul'] = 'Login PCA';
        $this->load->view('login', $data);
    }

    public function aksi()
    {
        $id_user = htmlspecialchars($this->input->post('id_user', true));
        $password = htmlspecialchars($this->input->post('password', true));

        $user = $this->db->get_where('user', ['id_user' => $id_user])->row_array();

        $where = array(
            'id_user' => $user['id_user']
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
