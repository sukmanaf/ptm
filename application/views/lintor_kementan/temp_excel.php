<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Template Excel.xls");
?>
<table border="1px;" id="table-front" class="table table-hover dataTable no-footer dtr-inline" aria-describedby="table-front_info" style="width: 100%;">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Petani</th>
			<th>Alamat</th>
			<th>Nomor SK Pengesahan</th>
			<th>Nomor Register</th>
			<th>Nama Kelompok Tani</th>
			<th>Bantuan Pernah Diterima</th>
			<th>Keterangan</th>
		</tr>
	</thead>
	<tbody>
		<?php
		foreach ($db as $dt) {
		?>
			<tr>
				<td><?php echo $dt['nomor']; ?></td>
				<td><?php echo $dt['nama_petani']; ?></td>
				<td><?php echo $dt['alamat']; ?></td>
				<td><?php echo $dt['nomor_sk_pengesahan']; ?></td>
				<td><?php echo $dt['nomor_register']; ?></td>
				<td><?php echo $dt['nama_kelompok_tani']; ?></td>
				<td><?php echo $dt['bantuan_pernah_diterima']; ?></td>
				<td><?php echo $dt['keterangan']; ?></td>
			</tr>
		<?php
		}
		?>
		<?php
		for ($x = 0; $x <= 100; $x++) {
			echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
		}
		?>
	</tbody>
</table>