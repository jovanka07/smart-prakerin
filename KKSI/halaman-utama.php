<?php 
//Harus Login Terlebih Dahulu
session_start();
if(!isset($_SESSION['user'])){
  header("Location:login.php");
}
include 'koneksi/conn.php';
 $id = $_SESSION['data-user'];
 $query = $conn->query("SELECT * FROM user WHERE id_user ='$id' ");
 $data = $query->fetch_array();
 ?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
  <link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32" />
  <style type="text/css">
    .body{
      margin: 105px auto;
      background-color: #fff;
    }
    body{
      background-color: ;
    }
    .img{
      width: 100%;
      height: 300px;
    }
    .img-o{
      width: 100%;
      height: 250px;
    }

    .container{
            flex-wrap: wrap;
            margin: 20px auto;
            height: auto;
            display: flex;
            justify-content: space-around;
            box-sizing: border-box;
            padding: 0;
        }
        .carousel-item{
          height:480px;
        }
        .carousel-item img{
         height:100%;
        }
        .judul{
            padding: 10px;
            box-sizing: border-box;
        }
        .kotak{
            border:1px solid #00000026;
            margin: 20px 20px 30px 0 ;
            box-sizing: border-box;
            width: 30%;
            box-sizing: border-box;
            /*color: white;*/
            /*background-image: linear-gradient(121deg, rgb(2, 0, 36) 0%, rgb(61, 231, 196) 0%, rgb(26, 179, 148) 38%, rgb(111, 222, 199) 84%, rgb(66, 185, 161) 94%);*/
        }
        .content{
            padding: 10px;
            box-sizing: border-box;
        }

        .gambar{
            margin: auto;
            width: 90%;
            height: 250px;
            background-image: url(img/freepik.png);
            background-size: 100% 100%;
        }
        button{
          border:none;
        }
                }
        @media(max-width: 890px){
            .kotak{
                width: 45%;
                margin: 20px 0 0 10px;
            }
            .container-flued{
                padding: 20px;
                box-sizing: border-box;
            }
            .carousel-item{
                height:250px;
            }
            .carousel-item img{
                height:100%;
            }
        }
        @media(max-width: 750px){
            .kotak{
                width: 90%;
            }
        }
    

  </style>
</head>
<body>
<?php include "header.php"; ?>
<div class="body">

<div class="container" style="">
  <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" style="overflow: hidden;width: 100%;">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="img/work.jpg" class="img d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5 style="color:black;">Satu</h5>
        <p style="color:black;">Praktis dan Efesien</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/freepik2.png" class="img d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Dua </h5>
        <p>Lebih Cepat</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="img/freepik3.png" class="img d-block w-100" alt="...">
      <div class="carousel-caption d-none d-md-block">
        <h5>Tiga </h5>
        <p>Bisa diakses dimana saja</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="acarousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>


<div class="container" style=" border-radius: 10px; margin: 40px auto;">

  <div class="alert alert-info alert-dismissable" style="margin: 30px auto;">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Welcome to <b>Smart Prakerin</b> Silahkan Anda pilih perusahaan Sesuai dengan Kriteria yang anda sukaii. :) 

        <p style="color: grey; text-align: center;">*Quota Akan Berkurang Jika Siswa telah di konfirmasi</p>
    </div>
  <?php 
      include "koneksi/conn.php";
      //hard
        $query = $conn->query("SELECT * FROM pengajuan a, perusahaan b, user c WHERE a.id_perusahaan=b.id_perusahaan AND a.id_user=c.id_user");
      $sql = $conn->query("SELECT * FROM perusahaan");
?>
    
      <?php while($data = $sql->fetch_array()) : ?>
       <div class="kotak">
           <div class="judul">
               <h4 style="font-size: 18px;font-weight: bold; color: #336699;"><?php echo $data['nama_perusahaan']; ?></h4>
               <p style="font-size: 14px; color: #407bbf;"><?php echo $data['kategori_perusahaan']; ?></p>
           </div>
           <div class="gambar"><img class="img-o" src="img_gambar/<?php echo $data['img']; ?> "></div>
           <div class="content">
               <h5 style="margin: 10px 0 0 0 ; font-size: 16px;"><i class="fas fa-clock" style="color:#8585ad; "></i> Waktu : <?php echo $data['waktu_perusahaan']; ?></h5>
               <p><i class="fas fa-users" style="color:#8585ad;"></i> Quota : <?php echo $data['quota']; ?></p>
               <div class="samping" style="display: flex; float: right; margin: 10px 0 15px 0 ;">

                    <button style="border-radius: 20px; padding: 8px; background-color:#8585ad; color: white; "type="button"  data-toggle="modal" data-target="#h-<?php echo $data['id_perusahaan']; ?>" data-whatever="" >View Info</button>


            <div class="modal fade" id="h-<?php echo $data['id_perusahaan']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><p style="color:black;">Info Lengkap</p></h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                     <div class="modal-body">
                        <form>

                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">
                                  <p style="color:black;"><i class="fas fa-user" style="color: #8585ad;"></i> Pebimbing Perusahaan :</p></label>

                                <input type="text" class="form-control" value="<?php echo 
                                    $data['pembingbing_perusahaan']; ?>" id="recipient-name" readonly>
                            </div>
                            <div class="form-group">
                                <label for="message-text" class="col-form-label">

                                    <p style="color:black;"><i class="fas fa-home" style="color:
                                    #8585ad;"></i> Alamat :</p></label>

                                <textarea class="form-control" id="message-text" readonly><?php echo $data['alamat']; ?></textarea>

                            </div>

                            <div class="form-group">
                                <label for="message-text" class="col-form-label">

                                  <p style="color:black;"><i class="fas fa-book-open" 
                                      style="color:#8585ad;"></i> Descripsi :</p></label>

                                <textarea class="form-control" id="message-text"><?php echo $data['deskripsi']; ?></textarea>
                            </div>

                         </form>
                </div>

                         <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button><!-- 
                            <button type="button" class="btn btn-primary">Send message</button> -->
                         </div>
                    </div>
                  </div>
                </div>

                    <!-- Di atas div modal -->
                    <?php if($data['quota'] != 0){
                    ?><a style="margin: 0 0 0 10px; border-radius: 20px;           background-color:#6ecace;
                    " 
                          href="tambah-pengajuan.php?id=<?php echo $data["id_perusahaan"]; ?> "
                          class="btn" 
                          onclick="return confirm('Yakin Ingin Mengajukan?');" >ajukan data </a>
                    <?php
                  }
                  ?>
               </div>
           </div>
       </div>
     <?php endwhile; ?>
  </div>
  <?php include "footer.php"; ?>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
<script type="text/javascript">
    $('#exampleModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  modal.find('.modal-title').text('Info Lengkap ' )
  modal.find('.modal-body input').val(recipient)
})
</script>
</body>
</html>