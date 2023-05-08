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

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="nik">No Induk Koperasi</label>
									<input name="nik"  id="nik" type="text" value="" class="numbers form-control clear">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="no_badan_hukum">No Badan Hukum</label>
									<input name="no_badan_hukum"  id="no_badan_hukum" type="text" value="" class="form-control clear">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="sertifikat">Sertifikat</label>
									<input name="sertifikat"  id="sertifikat" type="text" value="" class="form-control clear">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="nama_koperasi">Nama Koperasi</label>
									<input name="nama_koperasi"  id="nama_koperasi" type="text" value="" class="form-control clear"></input>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="provinsi">Provinsi</label>
									<select class="form-control select2" onchange="provChange($(this).val())" name="provinsi" id="provinsi">
											<?php if(count($provinsi) >= 2):?>
												<option value="">-- Pilih Provinsi --</option>
											<?php endif ?>
											<?php foreach ($provinsi as $key => $value): ?>
												<option value="<?=$value->kode?>"><?=$value->nama_provinsi?></option>
											<?php endforeach ?>

									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="kabupaten">Kabupaten</label>
									<select class="form-control select2" name="kabupaten" id="kabupaten">
											<?php foreach ($kab_kota as $key => $value): ?>
												<option value="<?=$value->kode?>"><?=$value->nama_kab_kota?></option>
											<?php endforeach ?>

									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="alamat">Alamat</label>
									<textarea name="alamat"  id="alamat" type="text" value="" class="form-control clear"></textarea>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="deskripsi">Deskripsi</label>
									<textarea name="deskripsi"  id="deskripsi" type="text" value="" class="form-control clear"></textarea>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="jenis_koperasi">Jenis Koperasi</label>
									<select class="form-control select2" name="jenis_koperasi" id="jenis_koperasi">
										<option value="Produsen">Produsen </option>
										<option value="Koperasi Simpan Pinjam Berjangka">Koperasi Simpan Pinjam Berjangka</option> 
										<option value="Badan Usaha Pembiayaan">Badan Usaha Pembiayaan</option> 
										<option value="Lainnya">Lainnya</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="tanggal_badan_hukum">Tanggal Berdirinya Badan Hukum</label>
									<input type="date" name="tanggal_badan_hukum" id="tanggal_badan_hukum" class="form-control" value="<?=date('Y-m-d')?>">
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
    	 $('.lampiran').on('change', function(){
    	// var fuUpload = document.getElementById("lampiran1");
    		if(this.files[0].type != 'application/pdf'){
    			toastr.error('Tipe File Salah atau File Rusak!')
    			$(this).val('')
    		}
    	});

    	$('.select2').select2()
    	$('#titleId').html('<?=$title?>')

		
		$("#postForm").submit(function(event){
	        event.preventDefault(); //prevent default action 
	        var post_url = '<?php echo base_url("master_koperasi/create") ?>'; //get form action url
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


    function provChange(kode) {
	    event.preventDefault(); //prevent default action 
		$.get( "<?php echo base_url("master_koperasi/getKab/") ?>"+kode, function( data ) {
			data = JSON.parse(data)
			$('#kabupaten').html(data)
		});
    }

	
</script>

   