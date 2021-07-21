<?php

require_once"konmysqli.php";
$q=$_GET["q"];
?>

	<?php
	  	$s="select * from `tb_kelas` where id_kelas='$q'";
		$q=getField($conn,$s);
				$id_pengajar0=$q["id_pengajar"];

						$nama=getPengajar($conn,$id_pengajar0);
						
				
		echo"<b>$nama- $id_pengajar0</b>";
		
	?>


<?php

function getPengajar($conn,$kode){
$field="nama_pengajar";
$sql="SELECT `$field` FROM `tb_pengajar` where `id_pengajar`='$kode'";
$rs=$conn->query($sql);	
	$rs->data_seek(0);
	$row = $rs->fetch_assoc();
	$rs->free();
    return $row[$field];
	}
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