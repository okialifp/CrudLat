<?php
try{
    $koneksi = new PDO("mysql:host=localhost;port=3306;dbname=crud_web;","root","123456789");
    //echo "koneksi berhasil";
}catch(PDOException$e){
    echo $e->getMessage();
}

	if (isset($_POST['submit'])) {
		$judul = $_POST['judul'];
		$isi = $_POST['isi'];

		$sql = "INSERT INTO artikel (judul,isi) VALUES ('$judul','$isi')";
		$table_insert = $koneksi->prepare($sql);
		$r = $table_insert->execute();
		if ($r) {
			header("location:index.php");
		}else{
			echo "gagal";
		}
		
	}
?>