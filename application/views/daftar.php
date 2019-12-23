<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" media="all" type="text/css" href="<?php echo base_url('asset/css/boskosan.css');?>">	
<link rel="stylesheet" type="text/css" href="<?php echo base_url('asset/css/bosalvin.css')?>">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

</head>
<body class="body-regist">	
	
	<nav>
		<a id="brand" href="<?php echo base_url('boskosan/get_kost')?>"><img src="http://localhost/kriptografi/asset/picture/newbos.png"></a>
	</nav>
	<div class="container">
		<div class="con-regist"> 
			<div class="tab-regist">
			  <button class="tabcon" onclick="tabklik(event, 'daftar-pengurus')">Daftar Pengurus</button>
			  <button class="tabcon active" onclick="tabklik(event, 'daftar')">Daftar</button>
		  </div>
		</div>

		<div class="conten-regist">
			<hr>
			<p>Mohon di isi sesuai dengan identitas asli.</p>
			<div class="regist" id="daftar">
				<form method="POST" action="<?php echo base_url('register/regist_member')?>">
				<div class="row">
					
						<label class="for-label" for="username">Username</label>
					
						<input type="text" name="username" placeholder="Username anda" required>
					
				</div>
				<div class="row">
					
						<label class="for-label" for="nama">Nama</label>
					
						<input type="text" name="nama" placeholder="Nama anda" required>
					
				</div>
				<div class="row">
					
						<label class="for-label" for="password">Password</label>
					
						<input type="password" name="password" placeholder="Password anda" required>
					
				</div>
				<div class="row">
					
						<label class="for-label" for="no_hp">Nomor Handphone</label>
					
						<input type="text" name="no_hp" placeholder="Nomor HP anda"  onkeypress="return isNumber(event)" required>
					
				</div>
				<div class="row">
					
						<label class="for-label" for="email">E-mail</label>
					
						<input type="email" name="email" placeholder="E-mail anda" required>
					
				</div>
				<div class="row">
					
						<label class="for-label" for="alamat">Alamat</label>
					
						<textarea type="text" name="alamat" placeholder="Alamat anda" required></textarea>
					
				</div>
				<div class="row">
					<button class="button-filter">Daftar</button>
				</div>
			</form>
			</div>

			<div class="regist" id="daftar-pengurus" style="display: none;">
				<form method="POST" action="<?php echo base_url('register/regist_pengurus')?>">
				<div class="row">
					
						<label class="for-label" for="username">Username</label>
					
						<input type="text" name="username" placeholder="Username anda" required>
					
				</div>
				<div class="row">
					
						<label class="for-label" for="nama">Nama</label>
					
						<input type="text" name="nama" placeholder="Nama anda" required>
					
				</div>
				<div class="row">
					
						<label class="for-label" for="password">Password</label>
					
						<input type="password" name="password" placeholder="Password anda" required>
					
				</div>
				<div class="row">
					
						<label class="for-label" for="no_hp">Nomor Handphone</label>
					
						<input type="text" name="no_hp" placeholder="Nomor HP anda"  onkeypress="return isNumber(event)" required>
					
				</div>
				<div class="row">
					
						<label class="for-label" for="email">E-mail</label>
					
						<input type="email" name="email" placeholder="E-mail anda" required>
					
				</div>
				<div class="row">
					
						<label class="for-label" for="alamat">Alamat</label>
					
						<textarea type="text" name="alamat" placeholder="Alamat aasdasdnda" required></textarea>
					
				</div>
				<div class="row">
					<button class="button-filter">Daftar</button>
				</div>
			</form>
			</div>
		
		</div>		
	</div>
<footer>
			<div id="brandfoot">w w w . b o s k o s a n . c o m<br><br><br>disini pengenalan web</div>
</footer>

<script>
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
	function tabklik(evt, tabName) {
    var i, tabcontent, tabcon;
    tabcontent = document.getElementsByClassName("regist");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tabcon = document.getElementsByClassName("tabcon");
    for (i = 0; i < tabcon.length; i++) {
        tabcon[i].className = tabcon[i].className.replace("active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}

function isNumber(evt) {
        evt = (evt) ? evt : window.event;
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if ( (charCode > 31 && charCode < 48) || charCode > 57) {
            return false;
        }
        return true;
    }
</script>
</body>
</html>