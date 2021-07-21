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
win=window.open('absensi_detail/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

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




<!-----ACCORDION----->
<div id="accordion"> 
  <h4>Input Data Absensi Detail</h4>
  <div>
<!-----ACCORDION----->




<?php

$id_peserta=$_GET["id"];
	$sql="select * from `$tbpeserta` where `id_peserta`='$id_peserta'";
	$d=getField($conn,$sql);
				$id_peserta=$d["id_peserta"];
				$id_kelas=$d["id_kelas"];
				$id_siswa=$d["id_siswa"];
				$catatan=$d["catatan"];
				
$sql="select * from `$tbkelas` where `id_kelas`='$id_kelas'";
	$d=getField($conn,$sql);
				$id_program=$d["id_program"];
				$id_pengajar=$d["id_pengajar"];
				$id_periode=$d["id_periode"];
				$nama_kelas=$d["nama_kelas"];
				$keterangan=$d["keterangan"];

$sql="select * from `$tbprogram` where `id_program`='$id_program'";
	$d=getField($conn,$sql);
				$id_program=$d["id_program"];
				$id_program0=$d["id_program"];
				$nama_program=$d["nama_program"];
				$level=$d["level"];
				$uraian=$d["uraian"];
				$keterangan=$d["keterangan"];
				$silabus=$d["silabus"];
				$biaya=$d["biaya"];
				
$sql="select * from `$tbperiode` where `id_periode`='$id_periode'";
	$d=getField($conn,$sql);
				$id_periode=$d["id_periode"];
				$id_periode0=$d["id_periode"];
				$nama_periode=$d["nama_periode"];
				$deskripsi=$d["deskripsi"];
				$statusperiode=$d["status"];

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

?>

<table width="74%">
<tr>
<th width="146" height="29"><label for="id_siswa">ID Siswa</label>
<th width="10" valign="top">:
<th colspan="1"><b><?php echo $id_siswa;?></b>
<td width="111" rowspan="13">
<center>
<?php
echo"<a href='#' onclick='buka(\"siswa/zoom.php?id=$id_siswa\")'>
<img src='$YPATH/$gambar0' width='77' height='80' />
</a>
";
?>
</center>
</tr>
<tr>
<td height="30"><label for="nama_siswa">Nama Siswa</label>
<td valign="top">:<td width="249"><?php echo strtoupper($nama_siswa);?>
	</td><td width="61"></td><td width="140"></td>
</tr>

<tr>
<td height="31"><label for="jenis_kelamin">Jenis Kelamin</label>
<td valign="top">:<td colspan="1"><?php echo $jenis_kelamin;?>
</td></tr>

<tr>
<td height="37"><label for="tempat_lahir">Tempat Lahir</label>
<td valign="top">:<td><?php echo $tempat_lahir.",$tanggal_lahir";?>
</td>
</tr>

<tr>
<td height="38"><label for="email">Email</label>
<td valign="top">:<td><?php echo $email;?>
</td>
</tr>

<tr>
<td><label for="alamat">Program</label>
<td valign="top">:<td><?php echo "$nama_program /Level $level";?></td></tr>

<tr>
<td height="35"><label for="agama">Kelas</label>
<td valign="top">:
<td><?php echo $nama_kelas;?></td>
</tr>

<tr>
<td height="38"><label for="username">Pengajar</label>
<td valign="top">:<td><?php echo getPengajar($conn,$id_pengajar);?>
</td>
</tr>

<tr>
<td height="36"><label for="password">Periode</label>
<td valign="top">:<td><?php echo getPeriode($conn,$id_periode);?>
</td>
</tr>

<tr>
<td height="37"><label for="status">Status Periode</label>
<td valign="top">:<td><?php echo $statusperiode;?></td></tr>

</table>



<?php
if($_GET["pro"]=="ubah"){
	$id=$_GET["kode"];
	$sql="select * from `$tbabsensidetail` where `id`='$id'";
	$d=getField($conn,$sql);
				$id=$d["id"];
				$id0=$d["id"];
				$id_absensi=$d["id_absensi"];
				$id_siswa=$d["id_siswa"];
				$catatan=$d["catatan"];
				$status=$d["status"];
				$pro="ubah";		
}
?>

<form action="" method="post" enctype="multipart/form-data">
<table width="479" class="table table-striped table-bordered table-hover">


<tr>
<td height="24"><label for="id_siswa">Siswa</label>
<td valign="top">:<td colspan="2"><select name="id_siswa" id="id_siswa">
  <option value="-- Pilih Siswa --">-- Pilih Siswa --</option>
	<?php
	  	$s="select * from `tb_siswa`";
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
<td height="24"><label for="catatan">Catatan</label>
<td valign="top">:<td colspan="2"><input name="catatan" type="text" id="catatan" autocomplete="off" value="<?php echo $catatan;?>" size="30" />
</td>
</tr>

<tr>
<td><label for="status">Status</label>
<td valign="top">:<td colspan="2">
<input type="radio" name="status" id="status"  checked="checked" value="Hadir" <?php if($status=="Hadir"){echo"checked";}?>/>Hadir 
<input type="radio" name="status" id="status" value="Izin" <?php if($status=="Izin"){echo"checked";}?>/>Izin
<input type="radio" name="status" id="status" value="Sakit" <?php if($status=="Sakit"){echo"checked";}?>/>Sakit

</td></tr>

<tr>
<td>
<td valign="top">
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id" type="hidden" id="id" value="<?php echo $id;?>" />
        <input name="id_absensi" type="hidden" id="id_absensi" value="<?php echo $id_absensi;?>" />
        <input name="id0" type="hidden" id="id0" value="<?php echo $id0;?>" />
        <a href="?mnu=pabsensi_detail&id=<?php echo $id_absensi; ?>"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
<!-----ACCORDION----->
</div>
   <h4>Lihat Data Absensi Detail</h4>
<div>
<!-----ACCORDION----->
Data absensi_detail: 
| <a href="absensi_detail/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <a href="absensi_detail/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table width="100%" border="0" class="table table-striped table-bordered table-hover">
  <tr bgcolor="#036">
    <th width="3%"><center>No.</center></th>
    <th width="10%"><center>Siswa</center></th>
    <th width="15%"><center>Catatan</center></th>
    <th width="10%"><center>Status</center></th>
    <th width="10%"><center>Menu</center></th>
  </tr>
<?php  
  $sql="select * from `$tbabsensidetail` where id_absensi='$id_absensi' order by `id` desc";
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
				$id_siswa=getSiswa($conn,$d["id_siswa"]);
				$catatan=$d["catatan"];
				$status=$d["status"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$id_siswa</td>
				<td>$catatan</td>
				<td align='center'>$status</td>
				<td align='center'>
<a href='?mnu=pabsensi_detail&id=$id_absensi&pro=ubah&kode=$id'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=pabsensi_detail&id=$id_absensi&pro=hapus&kode=$id'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $id_absensi pada data absensi_detail ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data absensi_detail belum tersedia...</blink></td></tr>";}
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
	echo "<p align=center>Total Data <b>$jmldata</b> Item</p>";
?>
<!-----ACCORDION----->

  </div>
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
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbabsensidetail` (
`id` ,
`id_absensi` ,
`id_siswa` ,
`catatan` ,
`status` 
) VALUES (
'', 
'$id_absensi', 
'$id_siswa',
'$catatan',
'$status'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $id_siswa berhasil disimpan !');document.location.href='?mnu=pabsensi_detail&id=$id_absensi';</script>";}
		else{echo"<script>alert('Data $id_siswa gagal disimpan...');document.location.href='?mnu=pabsensi_detail&id=$id_absensi';</script>";}
	}
	else{
$sql="update `$tbabsensidetail` set 
`id_absensi`='$id_absensi',
`id_siswa`='$id_siswa' ,
`status`='$status',
`catatan`='$catatan' 
where `id`='$id0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('Data $id_siswa berhasil diubah !');document.location.href='?mnu=pabsensi_detail&id=$id_absensi';</script>";}
	else{echo"<script>alert('Data $id_siswa gagal diubah...');document.location.href='?mnu=pabsensi_detail&id=$id_absensi';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id=$_GET["kode"];
$id_absensi=$_GET["id"];
$sql="delete from `$tbabsensidetail` where `id`='$id'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data absensi_detail $id berhasil dihapus !');document.location.href='?mnu=pabsensi_detail&id=$id_absensi';</script>";}
else{echo"<script>alert('Data absensi_detail $id gagal dihapus...');document.location.href='?mnu=pabsensi_detail&id=$id_absensi';</script>";}
}
?>

