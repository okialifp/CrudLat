<?php
session_start();
if (!isset($_SESSION['email'])) {
  header('location: login.php');
}
else {
  $email = $_SESSION['email'];
}
?>
<!DOCTYPE html>
<head>
<link rel="stylesheet" href="css/primary.css" media="screen" title="no title" charset="utf-8">
<link rel="stylesheet" href="css/secondary.css" media="screen" title="no title" charset="utf-8">
<title>Buat Artikel Baru</title>

</head>

<body>


<ul>
  <li><a class="active" href="index.php">Home</a></li>
  <li><a href="input.php">Artikel Baru</a></li>
  <li><a href="guest-user/all-user.php">User</a></li>
  <li><a href="logout.php">Logout</a></li>
</ul>
<div>
<form method="POST"  action="save.php">
	<table>
		<tr>
		<div>
			<td><input type="text" name="judul" placeholder="Judul" required/></td>
		</tr>
		<tr>
			<td><textarea name="isi" style="width:450px;height:400px;" required/></textarea></td>
		</tr>	
		
				<td><button name="submit" type="submit" class="button">Submit</button></td>
			

			</tr>
			</tr>
			</div>
		</tr>
	</table>
</form>
</div>
</body>
</html>