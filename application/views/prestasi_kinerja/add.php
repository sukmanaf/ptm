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
						<div class="col-md-8">
							<div class="form-group">
								<label for="">Sektor Usaha</label>
								<select id="kode_sektor_usaha" name="kode_sektor_usaha" required class="form-control select2" style="width: 100%;">
									<option value="">-- Semua --</option>
									<?php foreach ($key as $key => $value) : ?>
										<option value="<?= $value->kode_sektor_usaha ?>"><?= $value->deskripsi ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="kode_prestasi_kinerja">Kode Sub Sektor Usaha</label>
								<input name="kode_prestasi_kinerja" maxlength="4" id="kode_prestasi_kinerja" type="text" value="" class="form-control clear">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="deskripsi">Deskripsi</label>
								<input name="deskripsi" id="deskripsi" type="text" value="" class="form-control clear">
							</div>
						</div>
					</div>




					<div class="row">
						<div class="col-md-6">
							<div class="row">
								<div class="col">
									<div class="form-group">
										<a href="<?= base_url('prestasi_kinerja') ?>" class="form-control btn btn-secondary"><label>Tutup</label></a>
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
			var kode = $("#kode_prestasi_kinerja").val()
			var dt = tampil_data('ms_kuesioner_re10b', 'kode_subsektor_usaha', kode);
			if (dt.length > 0) {
				toastr.error('Kode Sub Sektor Usaha Tersebut Sudah Ada !!')
				return
			}
			event.preventDefault(); //prevent default action 
			var post_url = '<?php echo base_url("prestasi_kinerja/create") ?>'; //get form action url
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
					// $('#table-front').DataTable().ajax.reload();
				} else {
					toastr.error(response.message);
				}
			});


		});


	})

	function tampil_data(table, colum, id) {
		var url = ''
		var tadata = ''
		urls = "<?php echo base_url(); ?>prestasi_kinerja/tampildata/" + table + "/" + colum + "/" + id;
		$.ajax({
			url: urls,
			contentType: "application/json; charset=utf-8",
			dataType: "json",
			async: false,
			success: function(data) {
				tadata = data;
			},
			failure: function(errMsg) {
				alert(errMsg);
			}
		});
		return tadata;
	}

	function nikChange(key) {
		event.preventDefault(); //prevent default action 
		$.get("<?php echo base_url("prestasi_kinerja/detailNik/") ?>" + key, function(data) {
			data = JSON.parse(data)
		});
	}
</script>