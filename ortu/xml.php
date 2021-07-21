<?php
header("Content-type: text/xml");

include "../konmysqli.php";
$sql = "select * from `$tbsiswa`";
if(getJum($conn,$sql)>0){
	print "<siswa>\n";
		$arr=getData($conn,$sql);
		foreach($arr as $d) {		
				$id_siswa=$d["id_siswa"];
				$nama_siswa=$d["nama_siswa"];
				$jenis_kelamin=$d["jenis_kelamin"];
				$tempat_lahir=$d["tempat_lahir"];
				$tanggal_lahir=$d["tanggal_lahir"];
				$alamat=$d["alamat"];
				$gambar=$d["gambar"];
												
				print "<record>\n";
				print "  <nama_siswa>$nama_siswa</nama_siswa>\n";
				print "  <jenis_kelamin>$jenis_kelamin</jenis_kelamin>\n";
				print "  <tempat_lahir>$tempat_lahir</tempat_lahir>\n";
				print "  <tanggal_lahir>$tanggal_lahir</tanggal_lahir>\n";
				print "  <alamat>$alamat</alamat>\n";
				print "  <gambar>$gambar</gambar>\n";
				print "  <id_siswa>$id_siswa</id_siswa>\n";
				print "</record>\n";
			}
	print "</siswa>\n";
}
else{
	$null="null";
	print "<siswa>\n";
				print "<record>\n";
				print "  <nama_siswa>$null</nama_siswa>\n";
				print "  <jenis_kelamin>$null</jenis_kelamin>\n";
				print "  <tempat_lahir>$null</tempat_lahir>\n";				
				print "  <tanggal_lahir>$null</tanggal_lahir>\n";
				print "  <alamat>$null</alamat>\n";				
				print "  <gambar>$null</gambar>\n";
				print "  <id_siswa>$null</id_siswa>\n";
				print "</record>\n";
	print "</siswa>\n";

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
	