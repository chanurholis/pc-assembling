<?php
class Ajaxsearch extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_ajax_search');
    }

    public function index()
    {
        redirect('Mypc');
    }

    public function fetch()
    {
        $output = '';
        $query = '';
        if ($this->input->post('query')) {
            $query = htmlspecialchars($this->input->post('query'));
        }
        $data = $this->M_ajax_search->fetch_data($query);

        $output .= '
        <div class="box-body table-responsive">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col" width="10px" class="text-center">NO</th>
                    <th scope="col">PC</th>
                    <th scope="col">INSTITUSI</th>
                    <th scope="col">PENGGUUNA</th>
                    <th scope="col">PROCESSOR</th>
                    <th scope="col">RAM</th>
                    <th scope="col">STORAGE</th>
                    <th scope="col">MOBO</th>
                    <th scope="col" width="300px" class="text-center">AKSI</th>
                </tr>
        ';

        if ($data->num_rows() > 0) {
            foreach ($data->result() as $r) {
                $output .= '
                <tr>
                    <td scope="row" class="text-center"><?= $no++ ?> </td>
                    <td scope="row"><?= $r->nama_pc ?></td>
                    <td scope="row"><?= $r->institusi ?></td>
                    <td scope="row"><?= $r->pengguna ?></td>
                    <td scope="row"><?= $r->processor ?></td>
                    <td scope="row"><?= $r->ram ?></td>
                    <td scope="row"><?= $r->storage ?></td>
                    <td scope="row"><?= $r->motherboard ?></td>
                    <td scope="row" class="text-center">
                        <a href=""><span class="label label-success"><i class="fa fa-plus-circle"></i> Detail</span></a>
                        <a href=""><span class="label label-info"><i class="fa fa-pencil"></i> Ubah</span></a>
                        <a class="tombol-hapus" href=""><span class="label label-danger"><i class="fa fa-trash"></i> Hapus</span></a>
                    </td>
            </tr>
                ';
            }
        } else {
            $output .= '            
                <tr>
                    <td colspan="9">No Data Found</td>
                </tr>
            ';
        }
        $output .= '</table>';
        echo $output;
    }
}
