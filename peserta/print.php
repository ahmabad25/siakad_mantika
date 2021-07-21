<style type="text/css">body {width: 100%;} </style> 
<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
echo"<link href='../ypathcss/$css' rel='stylesheet' type='text/css' />";
?>

<?php
	$id_kelas=$_GET["x"];
	$sql="select * from `$tbkelas` where id_kelas='$id_kelas'";
	$d=getField($conn,$sql);
		$pengajar=getPengajar($conn,$d["id_pengajar"]);
		$jk=getMrMs($conn,$d["id_pengajar"]);
			if ($jk=='M'){$ccal='Mr.';}
			else {$ccal='Ms.';}
		$program=getProgram($conn,$d["id_program"]);
		$level=getLevel($conn,$d["id_program"]);
		$hari=getSesiHari($conn,$d["id_sesi"]);
		$waktu=getSesiWaktu($conn,$d["id_sesi"]);
		$ruangan=getRuangan($conn,$d["id_ruangan"]);
		$periode=getPeriode($conn,$d["id_periode"]);
		$term=$d["term"];
?>

<h3><center>Students of <?php echo"$level ($ccal $pengajar's Class)";?> :</h3>
 

<table width="100%" border="0">
  <tr>
    <th width="5%"><center>no</td>
    <th width="10%"><center>id_peserta</td>
    <th width="25%"><center>id_kelas</td>
    <th width="25%"><center>id_siswa</td>
    <th width="10%"><center>catatan</td>
  </tr>
<?php
  $sql="select * from `$tbpeserta` where id_kelas='$id_kelas' order by `id_peserta` asc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$id_peserta=$d["id_peserta"];
				$id_kelas=$d["id_kelas"];
				$id_siswa=$d["id_siswa"];
				$catatan=$d["catatan"];
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$id_peserta</td>
				<td>$id_kelas</td>
				<td>$id_siswa</td>
				<td>$catatan</td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$id_peserta</td>
				<td>$id_kelas</td>
				<td>$id_siswa</td>
				<td>$catatan</td>
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data peserta belum tersedia...</blink></td></tr>";}
		
/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/

function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
	$rs->free();
	return $jum;
}

function getField($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$d= $rs->fetch_assoc();
	$rs->free();
	return $d;
}

function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	//foreach($arr as $row) {
	//  echo $row['nama_kelas'] . '*<br>';
	//}
	
	$rs->free();
	return $arr;
}

function getAdmin($conn,$kode){
$field="nama_admin";
$sql="SELECT `$field` FROM `tb_admin` where `id_admin`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
function getSiswa($conn,$kode){
$field="nama_siswa";
$sql="SELECT `$field` FROM `tb_siswa` where `id_siswa`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
function getPengajar($conn,$kode){
$field="nama_pengajar";
$sql="SELECT `$field` FROM `tb_pengajar` where `id_pengajar`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}

function getMrMs($conn,$kode){
$field="jenis_kelamin";
$sql="SELECT `$field` FROM `tb_pengajar` where `id_pengajar`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}

function getProgram($conn,$kode){
$field="nama_program";
$sql="SELECT `$field` FROM `tb_program` where `id_program`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}

function getLevel($conn,$kode){
$field="level";
$sql="SELECT `$field` FROM `tb_program` where `id_program`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
function getPeriode($conn,$kode){
$field="nama_periode";
$sql="SELECT `$field` FROM `tb_periode` where `id_periode`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}

function getRuangan($conn,$kode){
$field="nama_ruangan";
$sql="SELECT `$field` FROM `tb_ruangan` where `id_ruangan`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}

function getSesiHari($conn,$kode){
$field="hari";
$sql="SELECT `$field` FROM `tb_sesi` where `id_sesi`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}

function getSesiWaktu($conn,$kode){
$field="waktu";
$sql="SELECT `$field` FROM `tb_sesi` where `id_sesi`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}

function getPeserta($conn,$kode){
$field="catatan";
$sql="SELECT `$field` FROM `tb_peserta` where `id_peserta`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
	
function getKelas($conn,$kode){
$field="id_pengajar";
$sql="SELECT `$field` FROM `tb_kelas` where `id_kelas`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}

function getTerm($conn,$kode){
$field="term";
$sql="SELECT `$field` FROM `tb_kelas` where `id_kelas`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}

function getAbsensi($conn,$kode){
$field="id_absensi";
$sql="SELECT `$field` FROM `tb_absensi` where `id_absensi`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
		
?>

</table>

