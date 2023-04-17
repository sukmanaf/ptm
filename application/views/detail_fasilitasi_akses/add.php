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
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">NIK</label>
									 <select id="nik" name="nik" onchange="nikChange($(this).val())" class="form-control select2" style="width: 100%;">
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
											<select id="keuangan" name="keuangan" class="form-control select2" style="width: 100%;">
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
											<select id="sdm" name="sdm" class="form-control select2" style="width: 100%;">
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
											<select id="produksi" name="produksi" class="form-control select2" style="width: 100%;">
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
											<label for="inovasi_teknologi">inovasi teknologi</label>
											<select id="inovasi_tekno" name="inovasi_tekno" class="form-control select2" style="width: 100%;">
												<option value="Diferensiasi">Diferensiasi</option>
												<option value="Diversifikasi">Diversifikasi</option>
												<option value="Teknologi Tepat Guna">Teknologi Tepat Guna</option>
												<option value="lainnya">Lainnya</option>
											</select>
											<input name="inovasi_tekno_text" id="inovasi_tekno_text" placeholder="Ketik Disini Untuk Tulis Lainnya" style="margin-top: 10px;display: none" type="text" value="" class="form-control">
										</div>
									</div>
					                <div class="col-md-6">
										<div class="form-group">
											<label for="komersialisasi">Komersialisasi</label>
											<select id="komersialisasi" name="komersialisasi" class="form-control select2" style="width: 100%;">
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
							<div class="col-md-4">
								<div class="form-group">
									<label for="akses_pemasaran">Pengembangan Akses Pemasaran</label>
									<input name="akses_pemasaran" id="akses_pemasaran" type="text" value="" class="form-control">
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
			console.log(id)
			console.log($(this).val())
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
	        var post_url = '<?php echo base_url("detail_fasilitasi_akses/create") ?>'; //get form action url
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
	        		setTimeout(function() {
	        			location.reload()
	        		}, 3000);
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
			console.log(data.luas)
			$('#keanggotaan').val(data.keanggotaan)
			$('#sektor_usaha').val(data.sektor_usaha)
			$('#nama_kelompok').val(data.kelompok)
			$('#luas_tanah').val(data.luas)
		});
    }

    
    function loadDt() {
    	$('#table-sarana').DataTable({
		    ajax: {
		        url: '<?php echo base_url('fasilitasi_infrastruktur/get_detail_sarana/').$id;?>',
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

	
	
</script>