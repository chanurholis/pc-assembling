<div class="content-wrapper">
    <section class="content-header">
        <h1>
            <?= $judul ?>
        </h1>
        <ol class="breadcrumb">
            <li><a><i class="fa fa-desktop"></i> <?= $judul ?></a></li>
        </ol>
    </section>

    <section class="content container-fluid">
        <div class="box box-default">
            <div class="box-header with-border">
                <h3 class="box-title">Komponen PC</h3>

            </div>
            <div class="box-body">

                <?= form_open_multipart('Rakit/rakit_pc') ?>
                <div class="row">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>NO INDEKS</label>
                            <input type="text" class="form-control" name="no_indeks" autofocus value="<?= set_value('nama_pc') ?>">
                            <?= form_error('no_indeks', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label>INSTITUSI</label>
                            <select name="institusi" class="form-control select2" style="width: 100%;">
                                <option value="" selected="selected">-- Pilih Processor --</option>
                                <?php foreach ($institusi as $i) : ?>
                                    <option value="<?= $i ?>" <?= set_select('institusi', $i) ?>><?= $i ?></option>
                                <?php endforeach ?>
                            </select>
                            <?= form_error('institusi', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label>PROCESSOR</label>
                            <select name="processor" class="form-control select2" style="width: 100%;">
                                <option value="" selected="selected">-- Pilih Processor --</option>
                                <?php foreach ($processor as $p) : ?>
                                    <option value="<?= $p->processor_id ?>" <?= set_select('processor', $p->processor_id) ?>><?= $p->brand_processor ?> <?= $p->nama_processor ?></option>
                                <?php endforeach ?>
                            </select>
                            <?= form_error('processor', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label>MOTHERBOARD</label>
                            <select name="motherboard" class="form-control select2" style="width: 100%;">
                                <option value="" selected="selected">-- Pilih Motherboard --</option>
                                <?php foreach ($motherboard as $m) : ?>
                                    <option value="<?= $m->motherboard_id ?>" <?= set_select('motherboard', $m->brand_motherboard . $m->motherboard) ?>><?= $m->brand_motherboard ?> <?= $m->motherboard ?></option>
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
                                <?php foreach ($ram as $r) : ?>
                                    <option value="<?= $r->ram_id ?>" <?= set_select('ram', $r->brand_ram . $r->nama_ram . "DDR" . $r->ddr . $r->kapasitas_ram) ?>><?= $r->brand_ram ?> <?= $r->nama_ram ?> DDR<?= $r->ddr ?> <?= $r->kapasitas_ram ?><?= $r->satuan ?></option>
                                <?php endforeach ?>
                            </select>
                            <?= form_error('ram', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label>STORAGE</label>
                            <select name="storage" class="form-control select2" style="width: 100%;">
                                <option value="" selected="selected">-- Pilih Storage --</option>
                                <?php foreach ($storage as $s) : ?>
                                    <option value="<?= $s->storage_id ?>" <?= set_select('storage', $s->brand_storage . $s->nama_storage . $s->type_storage . $s->kapasitas_storage . $r->satuan) ?>><?= $s->brand_storage ?> <?= $s->nama_storage ?> <?= $s->type_storage ?> <?= $s->kapasitas_storage ?><?= $s->satuan ?></option>
                                <?php endforeach ?>
                            </select>
                            <?= form_error('storage', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label>CASING</label>
                            <select name="casing" class="form-control select2" style="width: 100%;">
                                <option value="" selected="selected">-- Pilih Casing --</option>
                                <?php foreach ($casing as $c) : ?>
                                    <option value="<?= $c->casing_id ?> <?= set_select('casing', $c->nama_casing) ?>"><?= $c->nama_casing ?></option>
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
                                <?php foreach ($vga as $v) : ?>
                                    <option value="<?= $v->vga_id ?>" <?= set_select('vga', $v->nama_vga) ?>><?= $v->nama_vga ?> <?= $v->type_vga ?></option>
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
                                    <option value="<?= $p->psu_id ?>" <?= set_select('psu', $p->nama_psu) ?>><?= $p->nama_psu ?></option>
                                <?php endforeach ?>
                            </select>
                            <?= form_error('psu', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label>KEYBOARD</label>
                            <select name="keyboard" class="form-control select2" style="width: 100%;" value="<?= set_value('keyboard') ?>">
                                <option value="" selected="selected">-- Pilih Keyboard --</option>
                                <?php foreach ($keyboard as $k) : ?>
                                    <option value="<?= $k->keyboard_id ?>" <?= set_select('keyboard', $k->nama_keyboard) ?>><?= $k->nama_keyboard ?></option>
                                <?php endforeach ?>
                            </select>
                            <?= form_error('keyboard', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label>MOUSE</label>
                            <select name="mouse" class="form-control select2" style="width: 100%;" value="<?= set_value('mouse') ?>">
                                <option value="" selected="selected">-- Pilih Mouse --</option>
                                <?php foreach ($mouse as $k) : ?>
                                    <option value="<?= $k->mouse_id ?>" <?= set_select('mouse', $k->nama_mouse) ?>><?= $k->nama_mouse ?></option>
                                <?php endforeach ?>
                            </select>
                            <?= form_error('mouse', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label>MONITOR</label>
                            <select name="monitor" class="form-control select2" style="width: 100%;">
                                <option value="" selected="selected">-- Pilih Monitor --</option>
                                <?php foreach ($monitor as $k) : ?>
                                    <option value="<?= $k->monitor_id ?>" <?= set_select('monitor', $k->nama_monitor) ?>><?= $k->nama_monitor ?></option>
                                <?php endforeach ?>
                            </select>
                            <?= form_error('monitor', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label>PENGGUNA</label>
                            <input name="pengguna" type="text" class="form-control" value="<?= set_value('pengguna') ?>">
                            <?= form_error('pengguna', '<small class="text-danger">', '</small>') ?>
                        </div>
                    </div>

                    <div class="col-md-8">
                        <div class="form-group">
                            <label>DISERAHKAN</label>
                            <input type="date" class="form-control" name="diserahkan" value="<?= set_value('diserahkan') ?>">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <label>UPLOAD BUKTI</label>
                            <input type="file" class="form-control" name="image" value="<?= set_value('image') ?>">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-flat mt-1"><i class="fa fa-plus"></i> Tambah</button>
                        </div>
                    </div>
                    <?= form_close() ?>
                </div>
            </div>
        </div>
    </section>
</div>