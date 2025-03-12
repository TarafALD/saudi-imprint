<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Al-Subaie Palace</title>
  <meta name="description" content=""> 
  <meta name="keywords" content="">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files-->
<link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">


  <!-- Main CSS File -->
  <link rel="stylesheet" href="/assets/css/app.css">
  <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
</head>

<body class="index-page">
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
      <a href="welcome.blade.php" class="logo d-flex align-items-center">
        <h1 class="sitename"><span>S</span>audi Imprint</h1></a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="/welcome" class="active">Home</a></li>
          <li><a href="/riyadh">Riyadh</a></li>
          <li><a href="#about">Details</a></li>
          <li><a href="#location">Location</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">
    <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
    <div class="row gy-4 align-items-center">
      <div class="col-md-6 order-2 order-md-1 d-flex flex-column justify-content-center">
            <h2>Al-Subaie Palace</h2>
            <p>Al-Subaie Palace in Riyadh is a historic landmark showcasing traditional Najdi architecture. 
                Once home to the Al-Subaie family, the palace reflects the rich cultural heritage of the region 
                and serves as a window into Saudi Arabia’s past.</p>
          </div>
          <div class="col-md-6 order-1 order-md-2 text-center">
            <img src="assets\img\culture.png" class="img-fluid" alt="">
          </div>
        </div>
      </div>
    </section> <!--Hero Section -->


    <!-- About Section -->
    <section id="about" class="about section">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p class="who-we-are">Details</p>
            <h3>Al-Subaie Palace</h3>
            <ul>
  <li><i class="bi bi-cake"></i><span style="font-weight: bold; font-size: 16.5px; margin-left: 5px;">Ages:</span>
  <ul style="list-style-type: circle;">
  <li>all</li>
</li></ul>

  <li><i class="bi bi-people"></i><span style="font-weight: bold; font-size: 16.5px; margin-left: 5px;">Ideal For :</span>
    <ul style="list-style-type: circle;">
        <li>History Enthusiasts</li>
        <li>Families</li>
        <li>Culture & Heritage Lovers</li>
        <li>Architectural Enthusiasts</li>
    </ul>
  </li>

  <li><i class="bi bi-clock"></i> <span style="font-weight: bold; font-size: 16.5px; margin-left: 5px;">Opening Hours :</span>
    <ul style="list-style-type: circle;">
        <li>Wednesday: 8:00 AM – 6:00 PM</li>
        <li>Thursday: 8:00 AM – 6:00 PM</li>
        <li>Friday: Closed</li>
        <li>Saturday: Closed</li>
        <li>Sunday: 8:00 AM – 6:00 PM</li>
        <li>Monday: 8:00 AM – 6:00 PM</li>
        <li>Tuesday: 8:00 AM – 6:00 PM</li>
    </ul>
  </li>
</ul>
</div> 

         <!-- إضافه Carousel للصور -->
      <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
          <!-- المؤشرات (النقاط) -->
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="0" class="active"></button>
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="1"></button>
            <button type="button" data-bs-target="#carouselExample" data-bs-slide-to="2"></button>
          </div>

          <!-- الصور -->
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="assets/img/ThingsToDoRiyadh/قصر السبيعي1.jpg" class="d-block w-100" alt="صورة 1">
            </div>
            <div class="carousel-item">
              <img src="assets/img/ThingsToDoRiyadh/قصر السبيعي التاريخي-الرياض.jpg" class="d-block w-100" alt="صورة 2">
            </div>
            <div class="carousel-item">
              <img src="assets/img/ThingsToDoRiyadh/قصر السبيعي2.jpg" class="d-block w-100" alt="صورة 3">
            </div>
          </div>

          <!-- الأسهم للتحريك -->
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
          </button>
        </div>
      </div>

    </div>
  </div>
</section><!-- /About Section -->

    
    <!-- Features Section -->
    <section id="features" class="features section light-background">

      <!-- Section Title -->
      <div id="location" class="container section-title" data-aos="fade-up">
        <h2>Map</h2>
        <div><span>Check the</span> <span class="description-title">Location</span></div>
      </div><!-- End Section Title -->

      <div class="d-flex justify-content-center">
    <iframe 
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3621.827484618457!2d45.252778!3d25.248333!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2fcd7bba7c2e6b%3A0x9a64c9e4a1e8c7b9!2z2YXYsdmD2LIg2KfZhNiv2YbYrNipINmE2YTYrNmH2KfYqA!5e0!3m2!1sar!2ssa!4v1710000000000"  
      width="100%" 
      height="350" 
      style="border:0; border-radius: 10px; max-width: 600px;" 
      allowfullscreen="" 
      loading="lazy">
    </iframe>
  </div>
<br>
  <!-- زر "Get Directions" -->
  <div class="text-center mt-3">
    <a href="https://www.google.com/maps/dir/?api=1&destination=25.248333,45.252778" target="_blank" class="btn btn-primary" style="width: 200px;">
      Get Directions
    </a>
  </div>
</div>

    </section><!-- /Features Section -->
  </main>

  <footer id="footer" class="footer">

    <div class="container">
      <div class="copyright text-center ">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Saudi Imprint</strong> <span>All Rights Reserved</span></p>
      </div>
      <div class="social-links d-flex justify-content-center">
        <a href=""><i class="bi bi-twitter-x"></i></a>
        <a href=""><i class="bi bi-facebook"></i></a>
        <a href=""><i class="bi bi-instagram"></i></a>
        <a href=""><i class="bi bi-linkedin"></i></a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>

  <!-- Main JS File--> 
  <script src="js/app.js"></script>
  <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>