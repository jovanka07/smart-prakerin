<?php 
if(!isset($_SESSION['user'])){
  header("Location:login.php");
}
 ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	 <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
	<style type="text/css">
		.container{
			width: auto;
			margin: 50px auto;
			border:1px solid grey;
			background-color: #fff;
			padding: 15px;
			box-sizing: border-box;
			box-shadow: 3px 3px 5px grey;
			border-top-right-radius: 50px;
			border-bottom-left-radius: 50px;
			overflow: auto;
		}
	</style>
</head>
<body>
	<!-- Harus ada width 100% agar tidak ada horizontal bawah -->
<div class="row" style="width: 100%;">
          <div class="col-lg-12">
            <h1><small style="margin-left: 20px"> Pesan</small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-user"></i> <?php echo $data['nama']; ?></li>
            </ol>
            <div class="alert alert-info alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Hallo <b><?php echo $data['nama']; ?></b> , Silahkan Kamu Mengecek Pesan Yang di kirim Siswa
            </div>
          </div>
        </div><!-- /.row -->
	<div class="container">
		<table class="table table-striped table-responsive" id="table_id" class="display">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Nama Lengkap</th>
      <th scope="col">Pesan</th>
      <th scope="col">Status account</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    	include 'koneksi/conn.php';
    	$query = $conn->query("SELECT * FROM user WHERE status_role = 'proses' OR status_role ='sukses' ");
    	$i = 1;
    	while($data = $query->fetch_array()){
    		?>
    			<tr>
	    			<td><?php echo $i; ?></td>
	    			<td><?php echo $data['nama_lengkap']; ?></td>
	    			<td><?php echo $data['pesan']; ?></td>
	    			<td>
	    				<?php 
	    					if($data['status_role'] == 'pending'){
	    						?>
	    							<p class="btn btn-warning">Pending</p>
	    						<?php
	    					}else if($data['status_role'] == 'proses'){
	    						?>
	    							<p class="btn btn-info">Proses</p>
	    						<?php
	    					}else if($data['status_role'] == 'sukses'){
	    						?>
	    							<p class="btn btn-success">Sukses</p>
	    						<?php
	    					}
	    				 ?>
	    			</td>
	    			<td><a href="ubah-pesan.php?id=<?php echo $data['id_user']; ?> " onclick="return confirm('Konfirmasi Pesan?');" class="btn btn-primary btn-sm">
	    				Konfirmasi Pesan
	    			</a></td>
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