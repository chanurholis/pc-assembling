<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Brand Motherboard
        </h1>
        <ol class="breadcrumb">
            <li><a><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a> Motherboard</a></li>
            <li><a> Master Motherboard</a></li>
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
                        <label for="id">ID Brand Motherboard</label>
                        <input type="number" id="id" name="brand_motherboard_id" class="form-control" autofocus value="<?= set_value('brand_motherboard_id') ?>">
                        <?= form_error('brand_motherboard_id', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="nama">Brand Motherboard</label>
                        <input type="text" id="nama" style="text-transform: uppercase;" name="brand_motherboard" class="form-control" autofocus value="<?= set_value('brand_motherboard') ?>">
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