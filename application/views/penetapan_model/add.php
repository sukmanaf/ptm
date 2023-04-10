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
									<select name='kode_kab_kota' onchange="kabChange()" id='kabkota' class="form-control select2 custom-select w-100">
									</select>
									
								</div>

							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for='tahun'>Tahun Anggaran</label>
									<!-- <select name='tahun' id='tahun' class="form-control custom-select">
												<option value='<?=date('Y')?>'><?=date('Y')?></option>
									</select> -->
									<input type="text" name="tahun_anggaran" readonly="" class="form-control" id="tahun_anggaran">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for='target_kk'>Target KK</label>
									<input name='target_kk' id='target_kk' readonly="" type='text' value='' class="numbers form-control">
									
								</div>
							</div>

						</div>


						<div class="row">

							<div class="col-md-6">
								<div class="form-group">
									<label for='nip'>NIP</label>
									<input name='nip' id='nip' type='text' value='' maxlength="18" class="numbers form-control">
									
								</div>
							</div>
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
									<label for='tahun'>Tahun Responden</label>
									<select name='tahun' id='tahun' class="form-control custom-select">
											<!-- 	<option value='<?=date('Y')-2?>'><?=date('Y')-2?></option>
												<option value='<?=date('Y')-1?>'><?=date('Y')-1?></option>
												<option value='<?=date('Y')?>'><?=date('Y')?></option> -->


												<?php
													$from = 2021;
													$now = date('Y');
													for ($i=$from; $i <= $now ; $i++) { 
														echo "<option value='".$i."'>".$i."</option>";
													}
												?>
									</select>
								</div>
							</div>
						
						</div>
						<div class="row">
						</div>
					</div>
				</div>

				<div class="card ">

					

						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col">
										<div class="form-group">
											<a href="<?=base_url('penetapan_model')?>" class="form-control btn btn-secondary"><label >Tutup</label></a>
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
	        var post_url = '<?php echo base_url("penetapan_model/create") ?>'; //get form action url
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
		$.get( "<?php echo base_url("penetapan_model/getKab/") ?>"+prov, function( data ) {
			data = JSON.parse(data)
			$('#kabkota').html(data)
		});
    }

    function kabChange(argument) {
    	var element = $('#kabkota').find('option:selected'); 
	        var target = element.attr("data-target"); 
	        var tahun = element.attr("data-tahun"); 
	        console.log(tahun)
	        console.log(target)
	        $('#tahun_anggaran').val(tahun); 
	        $('#target_kk').val(target); 
    }


	
</script>