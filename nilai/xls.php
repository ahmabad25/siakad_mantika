<?php
require_once"../koneksivar.php";

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}

 	$buffer = ""; 
    $separator = ","; //, atau ;
    $newline = "\r\n"; 
    		    
    $buffer = "id_nilai".$separator ."id_periode".$separator ."id_kelas".$separator ."id_peserta".$separator ."ls_score".$separator ."su_score".$separator ."rv_score".$separator ."comp_score".$separator ."speak_score".$separator ."catatan".$separator; 
    $buffer .= $newline; 
    
  $sql="select `id_nilai`,`id_periode`,`id_kelas`,`id_peserta`, `ls_score`, `su_score`, `rv_score`, `comp_score`, `speak_score`, `catatan` from `$tbnilai` order by `id_nilai` desc";
  $jum=getJum($conn,$sql);	
  if($jum>0){						
	  $arr=getData($conn,$sql);
	  foreach($arr as $d) {		 
					$value=$d["id_nilai"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["id_periode"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["id_kelas"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["id_peserta"];$buffer .= "\"".$value."\"".$separator; 
					$value=$d["ls_score"];$buffer .= "\"".$value."\"".$separator;
		  			$value=$d["su_score"];$buffer .= "\"".$value."\"".$separator; 
		  			$value=$d["rv_score"];$buffer .= "\"".$value."\"".$separator; 
		  			$value=$d["comp_score"];$buffer .= "\"".$value."\"".$separator; 
		  			$value=$d["speak_score"];$buffer .= "\"".$value."\"".$separator; 
		  			$value=$d["catatan"];$buffer .= "\"".$value."\"".$separator; 
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