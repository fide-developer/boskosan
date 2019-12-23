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
		<a id="brand" href="<?php echo base_url('member')?>"><img src="http://localhost/kriptografi/asset/picture/newbos.png"></a>
		<div class="menu">
			<div class="menuContent">
				<a href="<?php echo base_url('member/booked')?>">Pesanan</a>
			</div>
			<div class="menuContent">
					<?=@$_SESSION['nama'];?>

				<div class="content-drop">
					<a href="#">Edit Profil</a>
					<a href="#">Ubah Kata Sandi</a>
					<a href="<?php echo base_url(); ?>member/logout">Keluar</a>
				</div>	
			</div>
			<!-- <ul>
				<li>
					<ul><i class="fa fa-user icon" style="color: white"></i><a onclick="document.getElementById('contentDrop').style.display='block'"></a>
						<li id="contentDrop">
						</li>
					</ul>
				</li> 
				<li>Booked</a></li>
			</ul> -->
		</div>
	</nav>
<!-- start konten -->
<?php echo $contents ?>
<!-- end konten -->
	
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
<script type="text/javascript">
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

</script>

</body>
</html>