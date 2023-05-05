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
				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label>Provinsi</label>
							<select id="provinsi" class="form-control select2 custom-select w-100" onchange="to_kab('kab_kota',this)">

							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Kab Kota</label>
							<select id="kab_kota" class="form-control select2 custom-select w-100" onchange="to_kab('kecamatan',this)">

							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Kecamatan</label>
							<select id="kecamatan" class="form-control select2 custom-select w-100" onchange="to_kab('desa',this)">

							</select>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Desa</label>
							<select id="desa" class="form-control select2 custom-select w-100">

							</select>
						</div>
					</div>
				</div>
			</div>

			<div style="padding: 20px">
			</div>
			<div class="card-body table-responsive">

				<div id="table-front_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
					<table id="table-front" class="table table-hover dataTable no-footer dtr-inline" aria-describedby="table-front_info" style="width: 100%;">
						<thead>
							<tr>
								<th>No</th>
								<th>NIK</th>
								<th>Nama</th>
								<th>Provinsi</th>
								<th>Kab/Kota</th>
								<th>Kecamatan</th>
								<th>Desa</th>
								<th>Alamat</th>
								<th>Nomor Shat</th>
								<th>Tahun Shat</th>
								<th>Asal Sertifikat</th>
								<th>Luas</th>
								<th>Tintang Lintang</th>
								<th>Titik Bujur</th>
								<th>Penggunaan Tanah</th>
								<th>Jenis Usaha</th>
								<th>Nama KUB</th>
								<th>Hambatan, Kendala dan Masalah</th>
								<th>Akses Yang Dibutuhkan</th>
								<th>Model Pemberdayaan</th>
								<th>Instansi Pendampin</th>
								<th>Jenis Pendampingan</th>
							</tr>
						</thead>
					</table>
				</div>
			</div>
		</div>
</section>

<script type="text/javascript">
	$(document).ready(function() {
		// loadDt();
		combo('provinsi', 'ms_provinsi~nama_provinsi~kode')

	});

	function to_kab(idElmt = '', a = '', set = '') {
		b = a.value;

		var tahun = $("#tahun").val()
		if (b === undefined) {
			b = a
		}
		if (idElmt == 'kab_kota') {
			$("#kecamatan").empty()
			$("#desa").empty()
			combo(idElmt, 'ms_kab_kota~nama_kab_kota~kode', 'kode_provinsi', b, set)
		} else if (idElmt == 'kecamatan') {
			$("#kecamatan").empty()
			$("#desa").empty()
			combo(idElmt, 'ms_kecamatan~nama_kecamatan~kode', 'kode_kab_kota', b, set)
		} else if (idElmt == 'desa') {
			$("#desa").empty()
			combo(idElmt, 'ms_desa_kelurahan~nama_desa_kelurahan~kode', 'kode_kecamatan', b, set)
		}
	}

	function combo(divname, table = '', colum = '1', id = '1', set = '') {
		url3 = "<?php echo base_url(); ?>user_baru/tampildata/" + table + "/" + colum + "/" + id + "/combobox";

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

	function loadDt() {
		$('#table-front').DataTable({
			ajax: {
				url: '<?php echo base_url(); ?>report_baku/get_all',
				data: function(d) {
					d.<?php echo $this->security->get_csrf_token_name(); ?> = "<?php echo $this->security->get_csrf_hash(); ?>"
				},
				dataSrc: ''
			}
		})
	}
</script>