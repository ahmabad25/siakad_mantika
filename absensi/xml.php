<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbabsensi`";
if(getJum($conn,$sql)>0){
	print "<absensi>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$id_absensi=$d["id_absensi"];
				$tanggal=$d["tanggal"];
				$jam=$d["jam"];
				$id_kelas=$d["id_kelas"];
			    $id_pengajar=$d["id_pengajar"];
				$id_periode=$d["id_periode"];
												
				print "<record>\n";
				print "  <tanggal>$tanggal</tanggal>\n";
				print "  <jam>$jam</jam>\n";
				print "  <id_kelas>$id_kelas</id_kelas>\n";
				print "  <id_pengajar>$id_pengajar</id_pengajar>\n";
				print "  <id_periode>$id_periode</id_periode>\n";
				print "  <id_absensi>$id_absensi</id_absensi>\n";
				print "</record>\n";
			}
	print "</absensi>\n";
}
else{
	$null="null";
	print "<absensi>\n";
		print "<record>\n";
				print "  <tanggal>$null</tanggal>\n";
				print "  <jam>$null</jam>\n";
				print "  <id_kelas>$null</id_kelas>\n";
				print "  <id_pengajar>$null</id_pengajar>\n";
				print "  <id_periode>$null</id_periode>\n";
				print "  <id_absensi>$null</id_absensi>\n";
		print "</record>\n";
	print "</absensi>\n";
	}
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
	