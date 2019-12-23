<div class="container">
	<div class="sch-bos">
		<h1 align="center">Sistem Administrator Boskosan.com</h1>
		<hr>
	</div>
	<!-- ini bagian collapse -->
	<div class="content">
		<div class="row frespace">
			<div class="col-12">
				<h4 align="center">--- Data Member ---</h4>
			</div>
			<div class="col-12">
				<table>
					<tr>
						<th>No</th>
						<th>ID Pengguna</th>
						<th>Nama User</th>
						<th>No. Telepon</th>
						<th>Email</th>
						<th>Alamat</th>
						<th>Tanggal Dibuat</th>
						<th>Terakhir Login</th>
					</tr>
					<?php 
					$no = 0;
					foreach ($member->result() as $rb){
					$no++; ?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $rb->username; ?></td>
						<td><?php echo $rb->nama; ?></td>
						<td><?php echo $rb->no_hp; ?></td>
						<td><?php echo $rb->email; ?></td>
						<td><?php echo $rb->alamat; ?></td>
						<td><?php echo $rb->created_on; ?></td>
						<td><?php echo $rb->last_login; ?></td>
					</tr>
				<?php } ?>
				</table>
			</div>
			<div class="col-12">
				<h4 align="center">--- Data Pengurus ---</h4>
			</div>
			<div class="col-12">
				<table>
					<tr>
						<th>No</th>
						<th>ID Pengguna</th>
						<th>Nama User</th>
						<th>No. Telepon</th>
						<th>Email</th>
						<th>Alamat</th>
						<th>Tanggal Dibuat</th>
						<th>Terakhir Login</th>
					</tr>
					<?php 
					$no = 0;
					foreach ($pengurus->result() as $rb){
					$no++; ?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $rb->username; ?></td>
						<td><?php echo $rb->nama; ?></td>
						<td><?php echo $rb->no_hp; ?></td>
						<td><?php echo $rb->email; ?></td>
						<td><?php echo $rb->alamat; ?></td>
						<td><?php echo $rb->created_on; ?></td>
						<td><?php echo $rb->last_login; ?></td>
					</tr>
				<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

</script>