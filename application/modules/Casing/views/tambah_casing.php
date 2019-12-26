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
                <h3 class="box-title">Tambah Data Master Casing</h3>
            </div>
            <form role="form" action="<?= base_url('Casing/tambah_casing') ?>" method="post">
                <div class="box-body">
                    <div class="form-group col-md-8">
                        <label for="id">ID Casing</label>
                        <input type="number" id="id" name="id_casing" class="form-control" autofocus>
                        <?= form_error('id_casing', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="nama">Casing</label>
                        <input type="text" id="nama" name="nama_casing" class="form-control">
                        <?= form_error('nama_casing', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-8">
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah</button>
                    </div>
                </div>
            </form>
        </div>

    </section>
</div>