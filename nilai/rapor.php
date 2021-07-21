<body OnLoad="window.print()" OnFocus="window.close()"> 
<?php
include "../konmysqli.php";
?>

<style>
	img {
		max-width: 100%;
		max-height: 100%;
		}		
</style>

<?php
$id_admin=$_GET["id1"];
$nama_admin=getAdmin($conn,$id_admin);
$id_nilai=$_GET["id2"];
	$sql="select * from `$tbnilai` where `id_nilai`='$id_nilai'";
	$d=getField($conn,$sql);
				$id_peserta=$d["id_peserta"];
				$id_kelas=$d["id_kelas"];
				$id_periode=$d["id_periode"];
				$ls_score=$d["ls_score"];
				$su_score=$d["su_score"];
				$rv_score=$d["rv_score"];
				$comp_score=$d["comp_score"];
				$speak_score=$d["speak_score"];
				$catatan=$d["catatan"];
	$average=(($ls_score + $rv_score + $su_score + $comp_score + $speak_score)/5);
	
	$sqla="select * from `$tbpeserta` where `id_peserta`='$id_peserta'";
	$da=getField($conn,$sqla);
				$id_siswa=$da["id_siswa"];
				$nama_siswa=getSiswa($conn,$id_siswa);
					
					$sql1="select * from `$tbkelas` where `id_kelas`='$id_kelas'";
					$d1=getField($conn,$sql1);
						$nama_program=getProgram($conn,$d1["id_program"]);
						$level=getLevel($conn,$d1["id_program"]);
						$nama_pengajar=getPengajar($conn,$d1["id_pengajar"]);
						$term=$d1["term"];
						
					$sql2="select * from `$tbperiode` where `id_periode`='$id_periode'";
					$d2=getField($conn,$sql2);
						$deskripsi=$d2["deskripsi"];
						
					$sqlc="SELECT COUNT( id ) AS jumlahhadir
							FROM  `$tbabsensidetail` ,  `$tbabsensi` 
							WHERE tb_absensi_detail.id_absensi = tb_absensi.id_absensi
							AND id_kelas =  '$id_kelas'
							AND id_siswa =  '$id_siswa'
							AND STATUS =  'P'";
					$dc=getField($conn,$sqlc);
							$jh=$dc["jumlahhadir"];
							
					$sqle="SELECT COUNT( id ) AS jumlahabsen
							FROM  `$tbabsensidetail` ,  `$tbabsensi` 
							WHERE tb_absensi_detail.id_absensi = tb_absensi.id_absensi
							AND id_kelas =  '$id_kelas'
							AND id_siswa =  '$id_siswa'
							AND STATUS = 'A'";
					$de=getField($conn,$sqle);
							$ja=$de["jumlahabsen"];
?>
<body>
<form id="form1" name="form1" method="post" action="">
  <table width="98%" border="0">
    <tr>
    	<td height="91" colspan="5" align="left">
        		<img src='../ypathicon/comp/rapor-head.png' width="484" height="82"></img>
      </td>
      	<td colspan="2" align="right">
        	<img src='../ypathicon/comp/m_logo-256.png' width="164" height="97"></img>
        </td>
    </tr>
    <tr>
   	  <td>REPORT ON</td><td width="20" align="center">:</td><td width="348"> <?php echo $nama_siswa?></td>
   	  <td width="251">REGISTRATION NO.</td><td width="19" align="center">:</td>
   	  <td width="232"> <?php echo $id_siswa?></td>
    </tr>
    
    <tr>
   	  <td>PROGRAM</td><td align="center">:</td>
   	  <td> <?php echo $nama_program?></td>
   	  <td>TERM / YEAR</td><td align="center">:</td><td> <?php echo $term?></td>
    </tr>
    
    <tr>
   	  <td>LEVEL</td><td align="center">:</td><td> <?php echo $level?></td>
   	  <td>MONTHS</td><td align="center">:</td><td> <?php echo $deskripsi?></td>
    </tr>
  </table>
</form>

<form id="form2" name="form2" method="post" action="">
  <table width="98%" border="1" cellpadding="5" bordercolor="black">
  	<tr>
        	<td colspan="2" align="center" valign="middle" rowspan="2">SUBJECT</td>
            <td width="75" rowspan="2" align="center" valign="middle">SCORE</td>
            <td width="74" rowspan="2" align="center" valign="middle">GRADE</td>
            <td height="28" colspan="2" align="center" valign="middle">ATTENDANCE</td>
            <td width="373" rowspan="2" align="center" valign="middle">TEACHER'S COMMENT</td>
    </tr>
        <tr>
        	<td width="93" height="31" align="center" valign="middle">PRESENCE</td>
            <td width="97" align="center" valign="middle">ABSENCE</td>
        </tr>
    </tr>
    
    <tr>
      <td colspan="2">Listening Comprehension</td>
      <td align="center"><?php echo $ls_score; ?></td>
      <td align="center">
      	<?php
        	if ($ls_score>85){echo"A";}
			else if ($ls_score<=85 && $ls_score>70){echo"B";}
			else if ($ls_score<=70 && $ls_score>55){echo"C";}
			else if ($ls_score<=55 && $ls_score>40){echo"D";}
			else if ($ls_score<=40 && $ls_score>25){echo"E";}
			else if ($ls_Score<=25){echo"F";}
		?>
      </td>
      <td align="center"><?php echo $jh;?></td>
      <td align="center"><?php echo $ja;?></td>
      <td rowspan="5" align="justify" valign="top">
      	<?php echo $catatan;?>
      </td>
    </tr>
    <tr>
      <td colspan="2">Structures and Usage</td>
      <td align="center"><?php echo $su_score; ?></td>
      <td align="center">
      	<?php
        	if ($su_score>85){echo"A";}
			else if ($su_score<=85 && $su_score>70){echo"B";}
			else if ($su_score<=70 && $su_score>55){echo"C";}
			else if ($su_score<=55 && $su_score>40){echo"D";}
			else if ($su_score<=40 && $su_score>25){echo"E";}
			else if ($su_Score<=25){echo"F";}
		?>
      </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">Reading and Vocabulary</td>
      <td align="center"><?php echo $rv_score; ?></td>
      <td align="center">
      	<?php
        	if ($rv_score>85){echo"A";}
			else if ($rv_score<=85 && $rv_score>70){echo"B";}
			else if ($rv_score<=70 && $rv_score>55){echo"C";}
			else if ($rv_score<=55 && $rv_score>40){echo"D";}
			else if ($rv_score<=40 && $rv_score>25){echo"E";}
			else if ($rv_Score<=25){echo"F";}
		?>
      </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">Composition</td>
      <td align="center"><?php echo $comp_score; ?></td>
      <td align="center">
      	<?php
        	if ($comp_score>85){echo"A";}
			else if ($comp_score<=85 && $comp_score>70){echo"B";}
			else if ($comp_score<=70 && $comp_score>55){echo"C";}
			else if ($comp_score<=55 && $comp_score>40){echo"D";}
			else if ($comp_score<=40 && $comp_score>25){echo"E";}
			else if ($comp_Score<=25){echo"F";}
		?>
      </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2">Speaking</td>
      <td align="center"><?php echo $speak_score; ?></td>
      <td align="center">
      	<?php
        	if ($speak_score>85){echo"A";}
			else if ($speak_score<=85 && $speak_score>70){echo"B";}
			else if ($speak_score<=70 && $speak_score>55){echo"C";}
			else if ($speak_score<=55 && $speak_score>40){echo"D";}
			else if ($speak_score<=40 && $speak_score>25){echo"E";}
			else if ($speak_Score<=25){echo"F";}
		?>
      </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" align="center"><p><strong>AVERAGE</strong></p></td>
      <td align="center"> <?php echo $average;?></td>
      <td align="center"> 
      	<?php
        	if ($average>85){echo"A";}
			else if ($average<=85 && $average>70){echo"B";}
			else if ($average<=70 && $average>55){echo"C";}
			else if ($average<=55 && $average>40){echo"D";}
			else if ($average<=40 && $average>25){echo"E";}
			else if ($average<=25){echo"F";}
		?>
      </td>
      <td colspan="3">&nbsp;</td>
    </tr>
    </table>
</form>

<form id="form3" name="form3" method="post" action="">
  <table width="98%" border="0">	
    <tr>
      <td Width="20%" align="center"><strong>A : 86-100</strong></td>
      <td width="20%" align="center"><strong>B : 71-85</strong></td>
      <td width="20%" align="center"><strong>C : 56-70</strong></td>
      <td width="20%" align="center"><strong>D : 41-55</strong></td>
      <td width="20%" align="center"><strong>E : 26-40</strong></td>
    </tr>
    <tr>
    
    </tr>
    <tr>
    	<td height="46"></td>
        <td height="46"></td>
        <td height="46"></td>
        <td height="46"></td>
        <td height="46"></td>
    </tr>
    <tr>
    	<td height="9"><hr></td>
        <td height="9"></td>
        <td height="9"></td>
        <td height="9"></td>
        <td height="9"><hr></td>
    </tr>
    <tr>
    	<td height="41" align="center"><strong>(<?php echo $nama_pengajar;?>)<br>Instructor</strong></td>
        <td height="41"></td>
        <td height="41"></td>
      <td height="41"></td>
        <td height="41" align="center"><strong>(<?php echo $nama_admin;?>)<br>Administrator</strong></td>
    </tr>
  </table>
</form>
</body>
</html>



<?php function RP($rupiah){return number_format($rupiah,"2",",",".");}?>
<?php
function WKT($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,0,4);

$judul_bln=array(1=> "Januari", "Februari", "Maret", "April", "Mei","Juni", "Juli", "Agustus", "September","Oktober", "November", "Desember");
$wk=$tanggal." ".$judul_bln[(int)$bulan]." ".$tahun;
return $wk;
}
?>
<?php
function WKTP($sekarang){
$tanggal = substr($sekarang,8,2)+0;
$bulan = substr($sekarang,5,2);
$tahun = substr($sekarang,2,2);

$judul_bln=array(1=> "Jan", "Feb", "Mar", "Apr", "Mei","Jun", "Jul", "Agu", "Sep","Okt", "Nov", "Des");
$wk=$tanggal." ".$judul_bln[(int)$bulan]."'".$tahun;
return $wk;
}
?>
<?php
function BAL($tanggal){
	$arr=split(" ",$tanggal);
	if($arr[1]=="Januari" || $arr[1]=="January"){$bul="01";}
	else if($arr[1]=="Februari" || $arr[1]=="February"){$bul="02";}
	else if($arr[1]=="Maret" || $arr[1]=="March"){$bul="03";}
	else if($arr[1]=="April" || $arr[1]=="April"){$bul="04";}
	else if($arr[1]=="Mei"  || $arr[1]=="May"){$bul="05";}
	else if($arr[1]=="Juni"  || $arr[1]=="June"){$bul="06";}
	else if($arr[1]=="Juli"  || $arr[1]=="July"){$bul="07";}
	else if($arr[1]=="Agustus"  || $arr[1]=="August"){$bul="08";}
	else if($arr[1]=="September"  || $arr[1]=="September"){$bul="09";}
	else if($arr[1]=="Oktober"  || $arr[1]=="October"){$bul="10";}
	else if($arr[1]=="November"  || $arr[1]=="November"){$bul="11";}
	else if($arr[1]=="Nopember"  || $arr[1]=="November"){$bul="11";}
	else if($arr[1]=="Desember"  || $arr[1]=="December"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
}
?>

<?php
function BALP($tanggal){
	$arr=split(" ",$tanggal);
	if($arr[1]=="Jan"){$bul="01";}
	else if($arr[1]=="Feb"){$bul="02";}
	else if($arr[1]=="Mar"){$bul="03";}
	else if($arr[1]=="Apr"){$bul="04";}
	else if($arr[1]=="Mei"){$bul="05";}
	else if($arr[1]=="Jun"){$bul="06";}
	else if($arr[1]=="Jul"){$bul="07";}
	else if($arr[1]=="Agu"){$bul="08";}
	else if($arr[1]=="Sep"){$bul="09";}
	else if($arr[1]=="Okt"){$bul="10";}
	else if($arr[1]=="Nov"){$bul="11";}
	else if($arr[1]=="Nop"){$bul="11";}
	else if($arr[1]=="Des"){$bul="12";}
return "$arr[2]-$bul-$arr[0]";	
}
?>
<?php
function process($conn,$sql){
$s=false;
$conn->autocommit(FALSE);
try {
  $rs = $conn->query($sql);
  if($rs){
	    $conn->commit();
	    $last_inserted_id = $conn->insert_id;
 		$affected_rows = $conn->affected_rows;
  		$s=true;
  }
} 
catch (Exception $e) {
	echo 'fail: ' . $e->getMessage();
  	$conn->rollback();
}
$conn->autocommit(TRUE);
return $s;
}

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

