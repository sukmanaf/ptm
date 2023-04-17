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
									<select name='kode_kab_kota' onchange="kabChange($(this).val())" id='kabkota' class="form-control select2 custom-select w-100">
									</select>
									
								</div>

							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for='tahun'>Tahun Anggaran</label>
									<!-- <select name='tahun' id='tahun' class="form-control custom-select">
												<option value='<?=date('Y')?>'><?=date('Y')?></option>
									</select> -->
									<select name='tahun_anggaran' onchange="yearChange($(this).val())" id='tahun_anggaran' class="form-control select2 custom-select w-100">
									</select>
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
							<div class="col-md-6">
								<div class="form-group">
									<label for='realisasi_anggaran'>Realisasi Anggaran</label>
									<input name='realisasi_anggaran' id='realisasi_anggaran' onkeyup="realisasi($(this).val())" type='text' value='' class="form-control numbers">
									<span id="label_anggaran"></span>
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
	        			window.location.replace('<?=base_url()?>penlok_targetkk')
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
	        $('#realisasi_anggaran').val(0)
			$('#kabkota').html(data)
			$('#tahun_anggaran').html('')
	        $('#target_kk').val(0);

		});
    }

 
 	function kabChange(kab) {
	    event.preventDefault(); //prevent default action 
		$.get( "<?php echo base_url("penlok_targetkk/getYearAnggaran/") ?>"+kab, function( data ) {
			data = JSON.parse(data)
			// console.log(data)
	        $('#realisasi_anggaran').val(0)
			$('#tahun_anggaran').html(data)
	        $('#target_kk').val(0);

		});
    }
   	function yearChange(argument) {
    	var element = $('#tahun_anggaran').find('option:selected'); 
	        var anggaran = element.attr("data-anggaran"); 
	        var target = element.attr("data-target"); 
	        console.log(tahun)
	        console.log(target)
	        $('#label_anggaran').html('Anggran Maksimal Rp.'+rupiah(anggaran)); 
	        $('#realisasi_anggaran').val(0)
	        $('#target_kk').val(target);
    }


   	function realisasi(val) {
    	var element = $('#tahun_anggaran').find('option:selected'); 
	        var anggaran = parseInt(element.attr("data-anggaran")); 
	        var val = val.split('.').join(''); 
	        if (val >= anggaran) {
	        	$('#realisasi_anggaran').val(rupiah(anggaran))
	        }else{
	        	$('#realisasi_anggaran').val(rupiah(val))
	        }


    }

    function rupiah(nStr)
{
    nStr += '';
    x = nStr.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + '.' + '$2');
    }
    return x1 + x2;
}

	
</script>