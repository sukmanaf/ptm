
<div class="row">
  
  <div class="col-md-12">
    <button onclick="addTn(<?=$id?>)" type="button" class="btn btn-warning" style="float: right;margin: 10px"><i class="fas fa-plus mr-2 text-white"></i>Baru</button>
  </div>
  <div class="col-md-12">
    
    <table id="ARtable" class="table table-hover dataTable no-footer dtr-inline" aria-describedby="table-front_info" style="width: 1038px;">
      <thead>
        <tr>
              
              <th>No</th>
              <th>NIK</th>
              <th>Nama</th>
              <th>Jenis Kelamin</th>
              <th>Hubungan Kepala Keluarga</th>
              <th style="width: 100px !important">Aksi</th>
        </tr>
      </thead>
    </table>
  </div>
          
</div>




<div class="modal" tabindex="-1" id="AddTn">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
	    <form action="#" id="arForm" class="form-horizontal" enctype="multipart/form-data" method="post">
	      <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
          <input type="hidden" name="id_targetkk_desa" value="<?=$id?>">
          <input type="hidden" name="nik" value="<?=$data['nik']?>">
            <div class="card-header">
	            <h3>
	                RM. Hunian
	            </h3>
	        </div>
	        <div class="card-body">
	            <div class="row">
	                <div class="col-md-6">
	                    <div class="form-group">
	                        <label for='fc_apakah_memiliki_hunian'>Apakah Memiliki Hunian/Tempat Tinggal?</label>
	                        <select id="memiliki_status_hunian_atau_tidak" name='apakah_memiliki_hunian' id='fc_apakah_memiliki_hunian' class="form-control select2 custom-select w-100">
	                                        <option value='1'>Ya</option>
	                                        <option value='2'>Tidak</option>
	                        </select>
	                        
	                    </div>
	                </div>
	                <div class="col-md-6">
	                    <label>Keterangan Status Tanah</label>
	                    <select id='status_hunian_atau_tidak' name='status_hunian_atau_tidak' class="form-control select2 custom-select w-100" data-semua='0'>
	                            <option value='' selected='selected'>Semua</option>
	                    </select>
	                    <div class="invalid-feedback">
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-md-6">
	                    <div class="form-group">
	                        <label for='fc_luas_hunian'>Luas Hunian:</label>
	                        <input name='luas_hunian' id='fc_luas_hunian' placeholder='Luas Hunian' type='number' value='' class="form-control" aria-describedby="inputGroupPrepend" required />
	                        <div class="invalid-feedback">
	                            
	                        </div>
	                    </div>
	                </div>
	                <div class="col-md-6">
	                    <div class="form-group">
	                        <label for='fc_luas_pekarangan'>Luas Pekarangan: </label>
	                        <input name='luas_pekarangan' id='fc_luas_pekarangan' placeholder='Luas Pekarangan' type='number' value='' class="form-control" aria-describedby="inputGroupPrepend" required />
	                        <div class="invalid-feedback">
	                            
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-md-6">
	                    <label>Material yang Paling Banyak Digunakan untuk:</label>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-md-6">
	                    <div class="form-group">
	                        <label for='fc_jenis_material_atap_rumah'>Atap:</label>
	                        <select name='jenis_material_atap_rumah' id='fc_jenis_material_atap_rumah' class="form-control select2 custom-select w-100">
	                                        <option value='1'>Genteng</option>
	                                        <option value='2'>Asbes</option>
	                                        <option value='3'>Seng</option>
	                                        <option value='4'>Rumbia</option>
	                                        <option value='5'>Lainnya</option>
	                        </select>
	                        
	                    </div>
	                </div>
	                <div class="col-md-6">
	                    <div class="form-group">
	                        <label for='fc_penjelasan_jenis_material_atap'>Penjelasan:</label>
	                        <input name='penjelasan_jenis_material_atap' id='fc_penjelasan_jenis_material_atap' placeholder='Penjelasan Material Atap' type='text' value='' minlength='1' maxlength='100' class="form-control" aria-describedby="inputGroupPrepend" required />
	                        <div class="invalid-feedback">
	                            
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-md-6">
	                    <div class="form-group">
	                        <label for='fc_jenis_material_dinding_rumah'>Dinding:</label>
	                        <select name='jenis_material_dinding_rumah' id='fc_jenis_material_dinding_rumah' class="form-control select2 custom-select w-100">
	                                        <option value='1'>Tembok</option>
	                                        <option value='2'>Bambu/Gedek</option>
	                                        <option value='3'>Kayu/Papan</option>
	                                        <option value='4'>Tanah</option>
	                                        <option value='5'>Lainnya</option>
	                        </select>
	                        
	                    </div>
	                </div>
	                <div class="col-md-6">
	                    <div class="form-group">
	                        <label for='fc_penjelasan_jenis_material_dinding'>Penjelasan:</label>
	                        <input name='penjelasan_jenis_material_dinding' id='fc_penjelasan_jenis_material_dinding' placeholder='Penjelasan Material Dinding' type='text' value='' minlength='1' maxlength='100' class="form-control" aria-describedby="inputGroupPrepend" required />
	                        <div class="invalid-feedback">
	                            
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-md-6">
	                    <div class="form-group">
	                        <label for='fc_jenis_material_lantai_rumah'>Lantai:</label>
	                        <select name='jenis_material_lantai_rumah' id='fc_jenis_material_lantai_rumah' class="form-control select2 custom-select w-100">
	                                        <option value='1'>Tegel/Keramik</option>
	                                        <option value='2'>Semen/Plester</option>
	                                        <option value='3'>Kayu/Papan</option>
	                                        <option value='4'>Tanah</option>
	                                        <option value='5'>Lainnya</option>
	                        </select>
	                        
	                    </div>
	                </div>
	                <div class="col-md-6">
	                    <div class="form-group">
	                        <label for='fc_penjelasan_jenis_material_lantai'>Penjelasan:</label>
	                        <input name='penjelasan_jenis_material_lantai' id='fc_penjelasan_jenis_material_lantai' placeholder='Penjelasan Material Lantai' type='text' value='' minlength='1' maxlength='100' class="form-control" aria-describedby="inputGroupPrepend" required />
	                        <div class="invalid-feedback">
	                            
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-md-6">
	                    <div class="form-group">
	                        <label for='fc_apakah_memiliki_wc_sendiri'>Apakah Memiliki WC Sendiri?</label>
	                        <select name='apakah_memiliki_wc_sendiri' id='fc_apakah_memiliki_wc_sendiri' class="form-control select2 custom-select w-100">
	                                        <option value='1'>Ya</option>
	                                        <option value='2'>Tidak</option>
	                        </select>
	                        
	                    </div>
	                </div>
	                <div class="col-md-6">
	                    <div class="form-group">
	                        <label for='fc_di_mana_biasanya_buang_air_besar'>Tempat Paling Sering untuk Buang Air Besar:</label>
	                        <select name='di_mana_biasanya_buang_air_besar' id='fc_di_mana_biasanya_buang_air_besar' class="form-control select2 custom-select w-100">
	                                        <option value='1'>WC Pribadi</option>
	                                        <option value='2'>WC Umum/Tetangga/Bersama</option>
	                                        <option value='3'>Sungai</option>
	                                        <option value='4'>Tempat Terbuka</option>
	                                        <option value='5'>Lainnya</option>
	                        </select>
	                        
	                    </div>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-md-6">
	                    <div class="form-group">
	                        <label for='fc_sumber_penerangan_di_malam_hari'>Sumber Utama Penerangan Rumah</label>
	                        <select name='sumber_penerangan_di_malam_hari' id='fc_sumber_penerangan_di_malam_hari' class="form-control select2 custom-select w-100">
	                                        <option value='1'>Listrik PLN</option>
	                                        <option value='2'>Generator Bersama</option>
	                                        <option value='3'>Generator Pribadi</option>
	                                        <option value='4'>Petromaks</option>
	                                        <option value='5'>Lentera/Pelita</option>
	                                        <option value='6'>Lainnya</option>
	                        </select>
	                        
	                    </div>
	                </div>
	                <div class="col-md-6">
	                    <div class="form-group">
	                        <label for='fc_penjelasan_sumber_penerangan_malam_hari'>Penjelasan Sumber Penerangan Rumah</label>
	                        <input name='penjelasan_sumber_penerangan_malam_hari' id='fc_penjelasan_sumber_penerangan_malam_hari' placeholder='Penjelasan Sumber Penerangan Rumah' type='text' value='' minlength='1' maxlength='1000' class="form-control" aria-describedby="inputGroupPrepend" required />
	                        <div class="invalid-feedback">
	                            
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-md-6">
	                    <div class="form-group">
	                        <label for='fc_bahan_bakar_utama_untuk_memasak'>Jenis Bahan Bakar Utama untuk Masak</label>
	                        <select name='bahan_bakar_utama_untuk_memasak' id='fc_bahan_bakar_utama_untuk_memasak' class="form-control select2 custom-select w-100">
	                                        <option value='1'>Gas/LPG</option>
	                                        <option value='2'>Minyak Tanah</option>
	                                        <option value='3'>Kayu Bakar</option>
	                                        <option value='4'>Lainnya</option>
	                        </select>
	                        
	                    </div>
	                </div>
	                <div class="col-md-6">
	                    <div class="form-group">
	                        <label for='fc_penjelasan_bahan_bakar_untuk_memasak '>Penjelasan Jenis Bahan Bakar Utama untuk Masak</label>
	                        <input name='penjelasan_bahan_bakar_untuk_memasak ' id='fc_penjelasan_bahan_bakar_untuk_memasak ' placeholder='Penjelasan Jenis Bahan Bakar Utama untuk Masak' type='text' value='' minlength='1' maxlength='1000' class="form-control" aria-describedby="inputGroupPrepend" required />
	                        <div class="invalid-feedback">
	                            
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-md-6">
	                    <div class="form-group">
	                        <label for='fc_sumber_utama_air_minum'>Sumber Utama Air Minum</label>
	                        <select name='sumber_utama_air_minum' id='fc_sumber_utama_air_minum' class="form-control select2 custom-select w-100">
	                                        <option value='1'>Air Ledeng (PAM)</option>
	                                        <option value='2'>Sumur</option>
	                                        <option value='3'>Air Hujan</option>
	                                        <option value='4'>Air Sungai</option>
	                                        <option value='5'>Air Kemasan</option>
	                                        <option value='6'>Lainnya</option>
	                        </select>
	                        
	                    </div>
	                </div>
	                <div class="col-md-6">
	                    <div class="form-group">
	                        <label for='fc_penjelasan_sumber_utama_air_minum '>Penjelasan Sumber Utama Air Minum</label>
	                        <input name='penjelasan_sumber_utama_air_minum ' id='fc_penjelasan_sumber_utama_air_minum ' placeholder='Penjelasan Sumber Utama Air Minum' type='text' value='' minlength='1' maxlength='1000' class="form-control" aria-describedby="inputGroupPrepend" required />
	                        <div class="invalid-feedback">
	                            
	                        </div>
	                    </div>
	                </div>
	            </div>
	            <div class="row">
	                <div class="col-md-6">
	                    <div class="form-group">
	                        <label for='fc_kondisi_topografi_tempat_tinggal'>Kondisi Topografi Secara Umum</label>
	                        <select name='kondisi_topografi_tempat_tinggal' id='fc_kondisi_topografi_tempat_tinggal' class="form-control select2 custom-select w-100">
	                                        <option value='1'>Pegunungan</option>
	                                        <option value='2'>Perbukitan</option>
	                                        <option value='3'>Perkotaan</option>
	                                        <option value='4'>Kawasan Gambut</option>
	                                        <option value='5'>Dataran Rendah</option>
	                                        <option value='6'>Pinggir Sungai</option>
	                                        <option value='7'>Kawasan hutan lindung/produksi</option>
	                                        <option value='8'>Kawasan Pantai</option>
	                                        <option value='9'>Lainnya</option>
	                        </select>
	                        
	                    </div>
	                </div>
	                <div class="col-md-6">
	                    <div class="form-group">
	                        <label for='fc_penjelasan_topografi_tempat_tinggal '>Penjelasan Kondisi Topografi Secara Umum</label>
	                        <input name='penjelasan_topografi_tempat_tinggal ' id='fc_penjelasan_topografi_tempat_tinggal ' placeholder='Penjelasan Kondisi Topografi Secara Umum' type='text' value='' minlength='1' maxlength='1000' class="form-control" aria-describedby="inputGroupPrepend" required />
	                        <div class="invalid-feedback">
	                            
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="$('.modal').modal('hide')">Close</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
       </form>
    </div>
  </div>
</div>

<div class="modal" tabindex="-1" id="EditTn">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
    <form action="#" id="arFormEdit" class="form-horizontal" enctype="multipart/form-data" method="post">
      <input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
          <input type="hidden" name="xid_targetkk_desa" value="<?=$id?>">
          <input type="hidden" name="xnik" value="<?=$data['nik']?>">
          <input type="hidden" id="arid" name="arid" value="">

          <div class="card-header">
            <h3>
                AR. Anggota Keluarga
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-9 col-md-9 col-xs-12">
                    <div class="form-group">
                        <label for='fc_nama_anggota_keluarga'>Nama Anggota Keluarga</label>
                        <input name='xnama_anggota_keluarga' id='xnama_anggota_keluarga' placeholder='Nama Anggota Keluarga' type='text' value='' minlength='1' maxlength='100' class="form-control" aria-describedby="inputGroupPrepend" required />
                        <div class="invalid-feedback">
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3 col-xs-12">
                    <div class="form-group">
                        <label for='xjenis_kelamin'>Jenis Kelamin</label>
                        <select name='xjenis_kelamin' id='xjenis_kelamin' class="form-control select2 custom-select w-100">
                                        <option value='L'>Laki - Laki</option>
                                        <option value='P'>Perempuan</option>
                        </select>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">
                        <label for='xtanggal_lahir'>Tanggal Lahir</label>
                        <div class="input-group date" id="tanggal_lahir" data-target-input="nearest">
                            <input name='xtanggal_lahir' id='xtanggal_lahir' placeholder='Tanggal Lahir' type='date' value='<?=date('Y-m-d')?>' class="form-control " />
                            
                        </div>
                        
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for='xstatus_perkawinan'>Status Perkawinan</label>
                        <select name='xstatus_perkawinan' id='xstatus_perkawinan' class="form-control select2 custom-select w-100" data-semua='0'>
                                        <option value='1'>Belum Menikah</option>
                                        <option value='2'>Menikah</option>
                                        <option value='3'>Bercerai Pisah</option>
                                        <option value='4'>Bercerai Mati</option>
                        </select>
                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for='xhubungan_dengan_kk'>Hubungan dengan Kepala Keluarga</label>
                        <select name='xhubungan_dengan_kk' id='xhubungan_dengan_kk' class="form-control select2 custom-select w-100" data-semua='0'>
                                <!-- <option value='' selected='selected'>Pilih Hub. Keluarga</option> -->
                                <?=$hub_kk?>
                        </select>
                        <div class="invalid-feedback">
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for='xpekerjaan'>Pekerjaan</label>
                        <select id='xpekerjaan' name='xpekerjaan' id='xpekerjaan' class="form-control select2 custom-select w-100" data-semua='0'>
                                <!-- <option value='' selected='selected'>Pilih Pekerjaan</option> -->
                                <?=$pekerjaan?>
                        </select>
                        <div class="invalid-feedback">
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for='xpendidikan'>Pendidikan</label>
                        <select name='xpendidikan' id='xpendidikan' class="form-control select2 custom-select w-100" data-semua='0'>
                                        <option value='1'>Tidak sekolah/tidak tamat SD</option>
                                        <option value='2'>SD</option>
                                        <option value='3'>SLTP</option>
                                        <option value='4'>SLTA</option>
                                        <option value='5'>Diploma</option>
                                        <option value='6'>S1</option>
                                        <option value='7'>S2/S3</option>
                        </select>
                        
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for='xis_anggota_keluarga_bekerja'>Apakah anggota keluarga bekerja</label>
                        <select  name='xis_anggota_keluarga_bekerja' onchange="kerjaChange($(this).val())" id='xis_anggota_keluarga_bekerja' class="form-control select2 custom-select w-100" data-semua='0'>
                                        <option value='1'>Ya</option>
                                        <option value='2'>Tidak</option>
                        </select>
                        
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for='xpenghasilan'>Jika Ya, Penghasilan</label>
                        <input  name='xpenghasilan' id='xpenghasilan' placeholder='Jumlah Penghasilan' type='number' value='0' class="form-control" aria-describedby="inputGroupPrepend" required />
                        <div class="invalid-feedback">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="$('.modal').modal('hide')">Close</button>
        <button type="submit" class="btn btn-primary" >Simpan</button>
      </div>
       </form>
    </div>
  </div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		// loadDtAr();

    $("#arForm").submit(function(event){
          event.preventDefault(); //prevent default action 
          var post_url = '<?php echo base_url("detail_pemsos_responden/create_ar") ?>'; //get form action url
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
              loadDtAr()
              setTimeout(function() {
                $('.modal').modal('hide')

              }, 3000);
            }else{
              toastr.error(response.message);
            } 
          });

          
      });

     $("#arFormEdit").submit(function(event){
          event.preventDefault(); //prevent default action 
          var post_url = '<?php echo base_url("detail_pemsos_responden/update_ar") ?>'; //get form action url
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
              loadDtAr()
              setTimeout(function() {
              //  location.reload()
                $('#alamat').html('')
                $('#lat').val('')
                $('#lng').val('')
                $('.modal').modal('hide')

              }, 3000);
            }else{
              toastr.error(response.message);
            } 
          });

          
      });

    });

    function loadDtTnr() {
      $('#ARtable').dataTable().fnClearTable();
      $('#ARtable').dataTable().fnDestroy();
    	$('#ARtable').DataTable({
		    ajax: {
		        url: '<?php echo base_url("detail_pemsos_responden/get_tn/").$id;?>',
		        data: function ( d ) {
	                d.<?php echo $this->security->get_csrf_token_name();?> = "<?php echo $this->security->get_csrf_hash();?>"
	            },
		        dataSrc: ''
		    }
		  })
    }


    function addTn($id) {
      $('#AddTn').modal('show')
    }

    function editTn(kode) {
      event.preventDefault(); //prevent default action 
      $.get( "<?php echo base_url("detail_pemsos_responden/edit_tn/") ?>"+kode, function( data ) {
        data = JSON.parse(data)
      $('#arid').val(data.id)
        $('#xnama_anggota_keluarga').val(data.nama)
        $('#xjenis_kelamin').val(data.jenis_kelamin).trigger('change')
        $('#xtanggal_lahir').val(data.tanggal_lahir)
        $('#xstatus_perkawinan').val(data.status_perkawinan).trigger('change')
        $('#xhubungan_dengan_kk').val(data.kode_hubungan_dgn_kk).trigger('change')
        $('#xpekerjaan').val(data.kode_pekerjaan).trigger('change')
        $('#xpendidikan').val(data.pendidikan).trigger('change')
        $('#xis_anggota_keluarga_bekerja').val(data.apakah_anggota_keluarga_bekerja).trigger('change')
        $('#xpenghasilan').val(data.penghasilan_anggota_keluarga_yang_bekerja)
        $('#EditTn').modal('show')

      });
    }

    function kerjaChange(v) {
      if (v==2) {
        $('#xpenghasilan').val(0)
        $('#xpenghasilan').attr('readonly',true)
      }else{
        $('#xpenghasilan').val(0)
        $('#xpenghasilan').attr('readonly',false)

      }
    }
</script>