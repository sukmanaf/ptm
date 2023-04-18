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
								<label for="npk">NPK</label>
								<input name="npk" id="npk" type="text" value="" class="form-control clear">
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="nama">Nama Fieldstaff</label>
								<input name="nama" id="nama" type="text" value="" class="form-control clear">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="hp">Telepon/HP</label>
								<input name="hp" id="hp" maxlength="13" type="text" value="" class="form-control clear">

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="deskripsi">Tanggal Akhir Penugasan</label>
								<input name="tgl_akhir" id="tgl_akhir" type="date" value="" class="form-control clear">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Provinsi</label>
								<select id="kode_provinsi" name="kode_provinsi" required onchange="to_kab('kode_kab_kota',this)" class="form-control select2" style="width: 100%;">
									<option value="">-- Semua --</option>
									<?php foreach ($key as $key => $value) : ?>
										<option value="<?= $value->kode ?>"><?= $value->nama_provinsi ?></option>
									<?php endforeach ?>
								</select>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="">Kab kota</label>
								<select id="kode_kab_kota" name="kode_kab_kota" required class="form-control select2" style="width: 100%;">
									<option value="">-- Semua --</option>

								</select>
							</div>
						</div>

					</div>
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for='file_foto_sk2'>File</label>
								<div class="custom-file">
									<input name='files' id='files' type='file' class="clear">
									<!-- <label class="custom-file-label" for='files'>Pilih file</label> -->
								</div>

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label class="col-form-label" for="inputSuccess">
								</label>
								<button type="button" class="form-control btn btn-default" data-toggle="modal" data-target="#modal-2">
									Lihat File
								</button>
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-md-6">
							<div class="row">
								<div class="col">
									<div class="form-group">
										<a href="<?= base_url('lintor_kkp') ?>" class="form-control btn btn-secondary"><label>Tutup</label></a>
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
	<div class="modal fade" id="modal-2">
		<div class="modal-dialog modal-xl">
			<div class="modal-content">
				<div class="modal-header">
					<h4 class="modal-title">Preview</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<iframe id="sk2_prewview" src="" class="w-100" style="height:500px;width: 100%" frameborder="0"></iframe>

				</div>
				<div class="modal-footer justify-content-between">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
			<!-- /.modal-content -->
		</div>
		<!-- /.modal-dialog -->
	</div>
	<!-- /.container-fluid -->
</section>

<script type="text/javascript">
	function to_kab(idElmt, a, set = '') {
		b = a.value;
		if (b === undefined) {
			b = a
		}
		combo(idElmt, 'ms_kab_kota~nama_kab_kota~kode', 'kode_provinsi', b, set)
	}

	function combo(divname, table = '', colum = '1', id = '1', set = '') {
		url3 = "<?php echo base_url(); ?>lintor_kkp/tampildata/" + table + "/" + colum + "/" + id + "/combobox";

		$.get(url3).done(function(data3) {
			jdata3 = JSON.parse(data3);
			//*
			$('#' + divname).empty();
			$('#' + divname).append(new Option("--Pilih--", ""));


			$.each(jdata3, function(i, el) {
				$('#' + divname).append(new Option(el.nama, el.kode));

			});
			$('#' + divname).val(set);

		}).fail(function() {
			alert("error");
		}).always(function() {
			// alert("finished");
		});
	}

	function tampil_data(table, colum, id) {
		var url = ''
		var tadata = ''
		urls = "<?php echo base_url(); ?>lintor_kkp/tampildata/" + table + "/" + colum + "/" + id;
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

	$(document).ready(function() {
		$('#files').on('change', function() {
			// var fuUpload = document.getElementById("lampiran1");
			if (this.files[0].type != 'image/jpeg' && this.files[0].type != 'image/jpg' && this.files[0].type != 'image/png' && this.files[0].type != 'image/gif' && this.files[0].type != 'application/pdf') {
				toastr.error('Tipe File Salah atau File Rusak!')
				$(this).val('')
				$('#sk2_prewview').attr('src', '');
			} else {
				console.log(URL.createObjectURL(this.files[0]))
				var url = URL.createObjectURL(this.files[0]);
				$('#sk2_prewview').attr('src', url);

			}
		});

		$('.select2').select2()
		$('#titleId').html('<?= $title ?>')


		$("#postForm").submit(function(event) {
			event.preventDefault(); //prevent default action 
			var post_url = '<?php echo base_url("lintor_kkp/create") ?>'; //get form action url
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
					window.location.replace('<?= base_url("lintor_kkp") ?>');

					// $('#table-front').DataTable().ajax.reload();
				} else {
					toastr.error(response.message);
				}
			});


		});


	})
</script>