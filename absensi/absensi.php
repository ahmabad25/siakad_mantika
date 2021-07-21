<?php
$pro="simpan";
$tanggal_pertemuan=WKT(date("Y-m-d"));
$tanggal_input=WKT(date("Y-m-d"));
$waktu_input=date("H:i:s");
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal_pertemuan").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    

<script type="text/javascript"> 
function PRINT(x){ 
win=window.open('absensi/printfull.php?x='+x,'win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, id_periode=0'); } 
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
	$id_kelas=$_GET["id"];
	$sql="select * from `$tbkelas` where `id_kelas`='$id_kelas'";
	$d=getField($conn,$sql);
				$id_kelas=$d["id_kelas"];
				$id_kelas0=$d["id_kelas"];
				$program=getProgram($conn,$d["id_program"]);
				$level=getLevel($conn,$d["id_program"]);
				$id_pengajar=$d["id_pengajar"];
				$pengajar=getPengajar($conn,$d["id_pengajar"]);
				$hari=getSesiHari($conn,$d["id_sesi"]);
				$waktu=getSesiWaktu($conn,$d["id_sesi"]);
				$ruangan=getRuangan($conn,$d["id_ruangan"]);
				$term=$d["term"];
				$id_periode=$d["id_periode"];
	$sqla="select * from `$tbperiode` where `id_periode`='$id_periode'";
	$da=getField($conn,$sqla);
		$deskripsi=$da["deskripsi"];
?>
<!-- Disini -->
<a class="btn btn-default btn=lg" href="?mnu=kelas"><img src='ypathicon/10.png'> Back to Class Page</a>
<br>

<hr id="myhr">
<h4><b><i>&emsp;Attendance Date's Input</i></b></h4>
<hr id="myhr">
<!-- Disini -->
<?php
if($_GET["pro"]=="ubah"){
	$id_absensi=$_GET["kode"];
	$sql="select * from `$tbabsensi` where `id_absensi`='$id_absensi'";
	$d=getField($conn,$sql);
				$id_absensi=$d["id_absensi"];
				$id_absensi0=$d["id_absensi"];
				$tanggal_pertemuan=WKT($d["tanggal_pertemuan"]);
				$tanggal_input=WKT($d["tanggal_input"]);
				$waktu_input=$d["waktu_input"];
				$pro="ubah";
	$sqla="select * from `$tbperiode` where `id_periode`='$id_periode'";
	$da=getField($conn,$sqla);
		$deskripsi=$da["deskripsi"];		
}
?>
<form action="" method="post" enctype="multipart/form-data">
<table width="100%" id="mytable">

<tr>
	<th width="180" align="left"><label for="id_periode">&emsp;Class</label></th>
	<th width="17" align="left" valign="top">:</th>
	<th colspan="2"><b>(<?php echo $program;?>) <?php echo $level;?></b></th>
</tr>

<tr>
	<td ><label for="nama_periode">&emsp;Teacher</label></td>
	<td valign="top">:</td>
	<td colspan="2"><b><?php echo $pengajar;?></b></td>
</tr>

<tr>
	<td><label for="deskripsi">&emsp;Session</label></td>
	<td valign="top">:</td>
	<td width="881"><b><?php echo"$hari ($waktu)";?></b></td>
</tr>

<tr>
<td width="180" height="32"><label for="id_kelas">&emsp;Room</label></td>
<td width="17" valign="top">:</td>
<td colspan="2" valign="top"><b><?php echo $ruangan;?></b></td>
</tr>

<tr>
<td width="180" height="32"><label for="id_kelas">&emsp;Term & Period</label></td>
<td width="17" valign="top">:</td>
<td colspan="2" valign="top"><b><?php echo"$term ($deskripsi)";?></b></td>
</tr>
<tr>
<td align="left" height="38"><label for="tanggal_pertemuan">&emsp;Attendance Date</label></td>
<td>:</td>
<td><input name="tanggal_pertemuan" type="text" id="tanggal_pertemuan" value="<?php echo $tanggal_pertemuan;?>" size="15" />
</td>
</tr>

<tr>
<td height="38"><label for="tanggal_input">&emsp;Input Date</label></td>
<td>:</td>
<td><?php echo $tanggal_input;?></td>
</tr>

<tr>
<td height="38"><label for="tanggal_lahir">&emsp;Input Time</label></td>
<td>:</td>
<td><?php echo $waktu_input;?> WIB</td>
</tr>

<tr>
<td height="31"><td>
<td colspan="2"><input name="Simpan" type="submit" id="Simpan" value="Save" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
		<input name="id_periode" type="hidden" id="id_periode" value="<?php echo $gid_periode;?>" />
		<input name="id_kelas" type="hidden" id="id_kelas" value="<?php echo $id_kelas;?>" />
		<input name="id_pengajar" type="hidden" id="id_pengajar" value="<?php echo $id_pengajar;?>" />
		<input name="tanggal_input" type="hidden" id="tanggal_input" value="<?php echo $tanggal_input;?>" />
		<input name="waktu_input" type="hidden" id="waktu_input" value="<?php echo $waktu_input;?>" />
        <input name="id_absensi" type="hidden" id="id_absensi" value="<?php echo $id_absensi;?>" />
        <input name="id_absensi0" type="hidden" id="id_absensi0" value="<?php echo $id_absensi0;?>" />
        
        <a href="?mnu=absensi&id=<?php echo $id_kelas?>"><input name="Batal" type="button" id="Batal" value="Cancel" /></a>
</td></td></tr>
</table>
</form>
<hr id="myhr">
<!-- Disini -->
<div id="accordion">
<?php  
  $sqlb="SELECT tb_kelas.id_kelas, tb_program.nama_program, tb_program.level FROM tb_kelas JOIN tb_program ON tb_kelas.id_program = tb_program.id_program WHERE id_kelas = '$id_kelas'";
	$jumb=getJum($conn,$sqlb);
		if($jumb<1){
			echo"<h1>No data available...</h1>";
			}
	$db=getField($conn,$sqlb);
			$program=$db["nama_program"];
			$level=$db["level"];
?>    
<h4>List of Attendance Date(s) of <?php echo"($program) $level";?></h4>
<div>
<!-- Disini -->
<table width="100%" border="0" class="table table-striped table-bordered table-hover">
  <tr bgcolor="#036">
	<th width="10%"><center>No.</center></th>
    <th width="27%"><center>Attendance Date</center></th>
    <th width="43%"><center>Details</center></th>
    <th width="20%"><center>Menu</center></th>
  </tr>
<?php  
  $sql="select * from `$tbabsensi` where id_kelas='$id_kelas' and id_periode='$gid_periode' order by `tanggal_pertemuan` desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
	//--------------------------------------------------------------------------------------------
	$batas   = 12;
	$page = $_GET['page'];
	if(empty($page)){$posawal  = 0;$page = 1;}
	else{$posawal = ($page-1) * $batas;}
	
	$sql2 = $sql." LIMIT $posawal,$batas";
	$no = $posawal+1;
	//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {							
				$id_absensi=$d["id_absensi"];
				$tanggal_pertemuan=WKT($d["tanggal_pertemuan"]);
				$tanggal_input=WKT($d["tanggal_input"]);
				$waktu_input=$d["waktu_input"];
				
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
	echo"<tr bgcolor='$color'>
				<td><center>$no.</center></td>
				<td><center><b>$tanggal_pertemuan</b></center></td>
				<td>Input on <i>$tanggal_input</i> at <i>$waktu_input WIB</i></td>
				<td align='center'>
<a href='?mnu=absensi_detail&id1=$id_kelas&id2=$id_absensi'><img src='ypathicon/add-presention.png' title='Input Student Attendance'></a>	
<a href='?mnu=absensi&id=$id_kelas&pro=ubah&kode=$id_absensi'><img src='ypathicon/12.png' title='Change'></a>
<a href='?mnu=absensi&id=$id_kelas&pro=hapus&kode=$id_absensi'><img src='ypathicon/h.png' title='Delete' 
onClick='return confirm(\"Delete attendance on $tanggal from attendance's data?\")'></a></td>
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=absensi'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=absensi'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=absensi'>Next »</a></span>";
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
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$id_absensi=strip_tags($_POST["id_absensi"]);
	$id_absensi0=strip_tags($_POST["id_absensi0"]);
	$tanggal_pertemuan=BAL(strip_tags($_POST["tanggal_pertemuan"]));
	$tanggal_input=BAL(strip_tags($_POST["tanggal_input"]));
	$waktu_input=strip_tags($_POST["waktu_input"]);
	$id_kelas=strip_tags($_POST["id_kelas"]);
	$id_pengajar=strip_tags($_POST["id_pengajar"]);
	$id_periode=strip_tags($_POST["id_periode"]);
				
				
if($pro=="simpan"){
	$sqlj="SELECT * from `$tbabsensi` where id_kelas='$id_kelas' and tanggal_pertemuan='$tanggal_pertemuan'";
	$jumj=getJum($conn,$sqlj);
	if($jumj>0){
		echo"<script>alert('THE SELECTED DATE HAS ALREADY BEEN INPUT BEFORE!')</script>";
	}
	else{
$sql=" INSERT INTO `$tbabsensi` (
`id_absensi` ,
`tanggal_pertemuan` ,
`tanggal_input` ,
`waktu_input` ,
`id_kelas` ,
`id_pengajar` ,
`id_periode` 
) VALUES (
'', 
'$tanggal_pertemuan',
'$tanggal_input',
'$waktu_input',
'$id_kelas',
'$id_pengajar',
'$id_periode'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('SAVE SUCCESS');document.location.href='?mnu=absensi&id=$id_kelas';</script>";}
		else{echo"<script>alert('SAVE FAILED');document.location.href='?mnu=absensi&id=$id_kelas';</script>";}
	}
}
	else{
$sql="update `$tbabsensi` set 
`tanggal_pertemuan`='$tanggal_pertemuan',
`tanggal_input`='$tanggal_input',
`waktu_input`='$waktu_input' 
where `id_absensi`='$id_absensi0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('UPDATE SUCCESS');document.location.href='?mnu=absensi&id=$id_kelas';</script>";}
	else{echo"<script>alert('UPDATE FAILED');document.location.href='?mnu=absensi&id=$id_kelas';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_absensi=$_GET["kode"];
$sql="delete from `$tbabsensi` where `id_absensi`='$id_absensi'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('DELETE SUCCESS');document.location.href='?mnu=absensi&id=$id_kelas';</script>";}
else{echo"<script>alert('DELETE FAILED');document.location.href='?mnu=absensi&id=$id_kelas';</script>";}
}
?>
<br>
<p align="center"><a class="btn btn-default btn-lg" alt='PRINT' onclick="PRINT('<?php echo $id_kelas;?>')"><img src='ypathicon/print.png'> Print Attendance List</a></p>