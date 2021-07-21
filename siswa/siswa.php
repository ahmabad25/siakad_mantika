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
win=window.open('siswa/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, alamat=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<style>
#mytable {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 61%;
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
  $sql="select `id_siswa` from `$tbsiswa` order by `id_siswa` desc";
  $q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);
  $indate=date("ym");

  $kd=$indate;//KG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["id_siswa"];
   
   $indatex=substr($idmax, 0, 4);
   	if($indatex==$indate){
   		$urut=substr($idmax,4,2)+1;
   		if($urut<10){$idmax="$kd"."0".$urut;}
   		else{$idmax="$kd".$urut;} 
   	}//==
   	else{
   		$idmax="$kd"."01";
   	} 
   }
  else{$idmax="$kd"."01";}
  $id_siswa=$idmax;
?>

<?php
if($_GET["pro"]=="ubah"){
	$id_siswa=$_GET["kode"];
	$sql="select * from `$tbsiswa` where `id_siswa`='$id_siswa'";
	$d=getField($conn,$sql);
				$id_siswa=$d["id_siswa"];
				$nama_siswa=$d["nama_siswa"];
				$jenis_kelamin=$d["jenis_kelamin"];
				$tempat_lahir=$d["tempat_lahir"];
				$tanggal_lahir=WKT($d["tanggal_lahir"]);
				$alamat=$d["alamat"];
				$agama=$d["agama"];
				$username=$d["username"];
				$password=$d["password"];
				$email=$d["email"];
				$no_telepon=$d["no_telepon"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$pro="ubah";		
}
?>
<hr id="myhr">
<h4><b><i>&emsp;Student's Input</i></b></h4>
<hr id="myhr">
<form action="" method="post" enctype="multipart/form-data">
<table border="0" width="75%" id="mytable">

<td height="30"><label for="nama_siswa">&emsp;Name</label>
<td valign="top">:<td width="249"><input name="nama_siswa" type="text" id="nama_siswa" value="<?php echo $nama_siswa;?>" size="30" />
	</td><td width="61"></td><td width="140"></td>
</tr>

<tr>
<td height="31"><label for="jenis_kelamin">&emsp;Gender</label>
<td valign="top">:<td colspan="1">
<input type="radio" name="jenis_kelamin" id="jenis_kelamin"  checked="checked" value="M" <?php if($jenis_kelamin=="M"){echo"checked";}?>/>Male &emsp;
<input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="F" <?php if($jenis_kelamin=="F"){echo"checked";}?>/>Female
</td></tr>

<tr>
<td height="37"><label for="tempat_lahir">&emsp;Birthplace</label>
<td valign="top">:<td><input name="tempat_lahir" type="text" id="tempat_lahir" value="<?php echo $tempat_lahir;?>" size="30" />
</td>
</tr>

<tr>
<td height="38"><label for="tanggal_lahir">&emsp;Birthday</label>
<td valign="top">:<td><input name="tanggal_lahir" type="text" id="tanggal_lahir" value="<?php echo $tanggal_lahir;?>" size="15" />
</td>
</tr>

<tr>
<td valign="top" height="96"><label for="alamat">&emsp;Address</label>
<td valign="top">:<td><textarea name="alamat" cols="30" rows="3" id="alamat"><?php echo $alamat;?></textarea></td></tr>

<tr>
<td height="35"><label for="agama">&emsp;Religion</label>
<td valign="top">:
<td><select name="agama" id="agama">
    <option value="-- Pilih Agama --">-- Pick Religion --</option>
    <option value="Islam" <?php if($agama=="Islam"){echo "selected";} ?>>Islam</option>
    <option value="Kristen" <?php if($agama=="Christian"){echo "selected";} ?>>Christian</option>
    <option value="Hindu" <?php if($agama=="Hindu"){echo "selected";} ?>>Hindu</option>
    <option value="Budha" <?php if($agama=="Budha"){echo "selected";} ?>>Budha</option>
    <option value="Katolik" <?php if($agama=="Catholic"){echo "selected";} ?>>Catholic</option>
    <option value="Lain-Lain" <?php if($agama=="Others"){echo "selected";} ?>>Others</option>
  </select></td>
</tr>

<tr>
<td height="38"><label for="username">&emsp;Username</label>
<td valign="top">:<td><input name="username" type="text" id="username" value="<?php echo $username;?>" size="30" />
</td>
</tr>

<tr>
<td height="36"><label for="password">&emsp;Password</label>
<td valign="top">:<td><input name="password" type="text" id="password" value="<?php echo $password;?>" size="30" />
</td>
</tr>

<tr>
<td height="38"><label for="email">&emsp;E-Mail</label>
<td valign="top">:<td><input name="email" type="text" id="email" value="<?php echo $email;?>" size="30" />
</td>
</tr>

<tr>
<td height="35"><label for="no_telepon">&emsp;Phone Numbers</label>
<td valign="top">:<td><input name="no_telepon" type="text" id="no_telepon" value="<?php echo $no_telepon;?>" size="15" />
</td>
</tr>

<tr>
<td height="37"><label for="status">&emsp;Status</label></td>
<td valign="top">:</td>
<td>
<input type="radio" name="status" id="status"  checked="checked" value="Active" <?php if($status=="Active"){echo"checked";}?>/>Active &emsp;
<input type="radio" name="status" id="status" value="Inactive" <?php if($status=="Inactive"){echo"checked";}?>/>Inactive
</td></tr>

<tr>
<td height="38"><label for="keterangan">&emsp;Note</label>
<td valign="top">:<td><input name="keterangan" type="text" id="keterangan" value="<?php echo $keterangan;?>" size="30" />
</td>
</tr>

<tr>
  <td height="34"><b>&emsp;Picture</b>
    <td>:<td colspan="2"><label for="gambar"></label>
        <input name="gambar" type="file" id="gambar" size="20" /> 
      => <a href='#' onclick='buka("siswa/zoom.php?id=<?php echo $id_siswa;?>")'><?php echo $gambar0;?></a></td></td>
<td valign="top" width="100" rowspan="2">
<center>
<?php
echo"<a href='#' onclick='buka(\"siswa/zoom.php?id=$id_siswa\")'>
<img src='$YPATH/$gambar0' width='77' height='80' />
</a>
";
?>
</center>
</td>
</tr>

<tr>
<td>
<td valign="top">
<td colspan="2"><input name="Simpan" type="submit" id="Simpan" value="Save" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="gambar0" type="hidden" id="gambar0" value="<?php echo $gambar0;?>" />
        <input name="id_siswa" type="hidden" id="id_siswa" value="<?php echo $id_siswa;?>" />
        <input name="id_siswa0" type="hidden" id="id_siswa0" value="<?php echo $id_siswa0;?>" />
        <a href="?mnu=siswa"><input name="Batal" type="button" id="Batal" value="Cancel" /></a>
</td></tr>
</table>
</form>
<hr id="myhr">

<div id="accordion">   
<?php  
  $sqlq="select distinct(status) from `$tbsiswa` order by `status` AND `id_siswa` asc";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>No data available...</h1>";
			}								
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$status=$dq["status"];
?>   
<h4>List of <?php echo $status;?> Student(s)</h4>
<div>
<table width="100%" border="0" class="table table-striped table-bordered table-hover">
  <tr bgcolor="#036">
	<th width="6%"><center>No.</center></td>
    <th width="8%"><center>Picture</center></td>
    <th width="35%"><center>Profile</center></td>
    <th width="20%"><center>Authentication</center></td>
    <th width="24%"><center>Address & Contact</center></td>
    <th width="15%"><center>Option</center></td>
  </tr>
<?php  
  $sql="select * from `$tbsiswa` where status='$status' order by `nama_siswa` asc";
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
				$id_siswa=$d["id_siswa"];
				$nama_siswa=$d["nama_siswa"];
				$jenis_kelamin=$d["jenis_kelamin"];
				$tempat_lahir=$d["tempat_lahir"];
				$tanggal_lahir=WKT($d["tanggal_lahir"]);
				$alamat=$d["alamat"];
				$agama=$d["agama"];
				$username=$d["username"];
				$password=$d["password"];
				$email=$d["email"];
				$no_telepon=$d["no_telepon"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
				$gambar=$d["gambar"];
				$gambar0=$d["gambar"];
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td align='center' valign='top'>$no.</td>
				<td><div align='center'>";
echo"<a href='#' onclick='buka(\"siswa/zoom.php?id=$id_siswa\")'>
<img src='$YPATH/$gambar' width='40' height='40' /></a></div>";
				echo"</td>
				<td valign='top'><strong>$id_siswa | $nama_siswa ($jenis_kelamin)</strong>
				<br>Birth: $tempat_lahir, $tanggal_lahir<br>Religion: $agama</td>
				<td valign top>Username: $username<br>Password: $password</td>
				<td valign='top'>$alamat<br>Phone: $no_telepon <br>Note: $keterangan</td>
				<td><div align='center'>
<a href='?mnu=siswa&pro=ubah&kode=$id_siswa'><img src='ypathicon/12.png' title='Change'></a>
<a href='?mnu=siswa&pro=hapus&kode=$id_siswa'><img src='ypathicon/h.png' title='Delete' 
onClick='return confirm(\"Delete $nama_siswa from student's data?\")'></a></div></td>
				</tr>";
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><blink>Sorry, no data available...</blink></td></tr>";}
?>
</table>

<?php
$jmldata = $jum;
if($jmldata>0){
	if($batas<1){$batas=1;}
	$jmlhal  = ceil($jmldata/$batas);
	echo "<div class=paging>";
	if($page > 1){
		$prev=$page-1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=siswa'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=siswa'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=siswa'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
echo "<p align=center>Total of data : <b>$jmldata</b> item</p>";
?>
</div>
<?php }?>
</div>
<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$id_siswa=strip_tags($_POST["id_siswa"]);
	$id_siswa0=strip_tags($_POST["id_siswa"]);
	$nama_siswa=strip_tags($_POST["nama_siswa"]);
	$jenis_kelamin=strip_tags($_POST["jenis_kelamin"]);
	$tempat_lahir=strip_tags($_POST["tempat_lahir"]);
	$tanggal_lahir=BAL(strip_tags($_POST["tanggal_lahir"]));
	$alamat=strip_tags($_POST["alamat"]);
	$agama=strip_tags($_POST["agama"]);
	$username=strip_tags($_POST["username"]);
	$password=strip_tags($_POST["password"]);
	$email=strip_tags($_POST["email"]);
	$no_telepon=strip_tags($_POST["no_telepon"]);
	$status=strip_tags($_POST["status"]);
	$keterangan=strip_tags($_POST["keterangan"]);
	
	$gambar0=strip_tags($_POST["gambar0"]);
	if ($_FILES["gambar"] != "") {
		@copy($_FILES["gambar"]["tmp_name"],"$YPATH/".$_FILES["gambar"]["name"]);
		$gambar=$_FILES["gambar"]["name"];
		} 
	else {$gambar=$gambar0;}
	if(strlen($gambar)<1){$gambar=$gambar0;}
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbsiswa` (
`id_siswa` ,
`nama_siswa` ,
`jenis_kelamin` ,
`tempat_lahir` ,
`tanggal_lahir` ,
`alamat` ,
`agama` ,
`username` ,
`password` ,
`email` ,
`no_telepon` ,
`status` ,
`keterangan` ,
`gambar` 
) VALUES (
'$id_siswa', 
'$nama_siswa',
'$jenis_kelamin', 
'$tempat_lahir',
'$tanggal_lahir',
'$alamat',
'$agama',
'$username',
'$password',
'$email',
'$no_telepon',
'$status',
'$keterangan',
'$gambar'
)";
	
$simpan=process($conn,$sql);
	if($simpan) {echo "<script>alert('SAVE SUCCESS');document.location.href='?mnu=siswa';</script>";}
		else{echo"<script>alert('SAVE FAILED');document.location.href='?mnu=siswa';</script>";}
	}
	else{
	$sql="update `$tbsiswa` set 
	`nama_siswa`='$nama_siswa',
	`jenis_kelamin`='$jenis_kelamin',
	`tempat_lahir`='$tempat_lahir',
	`tanggal_lahir`='$tanggal_lahir',
	`alamat`='$alamat',
	`agama`='$agama',
	`username`='$username',
	`password`='$password',
	`email`='$email',
	`no_telepon`='$no_telepon',
	`status`='$status',
	`keterangan`='$keterangan',
	`gambar`='$gambar'
	  where `id_siswa`='$id_siswa0'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('UPDATE SUCCESS');document.location.href='?mnu=siswa';</script>";}
		else{echo"<script>alert('UPDATE FAILED');document.location.href='?mnu=siswa';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_siswa=$_GET["kode"];
$sql="delete from `$tbsiswa` where `id_siswa`='$id_siswa'";
$hapus=process($conn,$sql);
	if($hapus) {echo "<script>alert('DELETE SUCCESS');document.location.href='?mnu=siswa';</script>";}
	else{echo"<script>alert('DELETE FAILED');document.location.href='?mnu=siswa';</script>";}
}
?>
<br>
<p align="center"><a class="btn btn-default btn-lg" alt='PRINT' onclick="PRINT()"><img src='ypathicon/print.png'> Print List of Student(s)</a></p>