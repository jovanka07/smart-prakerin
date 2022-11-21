<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="bs/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" type="text/css" href="font/css/all.min.css">

  <link rel="stylesheet" href="./css1/index.css">
  <link rel="stylesheet" href="./css1/responsive.css">
	
	<link rel="icon" type="image/png" href="img/favicon-32x32.png" sizes="32x32" />
	<style>
		
		.poster{
			max-width: 100%;
			height: 760px;
			background:url(img/bg3.jpg);
			background-size: 100% 100%;
			position: relative;
			background-repeat: no-repeat;
			background-attachment: fixed;
			display: flex;
			/* clip-path: polygon(0 0, 100% 0, 100% 50%, 100% 99%, 0 77%); */
		}
		
		/*Banner Color*/
		
		.poster-content{
			width: 100%;
			height: 100%;
			background-image: linear-gradient(121deg, rgb(2, 0, 36) 0%, rgba(61, 231, 196, 0.773) 0%, rgba(26, 179, 148, 0.75) 38%, rgba(111, 222, 199, 0.73) 84%, rgba(66, 185, 161, 0.675) 94%);
		}

		@media(max-width: 800px){
			.ponsel{
				display: none;
			}
			.poster-content{
				display: flex;
			}
			.flex{
				position: absolute;
				margin: 100px 0 0 -550px ;
			}
			
			h3{
				margin: 20px 0 0 600px;
			}

			
		}
		@media(min-width: 800px){
			.tema{
				margin: 200px 0 0 600px;
			}
		}
	</style>
</head>
<body>


<nav class="navbar navbar-expand-lg ">
	  <a class="navbar-brand" href="#"><img src="img/bendera.png" style="width: 50px; height: 80%;"> SmartPrakerin</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="text-white fas fa-bars"></i>
	  </button>

	  <div class="collapse navbar-collapse" id="navbarSupportedContent">
	    <ul class="navbar-nav mr-auto">
	      <li class="nav-item active">
	        <a class="home nav-link" href="index.php"><i class="fas fa-home"></i> Halaman Utama </a>
	      </li>
	      <li class="nav-item active">
	        <a class="home2 nav-link" href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a>
	      </li>

	      <li class="nav-item active">
	        <a class="home2 nav-link" href="daftar.php"><i class="fas fa-user-plus"></i> daftar</a>
	      </li>
	      
	    </ul>
	    
	  </div>
</nav>

<div class="poster">
	<div class="poster-content">
		<div class="flex">
		<h3 class="tema" = style="   font-size:45px; font-weight: bold; color: white; font-family: fantasy; font-style: italic; ">Smart Prakerin</h3>
		<p class="oyo" style=" margin: 20px 50px 0 600px ; color: white; font-style: italic; font-size: 20px;">Smart Prakerin Adalah Sebuah Platform yang menyediakan berbagai Layanan <br> Informasi Seputar Mengenai Prakerin(Praktek Kerja Industri)  Dan Serta <br>Siswa Dapat Memilih Perusahaan Sesuai Dengan Fashion Nya.</p>
		<a href="login.php" class=" a btn btn-primary" style="float: right; margin: 20px 0 0 600px ; position: absolute;">Login</a>
		<a href="daftar.php" class="a btn btn-info" style="float: right; margin: 20px 0  0 720px ; position: absolute;">Daftar</a>
		</div>
	</div>
</div>
<div class="ponsel"></div>

<section class="destination" id="destination">
    <div class="content">
      <h2 class="title-text" style="color: black;">Perusahaan YG bekerjasama dgn Seklah</h2>
      <p class="text" style="color: black; margin: 40px 0 0 0;">Berikut Adalah Perusahaan-perusahaan, Yang dipercayai dan ditunjuk untuk berkerja sama dengan Sekolah. Alasan beberapa perusahaan mau bekerja sama dengan SMK MUTU karena calon tenaga kerja yang direkrutnya masih muda dan penuh obsesi, apalagi mereka juga telah dibekali ilmu pengetahuan dibidangnya masing-masing</p>
    </div>
    <div class="destination__list">
      <div class="box">
        <div class="img__box">
          <img src="img_gambar/honda.png" class="fit-bg" alt="">
        </div>
        <div class="content">
          <h2 style="color: black;">PT.Astra Honda Motor <br> <span>Karawang</span></h2>
        </div>
      </div>
      <div class="box">
        <div class="img__box">
          <img src="img_gambar/yamaha.jpg" class="fit-bg" alt="">
        </div>
        <div class="content">
          <h2 style="color: black;" >PT.Yamaha Motor Indonesia <br> <span>Karawang</span></h2>
        </div>
      </div>
      <div class="box">
        <div class="img__box">
          <img src="img_gambar/hino.jpg" class="fit-bg" alt="">
        </div>
        <div class="content">
          <h2 style="color: black;">PT.Hino Indonesia <br> <span>Karawang/Purwakarta</span></h2>
        </div>
      </div>
      <div class="box">
        <div class="img__box">
          <img src="img_gambar/pwk.jpg" class="fit-bg" alt="">
        </div>
        <div class="content">
          <h2 style="color: black;">Desa Bungursari <br> <span>Purwakarta</span></h2>
        </div>
      </div>
      <div class="box">
        <div class="img__box">
          <img src="img_gambar/pupuk.jpg" class="fit-bg" alt="">
        </div>
        <div class="content">
          <h2 style="color: black;">PT.Pupuk Kujang<br> <span>Cikampek</span></h2>
        </div>
      </div>
      <div class="box">
        <div class="img__box">
          <img src="img_gambar/pindodeli.jpg" class="fit-bg" alt="">
        </div>
        <div class="content">
          <h2 style="color: black;">PT. Pindo <br> <span>Karawang</span></h2>
        </div>
      </div>
      
    </div>
    <a href="#top" class="btn destination-btn">View More</a>
  </section>
  <?php include "footer2.php"; ?>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
</body>
</html>