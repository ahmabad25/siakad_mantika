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
win=window.open('program/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, silabus=0'); } 
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
	$id_program=$_GET["kode"];
	$sql="select * from `$tbprogram` where `id_program`='$id_program'";
	$d=getField($conn,$sql);
				$id_program0=$d["id_program"];
				$nama_program=$d["nama_program"];
				$level=$d["level"];
				$uraian=$d["uraian"];
				$status=$d["status"];
				$silabus=$d["silabus"];
				$biaya=$d["biaya"];
				$pro="ubah";		
}
?>
<!-- Disini -->
<hr id="myhr">
<h4><b><i>&emsp;Program's Input</i></b></h4>
<hr id="myhr">
<!-- Disini -->
<form action="" method="post" enctype="multipart/form-data">
<table width="61%" id="mytable">

<tr>
	<td valign="top" height="35"><label for="id_program">&emsp;Program's ID</label></td>
	<td valign="top">:</td>
	<td valign="top" colspan="2"><input name="id_program" type="text" id="id_program" value="<?php echo $id_program;?>" size="4" /></td>
</tr>

<tr>
	<td valign="top" height="35"><label for="nama_program">&emsp;Program's Name</label></td>
	<td valign="top">:</td>
	<td valign="top" colspan="2"><input name="nama_program" type="text" id="nama_program" value="<?php echo $nama_program;?>" size="15" /></td>
</tr>

<tr>
	<td valign="top" height="36"><label for="level">&emsp;Level</label></td>
	<td valign="top">:</td>
	<td valign="top" colspan="2"><input name="level" type="text" id="level" value="<?php echo $level;?>" size="30" /></td>
</tr>

<tr>
	<td valign="top" height="34"><label for="uraian">&emsp;Description</label></td>
	<td valign="top">:</td>
	<td valign="top"><textarea name="uraian" cols="30" rows="3" id="uraian"><?php echo $uraian;?></textarea></td>
</tr>

<tr>
	<td valign="top" height="34"><label for="silabus">&emsp;Syllabus</label></td>
	<td valign="top">:</td>
	<td valign="top" colspan="2"><textarea name="silabus" cols="30" rows="3" id="silabus"><?php echo $silabus;?></textarea>
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
	<td valign="top" height="34"><label for="biaya">&emsp;Cost</label></td>
	<td valign="top">:</td>
	<td valign="top" colspan="2"><input name="biaya" type="text" id="biaya" value="<?php echo $biaya;?>" size="15" /></td>
</tr>

<tr>
<td>
<td height="70">
<td valign="top" colspan="2">
		<input name="Simpan" type="submit" id="Simpan" value="Save" />
        <input name="pro" type="hidden" id="pro" value="<?php echo $pro;?>" />
        <input name="id_program0" type="hidden" id="id_program0" value="<?php echo $id_program0;?>" />
        <a href="?mnu=program"><input name="Batal" type="button" id="Batal" value="Cancel" /></a>
	</td></td></td>
</tr>
</table>
</form>
<hr id="myhr">
<!-- Disini -->
<div id="accordion">
<?php  
  $sqlq="select distinct(nama_program) from `$tbprogram` order by `nama_program` asc";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>No data available...</h1>";
			}								
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$nama_program=$dq["nama_program"];

?>    
<h4>List of <?php echo $nama_program ?> Program(s)</h4>
<div>
<!-- Disini -->
<table width="100%" border="0" class="table table-striped table-bordered table-hover">
  <tr bgcolor="#036">
    <th width="6%"><center>No.</center></th>
    <th width="20%"><center>Course</center></th>
    <th width="37%"><center>Description & Details</center></th>
    <th width="15%"><center>Cost</center></th>
    <th width="10%"><center>Option</center></th>
  </tr>
<?php  
  $sql="select * from `$tbprogram` where nama_program='$nama_program' order by `id_program` asc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
	//--------------------------------------------------------------------------------------------
	$batas   = 8;
	$page = $_GET['page'];
	if(empty($page)){$posawal  = 0;$page = 1;}
	else{$posawal = ($page-1) * $batas;}
	
	$sql2 = $sql." LIMIT $posawal,$batas";
	$no = $posawal+1;
	//--------------------------------------------------------------------------------------------									
	$arr=getData($conn,$sql2);
		foreach($arr as $d) {							
				$id_program=$d["id_program"];
				$level=$d["level"];
				$uraian=$d["uraian"];
				$status=$d["status"];
				$silabus=$d["silabus"];
				$biaya=RP($d["biaya"]);
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td align='center' valign='top'>$no.</td>
				<td valign='middle' align='center'><b>$level</b>
					<br>($id_program)</td>
				<td valign='top'>
					<b>Status:</b> $status
					<br><b>Description:</b> $uraian
					<br><b>Syllabus:</b> $silabus</td>	
				<td align='left' valign='top'>Rp. $biaya</td>
				<td align='center'>
<a href='?mnu=program&pro=ubah&kode=$id_program'><img src='ypathicon/12.png' title='Change'></a>
<a href='?mnu=program&pro=hapus&kode=$id_program'><img src='ypathicon/h.png' title='Delete' 
onClick='return confirm(\"Delete $nama_program from program's data?\")'></a></td>
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
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$prev&mnu=program'>« Prev</a></span> ";
	}
	else{echo "<span class=disabled>« Prev</span> ";}

	// Tampilkan link page 1,2,3 ...
	for($i=1;$i<=$jmlhal;$i++)
	if ($i != $page){echo "<a href='$_SERVER[PHP_SELF]?page=$i&mnu=program'>$i</a> ";}
	else{echo " <span class=current>$i</span> ";}

	// Link kepage berikutnya (Next)
	if($page < $jmlhal){
		$next=$page+1;
		echo "<span class=prevnext><a href='$_SERVER[PHP_SELF]?page=$next&mnu=program'>Next »</a></span>";
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
	$id_program=strip_tags($_POST["id_program"]);
	$id_program0=strip_tags($_POST["id_program0"]);
	$nama_program=strip_tags($_POST["nama_program"]);
	$level=strip_tags($_POST["level"]);
	$uraian=strip_tags($_POST["uraian"]);
	$status=strip_tags($_POST["status"]);
	$silabus=strip_tags($_POST["silabus"]);
	$biaya=strip_tags($_POST["biaya"]);
	
if($pro=="simpan"){
$sql=" INSERT INTO `$tbprogram` (
`id_program` ,
`nama_program` ,
`level` ,
`uraian` ,
`status` ,
`silabus`,
`biaya` 
) VALUES (
'$id_program', 
'$nama_program', 
'$level',
'$uraian',
'$status',
'$silabus',
'$biaya'
)";
	
$simpan=process($conn,$sql);
		if($simpan) {echo "<script>alert('SAVE SUCCESS');document.location.href='?mnu=program';</script>";}
		else{echo"<script>alert('SAVE FAILED');document.location.href='?mnu=program';</script>";}
	}
	else{
$sql="update `$tbprogram` set 
`id_program`='$id_program',
`nama_program`='$nama_program',
`level`='$level' ,
`uraian`='$uraian',
`silabus`='$silabus',
`status`='$status',
`biaya`='$biaya' 
where `id_program`='$id_program0'";
$ubah=process($conn,$sql);
	if($ubah) {echo "<script>alert('UPDATE SUCCESS');document.location.href='?mnu=program';</script>";}
	else{echo"<script>alert('UPDATE FAILED');document.location.href='?mnu=program';</script>";}
	}//else simpan
}
?>

<?php
if($_GET["pro"]=="hapus"){
$id_program=$_GET["kode"];
$sql="delete from `$tbprogram` where `id_program`='$id_program'";
$hapus=process($conn,$sql);
if($hapus) {echo "<script>alert('DELETE SUCCESS');document.location.href='?mnu=program';</script>";}
else{echo"<script>alert('DELETE FAILED');document.location.href='?mnu=program';</script>";}
}
?>
<br>
<p align="center"><a class="btn btn-default btn-lg" alt='PRINT' onclick="PRINT()"><img src='ypathicon/print.png'> Print List of Program(s)</a></p>