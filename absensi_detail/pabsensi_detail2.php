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

<?php
	$id_absensi=$_GET["id"];
	$sql="select * from `$tbabsensi` where `id_absensi`='$id_absensi'";
	$d=getField($conn,$sql);
				$id_absensi=$d["id_absensi"];
				$id_absensi0=$d["id_absensi"];
				$tanggal=WKT($d["tanggal"]);
				$jam=$d["jam"];
				$id_kelas=$d["id_kelas"];
				$id_pengajar=$d["id_pengajar"];
				$id_periode=getPeriode($conn,$d["id_periode"]);
				
				$id_pengajar=getPengajar($conn,$d["id_pengajar"]);
			
			$sqlc="select * from `$tbkelas` where `id_kelas`='$id_kelas'";
	$dc=getField($conn,$sqlc);
				$id_program=getProgram($conn,$dc["id_program"]);
				$nama_kelas=$dc["nama_kelas"];
?>

<!-----ACCORDION----->
<div id="accordion"> 
  <h4>Input Data Absensi Detail</h4>
  <div>
<!-----ACCORDION----->

<form action="" method="post" enctype="multipart/form-data">
<table width="543" class="table table-striped table-bordered table-hover">

<tr>
<td width="95"><label for="tanggal">Tanggal</label>
<td width="10" valign="top">:
<td width="422" colspan="2"><b><?php echo $tanggal;?></b></td>
</tr>

<tr>
<td height="24"><label for="jam">Jam</label>
<td valign="top">:<td colspan="2"><b><?php echo $jam;?></b></td>
</tr>

<tr>
<td height="24"><label for="id_kelas">Kelas</label>
<td valign="top">:
<td><b><?php echo $nama_kelas;?></b></td>
</tr>

<tr>
<td height="24"><label for="id_pengajar">Pengajar</label>
<td valign="top">:
<td colspan="2"><b><?php echo $id_pengajar;?> (Program :<?php echo $id_program;?>)</b></td>
</tr>

<tr>
<td><label for="id_periode">Periode</label>
<td valign="top">:
<td colspan="2"><b><?php echo $id_periode;?></b></td></tr>

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

