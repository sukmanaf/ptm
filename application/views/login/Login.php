<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title id="titleId">PTM</title>

	<!-- Google Font: Source Sans Pro -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/fontawesome-free/css/all.min.css">
	<!-- DataTables -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

	<!-- Select2 -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2/css/select2.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="<?= base_url() ?>assets/dist/css/adminlte.min.css">
	<link rel="stylesheet" href="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.css">

	<!-- toast -->
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

	<!-- jQuery -->
	<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>

	<!-- Include  DateTimePicker CDN -->
	<link href="https://unpkg.com/gijgo@1.9.14/css/gijgo.min.css" rel="stylesheet" type="text/css" />
	<!-- leafletjs -->
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin="" />

	<style type="text/css">
		.table{
			width: 100% !important;
		}
	</style>
</head>

<body class='hold-transition login-page' style="overflow-x: hidden;">

		<div class="wrapper">
			
<div class="login-box">
  <div class="login-logo">
    <a href="http://localhost/ptm/assets#"><img src="/img/bpn-logo-96.png" /></a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <h4>
        <p class="login-box-msg">Login untuk memulai</p>
      </h4>

	<form action="#" id="postForm" class="form-horizontal" enctype="multipart/form-data" method="post">
    		<input type="hidden" name="tokn" value="3a54bedaf3ba1a85384707092fa7b3de" style="display: none">

        <div class="input-group mb-3">
          <input name="user_id" type="text" class="form-control" placeholder="User ID">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input name="password" type="password" class="form-control" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <!-- <input name="remember_me" type="checkbox" id="remember"> -->
              <!-- <label for="remember"> -->
                <!-- Jangan bertanya lagi -->
              <!-- </label> -->
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </div>
          <!-- /.col -->
        </div>
        <br>
        <!-- <p class="mb-0">Belum memiliki akun?&nbsp;<a href="http://localhost/ptm/assets/auth/register">Daftar di sini</a></p>
        <p>Lupa password?&nbsp;<a href="http://localhost/ptm/assets/auth/lupa">Buat password baru di sini</a></p> -->

</form>

    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

</div>
	<!-- ./wrapper -->

	<script type="text/javascript">
		$("#postForm").submit(function(event){
	        event.preventDefault(); //prevent default action 
	        var post_url = '<?php echo base_url("login/action") ?>'; //get form action url
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
	        		window.location.replace('<?=base_url()?>')
	        		// setTimeout(function() {
	        			// location.reload()
	        		// }, 3000);
	        	}else{
	        		toastr.error(response.message);
	        	} 
	        });

	        
	    });

	</script>

	<!-- Bootstrap 4 -->
	<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- Select2 -->
	<script src="<?= base_url() ?>assets/plugins/select2/js/select2.full.min.js"></script>
	<!-- Bootstrap4 Duallistbox -->
	<script src="<?= base_url() ?>assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
	<!-- DataTables  & Plugins -->
	<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/jszip/jszip.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
	<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
	<script src="<?= base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
	<!-- AdminLTE App -->
	<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>
	<!-- AdminLTE for demo purposes -->
	<!-- <script src="<?= base_url() ?>assets/dist/js/demo.js"></script> -->

	<script src="http://194.233.71.171/ptm-web/lib/adminlte/plugins/chart.js/Chart.min.js"></script>
	<!-- Make sure you put this AFTER Leaflet's CSS -->
	<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script>
	<!-- Include daettime picker.js CDN -->

	<script src="https://unpkg.com/gijgo@1.9.14/js/gijgo.min.js" type="text/javascript"></script>
	<!-- Page specific script -->
	<script>
		$(function() {
			$("#example1").DataTable({
				"responsive": true,
				"lengthChange": false,
				"autoWidth": false,
				"buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
			}).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
			$('#example2').DataTable({
				"paging": true,
				"lengthChange": false,
				"searching": false,
				"ordering": true,
				"info": true,
				"autoWidth": false,
				"responsive": true,
			});

			$('.numbers').keypress(function(event) {

				if (event.which != 8 && isNaN(String.fromCharCode(event.which))) {
					event.preventDefault(); //stop character from entering input
				}

			});
		});
	</script>
</body>

</html>