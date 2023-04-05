<div id="row1" class="row" style="margin-bottom: 10px">
	<div class="col-md-3">
		<select  id='sektor_usaha<?=$id?>' onchange="sektorChangeA($(this).val(),'<?=$id?>')" name='sektor_usaha[]' class="select2 custom-select w-100" data-semua='0'>
            	<option value="">-- Pilih Sektor --</option>
            	<?php
            		foreach ($sektor as $key => $value) { ?>
            			<option value="<?=$value->kode_sektor_usaha?>"><?=$value->deskripsi?></option>
            		<?php }
            	?>
        </select>
	</div>
	<div class="col-md-4">
		<select id='sub_sektor_usaha<?=$id?>' onchange="subSektorChangeA($(this).val(),'<?=$id?>')" name='sub_sektor_usaha' class="form-control select2 custom-select w-100" data-semua='0'>
            </select>
	</div>
	<div class="col-md-4">
		<select id='jenis_sub_sektor_usaha<?=$id?>' name='jenis_sub_sektor_usaha' class="form-control select2 custom-select w-100" data-semua='0'>
            </select>
	</div>
	<div class="col-md-1">
		<button class="btn btn-danger" onclick="del('<?=$id?>')"><i class="fas fa-minus" ></i></button>
	</div>

</div>