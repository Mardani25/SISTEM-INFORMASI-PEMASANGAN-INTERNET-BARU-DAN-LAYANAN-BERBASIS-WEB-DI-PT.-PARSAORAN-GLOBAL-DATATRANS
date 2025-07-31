<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Rumah Sakit HSP</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">
    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

	<style>
		body, html {
			margin: 0;
			padding: 0;
		}
	
		* {
			box-sizing: border-box;
		}
	
		body {
			overflow-x: hidden;
		}
	
		.channel-card, .department-wrap {
			max-width: 100%;
		}
	
		.channel-card:hover {
			transform: translateY(-10px); 
			box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2); 
			background-color: #f2f2f2; 
		}
	
		.channel-card .icon {
			font-size: 40px;
			transition: transform 0.3s ease, color 0.3s ease;
		}
	
		.channel-card:hover .icon {
			transform: rotate(20deg); 
			color: #ff6347;
		}
		
		.channel-card .btn-primary {
			transition: background-color 0.3s ease, transform 0.3s ease;
		}
	
		.channel-card:hover .btn-primary {
			background-color: #30bc45; 
			transform: translateY(5px); 
		}
	
		.department-wrap:hover {
			background-color: #007bff; 
			color: #ffffff; 
			transition: background-color 0.3s ease; 
		}
	
		.department-wrap:hover .icon {
			color: #ffffff; 
			transform: scale(1.2); 
		}
	
		.department-wrap:hover h3 {
			text-shadow: 0 0 10px rgba(255, 255, 255, 0.5); 
		}
	</style>
  </head>
  <body data-spy="scroll" data-target=".site-navbar-target" data-offset="300">
  	<div class="py-1 bg-black top">
    	<div class="container">
    		<div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
	    		<div class="col-lg-12 d-block">
		    		<div class="row d-flex">
		    			<div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
						    <span class="text">Call Center</span>
					    </div>
					    <div class="col-md pr-4 d-flex topper align-items-center">
					    	<div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
						    <span class="text">@internethsp27@gmail.com</span>
					    </div>
					    <div class="col-md-5 pr-4 d-flex topper align-items-center text-lg-right justify-content-end">
						    <p class="mb-0 register-link"><a href="<?php echo e(route('register')); ?>" class="mr-3">Sign Up</a><a href="<?php echo e(route('login')); ?>">Sign In</a></p>
					    </div>  
				    </div>
			    </div>
		    </div>
		</div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light site-navbar-target" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="pasien">IHSP</a>

		  <div class="collapse navbar-collapse" id="ftco-nav">
    		<ul class="navbar-nav nav ml-auto">
        		<li class="nav-item"><a href="#home-section" class="nav-link"><span>Home</span></a></li>
        		<!-- Dropdown untuk Perawatan -->
        		<li class="nav-item"><a href="#jamu-section" class="nav-link"><span>Layanan</span></a></li>
            <li class="nav-item"><a href="#about-section" class="nav-link"><span>About</span></a></li>
        		<li class="nav-item"><a href="login" class="nav-link"><span>Komplain</span></a></li>
        		<li class="nav-item"><a href="#kontak-section" class="nav-link"><span>Kontak</span></a></li>
    		 </ul>
		   </div>
	    </div>
	  </nav>
	  
	<section class="hero-wrap js-fullheight" style="background-image: url('images/2d_dokter.jpg');" data-section="home" data-stellar-background-ratio="0.5">
    	<div class="overlay"></div>
      		<div class="container">
        		<div class="row no-gutters slider-text js-fullheight align-items-center justify-content-start" data-scrollax-parent="true">
					<div class="col-md-6 pt-5 ftco-animate">
						<div class="mt-5">
						<span class="subheading">Welcome to RumahSakit HSP</span>
						<h1 class="mb-4">We are here <br>for your Healty</h1>
						<p class="mb-4">#Hidup Sehat #Badan Kuat</p>
            		</div>
          		</div>
        	</div>
      	</div>
    </section>

    <section class="ftco-counter img ftco-section ftco-no-pt ftco-no-pb" id="jamu-section">       
      <div class="container py-5">
        <div class="row justify-content-center">
          <div class="col-md-10 text-center heading-section ftco-animate">
            <h2 class="mb-4 fw-bold">Paket Internet <span style="color: #007bff;">HSP</span></h2>
            <p class="text-muted fs-5">Pilih paket internet terbaik sesuai kebutuhan Anda</p>
          </div>
        </div>
      </div>
    
      <!-- Paket Section -->
      <section class="pb-5">
        <div class="container">
          <div class="row justify-content-center g-4">
            <?php $__currentLoopData = $layanans; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $layanan): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6 col-lg-4">
              <div class="package-card text-center p-4 border rounded-4 shadow-sm bg-white h-100 transition hover-shadow">
                <h5 class="fw-semibold text-dark"><?php echo e($layanan->nama_layanan); ?></h5>
                <p class="fs-4 fw-bold text-primary mb-1">Rp <?php echo e(number_format($layanan->harga, 0, ',', '.')); ?> / bulan</p>
                <p class="text-muted mb-3">🚀 Kecepatan hingga <strong><?php echo e($layanan->kecepatan); ?> Mbps</strong></p>
                <a href="<?php echo e(route('pemesanan.create', ['layananId' => $layanan->id])); ?>" class="btn btn-primary mt-auto">Pilih Paket</a>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
      </section>
    </section>
    
    


      <section id="about-section" class="py-5 bg-light">
      <div class="container">
        <div class="row align-items-center">
          
          <!-- Gambar (jika ada logo atau ilustrasi) -->
          <div class="col-md-6 mb-4 mb-md-0">
            <img src="assets/img/about-company.svg" alt="Tentang PT Parsaoran" class="img-fluid rounded shadow">
          </div>
          
          <!-- Konten -->
          <div class="col-md-6">
            <h2 class="fw-bold mb-3">Tentang <span style="color: #007bff;">PT Parsaoran Global Data Trans</span></h2>
            <p class="text-muted fs-5">
              PT Parsaoran Global Data Trans adalah perusahaan teknologi yang bergerak di bidang layanan internet dan solusi data, menghadirkan konektivitas cepat, stabil, dan terjangkau ke berbagai wilayah Indonesia.
            </p>
            <p class="text-muted">
              Berdiri dengan semangat transformasi digital, kami berkomitmen untuk menyediakan layanan internet terbaik, infrastruktur jaringan modern, dan dukungan pelanggan yang responsif, demi mendukung pertumbuhan bisnis, pendidikan, dan kehidupan digital masyarakat Indonesia.
            </p>
            <ul class="list-unstyled mt-3">
              <li class="mb-2">✅ Internet Fiber Optik Cepat & Stabil</li>
              <li class="mb-2">✅ Layanan Korporat & Rumah Tangga</li>
              <li class="mb-2">✅ Support 24/7 & Tim Profesional</li>
              <li class="mb-2">✅ Jangkauan Luas hingga ke Daerah</li>
            </ul>
          </div>
    
        </div>
      </div>
    </section>


    <section class="ftco-section" id="perawatan-section">
      <div class="container-fluid px-5">
        <div class="row justify-content-center mb-5 pb-2">
          <div class="col-md-8 text-center heading-section ftco-animate">
            <h2 class="mb-4">Layanan Internet & Komplain</h2>
            <p>Informasi mengenai layanan internet yang tersedia serta sistem komplain untuk pelanggan kami.</p>
          </div>
        </div>
        <div class="row">
          
          <!-- Section Layanan Internet -->
          <div class="col-md-6 ftco-animate">
            <div class="department-wrap p-4 d-flex flex-column h-100">
              <div class="text p-2 text-center flex-grow-1">
                <div class="icon mb-3">
                  <span class="icon-globe" style="font-size: 3rem; color: #007bff;"></span>
                </div>
                <h3><a href="#">Layanan Internet</a></h3>
                <p>Kami menyediakan koneksi internet stabil dan cepat berbasis fiber optik, cocok untuk kebutuhan rumah tangga maupun bisnis.</p>
                <p><strong>Fitur Unggulan:</strong> Kecepatan tinggi, jangkauan luas, dukungan teknis 24/7.</p>
                <p><strong>Cara Berlangganan:</strong> Pilih paket, isi formulir pendaftaran, dan nikmati layanan kami.</p>
              </div>
            </div>
          </div>
    
          <!-- Section Layanan Komplain -->
          <div class="col-md-6 ftco-animate">
            <div class="department-wrap p-4 d-flex flex-column h-100">
              <div class="text p-2 text-center flex-grow-1">
                <div class="icon mb-3">
                  <span class="icon-headset" style="font-size: 3rem; color: #dc3545;"></span>
                </div>
                <h3><a href="#">Layanan Komplain</a></h3>
                <p>Kami menyediakan sistem pengaduan yang responsif untuk membantu pelanggan mengatasi gangguan layanan atau menyampaikan masukan.</p>
                <p><strong>Saluran Komplain:</strong> WhatsApp, Email, dan Formulir Online.</p>
                <p><strong>Jam Layanan:</strong> Setiap hari, pukul 08.00 - 22.00 WIB.</p>
              </div>
            </div>
          </div>
    
        </div>
      </div>
		

      <section id="kontak-section" class="ftco-section contact-section" style="background-image: url(images/rs2.webp);">
        <div class="container">
      	<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Contact Us</h2>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
          </div>
        </div>
        <div class="row d-flex contact-info mb-5">
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center bg-light">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-map-signs"></span>
          		</div>
          		<h3 class="mb-4">Address</h3>
	            <p>198 West 21th Street, Suite 721 New York NY 10016</p>
	          </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center bg-light">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-phone2"></span>
          		</div>
          		<h3 class="mb-4">Contact Number</h3>
	            <p><a href="tel://1234567920">+ 1235 2355 98</a></p>
	          </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center bg-light">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-paper-plane"></span>
          		</div>
          		<h3 class="mb-4">Email Address</h3>
	            <p><a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
	          </div>
          </div>
          <div class="col-md-6 col-lg-3 d-flex ftco-animate">
          	<div class="align-self-stretch box p-4 text-center bg-light">
          		<div class="icon d-flex align-items-center justify-content-center">
          			<span class="icon-globe"></span>
          		</div>
          		<h3 class="mb-4">Website</h3>
	            <p><a href="#">yoursite.com</a></p>
	          </div>
          </div>
        </div>
      </div>
    </section>

    <footer class="ftco-footer ftco-section img" style="background-image: url(images/footer-bg.jpg);">
    	<div class="overlay"></div>
      <div class="container-fluid px-md-5">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Mediplus</h2>
              <p>Far far away, behind the word mountains, far from the countries.</p>
              <ul class="ftco-footer-social list-unstyled mt-5">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Departments</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Neurology</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Opthalmology</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Nuclear Magnetic</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Surgical</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Cardiology</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Dental</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-4">
              <h2 class="ftco-heading-2">Links</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Home</a></li>
                <li><a href="#jamu-section"><span class="icon-long-arrow-right mr-2"></span>Janji Temu</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Komplain</a></li>
                <li><a href="#tv-channel-section"><span class="icon-long-arrow-right mr-2"></span>Tv Channel</a></li>
                <li><a href="#fasilitas-section"><span class="icon-long-arrow-right mr-2"></span>Informasi Fasilitas</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Services</h2>
              <ul class="list-unstyled">
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Emergency Services</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Qualified Doctors</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>Outdoors Checkup</a></li>
                <li><a href="#"><span class="icon-long-arrow-right mr-2"></span>24 Hours Services</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">203 Fake St. Mountain View, San Francisco, California, USA</span></li>
	                <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2 392 3929 210</span></a></li>
	                <li><a href="#"><span class="icon icon-envelope pr-4"></span><span class="text">info@yourdomain.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">
	
            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  
  <script src="js/main.js"></script>
    
  </body>
</html><?php /**PATH C:\laragon\www\sistem-pemesanan-dan-pemasangan1\resources\views/dashboard/pe.blade.php ENDPATH**/ ?>