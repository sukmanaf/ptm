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
				<!-- <a style="float: right" href="<?= base_url('dashboard_field_staff/add') ?>" class="btn btn-warning pull-right">
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

				<div id="table-front_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
					<table id="table-frontpertama" class="table table-hover dataTable no-footer dtr-inline" aria-describedby="table-front_info" style="width: 100%;">
						<thead>
							<tr>
								<th>No</th>
								<th>Propinsi</th>
								<th>Jumlah</th>
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
				<h4 class="modal-title">Dashboard Field Staff</h4>
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
							<th>Jumlah</th>
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

	$(document).ready(function() {
		loadDt();
	});

	function loadDt() {


		$('#table-frontpertama').DataTable({
			ajax: {
				url: '<?php echo base_url(); ?>dashboard_field_staff/get_all/',
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
				url: '<?php echo base_url(); ?>dashboard_field_staff/get_kab/' + kdprov + "/" + idtabkab,
				data: function(d) {
					d.<?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>"
				},
				dataSrc: ''
			}
		})
	}

	function dels(id) {
		$.get("<?= base_url('dashboard_field_staff/delete/') ?>" + id, function(response) {
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