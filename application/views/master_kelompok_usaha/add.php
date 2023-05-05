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
									<label for="no_induk_kelompok">No Induk Kelompok</label>
									<input name="no_induk_kelompok"  id="no_induk_kelompok" type="text" value="" class="numbers form-control clear">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="nama_kelompok">Nama Kelompok</label>
									<input name="nama_kelompok"  id="nama_kelompok" type="text" value="" class="form-control clear">
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
													echo '<option>'.$i.'</option>';
												}
											?>

									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="alamat">Alamat</label>
									<textarea name="alamat"  id="alamat" type="text" value="" class="form-control clear"></textarea>
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
									<label for="kabupaten">Ketegori Kelompok Usaha</label>
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
									<label for="sektor_usaha">Sektor Usaha</label>
									<select class="form-control select2" name="sektor_usaha" id="sektor_usaha">
											<?php foreach ($sektor_usaha as $key => $value): ?>
												<option value="<?=$value->kode_sektor_usaha?>"><?=$value->deskripsi?></option>
											<?php endforeach ?>

									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="kat_kel_usaha">Ketegori Kelompok Usaha</label>
									<select class="form-control select2" name="kat_kel_usaha" id="kat_kel_usaha">
										<option value="Belum Terbentuk">Belum Terbentuk </option>
										<option value="Terbentuk, Belum Terdaftar">Terbentuk, Belum Terdaftar</option> 
										<option value="Terbentuk, Terdaftar dan Belum Berbadan Hukum">Terbentuk, Terdaftar dan Belum Berbadan Hukum</option> 
										<option value="Terbentuk, Terdaftar dan Berbadan Hukum">Terbentuk, Terdaftar dan Berbadan Hukum</option>
									</select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="status">Status Kelompok Usaha</label>
									<select class="form-control select2" name="status" id="status">
											<option value="Aktif">Aktif</option>
											<option value="Tidak Aktif">Tidak Aktif</option>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="tgl_bentuk_kelompok">Tanggal Bentuk Kelompok</label>
									<input type="date" name="tgl_bentuk_kelompok" id="tgl_bentuk_kelompok" class="form-control" value="<?=date('Y-m-d')?>">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="no_sk">No SK</label>
									<input name="no_sk"  id="no_sk" type="text" value="" class="form-control clear">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="file_Upload_sk">Upload SK</label>
									<input type="file" class="form-control" name="file_upload_sk">
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
	        var post_url = '<?php echo base_url("master_kelompok_usaha/create") ?>'; //get form action url
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


    function provChange(kode) {
	    event.preventDefault(); //prevent default action 
		$.get( "<?php echo base_url("master_kelompok_usaha/getKab/") ?>"+kode, function( data ) {
			data = JSON.parse(data)
			$('#kabupaten').html(data)
		});
    }

	
</script>

   