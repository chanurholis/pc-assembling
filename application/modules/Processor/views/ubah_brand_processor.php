<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Brand Processor
        </h1>
        <ol class="breadcrumb">
            <li><a><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a> Processor</a></li>
            <li><a> Brand Processor</a></li>
        </ol>
    </section>

    <section class="content container-fluid">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Ubah Data Master Brand Processor</h3>
            </div>
            <form role="form" action="<?= base_url('Processor/aksi_ubah_brand_processor') ?>" method="post">
                <div class="box-body">
                    <?php foreach ($brand_processor as $b) : ?>
                        <div class="form-group col-md-8">
                            <label for="id">ID Brand Processor</label>
                            <input type="number" id="id" name="brand_processor_id" class="form-control" autofocus value="<?= $b->brand_processor_id ?>" disabled>
                            <?= form_error('brand_processor_id', '<small class="text-danger">', '</small>') ?>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="brand">Brand Processor</label>
                            <input type="hidden" name="id" value="<?= $b->brand_processor_id ?>">
                            <input type="text" style="text-transform: uppercase;" id="brand" name="brand_processor" class="form-control" autofocus value="<?= $b->brand_processor ?>">
                            <?= form_error('brand_processor', '<small class="text-danger">', '</small>') ?>
                        </div>
                    <?php endforeach ?>
                    <div class="form-group col-md-8">
                        <button type="submit" id="tombol-ubah" class="btn btn-primary btn-flat"><i class="fa fa-pencil"></i> Ubah</button>
                    </div>
                </div>
            </form>
        </div>

    </section>
</div>