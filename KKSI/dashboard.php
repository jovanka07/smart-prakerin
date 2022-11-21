 <div id="page-wrapper">

        <div class="row">
          <div class="col-lg-12">
            <h1>Wellcome <small>Smart Prakerin</small></h1>
            <ol class="breadcrumb">
              <li class="active"><i class="fa fa-user"></i> <?php echo $data['nama']; ?></li>
            </ol>
            <div class="alert alert-success alert-dismissable">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              Welcome to <b>Smart Prakerin</b> Disini anda bisa mengakses Seluruh data siswa yang menjalani Prakerin.
            </div>
          </div>
        </div><!-- /.row -->

        <div class="row">
          <div class="col-lg-3">
            <div class="panel panel-info">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-comments fa-5x"></i>
                  </div>
                  <div class="col-xs-6 text-right">
                    <?php 
                      //koneksi
                      include "koneksi/conn.php";
                      //query
                      $query_perusahaan = $conn->query("SELECT * FROM perusahaan");
                      //Untuk menghitung jumblah data pada table database
                      $data_perusahaan = mysqli_num_rows($query_perusahaan);
                     ?>
                    <p class="announcement-heading"><?php echo $data_perusahaan; ?></p>  
                    <p class="announcement-text">Jumblah Perusahaan </p>
                  </div>
                </div>
              </div>
              <!-- page sama get Harus Sama Agar bisa di klik -->
              <a href="?page=view-perusahaan">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Lihat Perusahaan
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                    <?php 
                        if(@$_GET['page'] == 'view-perusahaan'  ){
                          include 'view-perusahaan.php';
                        }
                     ?>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-warning">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-check fa-5x"></i>
                  </div>
                  <?php 
                    $query_siswa = $conn->query("SELECT * FROM user WHERE status_role ='pending' ");
                    $data_siswa = mysqli_num_rows($query_siswa);
                   ?>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?php echo $data_siswa; ?></p>
                    <p class="announcement-text">Data Pending</p>
                  </div>
                </div>
              </div>
              <a href="?page=pending">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Semua Data Pending
                    </div>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-danger">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-tasks fa-5x"></i>
                  </div>
                  <?php 
                    $query_proses = $conn->query("SELECT * FROM user WHERE status_role ='proses' ");
                    $data_proses = mysqli_num_rows($query_proses);
                   ?>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?php echo $data_proses; ?></p>
                    <p class="announcement-text">Data Proses</p>
                  </div>
                </div>
              </div>
              <a href="?page=proses">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Lihat Semua Data Proses
                    </div>
                    <?php 
                    if(@$_GET['page'] == 'proses'){
                      include 'proses.php';
                    }

                     ?>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="panel panel-success">
              <div class="panel-heading">
                <div class="row">
                  <div class="col-xs-6">
                    <i class="fa fa-comments fa-5x"></i>
                  </div>
                  <?php 
                      $query_sukses = $conn->query("SELECT * FROM user WHERE status_role ='sukses' ");
                      $data_sukses = mysqli_num_rows($query_sukses);
                   ?>
                  <div class="col-xs-6 text-right">
                    <p class="announcement-heading"><?php echo $data_sukses; ?></p>
                    <p class="announcement-text">Data Sukses</p>
                  </div>
                </div>
              </div>

              <a href="?page=sukses">
                <div class="panel-footer announcement-bottom">
                  <div class="row">
                    <div class="col-xs-6">
                      Lihat semua data sukses
                    </div>
                    <?php 
                        if(@$_GET['page'] == 'sukses'){
                          include 'sukses.php';
                        }

                     ?>
                    <div class="col-xs-6 text-right">
                      <i class="fa fa-arrow-circle-right"></i>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
 </div>