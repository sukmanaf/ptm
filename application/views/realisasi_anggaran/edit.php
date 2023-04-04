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
			<div class="card card-outline card-primary">
				<div class="card-body">
					<form action="#" id="postForm" class="form-horizontal" enctype="multipart/form-data" method="post">
						<input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" style="display: none">
						<input type="hidden" name="id" value="<?= $data['id'] ?>">
						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for='tahun_anggaran'>Tahun Anggaran</label>
									<select name='tahun_anggaran' id='tahun_anggaran' class="form-control custom-select">

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
									<select name='kode_provinsi' id='kode_provinsi' onchange="to_kab('kode_kab_kota',this)" class="form-control select2">
										<option value='0' selected='selected'>Semua</option>

									</select>

								</div>
							</div>

							<div class="col-md-4">
								<div class="form-group">
									<label for='kode_kab_kota'>Kode Kab Kota</label>
									<select name='kode_kab_kota' id='kode_kab_kota' class="form-control select2">
										<option value='0' selected='selected'>Semua</option>
									</select>

								</div>
							</div>
						</div>
				</div>
			</div>

			<div class="card card-outline card-primary">
				<div class="card-body">

					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for='target_kk'>Target KK</label>
								<input name='target_kk' id='target_kk' type='text' value='' class="form-control">

							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Penlok</label>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for='anggaran_penlok'>Anggaran</label>
								<input name='anggaran_penlok' id='anggaran_penlok' type='text' value='' class="form-control" onkeyup="hitung('anggaran_penlok+realisasi_penlok','sisa_anggaran_penlok+persentase_penlok')" onkeypress="return isNumber(event)">

							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for='realisasi_penlok'>Realisasi</label>
								<input name='realisasi_penlok' id='realisasi_penlok' type='text' value='' class="form-control" onkeyup="hitung('anggaran_penlok+realisasi_penlok','sisa_anggaran_penlok+persentase_penlok')" onkeypress="return isNumber(event)">

							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for='sisa_anggaran_penlok'>Sisa Anggaran</label>
								<input name='sisa_anggaran_penlok' id='sisa_anggaran_penlok' type='text' value='' class="form-control" readonly="true">

							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">

								<label for='persentase_penlok'>Persentase</label>
								<div class="input-group mb-3">
									<input name='persentase_penlok' id='persentase_penlok' type='text' value='' class="form-control" readonly="true">
									<div class="input-group-append">
										<span class="input-group-text" id="basic-addon2">%</span>
									</div>
								</div>

							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Penyuluhan</label>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for='anggaran_penyuluhan'>Anggaran</label>
								<input name='anggaran_penyuluhan' id='anggaran_penyuluhan' type='text' value='' class="form-control" onkeyup="hitung('anggaran_penyuluhan+realisasi_penyuluhan','sisa_anggaran_penyuluhan+persentase_penyuluhan')" onkeypress="return isNumber(event)">

							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for='realisasi_penyuluhan'>Realisasi</label>
								<input name='realisasi_penyuluhan' id='realisasi_penyuluhan' type='text' value='' class="form-control" onkeyup="hitung('anggaran_penyuluhan+realisasi_penyuluhan','sisa_anggaran_penyuluhan+persentase_penyuluhan')" onkeypress="return isNumber(event)">

							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for='sisa_anggaran_penyuluhan'>Sisa Anggaran</label>
								<input name='sisa_anggaran_penyuluhan' id='sisa_anggaran_penyuluhan' type='text' value='' class="form-control" readonly="true">

							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for='persentase_penyuluhan'>Persentase</label>
								<div class="input-group mb-3">
									<input name='persentase_penyuluhan' id='persentase_penyuluhan' type='text' value='' class="form-control" readonly="true">
									<div class="input-group-append">
										<span class="input-group-text" id="basic-addon2">%</span>
									</div>
								</div>

							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Pemsos</label>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for='anggaran_pemsos'>Anggaran</label>
								<input name='anggaran_pemsos' id='anggaran_pemsos' type='text' value='' class="form-control" onkeyup="hitung('anggaran_pemsos+realisasi_pemsos','sisa_anggaran_pemsos+persentase_pemsos')" onkeypress="return isNumber(event)">

							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for='realisasi_pemsos'>Realisasi</label>
								<input name='realisasi_pemsos' id='realisasi_pemsos' type='text' value='' class="form-control" onkeyup="hitung('anggaran_pemsos+realisasi_pemsos','sisa_anggaran_pemsos+persentase_pemsos')" onkeypress="return isNumber(event)">

							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for='sisa_anggaran_pemsos'>Sisa Anggaran</label>
								<input name='sisa_anggaran_pemsos' id='sisa_anggaran_pemsos' type='text' value='' class="form-control" readonly="true">

							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for='persentase_pemsos'>Persentase</label>
								<div class="input-group mb-3">
									<input name='persentase_pemsos' id='persentase_pemsos' type='text' value='' class="form-control" readonly="true">
									<div class="input-group-append">
										<span class="input-group-text" id="basic-addon2">%</span>
									</div>
								</div>

							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Pemberdayaan</label>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for='anggaran_pemberdayaan'>Anggaran</label>
								<input name='anggaran_pemberdayaan' id='anggaran_pemberdayaan' type='text' value='' class="form-control" onkeyup="hitung('anggaran_pemberdayaan+realisasi_pemberdayaan','sisa_anggaran_pemberdayaan+persentase_pemberdayaan')" onkeypress="return isNumber(event)">

							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for='realisasi_pemberdayaan'>Realisasi</label>
								<input name='realisasi_pemberdayaan' id='realisasi_pemberdayaan' type='text' value='' class="form-control" onkeyup="hitung('anggaran_pemberdayaan+realisasi_pemberdayaan','sisa_anggaran_pemberdayaan+persentase_pemberdayaan')" onkeypress="return isNumber(event)">

							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for='sisa_anggaran_pemberdayaan'>Sisa Anggaran</label>
								<input name='sisa_anggaran_pemberdayaan' id='sisa_anggaran_pemberdayaan' type='text' value='' class="form-control" readonly="true">

							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for='persentase_pemberdayaan'>Persentase</label>
								<div class="input-group mb-3">
									<input name='persentase_pemberdayaan' id='persentase_pemberdayaan' type='text' value='' class="form-control" readonly="true">
									<div class="input-group-append">
										<span class="input-group-text" id="basic-addon2">%</span>
									</div>
								</div>

							</div>
						</div>
					</div>

					<div class="row">
						<div class="col-md-3">
							<div class="form-group">
								<label>Penyusunan Data</label>
							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for='anggaran_penyusunan_data'>Anggaran</label>
								<input name='anggaran_penyusunan_data' id='anggaran_penyusunan_data' type='text' value='' class="form-control" onkeyup="hitung('anggaran_penyusunan_data+realisasi_penyusunan_data','sisa_anggaran_penyusunan_data+persentase_penyusunan_data')" onkeypress="return isNumber(event)">

							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for='realisasi_penyusunan_data'>Realisasi</label>
								<input name='realisasi_penyusunan_data' id='realisasi_penyusunan_data' type='text' value='' class="form-control" onkeyup="hitung('anggaran_penyusunan_data+realisasi_penyusunan_data','sisa_anggaran_penyusunan_data+persentase_penyusunan_data')" onkeypress="return isNumber(event)">

							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for='sisa_anggaran_penyusunan_data'>Sisa Anggaran</label>
								<input name='sisa_anggaran_penyusunan_data' id='sisa_anggaran_penyusunan_data' type='text' value='' class="form-control" readonly="true">

							</div>
						</div>
						<div class="col-md-2">
							<div class="form-group">
								<label for='persentase_penyusunan_data'>Persentase</label>
								<div class="input-group mb-3">
									<input name='persentase_penyusunan_data' id='persentase_penyusunan_data' type='text' value='' class="form-control" readonly="true">
									<div class="input-group-append">
										<span class="input-group-text" id="basic-addon2">%</span>
									</div>
								</div>

							</div>
						</div>
					</div>




					<div class="row">
						<div class="col-md-6">
							<div class="row">
								<div class="col">
									<div class="form-group">
										<a href="<?= base_url('realisasi_anggaran') ?>" class="form-control btn btn-secondary"><label>Tutup</label></a>
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
	</div>
	<!-- /.container-fluid -->
</section>

<script type="text/javascript">
	var id = "<?php echo $id; ?>";


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

	function to_kab(idElmt, a, set = '') {
		b = a.value;
		if (b === undefined) {
			b = a
		}
		combo(idElmt, 'ms_kab_kota~nama_kab_kota~kode', 'kode_provinsi', b, set)
	}

	function combo(divname, table = '', colum = '1', id = '1', set = '') {
		url3 = "<?php echo base_url(); ?>realisasi_anggaran/tampildata/" + table + "/" + colum + "/" + id + "/combobox";

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
		urls = "<?php echo base_url(); ?>realisasi_anggaran/tampildata/" + table + "/" + colum + "/" + id;
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
		var dt = tampil_data('v_realisasi_anggaran', 'id', id);
		combo('kode_provinsi', 'ms_provinsi~nama_provinsi~kode', '1', '1', dt[0].kode_provinsi)
		combo("kode_kab_kota", 'ms_kab_kota~nama_kab_kota~kode', 'kode_provinsi', dt[0].kode_provinsi, dt[0].kode_kab_kota)
		$("#tahun_anggaran").val(dt[0].tahun_anggaran)
		$("#kode_provinsi").val(dt[0].kode_provinsi)
		$("#kode_kab_kota").val(dt[0].kode_kab_kota)
		$("#target_kk").val(dt[0].target_kk)
		$("#anggaran_penlok").val(dt[0].anggaran_penlok)
		$("#anggaran_penyuluhan").val(dt[0].anggaran_penyuluhan)
		$("#anggaran_pemsos").val(dt[0].anggaran_pemsos)
		$("#anggaran_pemberdayaan").val(dt[0].anggaran_pemberdayaan)
		$("#anggaran_penyusunan_data").val(dt[0].anggaran_penyusunan_data)
		$("#realisasi_penlok").val(dt[0].realisasi_penlok)
		$("#realisasi_penyuluhan").val(dt[0].realisasi_penyuluhan)
		$("#realisasi_pemsos").val(dt[0].realisasi_pemsos)
		$("#realisasi_pemberdayaan").val(dt[0].realisasi_pemberdayaan)
		$("#realisasi_penyusunan_data").val(dt[0].realisasi_penyusunan_data)
		$("#sisa_anggaran_penlok").val(dt[0].sisa_anggaran_penlok)
		$("#sisa_anggaran_penyuluhan").val(dt[0].sisa_anggaran_penyuluhan)
		$("#sisa_anggaran_pemsos").val(dt[0].sisa_anggaran_pemsos)
		$("#sisa_anggaran_pemberdayaan").val(dt[0].sisa_anggaran_pemberdayaan)
		$("#sisa_anggaran_penyusunan_data").val(dt[0].sisa_anggaran_penyusunan_data)
		$("#persentase_penlok").val(dt[0].persentase_penlok)
		$("#persentase_penyuluhan").val(dt[0].persentase_penyuluhan)
		$("#persentase_pemsos").val(dt[0].persentase_pemsos)
		$("#persentase_pemberdayaan").val(dt[0].persentase_pemberdayaan)
		$("#persentase_penyusunan_data").val(dt[0].persentase_penyusunan_data)




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
			var post_url = '<?php echo base_url("realisasi_anggaran/update") ?>'; //get form action url
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
					window.location.replace('<?= base_url("realisasi_anggaran") ?>');
					// $('#table-front').DataTable().ajax.reload();
				} else {
					toastr.error(response.message);
				}
			});


		});


	})



	function nikChange(nik) {
		event.preventDefault(); //prevent default action 
		$.get("<?php echo base_url("realisasi_anggaran/detailNik/") ?>" + nik, function(data) {
			data = JSON.parse(data)
			console.log(data.luas)
			$('#keanggotaan').val(data.keanggotaan)
			$('#realisasi_anggaran').val(data.realisasi_anggaran)
			$('#nama_kelompok').val(data.kelompok)
			$('#luas_tanah').val(data.luas)
		});
	}
</script>