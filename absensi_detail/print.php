<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>


<h3><center>Laporan data absensi_detail:</h3>
 

<table width="100%" border="0">
  <tr>
    <th width="5%"><center>no</td>
    <th width="10%"><center>id</td>
    <th width="25%"><center>id_absensi</td>
    <th width="25%"><center>id_siswa</td>
    <th width="20%"><center>email</td>
    <th width="10%"><center>catatan</td>
    <th width="5%"><center>status</td>
  </tr>
<?php  
  $sql="select * from `$tbabsensidetail` order by `id` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$id=$d["id"];
				$id_absensi=$d["id_absensi"];
				$id_siswa=$d["id_siswa"];
				$email=$d["email"];
				$catatan=$d["catatan"];
				$status=$d["status"];
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$id</td>
				<td>$id_absensi</td>
				<td>$id_siswa</td>
				<td>$email</td>
				<td>$catatan</td>
				<td>$status</td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$id</td>
				<td>$id_absensi</td>
				<td>$id_siswa</td>
				<td>$email</td>
				<td>$catatan</td>
				<td>$status</td>
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data absensi_detail belum tersedia...</blink></td></tr>";}
		
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

