<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>


<h3><center>LIST OF PROGRAMS</h3>
 

<table width="95%" border="0">
  <tr>
    <th width="6%"><center>No.</center></th>
    <th width="20%"><center>Course</center></th>
    <th width="52%"><center>Description & Details</center></th>
    <th width="15%"><center>Cost</center></th>
  </tr>
<?php  
  $sql="select * from `$tbprogram` order by `id_program` asc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$id_program=$d["id_program"];
				$nama_program=$d["nama_program"];
				$level=$d["level"];
				$uraian=$d["uraian"];
				$status=$d["status"];
				$silabus=$d["silabus"];
				$biaya=$d["biaya"];
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td align='center' valign='top'>$no.</td>
				<td valign='top' align='center'><b>$level</b>
					<br>($id_program)</td>
				<td valign='top'>
					<b>Status: $status</b>
					<br><b>Description:</b> $uraian
					<br><b>Syllabus:</b> $silabus</td>	
				<td align='left' valign='top'>Rp. $biaya</td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td align='center' valign='top'>$no.</td>
				<td valign='top' align='center'><b>$level</b>
					<br>($id_program)</td>
				<td valign='top'>
					<b>Status: $status</b>
					<br><b>Description:</b> $uraian
					<br><b>Syllabus:</b> $silabus</td>	
				<td align='left' valign='top'>Rp. $biaya</td>
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data program belum tersedia...</blink></td></tr>";}
		
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	
	$rs->free();
	return $arr;
}
		
?>

</table>

