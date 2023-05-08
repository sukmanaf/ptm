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
				<!-- <a style="float: right" href="<?= base_url('dashboard_realisasi/add') ?>" class="btn btn-warning pull-right">
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
							<select id="tahap" name="" onchange="to_change(this)" required class="form-control select2" style="width: 100%;">
								<option value="pertama"> Pertama</option>
								<option value="kedua"> Kedua</option>
								<option value="ketiga"> Ketiga</option>
							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="">Jenis Realisasi</label>
							<select id="jenis" name="" onchange="to_change(this)" required class="form-control select2" style="width: 100%;">
								<option value="anggaran"> Anggaran</option>
								<option value="fisik"> Fisik</option>
							</select>
						</div>
					</div>
				</div>
				<div id="table-front_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
					<table id="table-frontpertama" class="table table-hover dataTable no-footer dtr-inline" aria-describedby="table-front_info" style="width: 100%;">
						<thead>
							<tr>
								<th>No</th>
								<th>Propinsi</th>
								<th colspan="2">Penetapan Lokasi</th>
								<th colspan="2">Penyuluhan</th>
								<th colspan="2">Pemetaan Sosial</th>
								<th colspan="2">Penetapan Model Pemberdayaan</th>
								<th colspan="2">Penyusunan Data Penerima Akses</th>
							</tr>
							<tr id="anggaran" style="display:none;">
								<th></th>
								<th></th>
								<th>Anggaran</th>
								<th>Realisasi</th>
								<th>Anggaran</th>
								<th>Realisasi</th>
								<th>Anggaran</th>
								<th>Realisasi</th>
								<th>Anggaran</th>
								<th>Realisasi</th>
								<th>Anggaran</th>
								<th>Realisasi</th>
							</tr>
							<tr id="fisik" style="display:none;">
								<th></th>
								<th></th>
								<th>Target</th>
								<th>Realisasi</th>
								<th>Target</th>
								<th>Realisasi</th>
								<th>Target</th>
								<th>Realisasi</th>
								<th>Target</th>
								<th>Realisasi</th>
								<th>Target</th>
								<th>Realisasi</th>
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
							<th colspan="2">Penetapan Lokasi</th>
							<th colspan="2">Penyuluhan</th>
							<th colspan="2">Pemetaan Sosial</th>
							<th colspan="2">Penetapan Model Pemberdayaan</th>
							<th colspan="2">Penyusunan Data Penerima Akses</th>
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
<script type="text/javascript">
	function to_kab(a, idtabkab) {
		b = a.value;
		if (b === undefined) {
			b = a
		}
		var tab = $('#table-front' + idtabkab).DataTable();
		tab.destroy()
		loadDtKab(b, idtabkab)
	}

	function to_change(a) {
		b = a.value;
		if (b === undefined) {
			b = a
		}
		var tahun = $("#tahun").val()
		var tahap = $("#tahap").val()
		var jenis = $("#jenis").val()
		if (jenis == 'fisik') {
			$("#fisik").show()
			$("#anggaran").hide()
		} else {
			$("#fisik").hide()
			$("#anggaran").show()
		}
		var tab = $('#table-front' + tahap).DataTable();

		tab.destroy()
		loadDt(tahap, tahun)
	}
	$(document).ready(function() {
		$("#anggaran").show()

		loadDt('pertama', 2023);
	});

	function loadDt(idtab, tahun) {

		$('#table-frontpertama').css('display', 'none')
		$('#table-frontpertama_wrapper').css('display', 'none')
		$('#table-frontkedua_wrapper').css('display', 'none')
		$('#table-frontketiga_wrapper').css('display', 'none')
		$('#table-frontkedua').css('display', 'none')
		$('#table-frontketiga').css('display', 'none')
		$('#table-front' + idtab).css('display', 'block')


		$('#table-front' + idtab).DataTable({
			ajax: {
				url: '<?php echo base_url(); ?>dashboard_realisasi/get_all/' + idtab + "/" + tahun,
				data: function(d) {
					d.<?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>"
				},
				dataSrc: ''
			}
		})
	}

	function loadDtKab(kdprov, idtabkab) {

		$('#table-front' + idtabkab).DataTable({
			ajax: {
				url: '<?php echo base_url(); ?>dashboard_realisasi/get_kab/' + kdprov + "/" + idtabkab,
				data: function(d) {
					d.<?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>"
				},
				dataSrc: ''
			}
		})
	}

	function dels(id) {
		$.get("<?= base_url('dashboard_realisasi/delete/') ?>" + id, function(response) {
			response = JSON.parse(response)
			if (response.sts == 'success') {
				toastr.success("Data Sudah Terhapus!");
				$('#table-front').DataTable().ajax.reload();
			} else {
				toastr.error("Data Gagal Dihapus!");
			}
		});
	}
</script>