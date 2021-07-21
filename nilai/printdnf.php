<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
$ypath="../ypathfile";
?>

<?php
	$id_kelas=$_GET["id1"];
	$jenis_tes=$_GET["id2"];
		if($jenis_tes=='Mid'){$title='Mid-Test';}
		else{$title='Final Test';}
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
		$total=0;
?>

<h3 align="center"><b><?php echo $title;?> Scores<br><?php echo"$level ($ccal $pengajar's Class)";?></b></h3>
<hr>
<table width="100%" border="0" cellpadding="5">
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
    <th width="7%" rowspan="2" align="center"><center>No.</th>
    <th width="30%" rowspan="2" align="center">Name</th>
    <th colspan="12" align="center">Scores</th>
    <th width="30%" rowspan="2" align="center">Teacher's Note</th>
  </tr>
  <tr>
  	<th width="3%" align="center">List.</th>
    <th width="3%" align="center">Gr.</th>
    <th width="3%" align="center">Str.</th>
    <th width="3%" align="center">Gr.</th>
    <th width="3%" align="center">Read.</th>
    <th width="3%" align="center">Gr.</th>
	<th width="3%" align="center">Comp.</th>
    <th width="3%" align="center">Gr.</th>		
	<th width="3%" align="center">Speak.</th>
    <th width="3%" align="center">Gr.</th>
    <th width="3%" align="center">Avg.</th>
    <th width="3%" align="center">Gr.</th>
  </tr>
<?php  
  $sql="select * from `$tbnilai`, `$tbpeserta` where tb_nilai.id_peserta=tb_peserta.id_peserta and tb_peserta.id_kelas='$id_kelas' and jenis_tes='$jenis_tes' order by tb_peserta.id_peserta asc";
  $jum=getJum($conn,$sql);
  $no=0;
		if($jum > 0){
		$arr=getData($conn,$sql);
			foreach($arr as $d) {								
			$no++;
				$siswa=getSiswa($conn,$d["id_siswa"]);
				$ls_score=$d["ls_score"];
					if ($ls_score>85){$lsg='A';}
					else if ($ls_score<=85 && $ls_score>70){$lsg='B';}
					else if ($ls_score<=70 && $ls_score>55){$lsg='C';}
					else if ($ls_score<=55 && $ls_score>40){$lsg='D';}
					else if ($ls_score<=40 && $ls_score>25){$lsg='E';}
					else if ($ls_Score<=25){$lsg='F';}
				$su_score=$d["su_score"];
					if ($su_score>85){$sug='A';}
					else if ($su_score<=85 && $su_score>70){$sug='B';}
					else if ($su_score<=70 && $su_score>55){$sug='C';}
					else if ($su_score<=55 && $su_score>40){$sug='D';}
					else if ($su_score<=40 && $su_score>25){$sug='E';}
					else if ($su_Score<=25){$sug='F';}
				$rv_score=$d["rv_score"];
					if ($rv_score>85){$rvg='A';}
					else if ($rv_score<=85 && $rv_score>70){$rvg='B';}
					else if ($rv_score<=70 && $rv_score>55){$rvg='C';}
					else if ($rv_score<=55 && $rv_score>40){$rvg='D';}
					else if ($rv_score<=40 && $rv_score>25){$rvg='E';}
					else if ($rv_Score<=25){$rvg='F';}
				$comp_score=$d["comp_score"];
					if ($comp_score>85){$compg='A';}
					else if ($comp_score<=85 && $comp_score>70){$compg='B';}
					else if ($comp_score<=70 && $comp_score>55){$compg='C';}
					else if ($comp_score<=55 && $comp_score>40){$compg='D';}
					else if ($comp_score<=40 && $comp_score>25){$compg='E';}
					else if ($comp_Score<=25){$compg='F';}
				$speak_score=$d["speak_score"];
					if ($speak_score>85){$speakg='A';}
					else if ($speak_score<=85 && $speak_score>70){$speakg='B';}
					else if ($speak_score<=70 && $speak_score>55){$speakg='C';}
					else if ($speak_score<=55 && $speak_score>40){$speakg='D';}
					else if ($speak_score<=40 && $speak_score>25){$speakg='E';}
					else if ($speak_Score<=25){$speakg='F';}
				$catatan=$d["catatan"];
				$average=(($ls_score + $rv_score + $su_score + $comp_score + $speak_score)/5);
				$total += $average;	
					if ($average>85){$avg='A';}
					else if ($average<=85 && $average>70){$avg='B';}
					else if ($average<=70 && $average>55){$avg='C';}
					else if ($average<=55 && $average>40){$avg='D';}
					else if ($average<=40 && $average>25){$avg='E';}
					else if ($average<=25){$avg='F';}				
if($no %2==1){
echo"<tr bgcolor='#999999'>
				<td align='center'>$no.</td>
				<td>$siswa</td>
				<td align='center'>$ls_score</td>
				<td align='center'><b>$lsg</b></td>
				<td align='center'>$su_score</td>
				<td align='center'><b>$sug</b></td>
				<td align='center'>$rv_score</td>
				<td align='center'><b>$rvg</b></td>
				<td align='center'>$comp_score</td>
				<td align='center'><b>$compg</b></td>
				<td align='center'>$speak_score</td>
				<td align='center'><b>$speakg</b></td>
				<td align='center'><b>$average</b></td>
				<td align='center'><b>$avg</b></td>
				<td>$catatan</td>
				</tr>";
				}//no==1
else if($no %2==0){
echo"<tr bgcolor='#cccccc'>
				<td align='center'>$no.</td>
				<td>$siswa</td>
				<td align='center'>$ls_score</td>
				<td align='center'><b>$lsg</b></td>
				<td align='center'>$su_score</td>
				<td align='center'><b>$sug</b></td>
				<td align='center'>$rv_score</td>
				<td align='center'><b>$rvg</b></td>
				<td align='center'>$comp_score</td>
				<td align='center'><b>$compg</b></td>
				<td align='center'>$speak_score</td>
				<td align='center'><b>$speakg</b></td>
				<td align='center'><b>$average</b></td>
				<td align='center'><b>$avg</b></td>
				<td>$catatan</td>
				</tr>";
				}
			}//while
			$totavg=(($total)/$no);
			if ($totavg>85){$fg='A';}
					else if ($totavg<=85 && $totavg>70){$fg='B';}
					else if ($totavg<=70 && $totavg>55){$fg='C';}
					else if ($totavg<=55 && $totavg>40){$fg='D';}
					else if ($totavg<=40 && $totavg>25){$fg='E';}
					else if ($totavg<=25){$fg='F';}
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data nilai belum tersedia...</blink></td></tr>";}
		
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
  <tr>
    	<td>&nbsp;</td>
    <td align="center" colspan="11"><b>CLASS AVERAGE SCORE</b></td>
        <td align="center"><strong><?php echo $totavg;?></strong></td>
    <td align="center"><strong><?php echo $fg;?></strong></td>
        <td>&nbsp;</td>
  </tr>
</table>



