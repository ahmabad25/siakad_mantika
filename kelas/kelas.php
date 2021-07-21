<?php
$pro="simpan";
$tanggal=WKT(date("Y-m-d"));
$term=date("Y");
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
win=window.open('kelas/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, keterangan=0'); } 
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

<?php
  $sql="select `id_kelas` from `$tbkelas` order by `id_kelas` desc";
  $q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $indate=date("y");

  $kd="C".$indate;//KG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["id_kelas"];
   
    $indatex=substr($idmax, 1, 2);
    if($indatex==$indate){
     $urut=substr($idmax,3,2)+1;
     if($urut<10){$idmax="$kd"."0".$urut;}
     else{$idmax="$kd".$urut;}
    }//==
    else{
     $idmax="$kd"."01";
     }   
   }//jum>0
  else{$idmax="$kd"."01";}
  $id_kelas=$idmax;
?>
<!-- Disini -->

<?php
if($_GET["pro"]=="ubah"){
	$id_kelas=$_GET["kode"];
	$sql="select * from `$tbkelas` where `id_kelas`='$id_kelas'";
	$d=getField($conn,$sql);
				$id_kelas=$d["id_kelas"];
				$id_kelas0=$d["id_kelas"];
				$id_program=$d["id_program"];
				$id_pengajar=$d["id_pengajar"];
				$id_sesi=$d["id_sesi"];
				$id_ruangan=$d["id_ruangan"];
				$id_periode=$d["id_periode"];
				$term=$d["term"];
				$status=$d["status"];
				$pro="ubah";		
}
?>
<!-- Disini -->
<hr id="myhr">
<h4><b><i>&emsp;Class's Input</i></b></h4>
<hr id="myhr">
<!-- Disini -->
<form action="" method="post" enctype="multipart/form-data">
<table width="100%" id="mytable">

<tr>
	<th width="204"><label for="id_periode">&emsp;Period's ID</label></th>
	<th width="17" valign="top">:</th>
	<th width="857" colspan="2"><b><?php echo $gid_periode;?></b></th>
</tr>

<tr>
	<td ><label for="nama_periode">&emsp;Period's name</label></td>
	<td valign="top">:</td>
	<td colspan="2"><?php echo $gnama_periode;?></td>
</tr>

<tr>
	<td><label for="deskripsi">&emsp;Description</label></td>
	<td valign="top">:</td>
	<td><?php echo $gdeskripsi;?></td>
</tr>

<tr>
	<td><label for="term">&emsp;Term</label></td>
	<td valign="top">:</td>
	<td><?php echo $term;?></td>
</tr>

<tr><td colspan="4"><hr id="myhr"></td></tr>

<tr>
	<td><label for="id_kelas">&emsp;Class's ID</label></td>
	<td valign="top">:</td>
	<td><?php echo $id_kelas;?></td>
</tr>

<tr>
<td height="34"><label for="id_program">&emsp;Program</label>
<td valign="top">:
<td colspan="2">
	<select name="id_program" id="id_program">
  	<option value="-- Pilih Program --">-- Pick Program --</option>
	<?php
	  	$s="select * from `tb_program`";
		$q=getData($conn,$s);
		foreach($q as $d){							
				$id_program0=$d["id_program"];
				$nama_program=$d["nama_program"];
				$level=$d["level"];
		echo"<option value='$id_program0' ";if($id_program0==$id_program){echo"selected";} echo">$nama_program $level</option>";
		}
	?>
  </select>
</td>
</tr>

<tr>
<td height="33"><label for="id_pengajar">&emsp;Teacher</label>
<td valign="top">:
<td colspan="2"><select name="id_pengajar" id="id_pengajar">
  <option value="-- Pilih Pengajar --">-- Pick Teacher --</option>
	<?php
	  	$s="select * from `tb_pengajar`";
		$q=getData($conn,$s);
		foreach($q as $d){							
				$id_pengajar0=$d["id_pengajar"];
				$nama_pengajar=$d["nama_pengajar"];
		echo"<option value='$id_pengajar0' ";if($id_pengajar0==$id_pengajar){echo"selected";} echo">$id_pengajar0 - $nama_pengajar </option>";
		}
	?>
  </select></td>
</tr>


<tr>
<td height="34"><label for="id_sesi">&emsp;Session</label>
<td valign="top">:<td colspan="2">
  <select name="id_sesi" id="id_sesi" required="true">
  <option value="0">-- Pick Session --</option>
	<?php
	  	$s="select * from `tb_sesi`";
		$q=getData($conn,$s);
		foreach($q as $d){							
				$id_sesi0=$d["id_sesi"];
				$hari=$d["hari"];
				$waktu=$d["waktu"];
		echo"<option value='$id_sesi0' ";if($id_sesi0==$id_sesi){echo"selected";} echo">$hari ($waktu)</option>";
		}
	?>
  </select>
</td></tr>

<tr>
<td height="34"><label for="id_ruangan">&emsp;Room</label>
<td valign="top">:
<td colspan="2">
  <select name="id_ruangan" id="id_ruangan">
  <option value="-- Pilih Ruangan --">-- Pick Room --</option>
	<?php
	  	$s="select * from `tb_ruangan`";
		$q=getData($conn,$s);
		foreach($q as $d){							
				$id_ruangan0=$d["id_ruangan"];
				$nama_ruangan=$d["nama_ruangan"];
		echo"<option value='$id_ruangan0' ";if($id_ruangan0==$id_ruangan){echo"selected";} echo">$nama_ruangan</option>";
		}
	?>
  </select></td>
</tr>

<tr>
<td valign="top" height="37"><label for="status">&emsp;Status</label></td>
<td valign="top">:</td>
<td valign="top">
<input type="radio" name="status" id="status" checked="checked" value="Active" <?php if($status=="Active"){echo"checked";}?>/>Active &emsp;
<input type="radio" name="status" id="status" value="Inactive" <?php if($status=="Inactive"){echo"checked";}?>/>Inactive
</td></tr>

<tr>
<td height="27">
<td valign="top">
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" value="Save" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
		<input name="id_periode" type="hidden" id="id_periode" value="<?php echo $gid_periode;?>" />
		<input name="term" type="hidden" id="term" value="<?php echo $term;?>" />
        <input name="id_kelas" type="hidden" id="id_kelas" value="<?php echo $id_kelas;?>" />
        <input name="id_kelas0" type="hidden" id="id_kelas0" value="<?php echo $id_kelas0;?>" />
        <a href="?mnu=kelas"><input name="Batal" type="button" id="Batal" value="Cancel" /></a>
</td></tr>
</table>
</form>
<hr id="myhr">
<!-- Disini -->
<div id="accordion">
<?php  
  $sqlq="select distinct(status) from `$tbkelas` order by `id_kelas` desc";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>No data available...</h1>";
			}								
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$status=$dq["status"];

?>    
<h4>List of <?php echo $status;?> Class(es)</h4>
<div>
<!-- Disini -->
<table width="100%" border="0" class="table table-striped table-bordered table-hover">
  <tr bgcolor="#036">
    <th width="4%"><center>No.</center></th>
    <th width="22%"><center>Class</center></th>
    <th width="21%"><center>Schedule</center></th>
	<th width="17%"><center>Term & Period</center></th>
    <th width="10%"><center>Menu</center></th>
  </tr>
<?php  
  $sql="select * from `$tbkelas` where status='$status' order by `id_program` asc";
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
				$id_kelas=$d["id_kelas"];
				$id_program=$d["id_program"];
				$id_pengajar=getPengajar($conn,$d["id_pengajar"]);
				$id_ruangan=getRuangan($conn,$d["id_ruangan"]);
				$id_sesi=$d["id_sesi"];
				$id_periode=$d["id_periode"];
				$term=$d["term"];
				
				$sqlf="select * from `$tbprogram` where `id_program`='$id_program'";
	$df=getField($conn,$sqlf);
				$nama_program=$df["nama_program"];
				$level=$df["level"];				

				$sqlg="select * from `$tbsesi` where `id_sesi`='$id_sesi'";
	$dg=getField($conn,$sqlg);
				$hari=$dg["hari"];
				$waktu=$dg["waktu"];
				
				$sqlp="select * from `$tbperiode` where `id_periode`='$id_periode'";
	$dp=getField($conn,$sqlp);
				$deskripsi=$dp["deskripsi"];

					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td align='center'>$no.</td>
				<td><b>$nama_program | $level</b>
					<br>Teacher: $id_pengajar
				</td>
				<td><strong>$hari ($waktu)</strong>
				<br><i>Room $id_ruangan</i></td>
				<td>Term : $term<br>Period : $deskripsi</td>
				<td align='center'>
<a href='?mnu=peserta&id=$id_kelas'><img src='ypathicon/peserta.png' title='Input Students'></a>
<a href='?mnu=absensi&id=$id_kelas'><img src='ypathicon/blue-check.png' title='Input Attendance'></a>
<a href='?mnu=kelas&pro=ubah&kode=$id_kelas'><img src='ypathicon/12.png' title='Change'></a>
<a href='?mnu=kelas&pro=hapus&kode=$id_kelas'><img src='ypathicon/h.png' title='Delete' 
onClick='return confirm(\"Delete $id_kelas from class's data?\")'></a></td>
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
<?php }?>
</div>
<!-- Disini -->
<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$id_kelas=strip_tags($_POST["id_kelas"]);
	$id_kelas0=strip_tags($_POST["id_kelas0"]);
	$id_program=strip_tags($_POST["id_program"]);
	$id_pengajar=strip_tags($_POST["id_pengajar"]);
	$id_ruangan=strip_tags($_POST["id_ruangan"]);
	$id_sesi=strip_tags($_POST["id_sesi"]);
	$id_periode=strip_tags($_POST["id_periode"]);
	$status=strip_tags($_POST["status"]);
	$term=strip_tags($_POST["term"]);
	
if($pro=="simpan"){
	$sqlj="SELECT * from `$tbkelas` where id_sesi='$id_sesi' and id_ruangan='$id_ruangan'";
	$jumj=getJum($conn,$sqlj);
	if($jumj>0){
		echo"<script>alert('A CLASS HAS ALREADY ASSIGNED TO THE SELECTED SESSION AND ROOM! PLEASE SELECT ANOTHER SESSION OR ROOM!')</script>";
	}
	else{
		$sqlj="SELECT * from `$tbkelas`, `$tbsesi` where tb_kelas.id_sesi=tb_sesi.id_sesi and tb_kelas.id_sesi='$id_sesi' and tb_kelas.id_pengajar='$id_pengajar'";
		$jumj=getJum($conn,$sqlj);
		if($jumj>0){
		echo"<script>alert('THE TEACHER HAS ALREADY ASSIGNED AT THE SAME SCHEDULE! PLEASE SELECT ANOTHER TEACHER OR ANOTHER SCHEDULE!')</script>";
		}else{
$sql=" INSERT INTO `$tbkelas` (
`id_kelas` ,
`id_program` ,
`id_pengajar` ,
`id_ruangan`,
`id_sesi`,
`id_periode` ,
`term` ,
`status` 
) VALUES (
'$id_kelas', 
'$id_program', 
'$id_pengajar' ,
'$id_ruangan',
'$id_sesi',
'$id_periode' ,
'$term' ,
'$status' 
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('SAVE SUCCESS');document.location.href='?mnu=kelas';</script>";}
		else{echo"<script>alert('SAVE FAILED');document.location.href='?mnu=kelas';</script>";}
		}
	}
}
	else{
$sql="update `$tbkelas` set 
`id_program`='$id_program',
`id_pengajar`='$id_pengajar' ,
`id_sesi`='$id_sesi',
`id_ruangan`='$id_ruangan',
`id_periode`='$id_periode',
`status`='$status'
where `id_kelas`='$id_kelas0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('UPDATE SUCCESS');document.location.href='?mnu=kelas';</script>";}
	else{echo"<script>alert('UPDATE FAILED');document.location.href='?mnu=kelas';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_kelas=$_GET["kode"];
$sql="delete from `$tbkelas` where `id_kelas`='$id_kelas'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('DELETE SUCCESS');document.location.href='?mnu=kelas';</script>";}
else{echo"<script>alert('DELETE FAILED');document.location.href='?mnu=kelas';</script>";}
}
?>
<br>
<p align="center"><a class="btn btn-default btn-lg" alt='PRINT' onclick="PRINT()"><img src='ypathicon/print.png'> Print List of Class(es)</a>
</p>