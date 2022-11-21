<?php 
include 'koneksi/conn.php';

session_start();
if(!isset($_SESSION['user'])){
  header("Location:login.php");
}
$id = $_SESSION['data-user'];
$query = $conn->query("SELECT * FROM user WHERE id_user ='$id' ");
$data = $query->fetch_array();
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" type="text/css" href="/DataTables/datatables.css">
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
      <!-- Bootstrap core CSS -->
    <link href="bs/css/bootstrap-admin.css" rel="stylesheet">

  <link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32" />

    <!-- Add custom CSS here -->
    <link href="bs/css/admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font/css/all.min.css">
    <title>Halaman Admin</title>
    <style type="text/css">
        body{
          background-color: #d9d9d9;
        }     
      nav{
        background-image: linear-gradient(#336699,#4080bf,#538cc6);
        box-shadow: 0px 3px 5px grey;
      }
      .jo{
        background-color:#336699;

         /*background-image: linear-gradient( rgb(26, 179, 148) 58%, rgb(111, 222, 199));*/
         box-shadow: 3px 0px 5px grey;

     }
     .gambar-img{
      width: 30px;
      height: 30px;
     }
     .van{
      background-color: white;
     }
     .dropdown-menu{
       
      background-color:#336699;
        
     }
     @media(max-width: 700px){
      nav{
        box-shadow: none;
      }
     }
    </style>

    
  </head>

  <body>

    <div id="wrapper">

      <!-- Sidebar -->
      <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="" style="color: white; font-weight: bold; "><img src="img/bendera.png" class="gambar-img"> Smart Prakerin</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class=" jo nav navbar-nav side-nav">
            <li><a href="?page=dashboard" style="color:white;"><i class="fa fa-home"></i> Dashboard</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"  style="color:white;"><i class="fas fa-chalkboard-teacher"></i> Data Prakerin <b class="caret"></b></a>
              <ul class="dropdown-menu">

                <li><a href="?page=pending"  style="color:white;">Menunggu Konfirmasi</a></li>
                <li><a href="?page=proses"  style="color:white;">Sedang Prakerin</a></li>
                <li><a href="?page=sukses"  style="color:white;">Selesai Prakerin</a></li>
                
              </ul>
            </li>

            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color:white;"><i class="fa fa-home"></i> Data Perusahaan <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="?page=view-perusahaan"  style="color:white;">View Perusahaan</a></li>
                <li><a href="?page=tambah-perusahaan-admin"  style="color:white;">Tambah Perusahaan</a></li>
                
              </ul>
              <li><a href="?page=pesan"  style="color:white;"><i class="fa fa-envelope"></i> Pesan <span class="badge">!</span></a></li>
          </ul>




          <ul class="nav navbar-nav navbar-right navbar-user">
            
            <li class=" van dropdown user-dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown"  style="color:lightskyblue;" ><i class="fa fa-user"></i> <?php echo $data['nama']; ?> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="?page=profile"  style="color:black;"><i class="fas fa-user-circle"></i> Profile</a></li>
                <li><a href="?page=tambah-admin"   style="color:black;"><i class="fa fa-user-friends"></i>Tambah Admin</a></li>

              <li><a href="?page=tambah-siswa"  style="color:black;"><i class="fas fa-user-plus"></i> Tambah Siswa</a></li>
                <li class="divider"></li>
                <li><a href="logout.php"  style="color:black;"><i class="fa fa-power-off"></i> Log Out</a></li>
              </ul>
            </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </nav>
        <?php 
        //@ sama aja isset
        //Untuk Menyambungkan include halaman
            if(@$_GET['page'] == 'dashboard' || @$_GET['page'] == '' ){
             	include 'dashboard.php';
            }else if(@$_GET['page'] == 'pending'){
              include 'pending.php';
            }else if(@$_GET['page'] == 'view-perusahaan'){
            	include 'view-perusahaan.php';
            }else if(@$_GET['page'] == 'tambah-perusahaan-admin'){
            	include 'tambah-perusahaan-admin.php';
            }else if(@$_GET['page'] == 'proses'){
            	include 'proses.php';
            }else if(@$_GET['page'] == 'sukses'){
            	include 'sukses.php';
            }else if(@$_GET['page'] == 'profile'){
              include 'profile.php';
            }else if(@$_GET['page'] == 'pesan'){
              include 'pesan.php';
            }else if(@$_GET['page'] == 'tambah-admin'){
              include 'tambah-admin.php';
            }else if(@$_GET['page'] == 'tambah-siswa'){
              include 'tambah-siswa.php';
            }
         ?>
      </div><!-- /#page-wrapper -->

    </div><!-- /#wrapper -->

    
    <!-- <script src="bs/js/jquery-1.10.2.js"></script> -->
    <!-- JavaScript -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<!-- datatables.net di cdn -->
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
    <script type="text/javascript">
        $(document).ready( function () {
        $('#table_id').DataTable();
    } );
    </script>
 <!-- JavaScript -->
    
    <script src="bs/js/bootstrap-jvk.js"></script>
  </body>
</html>