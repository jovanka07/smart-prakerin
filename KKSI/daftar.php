 <!DOCTYPE html>
<html>
<head>
	<title>Daftar</title>
	<link rel="stylesheet" type="text/css" href="bs/css/bootstrap.min.css">
	
	<link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32" />
	<style>
		*{
			padding: 0;
			margin: 0;
		}
		body{
			background-color: #ffffe6;
		}
	
		.form{
			float: left;
			width: 50%;
			height: 100vh;
			display: flex;
			/*background-color: #ffffe6;*/
			background-image: url(img/bg.png);
			margin:10px 0 15px 0;
		}
		.form2{
			width: 90%;
			margin: auto;
			background-color: #fff;
			padding: 10px;
			box-shadow: 0px 5px 5px grey;
			border-radius: 30px;
		}
		form{
			width: 90%;
			margin: 20px auto;
		}
		.border{
			margin-top:20px;
		}
		button{
			float: right;
			width: 100%;
		}
		input{
			border:1px solid blue;
		}

		.banner{
			float: right;
			width: 50%;
			background-image: url(img/bg-login.jpg);
			background-size: 100% 100%;
			height: 780px;
		}

		h3{
			font-style: italic;
			color: grey;
		}
		a{
			text-decoration: underline;
		}

		@media(max-width: 700px){
			.banner{
				display: none;
			}
			.form{
				width: 100%;
				margin: 20px 0 0 0;
			}
		}
	</style>
</head>
<body>

		<div class="form">
			<div class="form2">
				<div class="border">
					<h3 class="text-center">Registrasi Account</h3>
				</div>
				<form action="" method="post" autocomplete="off" 
				enctype="multipart/form-data">

			<div class="form-group">
				<input type="hidden" name="status_role" class="form-control" value="pending">
				<input type="hidden" name="dari_tanggal" value="belum di tentukan">
				<input type="hidden" name="sampai_tanggal" value="belum di tentukan">
			</div>

				<div class="form-group">
					<label>Nama Lengkapp</label>
					<p style="color: grey; margin: -10px 0 0 0; font-size: 12px;"> Note: Harap Sesuai dengan Nama Asli</p>
					<input type="text" name="nama_lengkap" class="form-control" autofocus=""
					 placeholder="Input nama Lengkap..." required="" autofocus="">
				</div>

				<div class="form-group">
					<label>Username</label>
					<input type="text" name="nama" class="form-control" autofocus=""
					 placeholder="Input Username..." required="">
				</div>

				<div class="form-group">
					<label>Password</label>
					<input type="password" name="password" class="form-control" 
					placeholder="Input Password..." required="">
				</div>

				<div class="form-group">
					<label>Kelas</label>
					<select class="form-control" name="kelas">
						<option value="X">X</option>
						<option value="XI">XI</option>
						<option value="XII">XII</option>
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
					<!-- <label>Gambar</label> -->
					<input type="hidden" name="gambar" value="sertif.png">
					<input type="hidden" name="pesan" value="Belum ada Pesan">
				</div>

				<div class="form-group">
					<input type="radio" name="jk" value="laki-laki" required="" id="laki">
					<label for="laki">Laki Laki</label>
					<input type="radio" name="jk" value="perempuan" required="" id="perempuan"><label for="perempuan">Perempuan</label>
				</div>

				<div class="form-group">
					<label>Level</label>
					<select name="level" required="">
						<option value="Member">User-Member</option>
					</select>
				</div>

				<button name="submit" type="submit" class="btn btn-primary">Submit</button>
				<br><br>
				<button type="reset" class="btn btn-danger">Reset</button>
				<p class="text-center">Already have a account? <a href="login.php">Sing in</p></a>
			</form>
			</div>
		</div>

		<div class="banner"></div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>

<?php 
//Tombol submit di tekan
if(isset($_POST["submit"])){
	//koneksi
	include "koneksi/conn.php";
	include "upload.php";
	//Ambil data
	$status_role = $_POST["status_role"];
	$nama = htmlspecialchars($_POST["nama"]);
	$pass = htmlspecialchars($_POST["password"]);
	$nama_lengkap = htmlspecialchars($_POST["nama_lengkap"]);
	$jk = htmlspecialchars($_POST["jk"]);
	$level = htmlspecialchars($_POST["level"]);
	$kelas = htmlspecialchars($_POST["kelas"]);
	$jurusan = htmlspecialchars($_POST["jurusan"]);
	$dari_tanggal = htmlspecialchars($_POST['dari_tanggal']);
	$sampai_tanggal = htmlspecialchars($_POST['sampai_tanggal']);
	$gambar = $_POST['gambar'];
	$pesan = $_POST['pesan'];
	//Query data
	$query = $conn->query("SELECT * FROM user WHERE nama ='$nama' ");
	$data = $query->fetch_array();

	if(!$query){
		die(mysqli_error($conn));
	}else if($nama === $data["nama"]){
		echo "<script>
			alert('Username Sudah Tersedia');
			document.location.href= 'daftar.php';
		</script>";

		return false;
	}else{
		echo ' . ?>
				<script type="text/javascript">
					swal({
						  title: "Register Berhasil!",
						  text: "Wellcome to SmartPrakerin!",
						  icon: "success",
						  button: "Oke!",
						});

				</script>
			<?php '  ;
	}
// $gambar = upload();
// if(!$gambar){
// 	return false;
// }

	$query = $conn->query("INSERT INTO user VALUES('', '$nama', '$pass', '$nama_lengkap', '$jk', '$level', '$kelas', '$status_role','$jurusan','$dari_tanggal','$sampai_tanggal', '$gambar','$pesan') ");
}

 ?>
