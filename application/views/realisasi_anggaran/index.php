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
				<a style="float: right" href="<?= base_url('realisasi_anggaran/add') ?>" class="btn btn-warning pull-right">
					<i class="fas fa-plus mr-2 text-white"></i>Baru </a>
				<div class="card-tools">
					<div class="input-group input-group-sm">
						<div class="input-group-append"></div>
					</div>
				</div>
			</div>

			<div style="padding: 20px">
			</div>
			<div class="card-body table-responsive">
				<div id="table-front_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
					<table id="table-front" class="table table-hover dataTable no-footer dtr-inline" aria-describedby="table-front_info" style="width: 1038px;">
						<thead>
							<tr>
								<th>No</th>
								<th>Tahun Anggaran</th>
								<th>Provinsi</th>
								<th>Kab Kota</th>
								<th>Target KK</th>
								<th>Anggaran Penlok</th>
								<th>Anggaran Penyuluhan</th>
								<th>Anggaran Pemsos</th>
								<th>Anggaran Pemberdayaan</th>
								<th>Anggaran Penyusunan_data</th>
								<th>Realisasi Penlok</th>
								<th>Realisasi Penyuluhan</th>
								<th>Realisasi Pemsos</th>
								<th>Realisasi Pemberdayaan</th>
								<th>Realisasi Penyusunan Data</th>
								<th>Sisa Anggaran Penlok</th>
								<th>Sisa Anggaran Penyuluhan </th>
								<th>Sisa Anggaran Pemsos</th>
								<th>Sisa Anggaran Pemberdayaan</th>
								<th>Sisa Anggaran Penyusunan_data</th>
								<th>Persentase Penlok</th>
								<th>Persentase Penyuluhan</th>
								<th>Persentase Pemsos</th>
								<th>Persentase Pemberdayaan</th>
								<th>Persentase Penyusunan Data</th>
								<th>Aksi</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
</section>

<script type="text/javascript">
	$(document).ready(function() {
		loadDt();
	});

	function loadDt() {
		$('#table-front').DataTable({
			ajax: {
				url: '<?php echo base_url(); ?>realisasi_anggaran/get_all',
				data: function(d) {
					d.<?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>"
				},
				dataSrc: ''
			}
		})
	}

	function dels(id) {
		$.get("<?= base_url('realisasi_anggaran/delete/') ?>" + id, function(response) {
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