<?php 
//koneksi
include "koneksi/conn.php";
//ambil id url
$id_perusahaan = $_GET['id'];
//query data
$query = $conn->query("DELETE FROM perusahaan WHERE id_perusahaan ='$id_perusahaan' ");
//header
header("Location:halaman-admin.php");
 ?>