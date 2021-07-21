<?php

$tanggal_lahir=WKT(date("Y-m-d"));
$pro="simpan";
$gambar0="avatar.jpg";
$status="Aktif";
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
win=window.open('admin/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, alamat=0'); } 
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
  border: 1px solid #393;
  padding: 4px;
}

#mytable tr:nth-child(even){background-color: #f2f2f2;}

#mytable tr:hover {background-color: #ddd;}

#mytable th {
  padding-top: 6px;
  padding-bottom: 6px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
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
  $sql="select `id_admin` from `$tbadmin` order by `id_admin` desc";
  $q=mysqli_query($conn, $sql);
  $jum=mysqli_num_rows($q);

  $kd="ADM";//KEG1610001
  if($jum > 0){
   $d=mysqli_fetch_array($q);
   $idmax=$d["id_admin"];
   
   $urut=substr($idmax,3,3)+1;
   if($urut<10){$idmax="$kd"."00".$urut;}
   else if($urut<100){$idmax="$kd"."0".$urut;}
   else{$idmax="$kd".$urut;}
      
   }
  else{$idmax="$kd"."001";}
  $id_admin=$idmax;
?>

<?php
if($_GET["pro"]=="ubah"){
	$id_admin=$_GET["kode"];
	$sql="select * from `$tbadmin` where `id_admin`='$id_admin'";
	$d=getField($conn,$sql);
				$id_admin=$d["id_admin"];
				$nama_admin=$d["nama_admin"];
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
<!-- Disini -->
<div id="accordion"> 
  <h4>Input Data admin</h4>
  <div>
<!-- Disini -->
<form action="" method="post" enctype="multipart/form-data">
<table width="61%">
<tr>
<th width="159" height="29"><label for="id_admin">ID admin</label></th>
<th width="9" valign="top">:</th>
<th><b><?php echo $id_admin;?></b></th>
<td width="94" rowspan="13">
<center>
<?php 
echo"<a href='#' onclick='buka(\"admin/zoom.php?id=$id_admin\")'>
<img src='$YPATH/$gambar0' width='77' height='80' />
</a>
";
?>
</center>
</td>
</tr>

<tr>
<td height="33"><label for="nama_admin">Nama admin</label>
<td valign="top">:<td width="200"><input name="nama_admin" type="text" id="nama_admin" value="<?php echo $nama_admin;?>" size="30" />
</td><td width="2"></td><td width="178"></td>
</tr>

<tr>
<td height="32"><label for="jenis_kelamin">Jenis Kelamin</label>
<td valign="top">:<td colspan="1">
<input type="radio" name="jenis_kelamin" id="jenis_kelamin"  checked="checked" value="Pria" <?php if($jenis_kelamin=="Pria"){echo"checked";}?>/>Pria &emsp;
<input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Wanita" <?php if($jenis_kelamin=="Wanita"){echo"checked";}?>/>Wanita
	</td></td></td></tr>

<tr>
<td height="32"><label for="tempat_lahir">Tempat Lahir</label>
<td valign="top">:<td><input name="tempat_lahir" type="text" id="tempat_lahir" value="<?php echo $tempat_lahir;?>" size="30" />
	</td></td></td>
</tr>

<tr>
<td height="38"><label for="tanggal_lahir">Tanggal Lahir</label>
<td valign="top">:<td><input name="tanggal_lahir" type="text" id="tanggal_lahir" value="<?php echo $tanggal_lahir;?>" size="15" />
	</td></td></td>
</tr>

<tr>
<td height="97"><label for="alamat">Alamat</label>
<td valign="top">:<td><textarea name="alamat" class="input-text" id="alamat" value="<?php echo $alamat;?>" cols="30" rows="3"></textarea></td></td></td></tr>

<tr>
<td height="33"><label for="agama">Agama</label>
<td valign="top">:
<td><select name="agama" id="agama">
    <option value="-- Pilih Agama --">-- Pilih Agama --</option>
    <option value="Islam" <?php if($agama=="Islam"){echo "selected";} ?>>Islam</option>
    <option value="Kristen" <?php if($agama=="Kristen"){echo "selected";} ?>>Kristen</option>
    <option value="Hindu" <?php if($agama=="Hindu"){echo "selected";} ?>>Hindu</option>
    <option value="Budha" <?php if($agama=="Budha"){echo "selected";} ?>>Budha</option>
    <option value="Katolik" <?php if($agama=="Katolik"){echo "selected";} ?>>Katolik</option>
    <option value="Lain-Lain" <?php if($agama=="Lain-Lain"){echo "selected";} ?>>Lain-Lain</option>
	</select></td></td></td>
</tr>

<tr>
<td height="32"><label for="username">Username</label>
<td valign="top">:<td><input name="username" type="text" id="username" value="<?php echo $username;?>" size="30" />
	</td></td></td>
</tr>

<tr>
<td height="32"><label for="password">Password</label>
<td valign="top">:<td><input name="password" type="password" id="password" value="<?php echo $password;?>" size="30" />
	</td></td></td>
</tr>

<tr>
<td height="32"><label for="email">Email</label>
<td valign="top">:<td><input name="email" type="text" id="email" value="<?php echo $email;?>" size="30" />
	</td></td></td>
</tr>

<tr>
<td height="32"><label for="no_telepon">No. Telepon</label>
<td valign="top">:<td><input name="no_telepon" type="text" id="no_telepon" value="<?php echo $no_telepon;?>" size="15" />
	</td></td></td>
</tr>

<tr>
<td height="33"><label for="status">Status</label>
<td valign="top">:<td>
<input type="radio" name="status" id="status"  checked="checked" value="Aktif" <?php if($status=="Aktif"){echo"checked";}?>/>Aktif &emsp;
<input type="radio" name="status" id="status" value="Tidak Aktif" <?php if($status=="Tidak Aktif"){echo"checked";}?>/>Tidak Aktif
	</td></td></td></tr>

<tr>
<td height="94"><label for="keterangan">Keterangan</label>
<td valign="top">:<td><textarea name="keterangan" cols="30" rows="3" id="keterangan"><?php echo $keterangan;?></textarea>
	</td></td></td>
</tr>

<tr>
  <td height="34"><b>Gambar</b>
    <td valign="top">:<td colspan="2"><label for="gambar"></label>
        <input name="gambar" type="file" id="gambar" size="20" /> 
      => <a href='#' onclick='buka("admin/zoom.php?id=<?php echo $id_admin;?>")'><?php echo $gambar0;?></a></td></td></td>
</tr>

<tr>
<td height="33">
<td valign="top">
<td colspan="2"><input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="gambar0" type="hidden" id="gambar0" value="<?php echo $gambar0;?>" />
        <input name="id_admin" type="hidden" id="id_admin" value="<?php echo $id_admin;?>" />
        <input name="id_admin0" type="hidden" id="id_admin0" value="<?php echo $id_admin0;?>" />
        <a href="?mnu=admin"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
	</td></td></td></tr>
</table>
</form>
<!-- Disini -->
</div>
<?php  
  $sqlq="select distinct(status) from `$tbadmin` order by `status` asc";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>Maaf data belum tersedia...</h1>";
			}								
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$status=$dq["status"];

?>    
<h4>Data admin Status <?php echo $status;?></h4>
<div>
<!-- Disini -->
<table width="100%" border="0" class="table table-striped table-bordered table-hover">
  <tr bgcolor="#036">
	<th width="3%"><center>No.</center></td>
    <th width="5%"><center>Gambar</center></td>
    <th width="30%"><center>Profil admin</center></td>
    <th width="25%"><center>Autentikasi</center></td>
    <th width="30%"><center>Alamat</center></td>
    <th width="15%"><center>Option</center></td>
  </tr>
<?php  
  $sql="select * from `$tbadmin` where status='$status' order by `id_admin` desc";
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
				$id_admin=$d["id_admin"];
				$nama_admin=$d["nama_admin"];
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
				<td valign='top'>$no</td>
				<td valign='top'><div align='center'>";
echo"<a href='#' onclick='buka(\"admin/zoom.php?id=$id_admin\")'>
<img src='$YPATH/$gambar' width='40' height='40' /></a></div>";
				echo"</td>
				<td valign='top'><strong>$id_admin - $nama_admin ($jenis_kelamin)</strong>
				<br>TTL: $tempat_lahir, $tanggal_lahir<br>Agama:$agama</td>
				<td>Username: $username<br>Password: $password</td>
				<td valign='top'>$alamat<br>Telepon: $no_telepon <br>Catatan: $keterangan</td>
				
				<td><div align='center'>
<a href='?mnu=admin&pro=ubah&kode=$id_admin'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=admin&pro=hapus&kode=$id_admin'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $nama pada data admin ?..\")'></a></div></td>
				</tr>";
				
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='6'><blink>Maaf, Data admin belum tersedia...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=admin'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=admin'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=admin'>Next »</a></span>";
	}
	else{ echo "<span class=disabled>Next »</span>";}
	echo "</div>";
	}//if jmldata

$jmldata = $jum;
echo "<p align=center>Total data <b>$jmldata</b> item</p>";
?>
<p align="center"><a class="btn btn-default btn-lg" alt='PRINT' onclick="PRINT()"><img src='ypathicon/print.png'> Print Admin List</a></p>
<!-- Disini -->
</div>
<?php }?>
</div>
<!-- Disini -->
<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$id_admin=strip_tags($_POST["id_admin"]);
	$id_admin0=strip_tags($_POST["id_admin"]);
	$nama_admin=strip_tags($_POST["nama_admin"]);
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
$sql=" INSERT INTO `$tbadmin` (
`id_admin` ,
`nama_admin` ,
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
'$id_admin', 
'$nama_admin',
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
	if($simpan) {echo "<script>alert('Data $id_admin berhasil disimpan !');document.location.href='?mnu=admin';</script>";}
		else{echo"<script>alert('Data $id_admin gagal disimpan...');document.location.href='?mnu=admin';</script>";}
	}
	else{
	$sql="update `$tbadmin` set 
	`nama_admin`='$nama_admin',
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
	  where `id_admin`='$id_admin0'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('Data $id_admin berhasil diubah !');document.location.href='?mnu=admin';</script>";}
		else{echo"<script>alert('Data $id_admin gagal diubah...');document.location.href='?mnu=admin';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_admin=$_GET["kode"];
$sql="delete from `$tbadmin` where `id_admin`='$id_admin'";
$hapus=process($conn,$sql);
	if($hapus) {echo "<script>alert('Data $id_admin berhasil dihapus !');document.location.href='?mnu=admin';</script>";}
	else{echo"<script>alert('Data $id_admin gagal dihapus...');document.location.href='?mnu=admin';</script>";}
}
?>

