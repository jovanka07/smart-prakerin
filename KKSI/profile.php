<?php 
if(!isset($_SESSION['user'])){
	header("Location:login.php");
}

include "koneksi/conn.php";
$id = $_SESSION['data-user'];
$query = $conn->query("SELECT * FROM user WHERE id_user = '$id' ");
$data = $query->fetch_array();

 ?>

<!DOCTYPE html>
<html>
<head>
	<title>Pengaturan Account</title>
	<style>
		*{
			padding: 0;
			margin: 0;
			box-sizing: border-box;
		}
		body{
			background-color: #f2f2f2;
		}
		.container{
			max-width: 90%;
			height: 535px;
			margin: 30px auto;
			border-radius: 30px;
			background-color: rgb(255, 255, 255);
		    box-shadow: 0px 7px 7px grey;
		    overflow: hidden;
			
		}
		
		h3{
			font-style: italic;
			
		}
		.box{

			display: flex;
		}
		.box1{
			margin: 30px auto;
		}
		input{
			margin-right: 5px; 
		}
		label{
			margin: 0 5px 0 0;
		}
		.pw{
			width: 100%;
			background-color: #e6e6e6;
			
		}
		.box2{
			margin: auto;
		}
		.box3{
			margin: 0 0 0 -30px;
			display: flex;
			width: 100%;
		}
		.box4{
			margin:20px 0 0 35px;
		}
		input{
			border:1px solid #75a3a3;
			padding: 5px;
		}
		.border{
			margin: 30px auto;
			width: 100%;
			border-bottom: 1px solid blue;
		}
		.border2{
			margin: -30px auto;
			width:100%;
			border-bottom: 1px solid  #75a3a3;
		}

		.a{
			display: block;
		}
		.header{
			margin:  0 0 -20px 0;
			font-size: 21px;
			font-style: italic;
			
		}
		.content{
			

		}
		button{
			float: right;
			margin:-15px 10px 0 0;
		}
		@media (min-width: 700px){
			.box4{
				margin: 20px 0 0 30px;
			}
			.box3{
				margin: 0 0 0 50px;
			}
			.container{
				height:450px; 
				margin: 85px auto;
			}
		}


	</style>
</head>
<body>
	<div class="container">
		<p class="header">Pengaturan Account <p>
		
		<div class="content">
		<div class="box">
			<div class="box1">
				<label>Username:</label>
				<input type="text" readonly="" size="50" value="<?php echo $data['nama']; ?> ">

				<label style="">Password :</label>
				<input type="password" readonly="" size="50" value="<?php echo $data['password']; ?> " >

			</div>
		</div>

		<div class="box">
			<div class="box2">
				<label>Status Account :</label>
				<br>
				<input class="pw" type="text" readonly="" name="" size="170" value="<?php echo $data["level"]; ?> ">
			</div>
		</div>
		<br>

		<div class="box">
			<div class="box2">
				<label>Nama Lengkap :</label>
				<br>
				<input class="pw" type="text" readonly="" name="" size="170" value="<?php echo $data["nama_lengkap"]; ?> ">
			</div>
		</div>

		<div class="box">
			<div class="box3">
				<div class="box4">
					<label class="a">Jenis-Kelamin</label>
					
					<input type="text" size="10" readonly="" value="<?php echo $data["jk"]; ?> "  >
				</div>

				<div class="box4">
					<label class="a">Status Role</label>
					
				    <input type="text" size="30" readonly="" value="<?php echo $data["status_role"]; ?> ">
				</div>

			</div>
		</div>
		</div>

		<div class="border"></div>
			<!-- <button type="reset" class="btn btn-danger">Reset</button>
			<button type="submit" class="btn btn-primary">Ubah</button> -->
		<div class="border2"></div>
	</div>

</body>
</html>