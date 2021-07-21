<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbadmin`";
if(getJum($conn,$sql)>0){
	print "<admin>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$id_admin=$d["id_admin"];
				$nama_admin=$d["nama_admin"];
				$jenis_kelamin=$d["jenis_kelamin"];
				$tempat_lahir=$d["tempat_lahir"];
				$tanggal_lahir=$d["tanggal_lahir"];
				$alamat=$d["alamat"];
				$gambar=$d["gambar"];
												
				print "<record>\n";
				print "  <nama_admin>$nama_admin</nama_admin>\n";
				print "  <jenis_kelamin>$jenis_kelamin</jenis_kelamin>\n";
				print "  <tempat_lahir>$tempat_lahir</tempat_lahir>\n";
				print "  <tanggal_lahir>$tanggal_lahir</tanggal_lahir>\n";
				print "  <alamat>$alamat</alamat>\n";
				print "  <gambar>$gambar</gambar>\n";
				print "  <id_admin>$id_admin</id_admin>\n";
				print "</record>\n";
			}
	print "</admin>\n";
}
else{
	$null="null";
	print "<admin>\n";
				print "<record>\n";
				print "  <nama_admin>$null</nama_admin>\n";
				print "  <jenis_kelamin>$null</jenis_kelamin>\n";
				print "  <tempat_lahir>$null</tempat_lahir>\n";				
				print "  <tanggal_lahir>$null</tanggal_lahir>\n";
				print "  <alamat>$null</alamat>\n";				
				print "  <gambar>$null</gambar>\n";
				print "  <id_admin>$null</id_admin>\n";
				print "</record>\n";
	print "</admin>\n";

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
	