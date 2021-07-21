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
if($_GET["pro"]=="ubah"){
	$id_peserta=$_GET["kode"];
	$sql="select * from `$tbpeserta` where `id_peserta`='$id_peserta'";
	$d=getField($conn,$sql);
				$id_peserta=$d["id_peserta"];
				$id_peserta0=$d["id_peserta"];
				$id_kelas=$d["id_kelas"];
				$id_siswa=$d["id_siswa"];
				$catatan=$d["catatan"];
				$pro="ubah";		
}
?>
<!-- Disini -->

<div id="accordion"> 
  <h4>Input Data Peserta</h4>
  <div>
<!-- Disini -->
<form action="" method="post" enctype="multipart/form-data">
<table width="492">


<tr>
	<th width="129"><label for="id_periode">ID Periode</label></th>
	<th width="10" valign="top">:</th>
	<th width="332" colspan="2"><b><?php echo $gid_periode;?></b></th>
</tr>

<tr>
	<td ><label for="nama_periode">Nama Periode</label></td>
	<td valign="top">:</td>
	<td colspan="2"><?php echo $gnama_periode;?></td>
</tr>

<tr>
	<td><label for="deskripsi">Deskripsi</label></td>
	<td valign="top">:</td>
	<td><?php echo $gdeskripsi;?></td>
</tr>

<tr><td colspan="3"><hr></td></tr>


<tr>
<td width="120" height="32"><label for="id_kelas">Kelas Tersedia</label>
<td width="10" valign="top">:
<td width="349" colspan="2"><select name="id_kelas" id="id_kelas">
  <option value="-- Pilih Kelas --">-- Pilih Kelas --</option>
	<?php
	  	$s="select * from `tb_kelas` where kode_periode='$gkode_periode'";
		$q=getData($conn,$s);
		foreach($q as $d){							
				$id_kelas0=$d["id_kelas"];
				$nama_kelas=$d["nama_kelas"];
		echo"<option value='$id_kelas0' ";if($id_kelas0==$id_kelas){echo"selected";} echo">$id_kelas0 - $nama_kelas </option>";
		}
	?>
  </select></td>
</tr>

<tr>
<td height="33"><label for="id_siswa">Siswa</label>
<td valign="top">:
<td colspan="2"><select name="id_siswa" id="id_siswa">
  <option value="-- Pilih Siswa --">-- Pilih Siswa --</option>
	<?php
	  	$s="select * from `tb_siswa` where status='Aktif'";
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
<td height="97"><label for="catatan">Catatan</label>
<td valign="top">:<td colspan="2"><textarea name="catatan" cols="30" rows="3" id="catatan"><?php echo $catatan;?></textarea>
</td>
</tr>

<tr>
<td height="32">
<td valign="top">
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id_periode" type="hidden" id="id_periode" value="<?php echo $gid_periode;?>" />
		 <input name="id_peserta" type="hidden" id="id_peserta" value="<?php echo $id_peserta;?>" />
        <input name="id_peserta0" type="hidden" id="id_peserta0" value="<?php echo $id_peserta0;?>" />
        <a href="?mnu=peserta"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
<!-- Disini -->
</div>
<?php  
  $sqlq="select distinct(id_kelas) from `$tbpeserta` where id_periode ='$id_periode' order by `id_peserta` desc";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>Maaf data belum tersedia...</h1>";
			}								
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$id_kelas=$dq["id_kelas"];
				$kelas=getKelas($conn,$id_kelas);
?>    
<h4>Data Peserta Kelas <?php echo $kelas;?></h4>
<div>
<!-- Disini -->
Data Peserta Kelas <?php echo $kelas;?>: 
| <a href="peserta/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <a href="peserta/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> 
| <a href="peserta/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table width="100%" border="0" class="table table-striped table-bordered table-hover">
  <tr bgcolor="#036">
    <th width="3%"><center>No.</center></th>
	<th width="3%"><center>Gambar</center></th>
	<th width="10%"><center>ID-Peserta</center></th>
     <th width="20%"><center>Nama-Siswa</center></th>
	  <th width="15%"><center>Telepon</center></th>
    <th width="15%"><center>Catatan</center></th>
    <th width="10%"><center>Menu</center></th>
  </tr>
<?php  
  $sql="select * from `$tbpeserta` where id_kelas='$id_kelas' and  id_periode ='$id_periode' order by `id_peserta` desc";
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
				$catatan=$d["catatan"];
				
				
				$sqlv="select * from `$tbsiswa` where `id_siswa`='$id_siswa'";
	$dv=getField($conn,$sqlv);
				$id_siswa=$dv["id_siswa"];
				$nama_siswa=$dv["nama_siswa"];
				$jenis_kelamin=$dv["jenis_kelamin"];
				$tempat_lahir=$dv["tempat_lahir"];
				$tanggal_lahir=WKT($dv["tanggal_lahir"]);
				$alamat=$dv["alamat"];
				$agama=$dv["agama"];
				$email=$dv["email"];
				$no_telepon=$dv["no_telepon"];
				$status=$dv["status"];
				
				
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td valign='top'>$no</td>
					<td><div align='center'>";
echo"<a href='#' onclick='buka(\"siswa/zoom.php?id=$id_siswa\")'>
<img src='$YPATH/$gambar' width='40' height='40' /></a></div>";
				echo"</td>
				<td valign='top'>$id_peserta</td><td valign='top'>$nama_siswa ($id_siswa)</td><td valign='top'>$no_telepon</td>
				<td valign='top'>$catatan</td>
				<td align='center'>
<a href='?mnu=peserta&pro=ubah&kode=$id_peserta'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=peserta&pro=hapus&kode=$id_peserta'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $id_kelas pada data peserta ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data peserta belum tersedia...</blink></td></tr>";}
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
	echo "<p align=center>Total Data <b>$jmldata</b> Item</p>";
?>
<!-- Disini -->
</div>
<?php }?>
</div>
<!-- Disini -->
<?php
if(isset($_POST["Simpan"])){
	$pro=strip_tags($_POST["pro"]);
	$id_peserta=strip_tags($_POST["id_peserta"]);
	$id_peserta0=strip_tags($_POST["id_peserta0"]);
	$id_kelas=strip_tags($_POST["id_kelas"]);
	$id_siswa=strip_tags($_POST["id_siswa"]);
	$catatan=strip_tags($_POST["catatan"]);
	$id_periode=strip_tags($_POST["id_periode"]);
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbpeserta` (
`id_peserta` ,`id_periode`
`id_kelas` ,
`id_siswa` ,
`catatan`
) VALUES (
'', '$id_periode', 
'$id_kelas', 
'$id_siswa',
'$catatan'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $id_peserta berhasil disimpan !');document.location.href='?mnu=peserta';</script>";}
		else{echo"<script>alert('Data $id_peserta gagal disimpan...');document.location.href='?mnu=peserta';</script>";}
	}
	else{
$sql="update `$tbpeserta` set 
`id_kelas`='$id_kelas',`id_periode`='$id_periode',
`id_siswa`='$id_siswa' ,
`catatan`='$catatan' 
where `id_peserta`='$id_peserta0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $id_peserta berhasil diubah !');document.location.href='?mnu=peserta';</script>";}
	else{echo"<script>alert('Data $id_peserta gagal diubah...');document.location.href='?mnu=peserta';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_peserta=$_GET["kode"];
$sql="delete from `$tbpeserta` where `id_peserta`='$id_peserta'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data peserta $id_peserta berhasil dihapus !');document.location.href='?mnu=peserta';</script>";}
else{echo"<script>alert('Data peserta $id_peserta gagal dihapus...');document.location.href='?mnu=peserta';</script>";}
}
?>

