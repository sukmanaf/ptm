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
			<div class="card-body">
				<form action="#" id="postForm" class="form-horizontal" enctype="multipart/form-data" method="post">
					<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Group Instansi</label>
								<select id="instansi_id" name="instansi_id" required class="form-control select2" style="width: 100%;">
									<!-- <option value="">-- Semua --</option> -->
									<?php foreach ($key as $key => $value) : ?>
										<option value="<?= $value->id ?>"><?= $value->nama . " - " . $value->jenis ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nama_instansi">Nama Instansi</label>
								<input name="nama_instansi" id="nama_instansi" type="text" value="" class="form-control clear">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="contac_person">Kontak Person</label>
								<input name="contac_person" id="contac_person" type="text" value="" class="form-control clear">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="alamat_instansi">Alamat Instansi</label>
								<input name="alamat_instansi" id="alamat_instansi" type="text" value="" class="form-control clear">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="email">Email</label>
								<input name="email" id="email" type="text" value="" class="form-control clear">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nomor_telp">Nomor Telp</label>
								<input name="nomor_telp" id="nomor_telp" type="text" value="" class="form-control clear">
							</div>
						</div>
					</div>




					<div class="row">
						<div class="col-md-6">
							<div class="row">
								<div class="col">
									<div class="form-group">
										<a href="<?= base_url('detail_instansi_swasta') ?>" class="form-control btn btn-secondary"><label>Tutup</label></a>
									</div>
								</div>
								<div class="col">
									<div class="form-group">
										<input name="" id="" type="submit" value="Simpan" class="form-control btn btn-warning">
									</div>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- /.container-fluid -->
</section>

<script type="text/javascript">
	$(document).ready(function() {
		$('.lampiran').on('change', function() {
			// var fuUpload = document.getElementById("lampiran1");
			if (this.files[0].type != 'application/pdf') {
				toastr.error('Tipe File Salah atau File Rusak!')
				$(this).val('')
			}
		});

		$('.select2').select2()
		$('#titleId').html('<?= $title ?>')

		$("#postForm").submit(function(event) {
			event.preventDefault(); //prevent default action 
			var post_url = '<?php echo base_url("detail_instansi_swasta/create") ?>'; //get form action url
			var request_method = $(this).attr("method"); //get form GET/POST method
			var form_data = new FormData(this); //Encode form elements for submission


			$.ajax({
				url: post_url,
				type: 'POST',
				data: new FormData(this),
				processData: false,
				contentType: false,
				cache: false,
				async: false,
			}).done(function(response) {
				response = JSON.parse(response)
				if (response.sts == 'success') {
					toastr.success(response.message);
					$('.clear').val("")
					// $('#table-front').DataTable().ajax.reload();
				} else {
					toastr.error(response.message);
				}
			});


		});


	})



	function nikChange(key) {
		event.preventDefault(); //prevent default action 
		$.get("<?php echo base_url("detail_instansi_swasta/detailNik/") ?>" + key, function(data) {
			data = JSON.parse(data)
		});
	}
</script>