<?php
require_once"../koneksivar.php";

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}


 	$buffer = ""; 
    $separator = ","; //, atau ;
    $newline = "\r\n"; 
    		    
    $buffer = "id_pengajar".$separator ."nama_pengajar".$separator ."jenis_kelamin".$separator ."tempat_lahir".$separator ."tanggal_lahir".$separator ."alamat".$separator ."agama".$separator ."username".$separator ."password".$separator ."email".$separator ."no_telepon".$separator ."status".$separator ."keterangan".$separator ."gambar".$separator; 
    $buffer .= $newline; 
    
  $sql="select `id_pengajar`,`nama_pengajar`,`jenis_kelamin`,`tempat_lahir`,`tanggal_lahir`,`alamat`,`alamat`,`alamat`,`alamat`,`alamat`,`alamat`,`alamat`,`alamat`,`alamat`,`alamat`,`gambar` from `$tbpengajar` order by `id_pengajar` desc";
  $jum=getJum($conn,$sql);	
  if($jum>0){						
	  $arr=getData($conn,$sql);
	  foreach($arr as $d) {		 
					$value=$d["id_pengajar"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["nama_pengajar"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["jenis_kelamin"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["tempat_lahir"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["tanggal_lahir"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["alamat"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["gambar"];$buffer .= "\"".$value."\"".$separator; 
				$buffer .= $newline; 
		}	
  }
  else{
    $buffer .= $newline; 
	  }
    header("Content-type: application/vnd.ms-excel"); 
    header("Content-Length: ".strlen($buffer)); 
    header("Content-Disposition: attachment; filename=report.csv"); 
    header("Expires: 0"); 
    header("Cache-Control: must-revalidate, post-check=0,pre-check=0"); 
    header("Pragma: public"); 

    print $buffer;
	
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