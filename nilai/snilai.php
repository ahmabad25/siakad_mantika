<?php

$tanggal_lahir=WKT(date("Y-m-d"));
$pro="simpan";
$gambar0="avatar.jpg";
$status="Active";
//$PATH="ypathcss";
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal_lahir").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('pengajar/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, alamat=0'); } 
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
	$id_siswa=$_SESSION["cid"];
	$id_kelas=$_GET["id1"];
	$id_peserta=$_GET["id2"];
	$sql="select * from `$tbkelas` where `id_kelas`='$id_kelas'";
	$d=getField($conn,$sql);
				$program=getProgram($conn,$d["id_program"]);
				$level=getLevel($conn,$d["id_program"]);
				$pengajar=getPengajar($conn,$d["id_pengajar"]);
				$ruangan=getRuangan($conn,$d["id_ruangan"]);
				$hari=getSesiHari($conn,$d["id_sesi"]);
				$waktu=getSesiWaktu($conn,$d["id_sesi"]);
				$periode=getPeriode($conn,$d["id_periode"]);
				$id_periode=$d["id_periode"];
				$term=$d["term"];

	$sqla="select * from `$tbperiode` where `id_periode`='$id_periode'";
	$da=getField($conn,$sqla);
				$deskripsi=$da["deskripsi"];

	$sqlb="SELECT COUNT( id ) AS jmlhadir
			FROM tb_absensi_detail, tb_absensi
			WHERE tb_absensi_detail.id_absensi = tb_absensi.id_absensi
			AND id_kelas =  '$id_kelas'
			AND id_siswa =  '$id_siswa'
			AND STATUS =  'P'";
	$db=getField($conn,$sqlb);
				$jh=$db["jmlhadir"];

	$sqlc="SELECT COUNT( id ) AS jmlkehadiran
			FROM tb_absensi_detail, tb_absensi
			WHERE tb_absensi_detail.id_absensi = tb_absensi.id_absensi
			AND id_kelas =  '$id_kelas'
			AND id_siswa =  '$id_siswa'";
	$dc=getField($conn,$sqlc);
				$jk=$dc["jmlkehadiran"];

	$sqlm="SELECT * FROM `$tbnilai`, `$tbpeserta` WHERE tb_nilai.id_peserta=tb_peserta.id_peserta AND tb_nilai.id_kelas='$id_kelas' AND tb_peserta.id_peserta='$id_peserta' AND jenis_tes='Mid'";
	$dm=getField($conn,$sqlm);
				$nama=getSiswa($conn,$dm["id_siswa"]);
				$lsm=$dm["ls_score"];
					if ($lsm>85){$lsmg='A';}
					else if ($lsm<=85 && $lsm>70){$lsmg='B';}
					else if ($lsm<=70 && $lsm>55){$lsmg='C';}
					else if ($lsm<=55 && $lsm>40){$lsmg='D';}
					else if ($lsm<=40 && $lsm>25){$lsmg='E';}
					else if ($lsm<=25){$lsmg="F";}
				$sum=$dm["su_score"];
					if ($sum>85){$sumg='A';}
					else if ($sum<=85 && $sum>70){$sumg='B';}
					else if ($sum<=70 && $sum>55){$sumg='C';}
					else if ($sum<=55 && $sum>40){$sumg='D';}
					else if ($sum<=40 && $sum>25){$sumg='E';}
					else if ($sum<=25){$sumg="F";}
				$rvm=$dm["rv_score"];
					if ($rvm>85){$rvmg='A';}
					else if ($rvm<=85 && $rvm>70){$rvmg='B';}
					else if ($rvm<=70 && $rvm>55){$rvmg='C';}
					else if ($rvm<=55 && $rvm>40){$rvmg='D';}
					else if ($rvm<=40 && $rvm>25){$rvmg='E';}
					else if ($rvm<=25){$rvmg="F";}
				$compm=$dm["comp_score"];
					if ($compm>85){$compmg='A';}
					else if ($compm<=85 && $compm>70){$compmg='B';}
					else if ($compm<=70 && $compm>55){$compmg='C';}
					else if ($compm<=55 && $compm>40){$compmg='D';}
					else if ($compm<=40 && $compm>25){$compmg='E';}
					else if ($compm<=25){$compmg="F";}
				$speakm=$dm["speak_score"];
					if ($speakm>85){$speakmg='A';}
					else if ($speakm<=85 && $speakm>70){$speakmg='B';}
					else if ($speakm<=70 && $speakm>55){$speakmg='C';}
					else if ($speakm<=55 && $speakm>40){$speakmg='D';}
					else if ($speakm<=40 && $speakm>25){$speakmg='E';}
					else if ($speakm<=25){$speakmg="F";}
				$avgm=(($lsm+$sum+$rvm+$compm+$speakm)/5);
					if ($avgm>85){$avgmg='A';}
					else if ($avgm<=85 && $avgm>70){$avgmg='B';}
					else if ($avgm<=70 && $avgm>55){$avgmg='C';}
					else if ($avgm<=55 && $avgm>40){$avgmg='D';}
					else if ($avgm<=40 && $avgm>25){$avgmg='E';}
					else if ($avgm<=25){$avgmg="F";}
				$notem=$dm["catatan"];

	$sqlf="SELECT * FROM `$tbnilai`, `$tbpeserta` WHERE tb_nilai.id_peserta=tb_peserta.id_peserta AND tb_nilai.id_kelas='$id_kelas' AND tb_peserta.id_peserta='$id_peserta' AND jenis_tes='Final'";
	$df=getField($conn,$sqlf);
				$lsf=$df["ls_score"];
					if ($lsf>85){$lsfg='A';}
					else if ($lsf<=85 && $lsf>70){$lsfg='B';}
					else if ($lsf<=70 && $lsf>55){$lsfg='C';}
					else if ($lsf<=55 && $lsf>40){$lsfg='D';}
					else if ($lsf<=40 && $lsf>25){$lsfg='E';}
					else if ($lsf<=25){$lsfg="F";}
				$suf=$df["su_score"];
					if ($suf>85){$sufg='A';}
					else if ($suf<=85 && $suf>70){$sufg='B';}
					else if ($suf<=70 && $suf>55){$sufg='C';}
					else if ($suf<=55 && $suf>40){$sufg='D';}
					else if ($suf<=40 && $suf>25){$sufg='E';}
					else if ($suf<=25){$sufg="F";}
				$rvf=$df["rv_score"];
					if ($rvf>85){$rvfg='A';}
					else if ($rvf<=85 && $rvf>70){$rvfg='B';}
					else if ($rvf<=70 && $rvf>55){$rvfg='C';}
					else if ($rvf<=55 && $rvf>40){$rvfg='D';}
					else if ($rvf<=40 && $rvf>25){$rvfg='E';}
					else if ($rvf<=25){$rvfg="F";}
				$compf=$df["comp_score"];
					if ($compf>85){$compfg='A';}
					else if ($compf<=85 && $compf>70){$compfg='B';}
					else if ($compf<=70 && $compf>55){$compfg='C';}
					else if ($compf<=55 && $compf>40){$compfg='D';}
					else if ($compf<=40 && $compf>25){$compfg='E';}
					else if ($compf<=25){$compfg="F";}
				$speakf=$df["speak_score"];
					if ($speakf>85){$speakfg='A';}
					else if ($speakf<=85 && $speakf>70){$speakfg='B';}
					else if ($speakf<=70 && $speakf>55){$speakfg='C';}
					else if ($speakf<=55 && $speakf>40){$speakfg='D';}
					else if ($speakf<=40 && $speakf>25){$speakfg='E';}
					else if ($speakf<=25){$speakfg="F";}
				$avgf=(($lsf+$suf+$rvf+$compf+$speakf)/5);
					if ($avgf>85){$avgfg='A';}
					else if ($avgf<=85 && $avgf>70){$avgfg='B';}
					else if ($avgf<=70 && $avgf>55){$avgfg='C';}
					else if ($avgf<=55 && $avgf>40){$avgfg='D';}
					else if ($avgf<=40 && $avgf>25){$avgfg='E';}
					else if ($avgf<=25){$avgfg="F";}
				$notef=$df["catatan"];
?>
<!-- Disini -->
<a class="btn btn-default btn=lg" href="?mnu=kelas"><img src='ypathicon/10.png'> Back to Class Page</a>
<br>

<hr id="myhr">
<h4><b><i>&emsp;<?php echo"$nama's";?> Academic Stats</h4></i></b>
<hr id="myhr">
<!-- Disini -->
<form action="" method="post" enctype="multipart/form-data">
<table width="50%" id="mytable">
<tr>
<th width="235" height="29" align="left" valign="top"><label for="id_kelas">&emsp;Class ID</label></th>
<th width="16" align="left" valign="top">:</th>
<th><b><?php echo $id_kelas;?></b></th>
</tr>

<tr>
<td valign="top" height="33"><label for="program">&emsp;Program</label></td>
<td valign="top">:</td>
<td valign="top" width="827"><?php echo"$program - $level";?></td>
</tr>

<tr>
<td valign="top" height="32"><label for="teacher">&emsp;Teacher</label></td>
<td valign="top">:</td>
<td valign="top"><?php echo $pengajar;?></td>
</tr>

<tr>
<td valign="top" height="32"><label for="schedule">&emsp;Schedule</label></td>
<td valign="top">:</td>
<td valign="top"><?php echo"$hari ($waktu)";?></td>
</tr>

<tr>
<td valign="top" height="32"><label for="teacher">&emsp;Ruangan</label></td>
<td valign="top">:</td>
<td valign="top"><?php echo $ruangan;?></td>
</tr>

<tr>
<td valign="top" height="38"><label for="term">&emsp;Term</label></td>
<td valign="top">:</td>
<td valign="top"><?php echo"$term ($deskripsi)";?></td>
</tr>

<tr><td colspan="3"><hr id="myhr"></tr>

<tr>
<td valign="top" height="33"><label for="agama">&emsp;Attendance</label></td>
<td valign="top">:</td>
<td valign="top"><?php echo"$jh / $jk Meeting(s)";?></td>
</tr>


</tr>

</table>
</form>
<hr id="myhr">

<div id="accordion">

<h4>Mid-Test Score</h4>
<div>
<table width="50%">
<br>
<tr>
<td width="46%" height="32" valign="top"><label for="username">&emsp;Listening Comprehension</label></td>
<td width="3%" valign="top">:</td>
<td width="51%" valign="top"><?php echo"$lsm ($lsmg)";?></td>
</tr>

<tr>
<td valign="top" height="32"><label for="username">&emsp;Structures & Usage</label></td>
<td valign="top">:</td>
<td valign="top"><?php echo"$sum ($sumg)";?></td>
</tr>

<tr>
<td valign="top" height="32"><label for="password">&emsp;Reading & Vocabulary</label></td>
<td valign="top">:</td>
<td valign="top"><?php echo"$rvm ($rvmg)";?></td>
</tr>

<tr>
<td valign="top" height="32"><label for="email">&emsp;Composition</label></td>
<td valign="top">:</td>
<td valign="top"><?php echo"$compm ($compmg)";?></td>
</tr>

<tr>
<td valign="top" height="32"><label for="no_telepon">&emsp;Speaking</label></td>
<td valign="top">:</td>
<td valign="top"><?php echo"$speakm ($speakmg)";?></td>
</tr>

<tr>
<td valign="top" height="32"><label for="no_telepon">&emsp;Average</label></td>
<td valign="top">:</td>
<td valign="top"><?php echo"$avgm ($avgmg)";?></td>
</tr>

<tr>
<td valign="top" height="33"><label for="status">&emsp;Teacher's Note</label></td>
<td valign="top">:</td>
<td valign="top"><?php echo $notem;?></td>
</table>
</div>

<h4>Final Test Score</h4>
<div>
<table width="50%">
<br>
<tr>
<td width="45%" height="32" valign="top"><label for="username">&emsp;Listening Comprehension</label></td>
<td width="3%" valign="top">:</td>
<td width="52%" valign="top"><?php echo"$lsf ($lsfg)";?></td>
</tr>

<tr>
<td valign="top" height="32"><label for="username">&emsp;Structures & Usage</label></td>
<td valign="top">:</td>
<td valign="top"><?php echo"$suf ($sufg)";?></td>
</tr>

<tr>
<td valign="top" height="32"><label for="password">&emsp;Reading & Vocabulary</label></td>
<td valign="top">:</td>
<td valign="top"><?php echo"$rvf ($rvfg)";?></td>
</tr>

<tr>
<td valign="top" height="32"><label for="email">&emsp;Composition</label></td>
<td valign="top">:</td>
<td valign="top"><?php echo"$compf ($compfg)";?></td>
</tr>

<tr>
<td valign="top" height="32"><label for="no_telepon">&emsp;Speaking</label></td>
<td valign="top">:</td>
<td valign="top"><?php echo"$speakf ($speakfg)";?></td>
</tr>

<tr>
<td valign="top" height="32"><label for="no_telepon">&emsp;Average</label></td>
<td valign="top">:</td>
<td valign="top"><?php echo"$avgf ($avgfg)";?></td>
</tr>

<tr>
<td valign="top" height="33"><label for="status">&emsp;Teacher's Note</label></td>
<td valign="top">:</td>
<td valign="top"><?php echo $notef;?></td>
</table>
</div>

<h4>List of Attendances</h4>
	<div>
<table width="100%" border="0" class="table table-striped table-bordered table-hover">
  <tr bgcolor="#036">
    <th width="4%"><center>No.</center></th>
    <th width="22%"><center>Attendance Date</center></th>
    <th width="21%"><center>Attendance Status</center></th>
	<th width="17%"><center>Details</center></th>
  </tr>
	<?php  
  $sql="SELECT * FROM `$tbabsensi`, `$tbabsensidetail` WHERE tb_absensi_detail.id_absensi=tb_absensi.id_absensi AND id_kelas='$id_kelas' AND id_siswa='$id_siswa' order by tanggal_pertemuan desc";
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
				$tanggal_pertemuan=$d["tanggal_pertemuan"];
				$status=$d["status"];
				if($status=='P'){$statusH='Present';}
					else{$statusH='Absent';}
				$catatan=$d["catatan"];
				$tanggal_input=$d["tanggal_input"];
				$waktu_input=$d["waktu_input"];

					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td align='center'>$no.</td>
				<td align='center'>$tanggal_pertemuan</td>
				<td align='center'>$statusH<br><i>($catatan)</i></td>
				<td align='center'>Input on $tanggal_input at $waktu_input</td>
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=kelas'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=kelas'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=kelas'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
	echo "<p align=center>Total of Data : <b>$jmldata</b> Item</p>";
?>
<!-- Disini -->
</div>
</div>