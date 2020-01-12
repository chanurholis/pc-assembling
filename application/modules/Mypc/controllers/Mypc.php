<?php
class Mypc extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_mypc');
        $this->load->library('form_validation');
    }

    public function index()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $where = ['user' => $this->session->userdata('username')];

            $data['judul'] = 'My PC';
            $data['rakit'] = $this->M_mypc->tampil_mypc($where)->result();
            $this->load->view('partials/header', $data);
            if ($this->session->userdata('role')  == 'Admin') {
                $this->load->view('partials/sidebar_admin');
            } else {
                $this->load->view('partials/sidebar_member');
            }
            $this->load->view('mypc', $data);
            $this->load->view('partials/footer');
        }
    }

    public function ubah($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Ubah Data My PC';
            $data['institusi'] = ['POLTEKPOS', 'STIMLOG', 'YPBPI'];
            $data['processor'] = $this->M_mypc->tampil_processor()->result();
            $data['motherboard'] = $this->M_mypc->tampil_motherboard()->result();
            $data['ram'] = $this->M_mypc->tampil_ram()->result();
            $data['storage'] = $this->M_mypc->tampil_storage()->result();
            $data['casing'] = $this->M_mypc->tampil_casing()->result();
            $data['vga'] = $this->M_mypc->tampil_vga()->result();
            $data['psu'] = $this->M_mypc->tampil_psu()->result();
            $data['keyboard'] = $this->M_mypc->tampil_keyboard()->result();
            $data['mouse'] = $this->M_mypc->tampil_mouse()->result();
            $data['monitor'] = $this->M_mypc->tampil_monitor()->result();
            $where = ['rakit_id' => $id];
            $data['result'] = $this->M_mypc->ubah_mypc($where)->result();
            $this->load->view('partials/header', $data);
            if ($this->session->userdata('role') == 'Admin') {
                $this->load->view('partials/sidebar_admin');
            } else {
                $this->load->view('partials/sidebar_member');
            }
            $this->load->view('ubah', $data);
            $this->load->view('partials/footer');
        }
    }

    public function aksi_ubah_mypc()
    {
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

        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            if ($this->form_validation->run() == false) {
                $id = htmlspecialchars($this->input->post('id', true));
                $where = ['rakit_id' => $id];

                $data['judul'] = 'Ubah Data My PC';
                $data['institusi'] = ['POLTEKPOS', 'YPBPI', 'STIMLOG'];
                $data['processor'] = $this->M_mypc->tampil_processor()->result();
                $data['motherboard'] = $this->M_mypc->tampil_motherboard()->result();
                $data['ram'] = $this->M_mypc->tampil_ram()->result();
                $data['storage'] = $this->M_mypc->tampil_storage()->result();
                $data['casing'] = $this->M_mypc->tampil_casing()->result();
                $data['vga'] = $this->M_mypc->tampil_vga()->result();
                $data['psu'] = $this->M_mypc->tampil_psu()->result();
                $data['keyboard'] = $this->M_mypc->tampil_keyboard()->result();
                $data['mouse'] = $this->M_mypc->tampil_mouse()->result();
                $data['monitor'] = $this->M_mypc->tampil_monitor()->result();
                $data['result'] = $this->M_mypc->ubah_mypc($where)->result();
                $this->load->view('partials/header', $data);
                if ($this->session->userdata('role')  == 'Admin') {
                    $this->load->view('partials/sidebar_admin');
                } else {
                    $this->load->view('partials/sidebar_member');
                }
                $this->load->view('ubah', $data);
                $this->load->view('partials/footer');
            } else {
                $this->session->set_flashdata('flash', 'Diubah');

                $user = $this->session->userdata('username');
                $id = htmlspecialchars($this->input->post('id'));
                $no_indeks = htmlspecialchars(strtoupper($this->input->post('no_indeks', true)));
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
                $pengguna = htmlspecialchars(strtoupper($this->input->post('pengguna', true)));
                $tgl_diserahkan = htmlspecialchars($this->input->post('diserahkan', true));
                $bukti = $_FILES['image']['name'];

                $where = ['rakit_id' => $id];

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

                $this->db->where($where);
                $this->db->update('rakit', $data);
                redirect('Mypc');
            }
        }
    }

    public function detail($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Detail Data';
            $where = array('rakit_id' => $id);
            $data['date'] = $this->M_mypc->detail($where, 'rakit')->row_array();
            $data['result'] = $this->M_mypc->detail($where, 'rakit')->result();
            $this->load->view('partials/header', $data);
            if ($this->session->userdata('role') == 'Admin') {
                $this->load->view('partials/sidebar_admin');
            } else {
                $this->load->view('partials/sidebar_member');
            }
            $this->load->view('detail', $data);
            $this->load->view('partials/footer');
        }
    }

    public function hapus($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $this->session->set_flashdata('flash', 'Dihapus');

            $where = ['rakit_id' => $id];

            $this->db->where($where);
            $this->db->delete('rakit');
            redirect('Mypc');
        }
    }

    public function export_excel($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

            $excel = new PHPExcel();

            $excel->getProperties()->setCreator('PC Assemnling | Teknisi YPBPI')
                ->setLastModifiedBy('Teknisi YPBPI')
                ->setTitle("PC Assembling")
                ->setSubject("Simulasi Rakit PC")
                ->setDescription("Laporan Hasil Simulasi Rakit PC")
                ->setKeywords("PCA");

            $style_col = array(
                'font' => array('bold' => true),
                'alignment' => array(
                    'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_LEFT,
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
                ),
                'borders'    => array(
                    'top'    => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                    'right'  => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                    'left'   => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
                )
            );

            $style_row = array(
                'alignment' => array(
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
                ),
                'borders'    => array(
                    'top'    => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                    'right'  => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                    'left'   => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
                )
            );

            $excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN HASIL RAKIT PC");
            $excel->getActiveSheet()->mergeCells('A1:N2');
            $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
            $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
            $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_JUSTIFY);

            $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO INDEKS");
            $excel->setActiveSheetIndex(0)->setCellValue('B3', "INSTITUSI");
            $excel->setActiveSheetIndex(0)->setCellValue('C3', "PENGGUNA");
            $excel->setActiveSheetIndex(0)->setCellValue('D3', "PROCESSOR");
            $excel->setActiveSheetIndex(0)->setCellValue('E3', "MOTHERBOARD");
            $excel->setActiveSheetIndex(0)->setCellValue('F3', "RAM");
            $excel->setActiveSheetIndex(0)->setCellValue('G3', "STORAGE");
            $excel->setActiveSheetIndex(0)->setCellValue('H3', "CASING");
            $excel->setActiveSheetIndex(0)->setCellValue('I3', "VGA");
            $excel->setActiveSheetIndex(0)->setCellValue('J3', "PSU");
            $excel->setActiveSheetIndex(0)->setCellValue('K3', "KEYBOARD");
            $excel->setActiveSheetIndex(0)->setCellValue('L3', "MOUSE");
            $excel->setActiveSheetIndex(0)->setCellValue('M3', "MONITOR");
            $excel->setActiveSheetIndex(0)->setCellValue('N3', "DISERAHKAN");

            $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
            $excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);

            $where = ['rakit_id' => $id];

            $result = $this->M_mypc->tampil_export($where)->result();

            $numrow = 4;
            foreach ($result as $data) {
                $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $data->no_indeks);
                $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->institusi);
                $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->pengguna);
                $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->brand_processor . " " . $data->nama_processor);
                $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->brand_motherboard . " " . $data->motherboard);
                $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->brand_ram . " " . $data->nama_ram . " DDR " . $data->ddr . " " . $data->kapasitas_ram . $data->satuan_ram);
                $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data->brand_storage . " " . $data->nama_storage . " " . $data->type_storage . " " . $data->kapasitas_storage . $data->satuan_storage);
                $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data->nama_casing);
                $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $data->nama_vga . " " . $data->type_vga);
                $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $data->nama_psu);
                $excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $data->nama_keyboard);
                $excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, $data->nama_mouse);
                $excel->setActiveSheetIndex(0)->setCellValue('M' . $numrow, $data->nama_monitor);
                $excel->setActiveSheetIndex(0)->setCellValue('N' . $numrow, $data->tgl_diserahkan);

                $excel->getActiveSheet()->getStyle('A' . $numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('B' . $numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('C' . $numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('D' . $numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('E' . $numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('F' . $numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('G' . $numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('H' . $numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('I' . $numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('J' . $numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('K' . $numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('L' . $numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('M' . $numrow)->applyFromArray($style_row);
                $excel->getActiveSheet()->getStyle('N' . $numrow)->applyFromArray($style_row);

                $numrow++;
            }

            $excel->getActiveSheet()->getColumnDimension('A')->setWidth(20);
            $excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
            $excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
            $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
            $excel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
            $excel->getActiveSheet()->getColumnDimension('F')->setWidth(20);
            $excel->getActiveSheet()->getColumnDimension('G')->setWidth(20);
            $excel->getActiveSheet()->getColumnDimension('H')->setWidth(20);
            $excel->getActiveSheet()->getColumnDimension('I')->setWidth(20);
            $excel->getActiveSheet()->getColumnDimension('J')->setWidth(20);
            $excel->getActiveSheet()->getColumnDimension('K')->setWidth(20);
            $excel->getActiveSheet()->getColumnDimension('L')->setWidth(20);
            $excel->getActiveSheet()->getColumnDimension('M')->setWidth(20);
            $excel->getActiveSheet()->getColumnDimension('N')->setWidth(20);

            $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

            $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

            $excel->getActiveSheet(0)->setTitle("Laporan Hasil Rakit PC");
            $excel->setActiveSheetIndex(0);

            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="Laporan Hasil Rakit PC.xlsx"'); // Set nama file excel nya
            header('Cache-Control: max-age=0');
            $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
            $write->save('php://output');
        }
    }
}
