<?php 
function upload(){
	//Ambil data
	$namaFile = $_FILES['gambar']['name'];
	$error = $_FILES['gambar']['error'];
	$tmp_file = $_FILES['gambar']['tmp_name'];

	
	move_uploaded_file($tmp_file, 'img_gambar/' . $namaFile);
	return $namaFile;
}

 ?>