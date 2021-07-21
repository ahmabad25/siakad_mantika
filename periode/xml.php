<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbperiode`";
if(getJum($conn,$sql)>0){
	print "<periode>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$id_periode=$d["id_periode"];
				$nama_periode=$d["nama_periode"];
				$telepon=$d["telepon"];
				$deskripsi=$d["deskripsi"];
			    $keterangan=$d["keterangan"];
				$status=$d["status"];
												
				print "<record>\n";
				print "  <nama_periode>$nama_periode</nama_periode>\n";
				print "  <telepon>$telepon</telepon>\n";
				print "  <deskripsi>$deskripsi</deskripsi>\n";
				print "  <keterangan>$keterangan</keterangan>\n";
				print "  <status>$status</status>\n";
				print "  <id_periode>$id_periode</id_periode>\n";
				print "</record>\n";
			}
	print "</periode>\n";
}
else{
	$null="null";
	print "<periode>\n";
		print "<record>\n";
				print "  <nama_periode>$null</nama_periode>\n";
				print "  <telepon>$null</telepon>\n";
				print "  <deskripsi>$null</deskripsi>\n";
				print "  <keterangan>$null</keterangan>\n";
				print "  <status>$null</status>\n";
				print "  <id_periode>$null</id_periode>\n";
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
	