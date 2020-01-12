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
        if ($this->session->userdata('status') == NULL) {
            // Biarkan saja seperti itu.
        } else {
            $this->session->sess_destroy();
        }

        $this->form_validation->set_rules('username', 'Username', 'required', [
            'required' => 'Email harus diisi.'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required', [
            'required' => 'Password harus diisi.'
        ]);

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Login PCA';
            $this->load->view('login', $data);
        } else {
            $username = htmlspecialchars($this->input->post('username', true));
            $password = htmlspecialchars($this->input->post('password', true));

            $user = $this->db->get_where('user', ['username' => $username])->row_array();

            $where = array(
                'username' => $user['username']
            );

            $cek = $this->M_login->cek($where);
            if ($cek != NULL) {
                if ($user['is_active'] == 'Aktif') {
                    if (password_verify($password, $cek->password)) {

                        $data_session = array(
                            'username' => $user['username'],
                            'role' => $user['role'],
                            'status' => 'login'
                        );

                        $data = ['last_login' => date('Y-m-d H:i:s')];

                        $this->db->where($where);
                        $this->db->update('user', $data);

                        $this->session->set_userdata($data_session);

                        $this->session->set_flashdata('login', 'Login');

                        redirect('Home');
                    } else {
                        $this->session->set_flashdata('message', '<small class="text-danger">
                        Mohon maaf, terjadi kesalahan.</small>');
                        redirect('/');
                    }
                } else {
                    $this->session->set_flashdata('message', '<small class="text-danger">
                    Mohon maaf, akun ini belum diaktivasi.</small>');
                    redirect('/');
                }
            } else {
                $this->session->set_flashdata('message', '<small class="text-danger">
                Mohon maaf, terjadi kesalahan.</small>');
                redirect('/');
            }
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect('/');
    }

    public function forgot()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Forgot Password';
            $this->load->view('forgot_password', $data);
        } else {
            $email = htmlspecialchars($this->input->post('email'));
            $user = $this->db->get_where('user', ['email' => $email, 'is_active' => 1])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'datecreated' => time()
                ];

                $this->db->insert('user_token', $user_token);
            } else {

                $this->session->set_flashdata('message', '<small class="text-danger">
                Sorry this email is not registered or activated.</small>');
                redirect('Login/forgot');
            }
        }
    }

    private function _sendEmail($token, $type)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.google.com',
            'smtp_user' => '',
            'smtp_pass' => '',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->e;
    }
}
