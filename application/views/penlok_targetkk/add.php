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
									<label for='tahun'>Tahun</label>
									<select name='tahun' id='tahun' class="form-control custom-select">
												<option value='<?=date('Y')?>'><?=date('Y')?></option>
									</select>
									
								</div>
							</div>
							<div class="col-md-6">

								<div class="form-group">
									<label for='fc_r'>Provinsi</label>

									<select required name='kode_provinsi' onchange="provChange($(this).val())" id='prov' class="form-control select2 custom-select w-100">
										<option value="">-- Pilih Provinsi --</option>
										<?php foreach ($prov as $key => $value): ?>
											<option value="<?=$value->kode?>"><?=$value->nama_provinsi?></option>
										<?php endforeach ?>
									</select>
									
								</div>

							</div>
							<div class="col-md-6">

								<div class="form-group">
									<label for='fc_o'>Kab Kota</label>
									<select name='kode_kab_kota' id='kabkota' class="form-control select2 custom-select w-100">
									</select>
									
								</div>

							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for='nip'>NIP</label>
									<input name='nip' id='nip' type='text' value='' maxlength="18" class="numbers form-control">
									
								</div>
							</div>
						</div>


						<div class="row">

							<div class="col-md-6">
								<div class="form-group">
									<label for='nama_pejabat'>Nama Pejabat</label>
									<input name='nama_pejabat' id='nama_pejabat' type='text' value='' class="form-control">
									
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for='target_kk'>Target KK</label>
									<input name='target_kk' id='target_kk' type='text' value='' class="numbers form-control">
									
								</div>
							</div>

						</div>
					</div>
				</div>

				<div class="card ">

					<div class="card-header">
						<h3 class="card-title">SK 1</h3>

						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse">
								<i class="fas fa-minus"></i>
							</button>
						</div>
						<!-- /.card-tools -->
					</div>

					<div class="card-body">
						<div class="row">
							<div class="col-md-12">

								<div class="row">
									<div class="col-6">
										<div class="form-group">
											<label for='no_sk1'>No SK</label>
											<input name='no_sk1' id='no_sk1' type='text' value='' class="form-control">
											
										</div>
									</div>
									<div class="col-6">

										<div class="form-group">
											<label for='tanggal_sk1'>Tanggal</label>
											<div class="input-group date" id="tanggal_sk1" data-target-input="nearest">
												<!-- <input name='f' id='fc_f' type='text' value='' class="form-control datetimepicker-input" data-target="#tanggal_sk1" />
												<div class="input-group-append" data-target="#tanggal_sk1" data-toggle="datetimepicker">
													<div class="input-group-text"><i class="fa fa-calendar"></i></div>
												</div> -->
												<input type="date" class="form-control" name="tanggal_sk1">
											</div>
											
										</div>
									</div>
								</div>
								<div class="form-group">
									<label for='tentang_sk1'>Tentang</label>
									<input name='tentang_sk1' id='tentang_sk1' type='text' value='' class="form-control">
									
								</div>
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for='file_foto_sk1'>Foto SK</label>
											<div class="custom-file">
												<input name='file_foto_sk1' id='file_foto_sk1' type='file' class="custom-file-input" accept="image/png, image/jpeg, application/pdf">
												<label class="custom-file-label" for='file_foto_sk1'>Pilih file</label>
											</div>
											
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label class="col-form-label" for="inputSuccess">
											</label>
											<button type="button" class="form-control btn btn-default" data-toggle="modal" data-target="#modal-1">
												Lihat File
											</button>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="card ">

							<div class="card-header">
								<h3 class="card-title">SK 2</h3>

								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse">
										<i class="fas fa-minus"></i>
									</button>
								</div>
								<!-- /.card-tools -->
							</div>


							<div class="card-body">

								<div class="row">
									<div class="col-md-12">

										<div class="row">
											<div class="col-6">
												<div class="form-group">
													<label for='no_sk2'>No SK</label>
													<input name='no_sk2' id='no_sk2' type='text' value='' class="form-control">
													
												</div>
											</div>
											<div class="col-6">
												<div class="form-group">
													<label for='tanggal_sk2'>Tanggal</label>
													<div class="input-group date" id="tanggal_sk2" data-target-input="nearest">
														<!-- <input name='f' id='fc_f' type='text' value='' class="form-control datetimepicker-input" data-target="#tanggal_sk2" />
														<div class="input-group-append" data-target="#tanggal_sk2" data-toggle="datetimepicker">
															<div class="input-group-text"><i class="fa fa-calendar"></i></div>
														</div> -->
														<input type="date" class="form-control" name="tanggal_sk2">
													</div>
													
												</div>
											</div>
										</div>
										<div class="form-group">
											<label for='tentang_sk2'>Tentang</label>
											<input name='tentang_sk2' id='tentang_sk2' type='text' value='' class="form-control">
											
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for='file_foto_sk2'>Foto SK</label>
													<div class="custom-file">
														<input name='file_foto_sk2' id='file_foto_sk2' type='file' class="custom-file-input" >
														<label class="custom-file-label" for='file_foto_sk2'>Pilih file</label>
													</div>
													
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label class="col-form-label" for="inputSuccess">
													</label>
													<button type="button" class="form-control btn btn-default" data-toggle="modal" data-target="#modal-2">
														Lihat File
													</button>
												</div>
											</div>
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
											<a href="<?=base_url('penlok_targetkk')?>" class="form-control btn btn-secondary"><label >Tutup</label></a>
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


<div class="modal fade" id="modal-1">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Preview</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<iframe id="sk1_prewview" src="" class="w-100" style="height:500px" frameborder="0"></iframe>
			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<div class="modal fade" id="modal-2">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Preview</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<iframe id="sk2_prewview" src="" class="w-100" style="height:500px;width: 100%" frameborder="0"></iframe>

			</div>
			<div class="modal-footer justify-content-between">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
<!-- /.modal -->



<script type="text/javascript">
    $(document).ready(function(){
    	 $('#file_foto_sk1').on('change', function(){
    	// var fuUpload = document.getElementById("lampiran1");
    		if(this.files[0].type != 'image/jpeg' && this.files[0].type != 'image/jpg' && this.files[0].type != 'image/png' && this.files[0].type != 'image/gif' && this.files[0].type != 'application/pdf'){
    			toastr.error('Tipe File Salah atau File Rusak!')
    			$(this).val('')
	    		$('#sk1_prewview').attr('src','');
    		}else{
	    		console.log(URL.createObjectURL(this.files[0]))
	    		var url = URL.createObjectURL(this.files[0]);
	    		$('#sk1_prewview').attr('src',url);

    		}
    	});
    	 $('#file_foto_sk2').on('change', function(){
    	// var fuUpload = document.getElementById("lampiran1");
    		if(this.files[0].type != 'image/jpeg' && this.files[0].type != 'image/jpg' && this.files[0].type != 'image/png' && this.files[0].type != 'image/gif'){
    			toastr.error('Tipe File Salah atau File Rusak!')
    			$(this).val('')
	    		$('#sk2_prewview').attr('src','');
    		}else{
	    		console.log(URL.createObjectURL(this.files[0]))
	    		var url = URL.createObjectURL(this.files[0]);
	    		$('#sk2_prewview').attr('src',url);

    		}
    	});

    	

    	

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
	        var post_url = '<?php echo base_url("penlok_targetkk/create") ?>'; //get form action url
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
	        		setTimeout(function() {
	        			location.reload()
	        		}, 3000);
	        	}else{
	        		toastr.error(response.message);
	        	} 
	        });

	        
	    });


    })



    function provChange(prov) {
	    event.preventDefault(); //prevent default action 
		$.get( "<?php echo base_url("penlok_targetkk/getKab/") ?>"+prov, function( data ) {
			data = JSON.parse(data)
			$('#kabkota').html(data)
		});
    }
	
</script>