<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Template  Kemeninvest/BKPM.xls");
?>
<table border="1px;" id="table-front" class="table table-hover dataTable no-footer dtr-inline" aria-describedby="table-front_info" style="width: 100%;">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Pelaku Usaha</th>
			<th>Nama Perusahaan</th>
			<th>NIK</th>
			<th>Nomor Induk Berusaha</th>
			<th>Jenis Usaha</th>
			<th>Keterangan</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($db as $dt) {
		?>
			<tr>
				<td><?php echo $dt['nomor']; ?></td>
				<td><?php echo $dt['nama_pelaku_usaha']; ?></td>
				<td><?php echo $dt['nama_perusahaan_yayasan']; ?></td>
				<td><?php echo $dt['nik']; ?></td>
				<td><?php echo $dt['nomor_induk_berusaha']; ?></td>
				<td><?php echo $dt['jenis_usaha']; ?></td>
				<td><?php echo $dt['keterangan']; ?></td>
			</tr>
		<?php
		}
		?>
		<?php
		for ($x = 0; $x <= 100; $x++) {
			echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
		}
		?>
	</tbody>
</table>