<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Template Excel UMKM.xls");
?>
<table border="1px;" id="table-front" class="table table-hover dataTable no-footer dtr-inline" aria-describedby="table-front_info" style="width: 100%;">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Anggota Koperasi</th>
			<th>Alamat</th>
			<th>NIK</th>
			<th>Nomor Pengesahan Akta Pendirian Koperasi</th>
			<th>Nomor Badan Hukum Koperasi</th>
			<th>Nama Koperasi</th>
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
				<td><?php echo $dt['nama_anggota_koperasi']; ?></td>
				<td><?php echo $dt['alamat']; ?></td>
				<td><?php echo $dt['nik']; ?></td>
				<td><?php echo $dt['nomor_pengesahan_akta_koperasi']; ?></td>
				<td><?php echo $dt['nomor_badan_hukum_koperasi']; ?></td>
				<td><?php echo $dt['nama_koperasi']; ?></td>
				<td><?php echo $dt['bantuan_pernah_diterima']; ?></td>
				<td><?php echo $dt['keterangan']; ?></td>
			</tr>
		<?php
		}
		?>
		<?php
		for ($x = 0; $x <= 100; $x++) {
			echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
		}
		?>
	</tbody>
</table>