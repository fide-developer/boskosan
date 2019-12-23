<!DOCTYPE html>
<html>
<title>BOSKOSAN - Detail</title>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url('asset/css/boskosan.css');?>">	<!-- 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

</head>
<body>
	
	
	<nav>
		<a id="brand" href="#"><img src="http://localhost/kriptografi/asset/picture/newbos.png"></a>
	<div class="right-menu">
			<ul>
				<li><i class="fa fa-user icon" style="color: white"></i><a onclick="document.getElementById('id_log').style.display='block'"><?=@$_SESSION['nama'];?></a></li> 
			</ul>
		</div>
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

		<!-- ini mungkin keterangan -->
		<div class="content-detail brder">
			<h3>Pesanan Tertunda / Menunggu Verifikasi</h3>
			<hr>
			<div class="row freespace">
			<div class="col-num">No</div>
			<div class="col-11" style="width: 96%;">
				<div class="row">
					<div class="col-3 tabdata" style="border-left: 1px solid gray;">Nama Kosan</div>
					<div style="border-left: 1px solid gray;" class="col-2 tabdata">Nomor Kamar</div>
					<div style="border-left: 1px solid gray;" class="col-3 tabdata">Alamat</div>
					<div style="border-left: 1px solid gray;min-width: 70px;" class="col-1">Harga</div>
					<div style="border-left: 1px solid gray;min-width: 220px;" class="col-21">Batas Pembayaran</div></div></div></div>
		
		<hr>
			<?php $no = 0; foreach ($pd->result() as $data) { $no++;?>
		<div class="row freespace">
			<div class="col-num"><?php echo $no; ?></div>
			<div class="col-11" style="width: 96%;">
				<div class="row">
					<div class="col-3 tabdata" style="border-left: 1px solid gray;"><?php echo $data->nama_kost; ?></div>
					<div style="border-left: 1px solid gray;" class="col-2 tabdata"><?php echo $data->nomor_kamar; ?></div>
					<div style="border-left: 1px solid gray;" class="col-3 tabdata"><?php echo $data->alamat; ?></div>
					<div style="border-left: 1px solid gray;min-width: 70px;" class="col-1"><?php echo $data->harga; ?></div>
					<div style="border-left: 1px solid gray;min-width: 220px;" class="col-21">
						<div class="customInfile">
							<div class="Infile">Pilih File</div>
							<form action="<?php echo base_url(); ?>member/resi" method="POST" enctype="multipart/form-data">
								<input style="cursor:pointer;" type="file" name="resi">
							</div>
								<input type="hidden" name="idbk" value="<?php echo $data->id_book; ?>">
								<input class="inpup" type="submit" name="submit" value=">">
							</form><span style="font-size: 12px; margin-left:15px;"><?php $a = explode(" ",$data->endtime);$b = explode(":",$a[1]);echo 'Hari Ini Jam '.$b[0].':'.$b[1];?></span></div></div></div>
		</div>
	<?php  
			} ?>
		</div>
	</div>


		<div id="ketkamar" class="brder">
			<h3>Riwayat Pemesanan</h3>
			<hr>
			<div class="row freespace">
			<div class="col-num">No</div>
			<div class="col-11" style="width: 96%;">
				<div class="row">
					<div class="col-3 tabdata" style="border-left: 1px solid gray;">Nama Kosan</div>
					<div style="border-left: 1px solid gray;" class="col-2 tabdata">Nomor Kamar</div>
					<div style="border-left: 1px solid gray;" class="col-4 tabdata">Alamat</div>
					<div style="border-left: 1px solid gray;min-width: 100px;" class="col-2">Status</div>
				</div>
			</div>
		</div>
		
		<hr>
			<?php $no = 0; foreach ($history->result() as $data) { $no++;?>
		<div class="row freespace">
			<div class="col-num"><?php echo $no; ?></div>
			<div class="col-11" style="width: 96%;">
				<div class="row">
					<div class="col-3 tabdata" style="border-left: 1px solid gray;"><?php echo $data->nama_kost; ?></div>
					<div style="border-left: 1px solid gray;" class="col-2 tabdata"><?php echo $data->nomor_kamar; ?></div>
					<div style="border-left: 1px solid gray;" class="col-4 tabdata"><?php echo $data->alamat; ?></div>
					<div style="border-left: 1px solid gray;min-width: 100px;" class="col-2"><?php echo $data->stat_book; ?></div>
				</div>
		</div>
	<?php  
			} ?>
		</div>
	</div>
<!-- MODAL -->

		<!-- END MODAL -->
<footer>
			<div id="brandfoot">w w w . b o s k o s a n . c o m<br><br><br>disini pengenalan web</div>
</footer>






<script>
//js untuk modal booking

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
// document.getElementById("defaultOpen").click();
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