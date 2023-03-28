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
							<div class="col-md-8">
								<div class="form-group">

									<label for="">NIK</label>
									 <select id="nik" name="nik" required onchange="nikChange($(this).val())" class="form-control select2" style="width: 100%;">
									 	<option value="">-- Pilih NIK --</option> 
					                    <?php foreach ($nik as $key => $value): ?>

					                    	<option value="<?=$value->nik?>"><?=$value->nik?> - <?=$value->nama_responden_utama?></option>
					                    <?php endforeach ?>
					                  </select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="nama_kelompok">Nama Kelompok</label>
									<input name="nama_kelompok" readonly="" id="nama_kelompok" type="text" value="" class="form-control clear">
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group">
									<label for="komoditas">Komoditas / Jenis Usaha</label>
									<input name="komoditas" readonly="" id="komoditas" type="text" value="" class="form-control clear">
								</div>
							</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="jenis_pendampingan">Jenis Pendampingan</label>
									<input name="jenis_pendampingan" readonly="" id="jenis_pendampingan" type="text" value="" class="form-control clear">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="keterangan">Keterangan</label>
									<input name="keterangan" id="keterangan" type="text" value="" class="form-control clear">
									
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
														<th>Nama</th>
														<th>Keterangan</th>
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
    	 $('.lampiran').on('change', function(){
    	// var fuUpload = document.getElementById("lampiran1");
    		if(this.files[0].type != 'application/pdf'){
    			toastr.error('Tipe File Salah atau File Rusak!')
    			$(this).val('')
    		}
    	});
    	 loadDt()
		// nikChange($('#nik').val())


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
	        var post_url = '<?php echo base_url("diseminasi/update") ?>'; //get form action url
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
                	$('.clear').val("");
                	$('#table-front').DataTable().ajax.reload();
	        	}else{
	        		toastr.error(response.message);
	        	} 
	        });

	        
	    });


    })



    function nikChange(nik) {
	    // event.preventDefault(); //prevent default action 
		$.get( "<?php echo base_url("diseminasi/detailNik/") ?>"+nik, function( data ) {
			data = JSON.parse(data)
			console.log(data.luas)
			$('#keanggotaan').val(data.keanggotaan)
			$('#sektor_usaha').val(data.sektor_usaha)
			$('#nama_kelompok').val(data.kelompok)
			$('#luas_tanah').val(data.luas)
		});
    }
	 function loadDt() {
    	$('#table-front').DataTable({
		    ajax: {
		        url: '<?php echo base_url('diseminasi/get_detail/').$id;?>',
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
    	$.get( "<?php echo base_url("diseminasi/get_edit/") ?>"+id, function( data ) {
			data = JSON.parse(data)
			// console.log(data)
    		$('#nik').val(data.nik).trigger("change");
    		$('#kapasitas').val(data.kapasitas);
    		$('#keterangan').val(data.keterangan)
    		$('#id').val(id)
		});

    }

    function dels(id) {
	    $.get( "<?php echo base_url("diseminasi/delete/") ?>"+id, function( response ) {
			response = JSON.parse(response)
        	if (response.sts == 'success') {
        		toastr.success("Data Berhasil Dihapus!");
                $('#table-front').DataTable().ajax.reload();
        		
        	}else{
        		toastr.error(response.msg);
        	} 
		});
    }
</script>