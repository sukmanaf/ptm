<div class="row">
	
	<div class="col-md-12" style="display: block;">
		<button onclick="addLk(<?=$id?>)" type="button" class="btn btn-warning " style="float: right;margin-bottom: 10px"><i class="fas fa-plus mr-2 text-white"></i>Baru</button>
	</div>
	<div class="col-md-12">
		<table id="LKtable" class="table table-hover dataTable no-footer dtr-inline" aria-describedby="table-front_info" style="width: 1038px;">
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
	</div>
</div>


<div class="modal" tabindex="-1" id="modalAddLk">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
      </div>
      <div class="modal-body">
 		<form action="#" id="lkFormAdd" class="form-horizontal" enctype="multipart/form-data" method="post">
 			<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
      		<input type="hidden" name="id_targetkk_desa" value="<?=$id?>">
      		<input type="hidden" name="nik" value="<?=$data['nik']?>">
        	<div class="row">
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for='fc_nama_responden_utama'>Provinsi</label>
                        <select class="form-control" name="kode_provinsi">
                        		<option value="<?=substr($data['kode_desa_kelurahan'],0,2)?>"><?=$data['nama_provinsi']?></option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for='fc_nama_responden_utama'>Kabupaten/Kota</label>
                        <select class="form-control" name="kode_kab_kota">
                        		<option value="<?=substr($data['kode_desa_kelurahan'],0,4)?>"><?=$data['nama_kab_kota']?></option>
                        </select>
                    </div>
                </div>
            </div>
      		<div class="row">
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for='desa'>kecamatan</label>
                        <select class="form-control" name="kode_kecamatan">
                        		<option value="<?=substr($data['kode_desa_kelurahan'],0,6)?>"><?=$data['nama_kecamatan']?></option>
                        </select>
                    </div>
                </div>

                <div class="col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for='nik'>Desa/Kelurahan</label></br>
                        <select class="form-control" name="kode_desa_kelurahan">
                        		<option value="<?=substr($data['kode_desa_kelurahan'],0,6)?>"><?=$data['nama_desa_kelurahan']?></option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
            	
                <div class="col-sm-6 col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for='nik'>Alamat</label></br>
                        <textarea class="form-control" id="alamat" name="alamat"></textarea>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3 col-xs-12">
                    <div class="form-group">
                        <label for='lat'>Latitude</label></br>
                        <input name='lat' id='lat'  placeholder='Latitude' type='text' value='' minlength='1' maxlength='100' class="form-control" aria-describedby="inputGroupPrepend" required />
                    </div>
                </div>
                <div class="col-sm-3 col-md-3 col-xs-12">
                    <div class="form-group">
                        <label for='lng'>longitude</label></br>
                        <input name='lng' id='lng'  placeholder='longitude' type='text' value='' minlength='1' maxlength='100' class="form-control" aria-describedby="inputGroupPrepend" required />
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
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
       </form>
    </div>
  </div>
</div>


<div class="modal" tabindex="-1" id="modalEditLk">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
      </div>
      <div class="modal-body">
 		<form action="#" id="lkFormEdit" class="form-horizontal" enctype="multipart/form-data" method="post">
 			<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
      		<input type="hidden" name="xid_targetkk_desa" value="<?=$id?>">
      		<input type="hidden" name="xnik" value="<?=$data['nik']?>">
      		<input type="hidden" id="lkid" name="lkid" value="">
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
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
       </form>
    </div>
  </div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		loadDtLk();

		$("#lkFormAdd").submit(function(event){
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
		        	loadDtLk()
	        		setTimeout(function() {
	        		// 	location.reload()
		        		$('#alamat').html('')
		        		$('#lat').val('')
		        		$('#lng').val('')
		        		$('#modalAddLk').modal('hide')

	        		}, 3000);
	        	}else{
	        		toastr.error(response.message);
	        	} 
	        });

	        
	    });
	    $("#lkFormEdit").submit(function(event){
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
		        	loadDtLk()
	        		setTimeout(function() {
	        		// 	location.reload()
		        		$('#alamat').html('')
		        		$('#lat').val('')
		        		$('#lng').val('')
		        		$('#modalEditLk').modal('hide')

	        		}, 3000);
	        	}else{
	        		toastr.error(response.message);
	        	} 
	        });

	        
	    });
    });

    function loadDtLk() {
        return false
    	$('#LKtable').dataTable().fnClearTable();
    	$('#LKtable').dataTable().fnDestroy();
    	$('#LKtable').DataTable({
		    ajax: {
		        url: '<?php echo base_url("detail_pemsos_responden/get_lk/").$id;?>',
		        data: function ( d ) {
	                d.<?php echo $this->security->get_csrf_token_name();?> = "<?php echo $this->security->get_csrf_hash();?>"
	            },
		        dataSrc: ''
		    }
		})
    }

    function addLk($id) {
    	$('#modalAddLk').modal('show')
    }

    function editLk(kode) {
	    event.preventDefault(); //prevent default action 
		$.get( "<?php echo base_url("detail_pemsos_responden/edit_lk/") ?>"+kode, function( data ) {
			data = JSON.parse(data)
			$('#lkid').val(data.id)
			$('#xalamat').html(data.alamat)
			$('#xlat').val(data.lattitude)
			$('#xlng').val(data.longitude)
    		$('#modalEditLk').modal('show')

			console.log(data)
		});
    }
// 	    var map = L.map('map').setView([51.505, -0.09], 13);

// 	    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
//     maxZoom: 19,
//     attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
// }).addTo(map);
</script>