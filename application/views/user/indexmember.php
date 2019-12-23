<div class="container">
	<div class="sch-bos">
		<h1 align="center">Bingung Mau kos dimana?</h1>
		<h5 align="center">Cari tempat kos idaman kamu disini! Klik - Pesan - Bayar</h5>	
		<input class="sch-kos" align="center" type="text" name="search">
	</div>
	<!-- ini bagian collapse -->
	<button id="collapsible" class="collapsible">Pilih Kriteria Kos Mu Disini</button>
<div class="content-collapse">
	<div class="col-4">
		 <h1><i class="fa fa-user icon"></i> Fasilitas</h1>
		 <hr>
		<span class="container-filter">AC
		  <input name="fasilitas" type="checkbox" checked="checked">
		  <span class="checkmark"></span>
		</span>
		<span class="container-filter">TV
		  <input name="fasilitas" type="checkbox">
		  <span class="checkmark"></span>
		</span>
		<span class="container-filter">Kamar Mandi Dalam
		  <input name="fasilitas" type="checkbox">
		  <span class="checkmark"></span>
		</span>
		<span class="container-filter">Lemari
		  <input name="fasilitas" type="checkbox">
		  <span class="checkmark"></span>
		</span>
	</div>
	<div class="col-4">
		<h1><i class="fa fa-car icon"></i> Parkir</h1>
		<hr>
		<span class="container-filter">Motor
		  <input type="checkbox" name="parkiran" checked="checked">
		  <span class="checkmark"></span>
		</span>
		<span class="container-filter">Mobil
		  <input name="parkiran" type="checkbox">
		  <span class="checkmark"></span>
		</span>
		<span class="container-filter">Garasi
		  <input name="parkiran" type="checkbox">
		  <span class="checkmark"></span>
		</span>
	</div>
	<div class="col-4">
		<h1><i class="fa fa-money icon"></i> Harga</h1>
		<hr>
				<div class="slidecontainer">
				  <input type="range" min="100" max="2000" step="1" value="100" class="slider" id="myRange">
				  <p>Harga 0  s/d <span id="demo"></span> K </p>
				</div>
			</div>
			<input type="submit" class="button-filter" value="Cari Gan">
	</div>
<!-- end collapse -->

<!-- ini konten -->
<div class="content">
	
<div class="headsep"> Rekomendasi Tempat Kos </div>
  <div id="pilkost">
	<?php 
	
	$colcount = 0;
	?>

		<div class="row freespace">
			<?php 
				for ($i = 0; $i < count($kost); ++$i){
				$colcount++;
			?>
			<div onclick="location.href='<?php echo base_url('member/kos/')?><?php echo $kost[$i]->idk; ?>'" class="col-4">
		  <div  class="img-galeri brder">
			<div  class="img-galeri-image">
			<img src="<?php echo base_url().$kost[$i]->foto_kos?>">
			</div>
			<div class="ketkam">
			<p> <?php echo $kost[$i]->nama_kost;?> - <?php echo $kost[$i]->alamat ?> 
			Jumlah Kamar : <?php echo $kost[$i]->jroom;?> - <?php echo $kost[$i]->jenis ?>,
			<?php echo $kost[$i]->nama_kecamatan;?> - <?php echo $kost[$i]->nama_kota ?>  </p>
			</div>
			<div class="buttonklik">Tersedia</div>
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
<script type="text/javascript">
	
//buat filter

	colapseFilter();
	var slider = document.getElementById("myRange");
	var output = document.getElementById("demo");
	output.innerHTML = slider.value;

	slider.oninput = function() {
  	output.innerHTML = this.value;

	}

function colapseFilter(){
var coll = document.getElementsByClassName("collapsible");
var i;
	for (i = 0; i < coll.length; i++) {
	  coll[i].addEventListener("click", function() {
	    this.classList.toggle("active");
	    var content = this.nextElementSibling;
	    if (content.style.maxHeight){
	      content.style.maxHeight = null;
	    } else {
	      content.style.maxHeight = content.scrollHeight + "px";
	    } 
	  });
	}
}

</script>