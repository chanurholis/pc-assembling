<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Brand Motherboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Motherboard/tambah_brand_motherboard') ?>"><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a href="<?= base_url('Motherboard/tambah_brand_motherboard') ?>"> Motherboard</a></li>
            <li><a href="<?= base_url('Motherboard/tambah_brand_motherboard') ?>"> Master Motherboard</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Master Brand Motherboard</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" action="<?= base_url('Motherboard/tambah_brand_motherboard') ?>" method="post">
                <div class="box-body">
                    <div class="form-group col-md-8">
                        <label for="nama">Brand Motherboard</label>
                        <input type="text" id="nama" name="brand_motherboard" class="form-control" autofocus>
                        <?= form_error('brand_motherboard', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-8">
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah</button>
                    </div>
                </div>
                <!-- /.box-body -->
            </form>
        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->