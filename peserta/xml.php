<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbpeserta`";
if(getJum($conn,$sql)>0){
	print "<peserta>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$id_peserta=$d["id_peserta"];
				$id_kelas=$d["id_kelas"];
				$id_siswa=$d["id_siswa"];
			    $catatan=$d["catatan"];
												
				print "<record>\n";
				print "  <id_kelas>$id_kelas</id_kelas>\n";
				print "  <id_siswa>$id_siswa</id_siswa>\n";
				print "  <catatan>$catatan</catatan>\n";
				print "  <id_peserta>$id_peserta</id_peserta>\n";
				print "</record>\n";
			}
	print "</peserta>\n";
}
else{
	$null="null";
	print "<peserta>\n";
		print "<record>\n";
				print "  <id_kelas>$null</id_kelas>\n";
				print "  <id_siswa>$null</id_siswa>\n";
				print "  <catatan>$null</catatan>\n";
				print "  <id_peserta>$null</id_peserta>\n";
		print "</record>\n";
	print "</peserta>\n";
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
	