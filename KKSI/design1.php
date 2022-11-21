<?php
session_start();
if(!isset($_SESSION['user'])){
  header("Location:login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/design1.css">
	<link rel="stylesheet" type="text/css" href="bs/css/bootstrap.min.css">
</head>
<?php include 'header.php'; ?>
<body style="background-color: #f2f2f2;">
    <div class="container">
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
        <div class="kiri">
            <div class="profil"><img src="img/avatar4e.png" alt="" height="100%"></div>
            <div class="inputan">
                <label for="nama_siswa"> Nama Siswa</label> <br>
                <input type="text" id="nama_siswa" value="<?php echo $data["nama_lengkap"]; ?>" readonly>
                    <br>
                <div class="perusahaan">
                    <div class="kiri_input">
                        <label for="perusahaan">Perusahaan</label> <br>
                        <input type="text" id="perusahaan" value="<?php echo $data["nama_perusahaan"]; ?>" readonly>
                    </div>
                    <div class="kanan_input">
                        <label for="kategori_perusahaan">kategori perusahaan</label> <br>
                        <input type="text" id="kategori_perusahaan"  value="<?php echo $data["kategori_perusahaan"]; ?>">
                    </div>
                </div>
                <label for="jurusan">Jurusan</label> <br>
                <input type="text" id="jurusan" value="<?php echo $data["jurusan"]; ?>" readonly>
            </div>
        </div>

        <div class="kanan">
            <div class="kanan_atas">
                    <div class="judul"><p>Waktu pelaksanaan</p></div>
                    <div class="content-kanan">
                        <p>Dari Tanggal : <span style="font-weight:bold;" ><?php echo $data["dari_tanggal"]; ?></span> </p>
                        <p>Sampai Tanggal : <span style="font-weight:bold;" ><?php echo $data["sampai_tanggal"]; ?></span> </p>
                    </div>
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
                        <?php 
                            if($data['status_role'] != 'sukses'){
                        ?> 
                          <div class="form-group">
                            <a class="btn btn-danger btn-sm" 
                               href="hapus-pengajuan.php?id=<?php echo $data['id_pengajuan']; ?> "
                               onclick="return confirm('yakin Ingin Membatalkan?');" 
                               style="width: 100%;">Batalkan</a>
                          </div>
                         <?php
                      }
                   ?>
            <!-- tututp pengulagan while -->
            </div>
            <?php
                }
            ?>  

            <div class="kanan_bawah">
            <?php
                $perusahaan = $conn->query("SELECT * FROM pengajuan a, perusahaan b, user c WHERE a.id_perusahaan=b.id_perusahaan AND a.id_user=c.id_user AND c.id_user ='$id_user' ");
                $result = $perusahaan->fetch_array(); 
                
            ?>
                <div class="car">
                <div class="header-card">
                </div>
                <div class="card-body">
                <blockquote class="blockquote">
                    <?php
                         if($tampil['status_role'] == 'proses'){
                             ?>
                                 <h5 style="font-size: 17px;"><strong style="font-size: 22px;">Hallo, Selamat Anda Telah di ACC oleh Admin <b>Smart Prakerin .</b></strong> <br><br> Pembingbing Kamu yaitu <b><?php echo $result['pembingbing_perusahaan']; ?></b> Dan jangan lupa dateng Setiap <b><?php echo $result['waktu_perusahaan']; ?></b></h5>

                                <p style="font-size: 17px;font-style: italic;">Note : Jika anda sudah selesai prakerin tetapi <b style="color: blue;">status</b> account mu tidak berubah silahkan Kirim pesan ke admin
                                <a href="ubah-user.php?id=<?php echo $result['id_user']; ?> " class="btn btn-info btn-sm">Kirim Pesan</a></p>
                                <footer class="blockquote-footer"><?php echo date('Y-m-d'); ?> <cite title="Source Title">Have a nice day!</cite></footer>
                             <?php
                         }else if($tampil['status_role'] == 'pending'){
                             ?>
                                <blockquote class="blockquote mb-0">
                                <h5>Harap Sabar ya, <br><br> Admin <b>Smart Prakerin</b> Akan Konfirmasi Dalam Waktu 2 * 24 Jam</h5>
                                <footer class="blockquote-footer"><?php echo date('Y-m-d'); ?> <cite title="Source Title"> Have a nice day!</cite></footer>
                                </blockquote>
                             <?php
                         }else{
                             ?>
                             <p>Selamat <b><?php echo $result['nama']; ?></b>, Kamu Sudah Menyelesaikan Prakerin. <br>
                                <p class="card-text text-left">Silahkan donwload sertifikat anda disini <br> <a href="mpdf/index.php?id=<?php echo $result['id_user']; ?> " target="blank" class="btn btn-info btn sm">Donwload</a></p>

                                <blockquote class="blockquote mb-0">
                                <strong style="font-size: 17px; font-style: italic;">Note : Jika Sertifikat anda belum Ada silahkan kirim pesan ke admin 
                                    <a href="ubah-user.php?id=<?php echo $result['id_user']; ?>" 
                                    class="btn btn-primary btn-sm">Kirim pesan</a></strong>
                                </p>
                                <footer class="blockquote-footer"><?php echo date('Y-m-d'); ?>, <cite title="Source Title">Have a niceday!</cite></footer>
                            </blockquote>
                             <?php
                         }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<?php include "footer.php"; ?>
</html>