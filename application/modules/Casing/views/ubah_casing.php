<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Master Casing
        </h1>
        <ol class="breadcrumb">
            <li><a><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a> Casing</a></li>
            <li><a> Master Casing</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Ubah Data Master Casing</h3>
            </div>
            <form role="form" action="<?= base_url('Casing/aksi_ubah_casing') ?>" method="post">
                <div class="box-body">
                    <?php foreach ($casing as $m) : ?>
                        <div class="form-group col-md-8">
                            <label for="id">ID Casing</label>
                            <input type="number" id="id" value="<?= $m->casing_id ?>" name="id_casing" class="form-control" disabled>
                        </div>
                        <input type="hidden" name="id" value="<?= $m->casing_id ?>">
                        <div class="form-group col-md-8">
                            <label for="nama">Casing</label>
                            <input type="text" id="nama" value="<?= $m->nama_casing ?>" name="nama_casing" class="form-control" autofocus>
                            <?= form_error('nama_casing', '<small class="text-danger">', '</small>') ?>
                        </div>
                    <?php endforeach ?>
                    <div class="form-group col-md-8">
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-pencil"></i> Ubah</button>
                    </div>
                </div>
            </form>
        </div>

    </section>
</div>