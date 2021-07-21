<?php
$pro="simpan";
$tanggal=WKT(date("Y-m-d"));
?>
<link type="text/css" href="<?php echo "$PATH/base/";?>ui.all.css" rel="stylesheet" />   
<script type="text/javascript" src="<?php echo "$PATH/";?>jquery-1.3.2.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.core.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/ui.datepicker.js"></script>
<script type="text/javascript" src="<?php echo "$PATH/";?>ui/i18n/ui.datepicker-id.js"></script>
    
  <script type="text/javascript"> 
      $(document).ready(function(){
        $("#tanggal").datepicker({
					dateFormat  : "dd MM yy",        
          changeMonth : true,
          changeYear  : true					
        });
      });
    </script>    

<script type="text/javascript"> 
function PRINT(){ 
win=window.open('peserta/print.php','win','width=1000, height=400, menubar=0, scrollbars=1, resizable=0, location=0, toolbar=0, status=0'); } 
</script>
<script language="JavaScript">
function buka(url) {window.open(url, 'window_baru', 'width=800,height=600,left=320,top=100,resizable=1,scrollbars=1');}
</script>

<style>
#mytable {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#mytable td, #mytable th {
  border: 0px;
  padding: 4px;
}

#mytable th {
  padding-top: 6px;
  padding-bottom: 6px;
}

#myhr {
	border: 1px solid black;
	border-radius: 5px;
}
</style>

<!-- Disini -->
  <link rel="stylesheet" href="js/jquery-ui.css">
  <link rel="stylesheet" href="resources/demos/style.css">
  <script src="js/jquery-1.12.4.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script>
  $( function() {
    $( "#accordion" ).accordion({
      collapsible: false
    });
  } );
  </script>
<!-- Disini -->
<div id="accordion">  
<?php  
$id_siswa=$_SESSION["cid"];
  $sqlq="SELECT DISTINCT(status) FROM  `$tbpeserta`, `$tbkelas` WHERE tb_peserta.id_kelas=tb_kelas.id_kelas AND id_siswa ='$id_siswa' ORDER BY tb_peserta.id_kelas DESC";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>Maaf data belum tersedia...</h1>";
			}								
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$status=$dq["status"];
?>    
<h4>List of <?php echo $status?> Class Joined</h4>
<div>
<!-- Disini -->
<table width="100%" border="0" class="table table-striped table-bordered table-hover">
  <tr bgcolor="#036">
    <th width="8%"><center>No.</center></th>
    <th width="41%"><center>Class</center></th>
    <th width="41%"><center>Details</center></th>
    <th width="10%"><center>Option</center></th>
  </tr>
<?php  
$no=1;
  $sql="SELECT * FROM  `$tbpeserta`, `$tbkelas` WHERE tb_peserta.id_kelas=tb_kelas.id_kelas AND id_siswa ='$id_siswa' ORDER BY tb_peserta.id_kelas DESC";
  $jum=getJum($conn,$sql);
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {							
			$id_peserta=$d["id_peserta"];
			$id_kelas=$d["id_kelas"];
			$pengajar=getPengajar($conn,$d["id_pengajar"]);
			$jk=getMrMs($conn,$d["id_pengajar"]);
				if ($jk=='L') {$cal='Mr.';}
				else{$cal='Ms';}
			$program=getProgram($conn,$d["id_program"]);
			$level=getLevel($conn,$d["id_program"]);
			$hari=getSesiHari($conn,$d["id_sesi"]);
			$waktu=getSesiWaktu($conn,$d["id_sesi"]);
			$ruangan=getRuangan($conn,$d["id_ruangan"]);
			$periode=getPeriode($conn,$d["id_periode"]);
			$term=$d["term"];	
				
				$color="#dddddd";	
				if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td align='center' valign='top'>$no.</td>
				<td valign='top'>
					<b>$program | $level</b><br>
					Teacher : $cal $pengajar
				</td>
				<td valign='top'>
					<b>$hari ($waktu)</b><br>
					Term: $term, $periode 
				</td>
				<td align='center'>
<a href='?mnu=shistori&id1=$id_kelas&id2=$id_peserta'><img src='ypathicon/11.png' title='Lihat Nilai & Kehadiran'></a>
				</tr>";
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data peserta belum tersedia...</blink></td></tr>";}
?>
</table>

</div>
<?php }?>
</div>
<!-- Disini -->

