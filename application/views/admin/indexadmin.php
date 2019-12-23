<div class="container">
	<div class="sch-bos">
		<h1 align="center">Sistem Administrator Boskosan.com</h1>
		<hr>
	</div>
	<!-- ini bagian collapse -->
	<div class="modal" id="Mresi">
		<div class="modal-content animate">
			<div>Judul</div>
			<img id="resi" src="#">
			<div><button class="button-modal" id="tolak">Tolak Pesanan</button><button class="button-modal" id="terima">Terima Pesanan</button></div>
		</div>
	</div>
	<div class="content">
		<div class="row">
			<div class="col-4">
				<h4 align="center">Data Pengguna</h4>
				<canvas id="barUser" width="800" height="450"></canvas>
			</div>
			<div class="col-4">
				<h4 align="center">Data Kost</h4>
				<canvas id="barKost" width="800" height="450"></canvas>
			</div>
			<div class="col-4">
				<h4 align="center">Data Pemesanan</h4>
				<canvas id="barTrans" width="800" height="450"></canvas>
			</div>
		</div>

		<div class="row frespace">
			<div class="col-12">
				<h4 align="center">--- Data Transaksi Pending ---</h4>
			</div>
			<div class="col-12">
				<table>
					<tr>
						<th>No</th>
						<th>Nama Pemesan</th>
						<th>Tanggal Bayar</th>
						<th>Tempat Kos</th>
						<th>Alamat</th>
						<th>Nama Pengurus</th>
						<th>Biaya</th>
						<th>Dipesan untuk tanggal :</th>
						<th>Resi</th>
					</tr>
					<?php 
					$no = 0;
					if(!empty($reqbook)){
					foreach ($reqbook->result() as $rb){
					$no++; ?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $rb->namabook; ?></td>
						<td><?php echo $rb->tgl_bayar; ?></td>
						<td><?php echo $rb->nama_kost; ?></td>
						<td><?php echo $rb->alamat; ?></td>
						<td><?php echo $rb->namapengurus; ?></td>
						<td><?php echo $rb->biaya; ?></td>
						<td><?php $str = explode(" ",$rb->tgl_datang);echo $str['0']; ?></td>
						<td><button onclick="displayResi('<?php echo $rb->resi; ?>','<?php echo $rb->bookid; ?>');">Lihat Resi</button></td>
					</tr>
				<?php }
				}else{
					?>
					<tr>
						<td colspan="9" align="center">Data Tidak Ada</td>
					</tr>
				<?php } ?>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">

function displayResi(resi,id){
	document.getElementById('Mresi').style.display='block';
	document.getElementById('resi').src=resi;

	window.onclick = function(event) {
    	if (event.target == document.getElementById('Mresi')) {
        	document.getElementById('Mresi').style.display = "none";
    	}
	}
	document.getElementById('tolak').onclick=function(){
		window.location.href = "<?php echo base_url(); ?>admin/tolakTrans?id="+id;
	}
	document.getElementById('terima').onclick=function(){
		window.location.href = "<?php echo base_url(); ?>admin/terimaTrans?id="+id;
	}
}	
//buat filter

	colapseFilter();
	var slider = document.getElementById("myRange");
	var output = document.getElementById("demo");
	output.innerHTML = slider.value;

	slider.oninput = function() {
  	output.innerHTML = this.value;

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
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<script type="text/javascript">
	new Chart(document.getElementById("barUser"), {
    type: 'bar',
    data: {
      labels: ["Member", "Pengurus"],
      datasets: [
        {
          label: "Jumlah ",
          backgroundColor: ["#3e95cd", "#8e5ea2"],
          data: [1,10]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: ''
      }
    }
});
	new Chart(document.getElementById("barKost"), {
    type: 'bar',
    data: {
      labels: ["Kota Cirebon","Kabupaten Cirebon"],
      datasets: [
        {
          label: "Banyak Kos",
          backgroundColor: ["#3e95cd", "#8e5ea2"],
          data: [2478,5267]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Predicted world population (millions) in 2050'
      }
    }
});
	new Chart(document.getElementById("barTrans"), {
    type: 'bar',
    data: {
      labels: ["Menunggu","Sedang Diproses","Diterima","Ditolak"],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [2478,5267,734,784,433]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Predicted world population (millions) in 2050'
      }
    }
});
</script>