<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Cities Mall</title>
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
          <li><a href="/aljouf">Al-Jouf</a></li>
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
            <h2>Cities Mall</h2>
            <p>Cities Mall in Al-Jouf is a modern shopping destination offering a variety of retail stores,
                 dining options, and entertainment facilities, making it a great spot for families and visitors.</p>
          </div>
          <div class="col-md-6 order-1 order-md-2 text-center">
            <img src="assets\img\shopping.png" class="img-fluid" alt="">
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
            <h3>Cities Mall</h3>
            <ul>
  <li><i class="bi bi-cake"></i><span style="font-weight: bold; font-size: 16.5px; margin-left: 5px;">Ages:</span>
  <ul style="list-style-type: circle;">
  <li>all</li>
</li></ul>

  <li><i class="bi bi-people"></i><span style="font-weight: bold; font-size: 16.5px; margin-left: 5px;">Ideal For :</span>
    <ul style="list-style-type: circle;">
      <li>Shopping</li>
      <li>Families</li>
      <li>Friends</li>
    </ul>
  </li>

  <li><i class="bi bi-clock"></i> <span style="font-weight: bold; font-size: 16.5px; margin-left: 5px;">Opening Hours :</span>
    <ul style="list-style-type: circle;">
      <li>Thursday: 9:00 AM – 12:00 AM</li>
      <li>Friday: 2:00 PM – 12:00 AM</li>
      <li>Saturday: 9:00 AM – 12:00 AM</li>
      <li>Sunday: 9:00 AM – 12:00 AM</li>
      <li>Monday: 9:00 AM – 12:00 AM</li>
      <li>Tuesday: 9:00 AM – 12:00 AM</li>
      <li>Wednesday: 9:00 AM – 12:00 AM</li>
    </ul>
  </li>
</ul>
</div> 

         <!-- إضافه Carousel للصور -->
      <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
        <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
          <!-- الصور -->
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="assets\img\ThingsToDoAljouf\cities mall4.jpg" class="d-block w-100" alt="صورة 1">
            </div>
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
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7894.517687557764!2d40.20693955886817!3d29.97796438673332!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1572bb919c5b0b7d%3A0x17567a53e1621d13!2sAl%20Jouf%20Center!5e1!3m2!1sen!2ssa!4v1741859245847!5m2!1sen!2ssa"  
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
    <a href="https://www.google.com/maps/dir/?api=1&destination=29.97796438673332,40.20693955886817" target="_blank" class="btn btn-primary" style="width: 200px;">
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