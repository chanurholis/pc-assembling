<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Master Brand RAM
        </h1>
        <ol class="breadcrumb">
            <li><a><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a> RAM</a></li>
            <li><a> Master Brand</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Ubah Data Master Brand</h3>
            </div>
            <form role="form" action="<?= base_url('RAM/aksi_ubah_brand_ram') ?>" method="post">
                <div class="box-body">
                    <?php foreach ($brand_ram as $b) : ?>
                        <div class="form-group col-md-8">
                            <label for="id">ID Brand RAM</label>
                            <input type="text" id="brand" name="brand_ram" value="<?= $b->brand_ram_id ?>" class="form-control" disabled>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="brand">Brand RAM</label>
                            <input type="hidden" name="id" value="<?= $b->brand_ram_id ?>">
                            <input type="text" style="text-transform: uppercase;" id="brand" name="brand_ram" value="<?= $b->brand_ram ?>" class="form-control" autofocus>
                            <?= form_error('brand_ram', '<small class="text-danger">', '</small>') ?>
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