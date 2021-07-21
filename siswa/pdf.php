<?php
require_once"../koneksivar.php";

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}

/*+++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++*/


define('FPDF_FONTPATH', '../ypathcss/bantuan/fpdf/font/');
require('../ypathcss/bantuan/fpdf/fpdf.php');

class PDF extends FPDF{
  function Header(){
    $this->SetTextColor(128,0,0);
    $this->SetFont('Arial','B','12');//	$this->SetFont('Times','',12);
    $this->Cell(20,0,'Data siswa',0,0,'L');
    $this->Ln();
    $this->Cell(5,1,'Laporan data siswa',0,0,'L');
    $this->Ln();
	

	
  }
  
  function Footer(){
	$this->SetY(-4,5);
    $this->SetY(-2,5);
    $this->Cell(0,1,$this->PageNo(),0,0,'C');
	
  }
} 

$sql = "select * from `$tbsiswa`";
$jml =  getJum($conn,$sql);

$i=0;
$arr=getData($conn,$sql);
		foreach($arr as $d) {	
  $cell[$i][0]=$d["id_siswa"];
  $cell[$i][1]=$d["nama_siswa"];
  $cell[$i][2]=$d["jenis_kelamin"];
  $cell[$i][3]=$d["tempat_lahir"];
  $cell[$i][4]=$d["tanggal_lahir"];
  $cell[$i][5]=$d["alamat"];
  $cell[$i][6]=$d["agama"];
  $cell[$i][7]=$d["username"];
  $cell[$i][8]=$d["password"];
  $cell[$i][9]=$d["email"];
  $cell[$i][10]=$d["no_telepon"];
  $cell[$i][11]=$d["status"];
  $cell[$i][12]=$d["keterangan"];
  $i++;
}
				
				
$pdf=new PDF('L','cm','A4');
//$pdf=new PDF("P","in","Letter");
$pdf->Open();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','B','9');
$pdf->SetFillColor(192,192,192);
$pdf->Cell(1,1,'no','LR',0,'L',1);
$pdf->Cell(2,1,'id_siswa','LR',0,'C',1);
$pdf->Cell(7,1,'nama_siswa','LR',0,'C',1);
$pdf->Cell(5,1,'jenis_kelamin','LR',0,'C',1);
$pdf->Cell(5,1,'tempat_lahir','LR',0,'C',1);
$pdf->Cell(5,1,'tanggal_lahir','LR',0,'C',1);
$pdf->Cell(3,1,'alamat','LR',0,'C',1);
$pdf->Cell(3,1,'agama','LR',0,'C',1);
$pdf->Cell(3,1,'username','LR',0,'C',1);
$pdf->Cell(3,1,'password','LR',0,'C',1);
$pdf->Cell(3,1,'email','LR',0,'C',1);
$pdf->Cell(3,1,'no_telepon','LR',0,'C',1);
$pdf->Cell(3,1,'status','LR',0,'C',1);
$pdf->Cell(3,1,'keterangan','LR',0,'C',1);
$pdf->Ln();
$pdf->SetFont('Arial','','8');

for ($j=0;$j<$i;$j++){
  $pdf->Cell(1,1,$j+1,'B',0,'L');         // no
  $pdf->Cell(2,1,$cell[$j][0],'B',0,'L'); // id_siswa
  $pdf->Cell(7,1,$cell[$j][1],'B',0,'L'); // nama_siswa
  $pdf->Cell(5,1,$cell[$j][2],'B',0,'L'); // jenis_kelamin
  $pdf->Cell(5,1,$cell[$j][3],'B',0,'L'); // tempat_lahir
  $pdf->Cell(5,1,$cell[$j][4],'B',0,'L'); // tanggal_lahir
  $pdf->Cell(3,1,$cell[$j][5],'B',0,'L'); // alamat
  $pdf->Cell(3,1,$cell[$j][6],'B',0,'L'); // agama
  $pdf->Cell(3,1,$cell[$j][7],'B',0,'L'); // username
  $pdf->Cell(3,1,$cell[$j][8],'B',0,'L'); // password
  $pdf->Cell(3,1,$cell[$j][9],'B',0,'L'); // email
  $pdf->Cell(3,1,$cell[$j][10],'B',0,'L'); // no_telepon
  $pdf->Cell(3,1,$cell[$j][11],'B',0,'L'); // status
  $pdf->Cell(3,1,$cell[$j][12],'B',0,'L'); // keterangan
  $pdf->Ln();
}
$pdf->Output();

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
