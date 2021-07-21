<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbruangan`";
if(getJum($conn,$sql)>0){
	print "<periode>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$id_ruangan=$d["id_ruangan"];
				$nama_ruangan=$d["nama_ruangan"];
				$telepon=$d["telepon"];
			    $keterangan=$d["keterangan"];
				$status=$d["status"];
												
				print "<record>\n";
				print "  <nama_ruangan>$nama_ruangan</nama_ruangan>\n";
				print "  <keterangan>$keterangan</keterangan>\n";
				print "  <status>$status</status>\n";
				print "  <id_ruangan>$id_ruangan</id_ruangan>\n";
				print "</record>\n";
			}
	print "</periode>\n";
}
else{
	$null="null";
	print "<periode>\n";
		print "<record>\n";
				print "  <nama_ruangan>$null</nama_ruangan>\n";
				print "  <keterangan>$null</keterangan>\n";
				print "  <status>$null</status>\n";
				print "  <id_ruangan>$null</id_ruangan>\n";
		print "</record>\n";
	print "</periode>\n";
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
	