<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title id="titleId">PTM</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

	<!-- Select2 -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">

	<!-- toast -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

	<!-- jQuery -->
	<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>

	<!-- Include  DateTimePicker CDN -->
	<link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	<!-- leafletjs -->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />

	<style type="text/css">
		.table{
			width: 100% !important;
		}
	</style>
</head>

<body class="hold-transition sidebar-mini">
<?php
$role = $this->session->userdata('login')['role_user'];
?>	
	<div class="wrapper">
		<!-- Navbar -->
		<nav class="main-header navbar navbar-expand navbar-white navbar-light">
			<!-- Left navbar links -->
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
				</li>
				<li class="nav-item" style="float:right">
				</li>
			

			</ul>
			<ul class="navbar-nav ml-auto">
				<li class="nav-item">

						<a class="btn btn-dark btn-sm" href="<?=base_url('login/logout')?>" >Logout</a>
				</li>
			</ul>

			<!-- Right navbar links -->



		</nav>
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="<?= base_url() ?>" class="brand-link" style="background-color: white">
				<img src="<?= base_url() ?>assets/img/logo_bpn.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light" style="color: black;font-weight: bold">PTM BPN</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user (optional) -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
						<img src="<?= base_url() ?>assets/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
						<a href="#" class="d-block">Administrator</a>
						<a href="#" data-toggle="modal" data-target="#modal-logout"><i class="fa fa-circle text-success"></i> Online</a><br>
						<!-- <span onclick="logout()">Logout</span> -->
					</div>
				</div>


				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<!-- Add icons to the links using the .nav-icon class
					 with font-awesome or any other icon font library -->


						<!--  <li class="nav-item">
						<a href="<?= base_url('pengembangan') ?>" class='nav-link '>
							<i class="nav-icon fas fa-book"></i>
							<p>
								Pengembangan Rencana Usaha
							</p>
						</a>
					</li>

					 <li class="nav-item">
						<a href="<?= base_url('fasilitasi_akses') ?>" class='nav-link '>
							<i class="nav-icon fas fa-book"></i>
							<p>
								Fasilitasi Akses Pemasaran
							</p>
						</a>
					</li>

					 <li class="nav-item">
						<a href="<?= base_url('fasilitasi_infrastruktur') ?>" class='nav-link '>
							<i class="nav-icon fas fa-book"></i>
							<p>
								Fasilitasi Infrastruktur Pendukung
							</p>
						</a>
					</li>
					 <li class="nav-item">
						<a href="<?= base_url('diseminasi') ?>" class='nav-link '>
							<i class="nav-icon fas fa-book"></i>
							<p>
								Diseminasi Model Akses Reforma Agraria
							</p>
						</a>
					</li>


					 <li class="nav-item">
						<a href="<?= base_url('master_skala_usaha') ?>" class='nav-link '>
							<i class="nav-icon fas fa-book"></i>
							<p>
								Master Skala Usaha
							</p>
						</a>
					</li>
					
					 <li class="nav-item">
						<a href="<?= base_url('master_skala_peternakan') ?>" class='nav-link '>
							<i class="nav-icon fas fa-book"></i>
							<p>
								Master Peternakan
							</p>
						</a>
					</li>
					 <li class="nav-item">
						<a href="<?= base_url('master_skala_perikanan') ?>" class='nav-link '>
							<i class="nav-icon fas fa-book"></i>
							<p>
								Master Perikanan
							</p>
						</a>
					</li> -->


						<?php if ($role != 7): ?>

						<li class="nav-item">
							<a href="http://194.233.71.171/ptm-web/dashboard" class='nav-link '>
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>
									Dashboard
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href='<?= base_url('dashboard') ?>' class="nav-link">
										<i class='nav-icon fa-circle far'></i>
										<p>Dashboard Rekapitulasi</p>
									</a>
								</li>
								<li class="nav-item">
									<a href='<?= base_url('dashboard_realisasi') ?>' class="nav-link">
										<i class='nav-icon fa-circle far'></i>
										<p>Dashboard Realisasi</p>
									</a>
								</li>
								<li class="nav-item">
									<a href='<?= base_url('dashboard_field_staff') ?>' class="nav-link">
										<i class='nav-icon fa-circle far'></i>
										<p>Dashboard Fieldstaff</p>
									</a>
								</li>
								<li class="nav-item">
									<a href='<?= base_url('prestasi_kinerja') ?>' class="nav-link">
										<i class='nav-icon fa-circle far'></i>
										<p>Index Prestasi Kinerja</p>
									</a>
								</li>
							</ul>
						</li>
						<li class='nav-item '>
							<a href="#" class='nav-link '>
								<i class="nav-icon fas fa-copy"></i>
								<p>
									Master Data
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class='nav-item '>
									<a href="#" class='nav-link  menu-open'>
										<i class="far fa-circle nav-icon"></i>
										<p>
											Admin Pusat
											<i class="right fas fa-angle-left"></i>
										</p>
									</a>
									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href='<?= base_url('sektor_usaha') ?>' class="nav-link">
												<i class='nav-icon fa-circle far'></i>
												<p>Sektor Usaha</p>
											</a>
										</li>
										<li class="nav-item">
											<a href='<?= base_url('sub_sektor_usaha') ?>' class="nav-link">
												<i class='nav-icon fa-circle far'></i>
												<p>Sub Sektor Usaha</p>
											</a>
										</li>
										<li class="nav-item">
											<a href='<?= base_url('jenis_sektor_usaha') ?>' class="nav-link">
												<i class='nav-icon fa-circle far'></i>
												<p>Jenis Sektor Usaha</p>
											</a>
										</li>
										<li class="nav-item">
											<a href='<?= base_url('model_pemberdayaan') ?>' class="nav-link">
												<i class='nav-icon fa-circle far'></i>
												<p>Model Pemberdayaan</p>
											</a>
										</li>
										<li class="nav-item">
											<a href='<?= base_url('jenis_pendampingan') ?>' class="nav-link">
												<i class='nav-icon fa-circle far'></i>
												<p>Jenis Pendampingan</p>
											</a>
										</li>
										<li class="nav-item">
											<a href='<?= base_url('group_instansi_swasta') ?>' class="nav-link">
												<i class='nav-icon fa-circle far'></i>
												<p>Grup Instansi / Swasta</p>
											</a>
										</li>
										<li class="nav-item">
											<a href='<?= base_url('kantor_pertanahan') ?>' class="nav-link">
												<i class='nav-icon fa-circle far'></i>
												<p>Kantor Pertanahan</p>
											</a>
										</li>
										<li class="nav-item">
											<a href='kamus_kbli' class="nav-link">
												<i class='nav-icon fa-circle far'></i>
												<p>Klasifikasi KBLI</p>
											</a>
										</li>

									</ul>
								</li>
								<li class='nav-item  '>
									<a href="#" class='nav-link  '>
										<i class="far fa-circle nav-icon"></i>
										<p>
											Admin Daerah
											<i class="right fas fa-angle-left"></i>
										</p>
									</a>
									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href='<?= base_url('realisasi_anggaran') ?>' class="nav-link">
												<i class='nav-icon fa-circle far'></i>
												<p>Realisasi Anggaran</p>
											</a>
										</li>
										<li class="nav-item">
											<a href='<?= base_url('detail_instansi_swasta') ?>' class="nav-link">
												<i class='nav-icon fa-circle far'></i>
												<p>Detail Instansi / Swasta</p>
											</a>
										</li>

										<li class="nav-item">
											<a href='<?= base_url('data_field_staff') ?>' class="nav-link">
												<i class='nav-icon fa-circle far'></i>
												<p>Data Field Staff</p>
											</a>
										</li>
										<li class="nav-item">
											<a href='<?= base_url('klasifikasi_sektor_usaha') ?>' class="nav-link">
												<i class='nav-icon fa-circle far'></i>
												<p>Klasifikasi Sektor Usaha</p>
											</a>
										</li>
									</ul>
								</li>

							</ul>
						</li> 
						<li class='nav-item '>
							<a href="#" class='nav-link '>
								<i class="nav-icon fas fa-copy"></i>
								<p>
									Master Data
									<i class="fas fa-angle-left right"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<?php if ($role != 5): ?>

								<li class='nav-item '>
									<a href="#" class='nav-link  menu-open'>
										<i class="far fa-circle nav-icon"></i>
										<p>
											Admin Pusat
											<i class="right fas fa-angle-left"></i>
										</p>
									</a>
									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href='<?= base_url('sektor_usaha') ?>' class="nav-link">
												<i class='nav-icon fa-circle far'></i>
												<p>Sektor Usaha</p>
											</a>
										</li>
										<li class="nav-item">
											<a href='<?= base_url('sub_sektor_usaha') ?>' class="nav-link">
												<i class='nav-icon fa-circle far'></i>
												<p>Sub Sektor Usaha</p>
											</a>
										</li>
										<li class="nav-item">
											<a href='<?= base_url('jenis_sektor_usaha') ?>' class="nav-link">
												<i class='nav-icon fa-circle far'></i>
												<p>Jenis Sektor Usaha</p>
											</a>
										</li>
										<li class="nav-item">
											<a href='<?= base_url('model_pemberdayaan') ?>' class="nav-link">
												<i class='nav-icon fa-circle far'></i>
												<p>Model Pemberdayaan</p>
											</a>
										</li>
										<li class="nav-item">
											<a href='<?= base_url('jenis_pendampingan') ?>' class="nav-link">
												<i class='nav-icon fa-circle far'></i>
												<p>Jenis Pendampingan</p>
											</a>
										</li>
										<li class="nav-item">
											<a href='<?= base_url('group_instansi_swasta') ?>' class="nav-link">
												<i class='nav-icon fa-circle far'></i>
												<p>Grup Instansi / Swasta</p>
											</a>
										</li>
										<li class="nav-item">
											<a href='<?= base_url('kantor_pertanahan') ?>' class="nav-link">
												<i class='nav-icon fa-circle far'></i>
												<p>Kantor Pertanahan</p>
											</a>
										</li>
										<li class="nav-item">
											<a href='<?= base_url('kamus_kbli') ?>' class="nav-link">
												<i class='nav-icon fa-circle far'></i>
												<p>Klasifikasi KBLI</p>
											</a>
										</li>
										
									</ul>
								</li>
								<?php endif ?>
								
								<li class='nav-item  '>
									<a href="#" class='nav-link  '>
										<i class="far fa-circle nav-icon"></i>
										<p>
											Admin Daerah
											<i class="right fas fa-angle-left"></i>
										</p>
									</a>
									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href='<?= base_url('detail_instansi_swasta') ?>' class="nav-link">
												<i class='nav-icon fa-circle far'></i>
												<p>Detail Instansi / Swasta</p>
											</a>
										</li>
										<li class="nav-item">
											<a href='<?= base_url('data_field_staff') ?>' class="nav-link">
												<i class='nav-icon fa-circle far'></i>
												<p>Data Field Staff</p>
											</a>
										</li>
										<li class="nav-item">
											<a href='<?= base_url('klasifikasi_sektor_usaha') ?>' class="nav-link">
												<i class='nav-icon fa-circle far'></i>
												<p>Klasifikasi Sektor Usaha</p>
											</a>
										</li>
										<li class="nav-item">
											<a href='<?= base_url('realisasi_anggaran') ?>' class="nav-link">
												<i class='nav-icon fa-circle far'></i>
												<p>Anggaran Tahun Pertama</p>
											</a>
										</li>
										<li class="nav-item">
											<a href='<?= base_url('realisasi_anggaran_kedua') ?>' class="nav-link">
												<i class='nav-icon fa-circle far'></i>
												<p>Anggaran Tahun Kedua</p>
											</a>
										</li>
										<li class="nav-item">
											<a href='<?= base_url('realisasi_anggaran_ketiga') ?>' class="nav-link">
												<i class='nav-icon fa-circle far'></i>
												<p>Anggaran Tahun Ketiga</p>
											</a>
										</li>
									</ul>
								</li>

							</ul>
						</li>
					<?php endif?>

						<li class="nav-item">
							<a href="<?= base_url() ?>subjectobject" class='nav-link '>
								<i class="nav-icon fas fa-book"></i>
								<p>Entry Subject Object</p>
							</a>
						</li>

					<?php if ($role != 7): ?>

						<li class="nav-item">
							<a href="http://194.233.71.171/ptm-web/mou_pks" class='nav-link '>
								<i class="nav-icon fas fa-book"></i>
								<p>MoU dan PKS</p>
							</a>
						</li>
						<li class='nav-item '>
							<a href="#" class='nav-link '>
								<i class="nav-icon fas fa-book"></i>
								<p>
									CPCL
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href='http://194.233.71.171/ptm-web/cpcl/entri' class="nav-link">
										<i class='nav-icon fa-circle far'></i>
										<p>Entri Data CPCL</p>
									</a>
								</li>
								<li class="nav-item">
									<a href='http://194.233.71.171/ptm-web/cpcl/progress' class="nav-link">
										<i class='nav-icon fa-circle far'></i>
										<p>Progress CPCL</p>
									</a>
								</li>
							</ul>
						</li>
						<li class='nav-item '>
							<a href="#" class='nav-link '>
								<i class="nav-icon fas fa-book"></i>
								<p>
									Forum Diskusi
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href='http://194.233.71.171/ptm-web/question_answer' class="nav-link">
										<i class='nav-icon fa-circle far'></i>
										<p>Forum Tanya Jawab</p>
									</a>
								</li>
							</ul>
						</li>

						<li class="nav-item '">
							<a href="http://194.233.71.171/ptm-web/peta" class='nav-link '>
								<i class="nav-icon fas fa-map"></i>
								<p>
									Peta Spasial
								</p>
							</a>
						</li>
						<li class='nav-item '>
							<a href="#" class='nav-link '>
								<i class="nav-icon fas fa-chart-bar"></i>
								<p>
									Laporan
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href='http://194.233.71.171/ptm-web/report/penghasilan' class="nav-link">
										<i class='nav-icon fa-circle far'></i>
										<p>Distribusi Penghasilan</p>
									</a>
								</li>
								<li class="nav-item">
									<a href='http://194.233.71.171/ptm-web/report/baku' class="nav-link">
										<i class='nav-icon fa-circle far'></i>
										<p>Baku</p>
									</a>
								</li>
								<li class="nav-item">
									<a href='http://194.233.71.171/ptm-web/report/kuesioner' class="nav-link">
										<i class='nav-icon fa-circle far'></i>
										<p>Pemetaan Sosial</p>
									</a>
								</li>
								<li class="nav-item">
									<a href='http://194.233.71.171/ptm-web/report/kuesioner' class="nav-link">
										<i class='nav-icon fa-circle far'></i>
										<p>Realisasi Fisik</p>
									</a>
								</li>
							</ul>
						</li>
						<?php if ($role != 5): ?>

						<li class='nav-item '>
							<a href="#" class='nav-link '>
								<i class="nav-icon fas fa-book"></i>
								<p>
									Manajemen File
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href='<?= base_url('lintor_kementan') ?>' class="nav-link">
										<i class='nav-icon fa-circle far'></i>
										<p>Lintor Kementan</p>
									</a>
								</li>
								<li class="nav-item">
									<a href='<?= base_url('lintor_kkp') ?>' class="nav-link">
										<i class='nav-icon fa-circle far'></i>
										<p>Lintor KKP</p>
									</a>
								</li>
								<li class="nav-item">
									<a href='<?= base_url('lintor_umkm') ?>' class="nav-link">
										<i class='nav-icon fa-circle far'></i>
										<p>Lintor Kemenkp/UMKM</p>
									</a>
								</li>
								<li class="nav-item">
									<a href='http://194.233.71.171/ptm-web/managemen_file/lintor_keminvest_bkpm' class="nav-link">
										<i class='nav-icon fa-circle far'></i>
										<p>Lintor Keminvest/BKPM</p>
									</a>
								</li>
								<li class="nav-item">
									<a href='http://194.233.71.171/ptm-web/managemen_file/lintor_kemensos' class="nav-link">
										<i class='nav-icon fa-circle far'></i>
										<p>Lintor Kemensos</p>
									</a>
								</li>
							</ul>
						</li>
						<li class='nav-item  mt-3'>
							<a href="#" class='nav-link '>
								<i class="nav-icon fas fa-desktop text-red"></i>
								<p>
									Admin
									<i class="right fas fa-angle-left"></i>
								</p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>
											User
											<i class="right fas fa-angle-left"></i>
										</p>
									</a>
									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href='<?= base_url('user_baru') ?>' class="nav-link">
												<i class='nav-icon fa-circle far'></i>
												<p>User Baru</p>
											</a>
										</li>
										<li class="nav-item">
											<a href='http://194.233.71.171/ptm-web/user_request' class="nav-link">
												<i class='nav-icon fa-circle far'></i>
												<p>User Request</p>
											</a>
										</li>
									</ul>
								</li>
								<li class="nav-item">
									<a href="#" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>
											Grup Menu
											<i class="right fas fa-angle-left"></i>
										</p>
									</a>
									<ul class="nav nav-treeview">
										<li class="nav-item">
											<a href='http://194.233.71.171/ptm-web/menu' class="nav-link">
												<i class='nav-icon fa-circle far'></i>
												<p>Menu</p>
											</a>
										</li>
										<li class="nav-item">
											<a href='http://194.233.71.171/ptm-web/akses_menu' class="nav-link">
												<i class='nav-icon fa-circle far'></i>
												<p>Hak Akses</p>
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a href='http://194.233.71.171/ptm-web/admin/log' class="nav-link">
								<i class='nav-icon fa-circle far'></i>
								<p>Logs</p>
							</a>
						</li>

						<?php endif?>


					<?php endif?>

					</ul>
				</nav>
				<!-- /.sidebar-menu -->
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->

			<?= $body ?>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->
		<!-- Content Wrapper. Contains page content -->
		<footer class="main-footer">
			<div class="float-right d-none d-sm-block">
				<!-- <b>Version</b> 3.2.0 -->
			</div>
			<strong>Copyright © Kementerian Agraria dan Tata Ruang/ Badan Pertanahan Nasional All rights reserved
		</footer>

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->

	<!-- Bootstrap 4 -->
	<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="<?= base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>
	<!-- Bootstrap4 Duallistbox -->
	<script src="<?= base_url() ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
	<!-- DataTables  & Plugins -->
	<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/jszip/jszip.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
	<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<!-- <script src="<?= base_url() ?>assets/dist/js/demo.js"></script> -->

	<script src="http://194.233.71.171/ptm-web/lib/adminlte/plugins/chart.js/Chart.min.js"></script>
	<!-- Make sure you put this AFTER Leaflet's CSS -->
	<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
	<!-- Include daettime picker.js CDN -->

	<script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
	<!-- Page specific script -->
	<script>
		$(function() {
			$("#example1").DataTable({
				"responsive": true,
				"lengthChange": false,
				"autoWidth": false,
				"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
			}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
				"responsive": true,
			});

			$('.numbers').keypress(function(event) {

				if (event.which != 8 && isNaN(String.fromCharCode(event.which))) {
					event.preventDefault(); //stop character from entering input
				}

			});
		});

		function logout() {
			
		}
	</script>
</body>

</html>