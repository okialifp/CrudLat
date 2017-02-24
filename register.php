<!DOCTYPE html>  
<html>  
    <head>
        <meta charset="utf-8">
        <title>Register</title>
        <link rel="stylesheet" href="css/style.css" media="screen" title="no title" charset="utf-8">
    </head>
    <body>
        <div class="login-page">
          <div class="form">
              <form class="register-form" method="POST">
               <input type="text" name="nama" placeholder="nama" required/>
               <input type="email" name="email" placeholder="email address" required/>
               <input type="password" name="password" placeholder="password" required/>
               <button type="submit" name="submit">create</button>
               <p class="message">Already registered? <a href="login.php">Sign In</a></p>
             </form>
          </div>
        </div>
    </body>
</html>
<?php
try{
  $koneksi = new PDO("mysql:host=localhost;port=3306;dbname=crud_web;","root","123456789");
  //echo "koneksi berhasil";
}catch(PDOException$e){
  echo $e->getMessage();
}

  if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO login (nama,email,password) VALUES ('$nama','$email','$password')";
    $table_insert = $koneksi->prepare($sql);
    $r = $table_insert->execute();
    if ($r) {
      header("location:login.php");
    }else{
      echo "gagal";
    }
    
  }
?>