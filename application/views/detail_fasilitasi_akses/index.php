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
	    	<a style="" href="<?=base_url('/fasilitasi_akses')?>" class="btn btn-default">
	        <i class="fas fa-arrow-left mr-2 text-white"></i>Kembali </a>
	      <!-- <a  style="float: right" href="<?=base_url('detail_fasilitasi_akses/add')?>" class="btn btn-warning pull-right">
	        <i class="fas fa-plus mr-2 text-white"></i>Baru </a> -->
	      <div class="card-tools">
	        <div class="input-group input-group-sm">
	          <div class="input-group-append"></div>
	        </div>
	      </div>
	    </div>

	    <div style="padding: 20px">
	      	<a class="btn btn-primary btn-sm" target="_blank" href="<?php echo base_url("export_pdf/detail_fasilitasi_akses/") ?>">Export Laporan</a>
	    </div>
	    <div class="card-body table-responsive">
	      <div id="table-front_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
	        <table id="table-front" class="table table-hover dataTable no-footer dtr-inline" aria-describedby="table-front_info" style="width: 1038px;">
	          <thead>
	            <tr>
	              <th>No</th>
	              <th>Nama kota/Kabupaten</th>
	              <th>Nama Kecamatan</th>
	              <th>Nama Desa/Kelurahan</th>
	              <th>target KK</th>
	              <th>Tanggal</th>
	              <th>Aksi</th>
	            </tr>
	          </thead>
	        </table>
	    </div>
	  </div>
	</div>
</section>

<script type="text/javascript">

    $(document).ready(function(){
		loadDt();
    });

    function loadDt() {
    	$('#table-front').DataTable({
		    ajax: {
		        url: '<?php echo base_url('detail_fasilitasi_akses/get_all/').$id;?>',
		        data: function ( d ) {
	                d.<?php echo $this->security->get_csrf_token_name();?> = "<?php echo $this->security->get_csrf_hash();?>"
	            },
		        dataSrc: ''
		    }
		})
    }

    function del(id) {
    	$.get( "<?=base_url('detail_fasilitasi_akses/delete/')?>"+id, function( response ) {
		  	response = JSON.parse(response)
        	if (response.sts == 'success') {
        		toastr.success("Data Sudah Terhapus!");
                $('#table-front').DataTable().ajax.reload();
        	}else{
        		toastr.error("Data Gagal Dihapus!");
        	} 
		});
    }

</script>