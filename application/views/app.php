<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>
			<?= $judul ?>
		</h1>
		<ol class="breadcrumb">
			<li><a href="#"><i class="fa fa-desktop"></i> <?= $judul ?></a></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content container-fluid">
		<!-- SELECT EXAMPLE -->
		<div class="box box-default">
			<div class="box-header with-border">
				<h3 class="box-title">Komponen PC</h3>

			</div>
			<!-- /.box-header -->
			<div class="box-body">
				<form action="<?= base_url('home/tambah') ?>" method="post">
					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label>Nama PC</label>
								<input type="text" class="form-control" name="nama_pc" autofocus required>
							</div>
						</div>

						<div class="col-md-8">
							<div class="form-group">
								<label>Processor</label>
								<select name="processor" id="proce" class="form-control select2" style="width: 100%;">
									<option value="" selected="selected">-- Pilih Processor --</option>
									<?php foreach ($brand_processor as $b) : ?>
										<option value="<?= $b->brand_processor ?>"><?= $b->brand_processor ?></option>
									<?php endforeach ?>
								</select>
								<select name="" class="form-control select2" id="proce">
									<option value=""></option>
								</select>
							</div>
						</div>

						<div class="col-md-8">
							<div class="form-group">
								<label>Motherboard</label>
								<select name="motherboard" class="form-control select2" style="width: 100%;">
									<option value="" selected="selected">-- Pilih Motherboard --</option>
									<?php foreach ($motherboard as $m) { ?><option><?= $m->motherboard ?></option> <?php } ?>
								</select>
							</div>
						</div>

						<div class="col-md-8">
							<div class="form-group">
								<label>RAM</label>
								<select name="ram" class="form-control select2" style="width: 100%;">
									<option value="" selected="selected">-- Pilih RAM --</option>
									<?php foreach ($ram as $r) { ?><option><?= $r->nama_ram ?></option> <?php } ?>
								</select>
							</div>
						</div>

						<div class="col-md-8">
							<div class="form-group">
								<label>Hardisk</label>
								<select name="hardisk" class="form-control select2" style="width: 100%;">
									<option value="" selected="selected">-- Pilih Hardisk --</option>
									<?php foreach ($hardisk as $h) { ?><option><?= $h->nama_hardisk ?></option> <?php } ?>
								</select>
							</div>
						</div>

						<div class="col-md-8">
							<div class="form-group">
								<label>SSD</label>
								<select name="ssd" class="form-control select2" style="width: 100%;">
									<option value="" selected="selected">-- Pilih SSD --</option>
									<?php foreach ($ssd as $s) { ?><option><?= $s->nama_ssd ?></option> <?php } ?>
								</select>
							</div>
						</div>

						<div class="col-md-8">
							<div class="form-group">
								<label>Casing</label>
								<select name="casing" class="form-control select2" style="width: 100%;">
									<option value="" selected="selected">-- Pilih Casing --</option>
									<option>Alabama</option>
								</select>
							</div>
						</div>

						<div class="col-md-8">
							<div class="form-group">
								<label>VGA</label>
								<select name="vga" class="form-control select2" style="width: 100%;">
									<option value="" selected="selected">-- Pilih VGA --</option>
									<option>Alabama</option>
								</select>
							</div>
						</div>

						<div class="col-md-8">
							<div class="form-group">
								<label>PSU</label>
								<select name="psu" class="form-control select2" style="width: 100%;">
									<option value="" selected="selected">-- Pilih PSU --</option>
									<option>Alabama</option>
								</select>
							</div>
						</div>

						<div class="col-md-8">
							<div class="form-group">
								<label>Keyboard</label>
								<select name="keyboard" class="form-control select2" style="width: 100%;">
									<option value="" selected="selected">-- Pilih Keyboard --</option>
								</select>
							</div>
						</div>

						<div class="col-md-8">
							<div class="form-group">
								<label>Mouse</label>
								<select name="mouse" class="form-control select2" style="width: 100%;">
									<option value="" selected="selected">-- Pilih Mouse --</option>
								</select>
							</div>
						</div>

						<div class="col-md-8">
							<div class="form-group">
								<label>Monitor</label>
								<select name="monitor" class="form-control select2" style="width: 100%;">
									<option value="" selected="selected">-- Pilih Monitor --</option>
								</select>
							</div>
						</div>

						<div class="col-md-8">
							<div class="form-group">
								<label>Pengguna</label>
								<input name="pengguna" type="text" class="form-control" required>
							</div>
						</div>

						<div class="col-md-8">
							<div class="form-group">
								<label>Digunakan</label>
								<input type="date" class="form-control" name="digunakan" required>
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
			<!-- /.row -->
		</div>
		<!-- /.box-body -->
</div>
<!-- /.box -->
</section>
<!-- /.content -->
</div>
<!-- /.content-wrapper -->