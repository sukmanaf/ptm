<tr id="tr<?=$num?>">
	<td>
		<div class="custom-file">
			<input type="file" name="upload_evidence<?=$num?>" id="upload_evidence<?=$num?>" class="form-control"  />
		</div>
	</td>
	<td>
		<select name="jenis_evidence<?=$num?>" id="jenis_evidance" class="form-control select2">
				<option value="">--Pilih Evidence--</option>
			<?php foreach ($get as $key => $value): ?>
				<option value="<?=$value->kode_evidence?>"><?=$value->nama?></option>
			<?php endforeach ?>
		</select>
	</td>
	<td>
		<button type="button" onclick="delAppend(<?=$num?>)" class="btn btn-success" id="minus<?=$num?>"> <i class="fas fa-minus"></i></button>
	</td>
</tr>
