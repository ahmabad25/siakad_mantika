<?php
$pro="simpan";
$tanggal=WKT(date("Y-m-d"));
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('peserta/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<style>
#mytable {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#mytable td, #mytable th {
  border: 0px;
  padding: 4px;
}

#mytable th {
  padding-top: 6px;
  padding-bottom: 6px;
}

#myhr {
	border: 1px solid black;
	border-radius: 5px;
}
</style>

<!-- Disini -->
  <link rel="stylesheet" href="js/jquery-ui.css">
  <link rel="stylesheet" href="resources/demos/style.css">
<script src="js/jquery-1.12.4.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion({
      collapsible: true
    });
  } );
  </script>
<!-- Disini -->
<?php
	$id_admin=$_SESSION["cid"];
	$id_kelas=$_GET["id"];
	$sql="select * from `$tbkelas` where `id_kelas`='$id_kelas'";
	$d=getField($conn,$sql);
				$id_kelas=$d["id_kelas"];
				$id_kelas0=$d["id_kelas"];
				$id_program=getProgram($conn,$d["id_program"]);
				$id_program1=getLevel($conn,$d["id_program"]);
				$id_pengajar=getPengajar($conn,$d["id_pengajar"]);
				$id_ruangan=getRuangan($conn,$d["id_ruangan"]);
				$id_sesiH=getSesiHari($conn,$d["id_sesi"]);
				$id_sesiW=getSesiWaktu($conn,$d["id_sesi"]);
				$id_periode=$d["id_periode"];
				$term=$d["term"];
	
	$sqla="select * from `$tbperiode` where `id_periode`='$id_periode'";
	$da=getField($conn,$sqla);
		$deskripsi=$da["deskripsi"];
?>

<!-- Disini -->
<a class="btn btn-default btn=lg" href="?mnu=pkelas"><img src='ypathicon/10.png'> Back to class page</a>
<br>
<hr id="myhr">
<h4><b><i>&emsp;Input Student to Class</h4></i></b>
<hr id="myhr">
<form action="" method="post" enctype="multipart/form-data">
<table width="100%" id="mytable">

<tr>
	<th width="180" align="left"><label for="id_periode">&emsp;Class</label></th>
	<th width="17" align="left" valign="top">:</th>
	<th colspan="2"><b>(<?php echo $id_program;?>) <?php echo $id_program1;?></b></th>
</tr>

<tr>
	<td ><label for="nama_periode">&emsp;Teacher</label></td>
	<td valign="top">:</td>
	<td colspan="2"><b><?php echo $id_pengajar;?></b></td>
</tr>

<tr>
	<td><label for="deskripsi">&emsp;Session</label></td>
	<td valign="top">:</td>
	<td width="881"><b><?php echo"$id_sesiH ($id_sesiW)";?></b></td>
</tr>

<tr>
<td width="180" height="32"><label for="id_kelas">&emsp;Room</label></td>
<td width="17" valign="top">:</td>
<td colspan="2" valign="top"><b><?php echo $id_ruangan;?></b></td>
</tr>

<tr>
<td width="180" height="32"><label for="id_kelas">&emsp;Term & Period</label></td>
<td width="17" valign="top">:</td>
<td colspan="2" valign="top"><b><?php echo"$term ($deskripsi)";?></b></td>
</tr>
</table>
</form>
<hr id="myhr">
<div id="accordion"> 
<?php  
$id_pengajar=$_SESSION["cid"];
$id_kelas=$_GET["id"];
	$sqla="SELECT tb_kelas.id_kelas, tb_program.nama_program, tb_program.level FROM tb_kelas JOIN tb_program ON tb_kelas.id_program = tb_program.id_program WHERE id_kelas = '$id_kelas'";
	$juma=getJum($conn,$sqla);
		if($juma <1){
			echo"<h1>No data available...</h1>";
			}
	$da=getField($conn,$sqla);
			$program=$da["nama_program"];
			$level=$da["level"];
?>  
<h4>List of Students in <?php echo"($program) $level";?></h4>
<div>
<!-- Disini -->
<table width="100%" border="0" class="table table-striped table-bordered table-hover">
  <tr bgcolor="#036">
    <th width="4%"><center>No.</center></th>
	<th width="8%"><center>Picture</center></th>
	<th width="12%"><center>Name</center></th>
    <th width="17%"><center>Details</center></th>
	<th width="16%"><center>Address & Contacts</center></th>
    <th width="7%"><center>Menu</center></th>
  </tr>
<?php  
  $sql="select * from `$tbpeserta` where id_kelas='$id_kelas' order by `id_peserta` asc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
	//--------------------------------------------------------------------------------------------
	$batas   = 10;
	$page = $_GET['page'];
	if(empty($page)){$posawal  = 0;$page = 1;}
	else{$posawal = ($page-1) * $batas;}
	
	$sql2 = $sql." LIMIT $posawal,$batas";
	$no = $posawal+1;
	//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {							
				$id_peserta=$d["id_peserta"];
				$id_siswa=$d["id_siswa"];
				
	$sqlv="select * from `$tbsiswa` where `id_siswa`='$id_siswa'";
	$dv=getField($conn,$sqlv);
				$id_siswa=$dv["id_siswa"];
				$nama_siswa=$dv["nama_siswa"];
				$jenis_kelamin=$dv["jenis_kelamin"];
				$tempat_lahir=$dv["tempat_lahir"];
				$tanggal_lahir=WKT($dv["tanggal_lahir"]);
				$alamat=$dv["alamat"];
				$agama=$dv["agama"];
				$gambar=$dv["gambar"];
				$email=$dv["email"];
				$no_telepon=$dv["no_telepon"];
				$status=$dv["status"];
					if ($jenis_kelamin=='M'){$jk='Male';}
					else {$jk='Female';}
				
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td valign='top'><center>$no.</center></td>
					<td><div align='center'>";
echo"<a href='#' onclick='buka(\"siswa/zoom.php?id=$id_siswa\")'>
<img src='$YPATH/$gambar' width='40' height='40' /></a></div>";
				echo"</td>
				<td valign='top'><b>$nama_siswa</b><br><i>$id_siswa-$id_peserta</i></td>
				<td valign='top'>Gender : $jk<br>Birth : $tempat_lahir, $tanggal_lahir<br>Religion : $agama</td>
				<td valign='top'>Address : $alamat<br>Phone : $no_telepon<br>Email : $email</td>
				<td align='center'>
<a href='?mnu=minnilai&id1=$id_kelas&id2=$id_peserta'><img src='ypathicon/b-star.png' title='Input Mid-Test Score'></a>
<a href='?mnu=finnilai&id1=$id_kelas&id2=$id_peserta'><img src='ypathicon/y-star.png' title='Input Final Test Score'></a>
				</td>
				</tr>";
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Sorry, No data available...</blink></td></tr>";}
?>
</table>

<?php
//Langkah 3: Hitung total data dan page 
$jmldata = $jum;
if($jmldata>0){
	if($batas<1){$batas=1;}
	$jmlhal  = ceil($jmldata/$batas);
	echo "<div class=paging>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=ppeserta&id=$id_kelas'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=ppeserta&id=$id_kelas'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=ppeserta&id=$id_kelas'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
	echo "<p align=center>Total of Data : <b>$jmldata</b> Item</p>";
?>
<!-- Disini -->
</div>
<?php /*}*/?>
<!-- Disini -->

<?php
	$sqla="SELECT tb_kelas.id_kelas, tb_program.nama_program, tb_program.level FROM tb_kelas JOIN tb_program ON tb_kelas.id_program = tb_program.id_program WHERE id_kelas = '$id_kelas'";
	$juma=getJum($conn,$sqla);
		if($juma <1){
			echo"<h1>No data available...</h1>";
			}
	$da=getField($conn,$sqla);
			$program=$da["nama_program"];
			$level=$da["level"];
?>    
<h4>List of Mid-Test Scores in <?php echo"($program) $level";?></h4>
<div>
<!-- Disini -->
<table width="100%" border="0" class="table table-striped table-bordered table-hover">
  <tr bgcolor="#036">
    <th width="7%"><center>No.</center></th>
    <th width="8%"><center>Picture</center></th>
    <th width="18%"><center>Student</center></th>
	<th width="30%"><center>Scores</center></th>
    <th width="26%"><center>Teacher's Note</center></th>
    <th width="8%"><center>Menu</center></th>
  </tr>
<?php  
  $sql="SELECT tb_nilai.id_nilai, tb_nilai.id_peserta, tb_siswa.nama_siswa, tb_siswa.gambar, tb_nilai.ls_score, tb_nilai.su_score, tb_nilai.rv_score, tb_nilai.comp_score, tb_nilai.speak_score, tb_nilai.catatan
  		FROM tb_nilai, tb_peserta, tb_siswa
		WHERE tb_nilai.id_peserta = tb_peserta.id_peserta
		AND tb_peserta.id_siswa = tb_siswa.id_siswa 
		AND tb_nilai.jenis_tes = 'Mid'
		AND tb_nilai.id_kelas='$id_kelas' order by `id_peserta` asc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
	//--------------------------------------------------------------------------------------------
	$batas   = 10;
	$page = $_GET['page'];
	if(empty($page)){$posawal  = 0;$page = 1;}
	else{$posawal = ($page-1) * $batas;}
	
	$sql2 = $sql." LIMIT $posawal,$batas";
	$no = $posawal+1;
	//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {							
				$id_nilai=$d["id_nilai"];
				$id_peserta=$d["id_peserta"];
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$nama=$d["nama_siswa"];		
				$ls_score=$d["ls_score"];
					if ($ls_score>85){$ls="A";}
					else if ($ls_score<=85 && $ls_score>70){$ls="B";}
					else if ($ls_score<=70 && $ls_score>55){$ls="C";}
					else if ($ls_score<=55 && $ls_score>40){$ls="D";}
					else if ($ls_score<=40 && $ls_score>25){$ls="E";}
					else if ($ls_Score<=25){$ls="F";}
				$su_score=$d["su_score"];
					if ($su_score>85){$su="A";}
					else if ($su_score<=85 && $su_score>70){$su="B";}
					else if ($su_score<=70 && $su_score>55){$su="C";}
					else if ($su_score<=55 && $su_score>40){$su="D";}
					else if ($su_score<=40 && $su_score>25){$su="E";}
					else if ($su_Score<=25){$su="F";}
				$rv_score=$d["rv_score"];
					if ($rv_score>85){$rv="A";}
					else if ($rv_score<=85 && $rv_score>70){$rv="B";}
					else if ($rv_score<=70 && $rv_score>55){$rv="C";}
					else if ($rv_score<=55 && $rv_score>40){$rv="D";}
					else if ($rv_score<=40 && $rv_score>25){$rv="E";}
					else if ($rv_Score<=25){$rv="F";}
				$comp_score=$d["comp_score"];
					if ($comp_score>85){$comp="A";}
					else if ($comp_score<=85 && $comp_score>70){$comp="B";}
					else if ($comp_score<=70 && $comp_score>55){$comp="C";}
					else if ($comp_score<=55 && $comp_score>40){$comp="D";}
					else if ($comp_score<=40 && $comp_score>25){$comp="E";}
					else if ($comp_Score<=25){$comp="F";}
				$speak_score=$d["speak_score"];
					if ($speak_score>85){$speak="A";}
					else if ($speak_score<=85 && $speak_score>70){$speak="B";}
					else if ($speak_score<=70 && $speak_score>55){$speak="C";}
					else if ($speak_score<=55 && $speak_score>40){$speak="D";}
					else if ($speak_score<=40 && $speak_score>25){$speak="E";}
					else if ($speak_Score<=25){$speak="F";}
				$catatan=$d["catatan"];
				$average=(($ls_score + $rv_score + $su_score + $comp_score + $speak_score)/5);
					if ($average>85){$avg="A";}
					else if ($average<=85 && $average>70){$avg="B";}
					else if ($average<=70 && $average>55){$avg="C";}
					else if ($average<=55 && $average>40){$avg="D";}
					else if ($average<=40 && $average>25){$avg="E";}
					else if ($average<=25){$avg="F";}

					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td><center>$no.</center></td>
				<td><div align='center'>";
echo"<a href='#' onclick='buka(\"siswa/zoom.php?id=$id_siswa\")'>
<img src='$YPATH/$gambar' width='40' height='40' /></a></div>";
				echo"</td>
				<td><b>$nama</b>
				<br><i>$id_siswa-$id_peserta</i></td>
				<td>Listening : $ls_score ($ls)&nbsp; Structure : $su_score ($su)<br>
					Reading : $rv_score ($rv)&nbsp; Composition : $comp_score ($comp)<br>
					Speaking : $speak_score ($speak)&nbsp; <i>AVERAGE : $average ($avg)</i></td>
				<td>$catatan</td>
				<td align='center'>
<a href='?mnu=minnilai&id1=$id_kelas&id2=$id_peserta'><img src='ypathicon/12.png' title='Change'></a>
<a href='?mnu=ppeserta&id=$id_kelas&pro=hapusNilai&kode=$id_nilai'><img src='ypathicon/h.png' title='Delete' 
onClick='return confirm(\"Delete this score from score's data?\")'></a></td>
				</tr>";
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Sorry, No data available...</blink></td></tr>";}
?>
</table>

<?php
//Langkah 3: Hitung total data dan page 
$jmldata = $jum;
if($jmldata>0){
	if($batas<1){$batas=1;}
	$jmlhal  = ceil($jmldata/$batas);
	echo "<div class=paging>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=ppeserta'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=ppeserta'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=ppeserta'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
	echo "<p align=center>Total of Data : <b>$jmldata</b> Item</p>";
?>
<!-- Disini -->
</div>
<?php /*}*/?>

<!-- Disini -->
<?php
if($_GET["pro"]=="hapusNilai"){
$id_nilai=$_GET["kode"];
$sqln="delete from `$tbnilai` where `id_nilai`='$id_nilai'";
$hapus=process($conn,$sqln);
if($hapus) {echo "<script>alert('SUCCESSFULLY DELETED SCORE');document.location.href='?mnu=ppeserta&id=$id_kelas';</script>";}
else{echo"<script>alert('FAILED TO DELETE SCORE');document.location.href='?mnu=ppeserta&id=$id_kelas';</script>";}
}
?>

<?php
	$sqla="SELECT tb_kelas.id_kelas, tb_program.nama_program, tb_program.level FROM tb_kelas JOIN tb_program ON tb_kelas.id_program = tb_program.id_program WHERE id_kelas = '$id_kelas'";
	$juma=getJum($conn,$sqla);
		if($juma <1){
			echo"<h1>No data available...</h1>";
			}
	$da=getField($conn,$sqla);
			$program=$da["nama_program"];
			$level=$da["level"];
?>    
<h4>List of Final-Test Scores in <?php echo"($program) $level";?></h4>
<div>
<!-- Disini -->
<table width="100%" border="0" class="table table-striped table-bordered table-hover">
  <tr bgcolor="#036">
    <th width="7%"><center>No.</center></th>
    <th width="8%"><center>Picture</center></th>
    <th width="18%"><center>Student</center></th>
	<th width="30%"><center>Scores</center></th>
    <th width="26%"><center>Teacher's Note</center></th>
    <th width="8%"><center>Menu</center></th>
  </tr>
<?php  
  $sql="SELECT tb_nilai.id_nilai, tb_nilai.id_peserta, tb_siswa.nama_siswa, tb_siswa.gambar, tb_nilai.ls_score, tb_nilai.su_score, tb_nilai.rv_score, tb_nilai.comp_score, tb_nilai.speak_score, tb_nilai.catatan
  		FROM tb_nilai, tb_peserta, tb_siswa
		WHERE tb_nilai.id_peserta = tb_peserta.id_peserta
		AND tb_peserta.id_siswa = tb_siswa.id_siswa 
		AND tb_nilai.jenis_tes = 'Final'
		AND tb_nilai.id_kelas='$id_kelas' order by `id_peserta` asc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
	//--------------------------------------------------------------------------------------------
	$batas   = 10;
	$page = $_GET['page'];
	if(empty($page)){$posawal  = 0;$page = 1;}
	else{$posawal = ($page-1) * $batas;}
	
	$sql2 = $sql." LIMIT $posawal,$batas";
	$no = $posawal+1;
	//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {							
				$id_nilai=$d["id_nilai"];
				$id_peserta=$d["id_peserta"];
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$nama=$d["nama_siswa"];		
				$ls_score=$d["ls_score"];
					if ($ls_score>85){$ls="A";}
					else if ($ls_score<=85 && $ls_score>70){$ls="B";}
					else if ($ls_score<=70 && $ls_score>55){$ls="C";}
					else if ($ls_score<=55 && $ls_score>40){$ls="D";}
					else if ($ls_score<=40 && $ls_score>25){$ls="E";}
					else if ($ls_Score<=25){$ls="F";}
				$su_score=$d["su_score"];
					if ($su_score>85){$su="A";}
					else if ($su_score<=85 && $su_score>70){$su="B";}
					else if ($su_score<=70 && $su_score>55){$su="C";}
					else if ($su_score<=55 && $su_score>40){$su="D";}
					else if ($su_score<=40 && $su_score>25){$su="E";}
					else if ($su_Score<=25){$su="F";}
				$rv_score=$d["rv_score"];
					if ($rv_score>85){$rv="A";}
					else if ($rv_score<=85 && $rv_score>70){$rv="B";}
					else if ($rv_score<=70 && $rv_score>55){$rv="C";}
					else if ($rv_score<=55 && $rv_score>40){$rv="D";}
					else if ($rv_score<=40 && $rv_score>25){$rv="E";}
					else if ($rv_Score<=25){$rv="F";}
				$comp_score=$d["comp_score"];
					if ($comp_score>85){$comp="A";}
					else if ($comp_score<=85 && $comp_score>70){$comp="B";}
					else if ($comp_score<=70 && $comp_score>55){$comp="C";}
					else if ($comp_score<=55 && $comp_score>40){$comp="D";}
					else if ($comp_score<=40 && $comp_score>25){$comp="E";}
					else if ($comp_Score<=25){$comp="F";}
				$speak_score=$d["speak_score"];
					if ($speak_score>85){$speak="A";}
					else if ($speak_score<=85 && $speak_score>70){$speak="B";}
					else if ($speak_score<=70 && $speak_score>55){$speak="C";}
					else if ($speak_score<=55 && $speak_score>40){$speak="D";}
					else if ($speak_score<=40 && $speak_score>25){$speak="E";}
					else if ($speak_Score<=25){$speak="F";}
				$catatan=$d["catatan"];
				$average=(($ls_score + $rv_score + $su_score + $comp_score + $speak_score)/5);
					if ($average>85){$avg="A";}
					else if ($average<=85 && $average>70){$avg="B";}
					else if ($average<=70 && $average>55){$avg="C";}
					else if ($average<=55 && $average>40){$avg="D";}
					else if ($average<=40 && $average>25){$avg="E";}
					else if ($average<=25){$avg="F";}

					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td><center>$no.</center></td>
				<td><div align='center'>";
echo"<a href='#' onclick='buka(\"siswa/zoom.php?id=$id_siswa\")'>
<img src='$YPATH/$gambar' width='40' height='40' /></a></div>";
				echo"</td>
				<td><b>$nama</b>
				<br><i>$id_siswa-$id_peserta</i></td>
				<td>Listening : $ls_score ($ls)&nbsp; Structure : $su_score ($su)<br>
					Reading : $rv_score ($rv)&nbsp; Composition : $comp_score ($comp)<br>
					Speaking : $speak_score ($speak)&nbsp; <i>AVERAGE : $average ($avg)</i></td>
				<td>$catatan</td>
				<td align='center'>
<a href='?mnu=finnilai&id1=$id_kelas&id2=$id_peserta'><img src='ypathicon/12.png' title='Change'></a>
<a href='?mnu=ppeserta&id=$id_kelas&pro=hapusNilai&kode=$id_nilai'><img src='ypathicon/h.png' title='Delete' 
onClick='return confirm(\"Delete this score from score's data?\")'></a></td>
				</tr>";
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Sorry, No data available...</blink></td></tr>";}
?>
</table>

<?php
//Langkah 3: Hitung total data dan page 
$jmldata = $jum;
if($jmldata>0){
	if($batas<1){$batas=1;}
	$jmlhal  = ceil($jmldata/$batas);
	echo "<div class=paging>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=ppeserta'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=ppeserta'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=ppeserta'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
	echo "<p align=center>Total of Data : <b>$jmldata</b> Item</p>";
?>
<!-- Disini -->
</div>
<?php /*}*/?>
</div>
<!-- Disini -->
<?php
if($_GET["pro"]=="hapusNilai"){
$id_nilai=$_GET["kode"];
$sqln="delete from `$tbnilai` where `id_nilai`='$id_nilai'";
$hapus=process($conn,$sqln);
if($hapus) {echo "<script>alert('SUCCESSFULLY DELETED SCORE');document.location.href='?mnu=ppeserta&id=$id_kelas';</script>";}
else{echo"<script>alert('FAILED TO DELETE SCORE');document.location.href='?mnu=ppeserta&id=$id_kelas';</script>";}
}
?>
<!--UNUSED
<a href='?mnu=inabsensi&id=$id_peserta'><img src='ypathicon/xls.png' title='absen'></a>
<a href='?mnu=innilai&id=$id_peserta'><img src='ypathicon/xls.png' title='nilai'></a>
-->
