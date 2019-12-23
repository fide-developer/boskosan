<div class="container">
	<div class="sch-bos">
		<h1 align="center">Sistem Administrator Boskosan.com</h1>
		<hr>
	</div>
	<!-- ini bagian collapse -->
	<div class="content">
		<div class="row frespace">
			<div class="col-12">
				<h4 align="center">--- Data Kos ---</h4>
			</div>
			<div class="col-12">
				<table>
					<tr>
						<th>No</th>
						<th>Nama Kosan</th>
						<th>Jumlah Kamar</th>
						<th>Alamat Kosan</th>
						<th>Nama Pengurus</th>
						<th>No. Telepon Pengurus</th>
						<th>Alamat Pengurus</th>
					</tr>
					<?php 
					$no = 0;
					foreach ($kos->result() as $rb){
					$no++; ?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $rb->nama_kost; ?></td>
						<td><?php echo $rb->jroom; ?></td>
						<td><?php echo $rb->alamat; ?></td>
						<td><?php echo $rb->nama; ?></td>
						<td><?php echo $rb->no_hp; ?></td>
						<td><?php echo $rb->alamat_pengurus; ?></td>
					</tr>
				<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

</script>