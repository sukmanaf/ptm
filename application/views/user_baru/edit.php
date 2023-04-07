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
					<input type="hidden" name="id" value="<?= $id ?>">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for='role'>Role</label>
								<select name='role' id='role' class="form-control custom-select">

								</select>

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for='npk'>NPK / NIK</label>
								<input name='npk' id='npk' type='text' value='' class="form-control">

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for='username'>User Id</label>
								<input name='username' id='username' type='username' value='' class="form-control">

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for='fullname'>Nama Lengkap</label>
								<input name='fullname' id='fullname' type='fullname' value='' class="form-control">

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for='email'>Email</label>
								<input name='email' id='email' type='email' value='' class="form-control">

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for='telepon'>Telepon</label>
								<input name='telepon' id='telepon' type='telepon' value='' class="form-control">

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for='kode_provinsi'>Kode Provinsi</label>
								<select name='kode_provinsi' id='kode_provinsi' onchange="to_kab('kode_kab_kota',this)" class="form-control select2">
									<option value='0' selected='selected'>Semua</option>

								</select>

							</div>
						</div>

						<div class="col-md-6">
							<div class="form-group">
								<label for='kode_kab_kota'>Kode Kab Kota</label>
								<select name='kode_kab_kota' id='kode_kab_kota' class="form-control select2">
									<option value='0' selected='selected'>Semua</option>
								</select>

							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for='password'>Password</label>
								<input name='password' id='password' type='password' value='' class="form-control">

							</div>
						</div>
					</div>







					<div class="row">
						<div class="col-md-6">
							<div class="row">
								<div class="col">
									<div class="form-group">
										<a href="<?= base_url('user_baru') ?>" class="form-control btn btn-secondary"><label>Tutup</label></a>
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
		<!-- /.container-fluid -->
</section>