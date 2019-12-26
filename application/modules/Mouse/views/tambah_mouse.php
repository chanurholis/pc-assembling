<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Master Mouse
        </h1>
        <ol class="breadcrumb">
            <li><a><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a> Mouse</a></li>
            <li><a> Master Mouse</a></li>
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
                        <label for="id">ID Mouse</label>
                        <input type="number" id="id" name="mouse_id" class="form-control" autofocus value="<?= set_value('mouse_id') ?>">
                        <?= form_error('mouse_id', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="nama">Mouse</label>
                        <input type="text" id="nama" name="nama_mouse" class="form-control" value="<?= set_value('nama_mouse') ?>">
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