<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="bs/css/bootstrap.min.css">
	
	<link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32" />
	<style>
		*{
			padding: 0;
			margin: 0;
		}
		body{
			background-color:  #ffffe6;
		}
	
		.form{
			float: left;
			width: 100%;
			height: 100vh;
			display: flex;
			background-image: url(img/bg.png);
		}
		.form2{
			width: 90%;
			height: 92%;
			border-radius: 30px;
			margin: 50px 0 0px 50px;
			background-color: #fff;
			padding: 15px;
			box-shadow: 0px 5px 5px grey;
		}
		.form{
			width: 90%;
			margin: -25px auto;
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
			width: 55%;
			background-image: url(img/bg-login.jpg);
			height: 100vh;
			display: none;
			background-size:cover;
		}
		@media(max-width: 800px){
			.form2{
				width:100%;
				margin-left:50px;
			}
		}
		@media (min-width: 700px){
			.banner{
				display:inline;
			}
			.form{
				width:40%; 
				height: 100vh;
			}
			.form2{
				margin: 50px auto;
			}
		}
		.der{
			width: 100%;
			height: 5%;
			border-bottom:1px solid gray;
		}

		h3{
			font-style: italic;
			color: grey;
		}
		.bor{
			width: 100%;
			height: 5%;
			border-bottom:1px solid gray;
		}
		.flex{
			display: flex;
			justify-content: space-around;
			margin: 20px 0 0 0;
		}
		.border{
			border: 1px solid linen;
		}
		a{
			text-decoration: underline;
		}
	</style>
</head>
<body>

		<div class="form">
			<div class="form2">
				<div class="border">
					<h3 class="text-center">Let's Get Started</h3>
				</div>
				<form action="" method="post" autocomplete="off">
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
					<label>Level</label>
					<select class="form-control" name="level">
						<option value="Admin">Administrator</option>
						<option value="Member">User-Member</option>
					</select>
				</div>

				<br>

				<button type="submit" name="submit" class="btn btn-primary">Submit</button>
				   <br><br>
				<button type="reset" class="btn btn-danger">Reset</button>
				   <br><br><br>

				<div class="bor"></div>

				<div class="flex">
						<p class="text-center">Haven't an account? <a href="daftar.php">Register</p></a>
					   <p class="text-center">Back to  <a href="Index.php">Home</p></a>
				</div>
			
				<div class="der" class="text-center"></div>
			</form>
			</div>
		</div>

		<div class="banner"></div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>

<?php 
	//Jika tombol submit di tekan
	if(isset($_POST['submit'])){
		//koneksi database
		include "koneksi/conn.php";
		session_start();
		$_SESSION["user"] = $_POST["nama"];

		//ambil data
		$nama = htmlspecialchars($_POST["nama"]);
		$pass = htmlspecialchars($_POST["password"]);
		$level = htmlspecialchars($_POST["level"]);
		//Query data
		$query = $conn->query("SELECT * FROM user WHERE
								nama ='$nama' AND level='$level' ");
		$data = $query->fetch_array();
		$_SESSION['data-user'] = $data['id_user'];
		//Uji Jika Username Terdaftar
		if($data){
			//Cek Password salah atau tidak
			if($pass === $data["password"]){
				//Jika password sesuai
				//Buat Session
				$_SESSION['level'] = $data['level'];
				//Uji Level User
				if($level == 'Admin'){
					header("Location:halaman-admin.php");
				}else if($level == 'Member'){
					header("Location:halaman-utama.php");
				}
			}else{

				echo ' . ?>
				<script type="text/javascript">
					swal({
						  title: "Login Gagal!",
						  text: "Password Tidak Sesuai!",
						  icon: "error",
						  button: "Oke!",
						});

				</script>
			<?php '  ;
			}
		}else{
			echo ' . ?>
				<script type="text/javascript">
					swal({
						  title: "Login Gagal!",
						  text: "Username tidak tersedia!",
						  icon: "error",
						  button: "Oke!",
						});

				</script>
			<?php '  ;
		}
	}
 ?>