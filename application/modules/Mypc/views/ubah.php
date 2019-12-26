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

                <?= form_open_multipart('Mypc/aksi_ubah_mypc') ?>
                <?php foreach ($result as $r) : ?>
                    <input type="hidden" name="id" value="<?= $r->rakit_id ?>">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>NO INDEKS</label>
                                <input type="text" class="form-control" name="no_indeks" autofocus value="<?= $r->no_indeks ?>" <?= set_value('no_indeks') ?>>
                                <?= form_error('no_indeks', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>INSTITUSI</label>
                                <select name="institusi" class="form-control select2" style="width: 100%;">
                                    <option value="" selected="selected">-- Pilih Processor --</option>
                                    <?php foreach ($institusi as $i) : ?>
                                        <?php if ($i == $r->institusi) : ?>
                                            <option value="<?= $i ?>" <?= set_select('institusi', 'POLTEKPOS') ?> selected><?= $i ?></option>
                                        <?php else : ?>
                                            <option value="<?= $i ?>" <?= set_select('institusi', 'POLTEKPOS') ?>><?= $i ?></option>
                                        <?php endif ?>
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
                                        <?php if ($r->processor_id == $p->processor_id) : ?>
                                            <option value="<?= $p->processor_id ?>" <?= set_select('processor', $p->processor_id) ?> selected><?= $p->brand_processor ?> <?= $p->nama_processor ?></option>
                                        <?php else : ?>
                                            <option value="<?= $p->processor_id ?>" <?= set_select('processor', $p->processor_id) ?>><?= $p->brand_processor ?> <?= $p->nama_processor ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('processor', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>MOTHERBOARD</label>
                                <select name="motherboard" class="form-control select2" style="width: 100%;" value="<?= set_value('motherboard') ?>">
                                    <option value="" selected="selected">-- Pilih Motherboard --</option>
                                    <?php foreach ($motherboard as $m) : ?>
                                        <?php if ($r->motherboard_id == $m->motherboard_id) : ?>
                                            <option value="<?= $m->motherboard_id ?>" <?= set_select('motherboard', $m->motherboard_id) ?> selected><?= $m->brand_motherboard ?> <?= $m->motherboard ?></option>
                                        <?php else : ?>
                                            <option value="<?= $m->motherboard_id ?>" <?= set_select('motherboard', $m->motherboard_id) ?>><?= $m->brand_motherboard ?> <?= $m->motherboard ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('motherboard', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>RAM</label>
                                <select name="ram" class="form-control select2" style="width: 100%;" value="<?= set_value('ram') ?>">
                                    <option value="" selected="selected">-- Pilih RAM --</option>
                                    <?php foreach ($ram as $a) : ?>
                                        <?php if ($r->ram_id == $a->ram_id) : ?>
                                            <option value="<?= $a->ram_id ?>" <?= set_select('ram', $a->ram_id) ?> selected><?= $a->brand_ram ?> <?= $a->nama_ram ?> DDR<?= $a->ddr ?> <?= $a->kapasitas_ram ?><?= $a->satuan ?></option>
                                        <?php else : ?>
                                            <option value="<?= $a->ram_id ?>" <?= set_select('ram', $a->ram_id) ?>><?= $a->brand_ram ?> <?= $a->nama_ram ?> DDR<?= $a->ddr ?> <?= $a->kapasitas_ram ?><?= $a->satuan ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('ram', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>STORAGE</label>
                                <select name="storage" class="form-control select2" style="width: 100%;" value="<?= set_value('storage') ?>">
                                    <option value="" selected="selected">-- Pilih Storage --</option>
                                    <?php foreach ($storage as $s) : ?>
                                        <?php if ($r->storage_id == $s->storage_id) : ?>
                                            <option value="<?= $s->storage_id ?>" <?= set_select('storage', $s->storage_id) ?> selected><?= $s->brand_storage ?> <?= $s->nama_storage ?> <?= $s->type_storage ?> <?= $s->kapasitas_storage ?><?= $s->satuan ?></option>
                                        <?php else : ?>
                                            <option value="<?= $s->storage_id ?>" <?= set_select('storage', $s->storage_id) ?>><?= $s->brand_storage ?> <?= $s->nama_storage ?> <?= $s->type_storage ?> <?= $s->kapasitas_storage ?><?= $s->satuan ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('storage', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>CASING</label>
                                <select name="casing" class="form-control select2" style="width: 100%;" value="<?= set_value('casing') ?>">
                                    <option value="" selected="selected">-- Pilih Casing --</option>
                                    <?php foreach ($casing as $c) : ?>
                                        <?php if ($r->casing_id == $c->casing_id) : ?>
                                            <option value="<?= $c->casing_id ?>" <?= set_select('casing', $c->casing_id) ?> selected><?= $c->nama_casing ?></option>
                                        <?php else : ?>
                                            <option value="<?= $c->casing_id ?>" <?= set_select('casing', $c->casing_id) ?>><?= $c->nama_casing ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('casing', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>VGA</label>
                                <select name="vga" class="form-control select2" style="width: 100%;" value="<?= set_value('vga') ?>">
                                    <option value="" selected="selected">-- Pilih VGA --</option>
                                    <?php foreach ($vga as $v) : ?>
                                        <?php if ($r->vga_id == $v->vga_id) : ?>
                                            <option value="<?= $v->vga_id ?>" <?= set_select('vga', $v->vga_id) ?> selected><?= $v->nama_vga ?> <?= $v->type_vga ?></option>
                                        <?php else : ?>
                                            <option value="<?= $v->vga_id ?>" <?= set_select('vga', $v->vga_id) ?>><?= $v->nama_vga ?> <?= $v->type_vga ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('vga', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>PSU</label>
                                <select name="psu" class="form-control select2" style="width: 100%;" value="<?= set_value('psu') ?>">
                                    <option value="" selected="selected">-- Pilih PSU --</option>
                                    <?php foreach ($psu as $p) : ?>
                                        <?php if ($r->psu_id == $p->psu_id) : ?>
                                            <option value="<?= $p->psu_id ?>" <?= set_select('psu', $p->psu_id) ?> selected><?= $p->nama_psu ?></option>
                                        <?php else : ?>
                                            <option value="<?= $p->psu_id ?>" <?= set_select('psu', $p->psu_id) ?>><?= $p->nama_psu ?></option>
                                        <?php endif ?>
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
                                        <?php if ($r->keyboard_id == $k->keyboard_id) : ?>
                                            <option value="<?= $k->keyboard_id ?>" <?= set_select('keyboard', $k->keyboard_id) ?> selected><?= $k->nama_keyboard ?></option>
                                        <?php else : ?>
                                            <option value="<?= $k->keyboard_id ?>" <?= set_select('keyboard', $k->keyboard_id) ?>><?= $k->nama_keyboard ?></option>
                                        <?php endif ?>
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
                                    <?php foreach ($mouse as $m) : ?>
                                        <?php if ($r->mouse_id == $m->mouse_id) : ?>
                                            <option value="<?= $m->mouse_id ?>" <?= set_select('mouse', $m->mouse_id) ?> selected><?= $m->nama_mouse ?></option>
                                        <?php else : ?>
                                            <option value="<?= $m->mouse_id ?>" <?= set_select('mouse', $m->mouse_id) ?>><?= $m->nama_mouse ?></option>
                                        <?php endif ?>
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
                                    <?php foreach ($monitor as $m) : ?>
                                        <?php if ($r->monitor_id == $m->monitor_id) : ?>
                                            <option value="<?= $m->monitor_id ?>" <?= set_select('monitor', $m->monitor_id) ?> selected><?= $m->nama_monitor ?></option>
                                        <?php else : ?>
                                            <option value="<?= $m->monitor_id ?>" <?= set_select('monitor', $m->monitor_id) ?>><?= $m->nama_monitor ?></option>
                                        <?php endif ?>
                                    <?php endforeach ?>
                                </select>
                                <?= form_error('monitor', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>PENGGUNA</label>
                                <input name="pengguna" type="text" class="form-control" value="<?= $r->pengguna ?><?= set_value('pengguna') ?>">
                                <?= form_error('pengguna', '<small class="text-danger">', '</small>') ?>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="form-group">
                                <label>DISERAHKAN</label>
                                <input type="date" class="form-control" name="diserahkan" value="<?= $r->tgl_diserahkan ?><?= set_value('diserahkan') ?>">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label>UPLOAD BUKTI</label>
                                <input type="file" class="form-control" name="image" value="<?= set_value('image') ?>">
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <div class="col-md-8">
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-flat mt-1"><i class="fa fa-pencil"></i> UBAH</button>
                        </div>
                    </div>
                    <?= form_close() ?>
                    </div>
            </div>
        </div>
    </section>
</div>