<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
$ypath="../ypathfile";
?>

<?php
	$id_kelas=$_GET["x"];
	$sql="select * from `$tbkelas` where id_kelas='$id_kelas'";
	$d=getField($conn,$sql);
		$pengajar=getPengajar($conn,$d["id_pengajar"]);
		$jk=getMrMs($conn,$d["id_pengajar"]);
			if($jk=='M'){$ccal='Mr.';}
			else{$ccal='Ms.';}
		$program=getProgram($conn,$d["id_program"]);
		$level=getLevel($conn,$d["id_program"]);
		$hari=getSesiHari($conn,$d["id_sesi"]);
		$waktu=getSesiWaktu($conn,$d["id_sesi"]);
		$ruangan=getRuangan($conn,$d["id_ruangan"]);
		$periode=getPeriode($conn,$d["id_periode"]);
		$term=$d["term"];
?>

<h2 align="center"><b>Students of <?php echo"$level ($ccal $pengajar's Class)";?></b></h2>
<hr>
 
<table width="98%" border="0" cellpadding="5">
	<tr>
		<td width="14%"><strong>Program</strong></td><td width="2%" align="center"><strong>:</strong></td><td width="35%"><strong><?php echo $program;?></strong></td>
		<td width="16%"><strong>Session</strong></td><td width="3%" align="center"><strong>:</strong></td><td width="30%"><strong><?php echo"$hari ($waktu)";?></strong></td>
	</tr>
	<tr>
		<td><strong>Term</strong></td><td align="center"><strong>:</strong></td><td><strong><?php echo"$term ($periode)";?></strong></td>
		<td><strong>Room</strong></td><td align="center"><strong>:</strong></td><td><strong><?php echo $ruangan;?></strong></td>
	</tr>
    <tr>
    	<td colspan="6" height="10"></td>
    </tr>
</table>

<table width="98%" border="1" bordercolor="black" cellpadding="5">
  <tr>
    <th width="4%" align="center">No.</td>
    <th width="10%" align="center">Picture</td>
    <th width="15%" align="center">Name</td>
    <th width="8%" align="center">Gender</td>
    <th width="13%" align="center">Birth</td>
    <th width="10%" align="center">Religion</td>
    <th width="20%" align="center">Address</td>
    <th width="20%" align="center">Contacts</td>
  </tr>
<?php  
  $sql="select * from `$tbpeserta`,`$tbsiswa` where id_kelas='$id_kelas' and tb_peserta.id_siswa=tb_siswa.id_siswa order by `nama_siswa` asc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
		$arr=getData($conn,$sql);
			foreach($arr as $d) {								
			$no++;
		$id_peserta=$d["id_peserta"];
		$id_siswa=$d["id_siswa"];
		$nama_siswa=$d["nama_siswa"];
		$jenis_kelamin=$d["jenis_kelamin"];
			if($jenis_kelamin=='M'){$gen='Male';}
			else{$gen='Female';}
		$tempat_lahir=$d["tempat_lahir"];
		$tanggal_lahir=$d["tanggal_lahir"];
		$agama=$d["agama"];
		$alamat=$d["alamat"];
		$no_telepon=$d["no_telepon"];
		$email=$d["email"];
		$gambar=$d["gambar"];
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td align='center'>$no.</td>
				<td align='center'><img src='$ypath/$gambar' width='40' height='40' /></td>
				<td>$nama_siswa</td>
				<td align='center'>$gen</td>
				<td align='center'>$tempat_lahir<br>$tanggal_lahir</td>
				<td align='center'>$agama</td>
				<td>$alamat</td>
				<td>Phone : $no_telepon<br>E-Mail : $email</td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td align='center'>$no.</td>
				<td align='center'><img src='$ypath/$gambar' width='40' height='40' /></td>
				<td>$nama_siswa</td>
				<td align='center'>$gen</td>
				<td align='center'>$tempat_lahir<br>$tanggal_lahir</td>
				<td align='center'>$agama</td>
				<td>$alamat</td>
				<td>Phone : $no_telepon<br>E-Mail : $email</td>
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
$field="deskripsi";
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

