<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbpengajar`";
if(getJum($conn,$sql)>0){
	print "<pengajar>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$id_pengajar=$d["id_pengajar"];
				$nama_pengajar=$d["nama_pengajar"];
				$jenis_kelamin=$d["jenis_kelamin"];
				$tempat_lahir=$d["tempat_lahir"];
				$tanggal_lahir=$d["tanggal_lahir"];
				$alamat=$d["alamat"];
				$gambar=$d["gambar"];
												
				print "<record>\n";
				print "  <nama_pengajar>$nama_pengajar</nama_pengajar>\n";
				print "  <jenis_kelamin>$jenis_kelamin</jenis_kelamin>\n";
				print "  <tempat_lahir>$tempat_lahir</tempat_lahir>\n";
				print "  <tanggal_lahir>$tanggal_lahir</tanggal_lahir>\n";
				print "  <alamat>$alamat</alamat>\n";
				print "  <gambar>$gambar</gambar>\n";
				print "  <id_pengajar>$id_pengajar</id_pengajar>\n";
				print "</record>\n";
			}
	print "</pengajar>\n";
}
else{
	$null="null";
	print "<pengajar>\n";
				print "<record>\n";
				print "  <nama_pengajar>$null</nama_pengajar>\n";
				print "  <jenis_kelamin>$null</jenis_kelamin>\n";
				print "  <tempat_lahir>$null</tempat_lahir>\n";				
				print "  <tanggal_lahir>$null</tanggal_lahir>\n";
				print "  <alamat>$null</alamat>\n";				
				print "  <gambar>$null</gambar>\n";
				print "  <id_pengajar>$null</id_pengajar>\n";
				print "</record>\n";
	print "</pengajar>\n";

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
	