<div class="row">
	
	<div class="col-md-12" style="display: block;">
		<button onclick="addLk(<?=$id?>)" type="button" class="btn btn-warning " style="float: right;margin-bottom: 10px"><i class="fas fa-plus mr-2 text-white"></i>Baru</button>
	</div>
	<div class="col-md-12">
		<table id="dtTable" class="table table-hover dataTable no-footer dtr-inline" aria-describedby="table-front_info" style="width: 1038px;">
		  <thead>
		    <tr>
		          <th>No</th>
		          <th>NIK</th>
		          <th>Kab/Kota</th>
		          <th>Kecamatan</th>
		          <th>Desa/Kelurahan</th>
		          <th>Alamat</th>
		          <th style="width: 100px !important">Aksi</th>
		    </tr>
		  </thead>
		</table>
		<!-- <?php

		echo "<pre>";
		print_r ($data);
		echo "</pre>";
		?> -->
		
	</div>
</div>


<div class="modal" tabindex="-1" id="modalAdd">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Data</h5>
      </div>
      <div class="modal-body">
 		<form action="#" id="FormAdd" class="form-horizontal" enctype="multipart/form-data" method="post">
 			<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
      		<input type="hidden" name="id_targetkk_desa" value="<?=$id?>">
      		<input type="hidden" name="nik" value="<?=$data['nik']?>">
        	<div class="row">
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
						<label for='fc_o'>Status Tanah</label></br>
						<div class=" d-inline">
							<input onchange="stsTanahChange()" type="radio"   id="radio_terdaftar"   checked value="1" name="status_terdafatar"   />
							<label style="margin-right: 20px" for="radio_terdaftar">Terdaftar</label>
						</div>
						<div class="d-inline">
							<input onchange="stsTanahChange()" type="radio"   id="radio_belum_tedaftar" value="0" name="status_terdafatar"  />
							<label for="radio_belum_tedaftar">Belum Tardaftar</label>
						</div>
					</div>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for='fc_nama_responden_utama'>Status Tanah</label>
                        <select class="form-control" name="jns_status_tanah" id="jns_status_tanah">
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
				<fieldset class="border rounded-3 p-3" style="width: 100%">
	              <legend class="float-none " style="font-size: 16px">Nomor Sertipikat Terdaftar yang akan diberdayakan </legend>
	              	<div class="row">
		                <div class="col-md-6">
							<div class="form-group">
								<label for="keberadaan_ada">Nomor</label>
								<input name="keberadaan_ada" id="keberadaan_ada" type="text" value="" maxlength="14" class="numbers form-control clear" >
							</div>
						</div>
		                <div class="col-md-6">
							<div class="form-group">
								<label for="nama">Nama</label>
								<input name="nama" id="nama" type="text" value="" class=" form-control clear" fdprocessedid="cnb7g9">
							</div>
						</div>
	          		</div>
	          		<div class="row">
		                <div class="col-md-4">
							<div class="form-group">
								<label for='fc_o'>Jenis Kelamin</label></br>
								<div class=" d-inline">
									<input  type="radio"   id="laki"   checked value="1" name="jenis_kelamin"   />
									<label style="margin-right: 20px" for="laki">Laki-Laki</label>
								</div>
								<div class="d-inline">
									<input  type="radio"   id="perempuan" value="0" name="jenis_kelamin"  />
									<label for="perempuan">Perempuan</label>
								</div>
							</div>
						</div>
		                <div class="col-md-4">
							<div class="form-group">
								<label for="luas">Luas</label>
								<input name="luas" id="luas" type="text" value="" class="numbers form-control clear" fdprocessedid="cnb7g9">
							</div>
						</div>

		                <div class="col-md-4">
							<div class="form-group">
								<label for='fc_o'>Sertifikat Lainnya</label></br>
								<div class=" d-inline">
									<input  type="radio"   id="sertifikat_lainnya_ada"   checked="checked" value="1" name="sertifikat_lainnya"   />
									<label style="margin-right: 20px" for="sertifikat_lainnya_ada">Ada</label>
								</div>
								<div class="d-inline">
									<input  type="radio"   id="sertifikat_lainnya_tidak" value="0" name="sertifikat_lainnya"  />
									<label for="sertifikat_lainnya_tidak">Tidak Ada</label>
								</div>
							</div>
						</div>
	          		</div>
				</fieldset>

			</div>
		</br>
            <div class="row">
				<fieldset class="border rounded-3 p-3" style="width: 100%">
	              <legend class="float-none " style="font-size: 16px">Nomor sertipikat lainnya (untuk mendata sertipikat lainnya yang dimiliki) </legend>
	                <div id="legend_tanah_lainnya" class="card" style="padding: 10px">
		              	<div class="row">
			                <div class="col-md-3">
								<div class="form-group">
									<label for="keberadaan_ada">Nomor</label>
									<input name="keberadaan_ada" id="keberadaan_ada" type="text" value="" maxlength="14" class="numbers form-control clear" >
								</div>
							</div>
			                <div class="col-md-4">
								<div class="form-group">
									<label for="nama">Nama</label>
									<input name="nama" id="nama" type="text" value="" class=" form-control clear" fdprocessedid="cnb7g9">
								</div>
							</div>

			                <div class="col-md-3">
								<div class="form-group">
									<label for='fc_o'>Jenis Kelamin</label></br>
									<div class=" d-inline">
										<input  type="radio"   id="laki"   checked value="1" name="jenis_kelamin"   />
										<label style="margin-right: 20px" for="laki">Laki-Laki</label>
									</div>
									<div class="d-inline">
										<input  type="radio"   id="perempuan" value="0" name="jenis_kelamin"  />
										<label for="perempuan">Perempuan</label>
									</div>
								</div>
							</div>
			                <div class="col-md-1">
								<div class="form-group">
									<label for="luas">Luas</label>
									<input name="luas" id="luas" type="text" value="" class="numbers form-control clear" fdprocessedid="cnb7g9">
								</div>
							</div>

			                <div class="col-md-1">
			                	<div class="form-group">
									<label for="luas" style="color: white">Luas</label>
			                		<button onclick="appends()" class="btn btn-primary">Tambah</button>
								</div>
			                </div>

		          		</div>
		          		
		            </div>
	              
				</fieldset>
				
			</div>
			<div class="row" style="margin-top: 20px">
                <div class="col-sm-3 col-md-3 col-xs-4">
                    <div class="form-group">
						<label for='fc_o'> Bantuan Administrasi pertanahan</label></br>
						
					</div>
                </div>
                <div class="col-sm-9 col-md-9 col-xs-8">
                	<div class="row">
                		
                    <?php foreach ($bantuan as $key => $value): ?>
                        <div class="col-sm-6 col-md-6 col-xs-12">
							<div class="form-check" style="display: inline;">
							  <input class="form-check-input" type="checkbox" value="<?=$value->kode_bantuan?>" id="bantuan<?=$key?>" name="bantuan[]">
							  <label class="form-check-label" for="bantuan<?=$key?>">
							    <?=$value->deskripsi?>
							  </label>
							</div>
  		                </div>
						<?php endforeach ?>
                	</div>
                </div>
            </div>
			
			<div class="row" style="margin-top: 20px">
                <div class="col-sm-3 col-md-3 col-xs-4">
                    <div class="form-group">
						<label for='fc_o'> Pemanfaatan Lahan</label></br>
					</div>
                </div>
                <div class="col-sm-9 col-md-9 col-xs-8">
                	<div class="row">
                    <?php foreach ($pemanfaatan_lahan as $key => $value): ?>
                        <div class="col-sm-6 col-md-6 col-xs-12">
							<div class="form-check" style="display: inline;">
							  <input class="form-check-input" type="checkbox" value="<?=$value->kode_pemanfaatan_lahan?>" id="pemanfaatan_lahan<?=$key?>" name="pemanfaatan_lahan[]">
							  <label class="form-check-label" for="pemanfaatan_lahan<?=$key?>">
							    <?=$value->deskripsi?>
							  </label>
							</div>
  		                </div>
						<?php endforeach ?>
                	</div>
                </div>
            </div>
			<div class="row" style="margin-top: 20px">
                <div class="col-sm-3 col-md-3 col-xs-4">
                    <div class="form-group">
						<label for='fc_o'> Pengelola Tanah</label></br>
						
					</div>
                </div>
                <div class="col-sm-9 col-md-9 col-xs-8">
                	<div class="row">
                		
                    <?php foreach ($pengelola_tanah as $key => $value): 
                    	$checked = $key==0 ? 'checked':'' ?>

						<?php if ($value->kode_pengelola == 99): ?>
	                        <div class="col-sm-2 col-md-2">
								<div class="form-check" style="display: inline;">
								  <input class="form-check-input" type="radio" onchange="pengelolaChange()" value="<?=$value->kode_pengelola?>" id="pengelola_tanah<?=$key?>" name="pengelola_tanah[]">
								  <label class="form-check-label" for="pengelola_tanah<?=$key?>">
								    <?=$value->deskripsi?>
								  </label>
								</div>
	  		                </div>
	                        <div class="col-sm-3 col-md-3">
								<input type="text" name="orang" readonly id="pengelola_tanah_orang" class="form-control numbers" style="width: 100px;display: inline;">
								<span>Orang</span>
							</div>	  
						<?php else: ?>
							<div class="col-sm-6 col-md-6">
								<div class="form-check" style="display: inline;">
								  <input class="form-check-input" <?=@$checked?> type="radio" onchange="pengelolaChange()" value="<?=$value->kode_pengelola?>" id="pengelola_tanah<?=$value->kode_pengelola?>" name="pengelola_tanah[]">
								  <label class="form-check-label" for="pengelola_tanah<?=$key?>">
								    <?=$value->deskripsi?>
								  </label>
								</div>
	  		                </div>
						<?php endif ?>
						<?php endforeach ?>
                	</div>
                </div>
            </div>
			
        	
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="$('.modal').modal('hide')">Close</button>
        <!-- <button type="submit" >Simpan</button> -->
        <button class="btn btn-primary" onclick="$('#FormAdd').submit()">Simpan</button>
      </div>
       </form>
    </div>
  </div>
</div>


<div class="modal" tabindex="-1" id="modalEdit">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Data</h5>
      </div>
      <div class="modal-body">
 		<form action="#" id="FormEdit" class="form-horizontal" enctype="multipart/form-data" method="post">
 			<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
      		<input type="hidden" name="xid_targetkk_desa" value="<?=$id?>">
      		<input type="hidden" name="xnik" value="<?=$data['nik']?>">
      		<input type="hidden" id="xid" name="lkid" value="">
        	<div class="row">
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for='fc_nama_responden_utama'>Provinsi</label>
                        <select class="form-control" id="xkode_provinsi" name="xkode_provinsi">
                        		<option value="<?=substr($data['kode_desa_kelurahan'],0,2)?>"><?=$data['nama_provinsi']?></option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for='fc_nama_responden_utama'>Kabupaten/Kota</label>
                        <select class="form-control" id="xkode_kab_kota" name="xkode_kab_kota">
                        		<option value="<?=substr($data['kode_desa_kelurahan'],0,4)?>"><?=$data['nama_kab_kota']?></option>
                        </select>
                    </div>
                </div>
            </div>
      		<div class="row">
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for='desa'>kecamatan</label>
                        <select class="form-control" id="xkode_kecamatan" name="xkode_kecamatan">
                        		<option value="<?=substr($data['kode_desa_kelurahan'],0,6)?>"><?=$data['nama_kecamatan']?></option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for='nik'>Desa/Kelurahan</label></br>
                        <select class="form-control" id="xkode_desa_kelurahan" name="xkode_desa_kelurahan">
                        		<option value="<?=substr($data['kode_desa_kelurahan'],0,6)?>"><?=$data['nama_desa_kelurahan']?></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
            	
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for='nik'>Alamat</label></br>
                        <textarea class="form-control" id="xalamat" name="xalamat"></textarea>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3 col-xs-12">
                    <div class="form-group">
                        <label for='lat'>Latitude</label></br>
                        <input name="xlat" id="xlat"  placeholder='Latitude' type='text' value='' minlength='1' maxlength='100' class="form-control" aria-describedby="inputGroupPrepend" required />
                    </div>
                </div>
                <div class="col-sm-3 col-md-3 col-xs-12">
                    <div class="form-group">
                        <label for='lng'>Langitude</label></br>
                        <input name="xlng" id="xlng"  placeholder='longitude' type='text' value='' minlength='1' maxlength='100' class="form-control" aria-describedby="inputGroupPrepend" required />
                    </div>
                </div>
            </div>
            <div class="row">
            	
                <div class="col-sm-12 col-md-12 col-xs-12">
                    <div id="map"></div>
                </div>
              
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="$('.modal').modal('hide')">Close</button>
        <button class="btn btn-primary" onclick="$('#FormEdit').submit()">Simpan</button>
        <!-- <button type="submit" class="btn btn-primary">Simpan</button> -->
      </div>
       </form>
    </div>
  </div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		loadDtLk();
        console.log('lk')

		$("#FormAdd").submit(function(event){
            console.log('simpan')
	        event.preventDefault(); //prevent default action 
	        var post_url = '<?php echo base_url("detail_pemsos_responden/create_lk") ?>'; //get form action url
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
		        	// loadDtLk()
                    $('#dtTable').DataTable().ajax.reload()
	        		// 	location.reload()
		        		$('#alamat').html('')
		        		$('#lat').val('')
		        		$('#lng').val('')
		        		$('.modal').modal('hide')

	        	}else{

	        		toastr.error(response.message);
	        	} 
	        });

	        
	    });
	    $("#FormEdit").submit(function(event){
	        event.preventDefault(); //prevent default action 
	        var post_url = '<?php echo base_url("detail_pemsos_responden/update_lk") ?>'; //get form action url
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
                    $('#dtTable').DataTable().ajax.reload()
	        		$('#alamat').html('')
	        		$('#lat').val('')
	        		$('#lng').val('')
	        		$('.modal').modal('hide')
	        	}else{
	        		toastr.error(response.message);
	        	} 
	        });

	        
	    });
    });

    function loadDtLk() {
        console.log('dt')
    	$('#dtTable').DataTable({
		    ajax: {
		        url: '<?php echo base_url("detail_pemsos_responden/get_lk/").$data['nik'];?>',
		        data: function ( d ) {
	                d.<?php echo $this->security->get_csrf_token_name();?> = "<?php echo $this->security->get_csrf_hash();?>"
	            },
		        dataSrc: ''
		    }
		})
    }

    function addLk($id) {
    	$('#modalAdd').modal('show')
    }

    function editLk(kode) {
	    event.preventDefault(); //prevent default action 
		$.get( "<?php echo base_url("detail_pemsos_responden/edit_lk/") ?>"+kode, function( data ) {
			data = JSON.parse(data)
			$('#xid').val(data.id)
			$('#xalamat').html(data.alamat)
			$('#xlat').val(data.lattitude)
			$('#xlng').val(data.longitude)
    		$('#modalEdit').modal('show')
		});

    }

    function stsTanahChange() {
    	if ($('#radio_terdaftar').is(':checked')) {
    		$('#jns_status_tanah').html('<?=$tanah_terdaftar?>')
    	}else{
    		$('#jns_status_tanah').html('<?=$tanah_belum_terdaftar?>')
    	}

    }
    var num = 1;
    function appends(argument) {
	    event.preventDefault(); //prevent default action 
    	var str = '<div id="divAppend'+num+'" class="row">'+
				    '<div class="col-md-3">'+
						'<div class="form-group">'+
							'<label for="keberadaan_ada">Nomor</label>'+
							'<input name="keberadaan_ada" id="keberadaan_ada[]" type="text" value="" maxlength="14" class="numbers form-control clear" >'+
						'</div>'+
					'</div>'+
				    '<div class="col-md-4">'+
						'<div class="form-group">'+
							'<label for="nama">Nama</label>'+
							'<input name="nama[]" id="nama" type="text" value="" class=" form-control clear" >'+
						'</div>'+
					'</div>'+
				    '<div class="col-md-3">'+
						'<div class="form-group">'+
							'<label for="fc_o">Jenis Kelamin</label></br>'+
							'<div class=" d-inline">'+
								'<input  type="radio"   id="laki"   checked value="1" name="jenis_kelamin[]"   />'+
								'<label style="margin-right: 20px" for="laki">Laki-Laki</label>'+
							'</div>'+
							'<div class="d-inline">'+
								'<input  type="radio"   id="perempuan" value="0" name="jenis_kelamin[]"  />'+
								'<label for="perempuan">Perempuan</label>'+
							'</div>'+
						'</div>'+
					'</div>'+
				    '<div class="col-md-1">'+
						'<div class="form-group">'+
							'<label for="luas">Luas</label>'+
							'<input name="luas[]" id="luas" type="text" value="" class="numbers form-control clear">'+
						'</div>'+
					'</div>'+
				    '<div class="col-md-1">'+
				    	'<div class="form-group">'+
							'<label for="luas" style="color: white">Luas</label>'+
				    		'<button class="btn btn-danger" onclick="delsAppend('+num+')">Hapus</button>'+
						'</div>'+
				    '</div>'+
				'</div>';
			$('#legend_tanah_lainnya').append(str)

    }

	function delsAppend(v) {
		    event.preventDefault(); //prevent default action 
		$('#divAppend'+v).remove()
	}

	function pengelolaChange(argument) {
		if ($('#pengelola_tanah99').is(':checked')) {
			$('#pengelola_tanah_orang').attr('readonly',false)
		}else{
			$('#pengelola_tanah_orang').attr('readonly',true)

		}
	}