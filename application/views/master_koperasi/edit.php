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
									<label for="nik">No Induk Koperasi</label>
									<input name="nik"  id="nik" type="text" value="<?=$data['nik']?>" class="numbers form-control clear">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="no_badan_hukum">No Badan Hukum</label>
									<input name="no_badan_hukum"  id="no_badan_hukum" type="text" value="<?=$data['no_badan_hukum']?>" class="form-control clear">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="sertifikat">Sertifikat</label>
									<input name="sertifikat"  id="sertifikat" type="text" value="<?=$data['sertifikat']?>"  class="form-control clear">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="nama_koperasi">Nama Koperasi</label>
									<input name="nama_koperasi"  id="nama_koperasi" type="text" value="<?=$data['nama_koperasi']?>" class="form-control clear"></input>
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="provinsi">Provinsi</label>
									<select class="form-control select2" name="provinsi" id="provinsi">
											<?php foreach ($provinsi as $key => $value): ?>
												<?php if ($data['nama_koperasi'] == $value->kode): ?>
													
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
									<label for="alamat_koperasi">Alamat</label>
									<textarea name="alamat_koperasi"  id="alamat_koperasi" type="text" value="" class="form-control clear"><?=$data['alamat_koperasi']?></textarea>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="deskripsi">Deskripsi</label>
									<textarea name="deskripsi"  id="deskripsi" type="text" value="" class="form-control clear"><?=$data['deskripsi']?></textarea>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="jenis_koperasi">Jenis Koperasi</label>
									<select class="form-control select2" name="jenis_koperasi" id="jenis_koperasi">
										<option <?php if ($data['jenis_koperasi'] == 'Produsen') {'selected';}?> value="Produsen">Produsen </option>
										<option <?php if ($data['jenis_koperasi'] == 'Koperasi Simpan Pinjam Berjangka') {'selected';}?> value="Koperasi Simpan Pinjam Berjangka">Koperasi Simpan Pinjam Berjangka</option> 
										<option <?php if ($data['jenis_koperasi'] == 'Badan Usaha Pembiayaan') {'selected';}?> value="Badan Usaha Pembiayaan">Badan Usaha Pembiayaan</option> 
										<option <?php if ($data['jenis_koperasi'] == 'Lainnya') {'selected';}?> value="Lainnya">Lainnya</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="tanggal_badan_hukum">Tanggal Berdirinya Badan Hukum</label>
									<input type="date" name="tanggal_badan_hukum" id="tanggal_badan_hukum" class="form-control" value="<?=$data['tanggal_badan_hukum']?>">
								</div>
							</div>
						</div>

						
						
						

						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col">
										<div class="form-group">
											<a href="<?=base_url('master_koperasi')?>" class="form-control btn btn-secondary"><label >Tutup</label></a>
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


		$("#postForm").submit(function(event){
	        event.preventDefault(); //prevent default action 
	        var post_url = '<?php echo base_url("master_koperasi/update") ?>'; //get form action url
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
	        		window.location.replace('<?=base_url('master_koperasi')?>')
	        		// $('#table-front').DataTable().ajax.reload();
	        	}else{
	        		toastr.error(response.message);
	        	} 
	        });

	        
	    });


    })


	
</script>

   