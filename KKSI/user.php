<?php
session_start();
if(!isset($_SESSION['user'])){
  header("Location:login.php");
}
  ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32" />
  <style>

		.card-img{
			width: 100%;
			height: 100%;
		}
    .container{
      margin: 120px auto;
      margin-bottom:-25px;
    }
	</style>
</head>
<body>
<?php include "header.php"; ?>
<div class="container">
   <div class="oyo card mb-3" style="max-width: 80%; margin: 30px auto;
      box-shadow: 3px 3px 3px #dab3ff; ">
  <div class="row no-gutters">
    <div class="col-md-4">
      <img src="img_gambar/user.png" class="card-img" alt="...">
    </div>
    <?php 
        include 'koneksi/conn.php';
        $id_user = $_SESSION['data-user'];
        $sql = $conn->query("SELECT * FROM user WHERE id_user ='$id_user' ");
        $tampil = $sql->fetch_array();
     ?>
    <div class="col-md-8">
      <div class="card-body">
           <h5 class="card-title">Nama Lengkap
            <strong style="margin: 116px; font-size: 17px;"> : <?php echo $tampil['nama_lengkap']; ?></strong></h5>

        <h5 class="card-title">Username
         <strong style="margin: 158px; font-size: 17px;">: <?php echo $tampil['nama']; ?></strong></h5>

        <h5 class="card-title">Password
         <strong style="margin: 163px; font-size: 17px;">: <input type="password" value="<?php echo $tampil['password']; ?>" style="border:none;"></strong></h5>

        <h5 class="card-title">kelas 
          <strong style="margin: 204px; font-size: 17px;"> : <?php echo $tampil['kelas']; ?></strong></h5>

        <h5 class="card-title">Jurusan 
          <strong style="margin: 180px; font-size: 17px;" > : <?php echo $tampil['jurusan']; ?></strong></h5>

        <h5 class="card-title">Jenis Kelamin
         <strong style="margin: 127px; font-size: 17px;">: <?php echo $tampil['jk']; ?></strong></h5>

        <p class="card-text"><small class="text-muted"><?php echo date('Y-m-d'); ?></small></p>

        <a href="ubah-user.php?id=<?php echo $tampil['id_user']; ?> " class="btn btn-outline-secondary">Ubah</a>
      </div>
    </div>
  </div>
</div>
</div>
<br><br><br>
<?php include "footer.php"; ?>
</body>
</html>