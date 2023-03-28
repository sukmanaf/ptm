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
                		<input type="hidden" name="id" value="<?=$data['id']?>">


						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="jenis_usaha">Jenis Usaha</label>
									<input name="jenis_usaha"  id="jenis_usaha" type="text" value="<?=@$data['jenis_usaha']?>" class="form-control clear">
								</div>
							</div>

						</div>
						
						<div class="row">
							<fieldset class="border rounded-3 p-3" style="width: 100%">
				              <legend class="float-none w-auto px-3">Usaha Pembenihan </legend>
				              	<div class="row">
					                <div class="col-md-4">
										<div class="form-group">
											<label for="mikro" style="color:white">|</label></br>
											<label for="mikro">Modal</label>
										</div>
									</div>
					                <div class="col-md-4">
										<div class="form-group" >
											<label style="float: right" for="air_tawar_modal">Air Tawar</label>
											<input name="air_tawar_modal" id="air_tawar_modal" type="text" value="<?=@$data['air_tawar_modal']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-4">
										<div class="form-group">
											<label for="air_payau_modal">Air Payau/Laut</label>
											<input name="air_payau_modal" id="air_payau_modal" type="text" value="<?=@$data['air_payau_modal']?>" class="form-control clear">
										</div>
									</div>
				          		</div>
								
				              	<div class="row">
					                <div class="col-md-4">
										<div class="form-group">
											<label for="air_tawar_volume">Vomule/ Luas Unit Usaha</label>
										</div>
									</div>
					                <div class="col-md-4">
										<div class="form-group">
											<input name="air_tawar_volume" id="air_tawar_volume" type="text" value="<?=@$data['air_tawar_volume']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-4">
										<div class="form-group">
											<input name="air_payau_volume" id="air_payau_volume" type="text" value="<?=@$data['air_payau_volume']?>" class="form-control clear">
										</div>
									</div>
				          		</div>
				              	<div class="row">
					                <div class="col-md-4">
										<div class="form-group">
											<label for="air_tawar_pekerja">Jumlah Tenaga Kerja</label>
										</div>
									</div>
					                <div class="col-md-4">
										<div class="form-group">
											<input name="air_tawar_pekerja" id="air_tawar_pekerja" type="text" value="<?=@$data['air_tawar_pekerja']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-4">
										<div class="form-group">
											<input name="air_payau_pekerja" id="air_payau_pekerja" type="text" value="<?=@$data['air_payau_pekerja']?>" class="form-control clear">
										</div>
									</div>
				          		</div>
				              	<div class="row">
					                <div class="col-md-4">
										<div class="form-group">
											<label for="air_tawar_teknologi">Penerapan Teknologi</label>
										</div>
									</div>
					                <div class="col-md-4">
										<div class="form-group">
											<input name="air_tawar_teknologi" id="air_tawar_teknologi" type="text" value="<?=@$data['air_tawar_teknologi']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-4">
										<div class="form-group">
											<input name="air_payau_teknologi" id="air_payau_teknologi" type="text" value="<?=@$data['air_payau_teknologi']?>" class="form-control clear">
										</div>
									</div>
				          		</div>
				              	<div class="row">
					                <div class="col-md-4">
										<div class="form-group">
											<label for="air_tawar_hukum">Status Hukum dan Perizinan</label>
										</div>
									</div>
					                <div class="col-md-4">
										<div class="form-group">
											<input name="air_tawar_hukum" id="air_tawar_hukum" type="text" value="<?=@$data['air_tawar_hukum']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-4">
										<div class="form-group">
											<input name="air_payau_hukum" id="air_payau_hukum" type="text" value="<?=@$data['air_payau_hukum']?>" class="form-control clear">
										</div>
									</div>
				          		</div>
						</div>
						
						<div class="row">
							<fieldset class="border rounded-3 p-3" style="width: 100%">
				              <legend class="float-none w-auto px-3">Usaha Pembesaran Ikan Air Tawar </legend>

				              	<div class="row">
					                <div class="col-md-2">
										<div class="form-group">
											<label for="mikro" style="color:white">|</label></br>
											<label for="kecil">Modal</label>
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group" >
											<label for="kad_modal">KAD</label>
											<input name="kad_modal" id="kad_modal" type="text" value="<?=@$data['kad_modal']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<label style="float: right" for="mikro">KAT</label>
											<input name="kat_modal" id="kat_modal" type="text" value="<?=@$data['kat_modal']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<label for="kecil">KARAMBA</label>
											<input name="keramba_modal" id="keramba_modal" type="text" value="<?=@$data['keramba_modal']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group" >
											<label for="kja_mikro">KJA</label>
											<input name="kja_modal" id="kja_modal" type="text" value="<?=@$data['kja_modal']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<label style="float: right" for="mikro">MINA PADI</label>
											<input name="mina_padi_modal" id="mina_padi_modal" type="text" value="<?=@$data['mina_padi_modal']?>" class="form-control clear">
										</div>
									</div>
				          		</div>
				              	<div class="row">
					                <div class="col-md-2">
										<div class="form-group">
											<label for="kecil">Volume/luas Unit Usaha</label>
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group" >
											<input name="kad_volume" id="kad_volume" type="text" value="<?=@$data['kad_volume']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<input name="kat_volume" id="kat_volume" type="text" value="<?=@$data['kat_volume']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<input name="keramba_volume" id="keramba_volume" type="text" value="<?=@$data['keramba_volume']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group" >
											<input name="kja_volume" id="kja_volume" type="text" value="<?=@$data['kja_volume']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<input name="mina_padi_volume" id="mina_padi_volume" type="text" value="<?=@$data['mina_padi_volume']?>" class="form-control clear">
										</div>
									</div>
				          		</div>
				              	<div class="row">
					                <div class="col-md-2">
										<div class="form-group">
											<label for="kecil">Hasil Penjualan / Tahun</label>
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group" >
											<input name="kad_penjualan" id="kad_penjualan" type="text" value="<?=@$data['kad_penjualan']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<input name="kat_penjualan" id="kat_penjualan" type="text" value="<?=@$data['kat_penjualan']?>" class="form-control clear">
										</div>
									</div>

					                <div class="col-md-2">
										<div class="form-group">
											<input name="keramba_penjualan" id="keramba_penjualan" type="text" value="<?=@$data['keramba_penjualan']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group" >
											<input name="kja_penjualan" id="kja_penjualan" type="text" value="<?=@$data['kja_penjualan']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<input name="mina_padi_penjualan" id="mina_padi_penjualan" type="text" value="<?=@$data['mina_padi_penjualan']?>" class="form-control clear">
										</div>
									</div>
				          		</div>
				              	<div class="row">
					                <div class="col-md-2">
										<div class="form-group">
											<label for="kecil">Jumlah Tenaga Kerja</label>
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group" >
											<input name="kad_pekerja" id="kad_pekerja" type="text" value="<?=@$data['kad_pekerja']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<input name="kat_pekerja" id="kat_pekerja" type="text" value="<?=@$data['kat_pekerja']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<input name="keramba_pekerja" id="keramba_pekerja" type="text" value="<?=@$data['keramba_pekerja']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group" >
											<input name="kja_pekerja" id="kja_pekerja" type="text" value="<?=@$data['kja_pekerja']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<input name="mina_padi_pekerja" id="mina_padi_pekerja" type="text" value="<?=@$data['mina_padi_pekerja']?>" class="form-control clear">
										</div>
									</div>
				          		</div>
				              	<div class="row">
					                <div class="col-md-2">
										<div class="form-group">
											<label for="kecil">Penerapan Teknologi</label>
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group" >
											<input name="kad_teknologi" id="kad_teknologi" type="text" value="<?=@$data['kad_teknologi']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<input name="kat_teknologi" id="kat_teknologi" type="text" value="<?=@$data['kat_teknologi']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<input name="keramba_teknologi" id="keramba_teknologi" type="text" value="<?=@$data['keramba_teknologi']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group" >
											<input name="kja_teknologi" id="kja_teknologi" type="text" value="<?=@$data['kja_teknologi']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<input name="mina_padi_teknologi" id="mina_padi_teknologi" type="text" value="<?=@$data['mina_padi_teknologi']?>" class="form-control clear">
										</div>
									</div>
				          		</div>
				              	<div class="row">
					                <div class="col-md-2">
										<div class="form-group">
											<label for="kecil">Status Hukum dan Perizinan</label>
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group" >
											<input name="kad_hukum" id="kad_hukum" type="text" value="<?=@$data['kad_hukum']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<input name="kat_hukum" id="kat_hukum" type="text" value="<?=@$data['kat_hukum']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<input name="keramba_hukum" id="keramba_hukum" type="text" value="<?=@$data['keramba_hukum']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group" >
											<input name="kja_hukum" id="kja_hukum" type="text" value="<?=@$data['kja_hukum']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<input name="mina_padi_hukum" id="mina_padi_hukum" type="text" value="<?=@$data['mina_padi_hukum']?>" class="form-control clear">
										</div>
									</div>
				          		</div>
				              	
						</div>


						<div class="row">
							<fieldset class="border rounded-3 p-3" style="width: 100%">
				              <legend class="float-none w-auto px-3">Usaha Pembesaran Ikan di Air Payau </legend>
				              	
				              	<div class="row">
					                <div class="col-md-3">
										<div class="form-group">
											<label for="mikro" style="color:white">|</label></br>
											<label for="mikro">Modal</label>
										</div>
									</div>
					                <div class="col-md-3">
										<div class="form-group" >
											<label style="float: right" for="mikro">Udang</label>
											<input name="udang_modal" id="udang_modal" type="text" value="<?=@$data['udang_modal']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-3">
										<div class="form-group">
											<label for="kecil">Bandeng</label>
											<input name="bandeng_modal" id="bandeng_modal" type="text" value="<?=@$data['bandeng_modal']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-3">
										<div class="form-group">
											<label for="kecil">Policulture</label>
											<input name="policulture_modal" id="policulture_modal" type="text" value="<?=@$data['policulture_modal']?>" class="form-control clear">
										</div>
									</div>
				          		</div>

				              	<div class="row">
					                <div class="col-md-3">
										<div class="form-group">
											<label for="mikro">Volume/Luas Unit Usaha Ektensif</label>
										</div>
									</div>
					                <div class="col-md-3">
										<div class="form-group" >
											<input name="udang_volume_ekstensif" id="udang_volume_ekstensif" type="text" value="<?=@$data['udang_volume_ekstensif']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-3">
										<div class="form-group">
											<input name="bandeng_volume_ekstensif" id="bandeng_volume_ekstensif" type="text" value="<?=@$data['bandeng_volume_ekstensif']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-3">
										<div class="form-group">
											<input name="policulture_volume_ekstensif" id="policulture_volume_ekstensif" type="text" value="<?=@$data['policulture_volume_ekstensif']?>" class="form-control clear">
										</div>
									</div>
				          		</div>

				              	<div class="row">
					                <div class="col-md-3">
										<div class="form-group">
											<label for="mikro">Volume/Luas Unit Usaha Semi Intenfif</label>
										</div>
									</div>
					                <div class="col-md-3">
										<div class="form-group" >
											<input name="udang_volume_intensif" id="udang_volume_intensif" type="text" value="<?=@$data['udang_volume_intensif']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-3">
										<div class="form-group">
											<input name="bandeng_volume_intensif" id="bandeng_volume_intensif" type="text" value="<?=@$data['bandeng_volume_intensif']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-3">
										<div class="form-group">
											<input name="policulture_volume_intensif" id="policulture_volume_intensif" type="text" value="<?=@$data['policulture_volume_intensif']?>" class="form-control clear">
										</div>
									</div>
				          		</div>
				              	<div class="row">
					                <div class="col-md-3">
										<div class="form-group">
											<label for="mikro">Hasil Penjualan Pertahun</label>
										</div>
									</div>
					                <div class="col-md-3">
										<div class="form-group" >
											<input name="udang_penjualan" id="udang_penjualan" type="text" value="<?=@$data['udang_penjualan']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-3">
										<div class="form-group">
											<input name="bandeng_penjualan" id="bandeng_penjualan" type="text" value="<?=@$data['bandeng_penjualan']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-3">
										<div class="form-group">
											<input name="policulture_penjualan" id="policulture_penjualan" type="text" value="<?=@$data['policulture_penjualan']?>" class="form-control clear">
										</div>
									</div>
				          		</div>
				              	<div class="row">
					                <div class="col-md-3">
										<div class="form-group">
											<label for="mikro">Jumlah Tenaga Kerja</label>
										</div>
									</div>
					                <div class="col-md-3">
										<div class="form-group" >
											<input name="udang_pekerja" id="udang_pekerja" type="text" value="<?=@$data['udang_pekerja']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-3">
										<div class="form-group">
											<input name="bandeng_pekerja" id="bandeng_pekerja" type="text" value="<?=@$data['bandeng_pekerja']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-3">
										<div class="form-group">
											<input name="policulture_pekerja" id="policulture_pekerja" type="text" value="<?=@$data['policulture_pekerja']?>" class="form-control clear">
										</div>
									</div>
				          		</div>
				              	<div class="row">
					                <div class="col-md-3">
										<div class="form-group">
											<label for="mikro">Penerapan Teknologi</label>
										</div>
									</div>
					                <div class="col-md-3">
										<div class="form-group" >
											<input name="udang_teknologi" id="udang_teknologi" type="text" value="<?=@$data['udang_teknologi']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-3">
										<div class="form-group">
											<input name="bandeng_teknologi" id="bandeng_teknologi" type="text" value="<?=@$data['bandeng_teknologi']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-3">
										<div class="form-group">
											<input name="policulture_teknologi" id="policulture_teknologi" type="text" value="<?=@$data['policulture_teknologi']?>" class="form-control clear">
										</div>
									</div>
				          		</div>
				              	<div class="row">
					                <div class="col-md-3">
										<div class="form-group">
											<label for="mikro">Status Hukum dan Perizinan</label>
										</div>
									</div>
					                <div class="col-md-3">
										<div class="form-group" >
											<input name="udang_hukum" id="udang_hukum" type="text" value="<?=@$data['udang_hukum']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-3">
										<div class="form-group">
											<input name="bandeng_hukum" id="bandeng_hukum" type="text" value="<?=@$data['bandeng_hukum']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-3">
										<div class="form-group">
											<input name="policulture_hukum" id="policulture_hukum" type="text" value="<?=@$data['policulture_hukum']?>" class="form-control clear">
										</div>
									</div>
				          		</div>
								
						</div>
						
						<div class="row">
							<fieldset class="border rounded-3 p-3" style="width: 100%">
				              <legend class="float-none w-auto px-3">Usaha Pembesaran Ikan di Air Laut </legend>
				              	
				              	<div class="row">
					                <div class="col-md-3">
										<div class="form-group">
											<label for="mikro" style="color:white">|</label></br>
											<label for="mikro">Modal</label>
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group" >
											<label style="float: right" for="mikro">Rumput Laut</label>
											<input name="rumput_laut_modal" id="rumput_laut_modal" type="text" value="<?=@$data['rumput_laut_modal']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<label for="kecil">Abalone</label>
											<input name="abalone_modal" id="abalone_modal" type="text" value="<?=@$data['abalone_modal']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<label for="kecil">Kekerangan</label>
											<input name="kekerangan_modal" id="kekerangan_modal" type="text" value="<?=@$data['kekerangan_modal']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<label for="kecil">Ikan Bersirip</label>
											<input name="ikan_modal" id="ikan_modal" type="text" value="<?=@$data['ikan_modal']?>" class="form-control clear">
										</div>
									</div>
				          		</div>

				              	<div class="row">
					                <div class="col-md-3">
										<div class="form-group">
											<label for="mikro">Volume/Luas Unit Usaha </label>
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group" >
											<input name="rumput_laut_volume" id="rumput_laut_volume" type="text" value="<?=@$data['rumput_laut_volume']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<input name="abalone_volume" id="abalone_volume" type="text" value="<?=@$data['abalone_volume']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<input name="kekerangan_volume" id="kekerangan_volume" type="text" value="<?=@$data['kekerangan_volume']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<input name="ikan_volume" id="ikan_volume" type="text" value="<?=@$data['ikan_volume']?>" class="form-control clear">
										</div>
									</div>
				          		</div>
				              	<div class="row">
					                <div class="col-md-3">
										<div class="form-group">
											<label for="mikro">Hasil Penjualan Pertahun</label>
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group" >
											<input name="rumput_laut_penjualan" id="rumput_laut_penjualan" type="text" value="<?=@$data['rumput_laut_penjualan']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<input name="abalone_penjualan" id="abalone_penjualan" type="text" value="<?=@$data['abalone_penjualan']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<input name="kekerangan_penjualan" id="kekerangan_penjualan" type="text" value="<?=@$data['kekerangan_penjualan']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<input name="ikan_penjualan" id="ikan_penjualan" type="text" value="<?=@$data['ikan_penjualan']?>" class="form-control clear">
										</div>
									</div>
				          		</div>
				              	<div class="row">
					                <div class="col-md-3">
										<div class="form-group">
											<label for="mikro">Jumlah Tenaga Kerja</label>
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group" >
											<input name="rumput_laut_pekerja" id="rumput_laut_pekerja" type="text" value="<?=@$data['rumput_laut_pekerja']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<input name="abalone_pekerja" id="abalone_pekerja" type="text" value="<?=@$data['abalone_pekerja']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<input name="kekerangan_pekerja" id="kekerangan_pekerja" type="text" value="<?=@$data['kekerangan_pekerja']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<input name="ikan_pekerja" id="ikan_pekerja" type="text" value="<?=@$data['ikan_pekerja']?>" class="form-control clear">
										</div>
									</div>
				          		</div>
				              	<div class="row">
					                <div class="col-md-3">
										<div class="form-group">
											<label for="mikro">Penerapan Teknologi</label>
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group" >
											<input name="rumput_laut_teknologi" id="rumput_laut_teknologi" type="text" value="<?=@$data['rumput_laut_teknologi']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<input name="abalone_teknologi" id="abalone_teknologi" type="text" value="<?=@$data['abalone_teknologi']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<input name="kekerangan_teknologi" id="kekerangan_teknologi" type="text" value="<?=@$data['kekerangan_teknologi']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<input name="ikan_teknologi" id="ikan_teknologi" type="text" value="<?=@$data['ikan_teknologi']?>" class="form-control clear">
										</div>
									</div>
				          		</div>
				              	<div class="row">
					                <div class="col-md-3">
										<div class="form-group">
											<label for="mikro">Status Hukum dan Perizinan</label>
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group" >
											<input name="rumput_laut_hukum" id="rumput_laut_hukum" type="text" value="<?=@$data['rumput_laut_hukum']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<input name="abalone_hukum" id="abalone_hukum" type="text" value="<?=@$data['abalone_hukum']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<input name="kekerangan_hukum" id="kekerangan_hukum" type="text" value="<?=@$data['kekerangan_hukum']?>" class="form-control clear">
										</div>
									</div>
					                <div class="col-md-2">
										<div class="form-group">
											<input name="ikan_hukum" id="ikan_hukum" type="text" value="<?=@$data['ikan_hukum']?>" class="form-control clear">
										</div>
									</div>
				          		</div>

						</div>
						
						

						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col">
										<div class="form-group">
											<a href="<?=base_url('master_skala_perikanan')?>" class="form-control btn btn-secondary"><label >Tutup</label></a>
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
    	 $('.lampiran').on('change', function(){
    	// var fuUpload = document.getElementById("lampiran1");
    		if(this.files[0].type != 'application/pdf'){
    			toastr.error('Tipe File Salah atau File Rusak!')
    			$(this).val('')
    		}
    	});

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
	        var post_url = '<?php echo base_url("master_skala_perikanan/update") ?>'; //get form action url
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
	        		$('.clear').val("")
	        		window.location.replace('<?= base_url("master_skala_perikanan")?>');

	        		// $('#table-front').DataTable().ajax.reload();
	        	}else{
	        		toastr.error(response.message);
	        	} 
	        });

	        
	    });


    })



    function nikChange(nik) {
	    event.preventDefault(); //prevent default action 
		$.get( "<?php echo base_url("master_skala_perikanan/detailNik/") ?>"+nik, function( data ) {
			data = JSON.parse(data)
			console.log(data.luas)
			$('#keanggotaan').val(data.keanggotaan)
			$('#sektor_usaha').val(data.sektor_usaha)
			$('#nama_kelompok').val(data.kelompok)
			$('#luas_tanah').val(data.luas)
		});
    }
	
</script>

   