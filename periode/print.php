<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>


<h3><center>LIST OF PERIODS</h3>
 

<table width="95%" border="0">
  <tr>
    <th width="8%"><center>No.</center></th>
    <th width="15%"><center>Period's ID</center></th>
    <th width="15%"><center>Period's Name</center></th>
    <th width="47%"><center>Description</center></th>
    <th width="15%"><center>Option</center></th>
  </tr>
<?php  
  $sql="select * from `$tbperiode` order by `status` asc,`nama_periode` asc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$id_periode=$d["id_periode"];
				$nama_periode=$d["nama_periode"];
				$deskripsi=$d["deskripsi"];
				$status=$d["status"];
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td align='center'>$no.</td>
				<td><center>$id_periode</center></td>
				<td><center><strong>$nama_periode</strong></center></td>
				<td align='center'>$deskripsi</td>
				<td align='center'>$status</td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td align='center'>$no.</td>
				<td><center>$id_periode</center></td>
				<td><center><strong>$nama_periode</strong></center></td>
				<td align='center'>$deskripsi</td>
				<td align='center'>$status</td>
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data periode belum tersedia...</blink></td></tr>";}
		
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

