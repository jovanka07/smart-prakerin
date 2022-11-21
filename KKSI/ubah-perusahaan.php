<?php 
 include 'koneksi/conn.php';
 $id = $_GET['id'];
 $query = $conn->query("SELECT * FROM perusahaan WHERE id_perusahaan ='$id' ");
 $data = $query->fetch_array();
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bs/css/bootstrap.min.css">
	
	<link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32" />
	<style type="text/css">
		.container{
			width: 80%;
			padding: 20px;
			box-sizing: border-box;
			border:1px solid grey;
			border-radius: 20px;
			box-shadow: 3px 3px 6px grey;
			margin: 20px auto;
			
		}
		button{
			width: 100%;
		}
		a{
			width: 100%;
		}
	</style>
</head>
<body>
<div class="container">
	<h5 class="text-center">Update Perusahaan</h5>
	<form action="" method="post" autocomplete="off" enctype="multipart/form-data">
		<div class="form-group">
			<label>Nama Perusahaan</label>
			<input type="hidden" name="GambarLama" value="<?php echo $data['img']; ?> ">
			<input type="text" name="nama" class="form-control"  value="<?php echo $data['nama_perusahaan']; ?> ">
		</div>

		<div class="form-group">
			<label>Kategori Perusahaan</label>
			<input type="text" name="kategori" class="form-control" value="<?php echo $data['kategori_perusahaan']; ?> ">
		</div>

		<div class="form-group">
			<label>Waktu Perusahaan</label>
			<input type="text" name="waktu" class="form-control" value="<?php echo $data['waktu_perusahaan']; ?> ">
		</div>

		<div class="form-group">
			<label>Alamat</label>
			<input type="text" name="alamat" class="form-control" value="<?php echo $data['alamat']; ?> ">
		</div>
		<div class="form-group">
			<label>Deskripsi</label>
			<input type="text" name="deskripsi" class="form-control" value="<?php echo $data['deskripsi']; ?> ">
		</div>

		<div class="form-group">
			<label>Pembingbing Perusahaan</label>
			<input type="text" name="pembingbing" class="form-control" value="<?php echo $data['pembingbing_perusahaan']; ?> ">
		</div>

		<div class="form-group">
			<label>Gambar</label>
			<input type="file" name="gambar" class="form-control" >
		</div>

		<div class="form-group">
			<label>Quota</label>
			<input type="text" name="quota" value="<?php echo $data['quota']; ?> " >
		</div>

		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-primary">Submit</button>
			<br> <br>
			<a href="halaman-admin.php" class="btn btn-info">Back</a>
		</div>
	</form>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</body>
</html>

<?php 
//jika tombol submit di tekan
include "upload.php";
if(isset($_POST['submit'])){
	$nama = trim(htmlspecialchars($_POST['nama']));
	$kategori = trim(htmlspecialchars($_POST['kategori']));
	$waktu = trim(htmlspecialchars($_POST['waktu']));
	$alamat = trim(htmlspecialchars($_POST['alamat']));
	$quota = trim(htmlspecialchars($_POST['quota']));
	$deskripsi = trim(htmlspecialchars($_POST['deskripsi']));
	$pembingbing = htmlspecialchars($_POST['pembingbing']);
	$GambarLama = $_POST['GambarLama'];
	if($_FILES['gambar']['error'] === 4){
		$gambar = $GambarLama;
	}else{
		$gambar = upload();
	}

	$queryn = $conn->query("UPDATE perusahaan SET 
							nama_perusahaan = '$nama',
							kategori_perusahaan = '$kategori',
							waktu_perusahaan = '$waktu',
							alamat = '$alamat',
							quota = '$quota',
							deskripsi = '$deskripsi',
							pembingbing_perusahaan = '$pembingbing',
							img = '$gambar'
							WHERE id_perusahaan = '$id'
		");

	if(!$query){
 		die(mysqli_error($conn));
 	}else{
 		echo ' . ?>
        <script type="text/javascript">
          swal({
              title: "Berhasil di ubah!",
              text: "Data Telah di ubah!",
              icon: "success",
              button: "Oke!",
            });

        </script>
      <?php '  ;
 	}
}

 ?>