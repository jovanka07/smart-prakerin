<?php 
include "koneksi/conn.php";
session_start();
//Semua data id_perusahaan
$id = $_GET["id"];
$perusahaan = $conn->query("SELECT a.id_pengajuan, a.id_perusahaan,a.id_user, b.quota ,c.nama,c.status_role FROM pengajuan a,perusahaan b, user c WHERE a.id_perusahaan=b.id_perusahaan AND a.id_user=c.id_user AND a.id_perusahaan = '$id' and c.status_role = 'proses'");
$data = $perusahaan->fetch_array();
$quota = $data['quota'];
$jml_proses =  mysqli_num_rows($perusahaan);
// else if($jml_proses >= $quota){
// 	echo "<script>
// 		alert('Maap, Kuota Sudah Penuh');
// 		document.location.href='halaman-utama.php';
// 	</script>";
// 	return false;
// }
// while($data = $perusahaan->fetch_array()){
// 	echo $data['id_pengajuan']."<br>";
// }
//hard
//id_user
$id_user = $_SESSION['data-user'];

//Jika user sudah mengklik perusahaan return false
//NOTE JIKA USER YANG DI PAKAI YA ID_USER
$query = $conn->query("SELECT * FROM pengajuan where id_user= '$id_user'");
$data = $query->fetch_array();

if(!$query){
	die(mysqli_error($conn));
//Jika di table pengajuan ada id user, tidak boleh ada lagi
}else if($data['id_user'] === $id_user){
	echo "<script>
		alert('Maap, Anda Sudah Mengajukan Data!');
		document.location.href= 'halaman-utama.php';
	</script>";

	return false;
//Jika jumblah Proses sudah melebihi quota return false
} else{
	echo "<script>
		alert('Pengajuan Mu Berhasil');
		document.location.href= 'halaman-utama.php';
	</script>";
}
//INSERT Relasi $id = id perusahaan, $id_user = id user
$query = mysqli_query($conn, "INSERT INTO pengajuan VALUES ('','$id', '$id_user')");

 ?>