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
  <style>
    /* body{
      background-color: #f2f2f2;
    }
    .body{
      margin: 77px auto;
      height: 500px;
      display: flex;
    }
    .card{
      margin-top:50px;
      border:1px solid grey; 
      position: relative; 
      box-shadow: 0px 0px 0px grey;
    }
    .card-img{
      width: 100%;
      height: 100%;
    }

    @media(max-width: 850px){
      .body{
        height: 770px;
        margin: 50px auto;
      }
      .jo{
        max-width: 80%;
      } */
    }
  </style>
  <link rel="stylesheet" href="style/design1.css">
</head>
<body>
<?php include "header.php"; ?>
<div class="body">
<div class="container" style="margin: auto;">
      <?php 
      include 'koneksi/conn.php';
        $id_user = $_SESSION['data-user'];
        //query data
      //Ambil Semua data yang User Sedang Login Sekarang pakai $_SESSION['data-user'] di file login.php
        $query = $conn->query("SELECT * FROM pengajuan a, perusahaan b, user c WHERE a.id_perusahaan=b.id_perusahaan AND a.id_user=c.id_user AND c.id_user='$id_user' ");
        $sql = $conn->query("SELECT * FROM user WHERE id_user ='$id_user' ");
        $tampil = $sql->fetch_array();
        //Pengulangan
        while($data = $query->fetch_array()){
      ?>
    <div class="card">
      <div class="card-body">
        <blockquote class="blockquote mb-0">
            <div class="row">
                <div class="col-md-12">
                        <div class="form-group">
                            <label>Nama Siswa :</label>
                            <input type="text" value="<?php echo $data["nama_lengkap"]; ?>" class="form-control" readonly="">
                        </div>
                </div>

                <div class="col-md-6">
                        <div class="form-group">
                            <label>Perusahaan :</label>
                            <input type="text"  value="<?php echo $data["nama_perusahaan"]; ?>" class="form-control" readonly="">
                        </div>
                </div>

                <div class="col-md-6">
                        <div class="form-group">
                            <label>Kategori Perusahaan</label>
                            <input type="text" value="<?php echo $data["kategori_perusahaan"]; ?>" class="form-control" readonly="">
                        </div>
                </div>

                <div class="col-md-6">
                        <div class="form-group">
                            <label>Dari Tanggal :</label>
                            <input type="text" name="" value="<?php echo $data["dari_tanggal"]; ?>" class="form-control" readonly="">
                        </div>
                </div>

                <div class="col-md-6">
                        <div class="form-group">
                            <label>Sampai Tanggal :</label>
                            <input type="text" name="" value="<?php echo $data["sampai_tanggal"]; ?>" class="form-control" readonly="">
                        </div>
                </div>

                <div class="col-md-6">
                    <label>Status :</label>
                        <div class="form-group">
                          <?php 
                              if($data['status_role'] == 'pending'){
                                ?>
                                  <p class="btn btn-warning btn-sm" style="width: 100%;">Pending</p>
                                <?php
                              }else if($data['status_role'] =='proses' ){
                                ?>
                                  <p class="btn btn-primary btn-sm" style="width: 100%;">Proses</p>
                                <?php
                              }else{
                                ?>
                                  <p class="btn btn-success btn-sm" style="width: 100%;">Sukses</p>
                                <?php
                              }
                          ?>
                        </div>
                </div>

                <div class="col-md-6">
                  <?php 
                      if($data['status_role'] != 'sukses'){
                        ?> 
                         <label>Aksi :</label>
                          <div class="form-group">
                            <a class="btn btn-danger btn-sm" 
                               href="hapus-pengajuan.php?id=<?php echo $data['id_pengajuan']; ?> "
                               onclick="return confirm('yakin Ingin Membatalkan?');" 
                               style="width: 100%;">Batalkan</a>
                          </div>
                         <?php
                      }
                   ?>
                    
                </div>
<!-- tututp pengulagan while -->
          <?php
        }
       ?>             
            </div>
          <footer class="blockquote-footer"><?php echo date('Y-m-d'); ?><cite title="Source Title"> , TimeLine Mu</cite></footer>
        </blockquote>
      </div>
    </div>
</div>  					

</div>  		
<div class="container" style=" background-color: #f2f2f2; margin: 70px auto; display: flex; justify-content: space-around;  padding:30px ; box-shadow: 4px 4px 5px grey;">
<?php
  $perusahaan = $conn->query("SELECT * FROM pengajuan a, perusahaan b, user c WHERE a.id_perusahaan=b.id_perusahaan AND a.id_user=c.id_user AND c.id_user ='$id_user' ");
  $result = $perusahaan->fetch_array(); 
  if($tampil['status_role'] == 'proses'){
?>
      <div class="card" style="padding: 20px; overflow: auto;">
          <div class="card-header" >
            Catatan
          </div>
          <div class="card-body">
            <blockquote class="blockquote mb-0">
              <h5 style="font-size: 17px;"><strong style="font-size: 22px;">Hallo, Selamat Anda Telah di ACC oleh Admin <b>Smart Prakerin .</b></strong> <br><br> Pembingbing Kamu yaitu <b><?php echo $result['pembingbing_perusahaan']; ?></b> Dan jangan lupa dateng Setiap <b><?php echo $result['waktu_perusahaan']; ?></b></h5>

              <p style="font-size: 17px;font-style: italic;">Note : Jika anda sudah selesai prakerin tetapi <b style="color: blue;">status</b> account mu tidak berubah silahkan Kirim pesan ke admin
               <a href="ubah-user.php?id=<?php echo $result['id_user']; ?> " class="btn btn-info btn-sm">Kirim Pesan</a></p>
              <footer class="blockquote-footer"><?php echo date('Y-m-d'); ?> <cite title="Source Title">Have a nice day!</cite></footer>
            </blockquote>
          </div>
    </div>
     
    <?php
  }else if($tampil['status_role'] == 'pending'){
    ?>
          <div class="card">
              <div class="card-header">
                Pesan
              </div>
              <div class="card-body">
                <blockquote class="blockquote mb-0">
                  <h5>Harap Sabar ya, <br><br> Admin <b>Smart Prakerin</b> Akan Konfirmasi Dalam Waktu 2 * 24 Jam</h5>
                  <footer class="blockquote-footer"><?php echo date('Y-m-d'); ?> <cite title="Source Title"> Have a nice day!</cite></footer>
                </blockquote>
              </div>
        </div>
      
    <?php
  }else{
      ?>
      <div class="row">
          <div class=" card col-md-4" style="width: 18rem; margin: auto;">

            <img src="img_gambar/sertif.png" class="card-img-top" alt="...">
            <div class="card-body">
              <p class="card-text text-center">Silahkan donwload sertifikat anda disini <br> <a href="mpdf/index.php?id=<?php echo $result['id_user']; ?> " target="blank" class="btn btn-info btn sm">Donwload</a></p>
              <!-- <p class="card-text text-center">Silahkan donwload sertifikat anda disini <br> <a href="gambar-download.php?filename=<?//echo $result['img']; ?> " class="btn btn-info btn sm">Donwload</a></p> -->
            </div>
          </div>

          <div class="card col-md-7 " style="height: 200px; border-top-left-radius: 30px; border-bottom-right-radius: 30px; margin: 30px 0 0 20px ; overflow: auto; height: 300px;">
            <div class="card-header">
              Pesan
            </div>
            <div class="card-body">
              <blockquote class="blockquote mb-0">
                <p>Selamat <b><?php echo $result['nama']; ?></b>, Kamu Sudah Menyelesaikan Prakerin. <br><br>
                  <strong style="font-size: 17px; font-style: italic;">Note : Jika Sertifikat anda belum Ada silahkan kirim pesan ke admin 
                    <a href="ubah-user.php?id=<?php echo $result['id_user']; ?>" 
                      class="btn btn-primary btn-sm">Kirim pesan</a></strong>
                </p>
                <footer class="blockquote-footer"><?php echo date('Y-m-d'); ?>, <cite title="Source Title">Have a niceday!</cite></footer>
              </blockquote>
           </div>
</div>

      </div>
      <?php
  }
 ?>
 </div>

<?php include "footer.php"; ?>
</body>
</html>