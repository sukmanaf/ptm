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
                		<input type="hidden" name="id" value="<?=$id?>">
						<div class="row">
							
							<div class="col-md-6">

								<div class="form-group">
									<label for='fc_r'>Provinsi</label>

									<select required name='kode_provinsi' onchange="provChange($(this).val())" id='prov' class="form-control select2 custom-select w-100">
										<option value="">-- Pilih Provinsi --</option>
										<?php foreach ($prov as $key => $value): 
											if($value->kode == $data['kode_provinsi']){$sel="selected";}else{$sel="";}?>
											<option <?=$sel?> value="<?=$value->kode?>"><?=$value->nama_provinsi?></option>
										<?php endforeach ?>
									</select>
									
								</div>

							</div>
							<div class="col-md-6">

								<div class="form-group">
									<label for='fc_o'>Kab Kota</label>
									<select name='kode_kab_kota' id='kabkota' onchange="kabChange()" class="form-control select2 custom-select w-100">
									</select>

									<input type="hidden" name="kode_kab_kota_old" value="<?=@$data['kode_kab_kota']?>">
									
								</div>

							</div>
				
							<div class="col-md-6">
								<div class="form-group">
									<label for='tahun'>Tahun Anggaran</label>
									<input type="text" name="tahun_anggaran" readonly="" class="form-control" id="tahun_anggaran">
									<input type="hidden" name="tahun_anggaran_old" readonly="" value="<?=@$data['tahun_anggaran']?>" class="form-control" id="tahun_anggaran_old">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for='target_kk'>Target KK</label>
									<input name='target_kk' id='target_kk' readonly="" type='text' value='<?=@$data['target_kk']?>' class="numbers form-control">
									
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for='nip'>NIP</label>
									<input name='nip' id='nip' type='text' value='<?=@$data['nip']?>' maxlength="18" class="numbers form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for='nama_pejabat'>Nama Pejabat</label>
									<input name='nama_pejabat' id='nama_pejabat' type='text' value='<?=@$data['nama_pejabat']?>' class="form-control">
									
								</div>
							
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for='tahun'>Tahun Responden </label>
									<select name='tahun' id='tahun' class="form-control custom-select">
										<!-- 		<option <?php if ($data['tahun'] == date('Y')-2) {echo 'selected';}?> value='<?=date('Y')-2?>'><?=date('Y')-2?></option>
												<option <?php if ($data['tahun'] == date('Y')-1) {echo 'selected';}?> value='<?=date('Y')-1?>'><?=date('Y')-1?></option>
												<option <?php if ($data['tahun'] == date('Y')) {echo 'selected';}?> value='<?=date('Y')?>'><?=date('Y')?></option>

 -->
												<?php
													$from = 2021;
													$now = date('Y');
													for ($i=$from; $i <= $now ; $i++) { 
														$sel = $data['tahun'] == $i ? 'selected':'';
														echo "<option ".$sel." value='".$i."'>".$i."</option>";
													}
												?>
									</select>
								</div>
							</div>
						
						</div>

					</div>
				</div>

				<div class="card ">

					

						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col">
										<div class="form-group">
											<a href="<?=base_url('penyusunan_data')?>" class="form-control btn btn-secondary"><label >Tutup</label></a>
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

				<iframe id="sk1_prewview" src="<?=base_url('uploads/penyusunan_data/').$data['file_foto_sk1']?>" class="w-100" style="height:500px" frameborder="0"></iframe>
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
				<iframe id="sk2_prewview" src="<?=base_url('uploads/penyusunan_data/').$data['file_foto_sk2']?>" class="w-100" style="height:500px;width: 100%" frameborder="0"></iframe>

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
    	provChangeBegin($('#prov').val());
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
    	console.log(this.files[0].type)
    		if(this.files[0].type != 'image/jpeg' && this.files[0].type != 'image/jpg' && this.files[0].type != 'image/png' && this.files[0].type != 'image/gif' && this.files[0].type != 'application/pdf'){
    			toastr.error('Tipe File Salah atau File Rusak!')
    			$(this).val('')
	    		$('#sk2_prewview').attr('src','');
    		}else{
	    		console.log(URL.createObjectURL(this.files[0]))
	    		var url = URL.createObjectURL(this.files[0]);
	    		$('#sk2_prewview').attr('src',url);

    		}
    	});

    	console.log(<?=$data["tahun"]?>)

    	 // $('#tahun').val(<?=$data["tahun"]?>).trigger('change');
    	

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
	        var post_url = '<?php echo base_url("penyusunan_data/update") ?>'; //get form action url
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



    function provChangeBegin(prov) {
	    // event.preventDefault(); //prevent default action 
		$.get( "<?php echo base_url("penyuluhan/getKab/") ?>"+prov, function( data ) {
			data = JSON.parse(data)
			$('#kabkota').html(data)
			$("#kabkota").val(<?=$data['kode_kab_kota']?>).trigger('change');
			var element = $('#kabkota').find('option:selected'); 
	        var target = element.attr("data-target"); 
	        var tahun = element.attr("data-tahun"); 
	        $('#tahun_anggaran').val(tahun); 
	        $('#target_kk').val(target);


		});
		console.log('ok')
    }

    function provChange(prov) {
	    // event.preventDefault(); //prevent default action 
		$.get( "<?php echo base_url("penyuluhan/getKab/") ?>"+prov, function( data ) {
			data = JSON.parse(data)
			$('#kabkota').html(data)
		});
    }

      function kabChange(argument) {
    	var element = $('#kabkota').find('option:selected'); 
	        var target = element.attr("data-target"); 
	        var tahun = element.attr("data-tahun"); 
	        $('#tahun_anggaran').val(tahun); 
	        $('#target_kk').val(target);

    }
	
</script>