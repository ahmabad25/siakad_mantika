<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
$ypath="../ypathfile";
$tanggal_pertemuan=WKT(date("d/m"));
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

<h3 align="center"><b>Attendances of <?php echo"$level ($ccal $pengajar's Class)";?></b></h3>
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

<table width="100%" border="1" cellpadding="5">
  <tr>
    <th width="5%" rowspan="3"><center>No.</th>
    <th width="10%" rowspan="3"><center>Name</th>
    <th width="25%" colspan="32"><center>Attendance Date</th>
    <th width="25%" rowspan="3"><center>Total Present</th>
    <th width="20%" rowspan="3"><center>Total Absent</th>
  </tr>
  <tr>
  	<?php
  		$e=1;
  		for($e=1;$e<33;$e++){
  			echo"<td align='center'><b>$e</b></td>";
  		}
  	?>
  </tr>
  <tr>
  	<?php
  		$sqld="SELECT * FROM `$tbabsensi` WHERE id_kelas='$id_kelas' order by tanggal_pertemuan desc";
  		$$arr=getData($conn,$sqld);
  			foreach($arr as $dd) {
  				$tanggal_pertemuan=WKT($d["tanggal_pertemuan"]);
  			}
  	?>
  <tr>
<?php  
  $sql="select * from `$tbabsensi` order by `id_absensi` desc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {								
		$no++;
				$id_absensi=$d["id_absensi"];
				$tanggal=$d["tanggal"];
				$jam=$d["jam"];
				$id_kelas=$d["id_kelas"];
				$id_pengajar=$d["id_pengajar"];
				$id_periode=$d["id_periode"];
						
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td>$no</td>
				<td>$id_absensi</td>
				<td>$tanggal</td>
				<td>$jam</td>
				<td>$id_kelas</td>
				<td>$id_pengajar</td>
				<td>$id_periode</td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td>$no</td>
				<td>$id_absensi</td>
				<td>$tanggal</td>
				<td>$jam</td>
				<td>$id_kelas</td>
				<td>$id_pengajar</td>
				<td>$id_periode</td>
				</tr>";
				}
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data absensi belum tersedia...</blink></td></tr>";}
		
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

function getOrangtua($conn,$kode){
$field="nama_orangtua";
$sql="SELECT `$field` FROM `tb_orangtua` where `id_orangtua`='$kode'";
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

<?php function RP($rupiah){return number_format($rupiah,"2",",",".");}?>
<?php
function WKT($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,0,4);

$judul_bln=array(1=> "January", "February", "March", "April", "May","June", "July", "August", "September","October", "November", "December");
$wk=$tanggal." ".$judul_bln[(int)$bulan]." ".$tahun;
return $wk;
}
?>
<?php
function WKTP($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,2,2);

$judul_bln=array(1=> "Jan", "Feb", "Mar", "Apr", "May","Jun", "Jul", "Aug", "Sep","Oct", "Nov", "Dec");
$wk=$tanggal." ".$judul_bln[(int)$bulan]."'".$tahun;
return $wk;
}
?>
<?php
function BAL($tanggal){
	$arr=explode(" ",$tanggal);
	if($arr[1]=="Januari"||$arr[1]=="January"){$bul="01";}
	else if($arr[1]=="Februari"||$arr[1]=="February"){$bul="02";}
	else if($arr[1]=="Maret"||$arr[1]=="March"){$bul="03";}
	else if($arr[1]=="April"){$bul="04";}
	else if($arr[1]=="Mei"||$arr[1]=="May"){$bul="05";}
	else if($arr[1]=="Juni"||$arr[1]=="June"){$bul="06";}
	else if($arr[1]=="Juli"||$arr[1]=="July"){$bul="07";}
	else if($arr[1]=="Agustus"||$arr[1]=="August"){$bul="08";}
	else if($arr[1]=="September"){$bul="09";}
	else if($arr[1]=="Oktober"||$arr[1]=="October"){$bul="10";}
	else if($arr[1]=="November"){$bul="11";}
	else if($arr[1]=="Nopember"){$bul="11";}
	else if($arr[1]=="Desember"||$arr[1]=="December"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
}
?>

<?php
function BALP($tanggal){
	$arr=explode(" ",$tanggal);
	if($arr[1]=="Jan"){$bul="01";}
	else if($arr[1]=="Feb"){$bul="02";}
	else if($arr[1]=="Mar"){$bul="03";}
	else if($arr[1]=="Apr"){$bul="04";}
	else if($arr[1]=="Mei"||$arr[1]=="May"){$bul="05";}
	else if($arr[1]=="Jun"){$bul="06";}
	else if($arr[1]=="Jul"){$bul="07";}
	else if($arr[1]=="Agu"||$arr[1]=="Aug"){$bul="08";}
	else if($arr[1]=="Sep"){$bul="09";}
	else if($arr[1]=="Okt"||$arr[1]=="Oct"){$bul="10";}
	else if($arr[1]=="Nov"){$bul="11";}
	else if($arr[1]=="Nop"){$bul="11";}
	else if($arr[1]=="Des"||$arr[1]=="Dec"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
}
?>