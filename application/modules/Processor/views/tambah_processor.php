<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Processor
        </h1>
        <ol class="breadcrumb">
            <li><a><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a> Processor</a></li>
            <li><a> Master Processor</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Master Processor</h3>
            </div>
            <form role="form" action="<?= base_url('Processor/tambah_processor') ?>" method="post">
                <div class="box-body">
                    <div class="form-group col-md-8">
                        <label for="brand">Brand Processor</label>
                        <select name="brand_processor" id="brand" class="form-control select2" autofocus>
                            <option value="" selected="selected">-- Pilih Brand --</option>
                            <?php foreach ($brand_processor as $b) :  ?>
                                <option value="<?= $b->brand_processor_id ?>" <?= set_select('brand_processor', $b->brand_processor_id) ?>><?= $b->brand_processor ?></option>
                            <?php endforeach ?>
                        </select>
                        <?= form_error('brand_processor', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="nama">Type Processor</label>
                        <input type="text" id="nama" name="processor" class="form-control" value="<?= set_value('processor') ?>" required>
                        <?= form_error('processor', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-8">
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah</button>
                    </div>
                </div>
            </form>
        </div>

    </section>
</div>