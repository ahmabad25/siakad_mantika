<?php
	$id_pengajar=$_SESSION["cid"];
	$nama_pengajar=getPengajar($conn,$id_pengajar);
	$jk=getMrMs($conn,$id_pengajar);
	if ($jk=='L') {$cal='Mr.';}
	else {$cal='Ms.';}

	$sqlk="SELECT COUNT(id_kelas) as 'tk' FROM `$tbkelas` WHERE id_pengajar='$id_pengajar' AND status='Aktif'";
	$dk=getField($conn,$sqlk);
		$totalKelas=$dk["tk"];

	$sqlp="SELECT COUNT(id_peserta) as 'tp' FROM tb_peserta, tb_kelas WHERE tb_peserta.id_kelas=tb_kelas.id_kelas AND STATUS='Aktif' AND id_pengajar='$id_pengajar'";
	$dp=getField($conn,$sqlp);
		$totalPeserta=$dp["tp"];
?>
<div id="fh5co-explore" class="fh5co-bg-section">
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
				<h2>Selamat datang, <?php echo $nama_pengajar?></h2>
				<h4>Status data web saat ini adalah :</h4>
			</div>
		</div>
		<div class="row">
    		<div class="col-md-3 text-center animate-box"> 
    			<span class="fh5co-counter js-counter" data-from="0" data-to="<?php echo $totalKelas;?>" data-speed="1000" data-refresh-interval="50"></span> 	
    			<span class="fh5co-counter-label"><b><img src='ypathicon/conference-call-black.png'>&nbsp</img>Kelas aktif yang diajar</b></span> 
    		</div>
    		<div class="col-md-3 text-center animate-box"> 
    			<span class="fh5co-counter js-counter" data-from="0" data-to="<?php echo $totalPeserta;?>" data-speed="1000" data-refresh-interval="50"></span> 
    			<span class="fh5co-counter-label"><b><img src='ypathicon/user-7-black.png'>&nbsp</img>Peserta di kelas anda</b></span> 
    		</div>
  		</div>
	</div>
</div>		
