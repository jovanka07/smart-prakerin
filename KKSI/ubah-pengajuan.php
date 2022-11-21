<?php
session_start(); 
if(!isset($_SESSION['user'])){
  header("Location:login.php");
}
//koneksi
include 'koneksi/conn.php';
//ambil data di url
$id = $_GET['id'];
//query data
$query = $conn->query("SELECT * FROM user WHERE id_user ='$id' ");
$data = $query->fetch_array();

$perusahaan = $conn->query("SELECT * FROM pengajuan WHERE id_user ='$id' ");
$result = $perusahaan->fetch_array();
$id_perusahaan = $result['id_perusahaan'];


 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title></title>
 	<link rel="stylesheet" type="text/css" href="bs/css/bootstrap.css">
 	
	<link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32" />
 	<style>
 		.form{
 			width: 75%;
 			margin: auto;
 		}
 		button{
 			width: 100%;
 		}
 	</style>
 </head>
 <body>

 <div class="form">
			<div class="form2">
				<div class="border">
					<h3 class="text-center">Konfirmasi Siswa/i</h3>
				</div>
				
				<form action="" method="post" autocomplete="off" enctype="multipart/form-data">
					<input type="hidden" name="GambarLama" value="<?php echo $data['img']; ?>">
					<input type="hidden" name="id_perusahaan" value="<?php echo $id_perusahaan;?>">
					<input type="hidden" name="id" value="<?php echo $data['id_user']; ?> ">

				<div class="form-group">
					<label>Username </label>
					<input type="text" name="nama" class="form-control" autofocus=""
						 readonly="" value="<?php echo $data['nama']; ?> ">
				</div>

				<div class="form-group">
					<label>Nama Siswa</label>
					<input type="text" name="nama_lengkap" class="form-control" autofocus=""
						 readonly="" value="<?php echo $data['nama_lengkap']; ?> ">
				</div>

				<div class="form-group">
					<label>Dari Tanggal</label>
					<input type="text" name="dari_tanggal" class="form-control" autofocus="" value="<?php echo $data['dari_tanggal']; ?>" 
					>
				</div>

				<div class="form-group">
					<label>Sampai Tanggal</label>
					<input type="text" name="sampai_tanggal" class="form-control" autofocus=""
						  value="<?php echo $data['sampai_tanggal']; ?> ">
				</div>
			

				<div class="form-group">
					<!-- <label>Status</label> -->
					<label>Konfirmasi</label>
					<select name="status_role" class="form-control">
						<!-- <option value="pending">Pending</option> -->
						<?php if($data['status_role'] == 'pending'): ?>
							<option value="pending">Belum di konfirmasi</option>
							<option value="proses">Sedang Prakerin</option>
						<?php endif ?>
						<?php if($data['status_role'] == 'sukses'): ?>
							<option value="sukses">Selesai Prakerin</option>
							<option value="proses">Sedang Prakerin</option>
						<?php endif; ?>
						<?php if($data['status_role'] == 'proses'): ?>
							<option value="proses">Sedang Prakerin</option>
							<option value="sukses">Selesai Prakerin</option>
							<option value="pending">Kembali ke <b>Pending</b>></option>
						<?php endif; ?>
					</select>
				</div>

				<div class="form-group">
					<?php 
						if($data['status_role'] == 'sukses'){
							?>
								<!-- <label>Sertifikat</label> -->
								<input type="hidden" name="gambar" class="form-control"  >
							<?php
						}
					 ?>
				</div>

				<div class="form-group">
					<?php 
					//Jika status nya pending jangan tampilkan
						if($data['status_role'] != 'pending'){
							?>
								<label>Pesan</label>
								<textarea name="pesan" class="form-control" value="<?php echo $data['pesan']; ?>"><?php echo $data['pesan']; ?></textarea>
							<?php
						}
					 ?>
				</div>

				<button name="submit" type="submit" class="btn btn-primary">Submit</button>
				<br><br>
				<a href="halaman-admin.php" class="btn btn-info " style="width:100%;">Kembali Ke halaman utama</a>
				<br><br>
			</form>
			</div>
		</div>
 </body>
 </html>

 <?php 
 include 'upload.php';
if(isset($_POST['submit'])){
	$id_user = trim(htmlspecialchars($_POST['id']));
	$nama_lengkap = trim(htmlspecialchars($_POST['nama_lengkap']));
	$nama = trim(htmlspecialchars($_POST['nama']));
	$dari_tanggal = trim(htmlspecialchars($_POST['dari_tanggal']));
	$sampai_tanggal = trim(htmlspecialchars($_POST['sampai_tanggal']));
	$GambarLama = htmlspecialchars($_POST['GambarLama']);
	$pesan =trim(htmlspecialchars($_POST['pesan']));
	$status_role = trim(htmlspecialchars($_POST['status_role']));
	$id_perusahaan = $_POST['id_perusahaan'];

	if($_FILES['gambar']['error'] === 4){
		$gambar = $GambarLama;
	}else{
		$gambar = upload();
	}
	$query = $conn->query("UPDATE user SET
							nama ='$nama',
							nama_lengkap ='$nama_lengkap',
							status_role = '$status_role',
							dari_tanggal = '$dari_tanggal',
							sampai_tanggal = '$sampai_tanggal',
							img = '$gambar',
							pesan = '$pesan'
							WHERE id_user = '$id_user'
		");


//Pergi ke halaman admin karna file ubah tidak ada di halaman admin
	if(!$query){
		die(mysqli_error($conn));
	}else if( $status_role == 'proses'  ){
		// echo "Perusahaan";
		// die();
		$sql = $conn->query("UPDATE perusahaan SET
				quota = quota-1 WHERE id_perusahaan ='$id_perusahaan'
			");
		header("Location:halaman-admin.php");
	}else{
		header("Location:halaman-admin.php");
		
	}

}

  ?>