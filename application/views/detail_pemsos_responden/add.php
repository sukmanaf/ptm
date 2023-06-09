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
                		<input type="hidden" name="id_targetkk_desa" value="<?=$id?>">

						<div class="card-header">
				            <h3>
				                RE. Responden
				            </h3>
				        </div>
				        <div class="card-body">
				            <div class="row">
				                <div class="col-sm-6 col-md-6 col-xs-12">
				                    <div class="form-group">
				                        <label for='fc_nama_responden_utama'>Nama Responden Utama</label>
				                        <input name='nama_responden_utama' id='fc_nama_responden_utama' placeholder='Nama Responden Utama' type='text' value='' minlength='1' maxlength='100' class="form-control" aria-describedby="inputGroupPrepend" required />
				                        <div class="invalid-feedback">
				                            
				                        </div>
				                    </div>
				                </div>
				                <div class="col-sm-6 col-md-6 col-xs-12">
				                    <div class="form-group">
				                        <label for='nik'>No. Induk Kependukdukan</label></br>
				                        <input name='nik' id='nik' style="display: inline;width: 75%" placeholder='No. Induk Kependudukan' type='text' value='' minlength='1' maxlength='100' class="form-control" aria-describedby="inputGroupPrepend" required />
				                        <button class="btn btn-primary" style="display: inline" onclick="generateNik($(this).val())">Generate NIK</button>
				                    </div>
				                </div>
				            </div>
				            <div class="row">
				                <div class="col-sm-6 col-md-6 col-xs-12">
				                    <div class="form-group">
				                        <label for='no_kk'>No KK</label>
				                        <input name='no_kk' id='no_kk' placeholder='No KK' type='text' value='' minlength='1' maxlength='100' class="form-control" aria-describedby="inputGroupPrepend" required />
				                        <div class="invalid-feedback">
				                            
				                        </div>
				                    </div>
				                </div>
				                <div class="col-sm-6 col-md-6 col-xs-12">
				                    <div class="form-group">
				                        <label for='fc_nik'>Tanggal Lahir</label>
				                        <input name='tanggal_lahir' id='fc_tanggal_lahir' placeholder='No. Induk Kependudukan' type='date'class="form-control" aria-describedby="inputGroupPrepend" required value="<?=date('Y-m-d')?>" />
				                        <div class="invalid-feedback">
				                            
				                        </div>
				                    </div>
				                </div>
				            </div>
				            <div class="row">
		                    	<div class="col-md-6">
		                            <div class="form-group">
		                                <label for='fc_nama_kk'>Nama Kepala Keluarga</label>
		                                <input name='nama_kk' id='fc_nama_kk' placeholder='Nama Kepala Keluarga' type='text' value='' minlength='1' maxlength='100' class="form-control" aria-describedby="inputGroupPrepend" required />
		                                <div class="invalid-feedback">
		                                    
		                                </div>
		                            </div>
		                        </div>
		                        <div class="col-md-6">
		                            <div class="form-group">
		                                <label for='fc_jml_tanggungan'>Jumlah Tanggungan</label>
		                                <div class="form-group">
		                                    <input name='jml_tanggungan' style="width: 80%;display: inline;" id='fc_jml_tanggungan' placeholder='Jumlah Tanggungan' type='text' value='' class="form-control" aria-describedby="inputGroupPrepend" required />&nbsp;&nbsp; Orang
		                                </div>
		                            </div>
			                    </div>
				            </div>
		                    <div class="row">
		                        <div class="col-md-6">
		                            <div class="form-group">
		                                <label for='fc_memiliki_no_telepon'>Memiliki No.Telepon / HP</label>
		                                <select name='memiliki_no_telepon' onchange="telpChange($(this).val())" id='fc_memiliki_no_telepon' class="form-control select2 custom-select w-100">
		                                                <option value='1'>Ya</option>
		                                                <option value='2'>Tidak</option>
		                                </select>
		                                
		                            </div>
		                        </div>
		                        <div class="col-md-6">
		                            <div class="form-group">
		                                <label for='no_telepon'>Nomor Telepon</label>
		                                <input name='no_telepon' id='no_telepon' placeholder='Nomor Telepon' type='text' value='' minlength='1' maxlength='20' class="form-control" aria-describedby="inputGroupPrepend" required />
		                                <div class="invalid-feedback">
		                                    
		                                </div>
		                            </div>
				            
				            	</div>

				            </div>
				            <div class="row">
				            	<div class="col-md-6">
		                            <div class="form-group">
		                                <label for='fc_no_rt'>Nomor RT</label>
		                                <input name='no_rt' id='fc_no_t' placeholder='Nomor RT' type='text' value='' class="form-control" aria-describedby="inputGroupPrepend" required />
		                            </div>
		                        </div>
		                        <div class="col-md-6">
				                    <div class="form-group">
				                        <label for='fc_jenis_kelamin'>Jenis Kelamin</label>
				                        <select name='jenis_kelamin' id='fc_jenis_kelamin' class="form-control select2 custom-select w-100">
				                                        <option value='L'>Laki - Laki</option>
				                                        <option value='P'>Perempuan</option>
				                        </select>
				                        
				                    </div>
				                </div>
				            </div>

				            <div class="row">
		                        <div class="col-md-4">
		                            <div class="form-group">
		                                <label for='fc_sumber_status_tanah'>Sumber Status Tanah</label>
		                                <select id="sumber_status_tanah"  required  onchange="statusTanahChange($(this).val())" name='sumber_status_tanah' class="form-control select2 custom-select w-100">
		                                                <option value=''>-- Pilih Status tanah -- </option>
		                                                <option value='1'>Terdaftar</option>
		                                                <option value='2'>Belum Terdaftar</option>
		                                </select>
		                                
		                            </div>
		                        </div>
		                        <div class="col-md-4">
		                            <label>Keterangan Status Tanah</label>
		                            <select id='tanah_terdaftar_atau_tidak'  required  name='tanah_terdaftar_atau_tidak' class="form-control select2 custom-select w-100" data-semua='0'>
		                                    <option value='' >-- Pilih Status Tanah --</option>
		                            </select>
		                    	</div>

		                        <div class="col-md-4">
		                            <div class="form-group">
		                                <label for='tahun_status_tanah'>Tahun</label>
		                                <select name='tahun_status_tanah'  required  id='tahun_status_tanah' class="form-control select2 custom-select w-100">
		                                                <option value=''>-- Pilih Tahun --</option>
		                                                <?php
		                                                	$now = date('Y');
		                                                	$stop = 1979;
		                                                	for ($i=$now; $i > $stop; $i--) { 
		                                                		# code...
		                                                		echo 	'<option value="'.$i.'">'.$i.'</option>';
		                                                	}


		                                                ?>
		                                </select>
		                                
		                            </div>
		                        </div>
		                    </div>
			                <div class="row">
			                        <div class="col-md-3">
			                            <div class="form-group">
			                                <label>Sektor Usaha Yang Dikelola</label>
			                                <select  id='sektor_usaha'  required  onchange="sektorChange($(this).val())" name='sektor_usaha[]' class="select2 custom-select w-100" data-semua='0'>
			                                	<option value="">-- Pilih Sektor --</option>
			                                	<?php
			                                		foreach ($sektor as $key => $value) { ?>
			                                			<option value="<?=$value->kode_sektor_usaha?>"><?=$value->deskripsi?></option>
			                                		<?php }
			                                	?>
			                                </select>
			                                <div class="invalid-feedback">
			        
			                                </div>
			                            </div>
			                        </div>
			                        <div class="col-md-4">
			                            <div class="form-group">
			                                <label>Sub Sektor Usaha</label>
			                                <select id='sub_sektor_usaha'  required  onchange="subSektorChange($(this).val())" name='sub_sektor_usaha[]' class="form-control select2 custom-select w-100" data-semua='0'>
			                                </select>
			                                <div class="invalid-feedback">
			                                    
			                                </div>
			                            </div>
			                        </div>
			                        <div class="col-md-4">
			                            <div class="form-group">
			                                <label>Jenis Sub Sektor Usaha</label>
			                                <select id='jenis_sub_sektor_usaha'  required  name='jenis_sub_sektor_usaha[]' class="form-control select2 custom-select w-100" data-semua='0'>
			                                </select>
			                                <div class="invalid-feedback">
			                                    
			                                </div>
			                            </div>
			                        </div>

									<div class="col-md-1">
			                                <label style="color: white;display: block">.</label>
										<button class="btn btn-success" onclick="append()"><i class="fas fa-plus" ></i></button>
									</div>
			                </div>
			                <div class="append">
			                	
			                </div>

			                
				        </div>
						<div class="card-header">
				            <h3>
				                Fieldstaff
				            </h3>
				        </div>
				        <div class="card-body">
				            <div class="row">
				                <div class="col-sm-6 col-md-6 col-xs-12">
				                    <div class="form-group">
				                        <label for='kode_fieldstaff'>Nama Fieldstaff</label>
				                        <select id="kode_field_staff" name='kode_field_staff'  required  class="form-control select2 custom-select w-100">
		                                               <?=$fieldstaff?>
		                                </select>
				                    </div>
				                </div>
				                <div class="col-sm-6 col-md-6 col-xs-12">
				                    <div class="form-group">
				                        <label for='kode_peninjau'>Nama Peninjau</label></br>
				                        <input name='kode_peninjau' id='kode_peninjau'  placeholder='Nama Peninjau' type='text' value='' minlength='1' maxlength='100' class="form-control" aria-describedby="inputGroupPrepend" required />
				                    </div>
				                </div>
				            </div>
				            <div class="row">
				                <div class="col-sm-6 col-md-6 col-xs-12">
				                    <div class="form-group">
				                        <label for='tgl_kunjungan'>Tanggal Kunjungan</label>
				                        <input type="date" name="tgl_kunjungan"  required class="form-control" value="<?=date('Y-m-d')?>">
				                    </div>
				                </div>
				                <div class="col-sm-6 col-md-6 col-xs-12">
				                    <div class="form-group">
				                        <label for='hasil_kunjungan'>Hasil Kunjungan</label></br>
				                        <input name='hasil_kunjungan' id='hasil_kunjungan'  placeholder='hasil Kunjungan' type='text' value='' class="form-control" aria-describedby="inputGroupPrepend" required />
				                    </div>
				                </div>
				            </div>
				            <div class="row">
				                <div class="col-sm-6 col-md-6 col-xs-12">
				                    <div class="form-group">
				                        <label for='jam_mulai'>Jam Mulai</label>
				                        <input name="jam_mulai" type="text" name="jam_mulai"  required class="timepicker form-control" value="12:00">
				                    </div>
				                </div>
				                <div class="col-sm-6 col-md-6 col-xs-12">
				                    <div class="form-group">
				                        <label for='jam_selesai'>Jam Selesai</label></br>
				                        <input name='jam_selesai' id='jam_selesai'  placeholder='' type='text' value="13:00" class="timepicker form-control " required />
				                    </div>
				                </div>
				            </div>
				            <div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="files1">Pilih File</label>
										<input name="files1" id="files1" required="" type="file" class="form-control-file clear">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="files2">Pilih File</label>
										<input name="files2" id="files2"  type="file" class="form-control-file clear">
									</div>
								</div>
							</div>
				        </div>
				        


						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col">
										<div class="form-group">
											<a href="<?=base_url('detail_pemsos_responden/data/').$id?>" class="form-control btn btn-secondary"><label >Tutup</label></a>
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
    	  $('.timepicker').timepicker();
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
	        var post_url = '<?php echo base_url("detail_pemsos_responden/create") ?>'; //get form action url
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


    function statusTanahChange(sts) {
	    event.preventDefault(); //prevent default action 
	    if (sts == 1) {
	    	$('#tanah_terdaftar_atau_tidak').html('<?=$terdaftar?>')
    		$('#tahun_status_tanah').attr('disabled',false)
	    }else{
	    	$('#tanah_terdaftar_atau_tidak').html('<?=$tidakTerdaftar?>')
    		$('#tahun_status_tanah').attr('disabled',true)
    		$('#tahun_status_tanah').val('').trigger('change')
	    }
    }



    function sektorChange(kode) {
	    event.preventDefault(); //prevent default action 
		$.get( "<?php echo base_url("detail_pemsos_responden/getSubsektor/") ?>"+kode, function( data ) {
			data = JSON.parse(data)
			$('#sub_sektor_usaha').html(data)
			// console.log(data)
		});
    }
    function sektorChangeA(kode,num) {
	 //    event.preventDefault(); //prevent default action 
		$.get( "<?php echo base_url("detail_pemsos_responden/getSubsektor/") ?>"+kode, function( data ) {
			data = JSON.parse(data)
			$('#sub_sektor_usaha'+num).html(data)
			// console.log(data)
		});
    }
    function subSektorChange(kode) {
	    event.preventDefault(); //prevent default action 
		$.get( "<?php echo base_url("detail_pemsos_responden/getJnsSubsektor/") ?>"+kode, function( data ) {
			data = JSON.parse(data)
			$('#jenis_sub_sektor_usaha').html(data)
			// console.log(data)
		});
    }

    function subSektorChangeA(kode,num) {
	    event.preventDefault(); //prevent default action 
		$.get( "<?php echo base_url("detail_pemsos_responden/getJnsSubsektor/") ?>"+kode, function( data ) {
			data = JSON.parse(data)
			$('#jenis_sub_sektor_usaha'+num).html(data)
			// console.log(data)
		});
    }

    var numid=0
    function append() {
	    event.preventDefault(); //prevent default action 
    	$.get( "<?php echo base_url("detail_pemsos_responden/append/") ?>"+numid, function( data ) {
			data = JSON.parse(data)
			$('.append').append(data.html)
    		$('#sektor_usaha'+numid).select2()
    		$('#sub_sektor_usaha'+numid).select2()
    		$('#jenis_sub_sektor_usaha'+numid).select2()
    		numid++
			// console.log(data.html)
		});
    }

   function del(v) {
	    event.preventDefault(); //prevent default action
		$('#row'+v).remove()
	    
   }

    function generateNik() {
	    event.preventDefault(); //prevent default action
    	var kode = '<?=$data['kode_desa_kelurahan'].rand(00000000,99999999	)?>';
    	$.get( "<?php echo base_url("detail_pemsos_responden/cekNik/") ?>"+kode, function( data ) {
			if(data == 1){
    			$('#nik').val(kode)
			}else{
				generateNik()


			}
		});
    }

    function telpChange(v) {
    	if (v==1) {
    		$('#no_telepon').attr('disabled',false)
    	}else{
    		$('#no_telepon').val('')
    		$('#no_telepon').attr('disabled',true)
    	}
    }

 
	
</script>