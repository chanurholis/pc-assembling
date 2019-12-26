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
                <h3 class="box-title">Ubah Data Master Mouse</h3>
            </div>
            <form role="form" action="<?= base_url('Mouse/aksi_ubah_mouse') ?>" method="post">
                <?php foreach ($mouse as $m) : ?>
                    <div class="box-body">
                        <input type="hidden" name="id" value="<?= $m->mouse_id ?>">
                        <div class="form-group col-md-8">
                            <label for="id">ID Mouse</label>
                            <input type="number" id="id" value="<?= $m->mouse_id ?>" name="mouse_id" class="form-control" disabled>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="nama">Mouse</label>
                            <input type="text" id="nama" value="<?= $m->nama_mouse ?>" name="nama_mouse" class="form-control" autofocus>
                            <?= form_error('nama_mouse', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group col-md-8">
                            <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-pencil"></i> Ubah</button>
                        </div>
                    </div>
                <?php endforeach ?>
            </form>
        </div>

    </section>
</div>