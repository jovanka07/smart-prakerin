<?php 
 ?>

 <?php 
if(!isset($_SESSION['user'])){
  header("Location:login.php");
} 
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.container{
			width: 80%;
			margin: 80px auto;
			border:1px solid grey;
			box-shadow: 3px 3px 6px grey;
			background-color: #fff;
			padding: 20px;
			box-sizing: border-box;
			border-radius: 30px;
		}
	</style>
</head>
<body>
<div class="container">
	<h3 class="text-center">Tambah Siswa</h3>
	<form action="" method="post" autocomplete="off">
		<input type="hidden" name="dari_tanggal" value="Belum di tentukan">
		<input type="hidden" name="sampai_tanggal" value="Belum di tentukan">
		<input type="hidden" name="img" value="Belum ada">
		<input type="hidden" name="pesan" value="Belum ada">
		<div class="form-group">
			<label>Nama Lengkap</label>
			<input type="text" name="nama_lengkap" class="form-control" placeholder="Input Nama Lengkap..." required="">
		</div>

		<div class="form-group">
			<label>Username</label>
			<input type="text" name="nama"  class="form-control" placeholder="Input nama..." required="">
		</div>

		<div class="form-group">
			<label>Password</label>
			<input type="password" name="password"  class="form-control" placeholder="Input Password..." required="">
		</div>

		<div class="form-group">
			<label>level</label>
			<select name="level" class="form-control" required="">
				<option value="Member">Member</option>
			</select>
		</div>

		<div class="form-group">
			<input type="hidden" name="status_role" value="pending">
		</div>

		<div class="form-group">
			<label>Kelas</label>
			<select name="kelas" class="form-control" required="">
				<option value="X">10</option>
				<option value="XI">11</option>
				<option value="XI">12</option>
			</select>
		</div>
		<div class="form-group">
			<label>Jurusan</label>
		<select class="form-control" name="jurusan" required="">
			<option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
			<option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
			<option value="Teknik Sepeda Motor">Teknik Sepeda Motor</option>
			<option value="Teknik bisnis Sepeda Motor">Teknik bisnis Sepeda Motor</option>
			<option value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
		</select>
		</div>

		<div class="form-group">
			<label>Jenis Kelamin</label>
			<select name="jk" class="form-control" required="">
				<option value="Laki-laki">Laki-Laki</option>
				<option value="Perempuan">Perempuan</option>
			</select>
		</div>

		<button type="submit" name="submit" class="btn btn-primary">Submit</button>
	</form>
</div>

<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>

<?php 
	//Apakah tombol submit sudah di tekan atau belum
	if(isset($_POST['submit'])){
		$nama_lengkap = htmlspecialchars($_POST['nama_lengkap']);
		$nama = htmlspecialchars($_POST['nama']);
		$pass = htmlspecialchars($_POST['password']);
		$level = htmlspecialchars($_POST['level']);
		$status_role = htmlspecialchars($_POST['status_role']);
		$jk = htmlspecialchars($_POST['jk']);
		$kelas = $_POST['kelas'];
		$jurusan = $_POST['jurusan'];
		$dari_tanggal = $_POST['dari_tanggal'];
		$sampai_tanggal = $_POST['sampai_tanggal'];
		$img = $_POST['img'];
		$pesan = $_POST['pesan'];

		//koneksi
		include 'koneksi/conn.php';
		$query = $conn->query("INSERT INTO user VALUES('', '$nama', '$pass', '$nama_lengkap', '$jk', '$level','$kelas' ,'$status_role','$jurusan','$dari_tanggal','$sampai_tanggal','$img','$pesan') ");

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