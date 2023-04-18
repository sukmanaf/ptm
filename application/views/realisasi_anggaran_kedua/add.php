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
						<div class="col-md-4">
							<div class="form-group">
								<label for='tahun_anggaran'>Tahun Anggaran</label>
								<select name='tahun_anggaran' required id='tahun_anggaran' class="form-control custom-select">

									<option value='2019'>2019</option>
									<option value='2020'>2020</option>
									<option value='2021'>2021</option>
									<option value='2022'>2022</option>
									<option value='2023' selected='selected'>2023</option>

								</select>

							</div>
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<label for='kode_provinsi'>Kode Provinsi</label>
								<select name='kode_provinsi' required="" id='kode_provinsi' onchange="to_kab('kode_kab_kota',this)" class="form-control select2">
									<option value='' selected='selected'>Semua</option>

								</select>

							</div>
						</div>

						<div class="col-md-4">
							<div class="form-group">
								<label for='kode_kab_kota'>Kode Kab Kota</label>
								<select name='kode_kab_kota' required id='kode_kab_kota' class="form-control select2">
									<option value='' selected='selected'>Semua</option>
								</select>

							</div>
						</div>
					</div>
			</div>
		</div>

		<div class="card card-outline card-primary">
			<div class="card-body">
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>Penguatan Kelembagaan</label>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label for='anggaran_kelembagaan'>Anggaran</label>
							<input name='anggaran_kelembagaan' id='anggaran_kelembagaan' type='text' value='' class="form-control" onkeyup="hitung('anggaran_kelembagaan+realisasi_kelembagaan','sisa_anggaran_kelembagaan+persentase_kelembagaan')" onkeypress="return isNumber(event)">

						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>Pendampingan Kewirausahaan</label>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label for='anggaran_kewirausahaan'>Anggaran</label>
							<input name='anggaran_kewirausahaan' id='anggaran_kewirausahaan' type='text' value='' class="form-control" onkeyup="hitung('anggaran_kewirausahaan+realisasi_kewirausahaan','sisa_anggaran_kewirausahaan+persentase_kewirausahaan')" onkeypress="return isNumber(event)">

						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>Pembentukan Kerjasama</label>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label for='anggaran_kerjasama'>Anggaran</label>
							<input name='anggaran_kerjasama' id='anggaran_kerjasama' type='text' value='' class="form-control" onkeyup="hitung('anggaran_kerjasama+realisasi_kerjasama','sisa_anggaran_kerjasama+persentase_kerjasama')" onkeypress="return isNumber(event)">

						</div>
					</div>
				</div>

				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label>Penyusunan SK Pembentukan Kelompok Masyarakat</label>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label for='anggaran_penyusunan_sk'>Anggaran</label>
							<input name='anggaran_penyusunan_sk' id='anggaran_penyusunan_sk' type='text' value='' class="form-control" onkeyup="hitung('anggaran_penyusunan_sk+realisasi_penyusunan_sk','sisa_anggaran_penyusunan_sk+persentase_penyusunan_sk')" onkeypress="return isNumber(event)">

						</div>
					</div>
				</div>

			

				<div class="row">
					<div class="col-md-6">
						<div class="row">
							<div class="col">
								<div class="form-group">
									<a href="<?= base_url('realisasi_anggaran_kedua') ?>" class="form-control btn btn-secondary"><label>Tutup</label></a>
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

<script>
	function hitung(yuhu, hasil) {
		var total = 0;
		var yuhu = yuhu.split('+')
		var hasil = hasil.split('+')
		var hasil_satu = $("#" + hasil[0]).val()
		var hasil_dua = $("#" + hasil[1]).val()
		var satu = $("#" + yuhu[0]).val()
		var dua = $("#" + yuhu[1]).val()
		if (isNaN(parseInt(satu))) {
			satu = 0
		}
		if (isNaN(parseInt(dua))) {
			dua = 0
		}
		if (parseInt(dua) > parseInt(satu)) {
			toastr.error('Realisasi Tidak Boleh Melebihi Anggaran')
			var n_realisasi = hasil_dua.length
			var hasil_realisasi = parseInt(n_realisasi) - 1
			$("#" + yuhu[1]).val(dua.substring(0, hasil_realisasi))
			return;
		}
		var to = parseInt(satu) - parseInt(dua)
		var hasil_persen = (parseInt(dua) / parseInt(satu)) * 100
		$("#" + hasil[0]).val(to)
		$("#" + hasil[1]).val(hasil_persen)


	}

	function isNumber(evt, a) {

		evt = (evt) ? evt : window.event;
		var charCode = (evt.which) ? evt.which : evt.keyCode;
		if (charCode > 31 && (charCode < 48 || charCode > 57)) {
			return false;
		}
		return true;
	}

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
			event.preventDefault(); //prevent default action 
			var post_url = '<?php echo base_url("realisasi_anggaran_kedua/create") ?>'; //get form action url
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
		combo('kode_provinsi', 'ms_provinsi~nama_provinsi~kode')

	})

	function to_kab(idElmt, a, set = '') {
		b = a.value;
		if (b === undefined) {
			b = a
		}
		combo(idElmt, 'ms_kab_kota~nama_kab_kota~kode', 'kode_provinsi', b, set)
	}

	function combo(divname, table = '', colum = '1', id = '1', set = '') {
		url3 = "<?php echo base_url(); ?>realisasi_anggaran_kedua/tampildata/" + table + "/" + colum + "/" + id + "/combobox";

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

	function nikChange(nik) {
		event.preventDefault(); //prevent default action 
		$.get("<?php echo base_url("realisasi_anggaran_kedua/detailNik/") ?>" + nik, function(data) {
			data = JSON.parse(data)
			console.log(data.luas)
			$('#keanggotaan').val(data.keanggotaan)
			$('#realisasi_anggaran').val(data.realisasi_anggaran)
			$('#nama_kelompok').val(data.kelompok)
			$('#luas_tanah').val(data.luas)
		});
	}
</script>