<!DOCTYPE html>
<html>
<title>BOSKOSAN - Detail</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url('asset/css/boskosan.css');?>">	
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/bosalvin.css')?>">

</head>
<body>
	
	
	<nav>
		<a id="brand" href="#"><img src="http://localhost/kriptografi/asset/picture/newbos.png"></a>
	</nav>
	<div class="container">
		<div class="row">	
			<div class="history">
				<ul class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li><a href="#">NamaKos</a></li>
				  <li>NomorKamar</li>
				</ul>
			</div>
		</div>

		<div class ="content-detail brder">
				<div class="det-kos"><h3> Nama Kos - Nomor Kamar</h3>
				<hr>
				</div>
			<div class="row-det">
			  <div class="column-det">
			    <img src="<?php echo base_url('asset/picture/juju/1.jpg')?>" style="width:100%" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
			  </div>
			  <div class="column-det">
			    <img src="<?php echo base_url('asset/picture/juju/2.jpg')?>" style="width:100%" onclick="openModal();currentSlide(2)" class="hover-shadow cursor">
			  </div>
			  <div class="column-det">
			    <img src="<?php echo base_url('asset/picture/juju/3.jpg')?>" style="width:100%" onclick="openModal();currentSlide(3)" class="hover-shadow cursor">
			  </div>
			  <div class="column-det">
			    <img src="<?php echo base_url('asset/picture/juju/1.jpg')?>" style="width:100%" onclick="openModal();currentSlide(4)" class="hover-shadow cursor">
			  </div>
			  <button class="order-but" id="myBtn" onclick="document.getElementById('id01').style.display='block'" >Pesan</button>	
			</div>
		</div>

		<div id="myModal" class="modal-det">
		  <span class="close cursor" onclick="closeModal()">&times;</span>
		  <div class="modal-condet">

		    <div class="mySlides">
		      <div class="numbertext">1 / 4</div>
		      <img src="<?php echo base_url('asset/picture/juju/1.jpg')?>" style="width: 100%; ">
		    </div>

		    <div class="mySlides">
		      <div class="numbertext">2 / 4</div>
		      <img src="<?php echo base_url('asset/picture/juju/2.jpg')?>" style="width: 100%; ">
		    </div>

		    <div class="mySlides">
		      <div class="numbertext">3 / 4</div>
		      <img src="<?php echo base_url('asset/picture/juju/3.jpg')?>" style="width: 100%; ">
		    </div>
		    
		    <div class="mySlides">
		      <div class="numbertext">4 / 4</div>
		      <img src="<?php echo base_url('asset/picture/juju/1.jpg')?>" style="width: 100%; ">
		    </div>
		    
		    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		    <a class="next" onclick="plusSlides(1)">&#10095;</a>

		    <div class="caption-container">
		      <p id="caption"></p>
		    </div>
			
			<div class="column-det">
			      <img class="demo cursor" src="<?php echo base_url('asset/picture/juju/1.jpg')?>" onclick="currentSlide(1)" style="width: 100%" alt="Depan Kamar">
			    </div>
			    <div class="column-det">
			      <img class="demo cursor" src="<?php echo base_url('asset/picture/juju/2.jpg')?>" onclick="currentSlide(2)" style="width: 100%" alt="Kamar">
			    </div>
			    <div class="column-det">
			      <img class="demo cursor" src="<?php echo base_url('asset/picture/juju/3.jpg')?>" onclick="currentSlide(3)" style="width: 100%" alt="Kamar Mandi">
			    </div>
			    <div class="column-det">
			      <img class="demo cursor" src="<?php echo base_url('asset/picture/juju/1.jpg')?>" onclick="currentSlide(4)" style="width: 100%" alt="View ke Luar">
			    </div>
			  </div>
			</div>

		<!-- ini mungkin keterangan -->
		<div id="ketkamar" class="brder">
			<h3>Fasilitas Kamar</h3>
			<hr>
		<div class="row freespace">
   <div class="column-facil">
    <div class="content-facil">
		<div class="formid"><i class="fa fa-user icon" style="font-size: 60px; color: #610202"></i></div>
		<h2 align="center" >RUMAH</h2>
    </div>
  </div>
  <div class="column-facil">
    <div class="content-facil">
		<div class="formid"><i class="fa fa-user icon" style="font-size: 60px; color: #610202"></i></div>
		<h2 align="center" >RUMAH</h2>
    </div>
  </div>
  <div class="column-facil">
    <div class="content-facil">
		<div class="formid"><i class="fa fa-user icon" style="font-size: 60px; color: #610202"></i></div>
		<h2 align="center" >RUMAH</h2>
    </div>
  </div>
  <div class="column-facil">
    <div class="content-facil">
		<div class="formid"><i class="fa fa-user icon" style="font-size: 60px; color: #610202"></i></div>
		<h2 align="center" >RUMAH</h2>
    </div>
  </div>
		</div>
		
		</div>

		<div id="id01" class="modal">
		  <!-- Modal content -->
					  <form class="modal-content animate" action="/action_page.php">
						<div class="container-book">
					      <label for="tgl-book"><b>Tanggal Datang</b></label>
					      <div class="input-modal"><input type="date" name="tgl-book" required></div>

					      <label for="nama"><b>Nama</b></label>
					      <div class="input-modal"><input type="text" name="nama" required></div>

					      <label for="no_hp"><b>Nomor Handphone</b></label>
					      <div class="input-modal"><input type="text" name="no_hp" required></div>

					      <label for="email"><b>Email</b></label>
					      <div class="input-modal"><input type="text" name="email" required></div>
					        
					      <button type="submit" class="button-modal">Pesan</button>
					      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
					    </div>
					  </form>
					</div>
		<!-- END MODAL -->
<footer>
			<div id="brandfoot">w w w . b o s k o s a n . c o m<br><br><br>disini pengenalan web</div>
</footer>






<script>

//js untuk carousel 
// var myIndex = 0,
//     container = document.getElementsByClassName('carousel')[0];

// carousel();

// function carousel() {
//   var i,
//       el,
//       x = document.getElementsByClassName("carouseljs");
//   for (i = 0; i < x.length; i++) {
//     x[i].style.opacity= "0";
//   }
//   myIndex++;
//   if (myIndex > x.length) {
//     myIndex = 1
//   }
//   el = x[myIndex - 1];
//   container.style.height = el.height + 'px';
//   setTimeout(function() {
//     el.style.opacity = "1";
//     setTimeout(carousel, 5000);
//   },300);
// }

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


</script>

<script type="text/javascript">
//buat filter
// var coll = document.getElementsByClassName("collapsible");
// var i;

// for (i = 0; i < coll.length; i++) {
//   coll[i].addEventListener("click", function() {
//     this.classList.toggle("active");
//     var content = this.nextElementSibling;
//     if (content.style.maxHeight){
//       content.style.maxHeight = null;
//     } else {
//       content.style.maxHeight = content.scrollHeight + "px";
//     } 
//   });
// }

function openCity(cityName,elmnt,color) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablink");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
    }
    document.getElementById(cityName).style.display = "block";
    elmnt.style.backgroundColor = color;

}
// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
<script type="text/javascript">
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
<script type="text/javascript">
	function openModal() {
  document.getElementById('myModal').style.display = "block";
}

function closeModal() {
  document.getElementById('myModal').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}

</script>
</body>
</html>