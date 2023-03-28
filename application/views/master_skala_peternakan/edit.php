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

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="jenis_usaha">Jenis Usaha</label>
									<input name="jenis_usaha"  id="jenis_usaha" type="text" value="<?=$data['jenis_usaha']?>" class="form-control clear">
								</div>
							</div>

						</div>
						
						<div class="row">
							<fieldset class="border rounded-3 p-3" style="width: 100%">
				              <legend class="float-none w-auto px-3">Skala Usaha </legend>
				              	<div class="row">
					                <div class="col-md-4">
										<div class="form-group">
											<label for="mikro">Mikro</label>
											<input name="mikro" id="mikro" type="text" value="<?=$data['mikro']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-4">
										<div class="form-group">
											<label for="kecil">Kecil</label>
											<input name="kecil" id="kecil" type="text" value="<?=$data['kecil']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-4">
										<div class="form-group">
											<label for="menengah">Menengah</label>
											<input name="menengah" id="menengah" type="text" value="<?=$data['menengah']?>" class="form-control clear">
										</div>
									</div>
				          		</div>
						</div>
						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="keterangan">Keterangan</label>
									<input name="keterangan"  id="keterangan" type="text" value="<?=$data['keterangan']?>" class="form-control clear">
								</div>
							</div>

						</div>
						

						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col">
										<div class="form-group">
											<a href="<?=base_url('master_skala_peternakan')?>" class="form-control btn btn-secondary"><label >Tutup</label></a>
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
	        var post_url = '<?php echo base_url("master_skala_peternakan/update") ?>'; //get form action url
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
	        		window.location.replace('<?= base_url("master_skala_peternakan")?>');
	        		// $('#table-front').DataTable().ajax.reload();
	        	}else{
	        		toastr.error(response.message);
	        	} 
	        });

	        
	    });


    })



    function nikChange(nik) {
	    event.preventDefault(); //prevent default action 
		$.get( "<?php echo base_url("master_skala_peternakan/detailNik/") ?>"+nik, function( data ) {
			data = JSON.parse(data)
			console.log(data.luas)
			$('#keanggotaan').val(data.keanggotaan)
			$('#sektor_usaha').val(data.sektor_usaha)
			$('#nama_kelompok').val(data.kelompok)
			$('#luas_tanah').val(data.luas)
		});
    }
	
</script>