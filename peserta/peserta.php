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
function PRINTDP(a){ 
win=window.open('peserta/printdp.php?x='+a,'win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); }

function PRINTDNM(p){ 
win=window.open('nilai/printdnm.php?id1='+p+'&id2=Mid','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); }

function PRINTDNF(q){ 
win=window.open('nilai/printdnf.php?id1='+q+'&id2=Final','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); }

function PRINTRC(c,d){
win=window.open('nilai/rapor.php?id1='+c+'&id2='+d,'win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); }
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
				$id_sesi=$d["id_sesi"];
				$id_sesiH=getSesiHari($conn,$d["id_sesi"]);
				$id_sesiW=getSesiWaktu($conn,$d["id_sesi"]);
				$id_periode=$d["id_periode"];
				$term=$d["term"];
	
	$sqla="select * from `$tbperiode` where `id_periode`='$id_periode'";
	$da=getField($conn,$sqla);
		$deskripsi=$da["deskripsi"];
?>
<!-- Disini -->
<a class="btn btn-default btn=lg" href="?mnu=kelas"><img src='ypathicon/10.png'> Back to Class Page</a>
<br>

<hr id="myhr">
<h4><b><i>&emsp;Input Student to Class</h4></i></b>
<hr id="myhr">
<!-- Disini -->
<?php
if($_GET["pro"]=="ubah"){
	$id_peserta=$_GET["kode"];
	$sql="select * from `$tbpeserta` where `id_peserta`='$id_peserta'";
	$d=getField($conn,$sql);
				$id_peserta=$d["id_peserta"];
				$id_peserta0=$d["id_peserta"];
				$id_kelas=$d["id_kelas"];
				$id_siswa=$d["id_siswa"];
				$pro="ubah";		
}
?>

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

<tr>
<td height="33"><label for="id_siswa">&emsp;Student</label>
<td valign="top">:
<td colspan="2" valign="top"><select name="id_siswa" id="id_siswa">
  <option value="-- Pick Student --">-- Pick Student --</option>
	<?php
	  	$s="select * from `tb_siswa` where status='Active'";
		$q=getData($conn,$s);
		foreach($q as $d){							
				$id_siswa0=$d["id_siswa"];
				$nama_siswa=$d["nama_siswa"];
		echo"<option value='$id_siswa0' ";if($id_siswa0==$id_siswa){echo"selected";} echo">$id_siswa0 - $nama_siswa </option>";
		}
	?>
  </select></td>
</tr>

<tr>
<td height="32">
<td valign="top">
<td colspan="2" valign="top">	<input name="Simpan" type="submit" id="Simpan" value="Save" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id_periode" type="hidden" id="id_periode" value="<?php echo $gid_periode;?>" />
		<input name="id_peserta" type="hidden" id="id_peserta" value="<?php echo $id_peserta;?>" />
        <input name="id_peserta0" type="hidden" id="id_peserta0" value="<?php echo $id_peserta0;?>" />
        <input name="id_kelas" type="hidden" id="id_kelas" value="<?php echo $id_kelas;?>" />
        <!--<input name="id_sesi" type="hidden" id="id_sesi" value="<?php echo $id_sesi;?>" />-->
        <a href="?mnu=peserta&id=<?php echo $id_kelas;?>"><input name="Batal" type="button" id="Batal" value="Cancel" /></a>
</td></tr>
</table>
</form>
<hr id="myhr">
<!-- Disini -->
<div id="accordion">
<!--<?php  
  /*$sqlq="select distinct(id_kelas) from `$tbpeserta` where id_periode ='$gid_periode' order by `id_peserta` desc";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>Maaf data belum tersedia...</h1>";
			}								
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$id_kelas=$dq["id_kelas"];
				$kelas=getKelas($conn,$id_kelas);*/
?>-->
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
<a href='?mnu=mnilai&id1=$id_kelas&id2=$id_peserta'><img src='ypathicon/b-star.png' title='Input Mid-Test Score'></a>
<a href='?mnu=fnilai&id1=$id_kelas&id2=$id_peserta'><img src='ypathicon/y-star.png' title='Input Final Test Score'></a>
<a href='?mnu=peserta&id=$id_kelas&pro=ubah&kode=$id_peserta'><img src='ypathicon/12.png' title='Change'></a>
<a href='?mnu=peserta&id=$id_kelas&pro=hapus&kode=$id_peserta'><img src='ypathicon/h.png' title='Delete' 
onClick='return confirm(\"Delete this student from this class's data?\")'></a></td>
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=peserta'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=peserta'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=peserta'>Next »</a></span>";
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
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$id_peserta=strip_tags($_POST["id_peserta"]);
	$id_peserta0=strip_tags($_POST["id_peserta0"]);
	$id_kelas=strip_tags($_POST["id_kelas"]);
	$id_siswa=strip_tags($_POST["id_siswa"]);
	$id_periode=strip_tags($_POST["id_periode"]);

	//$id_sesi=strip_tags($_POST["id_sesi"]);

if($pro=="simpan"){
	$sqlq="SELECT * FROM `$tbpeserta` WHERE id_periode='$id_periode' AND id_kelas='$id_kelas' AND id_siswa='$id_siswa'";
	$jumq=getJum($conn,$sqlq);
  	if($jumq>0){
	  echo"<script>alert('THE SELECTED STUDENT IS ALREADY ASSIGNED TO THIS CLASS!');document.location.href='?mnu=peserta&id=$id_kelas';</script>";
  	}else{
  		/*$sqlz="select id_peserta from `$tbpeserta`, `$tbkelas` where tb_peserta.id_kelas=tb_kelas.id_kelas and tb_peserta.id_periode ='$id_periode' and tb_kelas.id_kelas<>'$id_kelas' and tb_kelas.id_sesi='$id_sesi' and tb_peserta.id_siswa='$id_siswa'";
		$jum=getJum($conn,$sqlz);
		$dz=getField($conn,$sqlz);
			$pengajar=getPengajar($conn,$dz["id_pengajar"]);
			$jenis_kelamin=getMrMs($conn,$dz["id_pengajar"]);
				if($jenis_kelamin=='M'){$cal='Mr.';}
				else{$cal='Ms.';}
			$level=getLevel($conn,$dz["id_program"]);
  		if($jumq>0){
	  	echo"<script>alert('THE SELECTED STUDENT'S SCHEDULE IS CRASHED WITH $level $cal $pengajar Class);document.location.href='?mnu=peserta&id=$id_kelas';</script>";
  		}else{*/
$sql=" INSERT INTO `$tbpeserta` (
`id_peserta` ,
`id_periode`,
`id_kelas` ,
`id_siswa`
) VALUES (
'', 
'$id_periode', 
'$id_kelas', 
'$id_siswa'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('SUCCESSFULLY ADDING STUDENT TO THIS CLASS');document.location.href='?mnu=peserta&id=$id_kelas';</script>";}
		else{echo"<script>alert('FAILED TO ADD STUDENT TO THIS CLASS');document.location.href='?mnu=peserta&id=$id_kelas';</script>";}
  		/*}*/
	}
}
  else{
$sql="update `$tbpeserta` set 
`id_kelas`='$id_kelas',`id_periode`='$id_periode',
`id_siswa`='$id_siswa'
where `id_peserta`='$id_peserta0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('UPDATING STUDENT DATA SUCCESS');document.location.href='?mnu=peserta&id=$id_kelas';</script>";}
	else{echo"<script>alert('UPDATING STUDENT DATA FAILED');document.location.href='?mnu=peserta&id=$id_kelas';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_peserta=$_GET["kode"];
$sql="delete from `$tbpeserta` where `id_peserta`='$id_peserta'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('SUCCESSFULLY DELETED STUDENT FROM THIS CLASS');document.location.href='?mnu=peserta&id=$id_kelas';</script>";}
else{echo"<script>alert('FAILED TO DELETE STUDENT FROM THIS CLASS');document.location.href='?mnu=peserta&id=$id_kelas';</script>";}
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
<a href='?mnu=mnilai&id1=$id_kelas&id2=$id_peserta'><img src='ypathicon/12.png' title='Change'></a>
<a href='?mnu=peserta&id=$id_kelas&pro=hapusNilai&kode=$id_nilai'><img src='ypathicon/h.png' title='Delete' 
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=peserta'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=peserta'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=peserta'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
	echo "<p align=center>Total of Data : <b>$jmldata</b> Item</p>";
?>
<p align="center">
<a class="btn btn-default btn-lg" onclick="PRINTDNM('<?php echo"$id_kelas";?>')"><img src='ypathicon/print.png'> Print MID-Test Scores</a>
<!-- Disini -->
</div>
<?php /*}*/?>

<!-- Disini -->
<?php
if($_GET["pro"]=="hapusNilai"){
$id_nilai=$_GET["kode"];
$sqln="delete from `$tbnilai` where `id_nilai`='$id_nilai'";
$hapus=process($conn,$sqln);
if($hapus) {echo "<script>alert('SUCCESSFULLY DELETED SCORE');document.location.href='?mnu=peserta&id=$id_kelas';</script>";}
else{echo"<script>alert('FAILED TO DELETE SCORE');document.location.href='?mnu=peserta&id=$id_kelas';</script>";}
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
<h4>List of Final Test Scores in <?php echo"($program) $level";?></h4>
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
<a href='#' onclick='PRINTRC(\"$id_admin\",\"$id_nilai\")'><img src='ypathicon/report-2-16.png' title='Print Report'></a>
<a href='?mnu=fnilai&id1=$id_kelas&id2=$id_peserta'><img src='ypathicon/12.png' title='Change'></a>
<a href='?mnu=peserta&id=$id_kelas&pro=hapusNilai&kode=$id_nilai'><img src='ypathicon/h.png' title='Delete' 
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=peserta'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=peserta'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=peserta'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
	echo "<p align=center>Total of Data : <b>$jmldata</b> Item</p>";
?>
<p align="center">
<a class="btn btn-default btn-lg" onclick="PRINTDNF('<?php echo"$id_kelas";?>')"><img src='ypathicon/print.png'> Print Final Test Scores</a>
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
if($hapus) {echo "<script>alert('SUCCESSFULLY DELETED SCORE');document.location.href='?mnu=peserta&id=$id_kelas';</script>";}
else{echo"<script>alert('FAILED TO DELETE SCORE');document.location.href='?mnu=peserta&id=$id_kelas';</script>";}
}
?>
<br>
<p align="center">
	<a class="btn btn-default btn-lg" onclick="PRINTDP('<?php echo $id_kelas;?>')"><img src='ypathicon/print.png'> Print STUDENT List</a>
</p>