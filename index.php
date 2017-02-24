<?php  
session_start();
if (!isset($_SESSION['email'])) {
  header('location: login.php');
}
else {
  $email = $_SESSION['email'];
}

 try{
    $koneksi = new PDO("mysql:host=localhost;port=3306;dbname=crud_web;","root","123456789");
    //echo "koneksi berhasil";
}catch(PDOException$e){
    echo $e->getMessage();
}

$hasil = $koneksi->prepare("SELECT * FROM artikel");
$hasil->execute();
$data = $hasil->fetchAll();   



           function excerpt($string){
                $string = substr($string, 0, 250);
                return $string . "...";
            }


 ?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/primary.css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="css/secondary.css" media="screen" title="no title" charset="utf-8">
<title>CRUD_WEB | User</title>

</head>
<body>

<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="input.php">Artikel Baru</a></li>
  <li><a href="guest-user/all-user.php">User</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>

<br>

<div class="div-pri-content">

  <div class="div-card" style="width:100%;">
    <header class="div-pri-content header-colour">
      <center><h3>================ FOR YOUR INFORMATION! ================</h3></center>
    </header>
    <div class="div-pri-content div-colour">
      <p>From : Admin</p>
      <hr>
      <div style="display:block;width:100%;"><center>translated to Indonesian language</center>
      <br>Untuk yang sudah mendaftar, admin memiliki kebijakan untuk hak akses akun kalian. Admin dapat mengubah email maupun password bahkan menghapus akun kalian, jadi di harapkan untuk tidak berkomentar tentang masalah akun kalian, terima kasih. :_:</div>
      <br>
    </div>
  </div>
</div>
<?php
 

 foreach ($data as $key) {


?>
<br>

<div class="div-pri-content">

  <div class="div-card" style="width:100%;">
    <header class="div-pri-content header-colour">
      <center><h3><?= $key['judul']?></h3></center>
    </header>
    <div class="div-pri-content div-colour">
      <p><?= $key['tanggal']?></p>
      <hr>
      <div style="display:block;width:100%;"><?=excerpt($key['isi']);?></div>
      <br>
    </div>
    <a href="read_more.php?id=<?=$key['id'];?>"><button class="button-readmore button-darkgrey">+ Read More</button></a>
  </div>
</div>
<?php

}

?>

</div>


</body>
</html>
