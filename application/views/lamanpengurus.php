<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url('asset/css/boskosan.css');?>">	
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
</head>
<body>
	<nav id="navoffset">
		<a id="brand" href="#"><img src="http://localhost/kriptografi/asset/picture/newbos.png"></a>
	</nav>
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
								<span class="th-profil">Your Name <span class="btn-modal">Button</span></span>
								 <br>JL. Alamat Pengurus Kos Kec. Kel. Kota
								 <br>Jumlah Tempat Kos
								 <br>Contact
							</div>	
						</div>
					</div>
					<div class="row">
					<a id="btn-modal" href="#"><div class="buttonmnu">Tambah Tempat Kos</div></a>
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
					<div class="main-content brder">
						<div class="row">
							<img class="boximg" style="float: left;" src="<?php echo base_url('asset/picture/1.jpg') ?>">
							<div style="float: left;text-align:left;margin-left:1%;padding-left: 2%;border-left: 2px solid #bdbdbd">
								<span class="th-profil">Nama Kos </span>- alamat kos
								<br>jumlah kamar
								<br>jumlah kamar Kosong
								<br>Dilihat Nx
								<br>Dipesan Nx
							</div>		
						</div>
					</div>
				</div>
			</div>
		</div>
</div>
<!-- end konten -->
<footer>
			<div id="brandfoot">w w w . b o s k o s a n . c o m<br><br><br>disini pengenalan web</div>
</footer>
<!-- <script type="text/javascript" src="<?php //echo base_url('asset/js/jQuery.min.js') ?>"></script> -->
<script>
//js loadmore
/*document.addEventListener("DOMContentLoaded", function() {
  myPage();
});
function myPage(){
	var page = 1;
	$.ajax({
		url:"<?php //echo base_url('boskosan/get_kost') ?>",
		data: "limit="+page,
		type:"POST",

		success:function(response){
			var data = JSON.parse(response);
			var items=[];
			$('#pilkost').html('');
			$.each(data, function(key,val){
					items.push("<div onclick='linkin()' class='col-4'><div  class='img-galeri'><img src='<?php //echo base_url("asset/picture/1.jpg") ?>'><div class='harga'>Rp 1.999.999,-</div><p> "+val.nama_kost+" - "+val.alamat+" </p><p> Jenis Room : "+val.jenis+" </p><p>Klik Untuk Lihat Detail</p></div></div>");
			});
			$('#pilkost').html("<h1>finnaly Jquey</h1>");
			$('#pilkost').append.apply($('#pilkost'), items);
		},
		error:function(){
			console.log("ERROR!");
		}
	});
}
function linkin(){
	location.href="";
}
function loadmore(){
}*/
//js untuk img slideshow
if(document.getElementById("Slide")){
	var slideIndex = 1;
	imgSlide(slideIndex);
}
function plusDivs(n) {
  imgSlide(slideIndex += n);
}

function imgSlide(n) {
  var i;
  var x = document.getElementsByClassName("imgSlide");
  if (n > x.length) {slideIndex = 1}   
  if (n < 1) {slideIndex = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex-1].style.display = "block";  
}
//js untuk carousel 
if (document.getElementById('carousel')) {
	var myIndex = 0;
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
    myIndex = 1;
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

var navbar = document.getElementById("navoffset");
var sticky = navbar.offsetTop;

function myFunction() {
  if (window.pageYOffset >= sticky) {
    navbar.classList.add("sticky");
  } else{
    navbar.classList.remove("sticky");
  }
}

//buat link di div

</script>

<!-- <script type="text/javascript">
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
 --></body>
</html>