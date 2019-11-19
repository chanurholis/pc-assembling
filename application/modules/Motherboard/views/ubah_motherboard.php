<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Dashboard
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('master/tambah_processor') ?>"><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a href="<?= base_url('master/processor') ?>"><i class="fa fa-circle-o"></i> Motherboard</a></li>
            <li><a href="<?= base_url('master/tambah_processor') ?>"><i class="fa fa-circle-o"></i> Master Motherboard</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Ubah Data Master Motherboard</h3>
            </div>
            <form role="form" action="<?= base_url('Motherboard/aksi_ubah_motherboard') ?>" method="post">
                <div class="box-body">
                    <div class="form-group col-md-8">
                        <label for="nama">Nama Processor</label>
                        <?php foreach ($motherboard as $m) : ?>
                            <input type="hidden" name="id" value="<?= $m->id ?>">
                            <input type="text" id="nama" name="nama_motherboard" class="form-control" value="<?= $m->motherboard ?>" autofocus>
                            <?= form_error('nama_motherboard', '<small class="text-danger">', '</small>') ?>
                        <?php endforeach ?>
                    </div>
                    <div class="form-group col-md-8">
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-pencil"></i> Ubah</button>
                    </div>
                </div>
            </form>
        </div>

    </section>
</div>