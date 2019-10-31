<?php
class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_data');
    }

    public function index()
    {
        $status_login = $this->session->userdata('status');
        if ($status_login == NULL) {
            redirect('/');
        }
        $data['judul'] = "Simulasi Rakit PC";
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('home', $data);
        $this->load->view('partials/footer');
    }

    public function tambah()
    {
        $user = $this->session->userdata('username');
        $nama_pc = htmlspecialchars($this->input->post('nama_pc', true));
        $institusi = htmlspecialchars($this->input->post('institusi', true));
        $processor = htmlspecialchars($this->input->post('processor', true));
        $motherboard = htmlspecialchars($this->input->post('motherboard', true));
        $ram = htmlspecialchars($this->input->post('ram', true));
        $hardisk = htmlspecialchars($this->input->post('hardisk', true));
        $ssd = htmlspecialchars($this->input->post('ssd', true));
        $casing = htmlspecialchars($this->input->post('casing', true));
        $vga = htmlspecialchars($this->input->post('vga', true));
        $psu = htmlspecialchars($this->input->post('psu', true));
        $keyboard = htmlspecialchars($this->input->post('keyboard', true));
        $mouse = htmlspecialchars($this->input->post('mouse', true));
        $monitor = htmlspecialchars($this->input->post('monitor', true));
        $tgl_input = date('d m Y');
        $pengguna = htmlspecialchars($this->input->post('pengguna', true));
        $tgl_digunakan = htmlspecialchars($this->input->post('digunakan', true));

        $data = array(
            'user' => $user,
            'nama_pc' => $nama_pc,
            'institusi' => $institusi,
            'processor' => $processor,
            'motherboard' => $motherboard,
            'ram' => $ram,
            'hardisk' => $hardisk,
            'ssd' => $ssd,
            'casing' => $casing,
            'vga' => $vga,
            'psu' => $psu,
            'keyboard' => $keyboard,
            'mouse' => $mouse,
            'monitor' => $monitor,
            'tgl_input' => $tgl_input,
            'pengguna' => $pengguna,
            'tgl_digunakan' => $tgl_digunakan
        );

        $this->db->insert('rakit', $data);
        redirect('home/result');
    }

    public function app()
    {
        $data['judul'] = 'Rakit PC';
        $data['brand_processor'] = $this->M_data->tampil_brand_processor()->result();
        $data['processor'] = $this->M_data->tampil_processor()->result();
        $data['motherboard'] = $this->M_data->tampil_motherboard()->result();
        $data['ram'] = $this->M_data->tampil_ram()->result();
        $data['hardisk'] = $this->M_data->tampil_hardisk()->result();
        $data['ssd'] = $this->M_data->tampil_ssd()->result();
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('app', $data);
        $this->load->view('partials/footer');
    }

    public function result()
    {
        $data['judul'] = 'My PC';
        $user = $this->session->userdata('username');
        $data['rakit'] = $this->M_data->tampil($user)->result();
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('data_table', $data);
        $this->load->view('partials/footer');
    }

    public function detail($id)
    {
        $data['judul'] = 'Detail Data';
        $where = array('id' => $id);
        $data['result'] = $this->M_data->detail($where, 'rakit')->result();
        $this->load->view('partials/header', $data);
        $this->load->view('partials/sidebar');
        $this->load->view('detail_data', $data);
        $this->load->view('partials/footer');
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->M_data->hapus($where, 'rakit');
        redirect('home/result');
    }


    public function export()
    {
        // Load plugin PHPExcel nya
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        // Panggil class PHPExcel nya
        $excel = new PHPExcel();

        // Settingan awal fil excel
        $excel->getProperties()->setCreator('PCA')
            ->setLastModifiedBy('PCA')
            ->setTitle("Rakit PC")
            ->setSubject("My PC")
            ->setDescription("Laporan Hasil Rakit PC")
            ->setKeywords("PC Assembling");

        // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
        $style_col = array(
            'font' => array('bold' => true), // Set font nya jadi bold
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
            )
        );

        // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
        $style_row = array(
            'alignment' => array(
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
            ),
            'borders' => array(
                'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
            )
        );

        $excel->setActiveSheetIndex(0)->setCellValue('A1', "My PC");
        $excel->getActiveSheet()->mergeCells('A1:O1');
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
        $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
        $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1

        // Buat header tabel nya pada baris ke 3
        $excel->setActiveSheetIndex(0)->setCellValue('A3', "NO");
        $excel->setActiveSheetIndex(0)->setCellValue('B3', "USER");
        $excel->setActiveSheetIndex(0)->setCellValue('C3', "NAMA PC");
        $excel->setActiveSheetIndex(0)->setCellValue('D3', "PROCESSOR");
        $excel->setActiveSheetIndex(0)->setCellValue('E3', "MOTHERBOARD");
        $excel->setActiveSheetIndex(0)->setCellValue('F3', "RAM");
        $excel->setActiveSheetIndex(0)->setCellValue('G3', "HARDISK");
        $excel->setActiveSheetIndex(0)->setCellValue('H3', "SSD");
        $excel->setActiveSheetIndex(0)->setCellValue('I3', "CASING");
        $excel->setActiveSheetIndex(0)->setCellValue('J3', "VGA");
        $excel->setActiveSheetIndex(0)->setCellValue('K3', "PSU");
        $excel->setActiveSheetIndex(0)->setCellValue('L3', "KEYBOARD");
        $excel->setActiveSheetIndex(0)->setCellValue('M3', "MOUSE");
        $excel->setActiveSheetIndex(0)->setCellValue('N3', "MONITOR");
        $excel->setActiveSheetIndex(0)->setCellValue('O3', "PENGGUNA");

        // Apply style header yang telah kita buat tadi ke masing-masing kolom header
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
        $excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);

        $user = $this->session->userdata('username');
        $siswa = $this->M_data->tampil($user)->result();
        $no = 1; // Untuk penomoran tabel, di awal set dengan 1
        $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
        foreach ($siswa as $data) { // Lakukan looping pada variabel siswa
            $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $no);
            $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $user);
            $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->nama_pc);
            $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->processor);
            $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->motherboard);
            $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->ram);
            $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data->hardisk);
            $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data->ssd);
            $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $data->casing);
            $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $data->vga);
            $excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $data->psu);
            $excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, $data->keyboard);
            $excel->setActiveSheetIndex(0)->setCellValue('M' . $numrow, $data->mouse);
            $excel->setActiveSheetIndex(0)->setCellValue('N' . $numrow, $data->monitor);
            $excel->setActiveSheetIndex(0)->setCellValue('O' . $numrow, $data->pengguna);

            // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
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
            $excel->getActiveSheet()->getStyle('O' . $numrow)->applyFromArray($style_row);

            $no++; // Tambah 1 setiap kali looping
            $numrow++; // Tambah 1 setiap kali looping
        }

        // Set width kolom
        $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $excel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
        $excel->getActiveSheet()->getColumnDimension('C')->setWidth(21);
        $excel->getActiveSheet()->getColumnDimension('D')->setWidth(91);
        $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('I')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('J')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('K')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('L')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('M')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('N')->setWidth(30);
        $excel->getActiveSheet()->getColumnDimension('O')->setWidth(30);

        // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
        $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);

        // Set orientasi kertas jadi LANDSCAPE
        $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);

        // Set judul file excel nya
        $excel->getActiveSheet(0)->setTitle("PC Assembling");
        $excel->setActiveSheetIndex(0);

        // Proses file excel
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="My PC.xlsx"'); // Set nama file excel nya
        header('Cache-Control: max-age=0');

        $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
        $write->save('php://output');
    }

    public function master_processor()
    {
        $data['judul'] = 'Master Procesor';
        $data['processor'] = $this->M_data->tampil_processor();
        $this->load->view('master/processor', $data);
    }
}
