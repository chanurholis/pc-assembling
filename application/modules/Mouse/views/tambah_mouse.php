<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Master Mouse
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Mouse/tambah_mouse') ?>"><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a href="<?= base_url('Mouse/tambah_mouse') ?>"> Mouse</a></li>
            <li><a href="<?= base_url('Mouse/tambah_mouse') ?>"> Master Mouse</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Master Mouse</h3>
            </div>
            <form role="form" action="<?= base_url('Mouse/tambah_mouse') ?>" method="post">
                <div class="box-body">
                    <div class="form-group col-md-8">
                        <label for="nama">Mouse</label>
                        <input type="text" id="nama" name="nama_mouse" class="form-control" autofocus>
                        <?= form_error('nama_mouse', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-8">
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah</button>
                    </div>
                </div>
            </form>
        </div>

    </section>
</div>