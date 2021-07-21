<?php
	$id_admin=$_SESSION["cid"];
	$nama_admin=getAdmin($conn,$id_admin);

	$sqls="SELECT COUNT(id_siswa) as 'ts' FROM `$tbsiswa` WHERE status='Active'";
	$ds=getField($conn,$sqls);
		$totalSiswa=$ds["ts"];

	$sqlp="SELECT COUNT(id_pengajar) as 'tp' FROM `$tbpengajar` WHERE status='Active'";
	$dp=getField($conn,$sqlp);
		$totalPengajar=$dp["tp"];

	$sqlk="SELECT COUNT(id_kelas) as 'tk' FROM `$tbkelas` WHERE status='Active'";
	$dk=getField($conn,$sqlk);
		$totalKelas=$dk["tk"];

	$sqlr="SELECT nama_periode FROM `$tbperiode` WHERE status='Active'";
	$dr=getField($conn,$sqlr);
		$periode=$dr["nama_periode"];
?>
<div id="fh5co-explore" class="fh5co-bg-section">
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
				<h2>Welcome, Admin <?php echo $nama_admin?></h2>
				<h4>Here's the web's status today :</h4>
			</div>
		</div>
		<div class="row">
    		<div class="col-md-3 text-center animate-box"> 
    			<span class="fh5co-counter js-counter" data-from="0" data-to="<?php echo $totalSiswa;?>" data-speed="1000" data-refresh-interval="50"></span> 	
    			<span class="fh5co-counter-label"><b><img src='ypathicon/conference-call-black.png'>&nbsp</img>Student(s)</b></span> 
    		</div>
    		<div class="col-md-3 text-center animate-box"> 
    			<span class="fh5co-counter js-counter" data-from="0" data-to="<?php echo $totalPengajar;?>" data-speed="1000" data-refresh-interval="50"></span> 
    			<span class="fh5co-counter-label"><b><img src='ypathicon/user-7-black.png'>&nbsp</img>Teacher(s)</b></span> 
    		</div>
    		<div class="col-md-3 text-center animate-box"> 
    			<span class="fh5co-counter js-counter" data-from="0" data-to="<?php echo $totalKelas;?>" data-speed="1000" data-refresh-interval="50"></span>
    			<span class="fh5co-counter-label"><b><img src='ypathicon/school-black.png'>&nbsp</img>Class(es)</b></span> 
   			</div>
   			<div class="col-md-3 text-center animate-box">
   				<br>
   				<p><img src='ypathicon/home_prd.png'>&nbsp</img>
   				<?php echo $periode;?></p>
   				<span class="fh5co-counter-label"><b>Currently Active</b></span> 
	    	</div>
  		</div>
	</div>
</div>		
