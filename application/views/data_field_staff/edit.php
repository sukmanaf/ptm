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
<<<<<<< HEAD
								<input name="hp" id="hp" maxlength="13" type="text" value="" class="form-control clear">
=======
								<input name="hp" id="hp" maxlength="14" type="text" value="" class="form-control clear">
>>>>>>> 1beb25b9a1b5b93b96330979bc73036c1d713375
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
										<a href="<?= base_url('data_field_staff') ?>" class="form-control btn btn-secondary"><label>Tutup</label></a>
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
	var id = "<?php echo $id; ?>"


	function to_kab(idElmt, a, set = '') {
		b = a.value;
		if (b === undefined) {
			b = a
		}
		combo(idElmt, 'ms_kab_kota~nama_kab_kota~kode', 'kode_provinsi', b, set)
	}

	function tampil_data(table, colum, id) {
		var url = ''
		var tadata = ''
		urls = "<?php echo base_url(); ?>data_field_staff/tampildata/" + table + "/" + colum + "/" + id;
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

	function combo(divname, table = '', colum = '1', id = '1', set = '') {
		url3 = "<?php echo base_url(); ?>data_field_staff/tampildata/" + table + "/" + colum + "/" + id + "/combobox";

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
	$(document).ready(function() {
		var dt = tampil_data('wa_surveyor', 'id', id);
		combo('kode_provinsi', 'ms_provinsi~nama_provinsi~kode', '1', '1', dt[0].kode_provinsi)
		combo("kode_kab_kota", 'ms_kab_kota~nama_kab_kota~kode', 'kode_provinsi', dt[0].kode_provinsi, dt[0].kode_kab_kota)
		$("#npk").val(dt[0].npk)
		$("#nama").val(dt[0].fullname)
		$("#hp").val(dt[0].phone)
		$("#tgl_akhir").val(dt[0].assignment_end_date)



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
			event.preventDefault(); //prevent default action 
			var post_url = '<?php echo base_url("data_field_staff/update") ?>'; //get form action url
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
					window.location.replace('<?= base_url("data_field_staff") ?>');
					// $('#table-front').DataTable().ajax.reload();
				} else {
					toastr.error(response.message);
				}
			});


		});


	})



	function nikChange(nik) {
		event.preventDefault(); //prevent default action 
		$.get("<?php echo base_url("sub_sektor_usaha/detailNik/") ?>" + nik, function(data) {
			data = JSON.parse(data)
			console.log(data.luas)
			$('#keanggotaan').val(data.keanggotaan)
			$('#sub_sektor_usaha').val(data.sub_sektor_usaha)
			$('#nama_kelompok').val(data.kelompok)
			$('#luas_tanah').val(data.luas)
		});
	}
</script>