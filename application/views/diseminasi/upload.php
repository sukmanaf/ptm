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
                		<input type="hidden" name="kode_desa_kelurahan" value="<?=@$id?>">
                		<input type="hidden" name="id" id="id" class="clear" value="">

 						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="nama_kelompok">Jenis Lampiran</label>
									<select id="jenis_lampiran" onchange="clean()" required="" name="jenis_lampiran" class="form-control">
										<option value="">-- Pilih Lampiran --</option>
										<option value="lampiran_1">Lampiran 1</option>
										<option value="lampiran_2">Lampiran 2</option>
										<option value="lampiran_3">Lampiran 3</option>
										<option value="lampiran_4">Lampiran 4</option>
										<option value="laporan_akhir">Laporan Akhir</option>
									</select>
								</div>
							</div>
						</div>
 						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="keanggotaan">Pilih File</label>
									<input name="files" id="keanggotaan" required="" type="file" class="form-control-file clear">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col">
										<div class="form-group">
											<a href="<?=base_url('diseminasi')?>" class="form-control btn btn-secondary"><label >Tutup</label></a>
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
													<th>Nama Lampiran</th>
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

<script type="text/javascript">
    $(document).ready(function(){
    	$('.select2').select2()
    	$('#titleId').html('<?=$title?>')
		loadDt()
		$("#nama_kelompok").keyup(function( event ) {
			checkKelompok()
		})

		$("#postForm").submit(function(event){
	        event.preventDefault(); //prevent default action 
	        var post_url = '<?php echo base_url("diseminasi/do_upload") ?>'; //get form action url
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
    				$('#jenis_lampiran').val("").trigger('change')
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
		        url: '<?php echo base_url('diseminasi/get_upload/').$id;?>',
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
    	$.get( "<?php echo base_url("diseminasi/get_edit_upload/") ?>"+id, function( data ) {
			data = JSON.parse(data)
			// console.log(data)
    		$('#jenis_lampiran').val(data.jenis_lampiran).trigger("change");
    		$('#kapasitas').val(data.kapasitas);
    		$('#akses_pemasaran').val(data.akses_pemasaran);
    		$('#kebutuhan_akses').val(data.kebutuhan_akses);
    		$('#kendala').val(data.kendala);
    		$('#keterangan').val(data.keterangan).trigger("change")
    		$('#id').val(id)
		});

    }

    function dels(id) {
	    $.get( "<?php echo base_url("diseminasi/delete_upload/") ?>"+id, function( response ) {
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