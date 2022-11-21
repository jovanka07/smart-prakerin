<?php
session_start();
if(!isset($_SESSION['user'])){
  header("Location:login.php");
} 
include 'koneksi/conn.php';
$id = $_GET['id'];
$query = $conn->query("SELECT * FROM user WHERE id_user='$id' ");
$data = $query->fetch_array();
 ?>

  <!DOCTYPE html>
  <html>
  <head>
  	<title></title>
	  <link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32" />
  	<link rel="stylesheet" type="text/css" href="bs/css/bootstrap.min.css">
  	<style>
      .container{
        margin: 105px auto;
      }
    .card-img{
      width: 100%;
      height: 60%;
    }
    input:hover{
      border:inline;
      border: 2px solid lightgreen;
    }
  </style>
  </head>
  <body>
    <?php include 'header.php'; ?>
 <div class="container">
 			<div class="oyo card mb-3" style="max-width: 80%; margin: 30px auto;
        box-shadow: 3px 3px 3px #dab3ff;">
  <div class="row no-gutters">
    <div class="col-md-5">
      <img src="img_gambar/user.png" class="card-img" alt="...">
    </div>
 
    <div class="col-md-7">
      <div class="card-body">
        <form action="" method="post" autocomplete="off">
           <div class="form-group">
	           	<label>Nama Lengkap :</label>
	           	<input type="text" name="nama_lengkap" value="<?php echo $data['nama_lengkap']; ?> " class="form-control"	>
           </div>

           <div class="form-group">
	           	<label>Username :</label>
	           	<input type="text" name="nama" value="<?php echo $data['nama']; ?> " class="form-control"	>
           </div>

      
        	<div class="form-group">
	           	<label>Password :</label>
	           	<input type="password" name="password" value="<?php echo $data['password']; ?> " class="form-control"	>
           </div>


        	<div class="form-group">
	           	<label>Kelas :</label>
	           	<select name="kelas" class="form-control">
	           		<option value="X">X</option>
	           		<option value="XI">XI</option>
	           		<option value="XII">XII</option>
	           	</select>
           </div>
           
<div class="form-group">
	<label>Jurusan :</label>
		<select class="form-control" name="jurusan" >
			<option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
			<option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
			<option value="Teknik Sepeda Motor">Teknik Sepeda Motor</option>
			<option value="Teknik bisnis Sepeda Motor">Teknik bisnis Sepeda Motor</option>
			<option value="Teknik Kendaraan Ringan">Teknik Kendaraan Ringan</option>
		</select>
</div>
        <div class="form-group">
        	<label>Jenis Kelamin :</label>
        	<input type="radio" name="jk" required="" value="laki-laki" id="lk"><label for="lk">Laki Laki</label>
        	<input type="radio" name="jk" required="" value="perempuan" id="pr"><label for="pr">Perempuan</label>
        </div>

        
       
        		<div class="form-group">
		        	<label>Kirim Pesan :</label>
		        	<textarea name="pesan" autofocus="" placeholder="Silahkan Isi Pesan Mu" style="background-color: linen;"><?php echo $data['pesan']; ?></textarea>
		        </div>
		<a href="data-proses.php" class="btn btn-outline-secondary">Back</a>
        <button name="submit" type="submit" class="btn btn-success">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>
 		</div>
    <?php include "footer.php"; ?>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </body>
  </html>
<?php 
 if(isset($_POST['submit'])){
 	//ambil data
 	$nama_lengkap = trim(htmlspecialchars($_POST['nama_lengkap']));
 	$password = trim(htmlspecialchars($_POST['password']));
 	$nama = trim(htmlspecialchars($_POST['nama']));
 	$kelas = trim(htmlspecialchars($_POST['kelas']));
 	$jurusan = trim(htmlspecialchars($_POST['jurusan']));
 	$jk = trim(htmlspecialchars($_POST['jk']));
 	$pesan = trim(htmlspecialchars($_POST['pesan']));

 	$query = $conn->query("UPDATE user SET
 							nama='$nama',
 							password = '$password',
 							nama_lengkap= '$nama_lengkap',
 							jk = '$jk',
 							kelas = '$kelas',
 							jurusan = '$jurusan',
 							pesan = '$pesan'
 							WHERE id_user= '$id'
 		");

 	if(!$query){
 		die(mysqli_error($conn));
 	}else{
 		echo ' . ?>
        <script type="text/javascript">
          swal({
              title: "Berhasil!",
              text: "User Berhasil di ubah",
              icon: "success",
              button: "Oke!",
            });

        </script>
      <?php '  ;
 	}
 }

 ?>