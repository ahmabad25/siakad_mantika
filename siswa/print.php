<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
$YPATH="../ypathfile";
?>

<h3><center>LIST OF STUDENTS</h3>
 

<table width="95%" border="0">
  <tr>
    <th width="7%"><center>No.</center></td>
    <th width="12%"><center>Picture</center></td>
    <th width="32%"><center>Profile</center></td>
    <th width="21%"><center>Authentication</center></td>
    <th width="28%"><center>Address & Contact</center></td>
  </tr>
<?php  
  $sql="select * from `$tbsiswa` order by `nama_siswa` asc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$id_siswa=$d["id_siswa"];
				$nama_siswa=$d["nama_siswa"];
				$jenis_kelamin=$d["jenis_kelamin"];
					if($jenis_kelamin=='M'){$jk='Male';}
					else{$jk='Female';}
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
				$gambar=$d["gambar"];
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td align='center' valign='top'>$no.</td>
				<td valign='top'><div align='center'>";
echo"<img src='$YPATH/$gambar' width='40' height='40' /></a></div>";
				echo"</td>
				<td valign='top'><strong>$id_siswa | $nama_siswa ($jk)</strong>
				<br>Birth: $tempat_lahir, $tanggal_lahir<br>Religion: $agama</td>
				<td valign='top'><b>Status : $status</b><br>Username: $username<br>Password: $password</td>
				<td valign='top'>$alamat<br>Phone: $no_telepon <br>Note: $keterangan</td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td align='center' valign='top'>$no.</td>
				<td valign='top'><div align='center'>";
echo"<img src='$YPATH/$gambar' width='40' height='40' /></a></div>";
				echo"</td>
				<td valign='top'><strong>$id_siswa | $nama_siswa ($jk)</strong>
				<br>Birth: $tempat_lahir, $tanggal_lahir<br>Religion: $agama</td>
				<td valign='top'><b>Status : $status</b><br>Username: $username<br>Password: $password</td>
				<td valign='top'>$alamat<br>Phone: $no_telepon <br>Note: $keterangan</td>
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

