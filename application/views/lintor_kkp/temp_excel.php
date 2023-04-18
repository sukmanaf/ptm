<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Template Excel KKP.xls");
?>
<table border="1px;" id="table-front" class="table table-hover dataTable no-footer dtr-inline" aria-describedby="table-front_info" style="width: 100%;">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Nelayan</th>
			<th>Alamat</th>
			<th>NIK</th>
			<th>Nomor Kusuka</th>
			<th>Nomor Kartu Layanan</th>
			<th>Nomor Aqua Card</th>
			<th>Nama Kelompok</th>
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
				<td><?php echo $dt['nama_nelayan']; ?></td>
				<td><?php echo $dt['alamat']; ?></td>
				<td><?php echo $dt['nik']; ?></td>
				<td><?php echo $dt['nomor_kusuka']; ?></td>
				<td><?php echo $dt['nomor_kartu_nelayan']; ?></td>
				<td><?php echo $dt['nomor_aqua_card']; ?></td>
				<td><?php echo $dt['nama_kelompok']; ?></td>
				<td><?php echo $dt['bantuan_pernah_diterima']; ?></td>
				<td><?php echo $dt['keterangan']; ?></td>
			</tr>
		<?php
		}
		?>
		<?php
		for ($x = 0; $x <= 100; $x++) {
			echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
		}
		?>
	</tbody>
</table>