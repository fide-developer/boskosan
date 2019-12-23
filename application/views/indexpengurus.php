<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=width, initial-scale=1.0">
<link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url('asset/css/boskosan.css');?>">	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style type="text/css">

</style>
<body>
	
	<div class="carousel">
			<img class="carouseljs" src="<?php echo base_url('asset/picture/1.jpg') ?>">
			<img class="carouseljs" src="<?php echo base_url('asset/picture/2.jpg') ?>">
			<img class="carouseljs" src="<?php echo base_url('asset/picture/3.jpg') ?>">
		</div>
	<nav>
		<a id="brand" href="#"><img src="http://localhost/kriptografi/asset/picture/newbos.png"></a>
	</nav>
	<div class="container">
	<div class="sch-bos">
		<h1 align="center">Bingung Mau kos dimana?</h1>
		<h5 align="center">Cari tempat kos idaman kamu disini! Klik - Pesan - Bayar</h5>	
		<input class="sch-kos" align="center" type="text" name="search">
	</div>
	<!-- ini bagian collapse -->
	<button class="collapsible">Pilih Kriteria Kos Mu Disini</button>
<div class="content-collapse">
	<div class="col-4">
		 <h1><i class="fa fa-user icon"></i> Fasilitas</h1>
		<label class="container-filter">AC
		  <input type="checkbox" checked="checked">
		  <span class="checkmark"></span>
		</label>
		<label class="container-filter">TV
		  <input type="checkbox">
		  <span class="checkmark"></span>
		</label>
		<label class="container-filter">Kamar Mandi Dalam
		  <input type="checkbox">
		  <span class="checkmark"></span>
		</label>
		<label class="container-filter">Lemari
		  <input type="checkbox">
		  <span class="checkmark"></span>
		</label>
</div>
	<div class="col-4">
		<h1><i class="fa fa-car icon"></i> Parkir</h1>
		<label class="container-filter">Motor
		  <input type="checkbox" checked="checked">
		  <span class="checkmark"></span>
		</label>
		<label class="container-filter">Mobil
		  <input type="checkbox">
		  <span class="checkmark"></span>
		</label>
		<label class="container-filter">Garasi
		  <input type="checkbox">
		  <span class="checkmark"></span>
		</label>
	</div>
	<div class="col-4">
		<h1><i class="fa fa-money icon"></i> Harga</h1>
		<div class="slidecontainer">
		  <input type="range" min="100" max="2000" value="50" class="slider" id="myRange">
		  <p>Harga: >= <span id="demo"></span> K </p>
		</div>
	</div>
	<button class="button-filter">Cari Gan</button>
</div>
<!-- end collapse -->

<!-- ini konten -->
<div class="content">
	
	<div class="headsep"> Rekomendasi Tempat Kos </div>
	
	<?php 
	
	$colcount = 0;
	?>

	<div class="row freespace">
		<?php 
			for ($i = 0; $i < count($kost); ++$i){
			$colcount++;
		?>
		<div onclick="location.href='url'" class="col-4">
			<div  class="img-galeri">
			<img src="<?php echo base_url().$kost[$i]->pic?>">
			<div class="harga">Rp <?php echo number_format($kost[$i]->harga,2) ?></div>
			<p> <?php echo $kost[$i]->nama_kost;?> - <?php echo $kost[$i]->alamat ?>  </p>
			<p> Fasilitas  : </p>
			<p>Klik Untuk Lihat Detail</p>
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
<!-- end konten -->
<footer>
			<div id="brandfoot">w w w . b o s k o s a n . c o m<br><br><br>disini pengenalan web</div>
</footer>






<script>

//js untuk carousel 
var myIndex = 0,
    container = document.getElementsByClassName('carousel')[0];

carousel();

function carousel() {
  var i,
      el,
      x = document.getElementsByClassName("carouseljs");
  for (i = 0; i < x.length; i++) {
    x[i].style.opacity= "0";
  }
  myIndex++;
  if (myIndex > x.length) {
    myIndex = 1
  }
  el = x[myIndex - 1];
  container.style.height = el.height + 'px';
  setTimeout(function() {
    el.style.opacity = "1";
    setTimeout(carousel, 5000);
  },300);
}

// js untuk sticky navbar
window.onscroll = function() {myFunction()};

var navbar = document.getElementsByTagName("nav")[0];
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky");
  } else {
    navbar.classList.remove("sticky");
  }
}

//buat link di div
$("div").click(function(){
   window.location=$(this).find("a").attr("href"); return false;
})
</script>

<script type="text/javascript">
//buat filter
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
</script>
<script type="text/javascript">
var slider = document.getElementById("myRange");
var output = document.getElementById("demo");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
}
</script>
</body>
</html>