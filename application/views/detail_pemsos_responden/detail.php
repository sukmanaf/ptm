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
 						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
 							<div class="card-header">
								<h3 class="card-title"><strong>List Pemetaan Sosial</strong></h3>
		
								<div class="card-tools">
									<a href='<?=base_url('detail_pemsos_responden/data/').$id?>' class="btn btn-warning">
										<i class="fas fa-arrow-left mr-2 text-white"></i>Kembali
									</a>
								</div>
							</div>
							<div class="card-header">
								<div class="row">
									<div class="col-md-6">
										<label>Nama Responden Utama</label>
										<input class="form-control" value="<?=@$data['nama_responden_utama']?>" readonly />
									</div>
									<div class="col-md-6">
										<label>Nomor Induk Kependudukan (NIK)</label>
										<input class="form-control" value="<?=@$data['nik']?>" readonly />
									</div>
								</div>
							</div>
							<div class="card-header">
								<ul id="nav-tabs" class="nav nav-tabs" role="tablist">
									<li class="nav-item" data-tab-content="ar">
										<a class="nav-link active" data-target="#tab_1" onclick="changeContent('lk')" data-toggle="tab">LK. Lokasi</a>
									</li>
									<li class="nav-item" data-tab-content="ar">
										<a class="nav-link" data-target="#tab_2" onclick="changeContent('ar')" data-toggle="tab">AR. Anggota Keluarga</a>
									</li>
									<li class="nav-item" data-tab-content="tn">
										<a class="nav-link" data-target="#tab_3" onclick="changeContent('th')" data-toggle="tab">TN. Tanah dan Hunian</a>
									</li>
									<li class="nav-item" data-tab-content="rm">
										<a class="nav-link" data-target="#tab_4" data-toggle="tab">RM. Hunian</a>
									</li>
									<li class="nav-item" data-tab-content="ik">
										<a class="nav-link" data-target="#tab_5" data-toggle="tab">IK. Indikator Kesejahteraan Keluarga</a>
									</li>
									<li class="nav-item" data-tab-content="pg">
										<a class="nav-link" data-target="#tab_6" data-toggle="tab">PG. Pendapatan dan Pengeluaran Keluarga (Pangan dan Non Pangan)</a>
									</li>
									<li class="nav-item" data-tab-content="pt">
										<a class="nav-link" data-target="#tab_7" data-toggle="tab">PT. Pertanian - Perkebunan</a>
									</li>
									<li class="nav-item" data-tab-content="ptk">
										<a class="nav-link" data-target="#tab_8" data-toggle="tab">PTK. Peternakan</a>
									</li>
									<li class="nav-item" data-tab-content="prb">
										<a class="nav-link" data-target="#tab_9" data-toggle="tab">PRB. Perikanan Budidaya</a>
									</li>
									<li class="nav-item" data-tab-content="pny">
										<a class="nav-link" data-target="#tab_10" data-toggle="tab">PNY. Perikanan Tangkap</a>
									</li>
									<li class="nav-item" data-tab-content="umkm">
										<a class="nav-link" data-target="#tab_11" data-toggle="tab">UKM. Usaha Mikro Kecil dan Menengah (UMKM)</a>
									</li>
									<li class="nav-item" data-tab-content="amd">
										<a class="nav-link" data-target="#tab_12" data-toggle="tab">AMD. Akses Permodalan</a>
									</li>
									<li class="nav-item" data-tab-content="ut">
										<a class="nav-link" data-target="#tab_13" data-toggle="tab">UT. Usaha Tambahan dan Perspektif Kesetaraan Gender</a>
									</li>
									<li class="nav-item" data-tab-content="pd">
										<a class="nav-link" data-target="#tab_15" data-toggle="tab">PD. Kegiatan Pendampingan</a>
									</li>
									<li class="nav-item" data-tab-content="cp">
										<a class="nav-link" data-target="#tab_16" data-toggle="tab">CP. Catatan Pewawancara</a>
									</li>
								</ul>
							</div>
							<div class="card-body">
								<div class="tab-content">
									<div class="row">
										<div class="col-md-12" id="div_content">
											asdddd
										</div>
									</div>
								</div>
							</div>

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
    })


    function loadDt() {
    	$('#table-front').DataTable({
		    ajax: {
		        url: '<?php echo base_url('detail_pemsos/get_upload/').$id;?>',
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
    	$.get( "<?php echo base_url("detail_pemsos/get_edit_upload/") ?>"+id, function( data ) {
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
	    $.get( "<?php echo base_url("detail_pemsos/delete_upload/") ?>"+id, function( response ) {
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
    function changeContent(v) {
    	var arr = []
    	arr['lk'] = `<?=$lk?>`
    	arr['ar'] = `<?=$ar?>`
    	arr['th'] = `<?=$th?>`
    	$('#div_content').html(arr[v])
			
    }

</script>