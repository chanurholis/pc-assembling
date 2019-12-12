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
                <h3 class="box-title">Ubah Data Master Processor</h3>
            </div>
            <form role="form" action="<?= base_url('Processor/aksi_ubah_processor') ?>" method="post">
                <div class="box-body">
                    <?php foreach ($processor as $p) : ?>
                        <div class="form-group col-md-8">
                            <label for="nama">Brand Processor</label>
                            <select name="" id="" class="form-control select2" disabled>
                                <option value="" selected><?= $p->brand_processor ?></option>
                            </select>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="nama">Nama Processor</label>
                            <input type="hidden" name="id" value="<?= $p->processor_id ?>">
                            <input type="text" id="nama" name="nama_processor" class="form-control" autofocus value="<?= $p->nama_processor ?>" a>
                            <?= form_error('nama_processor', '<small class="text-danger">', '</small>') ?>
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