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
function PRINT(){ 
win=window.open('nilai/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
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
	$id_kelas=$_GET["id1"];
	$id_peserta=$_GET["id2"];
	
	$sql="select * from `$tbkelas` where `id_kelas`='$id_kelas'";
	$d=getField($conn,$sql);
				$id_kelas=$d["id_kelas"];
				$id_kelas0=$d["id_kelas"];
				$id_program=getProgram($conn,$d["id_program"]);
				$id_program1=getLevel($conn,$d["id_program"]);
				$id_pengajar=getPengajar($conn,$d["id_pengajar"]);
				$id_sesiH=getSesiHari($conn,$d["id_sesi"]);
				$id_sesiW=getSesiWaktu($conn,$d["id_sesi"]);
				$id_ruangan=getRuangan($conn,$d["id_ruangan"]);
				$term=$d["term"];
				$id_periode=$d["id_periode"];

	$sqlb="select * from `$tbpeserta` where `id_peserta`='$id_peserta'";
	$db=getField($conn,$sqlb);
				$id_peserta=$db["id_peserta"];
				$id_peserta0=$db["id_peserta"];
				$id_siswa=$db["id_siswa"];
				$nama_siswa=getSiswa($conn,$db["id_siswa"]);
	$sqla="select * from `$tbperiode` where `id_periode`='$id_periode'";
	$da=getField($conn,$sqla);
		$deskripsi=$da["deskripsi"];
	$sqlc="select * from `$tbsiswa` where `id_siswa`='$id_siswa'";
	$dc=getField($conn,$sqlc);
		$gambar=$dc["gambar"];
		$jk=$dc["jenis_kelamin"];
			if($jk=='M'){$gen='Male';}
			else{$gen='Female';}
		$tempat_lahir=$dc["tempat_lahir"];
		$tanggal_lahir=WKT($dc["tanggal_lahir"]);
		$email=$dc["email"];
?>

<?php
	$sql="select * from `$tbnilai` where `id_periode`='$gid_periode' and id_kelas='$id_kelas' and id_peserta='$id_peserta' and jenis_tes='Mid'";
	$jum=getJum($conn,$sql);
if($jum>0){
	$btnpro="Update Score";
	$d=getField($conn,$sql);
				$id_nilai=$d["id_nilai"];
				$id_nilai0=$d["id_nilai"];
				$id_periode=$d["id_periode"];
				$id_kelas=$d["id_kelas"];
				$id_peserta=$d["id_peserta"];
				$ls_score=$d["ls_score"];
				$su_score=$d["su_score"];
				$rv_score=$d["rv_score"];
				$comp_score=$d["comp_score"];
				$speak_score=$d["speak_score"];
				$catatan=$d["catatan"];
				$pro="ubah";
}
else{
	$pro="simpan";
$btnpro="Save Score";
	$ls_score="";
				$su_score="";
				$rv_score="";
				$comp_score="";
				$speak_score="";
				$catatan="";
}

?>
<a class="btn btn-default btn=lg" href="?mnu=ppeserta&id=<?php echo $id_kelas?>"><img src='ypathicon/10.png'> Back to Student's List</a>
<br>
<!-- Disini -->
<hr id="myhr">
<h4><b><i>&emsp;Score's Input</h4></i></b>
<hr id="myhr">
<!-- Disini -->
<form action="" method="post" enctype="multipart/form-data">
<table border="0" width="60%" id="mytable">
<tr>
<th width="255" height="29" align="left"><label for="id_siswa">&emsp;Student's ID</label></th>
<th width="17" align="left" valign="top">:</th>
<th align="left"><b><?php echo"$id_siswa-$id_peserta";?></b></th>
<td width="163" rowspan="5" align="left">
<center>
<?php
echo"<a href='#' onclick='buka(\"siswa/zoom.php?id=$id_siswa\")'>
<img src='$YPATH/$gambar' width='77' height='80' />
</a>
";
?>
</center>
</td>
<td width="377"></td>
</tr>

<tr>
<td height="30"><label for="nama_siswa">&emsp;Name</label></td>
<td valign="top">:</td>
<td valign="top" width="260"><?php echo strtoupper($nama_siswa);?>
</td>
</tr>

<tr>
<td height="31"><label for="jenis_kelamin">&emsp;Gender</label></td>
<td valign="top">:</td>
<td valign="top" colspan="1"><?php echo $gen;?></td>
</tr>

<tr>
<td height="37"><label for="tempat_lahir">&emsp;Birth</label></td>
<td valign="top">:</td>
<td valign="top"><?php echo"$tempat_lahir, $tanggal_lahir";?>
</td>
</tr>

<tr>
<td height="38"><label for="email">&emsp;E-Mail</label></td>
<td valign="top">:</td>
<td valign="top"><?php echo $email;?></td>
</tr>
</table>

<table id="mytable">
<tr><td colspan="4"><hr id="myhr"></td></tr>

<tr>
<td height="37"><label for="jenis_tes">&emsp;Test Type</label></td>
<td valign="top">:</td>
<td valign="top" colspan="2"><b>Mid-Test</b></td></tr>

<tr>
<td width="277" height="33"><label for="ls_score">&emsp;Listening Comprehension Score</label></td>
<td width="23" valign="top">:</td>
<td width="290" colspan="1"><input name="ls_score" type="text" id="ls_score" value="<?php echo $ls_score;?>" size="30" /></td>
<td width="484" rowspan="5"><b>* Grading Indicator :
				<br>
				 - <i>A</i> : 100 - 86
                <br> - <i>B</i> : 85 - 71
                <br> - <i>C</i> : 70 - 56
                <br> - <i>D</i> : 55 - 41
                <br> - <i>E</i> : 40 - 26
                <br> - <i>F</i> : <25 </b></td>
</tr>
	
<tr>
<td height="33"><label for="su_score">&emsp;Structures and Usage Score</label></td>
<td valign="top">:</td>
<td colspan="1"><input name="su_score" type="text" id="su_score" value="<?php echo $su_score;?>" size="30" /></td>
</tr>
	
<tr>
<td height="33"><label for="rv_score">&emsp;Reading and Vocabulary Score</label></td>
<td valign="top">:</td>
<td colspan="1"><input name="rv_score" type="text" id="rv_score" value="<?php echo $rv_score;?>" size="30" /></td>
</tr>

<tr>
<td height="34"><label for="comp_score">&emsp;Composition Score</label></td>
<td valign="top">:</td>
<td colspan="1"><input name="comp_score" type="text" id="comp_score" value="<?php echo $comp_score;?>" size="30" /></td>
</tr>
	
<tr>
<td height="38"><label for="speak_score">&emsp;Speaking Score</label></td>
<td valign="top">:</td>
<td colspan="1"><input name="speak_score" type="text" id="speak_score" value="<?php echo $speak_score;?>" size="30" /></td>
</tr>

<tr>
<td valign="top" height="67"><label for="catatan">&emsp;Teacher's Note</label></td>
<td valign="top">:</td>
<td colspan="2"><textarea name="catatan" cols="55" rows="3" id="catatan"><?php echo $catatan;?></textarea>
</td>
</tr>

<tr>
<td height="34">
<td valign="top">
<td colspan="2">
		<input name="Simpan" type="submit" id="Simpan" value="<?php echo $btnpro;?>" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />

        <input name="id1" type="hidden" id="id1" value="<?php echo $id_kelas;?>" />
    	<input name="id2" type="hidden" id="id2" value="<?php echo $id_peserta;?>" />
        <input name="id_nilai" type="hidden" id="id_nilai" value="<?php echo $id_nilai;?>" />
		<input name="id_periode" type="hidden" id="id_periode" value="<?php echo $id_periode;?>" />
        <input name="id_nilai0" type="hidden" id="id_nilai0" value="<?php echo $id_nilai0;?>" />
        <a href="?mnu=innilai&id1=<?php echo"$id_kelas&id2=$id_peserta";?>"><input name="Batal" type="button" id="Batal" value="Cancel" /></a>
</td></tr>
</table>
</form>
<hr id="myhr">
<!-- Disini -->

<!-- Disini -->
<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$id_nilai=strip_tags($_POST["id_nilai"]);
	$id_nilai0=strip_tags($_POST["id_nilai0"]);
	$id_periode=strip_tags($_POST["id_periode"]);
	$id_kelas=strip_tags($_POST["id1"]);
	$id_peserta=strip_tags($_POST["id2"]);
	$jenis_tes="Mid";

	$id1=strip_tags($_POST["id1"]);
	$id2=strip_tags($_POST["id2"]);

	$ls_score=strip_tags($_POST["ls_score"]);
	$su_score=strip_tags($_POST["su_score"]);
	$rv_score=strip_tags($_POST["rv_score"]);
	$comp_score=strip_tags($_POST["comp_score"]);
	$speak_score=strip_tags($_POST["speak_score"]);
	$catatan=strip_tags($_POST["catatan"]);
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbnilai` (
`id_nilai` ,
`id_periode` ,
`id_kelas` ,
`id_peserta` ,
`jenis_tes`,
`ls_score` ,
`su_score` ,
`rv_score` ,
`comp_score` ,
`speak_score` ,
`catatan` 
) VALUES (
'', 
'$id_periode', 
'$id_kelas',
'$id_peserta',
'$jenis_tes',
'$ls_score',
'$su_score',
'$rv_score',
'$comp_score',
'$speak_score',
'$catatan'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('SAVE SUCCESS');document.location.href='?mnu=ppeserta&id=$id1';</script>";}
		else{echo"<script>alert('SAVE FAILED');document.location.href='?mnu=innilai&id1=$id1&id2=$id2';</script>";}
}
	else{
$sql="update `$tbnilai` set 
`id_periode`='$id_periode',
`id_kelas`='$id_kelas' ,
`id_peserta`='$id_peserta',
`ls_score`='$ls_score',
`su_score`='$su_score',
`rv_score`='$rv_score',
`comp_score`='$comp_score',
`speak_score`='$speak_score',
`catatan`='$catatan' 
where `id_nilai`='$id_nilai0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('UPDATE SUCCESS');document.location.href='?mnu=ppeserta&id=$id1';</script>";}
	else{echo"<script>alert('UPDATE FAILED');document.location.href='?mnu=innilai&id1=$id1&id2=$id2';</script>";}
	}//else simpan
}
?>