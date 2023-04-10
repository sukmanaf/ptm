<div class="row" id="itemPenetapanModelPemberdayaan<?=$num?>">
    <div class="col-md-6">
        <div class="form-group">
        	
            <label>
                Penetapan Model Pemberdayaan
            </label>
            <select id='jenis_pemberdayaan<?=$num?>' name="id_jenis_pemberdayaan[]" class="form-control select2 " >
            	<?=@$jnsPemberdayaan?>
            </select>
        </div>
    </div>
    <div class="col-md-5">
        <div class="form-group">
            <label>
                Jumlah Subjek (KK)
            </label>
            <input id='jumlah_subjek<?=$num?>' name="jumlah_subjek[]" onkeyup="cekJml(this)" class="numbers jml_subjek form-control w-100" />
        </div>
    </div>
    <div class="col-md-">
        <div class="form-group">
            <label>&nbsp</label></br>
             <button type="button" onclick="del('<?=$num?>')" class="btn btn-danger"><i class="fas fa-minus" ></i></button>
				                                        
        </div>
    </div>
</div>