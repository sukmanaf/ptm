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
                		<input type="hidden" name="targetkk_id" value="<?=$id?>">

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for='fc_o'>Kab Kota</label>
									<input type="text" name="" value="<?=@$data['nama_kab_kota']?>" class="form-control" readonly >
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for='fc_e'>Target KK Kabupaten/Kota</label>
									<input name='e' id='fc_e' disabled='disabled' type='text' value='<?=@$data['target_kk']?>' class="form-control lh-input-angka" >
									
								</div>
							</div>

						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for='fc_c'>Kecamatan</label>
									<select name='c' id='fc_c' onchange="kecChange($(this).val())" class="form-control select2 custom-select w-100">
											<option value='0' selected='selected'>Semua</option>
											<?php
												foreach ($kec as $key => $value) { ?>
													<option value="<?=$value->kode?>"><?=$value->nama_kecamatan?></option>	
												<?php }
											?>
									</select>
									
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for='desaKel'>Desa Kelurahan</label>
									<select name='kode_desa_kelurahan' id='desaKel' required="" class="form-control select2 custom-select w-100">
									</select>
									
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for='jumlah'>Target KK Desa/Kelurahan</label>
									<input name='jumlah' id='jumlah' type='text' reaquired value='' required="" class="form-control numbers">
									<input name='sisa' id='sisa' type='hidden' reaquired value='<?=intVal($data['target_kk']-$data['kuota_terpakai'])?>'class="form-control numbers">
									<span><i>* tidak bisa melebihi sisa kuota, sisa kuota <?=intVal($data['target_kk']-$data['kuota_terpakai'])?></i></span>
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label for='batas_waktu'>Target Batas Waktu Penyelesaian</label>
									<div class="input-group date" id="target_batas_waktu_penyelesaian" data-target-input="nearest">
										<!-- <input name='target_batas_waktu_penyelesaian' id='batas_waktu' type='text' value='' class="form-control datetimepicker-input" data-target="#target_batas_waktu_penyelesaian" />
										<div class="input-group-append" data-target="#target_batas_waktu_penyelesaian" data-toggle="datetimepicker">
											<div class="input-group-text"><i class="fa fa-calendar"></i></div>
										</div> -->
												<input type="date" class="form-control" name="target_batas_waktu_penyelesaian">

									</div>
									
								</div>
							</div>
						</div>


						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col">
										<div class="form-group">
											<a href="<?=base_url('detail_pendampingan_kewirausahaan/data/').$id?>" class="form-control btn btn-secondary"><label >Tutup</label></a>
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
	        var post_url = '<?php echo base_url("detail_pendampingan_kewirausahaan/create") ?>'; //get form action url
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



    function kecChange(kec) {
	    event.preventDefault(); //prevent default action 
		$.get( "<?php echo base_url("detail_pendampingan_kewirausahaan/getKel/") ?>"+kec, function( data ) {
			data = JSON.parse(data)
			$('#desaKel').html(data)
		});
    }

   

	
</script>