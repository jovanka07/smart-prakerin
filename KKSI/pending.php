<?php 
if(!isset($_SESSION['user'])){
  header("Location:login.php");
}
 ?>
<!DOCTYPE html>
<html>
<head>
  <!-- datatables.net di cdn -->
    <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

    <title></title>
    <style type="text/css">
        .container{
      width: auto;
      margin: 50px auto;
      border:1px solid grey;
      background-color: #fff;
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
            <h1><small style="margin-left: 20px">Halaman Pending</small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-user"></i> <?php echo $data['nama']; ?></li>
            </ol>
            <div class="alert alert-warning alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Hallo <b><?php echo $data['nama']; ?></b> , Silahkan Kamu Mengkonfirmasi Status Siswa, -Have a nice day!
            </div>
          </div>
        </div><!-- /.row -->


<div class="container">
  <table id="table_id" class="display">
    <thead>
        <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama </th>
            <th scope="col">Kelas</th>
            <th scope="col">Jurusan</th>
            <th scope="col">Nama Perusahaan</th>
            <th scope="col">Kategori Perusahaan</th>
            <th scope="col">status</th>
            <th scope="col">Batalkan</th>
            <th scope="col">Konfirmasi</th>

        </tr>
    </thead>
    <tbody>
        <?php 
      //koneksi
      include "koneksi/conn.php";       
      //query
      $query = $conn->query("SELECT * FROM pengajuan a, perusahaan b, user c WHERE a.id_perusahaan=b.id_perusahaan AND a.id_user=c.id_user AND status_role='pending'");
      //while
      $i = 1;
      while($data = $query->fetch_array()){
        ?>
          <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $data['nama_lengkap']; ?></td>
            <td><?php echo $data['kelas']; ?></td>
            <td><?php echo $data['jurusan'] ;?></td>
            <td><?php echo $data['nama_perusahaan'] ?></td>
            <td><?php echo $data['kategori_perusahaan']; ?></td>
            <td><p class="btn btn-warning btn-sm"><?php echo $data['status_role'];?></p></td>
            <td class="text-center"><a href="hapus-pengajuan-admin.php?id=<?php echo $data['id_pengajuan']; ?> "
              onclick="return confirm('Yakin Ingin Membatalkan?');" class="btn btn-danger btn-sm">Batalkan</a>
              
            </td>
            <td> <a href="ubah-pengajuan.php?id=<?php echo $data['id_user']; ?> " class="btn btn-primary btn-sm" onclick="return confirm('Ingin Mengupdate?')">Konfirmasi</a></td>
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


