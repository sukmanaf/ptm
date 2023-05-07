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
                		<input type="hidden" id="id" name="id" value="">

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for='fc_o'>Nama Kelompok Usaha</label>
									<select required="" class="select2 form-control" name="id_kelompok_usaha" id="id_kelompok_usaha">
										<option value="">-- Pilih Kelompok Usaha --</option>
										<?php foreach ($kelompok_usaha as $key => $value): ?>
											<option value="<?=$value->id?>"><?=$value->nama_kelompok?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for='fc_e'>Nama Anggota</label>
									<select required="" class="select2 form-control" name="nik" id="nik">
										<option value="">-- Pilih Nama Responden Utama --</option>
										<?php foreach ($nik as $key => $value): ?>
											<option value="<?=$value->nik?>"><?=$value->nama_responden_utama?></option>
										<?php endforeach ?>
									</select>
								</div>
							</div>

						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for='fc_o'>Status Anggota</label></br>
									<div class=" d-inline">
										<input  type="radio" <?php if(@$data['status_anggota']=='Aktif'){echo 'checked="checked"';}?>  id="radio_aktif"   checked value="Aktif" name="status_anggota"   />
										<label style="margin-right: 20px" for="radio_aktif">Aktif</label>
									</div>
									<div class="d-inline">
										<input  type="radio" <?php if(@$data['status_anggota']=='Tidak Aktif'){echo 'checked="checked"';}?>  id="radio_tidak_aktif" value="Tidak Aktif" name="status_anggota"  />
										<label for="radio_tidak_aktif">Tidak Aktif</label>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col">
										<div class="form-group">
											<a href="<?=base_url('detail_penguatan_kelembagaan/data/').$id?>" class="form-control btn btn-secondary"><label >Tutup</label></a>
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
						<div class="card-body table-responsive">
					      <div id="table-front_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
					        <table id="table-front" class="table table-hover dataTable no-footer dtr-inline" aria-describedby="table-front_info" style="width: 1038px;">
					          <thead>
					            <tr>
						              
						              <th>No</th>
						              <th>Nama Kelompok</th>
						              <th>Nama Anggota</th>
						              <th>Status Anggota</th>
						              <th style="width: 100px !important">Aksi</th>
					            </tr>
					          </thead>
					        </table>
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
    	loadDt()
    	$('#titleId').html('<?=$title?>')
    	$('.select2').select2()


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
	        var post_url = '<?php echo base_url("detail_penguatan_kelembagaan/create") ?>'; //get form action url
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
	        			// location.reload()
	        		$('#id_kelompok_usaha').val("").trigger('change')
			    	$('#nik').val("").trigger('change')
			    	$('#id').val("")
			    	$('#radio_aktif').attr('checked',true)
                	$('#table-front').DataTable().ajax.reload();

	        	}else{
	        		toastr.error(response.message);
	        	} 
	        });

	        
	    });


    })


  function loadDt() {
    	$('#table-front').DataTable({
		    ajax: {
		        url: '<?php echo base_url();?>detail_penguatan_kelembagaan/get_anggota/<?=$id_targetkk_desa?>',
		        data: function ( d ) {
	                d.<?php echo $this->security->get_csrf_token_name();?> = "<?php echo $this->security->get_csrf_hash();?>"
	            },
		        dataSrc: ''
		    }
		})
    }

     function edits(id) {

    	$.get( "<?php echo base_url("detail_penguatan_kelembagaan/getDetailAnggota/") ?>"+id, function( data ) {
			data = JSON.parse(data)
			console.log(data)
	    	$('#id_kelompok_usaha').val(data.id_kelompok_usaha).trigger('change')
	    	$('#nik').val(data.nik).trigger('change')
	    	$('#id').val(data.id)
	    	if(data.status_anggota == 'Aktif'){
	    		$('#radio_aktif').attr('checked',true)
	    	}else{
	    		$('#radio_tidak_aktif').attr('checked',true)
	    	}

		});
    }

       function dels(id) {
    	$.get( "<?=base_url('detail_penguatan_kelembagaan/delete/')?>"+id, function( response ) {
		  	response = JSON.parse(response)
        	if (response.sts == 'success') {
        		toastr.success("Data Sudah Terhapus!");
                $('#table-front').DataTable().ajax.reload();
        	}else{
        		toastr.error("Data Gagal Dihapus!");
        	} 
		});
    }

	
</script>