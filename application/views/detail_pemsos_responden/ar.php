
<div class="row">
  
  <div class="col-md-12">
    <button onclick="addAr(<?=$id?>)" type="button" class="btn btn-warning" style="float: right;margin: 10px"><i class="fas fa-plus mr-2 text-white"></i>Baru</button>
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




<div class="modal" tabindex="-1" id="AddAr">
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
                AR. Anggota Keluarga
            </h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-9 col-md-9 col-xs-12">
                    <div class="form-group">
                        <label for='fc_nama_anggota_keluarga'>Nama Anggota Keluarga</label>
                        <input name='nama_anggota_keluarga' id='fc_nama_anggota_keluarga' placeholder='Nama Anggota Keluarga' type='text' value='' minlength='1' maxlength='100' class="form-control" aria-describedby="inputGroupPrepend" required />
                        <div class="invalid-feedback">
                            
                        </div>
                    </div>
                </div>
                <div class="col-sm-3 col-md-3 col-xs-12">
                    <div class="form-group">
                        <label for='fc_jenis_kelamin'>Jenis Kelamin</label>
                        <select name='jenis_kelamin' id='fc_jenis_kelamin' class="form-control select2 custom-select w-100">
                                        <option value='L'>Laki - Laki</option>
                                        <option value='P'>Perempuan</option>
                        </select>
                        
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">
                        <label for='fc_tanggal_lahir'>Tanggal Lahir</label>
                        <div class="input-group date" id="tanggal_lahir" data-target-input="nearest">
                            <input name='tanggal_lahir' id='fc_tanggal_lahir' placeholder='Tanggal Lahir' type='date' value='<?=date('Y-m-d')?>' class="form-control " />
                            
                        </div>
                        
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 col-xs-12">
                    <div class="form-group">
                        <label for='fc_status_perkawinan'>Status Perkawinan</label>
                        <select name='status_perkawinan' id='fc_status_perkawinan' class="form-control select2 custom-select w-100" data-semua='0'>
                                        <option value='1'>Belum Menikah</option>
                                        <option value='2'>Menikah</option>
                                        <option value='3'>Bercerai Pisah</option>
                                        <option value='4'>Bercerai Mati</option>
                        </select>
                        
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for='fc_hubungan_dengan_kk'>Hubungan dengan Kepala Keluarga</label>
                        <select id='hubungan_kepala_keluarga' name='hubungan_dengan_kk' id='fc_hubungan_dengan_kk' class="form-control select2 custom-select w-100" data-semua='0'>
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
                        <label for='fc_pekerjaan'>Pekerjaan</label>
                        <select id='pekerjaan' name='pekerjaan' id='fc_pekerjaan' class="form-control select2 custom-select w-100" data-semua='0'>
                                <!-- <option value='' selected='selected'>Pilih Pekerjaan</option> -->
                                <?=$pekerjaan?>
                        </select>
                        <div class="invalid-feedback">
                            
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for='fc_pendidikan'>Pendidikan</label>
                        <select name='pendidikan' id='fc_pendidikan' class="form-control select2 custom-select w-100" data-semua='0'>
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
                        <label for='fc_is_anggota_keluarga_bekerja'>Apakah anggota keluarga bekerja</label>
                        <select id="anggota_keluarga_bekerja" name='is_anggota_keluarga_bekerja' id='fc_is_anggota_keluarga_bekerja' class="form-control select2 custom-select w-100" data-semua='0'>
                                        <option value='1'>Ya</option>
                                        <option value='2'>Tidak</option>
                        </select>
                        
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for='fc_penghasilan'>Jika Ya, Penghasilan</label>
                        <input id="jumlah_penghasilan" name='penghasilan' id='fc_penghasilan' placeholder='Jumlah Penghasilan' type='number' value='0' class="form-control" aria-describedby="inputGroupPrepend" required />
                        <div class="invalid-feedback">
                            
                        </div>
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
                $('#AddAr').modal('hide')

              }, 3000);
            }else{
              toastr.error(response.message);
            } 
          });

          
      });

    });

    function loadDtAr() {
      $('#ARtable').dataTable().fnClearTable();
      $('#ARtable').dataTable().fnDestroy();
    	$('#ARtable').DataTable({
		    ajax: {
		        url: '<?php echo base_url("detail_pemsos_responden/get_ar/").$id;?>',
		        data: function ( d ) {
	                d.<?php echo $this->security->get_csrf_token_name();?> = "<?php echo $this->security->get_csrf_hash();?>"
	            },
		        dataSrc: ''
		    }
		  })
    }


    function addAr($id) {
      $('#AddAr').modal('show')
    }
</script>