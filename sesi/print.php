<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>


<h3><center>LIST OF SESSIONS</h3>
 

<table width="95%" border="0">
  <tr>
    <th width="8%"><center>No.</center></th>
    <th width="15%"><center>Session ID</center></th>
    <th width="30%"><center>Days</center></th>
    <th width="32%"><center>Time</center></th>
    <th width="15%"><center>Status</center></th>
  </tr>
<?php  
  $sql="select * from `$tbsesi` order by `id_sesi` asc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$id_sesi=$d["id_sesi"];
				$hari=$d["hari"];
				$waktu=$d["waktu"];
				$status=$d["status"];
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td align='center'>$no.</td>
				<td align='center'>$id_sesi</td>
				<td valign='top' align='center'><strong>$hari</strong>
				<td align='center' valign='top>'<br><i>($waktu)</i></td>
				<td align='center'><b>$status</b></td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td align='center'>$no.</td>
				<td align='center'>$id_sesi</td>
				<td valign='top' align='center'><strong>$hari</strong>
				<td align='center' valign='top>'<br><i>($waktu)</i></td>
				<td align='center'><b>$status</b></td>
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data sesi belum tersedia...</blink></td></tr>";}
		
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

