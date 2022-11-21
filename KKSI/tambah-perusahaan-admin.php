<?php 
if(!isset($_SESSION['user'])){
  header("Location:login.php");
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Tambah Admin</title>
	<style type="text/css">
		.container{
			width: 80%;
			margin: 70px auto;
			background-color: #fff;
			border:1px solid grey;
			padding: 20px;
			box-sizing: border-box;
		}
	</style>
</head>
<body>
<div class="container">
	<form action="" method="post" autocomplete="" enctype="multipart/form-data">
	<div class="form-group">
		<label>Nama Perusahaan</label>
		<input type="text" name="nama" class="form-control" placeholder="Input Nama...">
	</div>

	<div class="form-group">
		<label>Kategori Perusahaan</label>
		<input type="text" name="kategori" class="form-control" placeholder="Input kategori...">
	</div>

	<div class="form-group">
		<label>Waktu Perusahaan</label>
		<input type="text" name="waktu" class="form-control" placeholder="Input waktu...">
	</div>

	<div class="form-group">
		<label>Alamat Perusahaan</label>
		<input type="text" name="alamat" class="form-control" placeholder="Input alamat...">
	</div>

	<div class="form-group">
		<label>Quota Perusahaan</label>
		<input type="text" name="quota" class="form-control" placeholder="Input quota...">
	</div>

	<div class="form-group">
		<label>Pembingbing Perusahaan</label>
		<input type="text" name="pembingbing" class="form-control" placeholder="Input Pembingbing...">
	</div>

	<div class="form-group">
		<label>Gambar</label>
		<input type="file" name="gambar" class="form-control" placeholder="Masukan Gambar..." required="">
	</div>

	<div class="form-group">
		<textarea name="deskripsi" placeholder="deskripsi Perusahaan..." class="form-control"></textarea>
	</div>

	<div class="form-group">
		<button class="btn btn-primary" name="submit">Submit</button>
	</div>


</form>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>

<?php 
if(isset($_POST['submit'])){
	//koneksi
	include "koneksi/conn.php";
	include "upload.php";
	//Ambil data
	$nama = htmlspecialchars($_POST['nama']);
	$kategori = htmlspecialchars($_POST['kategori']);
	$waktu = htmlspecialchars($_POST['waktu']);
	$alamat = htmlspecialchars($_POST['alamat']);
	$deskripsi = htmlspecialchars($_POST['deskripsi']);
	$quota = htmlspecialchars($_POST['quota']);
	$pembingbing = htmlspecialchars($_POST['pembingbing']);
	$gambar = upload();
	

	
	
	//query data
	$queryn = $conn->query("INSERT INTO perusahaan VALUES('', '$nama', '$kategori','$waktu', '$alamat', '$quota', '$deskripsi', '$pembingbing','$gambar') ");
	//header
	if(!$query){
 		die(mysqli_error($conn));
 	}else{
 		echo ' . ?>
        <script type="text/javascript">
          swal({
              title: "Berhasil!",
              text: "Perusahaan Berhasil Di tambahkan",
              icon: "success",
              button: "Oke!",
            });

        </script>
      <?php '  ;
 	}
}

 ?>