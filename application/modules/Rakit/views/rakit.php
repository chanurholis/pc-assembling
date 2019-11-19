<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?= $judul ?>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-desktop"></i> <?= $judul ?></a></li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Komponen PC</h3>

            </div>
            <div class="box-body">

                <form action="<?= base_url('Rakit/rakit_pc') ?>" method="post">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Nama PC</label>
                                <input type="text" class="form-control" name="nama_pc" autofocus>
                                <?= form_error('nama_pc', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Institusi</label>
                                <select name="institusi" class="form-control select2" style="width: 100%;">
                                    <option value="" selected="selected">-- Pilih Processor --</option>
                                    <option value="POLTEKPOS">POLTEKPOS</option>
                                    <option value="STIMLOG">STIMLOG</option>
                                    <option value="YPBPI">YPBPI</option>
                                </select>
                                <?= form_error('institusi', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Processor</label>
                                <select name="processor" class="form-control select2" style="width: 100%;">
                                    <option value="" selected="selected">-- Pilih Processor --</option>
                                    <option value="" disabled>-- Intel --</option>
                                    <?php foreach ($processor_intel as $b) : ?>
                                        <option value="<?= $b->brand_processor ?> <?= $b->nama_processor ?>"><?= $b->brand_processor ?> <?= $b->nama_processor ?></option>
                                    <?php endforeach ?>
                                    <option value="" disabled>-- AMD --</option>
                                    <?php foreach ($processor_amd as $b) : ?>
                                        <option value="<?= $b->brand_processor ?> <?= $b->nama_processor ?>"><?= $b->brand_processor ?> <?= $b->nama_processor ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('processor', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Motherboard</label>
                                <select name="motherboard" class="form-control select2" style="width: 100%;">
                                    <option value="" selected="selected">-- Pilih Motherboard --</option>
                                    <option value="" disabled>-- AsRock --</option>
                                    <?php foreach ($motherboard_asrock as $ma) : ?>
                                        <option value="<?= $ma->brand_motherboard ?> <?= $ma->motherboard ?>"><?= $ma->brand_motherboard ?> <?= $ma->motherboard ?></option>
                                    <?php endforeach ?>
                                    <option value="" disabled>-- MSI --</option>
                                    <?php foreach ($motherboard_msi as $ma) : ?>
                                        <option value="<?= $ma->brand_motherboard ?> <?= $ma->motherboard ?>"><?= $ma->brand_motherboard ?> <?= $ma->motherboard ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('motherboard', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>RAM</label>
                                <select name="ram" class="form-control select2" style="width: 100%;">
                                    <option value="" selected="selected">-- Pilih RAM --</option>
                                    <option value="" disabled>-- Corsair --</option>
                                    <?php foreach ($ram_corsair as $ma) : ?>
                                        <option value="<?= $ma->ddr ?> <?= $ma->brand_ram ?> <?= $ma->nama_ram ?> <?= $ma->kapasitas ?><?= $ma->satuan ?>"><?= $ma->ddr ?> <?= $ma->brand_ram ?> <?= $ma->nama_ram ?> <?= $ma->kapasitas ?><?= $ma->satuan ?></option>
                                    <?php endforeach ?>
                                    <option value="" disabled>-- G.SKill --</option>
                                    <?php foreach ($ram_gskill as $ma) : ?>
                                        <option value="<?= $ma->ddr ?> <?= $ma->brand_ram ?> <?= $ma->nama_ram ?> <?= $ma->kapasitas ?><?= $ma->satuan ?>"><?= $ma->ddr ?> <?= $ma->brand_ram ?> <?= $ma->nama_ram ?> <?= $ma->kapasitas ?><?= $ma->satuan ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('ram', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Storage</label>
                                <select name="storage" class="form-control select2" style="width: 100%;">
                                    <option value="" selected="selected">-- Pilih Storage --</option>
                                    <option value="" disabled>-- HDD --</option>
                                    <?php foreach ($storage_hdd as $ma) : ?>
                                        <option value="<?= $ma->type ?> <?= $ma->brand_storage ?> <?= $ma->nama_storage ?> <?= $ma->kapasitas ?>"><?= $ma->type ?> <?= $ma->brand_storage ?> <?= $ma->nama_storage ?> <?= $ma->kapasitas ?></option>
                                    <?php endforeach ?>
                                    <option value="" disabled>-- SSD --</option>
                                    <?php foreach ($storage_ssd as $ma) : ?>
                                        <option value="<?= $ma->type ?> <?= $ma->brand_storage ?> <?= $ma->nama_storage ?> <?= $ma->kapasitas ?>"><?= $ma->type ?> <?= $ma->brand_storage ?> <?= $ma->nama_storage ?> <?= $ma->kapasitas ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('storage', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Casing</label>
                                <select name="casing" class="form-control select2" style="width: 100%;">
                                    <option value="" selected="selected">-- Pilih Casing --</option>
                                    <?php foreach ($casing as $c) : ?>
                                        <option value="<?= $c->nama_casing ?>"><?= $c->nama_casing ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('casing', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>VGA</label>
                                <select name="vga" class="form-control select2" style="width: 100%;">
                                    <option value="" selected="selected">-- Pilih VGA --</option>
                                    <option value="" disabled>-- VGA ADD-ON --</option>
                                    <?php foreach ($vga_addon as $ma) : ?>
                                        <option value="<?= $ma->nama_vga ?>"><?= $ma->nama_vga ?></option>
                                    <?php endforeach ?>
                                    <option value="" disabled>-- VGA ON-BOARD --</option>
                                    <?php foreach ($vga_onboard as $ma) : ?>
                                        <option value="<?= $ma->nama_vga ?>"><?= $ma->nama_vga ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('vga', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>PSU</label>
                                <select name="psu" class="form-control select2" style="width: 100%;">
                                    <option value="" selected="selected">-- Pilih PSU --</option>
                                    <?php foreach ($psu as $p) : ?>
                                        <option value="<?= $p->nama_psu ?>"><?= $p->nama_psu ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('psu', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Keyboard</label>
                                <select name="keyboard" class="form-control select2" style="width: 100%;">
                                    <option value="" selected="selected">-- Pilih Keyboard --</option>
                                    <?php foreach ($keyboard as $k) : ?>
                                        <option value="<?= $k->nama_keyboard ?>"><?= $k->nama_keyboard ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('keyboard', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Mouse</label>
                                <select name="mouse" class="form-control select2" style="width: 100%;">
                                    <option value="" selected="selected">-- Pilih Mouse --</option>
                                    <?php foreach ($mouse as $k) : ?>
                                        <option value="<?= $k->nama_mouse ?>"><?= $k->nama_mouse ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('mouse', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Monitor</label>
                                <select name="monitor" class="form-control select2" style="width: 100%;">
                                    <option value="" selected="selected">-- Pilih Monitor --</option>
                                    <?php foreach ($monitor as $k) : ?>
                                        <option value="<?= $k->nama_monitor ?>"><?= $k->nama_monitor ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('monitor', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Pengguna</label>
                                <input name="pengguna" type="text" class="form-control">
                                <?= form_error('pengguna', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Diserahkan</label>
                                <input type="date" class="form-control" name="diserahkan">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>Upload Bukti</label>
                                <input type="file" class="form-control" name="bukti">
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-8">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary btn-flat mt-1"><i></i> Tambah</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
</div>
</section>
</div>