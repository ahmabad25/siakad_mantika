<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>

<h3><center>Laporan data siswa:</h3>
 

<table width="100%" border="0">
  <tr>
    <th width="5%"><center>no</td>
    <th width="10%"><center>id_siswa</td>
    <th width="25%"><center>nama_siswa</td>
    <th width="25%"><center>jenis_kelamin</td>
    <th width="20%"><center>tempat_lahir</td>
    <th width="10%"><center>tanggal_lahir</td>
    <th width="5%"><center>alamat</td>
    <th width="5%"><center>agama</td>
    <th width="5%"><center>username</td>
    <th width="5%"><center>password</td>
    <th width="5%"><center>email</td>
    <th width="5%"><center>no_telepon</td>
    <th width="5%"><center>status</td>
    <th width="5%"><center>keterangan</td>
  </tr>
<?php  
  $sql="select * from `$tbsiswa` order by `id_siswa` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$id_siswa=$d["id_siswa"];
				$nama_siswa=$d["nama_siswa"];
				$jenis_kelamin=$d["jenis_kelamin"];
				$tempat_lahir=$d["tempat_lahir"];
				$tanggal_lahir=$d["tanggal_lahir"];
				$alamat=$d["alamat"];
				$agama=$d["agama"];
				$username=$d["username"];
				$password=$d["password"];
				$email=$d["email"];
				$no_telepon=$d["no_telepon"];
				$status=$d["status"];
				$keterangan=$d["keterangan"];
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$id_siswa</td>
				<td>$nama_siswa</td>
				<td>$jenis_kelamin</td>
				<td>$tempat_lahir</td>
				<td>$tanggal_lahir</td>
				<td>$alamat</td>
				<td>$agama</td>
				<td>$username</td>
				<td>$password</td>
				<td>$email</td>
				<td>$no_telepon</td>
				<td>$status</td>
				<td>$keterangan</td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$id_siswa</td>
				<td>$nama_siswa</td>
				<td>$jenis_kelamin</td>
				<td>$tempat_lahir</td>
				<td>$tanggal_lahir</td>
				<td>$alamat</td>
				<td>$agama</td>
				<td>$username</td>
				<td>$password</td>
				<td>$email</td>
				<td>$no_telepon</td>
				<td>$status</td>
				<td>$keterangan</td>
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data siswa belum tersedia...</blink></td></tr>";}
		
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

