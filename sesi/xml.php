<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbsesi`";
if(getJum($conn,$sql)>0){
	print "<sesi>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$id_sesi=$d["id_sesi"];
				$hari=$d["hari"];
				$waktu=$d["waktu"];
				$status=$d["status"];
			    $keterangan=$d["keterangan"];
												
				print "<record>\n";
				print "  <hari>$hari</hari>\n";
				print "  <waktu>$waktu</waktu>\n";
				print "  <status>$status</status>\n";
				print "  <keterangan>$keterangan</keterangan>\n";
				print "  <id_sesi>$id_sesi</id_sesi>\n";
				print "</record>\n";
			}
	print "</sesi>\n";
}
else{
	$null="null";
	print "<sesi>\n";
		print "<record>\n";
				print "  <hari>$null</hari>\n";
				print "  <waktu>$null</waktu>\n";
				print "  <status>$null</status>\n";
				print "  <keterangan>$null</keterangan>\n";
				print "  <id_sesi>$null</id_sesi>\n";
		print "</record>\n";
	print "</sesi>\n";
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
	