<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Master VGA
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('VGA/tambah_vga') ?>"><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a href="<?= base_url('VGA/tambah_vga') ?>"> VGA</a></li>
            <li><a href="<?= base_url('VGA/tambah_vga') ?>"> Master VGA</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Master VGA</h3>
            </div>
            <form role="form" action="<?= base_url('VGA/tambah_vga') ?>" method="post">
                <div class="box-body">
                    <div class="form-group col-md-8">
                        <label for="nama">VGA</label>
                        <input type="text" id="nama" name="nama_vga" class="form-control" autofocus>
                        <?= form_error('nama_vga', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="type">Type</label>
                        <select name="type" id="type" class="form-control select2" style="width: 100%;">
                            <option value="" selected="selected">-- Pilih Type --</option>
                            <option value="ADD-ON">ADD-ON</option>
                            <option value="ON-BOARD">ON-BOARD</option>
                        </select>
                        <?= form_error('type', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-8">
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah</button>
                    </div>
                </div>
            </form>
        </div>

    </section>
</div>