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
  border: 1px solid #393;
  padding: 4px;
}

#mytable tr:nth-child(even){background-color: #f2f2f2;}

#mytable tr:hover {background-color: #ddd;}

#mytable th {
  padding-top: 6px;
  padding-bottom: 6px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
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
      collapsible: true
    });
  } );
  </script>
<!-- Disini -->

<!-- Disini -->

<div id="accordion"> 
 
<?php  
$id_siswa=$_SESSION["cid"];
  $sqlq="select * from `$tbpeserta` where id_siswa ='$id_siswa' order by `id_kelas` desc";
  $jumq=getJum($conn,$sqlq);
		if($jumq <1){
			echo"<h1>Maaf data belum tersedia...</h1>";
			}								
	$arrq=getData($conn,$sqlq);
		foreach($arrq as $dq) {							
				$id_peserta=$dq["id_peserta"];
				$id_kelas=$dq["id_kelas"];
				$id_siswa=$dq["id_siswa"];
				$catatan=$dq["catatan"];
				
				
				$sqlv="select * from `$tbkelas` where `id_kelas`='$id_kelas'";
	$dv=getField($conn,$sqlv);
				$id_program=getProgram($conn,$dv["id_program"]);
				$id_pengajar=$dv["id_pengajar"];
				$id_periode=$dv["id_periode"];
				$nama_kelas=$dv["nama_kelas"];
				
				
				
?>    
<h4>Data Peserta Kelas <?php echo getPeriode($conn,$id_periode)."#".$nama_kelas."|$id_program";?></h4>
<div>
<!-- Disini -->
Data Peserta Kelas <?php echo getPeriode($conn,$id_periode)."#".$nama_kelas."|$id_program";?>: 

<br>

<table width="100%" border="0" class="table table-striped table-bordered table-hover">
  <tr bgcolor="#036">
    <th width="3%"><center>No.</center></th>
	 <th width="15%"><center>Tanggal</center></th>
    <th width="5%"><center>Jam</center></th>
    <th width="30%"><center>Kelas</center></th>
    <th width="20%"><center>Pengajar</center></th>
	 <th width="15%"><center>Catatan</center></th>
    <th width="10%"><center>Status</center></th>
	
  </tr>

<?php  
$no=1;
   $sql="select * from `$tbabsensi`,`$tbabsensidetail` where `$tbabsensi`.id_absensi=`$tbabsensidetail`.id_absensi and `$tbabsensi`.id_kelas='$id_kelas' and `$tbabsensi`.id_periode='$gid_periode' and 
  `$tbabsensidetail`.id_siswa='$id_siswa'  order by `$tbabsensidetail`.id desc";
  $jum=getJum($conn,$sql);
		if($jum > 0){
	$arr=getData($conn,$sql);
		foreach($arr as $d) {							
					$catatan=$d["catatan"];
				$status=$d["status"];
				$id_absensi=$d["id_absensi"];
				$tanggal=WKT($d["tanggal"]);
				$jam=$d["jam"];
				$id_kelas=$d["id_kelas"];
				$id_pengajar=getPengajar($conn,$d["id_pengajar"]);
			
			$sqlc="select * from `$tbkelas` where `id_kelas`='$id_kelas'";
	$dc=getField($conn,$sqlc);
				$id_program=getProgram($conn,$dc["id_program"]);
				$nama_kelas=$dc["nama_kelas"];
				
				
					$color="#dddddd";	
					if($no %2==0){$color="#eeeeee";}
echo"<tr bgcolor='$color'>
				<td>$no</td>
				<td>$tanggal</td>
				<td>$jam</td>
				<td>$id_kelas</td>
				<td>$id_pengajar</td>
				<td>$catatan</td>
				<td>$status</td>
			
				</tr>";
			
			$no++;
			}//while
		}//if
		else{echo"<tr><td colspan='7'><blink>Maaf, Data nilai belum tersedia...</blink></td></tr>";}
?>
</table>

</div>
<?php }?>
</div>