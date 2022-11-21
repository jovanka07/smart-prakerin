<?php 
//Koneksi
include "koneksi/conn.php";
//Ambil Url
$id = $_GET['id'];
//Query Data
$query = $conn->query("DELETE FROM pengajuan WHERE id_pengajuan= '$id' ");
header("Location:halaman-admin.php");

 ?>