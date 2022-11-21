<?php 
//koneksi
include 'koneksi/conn.php';
//ambil data url
$id = $_GET['id'];
//query data hapus
$query = $conn->query("DELETE FROM pengajuan WHERE id_pengajuan= '$id' ");
if($query){
	echo "<script>
		alert('Berhasil Membatalkan :)');
		document.location.href='data-proses.php';
	</script>";
}

 ?>