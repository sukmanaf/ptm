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
									<label for="">Propinsi</label>
									 <select id="prov" name="prov" onchange="provChange($(this).val())"  class="form-control select2" style="width: 100%;">
									 	<option>-- Pilih Provinsi --</option> 
					                    <?php foreach ($prov as $key => $value): ?>
					                    	<option value="<?=$value->kode?>"><?=$value->kode?> - <?=$value->nama_provinsi?></option>
					                    <?php endforeach ?>
					                  </select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Kabupaten/Kota</label>
									 <select id="kabKota" name="kabKota" onchange="kabChange($(this).val())" class="form-control select2" style="width: 100%;">
					                  </select>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Kecamatan</label>
									 <select id="kec" name="kec" onchange="kecChange($(this).val())"  class="form-control select2" style="width: 100%;">
					                  </select>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Desa/Kelurahan</label>
									 <select id="kel" name="kel"  onchange="kelChange($(this).val())"  class="form-control select2" style="width: 100%;">
									 	
					                  </select>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="jml_kk">Jumlah KK</label>
									<input name="jml_kk" id="jml_kk" type="text" value="" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="skala_usaha">Jenis Prasarana</label>
									 <select id="jenis_prasaranan" name="jenis_prasaranan" class="form-control select2" style="width: 100%;">
									 		<option value="Listrik">Listrik</option>
									 		<option value="Air ledeng/ PDAM">Air ledeng/ PDAM</option>
									 		<option value="Sumur Pompa">Sumur Pompa</option>
									 		<option value="Tampungan Air">Tampungan Air</option>
									 		<option value="Drainase">Drainase</option>
									 		<option value="MCK">MCK</option>
									 		<option value="Septictank">Septictank</option>
									 		<option value="Pagar">Pagar</option>
									 		<option value="Telepon/HP">Telepon/HP</option>
									 		<option value="Tempat Sampah">Tempat Sampah</option>
					                  </select>
								</div>
							</div>
						</div>
						<div class="row">
							<fieldset class="border rounded-3 p-3" style="width: 100%">
				              <legend class="float-none w-auto px-3">keberadaan </legend>
				              	<div class="row">
					                <div class="col-md-4">
										<div class="form-group">
											<label for="keberadaan_ada">Ada</label>
											<input name="keberadaan_ada" id="keberadaan_ada" type="text" value="" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-4">
										<div class="form-group">
											<label for="keberadaan_tidak_ada">Tidak Ada</label>
											<input name="keberadaan_tidak_ada" id="keberadaan_tidak_ada" type="text" value="" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-4">
										<div class="form-group">
											<label for="keberadaan_kosong">Kosong</label>
											<input name="keberadaan_kosong" id="keberadaan_kosong" type="text" value="" class="form-control clear">
										</div>
									</div>
				          		</div>
						</div>
						<div class="row">
							<fieldset class="border rounded-3 p-3" style="width: 100%">
				              <legend class="float-none w-auto px-3">kondisi  </legend>
				              	<div class="row">
					                <div class="col-md-3">
										<div class="form-group">
											<label for="kondisi_baik">Baik</label>
											<input name="kondisi_baik" id="kondisi_baik" type="text" value="" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-3">
										<div class="form-group">
											<label for="kondisi_cukup">Cukup</label>
											<input name="kondisi_cukup" id="kondisi_cukup" type="text" value="" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-3">
										<div class="form-group">
											<label for="kondisi_kurang">Kurang</label>
											<input name="kondisi_kurang" id="kondisi_kurang" type="text" value="" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-3">
										<div class="form-group">
											<label for="kondisi_kosong">Kosong</label>
											<input name="kondisi_kosong" id="kondisi_kosong" type="text" value="" class="form-control clear">
										</div>
									</div>
				          		</div>
						</div>

						<div class="row">
							<fieldset class="border rounded-3 p-3" style="width: 100%">
				              <legend class="float-none w-auto px-3">Kepemilikan </legend>
				              	<div class="row">
					                <div class="col-md-4">
										<div class="form-group">
											<label for="kepemilikan_individu">Individu</label>
											<input name="kepemilikan_individu" id="kepemilikan_individu" type="text" value="" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-4">
										<div class="form-group">
											<label for="kepemilikan_komunal">Komunal</label>
											<input name="kepemilikan_komunal" id="kepemilikan_komunal" type="text" value="" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-4">
										<div class="form-group">
											<label for="kepemilikan_lainnya">Lainnya</label>
											<input name="kepemilikan_lainnya" id="kepemilikan_lainnya" type="text" value="" class="form-control clear">
										</div>
									</div>
				          		</div>
						</div>
						<div class="row">
						<div class="row">
							<div class="col-md-12" style="padding:20px">
								<button class="btn btn-success" onclick="addTable()">Tambah </button>
							</div>
						</div>
							<div class="col-md-12">
									<table class="table" style="margin-top: 20px;text-align: center;border: 1px solid gray">
											<thead class="thead-dark">
												<tr>
													<th style="vertical-align: middle;" rowspan="2">No</th>
													<th style="vertical-align: middle;" rowspan="2">Jenis</th>
													<th colspan="3">keberadaan</th>
													<th colspan="4">kondisi</th>
													<th colspan="3">Kepemilikan</th>
													<th rowspan="2" >Aksi</th>
												</tr>
												<tr>
													<th>Ada</th>
													<th>Tidak Ada</th>
													<th>Kosong</th>
													<th>Baik</th>
													<th>Cukup</th>
													<th>Kurang</th>
													<th>Kosong</th>
													<th>Individu</th>
													<th>Komunal</th>
													<th>Lainnya</th>
												</tr>
											</thead>
											<tbody id="tableBody">
													
											</tbody>
									</table>
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

		$("#postForm").submit(function(event){
	        event.preventDefault(); //prevent default action 
	        var post_url = '<?php echo base_url("detail_fasilitasi_infrastruktur/create") ?>'; //get form action url
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

    function provChange(kode) {
	    event.preventDefault(); //prevent default action 
		$.get( "<?php echo base_url("detail_fasilitasi_infrastruktur/getKab/") ?>"+kode, function( data ) {
			data = JSON.parse(data)
			console.log(data)
			$('#kabKota').html(data)
			$('#kec').html('<option>-- Pilih Kecamatan --</option>')
			$('#kel').html('<option>-- Pilih Desa/Kelurahan --</option>')
			$('#jml_kk').val('')


		});
    }
    function kabChange(kode) {
	    event.preventDefault(); //prevent default action 
		$.get( "<?php echo base_url("detail_fasilitasi_infrastruktur/getKec/") ?>"+kode, function( data ) {
			data = JSON.parse(data)
			console.log(data)
			$('#kec').html(data)
			$('#kel').html('<option>-- Pilih Desa/Kelurahan --</option>')
			$('#jml_kk').val('')

		});
    }
    function kecChange(kode) {
	    event.preventDefault(); //prevent default action 
		$.get( "<?php echo base_url("detail_fasilitasi_infrastruktur/getKel/") ?>"+kode, function( data ) {
			data = JSON.parse(data)
			console.log(data)
			$('#kel').html(data)
			$('#jml_kk').val('')

		});
    }
    function kelChange(kode) {
	    event.preventDefault(); //prevent default action 
		// $.get( "<?php echo base_url("detail_fasilitasi_infrastruktur/getKK/") ?>"+kode, function( data ) {
		// 	data = JSON.parse(data)
		// 	console.log(data)
		console.log(kode)
			$('#jml_kk').val(kode)
		// });
    }

    var tab = [];
    var arr_jns = [];
    function addTable() {
	    event.preventDefault(); //prevent default action 
    	var jns =  $('#jenis_prasaranan').val()
    	var a =[]
    	a['jenis_prasaranan']=	$('#jenis_prasaranan').val(),
    	a['keberadaan_ada']=	$('#keberadaan_ada').val(),
		a['keberadaan_tidak_ada']=	$('#keberadaan_tidak_ada').val(),
		a['keberadaan_kosong']=	$('#keberadaan_kosong').val(),
		a['kondisi_baik']=	$('#kondisi_baik').val(),
		a['kondisi_cukup']=	$('#kondisi_cukup').val(),
		a['kondisi_kurang']=	$('#kondisi_kurang').val(),
		a['kondisi_kosong']=	$('#kondisi_kosong').val(),
		a['kepemilikan_komunal']=	$('#kepemilikan_komunal').val(),
		a['kepemilikan_individu']=	$('#kepemilikan_individu').val(),
		a['kepemilikan_lainnya']=	$('#kepemilikan_lainnya').val()
 		// tab[jns] = a;
 		if($.inArray(jns, arr_jns) != -1) {
	        toastr.error("Jenis prasarana "+jns+" Sudah Ada!");
			return false
		} 
	    arr_jns.push(jns);
	 	tab.push(a)

		$('.clear').val('')
    	appendTable()

    	
    }
    function appendTable() {
    	var str = '';
    	$.each(tab,function(i,val){
    	// 	console.log(val)

    	num = i+1
    		str += '<tr><td>'+num+'</td><td>'+val.jenis_prasaranan+'</td><td>'+val.keberadaan_tidak_ada+'</td><td>'+val.keberadaan_ada+'</td><td>'+val.keberadaan_kosong+'</td><td>'+val.kondisi_baik+'</td><td>'+val.kondisi_cukup+'</td><td>'+val.kondisi_kurang+'</td><td>'+val.kondisi_kosong+'</td><td>'+val.kepemilikan_individu+'</td><td>'+val.kepemilikan_komunal+'</td><td>'+val.kepemilikan_lainnya+'</td><td><button type="button" id="edit" onclick="edit(\''+val.jenis_prasaranan+"\',"+i+')" class="btn btn-success hapus"><i class="fas fa-edit"></i></button><button type="button" id="delete" onclick="del(\''+val.jenis_prasaranan+"\',"+i+')" class="btn btn-danger hapus"><i class="fas fa-trash"></i></button></td></tr>';
    	})

    	$('#tableBody').html(str)
    }
    function del(jns,id) {
	    event.preventDefault(); //prevent default action 
    	y = jQuery.grep(arr_jns, function(value) {
		  return value != jns;
		});

    	tab.splice(id,1)
    	appendTable()
    }
    function edit(jns,id) {
	    event.preventDefault(); //prevent default action 
		// console.log(tab[id]);
    	if(tab[id]){
    		// $("#jenis_prasaranan").select2().select2('val',tab[id]['jenis_prasaranan']);
    		// $("#jenis_prasaranan").select2('data', { val:tab[id]['jenis_prasaranan'], text: tab[id]['jenis_prasaranan']});
    		$('#jenis_prasaranan').val(tab[id]['jenis_prasaranan']).trigger("change");
    		$('#keberadaan_ada').val(tab[id]['keberadaan_ada'])
    		$('#keberadaan_kosong').val(tab[id]['keberadaan_kosong'])
    		$('#keberadaan_tidak_ada').val(tab[id]['keberadaan_tidak_ada'])
    		$('#kepemilikan_individu').val(tab[id]['kepemilikan_individu'])
    		$('#kepemilikan_komunal').val(tab[id]['kepemilikan_komunal'])
    		$('#kepemilikan_lainnya').val(tab[id]['kepemilikan_lainnya'])
    		$('#kondisi_baik').val(tab[id]['kondisi_baik'])
    		$('#kondisi_cukup').val(tab[id]['kondisi_cukup'])
    		$('#kondisi_kosong').val(tab[id]['kondisi_kosong'])
    		$('#kondisi_kurang').val(tab[id]['kondisi_kurang'])
    	}
    	y = jQuery.grep(arr_jns, function(value) {
		  return value != jns;
		});

    	tab.splice(id,1)
    	appendTable()
    }
	
</script>