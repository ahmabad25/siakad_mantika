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
var xmlHttp

function showDetail(str){ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null){
 alert ("Browser tidak support HTTP Request")
 return
 } 
var url="getalamat.php"
url=url+"?q="+str
url=url+"&sid="+Math.random()
xmlHttp.onreadystatechange=SC1 
xmlHttp.open("GET",url,true)
xmlHttp.send(null)
}

function SC1() { 
if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete"){ 
 document.getElementById("txtHint").innerHTML=xmlHttp.responseText 
 } 
}

function GetXmlHttpObject(){
var xmlHttp=null;
try{xmlHttp=new XMLHttpRequest();}
catch (e){
	try{xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");}
 	catch (e){xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");}
 }
return xmlHttp;
}
</script>
    
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
if($_GET["pro"]=="ubah"){
	$id_orangtua=$_GET["kode"];
	$sql="select * from `$tborangtua` where `id_orangtua`='$id_orangtua'";
	$d=getField($conn,$sql);
				$id_siswa=$d["id_siswa"];
				$nama_orangtua=$d["nama_orangtua"];
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
				$id_orangtua0=$d["id_orangtua"];
				$pro="ubah";		
}
?>
<hr id="myhr">
<h4><b><i>&emsp;Parent's Input</i></b></h4>
<hr id="myhr">
<form action="" method="post" enctype="multipart/form-data">
<table border="0" width="75%" id="mytable">

<td width="189" height="30"><label for="nama_orangtua">&emsp;Name</label></td>
<td width="17" valign="top">:</td>
<td width="447"><input name="nama_orangtua" type="text" id="nama_orangtua" value="<?php echo $nama_orangtua;?>" size="30" />
</td>
</tr>

<tr>
<td height="31"><label for="jenis_kelamin">&emsp;Gender</label></td>
<td valign="top">:</td>
<td colspan="1">
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
<td height="35"><label for="agama">&emsp;Religion</label></td>
<td valign="top">:</td>
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
<td height="38"><label for="username">&emsp;Username</label></td>
<td valign="top">:</td>
<td><input name="username" type="text" id="username" value="<?php echo $username;?>" size="30" />
</td>
</tr>

<tr>
<td height="36"><label for="password">&emsp;Password</label></td>
<td valign="top">:</td>
<td><input name="password" type="text" id="password" value="<?php echo $password;?>" size="30" />
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
<td height="33"><label for="id_siswa">&emsp;Child's Name</label></td>
<td valign="top">:</td>
<td colspan="2"><select name="id_siswa" id="id_siswa" onchange="showDetail(this.value)">
  <option value="-- Pilih Siswa --">-- Pick Student --</option>
	<?php
	  	$s="select * from `$tbsiswa`";
		$q=getData($conn,$s);
		foreach($q as $d){							
				$id_siswa0=$d["id_siswa"];
				$nama_siswa=$d["nama_siswa"];
		echo"<option value='$id_siswa0' ";if($id_siswa0==$id_siswa){echo"selected";} echo">$nama_siswa - $id_siswa0</option>";
		}
	?>
  </select></td>
</tr>

<tr>
<td valign="top" height="96"><label for="alamat">&emsp;Address</label></td>
<td valign="top">:</td>
<td><div id="txtHint"><textarea name="alamat" cols="30" rows="3" id="alamat"><?php echo $alamat;?></textarea></div></td></tr>

<tr>
<td height="38"><label for="email">&emsp;E-Mail</label></td>
<td valign="top">:</td>
<td><input name="email" type="text" id="email" value="<?php echo $email;?>" size="30" />
</td>
</tr>

<tr>
<td height="35"><label for="no_telepon">&emsp;Phone Numbers</label></td>
<td valign="top">:</td>
<td><input name="no_telepon" type="text" id="no_telepon" value="<?php echo $no_telepon;?>" size="15" />
</td>
</tr>

<tr>
<td>
<td valign="top">
<td colspan="2"><input name="Simpan" type="submit" id="Simpan" value="Save" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id_orangtua0" type="hidden" id="id_orangtua0" value="<?php echo $id_orangtua0;?>" />
        <a href="?mnu=orangtua"><input name="Batal" type="button" id="Batal" value="Cancel" /></a>
</td></tr>
</table>
</form>
<hr id="myhr">

<div id="accordion">   
<?php  
  $sqlq="select distinct(status) from `$tborangtua` order by `status` asc";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>No data available...</h1>";
			}								
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$status=$dq["status"];
?>   
<h4>List of <?php echo $status;?> Parent(s)</h4>
<div>
<table width="100%" border="0" class="table table-striped table-bordered table-hover">
  <tr bgcolor="#036">
	<th width="6%"><center>No.</center></td>
    <th width="35%"><center>Profile</center></td>
    <th width="20%"><center>Authentication</center></td>
    <th width="32%"><center>Address & Contact</center></td>
    <th width="15%"><center>Option</center></td>
  </tr>
<?php  
  $sql="select * from `$tborangtua` where status='$status' order by `id_orangtua` desc";
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
				$id_orangtua=$d["id_orangtua"];
				$siswa=getSiswa($conn,$d["id_siswa"]);
				$nama_orangtua=$d["nama_orangtua"];
				$jenis_kelamin=$d["jenis_kelamin"];
					if($jenis_kelamin=='M'){$jk='Male';}
					else{$jk='Female';}
				$tempat_lahir=$d["tempat_lahir"];
				$tanggal_lahir=WKT($d["tanggal_lahir"]);
				$alamat=$d["alamat"];
				$agama=$d["agama"];
				$username=$d["username"];
				$password=$d["password"];
				$email=$d["email"];
				$no_telepon=$d["no_telepon"];
				$status=$d["status"];
				$color="#dddddd";		
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td align='center' valign='top'>$no.</td>
				<td valign='top'><strong>$id_orangtua | $nama_orangtua ($jk)</strong>
				<br>Birth: $tempat_lahir, $tanggal_lahir<br>Religion: $agama
				<br><b>Note: Parent of $siswa</b></td>
				<td valign top>Username: $username<br>Password: $password</td>
				<td valign='top'>$alamat<br>Phone: $no_telepon</td>
				<td><div align='center'>
<a href='?mnu=orangtua&pro=ubah&kode=$id_orangtua'><img src='ypathicon/12.png' title='Change'></a>
<a href='?mnu=orangtua&pro=hapus&kode=$id_orangtua'><img src='ypathicon/h.png' title='Delete' 
onClick='return confirm(\"Delete $nama_orangtua from student's data?\")'></a></div></td>
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=orangtua'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=orangtua'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=orangtua'>Next »</a></span>";
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
	$id_orangtua0=strip_tags($_POST["id_orangtua0"]);
	$id_siswa=strip_tags($_POST["id_siswa"]);

  $kd="P".$id_siswa;//KG1610001
  $id_orangtua=$kd;

	$nama_orangtua=strip_tags($_POST["nama_orangtua"]);
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
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tborangtua` (
`id_orangtua` ,
`id_siswa` ,
`nama_orangtua` ,
`jenis_kelamin` ,
`tempat_lahir` ,
`tanggal_lahir` ,
`alamat` ,
`agama` ,
`username` ,
`password` ,
`email` ,
`no_telepon` ,
`status`
) VALUES (
'$id_orangtua', 
'$id_siswa', 
'$nama_orangtua',
'$jenis_kelamin', 
'$tempat_lahir',
'$tanggal_lahir',
'$alamat',
'$agama',
'$username',
'$password',
'$email',
'$no_telepon',
'$status'
)";
	
$simpan=process($conn,$sql);
	if($simpan) {echo "<script>alert('SAVE SUCCESS');document.location.href='?mnu=orangtua';</script>";}
		else{echo"<script>alert('SAVE FAILED');document.location.href='?mnu=orangtua';</script>";}
	}
	else{
	$sql="update `$tborangtua` set 
	`id_siswa`='$id_siswa',
	`nama_orangtua`='$nama_orangtua',
	`jenis_kelamin`='$jenis_kelamin',
	`tempat_lahir`='$tempat_lahir',
	`tanggal_lahir`='$tanggal_lahir',
	`alamat`='$alamat',
	`agama`='$agama',
	`username`='$username',
	`password`='$password',
	`email`='$email',
	`no_telepon`='$no_telepon',
	`status`='$status'
	  where `id_orangtua`='$id_orangtua0'";
	$ubah=process($conn,$sql);
		if($ubah) {echo "<script>alert('UPDATE SUCCESS');document.location.href='?mnu=orangtua';</script>";}
		else{echo"<script>alert('UPDATE FAILED');document.location.href='?mnu=orangtua';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_siswa=$_GET["kode"];
$sql="delete from `$tborangtua` where `id_orangtua`='$id_orangtua'";
$hapus=process($conn,$sql);
	if($hapus) {echo "<script>alert('DELETE SUCCESS');document.location.href='?mnu=orangtua';</script>";}
	else{echo"<script>alert('DELETE FAILED');document.location.href='?mnu=orangtua';</script>";}
}
?>
<br>
<p align="center"><a class="btn btn-default btn-lg" alt='PRINT' onclick="PRINT()"><img src='ypathicon/print.png'> Print List of Parent(s)</a></p>