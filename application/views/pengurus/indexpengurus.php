<div class="container">
		<div class="content">
			<div class="row">
				<div class="col-12"><div class="profilid brder">
					<div class="row">
						<div class="col-5">
							<div class="profilimg">
								<img class="boximg" src="<?php echo base_url('asset/picture/1.jpg') ?>">		
							</div>
						</div>
						<div class="col-7">
							<div class="text-profil">
								<span class="th-profil"><?php echo $users['nama']; ?>&nbsp;-&nbsp;<span class="btn-modal">Button</span></span>
								 <br><?php echo $users['alamat']; ?>
								 <br>Jumlah Kos yang dimiliki : <?php echo $con; ?>
								 <br><?php echo $users['no_hp'];?> - <?php echo $users['email'];?>
							</div>	
						</div>
					</div>
					<div class="row">
					<a id="btn-modal" href="<?php echo base_url('pengurus/pengurus_input');?>"><div class="buttonmnu">Tambah Tempat Kos</div></a>
					</div>
				</div></div>
			</div>
			<div class="row freespace">
				<div class="col-3">
					<div class="navmenu brder">
						<a href="#">asd</a>
						<a href="#">asd</a>
						<a href="#">asd</a>
						<a href="#">asd</a>
						<a href="#">asd</a>
					</div>
				</div>
				<div class="col-9">
					<?php foreach ($kos as $ks) { ?>
					<div class="main-content brder">
						
						<div class="row">
							<img class="boximg" style="float: left;" src="<?php echo $ks->foto_kos; ?>">
							<a style="float: right; margin-top: -2.9%" href="<?php echo base_url('pengurus/pengurus_room/'.$ks->id)?>"><button class="order-but">Tambah Kamar</button></a>
							<div style="float: left;text-align:left;margin-left:1%;padding-left: 2%;border-left: 2px solid #bdbdbd">
								<span class="th-profil"><?php echo $ks->nama_kost ?> </span>- <?php echo $ks->alamat?>
								<br>Jumlah Kamar : <?php echo $ks->jroom; ?> Ruangan
								<br>Jumlah kamar Kosong : <?php echo $ks->r_kosong; ?> Ruangan
								<br>Dilihat Nx
								<br>Dipesan Nx
							</div>
						</div>
					</div>
					<?php
						}
						?>			
				</div>
			</div>
		</div>
</div>		