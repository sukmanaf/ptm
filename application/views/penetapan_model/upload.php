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
                		<input type="hidden" name="id_targetkk" value="<?=@$id?>">
                		<input type="hidden" name="id" id="id" class="clear" value="">

 						
						<div class="row">
							<div class="col-6">
								<div class="form-group">
									<label for='tanggal_sk'>Tanggal penetapan_model</label>
									<div class="input-group date"  data-target-input="nearest">
										<!-- <input name='f' id='fc_f' type='text' value='' class="form-control datetimepicker-input" data-target="#tanggal_sk" />
										<div class="input-group-append" data-target="#tanggal_sk" data-toggle="datetimepicker">
											<div class="input-group-text"><i class="fa fa-calendar"></i></div>
										</div> -->
										<input type="date" id="tanggal_penetapan_model" class="clear form-control" name="tanggal_penetapan_model">
									</div>
									
								</div>
							</div>
							<div class="col-6">
								<div class="form-group">
									<label for='tanggal_sk'>Jenis Evidence</label>
									<div class="input-group date"  data-target-input="nearest">
										<select class="form-control" name="jenis_evidence">
											<option value="surat_udangan">Surat Undangan</option>
											<option value="daftar_hadir">Daftar Hadir</option>
											<option value="notulensi">Notilensi</option>
											<option value="berita_acara">Berita Acara</option>
										</select>										
									</div>
									
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for='file_foto_sk2'>Upload File</label>
									<div class="custom-file">
										<input name='files' id='files' type='file' class="clear " >
										<!-- <label class="custom-file-label" for='files'>Pilih file</label> -->
									</div>
									
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="col-form-label" for="inputSuccess"> 
									</label>
									<button type="button" class="form-control btn btn-default" data-toggle="modal" data-target="#modal-2">
										Lihat File
									</button>
								</div>
							</div>
						</div>

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

						<div class="row">
							<div class="col-md-12">
								<div class="card-body table-responsive">
									<div id="table-sarana_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
			        					<table id="table-front" class="table table-hover dataTable no-footer dtr-inline" aria-describedby="table-sarana_info" style="width: 100%;">
											<thead class="">
												<tr>
													<th>No</th>
													<th>Jenis Evidence</th>
													<th>Tanggal penetapan_model</th>
													<th>Aksi</th>
												</tr>
											</thead>
											<tbody id="tableBody">
													 <!-- <?=@$sarana?>  -->
											</tbody>
										</table>
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

    	$('#files').on('change', function(){
    	// var fuUpload = document.getElementById("lampiran1");
    		if(this.files[0].type != 'image/jpeg' && this.files[0].type != 'image/jpg' && this.files[0].type != 'image/png' && this.files[0].type != 'image/gif' && this.files[0].type != 'application/pdf'){
    			toastr.error('Tipe File Salah atau File Rusak!')
    			$(this).val('')
	    		$('#sk2_prewview').attr('src','');
    		}else{
	    		console.log(URL.createObjectURL(this.files[0]))
	    		var url = URL.createObjectURL(this.files[0]);
	    		$('#sk2_prewview').attr('src',url);

    		}
    	});

    	$('.select2').select2()
    	$('#titleId').html('<?=$title?>')
		loadDt()
		$("#nama_kelompok").keyup(function( event ) {
			checkKelompok()
		})

		$("#postForm").submit(function(event){
	        event.preventDefault(); //prevent default action 
	        var post_url = '<?php echo base_url("penetapan_model/do_upload") ?>'; //get form action url
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
	        		toastr.success("Data Sudah Disimpan!");
    				$('#jenis_sk').val("").trigger('change')
                	clean()

                	$('#table-front').DataTable().ajax.reload();
	        		
	        	}else{
	        		toastr.error(response.msg);
	        	} 
	        });

	        
	    });


    })


    function loadDt() {
    	$('#table-front').DataTable({
		    ajax: {
		        url: '<?php echo base_url('penetapan_model/get_upload/').$id;?>',
		        data: function ( d ) {
	                d.<?php echo $this->security->get_csrf_token_name();?> = "<?php echo $this->security->get_csrf_hash();?>"
	            },
		        dataSrc: '',
		        scrollX: true,"ordering": false,
		        "aoColumnDefs": [
			        { "bSortable": false, "aTargets": [ 0, 1, 2, 3 ] }, 
			        { "bSearchable": false, "aTargets": [ 0, 1, 2, 3 ] }
			    ]
		    }
		})
    }

    function editS(id) {

    	// // console.log(tab[id]);
    	$.get( "<?php echo base_url("penetapan_model/get_edit_upload/") ?>"+id, function( data ) {
			data = JSON.parse(data)
			console.log(data)
    		$('#jenis_evidence').val(data.jenis_evidence).trigger("change");
    		$('#tanggal_penetapan_model').val(data.tanggal_penetapan_model);
    		$('#id').val(id)
		});

    }

    function dels(id) {
	    $.get( "<?php echo base_url("penetapan_model/delete_upload/") ?>"+id, function( response ) {
			response = JSON.parse(response)
        	if (response.sts == 'success') {
        		toastr.success("Data Berhasil Dihapus!");
                $('#table-front').DataTable().ajax.reload();
        	}else{
        		toastr.error(response.msg);
        	} 
		});
    }
    function clean() {
    	$('.clear').val("")
    }

</script>