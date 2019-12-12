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
        $data['judul'] = 'Rakit PC';
        $data['processor_intel'] = $this->M_rakit->tampil_processor_intel()->result();
        $data['processor_amd'] = $this->M_rakit->tampil_processor_amd()->result();
        $data['motherboard_asrock'] = $this->M_rakit->tampil_motherboard_asrock()->result();
        $data['motherboard_msi'] = $this->M_rakit->tampil_motherboard_msi()->result();
        $data['ram_corsair'] = $this->M_rakit->tampil_ram_corsair()->result();
        $data['ram_gskill'] = $this->M_rakit->tampil_ram_gskill()->result();
        $data['storage_hdd'] = $this->M_rakit->tampil_storage_hdd()->result();
        $data['storage_ssd'] = $this->M_rakit->tampil_storage_ssd()->result();
        $data['casing'] = $this->M_rakit->tampil_casing()->result();
        $data['vga_addon'] = $this->M_rakit->tampil_vga_addon()->result();
        $data['vga_onboard'] = $this->M_rakit->tampil_vga_onboard()->result();
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

    public function rakit_pc()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->form_validation->set_rules('nama_pc', 'PC', 'required|trim');
            $this->form_validation->set_rules('institusi', 'Institusi', 'required|trim');
            $this->form_validation->set_rules('processor', 'Processor', 'required|trim');
            $this->form_validation->set_rules('motherboard', 'Motherboard', 'required|trim');
            $this->form_validation->set_rules('ram', 'RAM', 'required|trim');
            $this->form_validation->set_rules('storage', 'Storage', 'required');
            $this->form_validation->set_rules('casing', 'Casing', 'required|trim');
            $this->form_validation->set_rules('vga', 'VGA', 'required|trim');
            $this->form_validation->set_rules('psu', 'PSU', 'required|trim');
            $this->form_validation->set_rules('keyboard', 'Keyboard', 'required|trim');
            $this->form_validation->set_rules('mouse', 'Mouse', 'required|trim');
            $this->form_validation->set_rules('monitor', 'Monitor', 'required|trim');
            $this->form_validation->set_rules('pengguna', 'Pengguna', 'required|trim');

            if ($this->form_validation->run() == false) {
                $data['judul'] = 'Rakit PC';
                $data['processor_intel'] = $this->M_rakit->tampil_processor_intel()->result();
                $data['processor_amd'] = $this->M_rakit->tampil_processor_amd()->result();
                $data['motherboard_asrock'] = $this->M_rakit->tampil_motherboard_asrock()->result();
                $data['motherboard_msi'] = $this->M_rakit->tampil_motherboard_msi()->result();
                $data['ram_corsair'] = $this->M_rakit->tampil_ram_corsair()->result();
                $data['ram_gskill'] = $this->M_rakit->tampil_ram_gskill()->result();
                $data['storage_hdd'] = $this->M_rakit->tampil_storage_hdd()->result();
                $data['storage_ssd'] = $this->M_rakit->tampil_storage_ssd()->result();
                $data['casing'] = $this->M_rakit->tampil_casing()->result();
                $data['vga_addon'] = $this->M_rakit->tampil_vga_addon()->result();
                $data['vga_onboard'] = $this->M_rakit->tampil_vga_onboard()->result();
                $data['psu'] = $this->M_rakit->tampil_psu()->result();
                $data['keyboard'] = $this->M_rakit->tampil_keyboard()->result();
                $data['mouse'] = $this->M_rakit->tampil_mouse()->result();
                $data['monitor'] = $this->M_rakit->tampil_monitor()->result();
                $this->load->view('partials/header', $data);
                $this->load->view('partials/sidebar_admin');
                $this->load->view('rakit', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Ditambahkan');

                $user = $this->session->userdata('username');
                $nama_pc = htmlspecialchars($this->input->post('nama_pc', true));
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
                $tgl_input = date('d m Y');
                $pengguna = htmlspecialchars($this->input->post('pengguna', true));
                $tgl_diserahkan = htmlspecialchars($this->input->post('diserahkan', true));
                $bukti = $_FILES['image']['name'];

                if ($bukti == NULL) {
                    $bukti = 'default.jpg';
                } else {
                    $config['upload_path'] = './upload/bukti/';
                    $config['allowed_types'] = 'jpg|png|jpeg';
                    $config['max_size'] = 5120;
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
                    'nama_pc' => $nama_pc,
                    'institusi' => $institusi,
                    'processor' => $processor,
                    'motherboard' => $motherboard,
                    'ram' => $ram,
                    'storage' => $storage,
                    'casing' => $casing,
                    'vga' => $vga,
                    'psu' => $psu,
                    'keyboard' => $keyboard,
                    'mouse' => $mouse,
                    'monitor' => $monitor,
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
