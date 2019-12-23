	<div class="container">
		<div class="row">	
			<div class="history">
				<ul class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li><a href=""><?php echo $show['nama_kost'] ?></a></li>
				  <li>Kamar <?php echo $show['nomor_kamar'] ?></li>
				</ul>
			</div>
		</div>

		<div class ="content-detail brder">
				<div class="det-kos"><h3> Nama Kos - Kamar <?php echo $show['nomor_kamar'] ?></h3>
				<hr>
				</div>
			<div class="row-det">
			  <div class="column-det">
			    <img src="<?php echo base_url()?>/<?php echo $show['depan_kamar']?>" style="width:100%" onclick="openModal();currentSlide(1)" class="hover-shadow cursor">
			  </div>
			  <div class="column-det">
			    <img src="<?php echo base_url()?>/<?php echo $show['kamar']?>" style="width:100%" onclick="openModal();currentSlide(2)" class="hover-shadow cursor">
			  </div>
			  <div class="column-det">
			    <img src="<?php echo base_url()?>/<?php echo $show['kamar_mandi']?>" style="width:100%" onclick="openModal();currentSlide(3)" class="hover-shadow cursor">
			  </div>
			  <div class="column-det">
			    <img src="<?php echo base_url()?>/<?php echo $show['view_luar']?>" style="width:100%" onclick="openModal();currentSlide(4)" class="hover-shadow cursor">
			  </div>
			  <button class="order-but" id="myBtn" onclick="document.getElementById('id01').style.display='block'" >Pesan</button>	
			</div>
		</div>

		<div id="myModal" class="modal-det">
		  <span class="close cursor" onclick="closeModal()">&times;</span>
		  <div class="modal-condet">

		    <div class="mySlides">
		      <div class="numbertext">1 / 4</div>
		      <img src="<?php echo base_url()?>/<?php echo $show['depan_kamar']?>" style="width: 100%; ">
		    </div>

		    <div class="mySlides">
		      <div class="numbertext">2 / 4</div>
		      <img src="<?php echo base_url()?>/<?php echo $show['kamar']?>" style="width: 100%; ">
		    </div>

		    <div class="mySlides">
		      <div class="numbertext">3 / 4</div>
		      <img src="<?php echo base_url()?>/<?php echo $show['kamar_mandi']?>" style="width: 100%; ">
		    </div>
		    
		    <div class="mySlides">
		      <div class="numbertext">4 / 4</div>
		      <img src="<?php echo base_url()?>/<?php echo $show['view_luar']?>" style="width: 100%; ">
		    </div>
		    
		    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		    <a class="next" onclick="plusSlides(1)">&#10095;</a>

		    <div class="caption-container">
		      <p id="caption"></p>
		    </div>
			
			<div class="column-det">
			      <img class="demo cursor" src="<?php echo base_url()?>/<?php echo $show['depan_kamar']?>" onclick="currentSlide(1)" style="width: 100%" alt="Depan Kamar">
			    </div>
			    <div class="column-det">
			      <img class="demo cursor" src="<?php echo base_url()?>/<?php echo $show['kamar']?>" onclick="currentSlide(2)" style="width: 100%" alt="Kamar">
			    </div>
			    <div class="column-det">
			      <img class="demo cursor" src="<?php echo base_url()?>/<?php echo $show['kamar_mandi']?>" onclick="currentSlide(3)" style="width: 100%" alt="Kamar Mandi">
			    </div>
			    <div class="column-det">
			      <img class="demo cursor" src="<?php echo base_url()?>/<?php echo $show['view_luar']?>" onclick="currentSlide(4)" style="width: 100%" alt="View ke Luar">
			    </div>
			  </div>
			</div>

		<!-- ini mungkin keterangan -->
		<div id="ketkamar" class="brder">
			<h3>Fasilitas Kamar</h3>
			<hr>
		<div class="row freespace">
   
  <?php 
	  $fk = $show['fas_kam'];
    	$fsk = explode(', ',$fk);
  	$l = sizeof($fsk);
  	for($i='0';$i<$l;$i++){
  ?>
  <div class="column-facil">
    <div class="content-facil">
		<div class="formid"><i class="<?php echo $fsk[$i] ?>" style="font-size: 60px; color: #610202"></i></div>
	
    </div>
  </div>
  <?php } ?>
  		</div>
		
		</div>

<div id="id01" class="modal">
	<!-- Modal content -->
	<form class="modal-content animate" method="post" action="<?php echo base_url(); ?>member/inpBook">
		<div class="container-book">
			<div class="input-modal" style="text-align: left;display: block;">
				<input id="checkid" type="checkbox" style="width: auto;margin-left:20px;margin-right: 5px;">Gunakan identitas anda?
			</div>
			<div class="input-modal">
		    	<label for="tgl-book"><b>Tanggal Datang</b></label>
			    <input type="date" name="tgl_datang" required>
			    <input type="hidden" value="<?php echo @$_SESSION['username']; ?>" name="username">
			</div>
			<div class="input-modal">
			    <label for="nama"><b>Nama</b></label>
				<input id="mnama" type="text" name="nama" required>
				<input id="vnama" type="hidden">
			</div>
			<div class="input-modal">
			    <label for="no_hp"><b>Nomor Handphone</b></label>
			    <input id="mnope" type="text" name="no_hp" required>
			    <input id="vnope" type="hidden">
			</div>
			<div class="input-modal">
			    <label for="email"><b>Email</b></label>
			    <input id="memail" type="text" name="email" required>
			    <input id="vemail" type="hidden">

			    <input type="hidden" name="idr" value="<?php echo $this->uri->segment('3'); ?>">
			    <input type="hidden" name="idk" value="<?php echo $show['id_kosan']; ?>">
			</div>  
			<div style="text-align: right;margin-top: 20px;">
				<button id="inpS" type="submit" name="submit" class="button-modal">Pesan</button>
			    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
			</div>     
		</div>
	</form>
</div>
		<!-- END MODAL -->
		<!-- END MODAL -->
<script>
//js modal
const checkbox = document.getElementById('checkid');

checkbox.addEventListener('change', (event) => {
  	var Nama = document.getElementById('mnama');
  	var Nope = document.getElementById('mnope');
  	var Email = document.getElementById('memail');

  	var Vnama = document.getElementById('vnama');
  	var Vnope = document.getElementById('vnope');
  	var Vemail = document.getElementById('vemail');
  if (event.target.checked) {
  	
  	Nama.value = "<?php echo @$_SESSION['nama']; ?>";
  	Nama.disabled=true;
  	Nama.name="";
  	Vnama.name="nama";
  	Vnama.value= "<?php echo @$_SESSION['nama']; ?>";

  	Nope.value = "<?php echo @$_SESSION['no_hp']; ?>";
  	Nope.disabled = true;
  	Nope.name="";
  	Vnope.name="no_hp";
  	Vnope.value= "<?php echo @$_SESSION['no_hp']; ?>";
  	
  	Email.value="<?php echo @$_SESSION['email']; ?>";
  	Email.disabled=true;
  	Email.name="";
  	Vemail.name="email";
  	Vemail.value= "<?php echo @$_SESSION['email']; ?>";
  } else {
  	Nama.value="";
  	Nama.disabled=false;
  	Vnama.name="";
  	Nama.name="nama";

  	Nope.value = "";
  	Nope.disabled = false;
  	Vnope.name="";
  	Nope.name="no_hp";

  	Email.value="";
  	Email.disabled=false;
  	Vemail.name="";
  	Email.name="email";
  }
})
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