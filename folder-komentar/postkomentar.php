<?php
session_start();
try{
    $koneksi = new PDO("mysql:host=localhost;port=3306;dbname=crud_web;","aoki","password");
    //echo "koneksi berhasil";
}catch(PDOException$e){
    echo $e->getMessage();
}


	if (isset($_POST['submit'])) {
		$id_artikel = $_POST['id_artikel'];
		$komentator = $_POST['komentator'];
		$komentar = $_POST['komentar'];

	// proses insert ke tabel
	// komentar

	$sql = "INSERT INTO komentar (id_artikel,komentator,komentar) VALUES ('$id_artikel','$komentator','$komentar')";
	$table_insert = $koneksi->prepare($sql);
		$r = $table_insert->execute();
		if ($r) {
			header("location:../read_more.php?id=".$id_artikel);
		}else{
			echo "gagal";
		}

	}
?>