<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<div class="container">
		<div class="content">
			<div class="row">
				<div class="col-12"><div class="profilid brder">
					<h3 id="pasik">Tambah Kamar</h3>
					<hr>
					<form action="<?php echo base_url('pengurus/pengurus_room/'.$id) ?>" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="inpeng">
						<p align="right">Simbol dengan tanda bintang (*) wajib di isi.</p>
							<input type="hidden" name="id_kosan" value="<?php echo $ids['id'];?>">
							<div class="row">
								<label> Nomor Kamar* </label>
								<input type="text" name="nomor_kamar" required>
							</div>

							<div class="row">
								<label> Harga Kamar* </label>
								<input type="text" name="harga" required>
							</div>

							<div class="row">
								<label> AC* </label>
								<input type="checkbox" id="myCheck" name="fas_kam[]" value="fa fa-snowflake-o" style="margin-left: -26%;" onclick="myFun()">
								<span class="checkmark"></span>
								<p id="text" style="display:none; color:green; margin-left: 35%;">AC</p>
							</div>

							<div class="row">
								<label> Lemari* </label>
								<input type="checkbox" id="myCheck1" name="fas_kam[]" value="fa fa-server" style="margin-left: -26%;" onclick="myFun1()">
								<span class="checkmark"></span>
								<p id="text1" style="display:none; color:green; margin-left: 35%;">Lemari</p>
							</div>

							<div class="row">
								<label> Kipas* </label>
								<input type="checkbox" id="myCheck2" name="fas_kam[]" value="fa fa-life-ring" style="margin-left: -26%;" onclick="myFun2()">
								<span class="checkmark"></span>
								<p id="text2" style="display:none; color:green; margin-left: 35%;">Kipas</p>
							</div>

							<div class="row">
								<label> Kamar Mandi* </label>
								<input type="checkbox" id="myCheck3" name="fas_kam[]" value="fa fa-bath" style="margin-left: -26%;" onclick="myFun3()">
								<span class="checkmark"></span>
								<p id="text3" style="display:none; color:green; margin-left: 35%;">Kamar Mandi</p>
							</div>

							<div class="row">
								<label> Keterangan* </label>
								<textarea type="text" name="keterangan" required></textarea>
							</div>
					</div>
				</div>
					<hr>
					<div class="row">
						<div class="uppeng">
								<p align="center">Foto Fasilitas</p>
								<p align="center">Gunakan file berekstensi .JPG .JPEG .PNG</p><br>				
						   <div class="column-facil">
							<div class="row">
								<label> Depan Kamar* </label>
								<input type="file" name="depan_kamar" style="width: 80%;" required>
							</div>
						   </div>
						   
						   <div class="column-facil">
							<div class="row">
								<label> Kamar* </label>
								<input type="file" name="kamar" style="width: 80%;" required>
							</div>
						   </div>
							
						   <div class="column-facil">
							<div class="row">
								<label> Kamar Mandi* </label>
								<input type="file" name="kamar_mandi" style="width: 80%;" required>
							</div>
						   </div>

						   <div class="column-facil">
							<div class="row">
								<label> View Keluar* </label>
								<input type="file" name="view_luar" style="width: 80%;" required>
							</div>
						   </div>
						</div>
					</div>
					<br>
					<div class="row">
						<button class="buttonmnu" id="btn-modal" type="submit" name="submit" style="background-color: #4CAF50;">Simpan</div>
					</div>
				</form>
				</div></div>
			</div>
		</div>
</div>		
<script type="text/javascript">
function myFun() {
    var checkBox = document.getElementById("myCheck");
    var text = document.getElementById("text");
    if (checkBox.checked == true){
        text.style.display = "block";
    } else {
       text.style.display = "none";
    }
}

function myFun1() {
    var checkBox = document.getElementById("myCheck1");
    var text = document.getElementById("text1");
    if (checkBox.checked == true){
        text.style.display = "block";
    } else {
       text.style.display = "none";
    }
}

function myFun2() {
    var checkBox = document.getElementById("myCheck2");
    var text = document.getElementById("text2");
    if (checkBox.checked == true){
        text.style.display = "block";
    } else {
       text.style.display = "none";
    }
}

function myFun3() {
    var checkBox = document.getElementById("myCheck3");
    var text = document.getElementById("text3");
    if (checkBox.checked == true){
        text.style.display = "block";
    } else {
       text.style.display = "none";
    }
}
</script>