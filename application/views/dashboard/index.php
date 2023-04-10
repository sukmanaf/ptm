<!-- Main content -->
<section class="content container-fluid">

	<div class="content-header">
		<div class="container-fluid">
			<h1>Dashboard</h1>
		</div>
	</div>

	<div class="content">
		<div class="container-fluid">

			<div class="card card-outline card-primary">
				<div class="card-body">
					<div class="row">
						<div class="col-md-2">
							<div class="form-group">
								<label>Tahun</label>
								<select id="tahun" class="form-control select2 custom-select w-100" onchange="to_kab()">
									<option value='2020'>2020</option>
									<option value='2021'>2021</option>
									<option value='2022'>2022</option>
									<option value='2023' selected>2023</option>
									<option value='2024'>2024</option>
									<option value='2025'>2025</option>
								</select>
							</div>
						</div>
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
			</div>

			<div class="row">
				<div class="col-md-6">
					<!-- BAR CHART -->
					<div class="card card-dark">
						<div class="card-header">
							<h3 class="card-title">Subjek Akses Reforma Agraria</h3>
							<div class="float-right">
								<i>Total:&nbsp;<span id="total_agraria">0</span></i>
							</div>
						</div>
						<div class="card-body">
							<div class="chart">
								<canvas id="agraria" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<div class="col-md-6">
					<!-- BAR CHART -->
					<div class="card card-dark">
						<div class="card-header">
							<h3 class="card-title">Kelompok Usaha</h3>
							<div class="float-right">
								<i>Total:&nbsp;<span id="total_kelompok_usaha">12345</span></i>
							</div>
						</div>
						<div class="card-body">
							<div class="chart">
								<canvas id="" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<!-- BAR CHART -->
					<div class="card card-dark">
						<div class="card-header">
							<h3 class="card-title">Koperasi</h3>
							<div class="float-right">
								<i>Total:&nbsp;<span id="total_koperasi">0</span></i>
							</div>
						</div>
						<div class="card-body">
							<div class="chart">
								<canvas id="koperasi" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<div class="col-md-6">
					<!-- BAR CHART -->
					<div class="card card-dark">
						<div class="card-header">
							<h3 class="card-title">Sektor Usaha</h3>
							<div class="float-right">
								<i>Total:&nbsp;<span id="total_sektor_usaha">0</span></i>
							</div>
						</div>
						<div class="card-body">
							<div id="chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;">
								<canvas id="sektor_usaha" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<!-- BAR CHART -->
					<div class="card card-dark">
						<div class="card-header">
							<h3 class="card-title">Penghasilan</h3>
							<div class="float-right">
								<i>Total:&nbsp;<span id="total_penghasilan">0</span></i>
							</div>
						</div>
						<div class="card-body">
							<div class="chart">
								<canvas id="penghasilan" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<div class="col-md-6">
					<!-- BAR CHART -->
					<div class="card card-dark">
						<div class="card-header">
							<h3 class="card-title">Pengeluaran</h3>
							<div class="float-right">
								<i>Total:&nbsp;<span id="total_pengeluaran">0</span></i>
							</div>
						</div>
						<div class="card-body">
							<div class="chart">
								<canvas id="pengeluaran" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<!-- BAR CHART -->
					<div class="card card-dark">
						<div class="card-header">
							<h3 class="card-title">Jenjang Pendidikan</h3>
							<div class="float-right">
								<i>Total:&nbsp;<span id="total_jenjang_pendidikan">0</span></i>
							</div>
						</div>
						<div class="card-body">
							<div class="chart">
								<canvas id="jenjang_pendidikan" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<div class="col-md-6">
					<!-- BAR CHART -->
					<div class="card card-dark">
						<div class="card-header">
							<h3 class="card-title">Pemetaan Sosial</h3>
							<div class="float-right">
								<i>Total:&nbsp;<span id="total_pemetaan_sosial">0</span></i>
							</div>
						</div>
						<div class="card-body">
							<div class="chart">
								<canvas id="pemetaan_sosial" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
			</div>


			<div class="row">


			</div>
			<div class="card card-warning">
				<div class="card-header">
					<h3 class="card-title">Kategori Asal Tanah</h3>
					<div class="custom-control custom-switch float-right">
						<input type="checkbox" class="custom-control-input" id="filterTahun">
						<label class="custom-control-label" for="filterTahun">Filter Tahun</label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">

					<!-- PIE CHART -->
					<div class="card card-dark">
						<div class="card-header">
							<h3 class="card-title">Seluruhnya</h3>
						</div>
						<div class="card-body">
							<div class="chart">
								<canvas id="pie1" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<div class="col-md-6">
					<!-- PIE CHART -->
					<div class="card card-dark">
						<div class="card-header">
							<h3 class="card-title">Redistribusi Tanah</h3>
						</div>
						<div class="card-body">
							<div class="chart">
								<canvas id="pie2" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<!-- PIE CHART -->
					<div class="card card-dark">
						<div class="card-header">
							<h3 class="card-title">PTSL</h3>
						</div>
						<div class="card-body">
							<div class="chart">
								<canvas id="pie3" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<div class="col-md-6">
					<!-- PIE CHART -->
					<div class="card card-dark">
						<div class="card-header">
							<h3 class="card-title">Lintas Sektor</h3>
						</div>
						<div class="card-body">
							<div class="chart">
								<canvas id="pie4" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<!-- PIE CHART -->
					<div class="card card-dark">
						<div class="card-header">
							<h3 class="card-title">Sertipikat Lainnya</h3>
						</div>
						<div class="card-body">
							<div class="chart">
								<canvas id="pie5" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<div class="col-md-6">
					<!-- PIE CHART -->
					<div class="card card-dark">
						<div class="card-header">
							<h3 class="card-title">Distribusi Manfaat</h3>
						</div>
						<div class="card-body">
							<div class="chart">
								<canvas id="pie6" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<!-- PIE CHART -->
					<div class="card card-dark">
						<div class="card-header">
							<h3 class="card-title">Konsolidasi Tanah (LC)</h3>
						</div>
						<div class="card-body">
							<div class="chart">
								<canvas id="pie7" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
				<div class="col-md-6">
					<!-- PIE CHART -->
					<div class="card card-dark">
						<div class="card-header">
							<h3 class="card-title">Tanah Negara Garapan</h3>
						</div>
						<div class="card-body">
							<div class="chart">
								<canvas id="pie8" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
			</div>

			<div class="row">
				<div class="col-md-6">
					<!-- PIE CHART -->
					<div class="card card-dark">
						<div class="card-header">
							<h3 class="card-title">Tanah Belum Terdaftar</h3>
						</div>
						<div class="card-body">
							<div class="chart">
								<canvas id="pie9" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
							</div>
						</div>
						<!-- /.card-body -->
					</div>
					<!-- /.card -->
				</div>
			</div>

			<!-- <partial name="_tablenavbar" /> -->

		</div>
	</div>

	<main role="main" class="col pb-3">
	</main>
	</div>

</section>

<script src="http://194.233.71.171/ptm-web/lib/adminlte/plugins/chart.js/Chart.min.js"></script>