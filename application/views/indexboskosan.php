<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=content-width, initial-scale=1.0">
<link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url('asset/css/boskosan.css');?>">	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<style type="text/css">

</style>
<body>
	

	<nav id="navoffset">
		<a id="brand" href="<?php echo base_url('welcome/get_kost') ?>"><img src="http://localhost/kriptografi/asset/picture/newbos.png"></a>
		<div class="right-menu">
			<ul>
				<li><a href="<?php echo base_url('register')?>">Daftar</a></li>
				<li><a onclick="document.getElementById('id_log').style.display='block'">Login</a></li> 
			</ul>
		</div>
	</nav>
	<div class="container">
	<div class="sch-bos">
		<h1 align="center">Bingung Mau kos dimana?</h1>
		<h5 align="center">Cari tempat kos idaman kamu disini! Klik - Pesan - Bayar</h5>	
		<input class="sch-kos" align="center" type="text" name="search">
	</div>
	<!-- ini bagian collapse -->
	<button id="collapsible" onclick="collapseStart();" class="collapsible">Pilih Kriteria Kos Mu Disini</button>
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
		<div onclick="location.href='<?php echo base_url('boskosan/kos/')?><?php echo $kost[$i]->id ?>'" class="col-4">
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
<!-- end konten -->

<div id="id_log" class="modal">
		  <!-- Modal content -->
					  <form class="modal-content animate" method="POST" action="<?php echo base_url('auth')?>">
					  	
						<div class="container-book">
							<span onclick="document.getElementById('id_log').style.display='none'" class="close" title="Close Modal">&times;</span>
					      <div class="input-modal"> <label for="username" style="margin-left: 1%"><b>Username</b></label>
					     <input type="text" name="username" required></div>

					      <div class="input-modal"><label for="password" style="margin-left: 1%"><b>Password</b></label>
					      <input type="password" name="password" required></div>
					       <div style="text-align: right;padding: 20px;">
						      <button type="button" onclick="document.getElementById('id_log').style.display='none'" class="cancelbtn">Batal</button>
						      <button type="submit" class="button-modal">Login</button>
					       </div> 
					      </div>
					  </form>
					</div>
<footer>
			<div id="brandfoot">w w w . b o s k o s a n . c o m<br><br><br>disini pengenalan web</div>
</footer>





<!-- <script type="text/javascript" src="<?php //echo base_url('asset/js/jQuery.min.js') ?>"></script> -->
<script type="text/javascript">

//js untuk carousel 
if (document.getElementsByClassName('carousel')){
	var myIndex = 0,
    container = document.getElementsByClassName('carousel')[0];

carousel();

}

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

//buat filter
function collapseStart(){

	colapseFilter();
	var slider = document.getElementById("myRange");
	var output = document.getElementById("demo");
	output.innerHTML = slider.value;

	slider.oninput = function() {
  	output.innerHTML = this.value;

}

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

if(document.getElementById('id_log')){
	modalLogin();
}
function modalLogin(){
// Get the modal
var modal = document.getElementById('id_log');

// When the user clicks anywhere outside of the modal, close it
	window.onclick = function(event) {
	    if (event.target == modal) {
	        modal.style.display = "none";
	    }
	}
}
</script>
</body>
</html>