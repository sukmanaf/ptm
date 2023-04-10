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
	      	<a  style="" href="<?=base_url('penyusunan_data')?>" class="btn btn-default">
	        <i class="fas fa-arrow-left mr-2 text-white"></i>Kembali </a>
	      <div class="card-tools">
	      	      <!-- <a  style="float: right" href="<?=base_url('detail_penyusunan_data/add/').$id?>" class="btn btn-warning pull-right">
	        <i class="fas fa-plus mr-2 text-white"></i>Baru </a> -->
	        <div class="input-group input-group-sm">
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
		              <th>Kabupaten/Kota</th>
		              <th>Kecamatan</th>
		              <th>Desa/Kelurahan</th>
		              <th>Target KK</th>
		              <th>Target Waktu</th>
		              <th style="width: 100px !important">Aksi</th>
	            </tr>
	          </thead>
	        </table>
	    </div>
	  </div>
	</div>
</section>



<div class="modal" tabindex="-1" id="modalTable">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
      </div>
      <div class="modal-body">
 			<table class="table" id="table-modal">
 				<thead>
 					<th>No</th>
 					<th>NIK</th>
 					<th>Nama</th>
 					<th>Jenis Kelamin</th>
 				</thead>
 			</table>	
 	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="$('.modal').modal('hide')">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
       </form>
    </div>
  </div>
</div>

<script type="text/javascript">

    $(document).ready(function(){
		loadDt();
    });

    function loadDt() {
    	$('#table-front').DataTable({
		    ajax: {
		        url: '<?php echo base_url("detail_penyusunan_data/get_all/").$id;?>',
		        data: function ( d ) {
	                d.<?php echo $this->security->get_csrf_token_name();?> = "<?php echo $this->security->get_csrf_hash();?>"
	            },
		        dataSrc: ''
		    }
		})
    }

    function dels(id) {
    	$.get( "<?=base_url('detail_penyusunan_data/delete/')?>"+id, function( response ) {
		  	response = JSON.parse(response)
        	if (response.sts == 'success') {
        		toastr.success("Data Sudah Terhapus!");
                $('#table-front').DataTable().ajax.reload();
        	}else{
        		toastr.error("Data Gagal Dihapus!");
        	} 
		});
    }

    function anggota(val) {
    	$('#table-modal').dataTable().fnClearTable();
    	$('#table-modal').dataTable().fnDestroy();
    	$('#table-modal').DataTable({
		    ajax: {
		        url: '<?php echo base_url("detail_penyusunan_data/get_anggota/");?>'+val,
		        data: function ( d ) {
	                d.<?php echo $this->security->get_csrf_token_name();?> = "<?php echo $this->security->get_csrf_hash();?>"
	            },
		        dataSrc: ''
		    }
		})

		$('#modalTable').modal('show')
    }

</script>