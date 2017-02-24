<?php
session_start();
  if (isset($_SESSION['username'])) {
    header('location: guest-user/all-user.php');
  }
 require_once("koneksi.php");

?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <title>Login Admin</title>
        <link rel="stylesheet" href="css/style.css" media="screen" title="no title" charset="utf-8">
</head>
<body>
  <form method="POST" action="prologin-admin.php" class="login-form">
  <div class="login-page">
          <div class="form">
    <table>
      <tr>
        <td>Username</td>
        <td><input type="text" name="username" required/></td>
      </tr>
      
      <tr>
        <td>Password</td>
        <td><input type="password" name="password" required/></td>

      </tr>
      <tr>
        <td></td>
        <td><button type="submit" name="kirim">Sign In</button></td>
      </tr>
      <tr>
        <p class="message">bukan admin? <a href="index.php">Home</a></p>
      </tr>
    </table>
    </div>
    </div>
  </form>
</body>
</html>