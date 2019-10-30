<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      My PC
    </h1>
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-database"></i> My PC</a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">


        <div class="box">
          <div class="box-header">
            <a href="<?= base_url('home/app') ?>" class="btn btn-primary btn-flat">Rakit PC</a>
          </div>


          <!-- /.box-header -->
          <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th scope="col" width="10px" class="text-center">NO</th>
                  <th scope="col">PC</th>
                  <th scope="col">INSTITUSI</th>
                  <th scope="col">PENGGUUNA</th>
                  <th scope="col">PROCESSOR</th>
                  <th scope="col">RAM</th>
                  <th scope="col">HDD</th>
                  <th scope="col">MOBO</th>
                  <!-- <th scope="col">MONITOR</th> -->
                  <th scope="col" width="300px" class="text-center">AKSI</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($rakit as $r) { ?>
                  <tr>
                    <td scope="row" class="text-center"><?= $no++ ?></td>
                    <td scope="row"><?= $r->nama_pc ?></td>
                    <td scope="row"><?= $r->institusi ?></td>
                    <td scope="row"><?= $r->pengguna ?></td>
                    <td scope="row"><?= $r->processor ?></td>
                    <td scope="row"><?= $r->ram ?></td>
                    <td scope="row"><?= $r->hardisk ?></td>
                    <td scope="row"><?= $r->motherboard ?></td>
                    <!-- <td scope="row"><?= $r->monitor ?></td> -->
                    <td scope="row" class="text-center">
                      <a href="<?= base_url('home/detail/') . $r->id ?>"><span class="label label-success"><i class="fa fa-plus-circle"></i> Detail</span></a>
                      <a href=""><span class="label label-info"><i class="fa fa-pencil"></i> Ubah</span></a>
                      <a onclick="return confirm('Yakin?');" href="<?= base_url('home/hapus/') . $r->id ?>"><span class="label label-danger"><i class="fa fa-trash"></i> Hapus</span></a>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
          <!-- /.box-body -->
          <div class="box-footer clearfix">
            <ul class="pagination pagination-sm no-margin pull-right">
              <li><a href="#">Previous</a></li>
              <li><a href="#">1</a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">Next</a></li>
            </ul>
          </div>
        </div>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script>
  $(function() {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging': true,
      'lengthChange': false,
      'searching': false,
      'ordering': true,
      'info': true,
      'autoWidth': false
    })
  })
</script>