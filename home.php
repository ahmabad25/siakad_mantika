
<?php if($_SESSION["cstatus"]=="Administrator"){ ?>

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

<?php } else if ($_SESSION["cstatus"]=="Pengajar"){ ?>

<?php

	$id_pengajar=$_SESSION["cid"];
	$nama_pengajar=getPengajar($conn,$id_pengajar);
	$ccal=$_SESSION["ccal"];

	$sqls="SELECT COUNT(id_kelas) as 'kl' FROM `$tbkelas` WHERE id_pengajar='$id_pengajar' AND status='Active'";
	$ds=getField($conn,$sqls);
		$totalKelas=$ds["kl"];

	$sqlp="SELECT COUNT(id_peserta) as 'tp' FROM `$tbpeserta`, `$tbkelas` WHERE tb_peserta.id_kelas=tb_kelas.id_kelas AND id_pengajar='$id_pengajar' AND tb_kelas.status='Active'";
	$dp=getField($conn,$sqlp);
		$totalPeserta=$dp["tp"];

	$sqlr="SELECT nama_periode FROM `$tbperiode` WHERE status='Active'";
	$dr=getField($conn,$sqlr);
		$periode=$dr["nama_periode"];
?>
<div id="fh5co-explore" class="fh5co-bg-section">
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
				<h2>Welcome, <?php echo "$ccal $nama_pengajar";?></h2>
				<h4>Currently you have :</h4>
			</div>
		</div>
		<div class="row">
    		<div class="col-md-3 text-center animate-box"> 
    			<span class="fh5co-counter js-counter" data-from="0" data-to="<?php echo $totalKelas;?>" data-speed="1000" data-refresh-interval="50"></span> 	
    			<span class="fh5co-counter-label"><b><img src='ypathicon/building-16-black.png'>&nbsp</img>Active Class to Teach</b></span> 
    		</div>
    		<div class="col-md-3 text-center animate-box"> 
    			<span class="fh5co-counter js-counter" data-from="0" data-to="<?php echo $totalPeserta;?>" data-speed="1000" data-refresh-interval="50"></span> 
    			<span class="fh5co-counter-label"><b><img src='ypathicon/conference-call-black.png'>&nbsp</img>Students in Your Classes</b></span> 
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

<?php } else if($_SESSION["cstatus"]=="Siswa"){ ?>

<?php
	$id_siswa=$_SESSION["cid"];
	$nama_siswa=getSiswa($conn,$id_siswa);

	$sqls="SELECT * FROM `$tbpeserta`, `$tbkelas` WHERE tb_peserta.id_kelas=tb_kelas.id_kelas AND tb_kelas.status='Active' AND tb_peserta.id_siswa='$id_siswa'";
	$ds=getField($conn,$sqls);
		$id_program=$ds["id_program"];
		$program=getProgram($conn,$id_program);
		$level=getLevel($conn,$id_program);
		$hari=getSesiHari($conn,$ds["id_sesi"]);
		$waktu=getSesiWaktu($conn,$ds["id_sesi"]);
		$pengajar=getPengajar($conn,$ds["id_pengajar"]);
		$id_pengajar=$ds["id_pengajar"];

	$sqlg="SELECT * FROM `$tbpengajar` WHERE id_pengajar='$id_pengajar'";
	$dg=getField($conn,$sqlg);
		$jk=$dg["jenis_kelamin"];
		if($jk=='M'){$ccal='Mr.';}
		else{$ccal='Ms.';}

	$sqlr="SELECT nama_periode FROM `$tbperiode` WHERE status='Active'";
	$dr=getField($conn,$sqlr);
		$periode=$dr["nama_periode"];
?>
<div id="fh5co-explore" class="fh5co-bg-section">
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
				<h2>Hello, <?php echo $nama_siswa?>! Welcome back!</h2>
				<h4>Here's the class you're currently joined :</h4>
				<br>
				<div align="center">
					<table>
						<tr>
							<td width="150" rowspan="3"><img src='ypathicon/blackboard-128.png'></td>
							<td><b><?php echo"$level ($program)"?></b></td>
						</tr>
						<tr>
							<td><b>Teacher : <?php echo"$ccal $pengajar"?></b></td>
						</tr>
						<tr>
							<td><b>Schedule : <?php echo"$hari ($waktu)"?></b></td>
						</tr>
						<tr><td><i>Don't be late! :D</td></tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>		

<?php } else if($_SESSION["cstatus"]=="Orang Tua"){ ?>

<?php
	$id_orangtua=$_SESSION["cid"];
	$nama_orangtua=getOrangtua($conn,$id_orangtua);
	$s="SELECT * FROM `$tborangtua` where id_orangtua='$id_orangtua'";
	$d=getField($conn,$s);
		$id_siswa=$d["id_siswa"];
		$nama_siswa=getSiswa($conn,$id_siswa);

	$sqls="SELECT * FROM `$tbpeserta`, `$tbkelas` WHERE tb_peserta.id_kelas=tb_kelas.id_kelas AND tb_kelas.status='Active' AND tb_peserta.id_siswa='$id_siswa'";
	$ds=getField($conn,$sqls);
		$id_program=$ds["id_program"];
		$program=getProgram($conn,$id_program);
		$level=getLevel($conn,$id_program);
		$hari=getSesiHari($conn,$ds["id_sesi"]);
		$waktu=getSesiWaktu($conn,$ds["id_sesi"]);
		$pengajar=getPengajar($conn,$ds["id_pengajar"]);
		$id_pengajar=$ds["id_pengajar"];

	$sqlg="SELECT * FROM `$tbpengajar` WHERE id_pengajar='$id_pengajar'";
	$dg=getField($conn,$sqlg);
		$jk=$dg["jenis_kelamin"];
		if($jk=='M'){$ccal='Mr.';}
		else{$ccal='Ms.';}

	$sqlr="SELECT nama_periode FROM `$tbperiode` WHERE status='Active'";
	$dr=getField($conn,$sqlr);
		$periode=$dr["nama_periode"];
?>
<div id="fh5co-explore" class="fh5co-bg-section">
	<div class="container">
		<div class="row animate-box">
			<div class="col-md-6 col-md-offset-3 text-center fh5co-heading">
				<h2>Hello, <?php echo"$cal $nama_orangtua";?>! Welcome back!</h2>
				<h4>Here's the class currently joined by <?php echo $nama_siswa;?> :</h4>
				<br>
				<div align="center">
					<table>
						<tr>
							<td width="150" rowspan="3"><img src='ypathicon/blackboard-128.png'></td>
							<td><b><?php echo"$level ($program)"?></b></td>
						</tr>
						<tr>
							<td><b>Teacher : <?php echo"$ccal $pengajar"?></b></td>
						</tr>
						<tr>
							<td><b>Schedule : <?php echo"$hari ($waktu)"?></b></td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>		

<?php } else {} ?>

