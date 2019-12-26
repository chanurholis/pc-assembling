<?php
class Rakit extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_rakit');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Rakit PC';
            $data['institusi'] = ['POLTEKPOS', 'YPBPI', 'STIMLOG'];
            $data['processor'] = $this->M_rakit->tampil_processor()->result();
            $data['motherboard'] = $this->M_rakit->tampil_motherboard()->result();
            $data['ram'] = $this->M_rakit->tampil_ram()->result();
            $data['storage'] = $this->M_rakit->tampil_storage()->result();
            $data['casing'] = $this->M_rakit->tampil_casing()->result();
            $data['vga'] = $this->M_rakit->tampil_vga()->result();
            $data['psu'] = $this->M_rakit->tampil_psu()->result();
            $data['keyboard'] = $this->M_rakit->tampil_keyboard()->result();
            $data['mouse'] = $this->M_rakit->tampil_mouse()->result();
            $data['monitor'] = $this->M_rakit->tampil_monitor()->result();
            $this->load->view('partials/header', $data);
            if ($this->session->userdata('role')  == 'Admin') {
                $this->load->view('partials/sidebar_admin');
            } else {
                $this->load->view('partials/sidebar_member');
            }
            $this->load->view('rakit', $data);
            $this->load->view('partials/footer');
        }
    }

    public function rakit_pc()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('no_indeks', 'NO INDEKS', 'required|trim', [
                'required' => 'NO INDEKS harus diisi.'
            ]);
            $this->form_validation->set_rules('institusi', 'INSTITUSI', 'required|trim', [
                'required' => 'INSTITUSI harus diisi.'
            ]);
            $this->form_validation->set_rules('processor', 'PROCESSOR', 'required|trim', [
                'required' => 'PROCESSOR harus diisi.'
            ]);
            $this->form_validation->set_rules('motherboard', 'MOTHERBOARD', 'required|trim', [
                'required' => 'MOTHERBOARD harus diisi.'
            ]);
            $this->form_validation->set_rules('ram', 'RAM', 'required|trim', [
                'required' => 'RAM harus diisi.'
            ]);
            $this->form_validation->set_rules('storage', 'STORAGE', 'required|trim', [
                'required' => 'STORAGE harus diisi.'
            ]);
            $this->form_validation->set_rules('casing', 'CASING', 'required|trim', [
                'required' => 'CASING harus diisi.'
            ]);
            $this->form_validation->set_rules('vga', 'VGA', 'required|trim', [
                'required' => 'VGA harus diisi.'
            ]);
            $this->form_validation->set_rules('psu', 'PSU', 'required|trim', [
                'required' => 'PSU harus diisi.'
            ]);
            $this->form_validation->set_rules('keyboard', 'KEYBOARD', 'required|trim', [
                'required' => 'KEYBOARD harus diisi.'
            ]);
            $this->form_validation->set_rules('mouse', 'MOUSE', 'required|trim', [
                'required' => 'MOUSE harus diisi.'
            ]);
            $this->form_validation->set_rules('monitor', 'MONITOR', 'required|trim', [
                'required' => 'MONITOR harus diisi.'
            ]);
            $this->form_validation->set_rules('pengguna', 'PENGGUNA', 'required|trim', [
                'required' => 'PENGGUNA harus diisi.'
            ]);

            if ($this->form_validation->run() == false) {
                $data['judul'] = 'Rakit PC';
                $data['institusi'] = ['POLTEKPOS', 'YPBPI', 'STIMLOG'];
                $data['processor'] = $this->M_rakit->tampil_processor()->result();
                $data['motherboard'] = $this->M_rakit->tampil_motherboard()->result();
                $data['ram'] = $this->M_rakit->tampil_ram()->result();
                $data['storage'] = $this->M_rakit->tampil_storage()->result();
                $data['casing'] = $this->M_rakit->tampil_casing()->result();
                $data['vga'] = $this->M_rakit->tampil_vga()->result();
                $data['psu'] = $this->M_rakit->tampil_psu()->result();
                $data['keyboard'] = $this->M_rakit->tampil_keyboard()->result();
                $data['mouse'] = $this->M_rakit->tampil_mouse()->result();
                $data['monitor'] = $this->M_rakit->tampil_monitor()->result();
                $this->load->view('partials/header', $data);
                if ($this->session->userdata('role')  == 'Admin') {
                    $this->load->view('partials/sidebar_admin');
                } else {
                    $this->load->view('partials/sidebar_member');
                }
                $this->load->view('rakit', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Ditambahkan');

                $user = $this->session->userdata('username');
                $no_indeks = htmlspecialchars($this->input->post('no_indeks', true));
                $institusi = htmlspecialchars($this->input->post('institusi', true));
                $processor = htmlspecialchars($this->input->post('processor', true));
                $motherboard = htmlspecialchars($this->input->post('motherboard', true));
                $ram = htmlspecialchars($this->input->post('ram', true));
                $storage = htmlspecialchars($this->input->post('storage', true));
                $casing = htmlspecialchars($this->input->post('casing', true));
                $vga = htmlspecialchars($this->input->post('vga', true));
                $psu = htmlspecialchars($this->input->post('psu', true));
                $keyboard = htmlspecialchars($this->input->post('keyboard', true));
                $mouse = htmlspecialchars($this->input->post('mouse', true));
                $monitor = htmlspecialchars($this->input->post('monitor', true));
                $tgl_input = date('Y-m-d H:i:s');
                $pengguna = htmlspecialchars($this->input->post('pengguna', true));
                $tgl_diserahkan = htmlspecialchars($this->input->post('diserahkan', true));
                $bukti = $_FILES['image']['name'];

                if ($bukti == NULL) {
                    $bukti = 'default.jpg';
                } else {
                    $config['upload_path'] = './upload/bukti/';
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['max_size'] = 10240;
                    $config['file_name'] = 'item-' . date('dmy') . '-' . substr(md5(rand()), 0, 10);

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('image')) {
                        $error = array('error' => $this->upload->display_errors());
                        var_dump($error);
                        die;
                    }

                    $bukti = $this->upload->data('file_name');
                }

                $data = array(
                    'user' => $user,
                    'no_indeks' => $no_indeks,
                    'institusi' => $institusi,
                    'processor_id' => $processor,
                    'motherboard_id' => $motherboard,
                    'ram_id' => $ram,
                    'storage_id' => $storage,
                    'casing_id' => $casing,
                    'vga_id' => $vga,
                    'psu_id' => $psu,
                    'keyboard_id' => $keyboard,
                    'mouse_id' => $mouse,
                    'monitor_id' => $monitor,
                    'tgl_input' => $tgl_input,
                    'pengguna' => $pengguna,
                    'tgl_diserahkan' => $tgl_diserahkan,
                    'bukti' => $bukti
                );

                $this->db->insert('rakit', $data);
                redirect('Mypc');
            }
        }
    }
}
