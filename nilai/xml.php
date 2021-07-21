<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbnilai`";
if(getJum($conn,$sql)>0){
	print "<nilai>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$id_nilai=$d["id_nilai"];
				$id_periode=$d["id_periode"];
				$id_kelas=$d["id_kelas"];
				$id_peserta=$d["id_peserta"];
				$ls_score=$d["ls_score"];
				$su_score=$d["su_score"];
				$rv_score=$d["rv_score"];
				$comp_score=$d["comp_score"];
				$speak_score=$d["speak_score"];
			    $catatan=$d["catatan"];
												
				print "<record>\n";
				print "  <id_periode>$id_periode</id_periode>\n";
				print "  <id_kelas>$id_kelas</id_kelas>\n";
				print "  <id_peserta>$id_peserta</id_peserta>\n";
				print "  <ls_score>$ls_score</ls_score>\n";
				print "  <su_score>$ls_score</su_score>\n";
				print "  <rv_score>$ls_score</rv_score>\n";
				print "  <comp_score>$ls_score</comp_score>\n";
				print "  <speak_score>$ls_score</speak_score>\n";
				print "  <catatan>$catatan</catatan>\n";
				print "  <id_nilai>$id_nilai</id_nilai>\n";
				print "</record>\n";
			}
	print "</nilai>\n";
}
else{
	$null="null";
	print "<nilai>\n";
		print "<record>\n";
				print "  <id_periode>$null</id_periode>\n";
				print "  <id_kelas>$null</id_kelas>\n";
				print "  <id_peserta>$null</id_peserta>\n";
				print "  <ls_score>$ls_score</ls_score>\n";
				print "  <su_score>$ls_score</su_score>\n";
				print "  <rv_score>$ls_score</rv_score>\n";
				print "  <comp_score>$ls_score</comp_score>\n";
				print "  <speak_score>$ls_score</speak_score>\n";
				print "  <catatan>$null</catatan>\n";
				print "  <id_nilai>$null</id_nilai>\n";
		print "</record>\n";
	print "</nilai>\n";
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
	