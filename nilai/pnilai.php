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
var xmlHttp

function showPeserta(str){ 
xmlHttp=GetXmlHttpObject()
if (xmlHttp==null){
 alert ("Browser tidak support HTTP Request")
 return
 } 
var url="getpeserta.php"
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
        $("#tanggal").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    

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
	$id_nilai=$_GET["kode"];
	$sql="select * from `$tbnilai` where `id_nilai`='$id_nilai'";
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
?>
<!-- Disini -->
<div id="accordion"> 
  <h4>Input Data Nilai</h4>
  <div>
<!-- Disini -->
<form action="" method="post" enctype="multipart/form-data">
<table width="100%">


<tr>
	<th width="30%"><label for="id_periode">ID Periode</label></th>
	<th width="5%" valign="top">:</th>
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
<td height="35"><label for="id_kelas">Kelas</label>
<td valign="top">:<td colspan="2"><select name="id_kelas" id="id_kelas"  onChange="showPeserta(this.value)">
  <option value="-- Pilih Kelas --">-- Pilih Kelas --</option>
	<?php
	  	$s="select * from `tb_kelas` where id_periode='$gid_periode' and id_pengajar='".$_SESSION["cid"]."'";
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
<td height="39"><label for="id_peserta">Peserta</label>
<td valign="top">:
<td>
<div id="txtHint">
<select name="id_peserta" id="id_peserta">
  <option value="-- Pilih Peserta --">-- Pilih Peserta --</option>
	<?php
	  	$s="select * from `tb_peserta`";
		$q=getData($conn,$s);
		foreach($q as $d){							
				$id_peserta0=$d["id_peserta"];
				$nama_peserta=$d["catatan"];
		echo"<option value='$id_peserta0' ";if($id_peserta0==$id_peserta){echo"selected";} echo">$id_peserta0 - $nama_peserta </option>";
		}
	?>
</select></div></td>
</tr>

<tr>
<td height="33"><label for="ls_score">Listening Comprehension Score</label>
<td valign="top">:
<td colspan="2"><input name="ls_score" type="text" id="ls_score" value="<?php echo $ls_score;?>" size="30" /></td>
</tr>
	
<tr>
<td height="33"><label for="su_score">Structures and Usage Score</label>
<td valign="top">:
<td colspan="2"><input name="su_score" type="text" id="su_score" value="<?php echo $su_score;?>" size="30" /></td>
</tr>
	
<tr>
<td height="33"><label for="rv_score">Reading and Vocabulary Score</label>
<td valign="top">:
<td colspan="2"><input name="rv_score" type="text" id="rv_score" value="<?php echo $rv_score;?>" size="30" /></td>
</tr>

<tr>
<td height="34"><label for="comp_score">Composition Score</label>
<td valign="top">:
<td colspan="2"><input name="comp_score" type="text" id="comp_score" value="<?php echo $comp_score;?>" size="30" /></td>
</tr>
	
<tr>
<td height="38"><label for="speak_score">Speaking Score</label>
<td valign="top">:
<td colspan="2"><input name="speak_score" type="text" id="speak_score" value="<?php echo $speak_score;?>" size="30" /></td>
</tr>

<tr>
<td height="67"><label for="catatan">Catatan</label>
<td valign="top">:<td colspan="2"><textarea name="catatan" cols="55" rows="3" id="catatan"><?php echo $catatan;?></textarea>
</td>
</tr>

<tr>
<td height="34">
<td valign="top">
<td colspan="2">	<input name="Simpan" type="submit" id="Simpan" value="Simpan" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id_nilai" type="hidden" id="id_nilai" value="<?php echo $id_nilai;?>" />
		<input name="id_periode" type="hidden" id="id_periode" value="<?php echo $gid_periode;?>" />
        <input name="id_nilai0" type="hidden" id="id_nilai0" value="<?php echo $id_nilai0;?>" />
        <a href="?mnu=pnilai"><input name="Batal" type="button" id="Batal" value="Batal" /></a>
</td></tr>
</table>
</form>
<!-- Disini -->
</div>

<?php  
  $sqlq="select distinct(id_kelas) from `$tbnilai` where id_periode='$gid_periode' order by `id_kelas` asc";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>Maaf data belum tersedia...</h1>";
			}								
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$id_kelas=$dq["id_kelas"];

?>    
<h4>Data Nilai Kelas <?php echo getKelas($conn,$id_kelas);?></h4>
<div>
<!-- Disini -->
Data Nilai  Kelas <?php echo getKelas($conn,$id_kelas);?>: 
| <a href="nilai/pdf.php"><img src='ypathicon/pdf.png' alt='PDF'></a> 
| <a href="nilai/xls.php"><img src='ypathicon/xls.png' alt='XLS'></a> 
| <a href="nilai/xml.php"><img src='ypathicon/xml.png' alt='XML'></a> 
| <img src='ypathicon/print.png' alt='PRINT' OnClick="PRINT()"> |
<br>

<table width="100%" border="0" class="table table-striped table-bordered table-hover">
  <tr bgcolor="#036">
    <th width="2%"><center>No.</center></th>
    <th width="15%"><center>ID-Peserta</center></th>
    <th width="20%"><center>Nama-Peserta</center></th>
	<th width="9%"><center>Listening Comprehension Score</center></th>
	<th width="9%"><center>Structures and Usage Score</center></th>
	<th width="9%"><center>Reading and Vocabulary Score</center></th>
	<th width="8%"><center>Composition Score</center></th>
	<th width="6%"><center>Speaking Score</center></th>
    <th width="7%"><center>Catatan</center></th>
    <th width="8%"><center>Menu</center></th>
  </tr>
<?php  
  $sql="select * from `$tbnilai` where id_kelas='$id_kelas' and id_periode='$gid_periode'  order by `id_nilai` desc";
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
				$id_nilai=$d["id_nilai"];
				$id_peserta=$d["id_peserta"];
				
				$sqld="select * from `$tbpeserta` where `id_peserta`='$id_peserta'";
					$dd=getField($conn,$sqld);
					$id_siswa=$dd["id_siswa"];
						$nama=getSiswa($conn,$dd["id_siswa"]);
						
						
				$ls_score=$d["ls_score"];
				$su_score=$d["su_score"];
				$rv_score=$d["rv_score"];
				$comp_score=$d["comp_score"];
				$speak_score=$d["speak_score"];
				$catatan=$d["catatan"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$id_siswa-$id_peserta</td>
				<td>$nama</td>
				<td>$ls_score</td>
				<td>$su_score</td>
				<td>$rv_score</td>
				<td>$comp_score</td>
				<td>$speak_score</td>
				<td>$catatan</td>
				<td align='center'>
<a href='?mnu=pnilai&pro=ubah&kode=$id_nilai'><img src='ypathicon/u.png' alt='ubah'></a>
<a href='?mnu=pnilai&pro=hapus&kode=$id_nilai'><img src='ypathicon/h.png' alt='hapus' 
onClick='return confirm(\"Apakah Anda benar-benar akan menghapus $id_periode pada data nilai ?..\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data nilai belum tersedia...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=pnilai'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=pnilai'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=pnilai'>Next »</a></span>";
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
	$id_nilai=strip_tags($_POST["id_nilai"]);
	$id_nilai0=strip_tags($_POST["id_nilai0"]);
	$id_periode=strip_tags($_POST["id_periode"]);
	$id_kelas=strip_tags($_POST["id_kelas"]);
	$id_peserta=strip_tags($_POST["id_peserta"]);
	$ls_score=strip_tags($_POST["ls_score"]);
	$su_score=strip_tags($_POST["su_score"]);
	$rv_score=strip_tags($_POST["rv_score"]);
	$comp_score=strip_tags($_POST["comp_score"]);
	$speak_score=strip_tags($_POST["speak_score"]);
	$catatan=strip_tags($_POST["catatan"]);
	
if($pro=="simpan"){
	  $sql="select id_nilai from `$tbnilai` where id_kelas='$id_kelas' and id_peserta='$id_peserta' and id_periode='$id_periode'";
	$jum=getJum($conn,$sql);
	if($jum>0){
		echo "<script>alert('Data Nilai siswa Sudah dimasukkan sebelumnya....');document.location.href='?mnu=pnilai';</script>";
	}
	else{
$sql=" INSERT INTO `$tbnilai` (
`id_nilai` ,
`id_periode` ,
`id_kelas` ,
`id_peserta` ,
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
'$ls_score',
'$su_score',
'$rv_score',
'$comp_score',
'$speak_score',
'$catatan'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('Data $id_nilai berhasil disimpan !');document.location.href='?mnu=pnilai';</script>";}
		else{echo"<script>alert('Data $id_nilai gagal disimpan...');document.location.href='?mnu=pnilai';</script>";}
	}
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
	if($ubah) {echo "<script>alert('Data $id_nilai berhasil diubah !');document.location.href='?mnu=pnilai';</script>";}
	else{echo"<script>alert('Data $id_nilai gagal diubah...');document.location.href='?mnu=pnilai';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_nilai=$_GET["kode"];
$sql="delete from `$tbnilai` where `id_nilai`='$id_nilai'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('Data nilai $id_nilai berhasil dihapus !');document.location.href='?mnu=pnilai';</script>";}
else{echo"<script>alert('Data nilai $id_nilai gagal dihapus...');document.location.href='?mnu=pnilai';</script>";}
}
?>

