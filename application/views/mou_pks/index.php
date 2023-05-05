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
	    		      <a  style="float: right" href="<?=base_url('moupks/add')?>" class="btn btn-warning pull-right">
	        <i class="fas fa-plus mr-2 text-white"></i>Baru </a>
	      <div class="card-tools">
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
	              <th>Nomor </th>
	              <th>PKS/MOU</th>
	              <th>Jenis PKS/MOU</th>
	              <th>Masa Berlaku</th>
	              <th>Keterangan</th>
	              <th>Aksi</th>
	            </tr>
	          </thead>
	        </table>
	    </div>
	  </div>
	</div>
</section>


<div class="modal" tabindex="-1" id="modalshow">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
      </div>
      <div class="modal-body">
 		<form action="#" id="lkFormAdd" class="form-horizontal" enctype="multipart/form-data" method="post">
        	<div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12">
                		<table class="table form-controll" width="100%">
                			<thead>
                				<th>No</th>
                				<th>Jenis Evidence</th>
                				<th>Aksi</th>
                			</thead>
                			<tbody id="body_table"></tbody>
                		</table>
                </div>
            </div>
      		
      </div>
   	   <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="$('.modal').modal('hide')">Close</button>
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
		        url: '<?php echo base_url();?>moupks/get_all',
		        data: function ( d ) {
	                d.<?php echo $this->security->get_csrf_token_name();?> = "<?php echo $this->security->get_csrf_hash();?>"
	            },
		        dataSrc: ''
		    }
		})
    }

    function dels(id) {
    	$.get( "<?=base_url('moupks/delete/')?>"+id, function( response ) {
		  	response = JSON.parse(response)
        	if (response.sts == 'success') {
        		toastr.success("Data Sudah Terhapus!");
                $('#table-front').DataTable().ajax.reload();
        	}else{
        		toastr.error("Data Gagal Dihapus!");
        	} 
		});
    }

    function show_evidence(id) {
    	$.get( "<?=base_url('moupks/get_evidence/')?>"+id, function( response ) {
		  	response = JSON.parse(response)
			$('#body_table').html(response);
			$('#modalshow').modal('show');

		});

    }



</script>