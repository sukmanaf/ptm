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
	    <div class="card-header">
	      <div class="card-tools">
<!-- 	      	      <a  style="float: right" href="<?=base_url('pemetaan_sosial/add')?>" class="btn btn-warning pull-right">
	        <i class="fas fa-plus mr-2 text-white"></i>Baru </a>
 -->	        <div class="input-group input-group-sm">
	          <div class="input-group-append"></div>
	        </div>
	      </div>
	    </div>

	    <div style="padding: 20px">
	    </div>
	    <div class="card-body table-responsive">
	      <div id="table-front_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
	        <table id="table-front" class="table table-hover dataTable no-footer dtr-inline" aria-describedby="table-front_info" style="width: 1038px;">
	          <thead>
	            <tr>
		              
		              <th>No</th>
		              <th>Provinsi</th>
		              <th>Kab Kota</th>
		              <th>Tahun</th>
		              <th>Target KK</th>
		              <th>Anggaran</th>
		              <th>Realisasi</th>
		              <th style="width: 100px !important">Aksi</th>
	            </tr>
	          </thead>
	        </table>
	    </div>
	  </div>
	</div>
</section>

<div class="modal" tabindex="-1" id="modalRealisasi">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Realisasi</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
 		<form action="#" id="postForm" class="form-horizontal" enctype="multipart/form-data" method="post">
 			<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
        	<div class="row">
        		<div class="col-md-12">
					<div class="form-group">
						<label for='nama_kab_kota'>Kabupaten/Kota</label>
						<input type="text" readonly name="nama_kab_kota" id="nama_kab_kota" class="form-control">
						<input type="hidden" name="kode_kab_kota" id="kode_kab_kota" class="form-control">
					</div>
        		</div>
        		<div class="col-md-12">
					<div class="form-group">
						<label for='tahun_anggaran'>Tahun Anggaran</label>
						<input type="text" readonly name="tahun_anggaran" id="tahun_anggaran" class="form-control">
					</div>
        		<div class="col-md-12">
					<div class="form-group">
						<label for='anggaran'>Anggaran</label>
						<input type="text" readonly name="anggaran" id="anggaran" class="form-control">
					</div>
        		</div>
        		<div class="col-md-12">
					<div class="form-group">
						<label for='realisasi_pemsos'>Realisasi</label>
						<input type="text" name="realisasi_pemsos" required onkeyup ="realisasiChange($(this).val())" id="realisasi_pemsos" class="numbers form-control">
					</div>
        		</div>
        	</div>	

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="$('.modal').modal('hide')">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">

    $(document).ready(function(){
		loadDt();

			$("#postForm").submit(function(event){
	        event.preventDefault(); //prevent default action 
	        var post_url = '<?php echo base_url("pemetaan_sosial/edit_realisasi") ?>'; //get form action url
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
                	$('#table-front').DataTable().ajax.reload();
	    			$('#modalRealisasi').modal('hide')

	        	}else{
	        		toastr.error(response.message);
	        	} 
	        });

	        
	    });
    });

    function loadDt() {
    	$('#table-front').DataTable({
		    ajax: {
		        url: '<?php echo base_url();?>pemetaan_sosial/get_all',
		        data: function ( d ) {
	                d.<?php echo $this->security->get_csrf_token_name();?> = "<?php echo $this->security->get_csrf_hash();?>"
	            },
		        dataSrc: ''
		    }
		})
    }

    function dels(id) {
    	$.get( "<?=base_url('pemetaan_sosial/delete/')?>"+id, function( response ) {
		  	response = JSON.parse(response)
        	if (response.sts == 'success') {
        		toastr.success("Data Sudah Terhapus!");
                $('#table-front').DataTable().ajax.reload();
        	}else{
        		toastr.error("Data Gagal Dihapus!");
        	} 
		});
    }

    function realisasi(kode_kab_kota,tahun_anggaran) {

    	$.get( "<?php echo base_url("penetapan_model/getRealisasi/") ?>"+kode_kab_kota+'/'+tahun_anggaran, function( data ) {
			data = JSON.parse(data)
			console.log(data)
			var real = data.realisasi_pemsos == null ? 0 : data.realisasi_pemsos;
			$('#tahun_anggaran').val(data.tahun_anggaran)
	    	$('#kode_kab_kota').val(data.kode_kab_kota)
	    	$('#nama_kab_kota').val(data.nama_kab_kota)
	    	$('#anggaran').val(rupiah(data.anggaran_pemsos))
	    	$('#realisasi_pemsos').val(rupiah(real))
	    	$('#modalRealisasi').modal('show')

		});
    }


    function realisasiChange(val) {
    	var anggaran = $('#anggaran').val().split('.').join(''); 
        var val = val.split('.').join('');
   	
        if (parseInt(val) >= anggaran) {
        	$('#realisasi_pemsos').val(rupiah(anggaran))
        }else{
        	$('#realisasi_pemsos').val(rupiah(val))
	    }


    }

    function rupiah(nStr)
	{
	    nStr += '';
	    x = nStr.split('.');
	    x1 = x[0];
	    x2 = x.length > 1 ? '.' + x[1] : '';
	    var rgx = /(\d+)(\d{3})/;
	    while (rgx.test(x1)) {
	        x1 = x1.replace(rgx, '$1' + '.' + '$2');
	    }
	    return x1 + x2;
	}
</script>