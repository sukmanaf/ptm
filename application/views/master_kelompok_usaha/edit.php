<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-12">
        <h1><?=$title?></h1>
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
                		<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
                		<input type="hidden" name="id" value="<?=$data['id']?>">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="no_induk_kelompok">No Induk Kelompok</label>
									<input name="no_induk_kelompok"  id="no_induk_kelompok" type="text" value="<?=$data['no_induk_kelompok']?>" class="numbers form-control clear">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="nama_kelompok">Nama Kelompok</label>
									<input name="nama_kelompok"  id="nama_kelompok" type="text" value="<?=$data['nama_kelompok']?>" class="form-control clear">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="thn_berdiri">Tahun Berdiri</label>
									<select class="form-control select2" name="thn_berdiri" id="thn_berdiri">
											<?php
												$end = 1979;
												$start = date('Y'); 
												for ($i=$start; $i >= $end ; $i--) { 
													if($data['thn_berdiri'] == $i){

													echo '<option selected value="'.$i.'">'.$i.'</option>';
													}else{

													echo '<option value="'.$i.'">'.$i.'</option>';
													}
												}
											?>

									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="alamat">Alamat</label>
									<textarea name="alamat"  id="alamat" type="text" value="" class="form-control clear"><?=$data['alamat']?></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="provinsi">Provinsi</label>
									<select class="form-control select2" name="provinsi" id="provinsi">
											<?php foreach ($provinsi as $key => $value): ?>
												<?php if ($data['nama_kelompok'] == $value->kode): ?>
													
												<option selected value="<?=$value->kode?>"><?=$value->nama_provinsi?></option>
												<?php else: ?>
												<option value="<?=$value->kode?>"><?=$value->nama_provinsi?></option>
												<?php endif ?>
											<?php endforeach ?>

									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="kabupaten">Kabupaten/Kota</label>
									<select class="form-control select2" name="kabupaten" id="kabupaten">
											<?php foreach ($kab_kota as $key => $value): ?>
												<?php if ($data['kabupaten'] == $value->kode): ?>
												<option selected value="<?=$value->kode?>"><?=$value->nama_kab_kota?></option>
												<?php else: ?>
												<option value="<?=$value->kode?>"><?=$value->nama_kab_kota?></option>
												<?php endif ?>
											<?php endforeach ?>

									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="sektor_usaha">Sektor Usaha</label>
									<select class="form-control select2" name="sektor_usaha" id="sektor_usaha">
											<?php foreach ($sektor_usaha as $key => $value): ?>
												<?php if ($data['sektor_usaha'] == $value->kode_sektor_usaha): ?>
												<option selected value="<?=$value->kode_sektor_usaha?>"><?=$value->deskripsi?></option>
												<?php else: ?>
												<option value="<?=$value->kode_sektor_usaha?>"><?=$value->deskripsi?></option>
												<?php endif ?>
											<?php endforeach ?>

									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="kat_kel_usaha">Ketegori Kelompok Usaha</label>
									<select class="form-control select2" name="kat_kel_usaha" id="kat_kel_usaha">
										<option <?php if ($data['kat_kel_usaha'] == 'Belum Terbentuk') {'selected';}?> value="Belum Terbentuk">Belum Terbentuk </option>
										<option <?php if ($data['kat_kel_usaha'] == 'Terbentuk, Belum Terdaftar') {'selected';}?> value="Terbentuk, Belum Terdaftar">Terbentuk, Belum Terdaftar</option> 
										<option <?php if ($data['kat_kel_usaha'] == 'Terbentuk, Terdaftar dan Belum Berbadan Hukum') {'selected';}?> value="Terbentuk, Terdaftar dan Belum Berbadan Hukum">Terbentuk, Terdaftar dan Belum Berbadan Hukum</option> 
										<option <?php if ($data['kat_kel_usaha'] == 'Terbentuk, Terdaftar dan Berbadan Hukum') {'selected';}?> value="Terbentuk, Terdaftar dan Berbadan Hukum">Terbentuk, Terdaftar dan Berbadan Hukum</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="status">Status Kelompok Usaha</label>
									<select class="form-control select2" name="status" id="status">
											<option <?php if ($data['status'] == 'Aktif') {'selected';}?> value="Aktif">Aktif</option>
											<option <?php if ($data['status'] == 'Tidak Aktif') {'selected';}?> value="Tidak Aktif">Tidak Aktif</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="tgl_bentuk_kelompok">Tanggal Bentuk Kelompok</label>
									<input type="date" name="tgl_bentuk_kelompok" id="tgl_bentuk_kelompok" class="form-control" value="<?=$data['tgl_bentuk_kelompok']?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="no_sk">No SK</label>
									<input name="no_sk"  id="no_sk" type="text" value="<?=$data['no_sk']?>" class="form-control clear">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="file_Upload_sk">Upload SK</label>
									<input type="file" class="form-control" name="file_upload_sk">
								</div>
							</div>
							<div class="col-md-2">
								<div class="form-group">
									<label for="btn" style="color: white">Upload SK</label><br>
									<a target="_blank" href="<?=base_url().$data['file_upload_sk']?>" id="btn" name="btn" class="btn btn-secondary btn-sm">Lihat</a>
								</div>
							</div>
						</div>
						
						
						

						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col">
										<div class="form-group">
											<a href="<?=base_url('master_kelompok_usaha')?>" class="form-control btn btn-secondary"><label >Tutup</label></a>
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
    $(document).ready(function(){
    	

    	$('.select2').select2()
    	$('#titleId').html('<?=$title?>')

		$("#nama_kelompok").keyup(function( event ) {
			var namaKel = $("#nama_kelompok").val();
			if (namaKel == '') {
				$("#keanggotaan").val('');
				$("#keanggotaan").prop('readonly',true)
			}else{
				$("#keanggotaan").prop('readonly',false)
			}
		})

		$("#postForm").submit(function(event){
	        event.preventDefault(); //prevent default action 
	        var post_url = '<?php echo base_url("master_kelompok_usaha/update") ?>'; //get form action url
	        var request_method = $(this).attr("method"); //get form GET/POST method
	        var form_data = new FormData(this); //Encode form elements for submission
	        
	        
	        $.ajax({
	            url : post_url,
	            type: 'POST',
	            data : form_data,
	            processData:false,
	                     contentType:false,
	                     cache:false,
	                     async:false,
	        }).done(function(response){
	        	response = JSON.parse(response)
	        	if (response.sts == 'success') {
	        		toastr.success(response.message);
	        		// $('.clear').val("")
	        		window.location.replace('<?=base_url('master_kelompok_usaha')?>')
	        		// $('#table-front').DataTable().ajax.reload();
	        	}else{
	        		toastr.error(response.message);
	        	} 
	        });

	        
	    });


    })


	
</script>

   