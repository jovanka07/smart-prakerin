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
	<link rel="stylesheet" type="text/css" href="bs/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    
  <link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32" />
</head>
<body>
<div class="container">
<table class="table table-striped table-hover " id="table_id" class="display">
  <thead>
    <tr>
      <th scope="col">Nama</th>
      <th scope="col">Kelas</th>
      <th scope="col">Jurusan</th>
      <th scope="col">Nama Lengkap</th>
      <th scope="col">Status</th>
      <th scope="col" class="text-center">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    $id = $_GET['id'];
    	include "koneksi/conn.php";
      //Jadi url id_perusahaan harus sama dengan database contoh : id perusahaan 4 di id_pengajuan harus id_perusahaan nya 4
      //NOTE JIKA PERUSAHAAN YANG DI PAKAI YA ID_PERUSAHAAN
    	$query = $conn->query("SELECT * FROM pengajuan a, perusahaan b, user c
    							WHERE a.id_perusahaan=b.id_perusahaan AND a.id_user=c.id_user
    							AND a.id_perusahaan = '$id'
    		");
    	while($data= $query->fetch_array()){
    		?>
    			<tr>
    				<td><?php echo $data['nama']; ?></td>
    				<td><?php echo $data['kelas']; ?></td>
    				<td><?php echo $data['jurusan']; ?></td>
    				<td><?php echo $data['nama_lengkap']; ?></td>
            <td><p class="btn btn-info btn-sm"><?php echo $data['status_role']; ?></p></td>

            <td class="text-center"><a class="btn btn-danger btn-sm" 
                  href="hapus-pengajuan-admin.php?id=<?php echo $data['id_pengajuan'] ?> "
                  onclick="return confirm('Hapus Siswa') " >Hapus</a>
                    |
                <a class="btn btn-primary btn-sm"
                 href="ubah-pengajuan.php?id=<?php echo $data['id_user']; ?> "
                 onclick="return confirm('Update Data Siswa?') " >Update Data Siswa</a>
                </td>

              
    			</tr>
    		<?php
    	}
     ?>
      
  </tbody>
</table>
</div>
<a href="halaman-admin.php" class="btn btn-primary btn-sm ml-10">Kembali Ke Halaman Utama</a>

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