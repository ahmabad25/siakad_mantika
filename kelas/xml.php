<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbkelas`";
if(getJum($conn,$sql)>0){
	print "<kelas>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$id_kelas=$d["id_kelas"];
				$id_program=$d["id_program"];
				$id_pengajar=$d["id_pengajar"];
				$id_periode=$d["id_periode"];
			    $nama_kelas=$d["nama_kelas"];
				$keterangan=$d["keterangan"];
												
				print "<record>\n";
				print "  <id_program>$id_program</id_program>\n";
				print "  <id_pengajar>$id_pengajar</id_pengajar>\n";
				print "  <id_periode>$id_periode</id_periode>\n";
				print "  <nama_kelas>$nama_kelas</nama_kelas>\n";
				print "  <keterangan>$keterangan</keterangan>\n";
				print "  <id_kelas>$id_kelas</id_kelas>\n";
				print "</record>\n";
			}
	print "</kelas>\n";
}
else{
	$null="null";
	print "<kelas>\n";
		print "<record>\n";
				print "  <id_program>$null</id_program>\n";
				print "  <id_pengajar>$null</id_pengajar>\n";
				print "  <id_periode>$null</id_periode>\n";
				print "  <nama_kelas>$null</nama_kelas>\n";
				print "  <keterangan>$null</keterangan>\n";
				print "  <id_kelas>$null</id_kelas>\n";
		print "</record>\n";
	print "</kelas>\n";
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
	