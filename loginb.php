<?php
if (version_compare(phpversion(), "5.3.0", ">=")  == 1)
  error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
else
  error_reporting(E_ALL & ~E_NOTICE);  
  ?>
<?php
session_start();
//error_reporting(0);
require_once"konmysqli.php";

$mnu=$_GET["mnu"];
date_default_timezone_set("Asia/Jakarta");     
?>

<!DOCTYPE HTML>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="css/logincss.css">
    <title>Halaman Login</title>
  </head>
  <body>

    <p><br><br></p>
    <p><h1 align="center" style="font-family:'Square721 BT';font-size:42px;">ME.ACADEMIC</h1></p>
    <div class="lcontainer">
      <section id="lcontent">
      
        <form name="formLogin" method="post" action="loginb.php">
        <h1 style="font-family:'Square721 BT';">WELCOME!</h1>
        <h1 style="font-family:'Square721 BT';font-size:20px;">Please enter your username<br>& password to proceed</h1>
          <div>
            <input type="text" placeholder="Username" id="lusername" name="username"/>
          </div>
      
          <div>
            <input type="password" placeholder="Password" id="lpassword" name="password"/>
          </div>
      
          <div>
            <input type="submit" name="Login" value="Login" />
            <!--<a href="#">Lost your password?</a>-->
          </div>
        </form><!-- form -->
    
      </section><!-- content -->
    </div><!-- container -->
  </body>
</html>

<?php
if(isset($_POST["Login"])){
  $usr=$_POST["username"];
  $pas=$_POST["password"];
  
    $sql1="select * from `$tbadmin` where `username`='$usr' and `password`='$pas' and `status`='Active'";
    $sql2="select * from `$tbsiswa` where `username`='$usr' and `password`='$pas' and `status`='Active'";
    $sql3="select * from `$tbpengajar` where `username`='$usr' and `password`='$pas' and `status`='Active'";
    $sql4="select * from `$tborangtua` where `username`='$usr' and `password`='$pas' and `status`='Active'";
    //$sql3="select * from `$tbadmin` where `username`='$usr' and `password`='$pas' and `status`='Active'";
    
    if(getJum($conn,$sql1)>0){
      $d=getField($conn,$sql1);
        $kode=$d["id_admin"];
        $nama=$d["nama_admin"];
           $_SESSION["cid"]=$kode;
           $_SESSION["cnama"]=$nama;
           $_SESSION["cstatus"]="Administrator";
    echo "<script>alert('Welcome, Admin ".$_SESSION["cnama"]."!');
    document.location.href='index.php?mnu=home';</script>";
    }
    elseif(getJum($conn,$sql2)>0){
      $d=getField($conn,$sql2);
        $kode=$d["id_siswa"];
        $nama=$d["nama_siswa"];
          $_SESSION["cid"]=$kode;
          $_SESSION["cnama"]=$nama;
          $_SESSION["cstatus"]="Siswa";
    echo "<script>alert('Welcome, ".$_SESSION["cnama"]."!');
    document.location.href='index.php?mnu=home';</script>";
    }
    elseif(getJum($conn,$sql3)>0){
      $d=getField($conn,$sql3);
        $kode=$d["id_pengajar"];
        $nama=$d["nama_pengajar"];
        $jk=getMrMs($conn,$d["id_pengajar"]);
          if ($jk=='M') {$cal='Mr.';}
          else{$cal='Ms.';}
          $_SESSION["cid"]=$kode;
          $_SESSION["cnama"]=$nama;
          $_SESSION["cstatus"]="Pengajar";
          $_SESSION["ccal"]=$cal;
    echo "<script>alert('Welcome, ".$cal." ".$_SESSION["cnama"]."!');
    document.location.href='index.php?mnu=home';</script>";
    }
    elseif(getJum($conn,$sql4)>0){
      $d=getField($conn,$sql4);
        $kode=$d["id_orangtua"];
        $kodes=$d["id_siswa"];
        $siswa=getSiswa($conn,$kodes);
          $_SESSION["cid"]=$kode;
          $_SESSION["cstatus"]="Orang Tua";
    echo "<script>alert('Welcome, ".$siswa." Parent!');
    document.location.href='index.php?mnu=home';</script>";
    }
    else{
      session_destroy();
      echo "<script>alert('Failed to login. Please check the username and password you entered and then try again.');
      document.location.href='loginb.php';</script>";
    }
}
?>


<?php
function process($conn,$sql){
$s=false;
$conn->autocommit(FALSE);
try {
  $rs = $conn->query($sql);
  if($rs){
      $conn->commit();
      $last_inserted_id = $conn->insert_id;
    $affected_rows = $conn->affected_rows;
      $s=true;
  }
} 
catch (Exception $e) {
  echo 'fail: ' . $e->getMessage();
    $conn->rollback();
}
$conn->autocommit(TRUE);
return $s;
}

function getJum($conn,$sql){
  $rs=$conn->query($sql);
  $jum= $rs->num_rows;
  $rs->free();
  return $jum;
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

function getSiswa($conn,$kode){
$field="nama_siswa";
$sql="SELECT `$field` FROM `tb_siswa` where `id_siswa`='$kode'";
$rs=$conn->query($sql); 
  $rs->data_seek(0);
  $row = $rs->fetch_assoc();
  $rs->free();
    return $row[$field];
  }

function getMrMs($conn,$kode){
$field="jenis_kelamin";
$sql="SELECT `$field` FROM `tb_pengajar` where `id_pengajar`='$kode'";
$rs=$conn->query($sql); 
  $rs->data_seek(0);
  $row = $rs->fetch_assoc();
  $rs->free();
    return $row[$field];
  }