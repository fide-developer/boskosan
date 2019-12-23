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
						<th>ID Pesanan</th>
						<th>Nama Pemesan</th>
						<th>No. Telepon</th>
						<th>Nama Kos</th>
						<th>Nomor Kamar</th>
						<th>Alamat Kos</th>
						<th>Tanggal Datang</th>
						<th>Tanggal Bayar</th>
						<th>Status</th>
						<th>Nama Pengurus</th>
						<th>No. Telopon Pengurus</th>
						<th>Alamat Pengurus</th>
					</tr>
					<?php 
					$no = 0;
					foreach ($pemesanan->result() as $rb){
					$no++; ?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $rb->bookid; ?></td>
						<td><?php echo $rb->nama_pemesan; ?></td>
						<td><?php echo $rb->hp; ?></td>
						<td><?php echo $rb->nama_kost; ?></td>
						<td><?php echo $rb->nomor_kamar; ?></td>
						<td><?php echo $rb->almkos; ?></td>
						<td><?php echo $rb->tgl_datang; ?></td>
						<td><?php echo $rb->tgl_bayar; ?></td>
						<td><?php echo $rb->stat_book; ?></td>
						<td><?php echo $rb->nama; ?></td>
						<td><?php echo $rb->no_hp; ?></td>
						<td><?php echo $rb->alamat; ?></td>
					</tr>
				<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

</script>