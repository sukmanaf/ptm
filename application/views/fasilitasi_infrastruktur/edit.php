<style type="text/css">
	
.spy{
	display: none;


}

.dataTables_filter {
display: none;
}
.sortin {
display: none !important;
}

</style>
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
                		<input type="hidden" class="clear" name="id" id="id" value="">
                		<input type="hidden" class="clear" name="sarana_prasarana" id="sarana_prasarana" value="sarana">

						

						<div class="row">
							<!-- <div class="col-md-6">
								<div class="form-group">
									<label for="jml_kk">Jumlah KK</label>
									<input name="jml_kk" id="jml_kk" type="text" value="" class="form-control">
								</div>
							</div> -->
							<div class="col-md-6">
								<div class="form-group">
									<label for="skala_usaha">Jenis Prasarana dan Prasarana</label>
									 <select id="jenis_prasarana" name="jenis_prasarana" onchange="changeJenis()" class="form-control select2" style="width: 100%;">
									 		<option class="sarana" value="Listrik">Listrik</option>
									 		<option class="sarana" value="Air ledeng/ PDAM">Air ledeng/ PDAM</option>
									 		<option class="sarana" value="Sumur Pompa">Sumur Pompa</option>
									 		<option class="sarana" value="Tampungan Air">Tampungan Air</option>
									 		<option class="sarana" value="Drainase">Drainase</option>
									 		<option class="sarana" value="MCK">MCK</option>
									 		<option class="sarana" value="Septictank">Septictank</option>
									 		<option class="sarana" value="Pagar">Pagar</option>
									 		<option class="sarana" value="Telepon/HP">Telepon/HP</option>
									 		<option class="sarana" value="Tempat Sampah">Tempat Sampah</option>
									 		<option class="prasarana" value="Irigasi">Irigasi</option>
									 		<option class="prasarana" value="Jalan (Jalur Distribusi)">Jalan (Jalur Distribusi)</option>
									 		<option class="prasarana" value="Komunikasi (Internet)">Komunikasi (Internet)</option>
									 		<option class="prasarana" value="Persampahan">Persampahan</option>
									 		<option class="prasarana" value="Sumber Daya Air">Sumber Daya Air</option>
									 		<option class="prasarana" value="Embung Air">Embung Air</option>
									 		<option class="prasarana" value="Sarana Pertanian">Sarana Pertanian</option>
									 		<option class="prasarana" value="Sarana Peternakan">Sarana Peternakan</option>
									 		<option class="prasarana" value="Sarana Perikanan">Sarana Perikanan</option>
									 		<option class="prasarana" value="Sarana Perdagangan">Sarana Perdagangan</option>
									 		<option class="prasarana" value="Lainnya">Lainnya</option>
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
											<input name="keberadaan_ada"   id="keberadaan_ada" type="number" value="" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-4">
										<div class="form-group">
											<label for="keberadaan_tidak_ada">Tidak Ada</label>
											<input name="keberadaan_tidak_ada" id="keberadaan_tidak_ada" type="number" value="" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-4">
										<div class="form-group c-sarana">
											<label for="keberadaan_kosong">Kosong</label>
											<input name="keberadaan_kosong" id="keberadaan_kosong" type="number" value="" class="form-control clear">
										</div>
										<div class="form-group c-prasarana spy">
											<label for="keberadaan_keterangan">Keterangan</label>
											<input name="keberadaan_keterangan" id="keberadaan_keterangan" type="text" value="" class="form-control clear">
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
											<input name="kondisi_baik" id="kondisi_baik" type="number" value="" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-3">
										<div class="form-group">
											<label for="kondisi_cukup">Cukup</label>
											<input name="kondisi_cukup" id="kondisi_cukup" type="number" value="" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-3">
										<div class="form-group">
											<label for="kondisi_kurang">Kurang</label>
											<input name="kondisi_kurang" id="kondisi_kurang" type="number" value="" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-3">
										<div class="form-group c-sarana" >
											<label for="kondisi_kosong">Kosong</label>
											<input name="kondisi_kosong" id="kondisi_kosong" type="number" value="" class="form-control clear">
										</div>
										<div class="form-group c-prasarana spy">
											<label for="kondisi_keterangan">Keterangan</label>
											<input name="kondisi_keterangan" id="kondisi_keterangan" type="text" value="" class="form-control clear">
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
											<input name="kepemilikan_individu" id="kepemilikan_individu" type="number" value="" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-4">
										<div class="form-group">
											<label for="kepemilikan_komunal">Komunal</label>
											<input name="kepemilikan_komunal" id="kepemilikan_komunal" type="number" value="" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-4">
										<div class="form-group">
											<label for="kepemilikan_lainnya">Lainnya</label>
											<input name="kepemilikan_lainnya" id="kepemilikan_lainnya" type="number" value="" class="form-control clear">
										</div>
									</div>
				          		</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col">
										<div class="form-group">
											<a href="<?=base_url('fasilitasi_insfrastruktur')?>" class="form-control btn btn-secondary"><label >Tutup</label></a>
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
										<h3>Sarana</h3>
			        					<table id="table-sarana" class="table table-hover dataTable no-footer dtr-inline" aria-describedby="table-sarana_info" style="width: 100%;">

													<thead class="">
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
															 <!-- <?=@$sarana?>  -->
													</tbody>
											</table>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<hr>
								<div class="card-body table-responsive">
									<div id="table-sarana_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
			        					<h3>Prasarana</h3>

			        					<table id="table-prasarana" class="table table-hover dataTable no-footer dtr-inline" aria-describedby="table-sarana_info" style="width: 100%;">

													<thead class="">
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
															<th>Ket</th>
															<th>Baik</th>
															<th>Cukup</th>
															<th>Kurang</th>
															<th>ket</th>
															<th>Individu</th>
															<th>Komunal</th>
															<th>Lainnya</th>
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
	var MyData = {};
	
    $(document).ready(function(){
    	loadDt()
    	loadDtPrasarana()

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
	

			// console.log(jsontab)
	        var post_url = '<?php echo base_url("fasilitasi_insfrastruktur/update") ?>'; //get form action url
	        var request_method = $(this).attr("method"); //get form GET/POST method
	        var form_data = new FormData(this); //Encode form elements for submission
	        // form_data.append('data', jsontab)
	        
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
					$('.clear').val('')
                	$('#table-sarana').DataTable().ajax.reload();
                	$('#table-prasarana').DataTable().ajax.reload();

	        	}else{
	        		toastr.error(response.msg);
	        	} 
	        });

	        
	    });


    })

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

    function loadDtPrasarana() {
    	$('#table-prasarana').DataTable({
		    ajax: {
		        url: '<?php echo base_url('fasilitasi_infrastruktur/get_detail_prasarana/').$id;?>',
		        data: function ( d ) {
	                d.<?php echo $this->security->get_csrf_token_name();?> = "<?php echo $this->security->get_csrf_hash();?>"
	            },
		        dataSrc: '',
		        scrollX: true,
		        "lengthChange": false
		    }
		})
    }

    function provChange(kode) {
	    event.preventDefault(); //prevent default action 
		$.get( "<?php echo base_url("fasilitasi_insfrastruktur/getKab/") ?>"+kode, function( data ) {
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
		$.get( "<?php echo base_url("fasilitasi_insfrastruktur/getKec/") ?>"+kode, function( data ) {
			data = JSON.parse(data)
			console.log(data)
			$('#kec').html(data)
			$('#kel').html('<option>-- Pilih Desa/Kelurahan --</option>')
			$('#jml_kk').val('')

		});
    }
    function kecChange(kode) {
	    event.preventDefault(); //prevent default action 
		$.get( "<?php echo base_url("fasilitasi_insfrastruktur/getKel/") ?>"+kode, function( data ) {
			data = JSON.parse(data)
			console.log(data)
			$('#kel').html(data)
			$('#jml_kk').val('')

		});
    }
    function kelChange(kode) {
	    event.preventDefault(); //prevent default action 
		// $.get( "<?php echo base_url("fasilitasi_insfrastruktur/getKK/") ?>"+kode, function( data ) {
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
    	var jns =  $('#jenis_prasarana').val()
    	var a =[]
    	a['jenis_prasarana']=	$('#jenis_prasarana').val(),
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
	 	tab.push(a)
		console.log(tab[0])
		var jsontab = JSON.stringify(tab);
		console.log(jsontab)




 		// tab[jns] = a;
 		if($.inArray(jns, arr_jns) != -1) {
	        toastr.error("Jenis prasarana "+jns+" Sudah Ada!");
			return false
		} 
	    arr_jns.push(jns);
	 	MyData.tab=tab;

		$('.clear').val('')
    	appendTable()

    	
    }
    function appendTable() {
    	var str = '';
    	$.each(tab,function(i,val){
    	// 	console.log(val)

    	num = i+1
    		str += '<tr><td>'+num+'</td><td>'+val.jenis_prasarana+'</td><td>'+val.keberadaan_tidak_ada+'</td><td>'+val.keberadaan_ada+'</td><td>'+val.keberadaan_kosong+'</td><td>'+val.kondisi_baik+'</td><td>'+val.kondisi_cukup+'</td><td>'+val.kondisi_kurang+'</td><td>'+val.kondisi_kosong+'</td><td>'+val.kepemilikan_individu+'</td><td>'+val.kepemilikan_komunal+'</td><td>'+val.kepemilikan_lainnya+'</td><td><button type="button" id="edit" onclick="edit(\''+val.jenis_prasarana+"\',"+i+')" class="btn btn-success hapus"><i class="fas fa-edit"></i></button><button type="button" id="delete" onclick="del(\''+val.jenis_prasarana+"\',"+i+')" class="btn btn-danger hapus"><i class="fas fa-trash"></i></button></td></tr>';
    	})

    	$('#tableBody').html(str)
    }
    function dels(id) {
	    $.get( "<?php echo base_url("fasilitasi_insfrastruktur/delete/") ?>"+id, function( response ) {
			response = JSON.parse(response)
        	if (response.sts == 'success') {
        		toastr.success("Data Berhasil Dihapus!");
                $('#table-sarana').DataTable().ajax.reload();
        		
        	}else{
        		toastr.error(response.msg);
        	} 
		});
    }
    function editSarana(row,id) {
    	console.log(id)
    	var data =  $('#table-sarana').DataTable().row(row).data()
	    event.preventDefault(); //prevent default action 
    	changeJenis()
		// console.log(tab[id]);
    		$('#jenis_prasarana').val(data[1]).trigger("change");
    		$('#keberadaan_ada').val(data[2])
    		$('#keberadaan_tidak_ada').val(data[3])
    		$('#keberadaan_kosong').val(data[4])
    		$('#kondisi_baik').val(data[5])
    		$('#kondisi_cukup').val(data[6])
    		$('#kondisi_kurang').val(data[7])
    		$('#kondisi_kosong').val(data[8])
    		$('#kepemilikan_individu').val(data[9])
    		$('#kepemilikan_komunal').val(data[10])
    		$('#kepemilikan_lainnya').val(data[11])
    		$('#id').val(id)
    	
  //   	y = jQuery.grep(arr_jns, function(value) {
		//   return value != jns;
		// });

    	// tab.splice(id,1)
    	// appendTable()
    }

    function editPrasarana(row,id) {
    	var data =  $('#table-prasarana').DataTable().row(row).data()
    	console.log(data)
	    event.preventDefault(); //prevent default action 
    	changeJenis()
		// console.log(tab[id]);
    		$('#jenis_prasarana').val(data[1]).trigger("change");
    		$('#keberadaan_ada').val(data[2])
    		$('#keberadaan_tidak_ada').val(data[3])
    		$('#keberadaan_keterangan').val(data[4])
    		$('#kondisi_baik').val(data[5])
    		$('#kondisi_cukup').val(data[6])
    		$('#kondisi_kurang').val(data[7])
    		$('#kondisi_keterangan').val(data[8])
    		$('#kepemilikan_individu').val(data[9])
    		$('#kepemilikan_komunal').val(data[10])
    		$('#kepemilikan_lainnya').val(data[11])
    		$('#id').val(id)
    	
  //   	y = jQuery.grep(arr_jns, function(value) {
		//   return value != jns;
		// });

    	// tab.splice(id,1)
    	// appendTable()
    }

    function changeJenis() {
    	var option = $('#jenis_prasarana :selected').attr('class')
    	console.log(option)
		$('.clear').val('')
    	if (option == 'sarana') {
    		$('.c-sarana').removeClass('spy')
    		$('.c-prasarana').addClass('spy')
    		$('#keberadaan_keterangan').val('')
    		$('#kondisi_keterangan').val('')
    		$('#sarana_prasarana').val('sarana')
    	}else{
    		$('.c-prasarana').removeClass('spy')
    		$('.c-sarana').addClass('spy')
    		$('#keberadaan_kosong').val('')
    		$('#kondisi_kosong').val('')
    		$('#sarana_prasarana').val('prasarana')
    	}
    }
	
</script>