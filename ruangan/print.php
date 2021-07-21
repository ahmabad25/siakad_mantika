<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>


<h3><center>LIST OF ROOMS</h3>
 

<table width="95%" border="0">
  <tr>
    <th width="8%"><center>No.</center></th>
    <th width="15%"><center>Room ID</center></th>
    <th width="52%"><center>Room Name</center></th>
    <th width="25%"><center>Status</center></th>
  </tr>
<?php  
  $sql="select * from `$tbruangan` order by `id_ruangan` asc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$id_ruangan=$d["id_ruangan"];
				$nama_ruangan=$d["nama_ruangan"];
				$status=$d["status"];
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td align='center'>$no.</td>
				<td align='center'>$id_ruangan</td>
				<td align='center'><b>Room $nama_ruangan</b></td>
				<td align='center'><b>$status</b></td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td align='center'>$no.</td>
				<td align='center'>$id_ruangan</td>
				<td align='center'><b>Room $nama_ruangan</b></td>
				<td align='center'><b>$status</b></td>
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data ruangan belum tersedia...</blink></td></tr>";}
		
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

