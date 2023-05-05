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
			</div>

			<div style="padding: 20px">
			</div>
			<div class="card-body table-responsive">
				<div class="col-md-7">
					<form action="#" id="postForm" class="form-horizontal" enctype="multipart/form-data" method="post">
						<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for='file_foto_sk2'>File</label>
									<div class="custom-file">
										<input name='files' id='files' type='file' class="clear">
										<!-- <label class="custom-file-label" for='files'>Pilih file</label> -->
									</div>

								</div>
							</div>
							<div class="col-md-4">
								<div class="row">
									<div class="col">
										<div class="form-group">
											<label class="col-form-label" for="inputSuccess">
											</label>
											<input name="" id="" type="submit" value="Simpan" class="form-control btn btn-warning">
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-4">
								<div class="row">
									<div class="col">
										<div class="form-group">
											<label class="col-form-label" for="inputSuccess">
											</label>
											<a class="btn btn-success form-control" target="_blank" href="<?php echo base_url('lintor_kemensos/download_template'); ?>">Download Template Excel</a>

										</div>
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
				<div id="table-front_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
					<table id="table-front" class="table table-hover dataTable no-footer dtr-inline" aria-describedby="table-front_info" style="width: 100%;">
						<thead>
							<tr>
								<th>No</th>
								<th>Nama </th>
								<th>NIK</th>
								<th>Nomor Register fakir miskin dan orang tidak mampu</th>
								<th>Bantuan Pernah Diterima</th>
								<th>Keterangan</th>
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
		$('#files').on('change', function() {
			// var fuUpload = document.getElementById("lampiran1");

			if (this.files[0].type != 'application/vnd.ms-excel' && this.files[0].type != 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet') {
				toastr.error('Tipe File Salah atau File Rusak!')
				$(this).val('')
				$('#sk2_prewview').attr('src', '');
			} else {
				console.log(URL.createObjectURL(this.files[0]))
				var url = URL.createObjectURL(this.files[0]);
				$('#sk2_prewview').attr('src', url);

			}
		});
		$("#postForm").submit(function(event) {
			event.preventDefault(); //prevent default action 
			var post_url = '<?php echo base_url("lintor_kemensos/create") ?>'; //get form action url
			var request_method = $(this).attr("method"); //get form GET/POST method
			var form_data = new FormData(this); //Encode form elements for submission


			$.ajax({
				url: post_url,
				type: 'POST',
				data: form_data,
				processData: false,
				contentType: false,
				cache: false,
				async: false,
			}).done(function(response) {
				response = JSON.parse(response)
				if (response.sts == 'success') {
					toastr.success(response.message);
					$('.clear').val("")
					window.location.replace('<?= base_url("lintor_kemensos") ?>');

					// $('#table-front').DataTable().ajax.reload();
				} else {
					toastr.error(response.message);
				}
			});


		});
	});

	function loadDt() {
		$('#table-front').DataTable({
			ajax: {
				url: '<?php echo base_url(); ?>lintor_kemensos/get_all',
				data: function(d) {
					d.<?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>"
				},
				dataSrc: ''
			}
		})
	}

	function dels(id) {
		$.get("<?= base_url('lintor_kemensos/delete/') ?>" + id, function(response) {
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