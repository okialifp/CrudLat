<?php
session_start();
  if (isset($_SESSION['email'])) {
    header('location: index.php');
  }
 require_once("koneksi.php");

?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="css/style.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
  <form method="POST" action="prologin.php" class="login-form">
  <div class="login-page">
          <div class="form">
    <table>
      <tr>
        <td>E-Mail</td>
        <td><input type="email" name="email" placeholder="andabenar@gmail.com" required/></td>
      </tr>
      
      <tr>
        <td>Password</td>
        <td><input type="password" name="password" placeholder="benar" required/></td>

      </tr>
      <tr>
        <td></td>
        <td><button type="submit" name="kirim">Sign In</button></td>
      </tr>
      <tr>
        <p class="message">Not registered? <a href="register.php">Create an account</a></p>
      </tr>
    </table>
    </div>
    </div>
  </form>
</body>
</html>

