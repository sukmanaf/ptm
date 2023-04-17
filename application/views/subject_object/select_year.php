<?php
$role = $this->session->userdata('login')['role_user'];
?>						
<div class="col-md-12">
	<div class="row">
		<div class="col-lg-4 col-xs-6">
			<div class="small-box bg-info">
				<div class="inner">
					<h3>&nbsp;</h3>
					<p>Tahun Pertama</p>
				</div>
				<div class="icon">
					<i class="ion ion-calendar"></i>
				</div>
				<a href="<?=base_url()?>subjectobject/tahun_pertama" class="small-box-footer">
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<?php if ($role != 7): ?>
			
		<div class="col-lg-4 col-xs-6">

			<div class="small-box bg-info">
				<div class="inner">
					<h3>&nbsp;</h3>
					<p>Tahun Kedua</p>
				</div>
				<div class="icon">
					<i class="ion ion-calendar"></i>
				</div>
				<a href="<?=base_url()?>subjectobject/tahun_kedua" class="small-box-footer">
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>

		<div class="col-lg-4 col-xs-6">

			<div class="small-box bg-info">
				<div class="inner">
					<h3>&nbsp;</h3>
					<p>Tahun Ketiga</p>
				</div>
				<div class="icon">
					<i class="ion ion-calendar"></i>
				</div>
				<a href="<?=base_url()?>subjectobject/tahun_ketiga" class="small-box-footer">
					<i class="fa fa-arrow-circle-right"></i>
				</a>
			</div>
		</div>
		<?php endif ?>
	</div>

</div>