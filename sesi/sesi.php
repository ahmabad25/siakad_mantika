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
win=window.open('sesi/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, silabus=0'); } 
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
	$id_sesi=$_GET["kode"];
	$sql="select * from `$tbsesi` where `id_sesi`='$id_sesi'";
	$d=getField($conn,$sql);
				$id_sesi=$d["id_sesi"];
				$id_sesi0=$d["id_sesi"];
					$ksesi=substr($id_sesi, 0, 2);
				$hari=$d["hari"];
				$waktu=$d["waktu"];
				$status=$d["status"];
				$pro="ubah";		
}
?>
<!-- Disini -->
<hr id="myhr">
<h4><b><i>&emsp;Session's Input</i></b></h4>
<hr id="myhr">
<!-- Disini -->
<form action="" method="post" enctype="multipart/form-data">
<table width="100%" id="mytable">


<tr>
	<th width="149" height="32"><label for="ksesi">&emsp;Session ID</label></th>
	<th width="10" valign="top">:</th>
	<td valign="top" colspan="2"><input name="ksesi" type="text" id="ksesi" value="<?php echo $ksesi;?>" size="3" /> - X</td>
</tr>

<tr>
	<td height="35"><label for="hari">&emsp;Days</label></td>
	<td valign="top">:</td>
	<td valign="top" colspan="2"><input name="hari" type="text" id="hari" value="<?php echo $hari;?>" size="20" /></td>
</tr>

<tr>
	<td valign="top" height="36"><label for="waktu">&emsp;Time</label></td>
	<td valign="top">:</td>
	<td colspan="2" valign="top"><input name="waktu" type="text" id="waktu" value="<?php echo $waktu;?>" size="20" /></td>
</tr>

<tr>
<td valign="top" height="37"><label for="status">&emsp;Status</label></td>
<td valign="top">:</td>
<td>
<input type="radio" name="status" id="status"  checked="checked" value="Active" <?php if($status=="Active"){echo"checked";}?>/>Active &emsp;
<input type="radio" name="status" id="status" value="Inactive" <?php if($status=="Inactive"){echo"checked";}?>/>Inactive
</td></tr>

<tr>
<td height="20">
<td valign="top">
<td colspan="2"><input name="Simpan" type="submit" id="Simpan" value="Save" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id_sesi0" type="hidden" id="id_sesi0" value="<?php echo $id_sesi0;?>" />
        <a href="?mnu=sesi"><input name="Batal" type="button" id="Batal" value="Cancel" /></a>
	</td></td></td></tr>
</table>
</form>
<hr id="myhr">
<!-- Disini -->
<div id="accordion">
<?php  
  $sqlq="select distinct(status) from `$tbsesi` order by `status` asc";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>No data available...</h1>";
			}								
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$status=$dq["status"];

?>
<h4>List of <?php echo $status?> Session(s)</h4>
<div>
<!-- Disini -->
<table width="100%" border="0" class="table table-striped table-bordered table-hover">
  <tr bgcolor="#036">
    <th width="8%"><center>No.</center></th>
    <th width="20%"><center>Session ID</center></th>
    <th width="32%"><center>Days</center></th>
    <th width="30%"><center>Time</center></th>
    <th width="10%"><center>Option</center></th>
  </tr>
<?php  
  $sql="select * from `$tbsesi` where status='$status' order by `id_sesi` asc";
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
				$id_sesi=$d["id_sesi"];
				$hari=$d["hari"];
				$waktu=$d["waktu"];
				$status=$d["status"];

					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td align='center'>$no.</td>
				<td align='center'>$id_sesi</td>
				<td valign='top' align='center'><strong>$hari</strong>
				<td align='center' valign='top>'<br><i>($waktu)</i></td>
				<td align='center'>
<a href='?mnu=sesi&pro=ubah&kode=$id_sesi'><img src='ypathicon/12.png' title='Change'></a>
<a href='?mnu=sesi&pro=hapus&kode=$id_sesi'><img src='ypathicon/h.png' title='Delete' 
onClick='return confirm(\"Delete $id_sesi from session's data?\")'></a></td>
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=sesi'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=sesi'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=sesi'>Next »</a></span>";
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
	$ksesi=strip_tags($_POST["ksesi"]);

  		$kd=$ksesi;//KEG1610001
  		$sql="select `id_sesi` from `$tbsesi` where `id_sesi` like '$kd%' order by `id_sesi` desc";
  		$q=mysqli_query($conn, $sql);
  		$jum=mysqli_num_rows($q);
  		
  		if($jum > 0){
   		$d=mysqli_fetch_array($q);
   		$idmax=$d["id_sesi"];
   		$kd1=substr($idmax, 0, 2);
   
   			if ($kd1==$kd){
   				$urut=substr($idmax,2,1)+1;
   				$idmax="$kd".$urut;
   			}
   			else{
   				$idmax="$kd"."1";
   			}
   		}
  		else{$idmax="$kd"."1";}
  		$id_sesi=$idmax;

	$id_sesi0=strip_tags($_POST["id_sesi0"]);
	$hari=strip_tags($_POST["hari"]);
	$waktu=strip_tags($_POST["waktu"]);
	$status=strip_tags($_POST["status"]);
	$keterangan=strip_tags($_POST["keterangan"]);
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbsesi` (
`id_sesi` ,
`hari` ,
`waktu` ,
`status` 
) VALUES (
'$id_sesi', 
'$hari', 
'$waktu',
'$status'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('SAVE SUCCESS');document.location.href='?mnu=sesi';</script>";}
		else{echo"<script>alert('SAVE FAILED');document.location.href='?mnu=sesi';</script>";}
	}
	else{
$sql="update `$tbsesi` set 
`id_sesi`='$id_sesi',
`hari`='$hari',
`waktu`='$waktu' ,
`status`='$status'
where `id_sesi`='$id_sesi0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('UPDATE SUCCESS');document.location.href='?mnu=sesi';</script>";}
	else{echo"<script>alert('UPDATE FAILED');document.location.href='?mnu=sesi';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_sesi=$_GET["kode"];
$sql="delete from `$tbsesi` where `id_sesi`='$id_sesi'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('DELETE SUCCESS');document.location.href='?mnu=sesi';</script>";}
else{echo"<script>alert('DELETE FAILED');document.location.href='?mnu=sesi';</script>";}
}
?>
<br>
<p align="center"><a class="btn btn-default btn-lg" alt='PRINT' onclick="PRINT()"><img src='ypathicon/print.png'> Print List of Session(s)</a></p>