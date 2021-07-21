<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbabsensidetail`";
if(getJum($conn,$sql)>0){
	print "<absensi_detail>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$id=$d["id"];
				$id_absensi=$d["id_absensi"];
				$id_siswa=$d["id_siswa"];
				$email=$d["email"];
			    $catatan=$d["catatan"];
				$status=$d["status"];
												
				print "<record>\n";
				print "  <id_absensi>$id_absensi</id_absensi>\n";
				print "  <id_siswa>$id_siswa</id_siswa>\n";
				print "  <email>$email</email>\n";
				print "  <catatan>$catatan</catatan>\n";
				print "  <status>$status</status>\n";
				print "  <id>$id</id>\n";
				print "</record>\n";
			}
	print "</absensi_detail>\n";
}
else{
	$null="null";
	print "<absensi_detail>\n";
		print "<record>\n";
				print "  <id_absensi>$null</id_absensi>\n";
				print "  <id_siswa>$null</id_siswa>\n";
				print "  <email>$null</email>\n";
				print "  <catatan>$null</catatan>\n";
				print "  <status>$null</status>\n";
				print "  <id>$null</id>\n";
		print "</record>\n";
	print "</absensi_detail>\n";
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
	