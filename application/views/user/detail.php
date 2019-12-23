<div class="container">
	<div class="sch-bos">
		<div class="">
		<h1 align="center"><?php echo $show['nama_kost']; ?></h1>
		<h5 align="center"><?php echo $show['alamat']; ?></h5>
		<?php echo anchor('member/logout','LOGOUT');?>
	</div>
			<div class="content">
				<div class="row freespace">	
					<div class="col-6">
						<div class="col-identitas brder">
							<img src="<?php echo base_url()?><?php echo $show['foto_kos']?>">
							<table>
								<tr>
									<td>Nama</td>
									<td>:</td>
									<td><?php echo $show['nama']?></td>
								</tr>
								<tr>
									<td>Alamat</td>
									<td>:</td>
									<td><?php echo $show['alamat_user']?></td>
								</tr>
								<tr>
									<td>No. Telepon</td>
									<td>:</td>
									<td><?php echo $show['no_hp']?></td>
								</tr>
							</table>
						</div>
					</div>
					
					<div class="col-6">
						<div class="col-fasilitas brder">
							<div class="col-daftarfasilitas">
								<h5>Fasilitas Umum <?php echo $show['nama_kost'];?> : </h5><p><?php echo $show['fas_kos']; ?></p>
							</div>
							<div class="col-picfasilitas">
								
									<img id="Slide" class="imgSlide" src="<?php echo base_url()?><?php echo $show['foto_kos'];?>">
									<img id="Slide" class="imgSlide" src="<?php echo base_url()?><?php echo $show['foto_halaman'];?>">
									<img id="Slide" class="imgSlide" src="<?php echo base_url()?><?php echo $show['foto_parkir'];?>">
								
								<div class="">
									<div class="caption-img"></div>
									<div class="btn-nslide left" onclick="plusDivs(-1)">&#10094;</div>
									<div class="btn-nslide right" onclick="plusDivs(1)">&#10095;</div>
								
									<span class="" onclick="currentDiv(1)"></span>
									<span class="" onclick="currentDiv(2)"></span>
									<span class="" onclick="currentDiv(3)"></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
	</div>
</div>	
	<!-- ini bagian conten kamar -->
<div class="content">
	
	<div class="headsep"> Daftar Kamar Kos </div>	
<div id="pilkost">
	<?php 
	
	$colcount = 0;
	?>

		<div class="row freespace">
			<?php 
				for ($i = 0; $i < count($room); ++$i){
				$colcount++;
			?>
			<div onclick="location.href='<?php echo base_url('member/detail/')?><?php echo $room[$i]->id_r; ?>'" class="col-4">
		  <div  class="img-galeri brder">
			<div  class="img-galeri-image">
			<img src="<?php echo base_url().$room[$i]->depan_kamar;?>">
			<div class="harga">Rp. <?php echo number_format($room[$i]->harga,2) ?></div>
			</div>
			<div class="ketkam">
			<p>Kamar <?php echo $room[$i]->nomor_kamar;?> <br> <?php echo $room[$i]->keterangan; ?></p>
			</div>
			<?php if ($room[$i]->status == '1') {
				echo '<div class="buttonklik">Tersedia</div>';
			}else{
				echo '<div class="buttonklik">Tidak Tersedia</div>';	
			} ?>
			
		  </div>
		</div>

			<?php
			$coltest = $colcount%3;
			if($coltest == 0) echo '</div><div class="row freespace">';
			}
			?>		
		</div>
		</div>
	</div>
</div>
</div>
<script type="text/javascript">
	function hidenav() {
var divsToHide = document.getElementsByClassName("carousel");

    for(var i = 0; i < divsToHide.length; i++)
    {
    divsToHide[i].style.visibility="hidden";
    }
	}
</script>