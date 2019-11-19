<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Master Keyboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Keyboard/tambah_keyboard') ?>"><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a href="<?= base_url('Keyboard/tambah_keyboard') ?>"> Keyboard</a></li>
            <li><a href="<?= base_url('Keyboard/tambah_keyboard') ?>"> Master Keyboard</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Master Keyboard</h3>
            </div>
            <form role="form" action="<?= base_url('Keyboard/tambah_keyboard') ?>" method="post">
                <div class="box-body">
                    <div class="form-group col-md-8">
                        <label for="nama">Keyboard</label>
                        <input type="text" id="nama" name="nama_keyboard" class="form-control" autofocus>
                        <?= form_error('nama_keyboard', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-8">
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah</button>
                    </div>
                </div>
            </form>
        </div>

    </section>
</div>