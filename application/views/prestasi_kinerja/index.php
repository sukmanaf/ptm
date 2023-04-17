<section class="content-header">
	<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-12">
				<h1><?= $title ?></h1>
			</div>
		</div>
	</div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
	<div class="container-fluid">
		<div class="card card-outline card-primary">
			<div class="card-header">
				<!-- <a style="float: right" href="<?= base_url('prestasi_kinerja/add') ?>" class="btn btn-warning pull-right">
					<i class="fas fa-plus mr-2 text-white"></i>Baru </a>
				<div class="card-tools">
					<div class="input-group input-group-sm">
						<div class="input-group-append"></div>
					</div>
				</div> -->
			</div>

			<div style="padding: 20px">
			</div>

			<div class="card-body table-responsive">
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Tahun Anggaran</label>
							<select id="tahun" name="tahun" onchange="to_change(this)" required class="form-control select2" style="width: 100%;">
								<option value="2019">2019</option>
								<option value="2020">2020</option>
								<option value="2021">2021</option>
								<option value="2022">2022</option>
								<option value="2023" selected>2023</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Tahun Kegiatan</label>
							<select id="tk" name="" onchange="to_change(this,'tahapan')" required class="form-control select2" style="width: 100%;">
								<option value="pertama"> Pertama</option>
								<option value="kedua"> Kedua</option>
								<option value="ketiga"> Ketiga</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Tahapan</label>
							<select id="tahap" name="" onchange="to_change(this,'yuhu')" required class="form-control select2" style="width: 100%;">
								<option value='penlok'>Penetapan Lokasi dan target KK</option>
								<option value='penyuluhan'>Penyuluhan</option>
								<option value='pemetaan'>Pemetaan Sosial</option>
								<option value='pemberdayaan'>Penetapan Model Pemberdayaan</option>
								<option value='penyusunan'>Penyusunan Data Penerima Akses </option>

							</select>
						</div>
					</div>
				</div>
				<div id="table-front_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
					<table id="table-frontpertama" class="table table-hover dataTable no-footer dtr-inline" aria-describedby="table-front_info" style="width: 100%;">
						<thead>
							<tr>
								<th>No</th>
								<th>Satker</th>
								<th>Tanggal SK</th>
								<th>Tanggal Upload</th>
								<th>View Doc</th>
							</tr>
						</thead>
					</table>
					<table id="table-frontkedua" class="table table-hover dataTable no-footer dtr-inline" aria-describedby="table-front_info" style="width: 100% !important; ">
						<thead>
							<tr>
								<th>No</th>
								<th>Propinsi</th>
								<th>Penguatan Kelembagaan</th>
								<th>Pendampingan Kewirausahaan</th>
								<th>Pembentukan Kerjasama</th>
								<th>Penyusunan SK Pembentukan Kelompok Masyarakat</th>
							</tr>
						</thead>
					</table>
					<table id="table-frontketiga" class="table table-hover dataTable no-footer dtr-inline" aria-describedby="table-front_info" style="width: 100%;">
						<thead>
							<tr>
								<th>No</th>
								<th>Propinsi</th>
								<th>Pengembangan Rencana Usaha</th>
								<th>Fasilitas Akses Pemasaran</th>
								<th>Fasilitas Infrastruktur Pendukung</th>
								<th>Diseminasi Model Akses Reforma Agraria</th>
							</tr>

						</thead>
					</table>
				</div>
			</div>
		</div>
</section>



<div class="modal fade" id="modal-xl">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Dashboard Realisasi</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body" style="overflow: scroll;">
				<table id="table-frontpertama_kab" class="table table-hover dataTable no-footer dtr-inline" aria-describedby="table-front_info" style="width: 100%;">
					<thead>
						<tr>
							<th>No</th>
							<th>Propinsi</th>
							<th>Kab/Kota</th>
							<th>Penetapan Lokasi</th>
							<th>Penyuluhan</th>
							<th>Pemetaan Sosial</th>
							<th>Penetapan Model Pemberdayaan</th>
							<th>Penyusunan Data Penerima Akses</th>
						</tr>
						<tr>
							<th></th>
							<th></th>
							<th></th>
							<th>A</th>
							<th>R</th>
							<th>A</th>
							<th>R</th>
							<th>A</th>
							<th>R</th>
							<th>A</th>
							<th>R</th>
							<th>A</th>
							<th>R</th>
						</tr>
					</thead>
				</table>
			</div>
			<div class="modal-footer justify-content-between">

			</div>
		</div>
	</div>
</div>