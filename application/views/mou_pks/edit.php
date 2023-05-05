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
                		<div class="container-fluid">
							<div class="row">
								<div class="col-md-12">
									<div class="card card-primary">
										<div class="card-header">
											<h3 class="card-title">Input Oleh</h3>
										</div>
										<div class="card-body row">
											<div class="form-group col-md-6">
												<label for='fc_nip'>Nip</label>
												<input name='nip' id='fc_nip' type='text' maxlength="18" required value='<?=$data['nip']?>' class="form-control" id="nip" name="nip" placeholder="NIP">
												
											</div>
											<div class="form-group col-md-6">
												<label for='fc_nama_pejabat'>Nama Pejabat</label>
												<input  name='nama_pejabat' id='fc_nama_pejabat' required type='text' value='<?=$data['nama_pejabat']?>' class="form-control" id="nama_pejabat" name="nama_pejabat" placeholder="Nama Pejabat">
												
											</div>
										</div>
									</div>
								</div>

								<div class="col-md-12">
									<div class="card card-primary">
										<div class="card-header">
											<h3 class="card-title">Detail MoU/Perjanjian Kerja Sama</h3>
										</div>
										<!-- card body -->
										<div class="card-body row">
											<div class="col-md-6 ">
												<div class="form-group clearfix">
													<label for='fc_jenis_perjanjian'>Jenis Perjanjian</label> </br>
													<div class=" d-inline">
														<input  type="radio" <?php if($data['jenis_perjanjian']=='mou'){echo 'checked="checked"';}?>  id="radio_mou" checked value="mou" name="jenis_perjanjian"   />
														<label style="margin-right: 20px" for="radio_mou">MoU</label>
													</div>
													<div class="d-inline">
														<input  type="radio" <?php if($data['jenis_perjanjian']=='pks'){echo 'checked="checked"';}?>  id="radio_pks" value="pks" name="jenis_perjanjian"  />
														<label for="radio_pks">PKS</label>
													</div>
												</div>
											</div>
											<div class="col-md-6 ">
													
												<div class="form-group clearfix">
													<label for='fc_jenis_perjanjian'>Status Perjanjian</label></br>
													<div class=" d-inline">
														<input  type="radio" <?php if($data['status_perjanjian']=='ada'){echo 'checked="checked"';}?>  id="radio_ada" onchange="mouChange()"  checked value="ada" name="status_perjanjian"   />
														<label style="margin-right: 20px" for="radio_ada">Sudah Ada</label>
													</div>
													<div class="d-inline">
														<input  type="radio" <?php if($data['status_perjanjian']=='proses'){echo 'checked="checked"';}?> onchange="mouChange()" id="radio_proses" value="proses" name="status_perjanjian"  />
														<label for="radio_proses">Dalam Proses</label>
													</div>
												</div>
											</div>
											<div class="form-group col-md-6 hiden_tahapan">
												<label for='nama_stackholder'>Tahapan</label>
												<select class="select2 form-control" name="tahapan" onchange="tahapanChange()" id="tahapan">
													<option value="">-- Pilih Tahapan --</option>
													<?php foreach ($tahapan as $key => $value): ?>
														<?php if ($value->kode_jns == $data['tahapan']): ?>
														<option selected value="<?=$value->kode_jns?>"><?=$value->nama?></option>
															
														<?php else: ?>
														<option value="<?=$value->kode_jns?>"><?=$value->nama?></option>
														<?php endif ?>

													<?php endforeach ?>
												</select>
											</div>
											<div class="form-group col-md-6 hiden_tahapan">
												
											</div>
											<div class="form-group col-md-6">
												<label for='nama_stackholder'>Nama Stackholder</label>
												<input  id='nama_stackholder' type='text' value='<?=$data['nama_stackholder']?>' type="text" class="form-control" id="nama_stackholder" name="nama_stackholder" placeholder="Nama Stackholder">
											</div>
											<div class="form-group col-md-6">
												<label for='nomor_mou_pks'>Judul MOU/PKS</label>
												<input name='judul' id='judul' type='text' value='<?=$data['judul']?>'  type="text" class="form-control" id="judul" name="judul" placeholder="Judul MoU/PKS">
												
											</div>
											<div class="form-group col-md-6">
												<label for='nomor'>Nomor Mou / PKS</label>
												<input  id='nomor' type='text' value='<?=$data['nomor']?>'  type="text" class="form-control" id="nomor" name="nomor" placeholder="Nomor MoU/PKS">
											</div>
											
											<div class="form-group col-md-3">
												<label for='fc_tanggal_mou_pks'>Tanggal Mou / PKS</label>
												<div class="input-group date" id="tanggal_mou_pks" data-target-input="nearest">
													<input type="date" class="form-control" name="tanggal_mulai" required value="<?=$data['tanggal_mulai']?>">
												</div>
												
											</div>
											<div class="form-group col-md-3">
												<label for='fc_tanggal_berakhir'>Tanggal Berakhir</label>
												<div class="input-group date" id="tanggal_berakhir" data-target-input="nearest">
													<input type="date" class="form-control" name="tanggal_akhir" required value="<?=$data['tanggal_akhir']?>">
													
												</div>
											</div>
										
											<div class="form-group col-md-6">
												<label for='fc_keterangan'>Keterangan</label>
												<textarea name='keterangan' id='fc_keterangan' class="form-control"  placeholder="Keterangan"><?=$data['keterangan']?></textarea>
												
												
											</div>
											<div class="col-md-12">
												<table id="filevidence" class="table">
													<thead>
														<tr>
															<th>Jenis Evidence</th>
															<th>Aksi</th>
														</tr>
													</thead>
													
													<tbody>
														<?php foreach ($evidence as $key => $value): ?>
															<tr id="tr_evidence<?=$key?>">
																<td>
																	<?=$value->nama?>
																</td>
																<td>
																	<a href="<?=base_url().$value->dir_name?>" target="_blank" class="btn btn-primary">Lihat</a>
																	<button class="btn btn-danger" onclick="delEvidence(<?=$value->id_file?>,<?=$key?>)">Hapus</button>

																</td>
															</tr>
														<?php endforeach ?>
													</tbody>
												</table>
											</div>
											<div class="col-md-12">
												<table id="filevidence" class="table">
													<thead>
														<tr>
															<th>Upload Evidence</th>
															<th>Jenis Evidence</th>
															<th><button type="button" onclick="add_upload()" class="form-control btn btn-primary" id="tambahFileUpload">Tambah</button></th>
														</tr>
													</thead>
													
													<tbody id="body_table">
													</tbody>
															
												</table>
											</div>
											<div class="col-md-2">
												<div class="form-group">
													
												</div>
											</div>
										</div>
										<!-- card Body -->
										<div class="card-footer">
											<div class="row">
												<div class="col-md-6">
													<div class="row">
											<div class="col">
												<div class="form-group">
													<a href="<?=base_url('moupks')?>" class="form-control btn btn-secondary"><label for='fc_s_t'>Tutup</label></a>
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

		mouChange()

		$("#postForm").submit(function(event){
	        event.preventDefault(); //prevent default action 
	        var post_url = '<?php echo base_url("moupks/update") ?>'; //get form action url
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
	        		$('.clear').val("")
	        		window.location.replace('<?=base_url("moupks")?>')
	        		// $('#table-front').DataTable().ajax.reload();
	        	}else{
	        		toastr.error(response.message);
	        	} 
	        });

	        
	    });


    })


    var num = 1;
    function mouChange() {
    	console.log('mouchange')
    	$('#body_table').html('');
    	if( $('#radio_ada').is(':checked') ){
    		$('#tahapan').val('').trigger('change')
    		$('.hiden_tahapan').css('display','none');

		}
		else{
	    	$('.hiden_tahapan').css('display','block');
		}

    }

    function tahapanChange() {
		$('#body_table').html('')
    	num=1;
    	add_upload()

    }

    function add_upload() {
    	if( $('#radio_ada').is(':checked') ){
    	var sts = 'ada';
    	var tahapan = "";
		}
		else{
    	var sts = 'proses';
		var tahapan = $('#tahapan').val()
		}
		console.log(tahapan)
		$.get( "<?php echo base_url("mouPks/getEvidence/") ?>"+sts+'/'+num+'/'+tahapan, function( data ) {
			data = JSON.parse(data)
			console.log(data)
			num++
			$('#body_table').append(data.append)
		});
    }

    function delAppend(v) {
    	$('#tr'+v).remove()
    }

     function delEvidence(id,key) {
	        event.preventDefault(); //prevent default action 
    	$.get( "<?=base_url('moupks/deleteEvidence/')?>"+id, function( response ) {
		  	response = JSON.parse(response)
        	if (response.sts == 'success') {
        		toastr.success("Data Sudah Terhapus!");
        		$('#tr_evidence'+key).remove()
        	}else{
        		toastr.error("Data Gagal Dihapus!");
        	} 
		});
    }
	
</script>