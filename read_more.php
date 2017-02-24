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

$id = $_GET['id'];

$data = $koneksi->prepare("SELECT * FROM artikel WHERE id='$id'");
$data->execute();
$row = $data->fetch(PDO::FETCH_OBJ);

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="css/primary.css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="css/secondary.css" media="screen" title="no title" charset="utf-8">
<title>Read More | <?=$row->judul;?></title>

</head>
<body>

<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="input.php">New Article</a></li>
  <li><a href="guest-user/all-user.php">User</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>

<br>

<div class="div-pri-content">

  <div class="div-card" style="width:100%;">
    <header class="div-pri-content header-colour">
      <center><h3><?=$row->judul;?></h3></center>
    </header>
    <div class="div-pri-content">
      <p><?=$row->tanggal;?></p>
      <hr>
      <div style="display:block;width:100%;"><?=$row->isi;?></div>
      <br>
</div>
<table style="width: 100%;color: #fff; background-color: #616161;">
<tr>
<td><a class="button button-green" href="edit.php?id=<?=$row->id;?>">Edit</a></td>
<td><a class="button button-red" onclick="return confirm('Sure want to delete <?=$row->judul;?> ?')" href="delete.php?id=<?=$row->id;?>">Delete</a></td>
</tr>
</table></div>
</div>
<br>
<br>
<form method="POST" action="folder-komentar/postkomentar.php">
  <input type="hidden" name="id_artikel" value="<?=$row->id;?>">
  <input type="hidden" name="komentator" value="<?=$_SESSION['email'];?>">
  <div class="div-pri-content">
  <div class="div-card">
  <table>
    <tr>
        <td><span style="color:green;font-size: 25px;">
              Komentar :
              </span></td>
    <td><textarea name="komentar" style="width:600px;height:150px;"></textarea></td>
    </tr>
        <tr>
            <td><br></td>
        </tr>
      <tr>
        <td><button name="submit" type="submit" class="button">Post</button></td>
      </tr>
  </table>
  </div>
  </div>
</form>
<br>
<?php
include 'folder-komentar/komentar.php';
?>
</body>
</html>
