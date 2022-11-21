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
					<h3 class="text-center">Pesan Siswa/i</h3>
				</div>
				
				<form action="" method="post" autocomplete="off" enctype="multipart/form-data" >
					<input type="hidden" name="GambarLama" value="<?php echo $data['img']; ?>">
					<input type="hidden" name="id" value="<?php echo $data['id_user']; ?> ">

				<div class="form-group">
					<label>Nama Siswa </label>
					<input type="text" name="nama" class="form-control" autofocus=""
						 readonly="" value="<?php echo $data['nama']; ?> ">
				</div>

				<div class="form-group">
					<label>Nama Lengkap</label>
					<input type="text" name="nama_lengkap" class="form-control" autofocus=""
						 readonly="" value="<?php echo $data['nama_lengkap']; ?> ">
				</div>

				<div class="form-group">
					<!-- <label>Status</label> -->
					<label>Status</label>
					<select name="status_role" class="form-control">
						<!-- <option value="pending">Pending</option> -->
						<?php if($data['status_role'] == 'pending'): ?>
							<option value="pending">Belum di konfirmasi</option>
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
					<!-- <label>Sertifikat</label> -->
					<input type="hidden" name="gambar" class="form-control"  >
				</div>

				<div class="form-group">
					<?php 
					//Jika status nya pending jangan tampilkan
						if($data['status_role'] != 'pending'){
							?>
								<label>Pesan</label>
								<textarea name="pesan" class="form-control"><?php echo $data['pesan']; ?></textarea>
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

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 </body>
 </html>

 <?php 
 include 'upload.php';
if(isset($_POST['submit'])){
	$id_user = trim(htmlspecialchars($_POST['id']));
	$nama_lengkap = trim(htmlspecialchars($_POST['nama_lengkap']));
	$nama = trim(htmlspecialchars($_POST['nama']));
	$pesan =trim(htmlspecialchars($_POST['pesan']));
	$status_role = trim(htmlspecialchars($_POST['status_role']));
	$GambarLama = htmlspecialchars($_POST['GambarLama']);

	if($_FILES['gambar']['error'] === 4){
		$gambar = $GambarLama;
	}else{
		$gambar = upload();
	}
	$query = $conn->query("UPDATE user SET
							nama ='$nama',
							nama_lengkap ='$nama_lengkap',
							img = '$gambar',
							pesan = '$pesan'
							WHERE id_user = '$id_user'
		");
	if(!$query){
		die(mysqli_error($conn));
	}else{
		echo ' . ?>
				<script type="text/javascript">
					swal({
						  title: "Berhasil!",
						  text: "Pesan Telah di konfirmasi!",
						  icon: "success",
						  button: "Oke!",
						});

				</script>
			<?php '  ;
	}

}

  ?>