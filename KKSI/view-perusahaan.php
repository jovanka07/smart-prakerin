<?php 
if(!isset($_SESSION['user'])){
  header("Location:login.php");
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
  <!-- datatables.net di cdn -->
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <style type="text/css">
      .container{
      width: auto;
      background-color: #fff;
      margin: 50px auto;
      border:1px solid grey;
      padding: 15px;
      box-sizing: border-box;
      overflow: auto;
    }
    </style>
</head>
<body>
<!-- Harus ada width 100% agar tidak ada horizontal bawah -->
<div class="row" style="width: 100%;">
          <div class="col-lg-12">
            <h1><small style="margin-left: 20px">Halaman View Perusahaan</small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-user"></i> <?php echo $data['nama']; ?></li>
            </ol>
            <div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Hallo <b><?php echo $data['nama']; ?></b> , NOTE : Jika Di Perusahaan Masih Ada Data Siswa Perusahaan tsb Tidak bisa di Hapus, -Have a nice day!
            </div>
          </div>
        </div><!-- /.row -->

<div class="container">
  <table class="table table-striped table-responsive table-hover" id="table_id" class="display">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Perusahaan</th>
      <th scope="col">Kategori Perusahaan</th>
      <th scope="col">Waktu Perusahaan</th>
      <th scope="col">Alamat Perusahaan</th>
      <th scope="col">Descripsi</th>
      <th scope="col">Pembingbing</th>
      <th scope="col">Quota</th>
      <th scope="col">Detail</th>
      <th scope="col">Hapus</th>
      <th scope="col">Update</th>
    </tr>
  </thead>
  <tbody>
    <?php 
      //Koneksi
      include "koneksi/conn.php";
      //Query Data
      $sql = $conn->query("SELECT * FROM perusahaan");
      $i = 1;
      while($data = $sql->fetch_array()){
        ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data["nama_perusahaan"]; ?></td>
            <td><?php echo $data["kategori_perusahaan"]; ?></td>
            <td><?php echo $data["waktu_perusahaan"]; ?></td>
            <td><?php echo $data["alamat"]; ?></td>
            <td><?php echo $data["deskripsi"]; ?></td>
            <td><?php echo $data["pembingbing_perusahaan"]; ?></td>
            <td><?php echo $data["quota"]; ?></td>
            <td><a href="view-siswa.php?id=<?php echo $data['id_perusahaan']; ?> " class="btn btn-info btn-sm">Lihat Siswa</a></td>
            <td><a href="hapus-perusahaan.php?id=<?php echo $data['id_perusahaan']; ?> " class="btn btn-danger btn-sm" onclick="return confirm('Yakin?');">Hapus</a></td>
            <td><a href="ubah-perusahaan.php?id=<?php echo $data['id_perusahaan']; ?> " class="btn btn-primary btn sm">Update</a></td>
          </tr>
        <?php
        $i++;
      }

     ?>
  </tbody>
</table>


</div>
<!-- //cdn jquery -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<!-- datatables.net di cdn -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
<script type="text/javascript">
    $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
</body>
</html>