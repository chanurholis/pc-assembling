<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Motherboard
        </h1>
        <ol class="breadcrumb">
            <li><a><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a><i class="fa fa-circle-o"></i> Motherboard</a></li>
            <li><a><i class="fa fa-circle-o"></i> Master Motherboard</a></li>
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
                    <?php foreach ($motherboard as $m) : ?>
                        <div class="form-group col-md-8">
                            <label for="brand_motherboard">Brand Motherboard</label>
                            <select name="brand_motherboard" id="brand_motherboard" class="form-control select2" disabled>
                                <option value=""><?= $m->brand_motherboard ?></option>
                            </select>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="type_m">Type Motherboard</label>
                            <input type="hidden" name="id" value="<?= $m->motherboard_id ?>">
                            <input type="text" id="type_m" name="nama_motherboard" class="form-control" value="<?= $m->motherboard ?>" autofocus>
                            <?= form_error('nama_motherboard', '<small class="text-danger">', '</small>') ?>
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