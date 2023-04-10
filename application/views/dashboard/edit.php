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
					<input type="hidden" name="id" value="<?= $data['id'] ?>">

					<div class="row">
						<div class="col-md-8">
							<div class="form-group">
								<label for="">Sektor Usaha</label>
								<select id="kode_sektor_usaha" name="kode_sektor_usaha" required class="form-control select2" style="width: 100%;">
									<option value="">-- Semua --</option>
									<?php foreach ($key as $key => $value) : ?>
										<?php if ($value->kode_sektor_usaha == $data['kode_sektor_usaha']) {
											$sel = 'selected';
										} else {
											$sel = '';
										} ?>

										<option <?= @$sel ?> value="<?= $value->kode_sektor_usaha ?>"><?= $value->deskripsi ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="kode_sub_dashboard">Kode Sub Sektor Usaha</label>
								<input name="kode_dashboard" maxlength="4" id="kode_dashboard" type="text" value="<?= $data['kode_subsektor_usaha'] ?>" class="form-control clear">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="deskripsi">Deskripsi</label>
								<input name="deskripsi" id="deskripsi" type="text" value="<?= $data['deskripsi'] ?>" class="form-control clear">
							</div>
						</div>
					</div>



					<div class="row">
						<div class="col-md-6">
							<div class="row">
								<div class="col">
									<div class="form-group">
										<a href="<?= base_url('dashboard') ?>" class="form-control btn btn-secondary"><label>Tutup</label></a>
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

		$("#nama_kelompok").keyup(function(event) {
			var namaKel = $("#nama_kelompok").val();
			if (namaKel == '') {
				$("#keanggotaan").val('');
				$("#keanggotaan").prop('readonly', true)
			} else {
				$("#keanggotaan").prop('readonly', false)
			}
		})

		$("#postForm").submit(function(event) {
			var kode = $("#kode_dashboard").val()
			var dt = tampil_data('ms_kuesioner_re10b', 'kode_subsektor_usaha', kode);
			if (dt.length > 0 && dt[0].kode_subsektor_usaha != kode) {
				toastr.error('Kode Sub Sektor Usaha Tersebut Sudah Ada !!')
				return
			}
			event.preventDefault(); //prevent default action 
			var post_url = '<?php echo base_url("dashboard/update") ?>'; //get form action url
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
					window.location.replace('<?= base_url("dashboard") ?>');
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
		urls = "<?php echo base_url(); ?>dashboard/tampildata/" + table + "/" + colum + "/" + id;
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



	function nikChange(nik) {
		event.preventDefault(); //prevent default action 
		$.get("<?php echo base_url("dashboard/detailNik/") ?>" + nik, function(data) {
			data = JSON.parse(data)
			console.log(data.luas)
			$('#keanggotaan').val(data.keanggotaan)
			$('#dashboard').val(data.dashboard)
			$('#nama_kelompok').val(data.kelompok)
			$('#luas_tanah').val(data.luas)
		});
	}
</script>