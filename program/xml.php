<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbprogram`";
if(getJum($conn,$sql)>0){
	print "<program>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$id_program=$d["id_program"];
				$nama_program=$d["nama_program"];
				$level=$d["level"];
				$uraian=$d["uraian"];
			    $keterangan=$d["keterangan"];
				$silabus=$d["silabus"];
				$biaya=$d["biaya"];
												
				print "<record>\n";
				print "  <nama_program>$nama_program</nama_program>\n";
				print "  <level>$level</level>\n";
				print "  <uraian>$uraian</uraian>\n";
				print "  <keterangan>$keterangan</keterangan>\n";
				print "  <silabus>$silabus</silabus>\n";
				print "  <biaya>$biaya</biaya>\n";
				print "  <id_program>$id_program</id_program>\n";
				print "</record>\n";
			}
	print "</program>\n";
}
else{
	$null="null";
	print "<program>\n";
		print "<record>\n";
				print "  <nama_program>$null</nama_program>\n";
				print "  <level>$null</level>\n";
				print "  <uraian>$null</uraian>\n";
				print "  <keterangan>$null</keterangan>\n";
				print "  <silabus>$null</silabus>\n";
				print "  <biaya>$null</biaya>\n";
				print "  <id_program>$null</id_program>\n";
		print "</record>\n";
	print "</program>\n";
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
	