<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Master VGA
        </h1>
        <ol class="breadcrumb">
            <li><a><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a> VGA</a></li>
            <li><a> Master VGA</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Ubah Data Master VGA</h3>
            </div>
            <form role="form" action="<?= base_url('VGA/aksi_ubah_vga') ?>" method="post">
                <?php foreach ($vga as $v) : ?>
                    <div class="box-body">
                        <input type="hidden" name="id" value="<?= $v->vga_id ?>">
                        <div class="form-group col-md-8">
                            <label for="id">ID VGA</label>
                            <input type="number" id="id" name="id_vga" value="<?= $v->vga_id ?>" class="form-control" disabled>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="nama">VGA</label>
                            <input type="text" id="nama" name="nama_vga" value="<?= $v->nama_vga ?>" class="form-control" autofocus>
                            <?= form_error('nama_vga', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="type">Type</label>
                            <select name="type" id="type" class="form-control select2" style="width: 100%;">
                                <option value="" selected="selected">-- Pilih Type --</option>
                                <?php foreach ($type as $t) : ?>
                                    <?php if ($v->type_vga == $t) : ?>
                                        <option value="<?= $t ?>" selected><?= $t ?></option>
                                    <?php else : ?>
                                        <option value="<?= $t ?>"><?= $t ?></option>
                                    <?php endif ?>
                                <?php endforeach ?>
                            </select>
                            <?= form_error('type', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group col-md-8">
                            <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah</button>
                        </div>
                    </div>
                <?php endforeach ?>
            </form>
        </div>

    </section>
</div>