<?php
$pro="simpan";
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
        $("#tanggal").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('absensi_detail/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
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
	$id_absensi=$_GET["id2"];
	$sql="select * from `$tbabsensi` where `id_absensi`='$id_absensi'";
	$d=getField($conn,$sql);
				$id_absensi=$d["id_absensi"];
				$id_absensi0=$d["id_absensi"];
				$tanggal_pertemuan=$d["tanggal_pertemuan"];
				$id_periode=getPeriode($conn,$d["id_periode"]);			
				$pengajar=getPengajar($conn,$d["id_pengajar"]);
			
	$sqlc="select * from `$tbkelas` where `id_kelas`='$id_kelas'";
	$dc=getField($conn,$sqlc);
				$program=getProgram($conn,$dc["id_program"]);
				$level=getLevel($conn,$dc["id_program"]);
				$hari=getSesiHari($conn,$dc["id_sesi"]);
				$waktu=getSesiWaktu($conn,$dc["id_sesi"]);
				$pengajar=getPengajar($conn,$dc["id_pengajar"]);
				$ruangan=getRuangan($conn,$dc["id_ruangan"]);
				$id_periode=$dc["id_periode"];
				$term=$dc["term"];
	$sqla="select * from `$tbperiode` where `id_periode`='$id_periode'";
	$da=getField($conn,$sqla);
		$deskripsi=$da["deskripsi"];
?>
<a class="btn btn-default btn=lg" href="?mnu=pabsensi&id=<?php echo $id_kelas;?>"><img src='ypathicon/10.png'> Back to Attendance Date's Page</a>
<br>
<!-----ACCORDION----->
<hr id="myhr">
<h4><b><i>&emsp;Student's Attendance Input</h4></i></b>
<hr id="myhr">
<!-----ACCORDION----->

<form action="" method="post" enctype="multipart/form-data">
<table width="100%" id="mytable">

<tr>
	<th width="186" align="left"><label for="id_periode">&emsp;Class</label></th>
	<th width="12" align="left" valign="top">:</th>
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
	<td width="880"><b><?php echo"$hari ($waktu)";?></b></td>
</tr>

<tr>
<td width="186" height="32"><label for="id_kelas">&emsp;Room</label></td>
<td width="12" valign="top">:</td>
<td colspan="2" valign="top"><b><?php echo $ruangan;?></b></td>
</tr>

<tr>
<td width="186" height="32"><label for="id_kelas">&emsp;Term & Period</label></td>
<td width="12" valign="top">:</td>
<td colspan="2" valign="top"><b><?php echo"$term ($deskripsi)";?></b></td>
</tr>

</table>
</form>

<?php
if($_GET["pro"]=="ubah"){
	$id=$_GET["kode"];
	$sql="select * from `$tbabsensidetail` where `id`='$id'";
	$d=getField($conn,$sql);
				$id=$d["id"];
				$id0=$d["id"];
				$id_absensi=$d["id_absensi"];
				$id_siswa=$d["id_siswa"];
				$tanggal_input=$d["tanggal_input"];
				$waktu_input=$d["waktu_input"];
				$catatan=$d["catatan"];
				$status=$d["status"];
				$pro="ubah";		
}
?>
<form action="" method="post" enctype="multipart/form-data">
<table width="100%" id="mytable">

<tr><td colspan="3"><hr id="myhr"></td></tr>

<tr>
<td width="196" height="24"><label for="id_siswa">&emsp;Student</label></td>
<td width="15" valign="top">:</td>
<td width="867" colspan="2"><select name="id_siswa" id="id_siswa">
  <option value="-- Pilih Siswa --">-- Pick Student --</option>
	<?php
	  	$s="select * from `tb_peserta` where id_kelas='$id_kelas'";
		$q=getData($conn,$s);
		foreach($q as $d){							
				$id_siswa0=$d["id_siswa"];
				$nama_siswa=getSiswa($conn,$d["id_siswa"]);
		echo"<option value='$id_siswa0' ";if($id_siswa0==$id_siswa){echo"selected";} echo">$id_siswa0 - $nama_siswa </option>";
		}
	?>
</select></td>
</tr>

<tr>
<td><label for="status">&emsp;Status</label></td>
<td valign="top">:</td>
<td colspan="2">
<input type="radio" name="status" id="status"  checked="checked" value="P" <?php if($status=="P"){echo"checked";}?>/>Present &emsp;
<input type="radio" name="status" id="status" value="A" <?php if($status=="A"){echo"checked";}?>/>Absent
</td></tr>

<tr>
<td valign="top" height="24"><label for="catatan">&emsp;Note</label></td>
<td valign="top">:</td>
<td colspan="2"><textarea name="catatan" class="input-text" id="catatan" cols="30" rows="3"><?php echo $catatan;?></textarea></td>
</tr>
</td>
</tr>

<tr>
<td height="47">
<td valign="top">
<td colspan="2">
	<input name="Simpan" type="submit" id="Simpan" value="Save" />
    <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
	<input name="id" type="hidden" id="id" value="<?php echo $id;?>" />
	<input name="id0" type="hidden" id="id0" value="<?php echo $id0;?>" />
	<input name="tanggal_input" type="hidden" id="tanggal_input" value="<?php echo $tanggal_input;?>" />
	<input name="waktu_input" type="hidden" id="waktu_input" value="<?php echo $waktu_input;?>" />
    <input name="id_absensi" type="hidden" id="id_absensi" value="<?php echo $id_absensi;?>" />
    <a href="?mnu=pabsensi_detail&id1=<?php echo"$id_kelas&id2=$id_absensi";?>"><input name="Batal" type="button" id="Batal" value="Cancel" /></a></td></tr>
</table>
</form>
<hr id="myhr">
<!-----ACCORDION----->
<div id="accordion">
<?php  
  $sqlq="select * from `$tbabsensi` where id_absensi='$id_absensi'";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>No data available...</h1>";
			}								
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$tgl_temu=$dq["tanggal_pertemuan"];
?>
<h4>List of Student Attendance on <?php echo $tgl_temu=date("d M Y");?></h4>
<div>
<!-----ACCORDION----->
<table width="100%" border="0" class="table table-striped table-bordered table-hover">
  <tr bgcolor="#036">
    <th width="3%"><center>No.</center></th>
    <th width="10%"><center>Picture</center></th>
    <th width="22%"><center>Student</center></th>
    <th width="15%"><center>Status</center></th>
    <th width="40%"><center>Note</center></th>
    <th width="10%"><center>Option</center></th>
  </tr>
<?php  
  $sql="SELECT tb_absensi_detail.id, tb_absensi_detail.id_absensi, tb_siswa.gambar, tb_absensi_detail.id_siswa, tb_siswa.nama_siswa, tb_absensi_detail.status, tb_absensi_detail.catatan
  		FROM tb_absensi_detail, tb_siswa 
  		WHERE tb_absensi_detail.id_siswa = tb_siswa.id_siswa AND id_absensi='$id_absensi' order by `id` desc";
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
				$id=$d["id"];
				$id_absensi=$d["id_absensi"];
				$id_siswa=$d["id_siswa"];
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$nama_siswa=$d["nama_siswa"];
				$catatan=$d["catatan"];
				$status=$d["status"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td><center>$no.</center></td>
				<td><div align='center'>";
echo"<a href='#' onclick='buka(\"siswa/zoom.php?id=$id_siswa\")'>
<img src='$YPATH/$gambar' width='40' height='40' /></a></div>";
				echo"</td>
				<td align='center'><b>$nama_siswa</b></td>
				<td align='center'>$status</td>
				<td>$catatan</td>
				<td align='center'>
<a href='?mnu=pabsensi_detail&id1=$id_kelas&id2=$id_absensi&pro=ubah&kode=$id'><img src='ypathicon/12.png' title='Change'></a>
<a href='?mnu=pabsensi_detail&id1=$id_kelas&id2=$id_absensi&pro=hapus&kode=$id'><img src='ypathicon/h.png' title='Delete' 
onClick='return confirm(\"Delete selected data from student attendance data?\")'></a></td>
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=pabsensi_detail'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=pabsensi_detail'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=pabsensi_detail'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
	echo "<p align=center>Total of Data : <b>$jmldata</b> Item</p>";
?>
<!-----ACCORDION----->
</div>
<?php }?>
</div>
<!-----ACCORDION----->
<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$id=strip_tags($_POST["id"]);
	$id0=strip_tags($_POST["id0"]);
	$id_absensi=strip_tags($_POST["id_absensi"]);
	$id_siswa=strip_tags($_POST["id_siswa"]);
	$catatan=strip_tags($_POST["catatan"]);
	$status=strip_tags($_POST["status"]);
	$tanggal_input=BAL(strip_tags($_POST["tanggal_input"]));
	$waktu_input=strip_tags($_POST["waktu_input"]);

	$id1=strip_tags($_POST["id1"]);
	$id2=strip_tags($_POST["id2"]);
		
if($pro=="simpan"){
	$sql="select * from `$tbabsensidetail` where id_siswa='$id_siswa' and id_absensi='$id_absensi'";
  	$jum=getJum($conn,$sql);
		if($jum > 0){
		echo"<script>alert('ATTENDANCE FOR THE SELECTED STUDENT HAS ALREADY BEEN INPUT BEFORE!');document.location.href='?mnu=pabsensi_detail&id1=$id_kelas&id2=$id_absensi';</script>";		
		}
	else{	
$sql=" INSERT INTO `$tbabsensidetail` (
`id` ,
`id_absensi` ,
`id_siswa` ,
`catatan` ,
`status` ,
`tanggal_input` ,
`waktu_input`
) VALUES (
'', 
'$id_absensi', 
'$id_siswa',
'$catatan',
'$status',
'$tanggal_input',
'$waktu_input'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('SAVE SUCCESS');document.location.href='?mnu=pabsensi_detail&id1=$id_kelas&id2=$id_absensi';</script>";}
		else{echo"<script>alert('SAVE FAILED');document.location.href='?mnu=pabsensi_detail&id1=$id_kelas&id2=$id_absensi';</script>";}
	}
	}else{
$sql="update `$tbabsensidetail` set 
`status`='$status',
`catatan`='$catatan',
`tanggal_input`='$tanggal_input',
`waktu_input`='$waktu_input'
where `id`='$id0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('UPDATE SUCCESS');document.location.href='?mnu=pabsensi_detail&id1=$id_kelas&id2=$id_absensi';</script>";}
	else{echo"<script>alert('UPDATE FAILED');document.location.href='?mnu=pabsensi_detail&id1=$id_kelas&id2=$id_absensi';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id=$_GET["kode"];
$sql="delete from `$tbabsensidetail` where `id`='$id'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('DELETE SUCCESS');document.location.href='?mnu=pabsensi_detail&id1=$id_kelas&id2=$id_absensi';</script>";}
else{echo"<script>alert('DELETE FAILED');document.location.href='?mnu=pabsensi_detail&id1=$id_kelas&id2=$id_absensi';</script>";}
}
?>

