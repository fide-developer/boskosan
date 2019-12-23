<div class="container">
		<div class="content">
			<div class="row">
				<div class="col-12"><div class="profilid brder">
					<h3 id="pasik">Pasang Iklan</h3>
					<hr>
					<form action="<?php echo base_url('pengurus/pengurus_input') ?>" method="post" enctype="multipart/form-data">
					<div class="row">
						<div class="inpeng">
						<p align="right">Simbol dengan tanda bintang (*) wajib di isi.</p>
							<input type="hidden" name="username" value="<?=@$_SESSION['username'];?>">
							<div class="row">
								<label> Nama Kos* </label>
								<input type="text" name="nama_kost" required>
							</div>

							<div class="row">
								<label> Kota* </label>
								<select name="id_kota" id="id_kota" onchange="getKec()" required>
									<option>Pilih Kota</option>
									<?php foreach ($kota as $k){
										echo "<option value='$k->id'>$k->nama_kota</option>";
									} ?>

								</select>
							</div>

							<div class="row">
								<label> Kecamatan* </label>
								<select name="id_kecamatan" id="id_kecamatan" disabled="" required>
								</select>
							</div>

							<div class="row">
								<label> Jenis Kos* </label>
								<select name="jenis">
									<option value="campur">Campur</option>
									<option value="perempuan">Khusus Perempuan</option>
								</select>
							</div>

							<div class="row">
								<label> Alamat* </label>
								<textarea type="text" name="alamat" required></textarea>
							</div>

							<div class="row">
								<label> Halaman* </label>
								<input type="checkbox" id="myCheck" name="fas_kos[]" value="Halaman" style="margin-left: -26%;" onclick="myFun()">
								<span class="checkmark"></span>
								<p id="text" style="display:none; color:green; margin-left: 35%;">Halaman</p>
							</div>

							<div class="row">
								<label> Parkir Mobil* </label>
								<input type="checkbox" id="myCheck1" name="fas_kos[]" value="Parkir Mobil" style="margin-left: -26%;" onclick="myFun1()">
								<span class="checkmark"></span>
								<p id="text1" style="display:none; color:green; margin-left: 35%;">Parkir Mobil</p>
							</div>

							<div class="row">
								<label> Parkir Motor* </label>
								<input type="checkbox" id="myCheck2" name="fas_kos[]" value="Parkir Motor" style="margin-left: -26%;" onclick="myFun2()">
								<span class="checkmark"></span>
								<p id="text2" style="display:none; color:green; margin-left: 35%;">Parkir Motor</p>
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
								<label> Foto Kos* </label>
								<input type="file" name="foto_kos" style="width: 80%;" multiple="true" required>
							</div>
						   </div>
						   
						   <div class="column-facil">
							<div class="row">
								<label> Halaman* </label>
								<input type="file" name="foto_halaman" style="width: 80%;" multiple="true" required>
							</div>
						   </div>
							
						   <div class="column-facil">
							<div class="row">
								<label> Tempat Parkir* </label>
								<input type="file" name="foto_parkir" style="width: 80%;" multiple="true" required>
							</div>
						   </div>
						</div>
					</div>
					<br>
					<div class="row">
						<button type="submit" name="submit" class="buttonmnu" id="btn-modal" style="background-color: #4CAF50;">Simpan</div>
					</div>
				</form>
				</div></div>
			</div>
		</div>
</div>
<script src="<?php echo base_url('asset/js/jquery-1.11.2.min.js') ?>" type="text/javascript"></script>
<script src="<?php echo base_url('asset/js/jquery.easing.min.js')?>" type="text/javascript"></script> 
<script type="text/javascript">
function getKec(){
        var id_kota = document.getElementById('id_kota');
        console.log(id_kota.value);
            if (id_kota.value == ''){
                $('#id_kecamatan').prop('disabled', true);
            } else {
                $.ajax({
                    url: "<?php echo base_url('pengurus/get_kota'); ?>",
                    data: "id_kota="+id_kota.value,
                    type: "POST",
                        success:function(response){
                            var data = JSON.parse(response);
                            var items=[];
                            $("#id_kecamatan").html("");
                            $.each(data, function(key,val){
                                items.push("<option value="+val.id+">"+val.nama_kecamatan+"</option>");
                            });
                                $("#id_kecamatan").html("<option value=''>Pilih Kecamatan</option>"); 
                            $("#id_kecamatan").append.apply($("#id_kecamatan"), items);
                        },
                        error:function(){
                            console.log("ERROR");
                        }
                });
                $('#id_kecamatan').prop('disabled', false);
            } 
    }
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