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
									                    		<option value="<?=substr($targetKK['kode_desa_kelurahan'],0,2)?>"><?=$targetKK['nama_provinsi']?></option>
									                    </select>
									                </div>
									            </div>
									            <div class="col-sm-6 col-md-6 col-xs-12">
									                <div class="form-group">
									                    <label for='fc_nama_responden_utama'>Kabupaten/Kota</label>
									                    <select class="form-control" id="kode_kab_kota" name="kode_kab_kota">
									                    		<option value="<?=substr($targetKK['kode_desa_kelurahan'],0,4)?>"><?=$targetKK['nama_kab_kota']?></option>
									                    </select>
									                </div>
									            </div>
									        </div>
									  		<div class="row">
									            <div class="col-sm-6 col-md-6 col-xs-12">
									                <div class="form-group">
									                    <label for='desa'>kecamatan</label>
									                    <select class="form-control" id="kode_kecamatan" name="kode_kecamatan">
									                    		<option value="<?=substr($targetKK['kode_desa_kelurahan'],0,6)?>"><?=$targetKK['nama_kecamatan']?></option>
									                    </select>
									                </div>
									            </div>

									            <div class="col-sm-6 col-md-6 col-xs-12">
									                <div class="form-group">
									                    <label for='nik'>Desa/Kelurahan</label></br>
									                    <select class="form-control" id="kode_desa_kelurahan" name="kode_desa_kelurahan">
									                    		<option value="<?=substr($targetKK['kode_desa_kelurahan'],0,6)?>"><?=$targetKK['nama_desa_kelurahan']?></option>
									                    </select>
									                </div>
									            </div>
									        </div>
									  		<div class="row">
									            <div class="col-sm-6 col-md-6 col-xs-12">
									                <div class="form-group">
									                    <label for='desa'>Jenis Pemberdayaan</label>
									                    <select class="form-control" id="xjenis_pemberdayaan" name="xjenis_pemberdayaan">
									                    		<option value="<?=substr($data['id_jenis_pemberdayaan'],0,6)?>"><?=$data['jenis_pemberdayaan']?></option>
									                    </select>
									                </div>
									            </div>
									            <div class="col-sm-6 col-md-6 col-xs-12">
									                <div class="form-group">
									                    <label for='desa'>Jumlah Kuota</label>
									                    <input type="text" name="jml_kuota" class="form-control" readonly="" value="<?=$data['jumlah_target']?>">
									                </div>
									            </div>

									        </div>
				                        </div>
				                    </div>
				                </div>
				            </div>

				           <div class="card-body table-responsive">
				           	<div class="row" style="padding: 10px">
				           		<div class="col-md-12">
				           			<button type="button" style="float: right" class="btn btn-warning pul-right" onclick="btnAdd()"><i class="fa fa-plus"></i>Tambah</button>
				           		</div>
				           			
				           	</div>
						      <div id="table-front_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
						        <table id="table-front" class="table table-hover dataTable no-footer dtr-inline" aria-describedby="table-front_info" style="width: 1038px;">
						          <thead>
						            <tr>
							              
							              <th>No</th>
							              <th>NIK</th>
							              <th>Nama</th>
							              <th style="width: 100px !important">Aksi</th>
						            </tr>
						          </thead>
						        </table>
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



<div class="modal" tabindex="-1" id="AddModal">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Anggota</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	    <form action="#" id="addForm" class="form-horizontal" enctype="multipart/form-data" method="post">
	      <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
          	
    		<input type="hidden" name="id" value="<?=$id?>">
    		<input type="hidden" name="id_targetkk_desa" value="<?=$id_targetkk_desa?>">
    		<input type="hidden" name="tahun_anggaran" value="<?=$targetKK['tahun_anggaran']?>">
    		<input type="hidden" name="target_kk" value="<?=$data['jumlah_target']?>">
            <div class="card-header">
            
        </div>
        <div class="card-body">
        	<div class="row">
	            <div class="col-sm-12 col-md-12 col-xs-12">
	                <div class="form-group">
	                    <label for='desa'>Jenis Pemberdayaan</label>
	                    <select class="form-control" id="jenis_pemberdayaan" name="jenis_pemberdayaan">
	                    		<option value="<?=substr($data['id_jenis_pemberdayaan'],0,6)?>"><?=$data['jenis_pemberdayaan']?></option>
	                    </select>
	                </div>
	            </div>

	        </div>
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12">
                    <div class="form-group">
                        <label for='nama_instaseksi_kode'>NIK:</label>
                      <select name='nik' id='nik' class="form-control select2 custom-select w-100">
									</select>
                            
                        </div>
                    </div>
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

		$("#addForm").submit(function(event){
	        event.preventDefault(); //prevent default action 
	        var post_url = '<?php echo base_url("detail_penetapan_model/create_anggota") ?>'; //get form action url
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
	        			loadDt()
    				$('#nik').html('<?=$responden?>')

	        		// setTimeout(function() {
	        		// 	// location.reload()
	        		// 	$('#AddModal').modal('hide')
	        		// }, 3000);
	        	}else{
	        		toastr.error(response.message);
	        	} 
	        });

	        
	    });


		loadDt();
    });

    function loadDt() {

      $('#table-front').dataTable().fnClearTable();
      $('#table-front').dataTable().fnDestroy();
    	$('#table-front').DataTable({
		    ajax: {
		        url: '<?php echo base_url("detail_penetapan_model/get_list_anggota_pemberdayaan/").$id;?>',
		        data: function ( d ) {
	                d.<?php echo $this->security->get_csrf_token_name();?> = "<?php echo $this->security->get_csrf_hash();?>"
	            },
		        dataSrc: ''
		    }
		})
    }


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
    	$.get( "<?php echo base_url("detail_penetapan_model/delete_anggota/") ?>"+v, function( data ) {
			data = JSON.parse(data)
			if (data.sts == 'success') {
	        		toastr.success('Anggota Berhasil Dihapus!');
	        			loadDt()
	        	}else{
	        		toastr.error('Anggota Berhasil Dihapus!');
	        	} 
		});
    }

    function btnAdd() {
	    event.preventDefault(); //prevent default action 
	    // console.log('<?=$responden?>')
    	$('#nik').html('<?=$responden?>')
    	$('.select2').select2()
    	$('#AddModal').modal('show')
    }
	
</script>