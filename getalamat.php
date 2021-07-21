<?php

require_once"konmysqli.php";
$q=$_GET["q"];
?>

<?php
	$s="select * from `$tbsiswa` where id_siswa='$q'";
	$d=getField($conn,$s);
		$alamat=$d["alamat"];
		$no_telepon=$d["no_telepon"];
		$email=$d["email"];
;?>

<textarea name="alamat" cols="30" rows="3" id="alamat"><?php echo $alamat;?></textarea>

<?php
function getField($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$d= $rs->fetch_assoc();
	$rs->free();
	return $d;
}

function getData($conn,$sql){
	$rs=$conn->query($sql);
	$rs->data_seek(0);
	$arr = $rs->fetch_all(MYSQLI_ASSOC);
	//foreach($arr as $row) {
	//  echo $row['nama_kelas'] . '*<br>';
	//}
	
	$rs->free();
	return $arr;
}

?>