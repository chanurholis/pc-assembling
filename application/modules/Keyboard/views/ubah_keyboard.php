<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Master Keyboard
        </h1>
        <ol class="breadcrumb">
            <li><a><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a> Keyboard</a></li>
            <li><a> Master Keyboard</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Ubah Data Master Keyboard</h3>
            </div>
            <form role="form" action="<?= base_url('Keyboard/aksi_ubah_keyboard') ?>" method="post">
                <?php foreach ($keyboard as $k) : ?>
                    <div class="box-body">
                        <input type="hidden" name="id" value="<?= $k->keyboard_id ?>">
                        <div class="form-group col-md-8">
                            <label for="id">ID Keyboard</label>
                            <input type="number" id="id" name="keyboard_id" value="<?= $k->keyboard_id ?>" class="form-control" disabled>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="nama">Keyboard</label>
                            <input type="text" id="nama" name="nama_keyboard" value="<?= $k->nama_keyboard ?>" class="form-control" autofocus>
                            <?= form_error('nama_keyboard', '<small class="text-danger">', '</small>') ?>
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