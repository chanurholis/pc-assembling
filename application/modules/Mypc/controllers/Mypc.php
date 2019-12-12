<?php
class Mypc extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_mypc');
        $this->load->library('form_validation');
        $this->load->library('pdf');
    }

    public function index()
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'My PC';
            $data['rakit'] = $this->M_mypc->tampil_mypc()->result();
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
            $where = ['id' => $id];
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

    public function detail($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $data['judul'] = 'Detail Data';
            $where = array('id' => $id);
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

            $where = ['id' => $id];

            $bukti = $this->db->get_where('rakit', $where)->row();

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
                'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
                )
            );

            $style_row = array(
                'alignment' => array(
                    'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER
                ),
                'borders' => array(
                    'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                    'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                    'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),
                    'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN)
                )
            );

            $excel->setActiveSheetIndex(0)->setCellValue('A1', "LAPORAN HASIL RAKIT PC");
            $excel->getActiveSheet()->mergeCells('A1:N2');
            $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE);
            $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15);
            $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_JUSTIFY);

            $excel->setActiveSheetIndex(0)->setCellValue('A3', "PC");
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

            $where = ['id' => $id];

            $result = $this->M_mypc->tampil($where);

            $numrow = 4;
            foreach ($result as $data) {
                $excel->setActiveSheetIndex(0)->setCellValue('A' . $numrow, $data->nama_pc);
                $excel->setActiveSheetIndex(0)->setCellValue('B' . $numrow, $data->institusi);
                $excel->setActiveSheetIndex(0)->setCellValue('C' . $numrow, $data->pengguna);
                $excel->setActiveSheetIndex(0)->setCellValue('D' . $numrow, $data->processor);
                $excel->setActiveSheetIndex(0)->setCellValue('E' . $numrow, $data->motherboard);
                $excel->setActiveSheetIndex(0)->setCellValue('F' . $numrow, $data->ram);
                $excel->setActiveSheetIndex(0)->setCellValue('G' . $numrow, $data->storage);
                $excel->setActiveSheetIndex(0)->setCellValue('H' . $numrow, $data->casing);
                $excel->setActiveSheetIndex(0)->setCellValue('I' . $numrow, $data->vga);
                $excel->setActiveSheetIndex(0)->setCellValue('J' . $numrow, $data->psu);
                $excel->setActiveSheetIndex(0)->setCellValue('K' . $numrow, $data->keyboard);
                $excel->setActiveSheetIndex(0)->setCellValue('L' . $numrow, $data->mouse);
                $excel->setActiveSheetIndex(0)->setCellValue('M' . $numrow, $data->monitor);
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

    public function export_pdf($id)
    {
        if ($this->session->userdata('status') == NULL) {
            redirect('/');
        } else {
            $pdf = new FPDF('l', 'mm', 'A3');

            $pdf->AddPage();

            $pdf->SetFont('Arial', 'B', 16);

            $pdf->Cell(50, 6, 'LAPORAN HASIL RAKIT PC', 0, 1);
            $pdf->SetFont('Arial', 'B', 12);

            $where = ['id' => $id];

            $data = $this->M_mypc->tampil($where);


            $pdf->Cell(50, 6, '', 0, 1);
            $pdf->SetFont('Arial', '', 10);


            foreach ($data as $result) :

                $pdf->Cell(40, 6, 'PC', 1, 0);
                $pdf->Cell(100, 6, $result->nama_pc, 1, 1);
                $pdf->Cell(50, 6, '', 0, 1);

                $pdf->Cell(40, 6, 'INSTITUSI', 1, 0);
                $pdf->Cell(100, 6, $result->institusi, 1, 1);
                $pdf->Cell(50, 6, '', 0, 1);

                $pdf->Cell(40, 6, 'PENGGUNA', 1, 0);
                $pdf->Cell(100, 6, $result->pengguna, 1, 1);
                $pdf->Cell(50, 6, '', 0, 1);

                $pdf->Cell(40, 6, 'PROCESSOR', 1, 0);
                $pdf->Cell(100, 6, $result->processor, 1, 1);
                $pdf->Cell(50, 6, '', 0, 1);

                $pdf->Cell(40, 6, 'MOTHERBOARD', 1, 0);
                $pdf->Cell(100, 6, $result->motherboard, 1, 1);
                $pdf->Cell(50, 6, '', 0, 1);

                $pdf->Cell(40, 6, 'RAM', 1, 0);
                $pdf->Cell(100, 6, $result->ram, 1, 1);
                $pdf->Cell(50, 6, '', 0, 1);

                $pdf->Cell(40, 6, 'STORAGE', 1, 0);
                $pdf->Cell(100, 6, $result->storage, 1, 1);
                $pdf->Cell(50, 6, '', 0, 1);

                $pdf->Cell(40, 6, 'CASING', 1, 0);
                $pdf->Cell(100, 6, $result->casing, 1, 1);
                $pdf->Cell(50, 6, '', 0, 1);

                $pdf->Cell(40, 6, 'VGA', 1, 0);
                $pdf->Cell(100, 6, $result->vga, 1, 1);
                $pdf->Cell(50, 6, '', 0, 1);

                $pdf->Cell(40, 6, 'PSU', 1, 0);
                $pdf->Cell(100, 6, $result->psu, 1, 1);
                $pdf->Cell(50, 6, '', 0, 1);

                $pdf->Cell(40, 6, 'KEYBOARD', 1, 0);
                $pdf->Cell(100, 6, $result->keyboard, 1, 1);
                $pdf->Cell(50, 6, '', 0, 1);

                $pdf->Cell(40, 6, 'MOUSE', 1, 0);
                $pdf->Cell(100, 6, $result->mouse, 1, 1);
                $pdf->Cell(50, 6, '', 0, 1);

                $pdf->Cell(40, 6, 'MONITOR', 1, 0);
                $pdf->Cell(100, 6, $result->monitor, 1, 1);
                $pdf->Cell(50, 6, '', 0, 1);

                $pdf->Cell(40, 6, 'DISERAHKAN', 1, 0);
                $pdf->Cell(100, 6, $result->tgl_diserahkan, 1, 1);
                $pdf->Cell(50, 6, '', 0, 1);

            endforeach;

            $pdf->SetFont('Arial', '', 10);


            $pdf->Output();
        }
    }
}
