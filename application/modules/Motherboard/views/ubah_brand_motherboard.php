<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Brand Motherboard
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
                <h3 class="box-title">Ubah Data Master Brand Motherboard</h3>
            </div>
            <form role="form" action="<?= base_url('Motherboard/aksi_ubah_brand_motherboard') ?>" method="post">
                <div class="box-body">
                    <?php foreach ($brand_motherboard as $m) : ?>
                        <div class="form-group col-md-8">
                            <label for="id">ID Brand Motherboard</label>
                            <input type="number" id="id" name="brand_motherboard_id" class="form-control" value="<?= $m->brand_motherboard_id ?>" disabled>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="nama">Brand Motherboard</label>
                            <input type="hidden" name="id" value="<?= $m->brand_motherboard_id ?>">
                            <input type="text" style="text-transform: uppercase;" id="nama" name="brand_motherboard" class="form-control" value="<?= $m->brand_motherboard ?>" autofocus>
                            <?= form_error('brand_motherboard', '<small class="text-danger">', '</small>') ?>
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