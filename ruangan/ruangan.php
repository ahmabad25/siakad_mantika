<?php
$pro="simpan";
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
win=window.open('ruangan/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
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
	$id_ruangan=$_GET["kode"];
	$sql="select * from `$tbruangan` where `id_ruangan`='$id_ruangan'";
	$d=getField($conn,$sql);
				$id_ruangan=$d["id_ruangan"];
				$id_ruangan0=$d["id_ruangan"];
				$nama_ruangan=$d["nama_ruangan"];
				$status=$d["status"];
				$pro="ubah";		
}
?>
<!-- Disini -->
<hr id="myhr">
<h4><b><i>&emsp;Room's Input</i></b></h4>
<hr id="myhr">
<!-- Disini -->
<form action="" method="post" enctype="multipart/form-data">
<table width="61%" id="mytable">

<tr>
	<td height="35"><label for="nama_ruangan">&emsp;Room's name</label></td>
	<td valign="top">:</td>
	<td colspan="2" valign="top"><input name="nama_ruangan" type="text" id="nama_ruangan" value="<?php echo $nama_ruangan;?>" size="30" /></td>
</tr>


<tr>
<td height="37"><label for="status">&emsp;Status</label></td>
<td valign="top">:</td>
<td>
<input type="radio" name="status" id="status"  checked="checked" value="Active" <?php if($status=="Active"){echo"checked";}?>/>Active &emsp;
<input type="radio" name="status" id="status" value="Inactive" <?php if($status=="Inactive"){echo"checked";}?>/>Inactive
</td></tr>

<tr>
<td height="34"></td>
<td valign="top"></td>
<td colspan="2" valign="top">	
		<input name="Simpan" type="submit" id="Simpan" value="Save" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id_ruangan" type="hidden" id="id_ruangan" value="<?php echo $id_ruangan;?>" />
        <input name="id_ruangan0" type="hidden" id="id_ruangan0" value="<?php echo $id_ruangan0;?>" />
        <a href="?mnu=ruangan"><input name="Batal" type="button" id="Batal" value="Cancel" /></a>
	</td></tr>
</table>
</form>
<hr id="myhr">
<!-- Disini -->
<div id="accordion">
<?php  
  $sqlq="select distinct(status) from `$tbruangan` order by `status` desc";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>No data available...</h1>";
			}								
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$status=$dq["status"];
?>
<h4>List of <?php echo $status?> Room(s)</h4>
<div>
<!-- Disini -->
<table width="100%" border="0" class="table table-striped table-bordered table-hover">
  <tr bgcolor="#036">
    <th width="8%"><center>No.</center></th>
    <th width="20%"><center>Room ID</center></th>
    <th width="62%"><center>Room Name</center></th>
    <th width="10%"><center>Option</center></th>
  </tr>
<?php  
  $sql="select * from `$tbruangan` where status='$status' order by `nama_ruangan` asc";
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
				$id_ruangan=$d["id_ruangan"];
				$nama_ruangan=$d["nama_ruangan"];
				$status=$d["status"];
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td align='center'>$no.</td>
				<td align='center'>$id_ruangan</td>
				<td align='center'><b>Room $nama_ruangan</b></td>
				<td align='center'>
<a href='?mnu=ruangan&pro=ubah&kode=$id_ruangan'><img src='ypathicon/12.png' title='Change'></a>
<a href='?mnu=ruangan&pro=hapus&kode=$id_ruangan'><img src='ypathicon/h.png' title='Delete' 
onClick='return confirm(\"Delete room $nama_ruangan from room's data?\")'></a></td>
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Sorry, no data available...</blink></td></tr>";}
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=ruangan'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=ruangan'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=ruangan'>Next »</a></span>";
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
	$id_ruangan0=strip_tags($_POST["id_ruangan0"]);
	$nama_ruangan=strip_tags($_POST["nama_ruangan"]);
	$id_ruangan=$nama_ruangan;
	$status=strip_tags($_POST["status"]);
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbruangan` (
`id_ruangan` ,
`nama_ruangan` ,
`status` 
) VALUES (
'$id_ruangan', 
'$nama_ruangan', 
'$status'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('SAVE SUCCESS');document.location.href='?mnu=ruangan';</script>";}
		else{echo"<script>alert('SAVE FAILED');document.location.href='?mnu=ruangan';</script>";}
	}
	else{
$sql="update `$tbruangan` set 
`id_ruangan`='$id_ruangan',
`nama_ruangan`='$nama_ruangan',
`status`='$status'
where `id_ruangan`='$id_ruangan0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('UPDATE SUCCESS');document.location.href='?mnu=ruangan';</script>";}
	else{echo"<script>alert('UPDATE FAILED');document.location.href='?mnu=ruangan';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_ruangan=$_GET["kode"];
$sql="delete from `$tbruangan` where `id_ruangan`='$id_ruangan'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('DELETE SUCCESS');document.location.href='?mnu=ruangan';</script>";}
else{echo"<script>alert('DELETE FAILED');document.location.href='?mnu=ruangan';</script>";}
}
?>
<br>
<p align="center"><a class="btn btn-default btn-lg" alt='PRINT' onclick="PRINT()"><img src='ypathicon/print.png'> Print List of Room(s)</a></p>