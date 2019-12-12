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

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Master Brand Processor</h3>
            </div>
            <form role="form" action="<?= base_url('Processor/tambah_brand_processor') ?>" method="post">
                <div class="box-body">
                    <div class="form-group col-md-8">
                        <label for="id">ID Brand Processor</label>
                        <input type="number" id="id" name="id_brand_processor" class="form-control" autofocus>
                        <?= form_error('id_brand_processor', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="brand">Brand Processor</label>
                        <input type="text" id="brand" name="brand_processor" class="form-control" autofocus>
                        <?= form_error('brand_processor', '<small class="text-danger pl-3">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-8">
                        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah</button>
                    </div>
                </div>
            </form>
        </div>

    </section>
</div>