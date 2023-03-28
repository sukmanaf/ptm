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
									 <select id="nik" name="nik" required="" onchange="nikChange($(this).val())" class="form-control select2" style="width: 100%;">
									 	<option>-- Pilih NIK --</option> 
					                    <?php foreach ($nik as $key => $value): ?>
					                    	<?php if ($value->nik == $data['nik']){ $sel = 'selected';}else{$sel = '';} ?>
					                    		
					                    	<option <?=@$sel?> value="<?=$value->nik?>"><?=$value->nik?> - <?=$value->nama_responden_utama?></option>
					                    <?php endforeach ?>
					                  </select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="nama_kelompok">Nama Kelompok</label>
									<input name="nama_kelompok" readonly="" id="nama_kelompok" type="text" value="<?=@$data['nama_kelompok']?>" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="keanggotaan">Keanggotaan Dalam Kelompok</label>
									<input name="keanggotaan" readonly="" id="keanggotaan" type="text" value="<?=@$data['keanggotaan']?>" class="form-control clear">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="sektor_usaha">Sektor Usaha</label>
									<input name="sektor_usaha" readonly="" id="sektor_usaha" type="text" value="<?=@$data['sektor_usaha']?>" class="form-control clear">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="komoditas">Komoditas / Jenis Usaha</label>
									<input name="komoditas" readonly="" id="komoditas" type="text" value="<?=@$data['komoditas']?>" class="form-control clear">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="luas_tanah">Luas Aset Tanah</label>
									<input name="luas_tanah" id="luas_tanah" type="text" value="<?=@$data['luas_tanah']?>" class="form-control clear">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="kapasitas">Kapasitas Penjualan Tahunan (rerata)</label>
									<input name="kapasitas" id="kapasitas" type="text" value="<?=@$data['kapasitas']?>" class="form-control clear">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="akses_pemasaran">Akses Pemasaran</label>
									<input name="akses_pemasaran" id="akses_pemasaran" type="text" value="<?=@$data['akses_pemasaran']?>" class="form-control clear">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="kebutuhan_akses">Kebutuhan Akses </label>
									<input name="kebutuhan_akses" id="kebutuhan_akses" type="text" value="<?=@$data['kebutuhan_akses']?>" class="form-control clear">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="kendala">Kendala</label>
									<input name="kendala" id="kendala" type="text" value="<?=@$data['kendala']?>" class="form-control clear">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="keterangan">Keterangan</label>
									<select class="form-control" id="keterangan" name="keterangan">
											<option value="Target">Target</option>
											<option value="Non Target">Non Target</option>
									</select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col">
										<div class="form-group">
											<a href="<?=base_url('pengembangan')?>" class="form-control btn btn-secondary"><label >Tutup</label></a>
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
															<th>Kapasitas</th>
															<th>Akses Pemasaran</th>
															<th>Kebutuhan Akses</th>
															<th>Kendala</th>
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
    	$('.select2').select2()
    	$('#titleId').html('<?=$title?>')
		loadDt()
		$("#nama_kelompok").keyup(function( event ) {
			checkKelompok()
		})

		$("#postForm").submit(function(event){
	        event.preventDefault(); //prevent default action 
	        var post_url = '<?php echo base_url("pengembangan/update") ?>'; //get form action url
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

                	$('.clear').val("");
                	$('#table-front').DataTable().ajax.reload();
	        		
	        	}else{
	        		toastr.error("Data Gagal Disimpan!");
	        	} 
	        });

	        
	    });


    })

    function nikChange(nik) {
	    // event.preventDefault(); //prevent default action 
	    if(nik != ''){
			$.get( "<?php echo base_url("pengembangan/detailNik/") ?>"+nik, function( data ) {
				data = JSON.parse(data)
				console.log(data.luas)
				$('#keanggotaan').val(data.keanggotaan)
				$('#nama_kelompok').val(data.kelompok)
				$('#sektor_usaha').val(data.sektor_usaha)
				$('#luas_tanah').val(data.luas)
			});
	    }
    }

    function loadDt() {
    	$('#table-front').DataTable({
		    ajax: {
		        url: '<?php echo base_url('pengembangan/get_detail/').$id;?>',
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
    	$.get( "<?php echo base_url("pengembangan/get_edit/") ?>"+id, function( data ) {
			data = JSON.parse(data)
			// console.log(data)
    		$('#nik').val(data.nik).trigger("change");
    		$('#kapasitas').val(data.kapasitas);
    		$('#akses_pemasaran').val(data.akses_pemasaran);
    		$('#kebutuhan_akses').val(data.kebutuhan_akses);
    		$('#kendala').val(data.kendala);
    		$('#keterangan').val(data.keterangan).trigger("change")
    		$('#id').val(id)
		});

    }

    function dels(id) {
	    $.get( "<?php echo base_url("pengembangan/delete/") ?>"+id, function( response ) {
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