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
                		<input type="hidden" name="id_targetkk_desa" value="<?=$id_targetkk_desa?>">
                		<input type="hidden" name="tahun_anggaran" value="<?=$targetKK['tahun_anggaran']?>">
						<div class="card-header">
				            <h3>
				                Entry
				            </h3>
				        </div>
				        <div class="card-body">
				            <div class="row">
				                <div class="col-md-12">
				                    <div class="card">
				                        <div class="card-body">
				                           <div class="row">
									            <div class="col-sm-6 col-md-6 col-xs-12">
									                <div class="form-group">
									                    <label for='fc_nama_responden_utama'>Provinsi</label>
									                    <select class="form-control" id="kode_provinsi" name="kode_provinsi">
									                    		<option value="<?=substr($data['kode_desa_kelurahan'],0,2)?>"><?=$data['nama_provinsi']?></option>
									                    </select>
									                </div>
									            </div>
									            <div class="col-sm-6 col-md-6 col-xs-12">
									                <div class="form-group">
									                    <label for='fc_nama_responden_utama'>Kabupaten/Kota</label>
									                    <select class="form-control" id="kode_kab_kota" name="kode_kab_kota">
									                    		<option value="<?=substr($data['kode_desa_kelurahan'],0,4)?>"><?=$data['nama_kab_kota']?></option>
									                    </select>
									                </div>
									            </div>
									        </div>
									  		<div class="row">
									            <div class="col-sm-6 col-md-6 col-xs-12">
									                <div class="form-group">
									                    <label for='desa'>kecamatan</label>
									                    <select class="form-control" id="kode_kecamatan" name="kode_kecamatan">
									                    		<option value="<?=substr($data['kode_desa_kelurahan'],0,6)?>"><?=$data['nama_kecamatan']?></option>
									                    </select>
									                </div>
									            </div>

									            <div class="col-sm-6 col-md-6 col-xs-12">
									                <div class="form-group">
									                    <label for='nik'>Desa/Kelurahan</label></br>
									                    <select class="form-control" id="kode_desa_kelurahan" name="kode_desa_kelurahan">
									                    		<option value="<?=substr($data['kode_desa_kelurahan'],0,6)?>"><?=$data['nama_desa_kelurahan']?></option>
									                    </select>
									                </div>
									            </div>
									        </div>
				                        </div>
				                    </div>
				                </div>
				            </div>
				            <div class="row">
				                <div class="col-md-12">
				                    <div class="card">
				                        <div class="card-body" id="DivPenetapanModelPemberdayaan">
				                            <div class="row" id="itemPenetapanModelPemberdayaan1">
				                                <div class="col-md-6">
				                                    <div class="form-group">
				                                    	
				                                        <label>
				                                            Penetapan Model Pemberdayaan
				                                        </label>
				                                        <select id='jenis_pemberdayaan' name="id_jenis_pemberdayaan[]" class="form-control select2 " >
				                                        	<?=@$jnsPemberdayaan?>
				                                        </select>
				                                    </div>
				                                </div>
				                                <div class="col-md-5">
				                                    <div class="form-group">
				                                        <label>
				                                            Jumlah Subjek (KK)
				                                        </label>
				                                        <input id='jumlah_subjek1' name="jumlah_subjek[]" class="form-control jml_subjek numbers" />
				                                        <span><i>maksimal input <?=$targetKK['target_kk']?></i></span>
				                                    </div>
				                                </div>
				                                <div class="col-md-1">
				                                    <div class="form-group">
				                                        <label>&nbsp</label></br>
				                                        <button type="button" onclick="append()" class="btn btn-success"><i class="fas fa-plus" ></i></button>
				                                        
				                                    </div>
				                                </div>
				                            </div>
				                        </div>
				                    </div>
				                </div>
				            </div>
				        </div>
				        <div class="card-footer">
				            <div class="row">
				                <div class="col-md-6">
				                    <div class="row">
				                            <div class="col">
				                                <div class="form-group">

				                                  <a href="<?=base_url('detail_penetapan_model/data/').$id?>" class="form-control btn btn-secondary"><label >Tutup</label></a>
				                                </div>
				                            </div>
				                            <div class="col">
				                                <div class="form-group">
				                                    <input name='s_s' id='fc_s_s' type='submit' value='Simpan' class="form-control btn btn-warning">
				                                </div>
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
    	
    	$('#titleId').html('<?=$title?>')
    	$('.jml_subjek').keyup(function(event){
		 // play with event
		 // use $(this) to determine which element triggers this event
		 var bts = '<?=$targetKK["target_kk"]?>';
		 	if ($('#'+this.id).val() > bts) {
		 		$('#'+this.id).val(bts)
		 	}
		});

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
	        var post_url = '<?php echo base_url("detail_penetapan_model/create") ?>'; //get form action url
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
		$.get( "<?php echo base_url("detail_penetapan_model/getKel/") ?>"+kec, function( data ) {
			data = JSON.parse(data)
			$('#desaKel').html(data)
		});
    }

    var num = 2;
    function append(kec) {
	    event.preventDefault(); //prevent default action 
		$.get( "<?php echo base_url("detail_penetapan_model/getAppend/") ?>"+num, function( data ) {
			data = JSON.parse(data)
			console.log(data)
			$('#DivPenetapanModelPemberdayaan').append(data.addPemberdayaan)
			num++
		});
    }
    function del(v) {
    	$('#itemPenetapanModelPemberdayaan'+v).remove()
    }

	
</script>