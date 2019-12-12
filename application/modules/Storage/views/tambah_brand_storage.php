<div class="content-wrapper">
    <section class="content-header">
        <h1>
            Master Brand
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?= base_url('Storage/tambah_brand_storage') ?>"><i class="fa fa-circle-o"></i> Master Rakit</a></li>
            <li><a href="<?= base_url('Storage/tambah_brand_storage') ?>"> Storage</a></li>
            <li><a href="<?= base_url('Storage/tambah_brand_storage') ?>"> Master Brand</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content container-fluid">

        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Tambah Data Master Brand</h3>
            </div>
            <form role="form" action="<?= base_url('Storage/tambah_brand_storage') ?>" method="post">
                <div class="box-body">
                    <div class="form-group col-md-8">
                        <label for="brand">Brand Storage</label>
                        <input type="text" id="brand" name="brand_storage" class="form-control" autofocus>
                        <?= form_error('brand_storage', '<small class="text-danger">', '</small>') ?>
                    </div>
                    <div class="form-group col-md-8">
                        <label for="brand">Storage</label>
                        <select name="type" id="brand" class="form-control select2" style="width: 100%;">
                            <option value="" selected="selected">-- Pilih Storage --</option>
                            <option value="HDD">HDD</option>
                            <option value="SSD">SSD</option>
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