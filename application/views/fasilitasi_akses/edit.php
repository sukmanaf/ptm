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
                		<input type="hidden" name="kode_desa_kelurahan" id="kode_desa_kelurahan" value="<?=@$id?>">
                		<input type="hidden" class="clear" name="id" id="id" value="">

						
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">NIK</label>
									 <select id="nik" name="nik" required="" onchange="nikChange($(this).val())" class="form-control select2" style="width: 100%;">
									 	<option>-- Pilih NIK --</option> 
					                    <?php foreach ($nik as $key => $value): ?>
					                    	<option value="<?=$value->nik?>"><?=$value->nik?> - <?=$value->nama_responden_utama?></option>
					                    <?php endforeach ?>
					                  </select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-4">
								<div class="form-group">
									<label for="nama_kelompok">Nama Kelompok</label>
									<input name="nama_kelompok" id="nama_kelompok" type="text" value="" class="form-control">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="skala_usaha">Skala Usaha</label>
									<input name="skala_usaha"  id="skala_usaha" type="text" value="" class="form-control">
								</div>
							</div>
							<div class="col-md-4">
								<div class="form-group">
									<label for="komoditas">Komoditas / Jenis Usaha</label>
									<input name="komoditas" id="komoditas" type="text" value="" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<fieldset class="border rounded-3 p-3" style="width: 100%">
				              <legend class="float-none w-auto px-3">Pengembangan Manajemen Bisnis</legend>
				              	<div class="row">
					                <div class="col-md-4">
										<div class="form-group">
											<label for="keuangan">Keuangan</label>
											<select required="" id="keuangan" name="keuangan" class="form-control select2" style="width: 100%;">
												<option value="">-- Pilih keuangan--</option>
												<option value="Permodalan">Permodalan</option>
												<option value="Perencanaan Anggaran">Perencanaan Anggaran</option>
												<option value="Pelaporan Keuangan">Pelaporan Keuangan</option>
												<option value="lainnya">Lainnya</option>
											</select>
											<input name="keuangan_text" id="keuangan_text" type="text" placeholder="Ketik Disini Untuk Tulis Lainnya" style="margin-top: 10px;display: none"  value="" class="form-control">
										</div>
									</div>
					                <div class="col-md-4">
										<div class="form-group">
											<label for="sam">SDM</label>
											<select required="" id="sdm" name="sdm" class="form-control select2" style="width: 100%;">
												<option value="">-- Pilih SDM--</option>
												<option value="Kualifikasi SDM">Kualifikasi SDM</option>
												<option value="Distribusi SDM">Distribusi SDM</option>
												<option value="Pelatihan">Pelatihan</option>
												<option value="lainnya">Lainnya</option>
											</select>
											<input name="sdm_text" id="sdm_text" placeholder="Ketik Disini Untuk Tulis Lainnya" style="margin-top: 10px;display: none" type="text" value="" class="form-control">
										</div>
									</div>
					                <div class="col-md-4">
										<div class="form-group">
											<label for="produksi">Produksi</label>
											<select required="" id="produksi" name="produksi" class="form-control select2" style="width: 100%;">
												<option value="">-- Pilih Produksi--</option>
												<option value="Kapasitas Produksi">Kapasitas Produksi</option>
												<option value="Metode">Metode</option>
												<option value="Alat dan Bahan">Alat dan Bahan</option>
												<option value="Standar Kerja">Standar Kerja</option>
												<option value="lainnya">Lainnya</option>
											</select>
											<input name="produksi_text" id="produksi_text" placeholder="Ketik Disini Untuk Tulis Lainnya" style="margin-top: 10px;display: none" type="text" value="" class="form-control">
										</div>
									</div>
				          		</div>
				            </fieldset>
						</div>
						<div class="row">
							<fieldset class="border rounded-3 p-3" style="width: 100%">
				              <legend class="float-none w-auto px-3">pengembangan produk</legend>
				              	<div class="row">
					                <div class="col-md-6">
										<div class="form-group">
											<label for="inovasiteknologi">Inovasi Teknologi</label>
											<select required="" id="inovasitekno" name="inovasitekno" class="form-control select2" style="width: 100%;">
												<option value="">-- Pilih Inovasi Teknologi--</option>
												<option value="Diferensiasi">Diferensiasi</option>
												<option value="Diversifikasi">Diversifikasi</option>
												<option value="Teknologi Tepat Guna">Teknologi Tepat Guna</option>
												<option value="lainnya">Lainnya</option>
											</select>
											<input name="inovasitekno_text" id="inovasitekno_text" placeholder="Ketik Disini Untuk Tulis Lainnya" style="margin-top: 10px;display: none" type="text" value="" class="form-control">
										</div>
									</div>
					                <div class="col-md-6">
										<div class="form-group">
											<label for="komersialisasi">Komersialisasi</label>
											<select required="" id="komersialisasi" name="komersialisasi" class="form-control select2" style="width: 100%;">
												<option value="">-- Pilih Komersialisasi--</option>
												<option value="Label">Label</option>
												<option value="Kemasan/Packaging">Kemasan/Packaging</option>
												<option value="Branding">Branding</option>
												<option value="Perijinan">Perijinan</option>
												<option value="Sertifikasi (Halal, BPOM, dsb)">Sertifikasi (Halal, BPOM, dsb)</option>
												<option value="lainnya">Lainnya</option>
											</select>
											<input name="komersialisasi_text" id="komersialisasi_text" placeholder="Ketik Disini Untuk Tulis Lainnya" style="margin-top: 10px;display: none" type="text" value="" class="form-control">
										</div>
									</div>
				          		</div>
				            </fieldset>
						</div>

<!-- 
						<div class="row">
							<fieldset class="border rounded-3 p-3" style="width: 100%">
				              <legend class="float-none w-auto px-3">jenis usaha </legend>
				              	<div class="row">
					                <div class="col-md-4">
										<div class="form-group">
											<label for="sektor_usaha">Micro</label>
											<input name="sektor_usaha" id="sektor_usaha" type="text" value="" class="form-control">
										</div>
									</div>
					                <div class="col-md-4">
										<div class="form-group">
											<label for="sektor_usaha">Kecil</label>
											<input name="sektor_usaha" id="sektor_usaha" type="text" value="" class="form-control">
										</div>
									</div>
					                <div class="col-md-4">
										<div class="form-group">
											<label for="sektor_usaha">Menengah</label>
											<input name="sektor_usaha" id="sektor_usaha" type="text" value="" class="form-control">
										</div>
									</div>
				          		</div>
				            </fieldset>
						</div>
 -->

						<div class="row" >

							<div class="col-md-4">
								<div class="form-group">
									<label for="">Pengembangan Akses Pemasaran</label>
									<div class="row">
					                <div class="col-md-1"></div>
										<div class="form-check col-md-3">
										  <label class="form-check-label">
										    <input type="radio" class="form-check-input" checked="" value="1" name="p_akses_pemasaran">Online
										  </label>
										</div>
										<div class="form-check col-md-3">
										  <label class="form-check-label">
										    <input type="radio" class="form-check-input" value="0" name="p_akses_pemasaran">Offline
										  </label>
										</div>
									</div>
								</div>
							</div>
							<!-- <div class="col-md-4">
								<div class="form-group">
									<label for="akses_pemasaran">Pengembangan Akses Pemasaran</label>
									<input name="akses_pemasaran" id="akses_pemasaran" type="text" value="" class="form-control">
								</div>
							</div>
 -->
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col">
										<div class="form-group">
											<a href="<?=base_url('fasilitasi_akses')?>" class="form-control btn btn-secondary"><label >Tutup</label></a>
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
															<th>Nik</th>
															<th>Nama</th>
															<th>Keuangan</th>
															<th>SDM</th>
															<th>Produksi</th>
															<th>Inovasi Tekno</th>
															<th>Komersialisasi</th>
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
    	loadDt()
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

		$(".select2").change(function( event ) {
			var id = "#"+$(this)[0].id+"_text";
			if ($(this).val() == 'lainnya') {
				$(id).css("display", "block")
				console.log('if')
			}else{
				$(id).val("")
				$(id).css("display", "none")
			}
		})


		$("#postForm").submit(function(event){
	        event.preventDefault(); //prevent default action 
	        var post_url = '<?php echo base_url("fasilitasi_akses/update") ?>'; //get form action url
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
                	$('#table-front').DataTable().ajax.reload();
                	$('.clear').val("");
                	$('.select2').val("").trigger("change");
	        		// setTimeout(function() {
	        		// 	location.reload()
	        		// }, 3000);
	        	}else{
	        		toastr.error("Data Gagal Disimpan!");
	        	} 
	        });

	        
	    });


    })

     function nikChange(nik) {
	    event.preventDefault(); //prevent default action 
		$.get( "<?php echo base_url("pengembangan/detailNik/") ?>"+nik, function( data ) {
			data = JSON.parse(data)
			// console.log(data.luas)
			$('#keanggotaan').val(data.keanggotaan)
			$('#sektor_usaha').val(data.sektor_usaha)
			$('#nama_kelompok').val(data.kelompok)
			$('#luas_tanah').val(data.luas)
		});
    }


    function loadDt() {
    	$('#table-front').DataTable({
		    ajax: {
		        url: '<?php echo base_url('fasilitasi_akses/get_detail/').$id;?>',
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
    	$.get( "<?php echo base_url("fasilitasi_akses/get_edit/") ?>"+id, function( data ) {
			data = JSON.parse(data)
			// console.log(data)
    		$('#nik').val(data.nik).trigger("change");
    		$('#keuangan').val(data.keuangan).trigger("change");
    		$('#sdm').val(data.sdm).trigger("change");
    		$('#produksi').val(data.produksi).trigger("change");
    		$('#inovasitekno').val(data.inovasitekno).trigger("change");
    		$('#komersialisasi').val(data.komersialisasi).trigger("change");
    		if(data.keuangan == 'lainnya'){
    			$('#keuangan_text').val(data.keuangan_lainnya)
    		}
    		if(data.sdm == 'lainnya'){
    			$('#sdm_text').val(data.sdm_lainnya)
    		}
    		if(data.produksi == 'lainnya'){
    			$('#produksi_text').val(data.produksi_lainnya)
    		}
    		if(data.inovasitekno == 'lainnya'){
    			$('#inovasitekno_text').val(data.inovasitekno_lainnya)
    		}
    		if(data.komersialisasi == 'lainnya'){
    			$('#komersialisasi_text').val(data.komersialisasi_lainnya)
    		}
    		$('#id').val(id)
		});

    }

    function dels(id) {
	    $.get( "<?php echo base_url("fasilitasi_akses/delete/") ?>"+id, function( response ) {
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