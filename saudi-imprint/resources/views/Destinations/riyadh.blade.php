<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Riyadh</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files-->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet">
<link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

  <!-- Main CSS File 
  <link href="assets/css/main.css" rel="stylesheet">-->
  <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">


 <!-- Leaflet CSS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
 <!-- Leaflet JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
  

</head>

<body class="service-details-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="index.html" class="logo d-flex align-items-center">
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename"><span>S</span>audi Imprint</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
        <li><a href="{{ route('home') }}" class="active">Home</a></li>
          <li><a href="#tours">Tours</a></li>
          <li><a href="#imap">Map</a></li>
          <li><a href="#list">Things To Do</a></li>
          <li><a href="#pricing">Pricing</a></li>
          <li class="dropdown"><a href="#"><span>Dropdown</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
              <li><a href="#">Dropdown 1</a></li>
              <li><a href="#">Dropdown 2</a></li>
              <li><a href="#">Dropdown 3</a></li>
              <li><a href="#">Dropdown 4</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contact</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

    </div>
  </header>

  <main class="main">

    <!-- Page Title -->
    <div class="page-title" data-aos="fade">
      <div class="heading">
        <div class="container">
          <div class="row d-flex justify-content-center text-center">
            <div class="col-lg-8">
              <h1>About Riyadh City</h1>
              <p class="mb-0">Riyadh combines ancient history with modern dynamism, offering a glimpse into Arabia’s past and future.
                 Explore the city's rich heritage through souqs, museums, and historical architecture,
                  and experience its modern side with high-rises and a thriving art scene, highlighted by
                   the Riyadh Art initiative that turns the city into an open-air gallery. Don't miss Riyadh Season,
                    featuring themed zones like Boulevard City and the Riyadh Zoo, open year-round. For dining, try local delicacies at Najd Village restaurant.  </p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li class="current">Riyadh </li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

       <!--Guided Tours section-->
     <div id="tours" class="container py-5" data-aos="fade-up" data-aos-delay="100">
      <div class="container section-title" data-aos="fade-up">
        <h2>Tours</h2>
        <div><span>Guided Tours and</span> <span class="description-title"> Experiences</span></div>
      </div>
    <div class="row g-4">
    <div class="col-md-6 col-lg-3">
    <div class="card custom-card">
      <img src="assets/img/Guided tours/Desert Safari.jpg" class="card-img-top fixed-img" alt="Product 1">
      <div class="card-body text-center d-flex flex-column">
           <h5 class="card-title">Riyadh</h5>
           <p class="card-text">Desert Safari With Camp Activites In The Riyadh Desert <br><strong>100 SAR</strong></p>
            <a href="{{ route('Guided Tours.riyadhDesertSafari') }}" class="btn btn-primary mt-auto">View Details</a>
                            </div>
                        </div>
                    </div>
  <div class="col-md-6 col-lg-3">
 <div class="card custom-card">
    <img src="assets/img/Guided tours/A One-Hour Hike In The Riyadh Desert.jpg" class="card-img-top fixed-img" alt="Product 2">
     <div class="card-body text-center d-flex flex-column">
      <h5 class="card-title">Riyadh</h5>
         <p class="card-text">A One-Hour Hike In The Riyadh Desert<br><strong>70 SAR</strong></p>
         <a href="{{ route('Guided Tours.riyadhHike') }}" class="btn btn-primary mt-auto">View Details</a>
                            </div>
                        </div>
                    </div>
 <div class="col-md-6 col-lg-3">
 <div class="card custom-card">
  <img src="assets/img/Guided tours/Crossing The Empty Quarter - Um Alhesh Lake Trip.jpg" class="card-img-top fixed-img" alt="Product 3">
  <div class="card-body text-center d-flex flex-column">
   <h5 class="card-title">Riyadh</h5>
     <p class="card-text">Crossing The Empty Quarter - Um Alhesh Lake Trip<br><strong>150 SAR</strong></p>
      <a href="{{ route('Guided Tours.UmAlheshLake') }}" class="btn btn-primary mt-auto">View Details</a>
                            </div>
                        </div>
                    </div>
<div class="col-md-6 col-lg-3">
 <div class="card custom-card">
  <img src="assets/img/Guided tours/Set Off On A Camping Adventure In Riyadh.jpg" class="card-img-top fixed-img" alt="Product 4">
  <div class="card-body text-center d-flex flex-column">
     <h5 class="card-title">Riyadh</h5>
      <p class="card-text">Set Off On A Camping Adventure In Riyadh<br><strong>70 SAR</strong></p>
      <a href="{{ route('Guided Tours.riyadhCampingAdventure') }}" class="btn btn-primary mt-auto">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  <!--End of Guided Tour section-->

  <!-- Map Section -->
  <section id="imap" class="py-3" data-aos="fade-up" data-aos-delay="100">
    <div class="container">
      <div class="container section-title" data-aos="fade-up">
        <h2>Map</h2>
      <div><span>Riyadh</span> <span class="description-title">Map</span></div>
    </div>
        <div class="row align-items-center gap-4 mt-3">
            <div class="col-lg-6">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3623.761761555984!2d46.6752952754608!3d24.713551578048368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f03c4c7a9e42d%3A0x78e5fbdc091822b8!2sRiyadh%2C%20Saudi%20Arabia!5e0!3m2!1sen!2sus!4v1708532044870!5m2!1sen!2sus" 
                    width="100%" 
                    height="350" 
                    style="border:0; border-radius: 10px;" 
                    allowfullscreen="" 
                    loading="lazy">
                </iframe>
            </div>
            <div class="col-lg-5 text-center gap-4 mt-3">
                <img src="assets/img/Location tracking-pana.png" class="img-fluid w-100 " alt="img" style="max-height: 350px; object-fit: cover;">
            </div>
        </div>
    </div>
</section>
<!--Map Section END-->

<section id="list" class="features section light-background" data-aos="fade-up" data-aos-delay="100">
  <div class="container"></div>
  <div class="container section-title" data-aos="fade-up">
    <h2>List</h2>
  <div><span>List of</span> <span class="description-title">Things To Do</span></div>
</div>
<div class="container py-5">
  <!-- أزرار الفلترة -->
  <div class="filter-buttons">
    <button class="btn btn-success active" data-filter="all">
      <i class="bi bi-grid me-2"></i> All
  </button>
  <button class="btn btn-success" data-filter="shopping">
      <i class="bi bi-bag me-2"></i> Shopping
  </button>
  <button class="btn btn-success" data-filter="nature">
      <i class="bi bi-tree me-2"></i> Nature
  </button>
  <button class="btn btn-success" data-filter="culture">
      <i class="bi bi-brush me-2"></i> Culture
  </button>
  </div>

  <!-- الكروت -->
  <div class="row g-4">
      <!-- Shopping -->
      <div class="col-lg-4 col-md-6 filter-item shopping">
          <div class="card">
              <img src="assets\img\ThingsToDoRiyadh\اسواق طيبه.jpg" class="card-img-top" alt="Shopping">
              <div class="card-body">
                  <h5 class="card-title">Souq Taibah</h5>
                  <p class="card-text"> Riyadh | Shopping</p>
                  <a href="#" class="btn btn-success">View Details</a>
              </div>
          </div>
      </div>

      <!-- Nature -->
      <div class="col-lg-4 col-md-6 filter-item nature">
          <div class="card">
              <img src="assets\img\ThingsToDoRiyadh\طبيعه-روضه التنهات.jpg" class="card-img-top" alt="Nature">
              <div class="card-body">
                  <h5 class="card-title">Rawdat Tinhat</h5>
                  <p class="card-text">Riyadh | Nature</p>
                  <a href="#" class="btn btn-success">Explore</a>
              </div>
          </div>
      </div>

      <!-- Culture -->
      <div class="col-lg-4 col-md-6 filter-item culture">
          <div class="card">
              <img src="assets\img\ThingsToDoRiyadh\قصر السبيعي التاريخي-الرياض.jpg" class="card-img-top" alt="Culture">
              <div class="card-body">
                  <h5 class="card-title">Al-Subaie Palace</h5>
                  <p class="card-text">Riyadh | Culture & History</p>
                  <a href="#" class="btn btn-success">Learn More</a>
              </div>
          </div>
      </div>

      <!-- Shopping 2 -->
      <div class="col-lg-4 col-md-6 filter-item shopping">
          <div class="card">
              <img src="assets\img\ThingsToDoRiyadh\تسوق-فيا رياض.jpg" class="card-img-top" alt="Mall">
              <div class="card-body">
                  <h5 class="card-title">Via Riyadh</h5>
                  <p class="card-text">Riyadh | Shopping</p>
                  <a href="#" class="btn btn-success">View Details</a>
              </div>
          </div>
      </div>

      <!-- Nature 2 
      <div class="col-lg-4 col-md-6 filter-item nature">
          <div class="card">
              <img src="assets/img/mountain.jpg" class="card-img-top" alt="Mountain">
              <div class="card-body">
                  <h5 class="card-title">Mountain Adventure</h5>
                  <p class="card-text">Hike through beautiful trails.</p>
                  <a href="#" class="btn btn-success">Start Adventure</a>
              </div>
          </div>
      </div>-->

      <!-- Culture 2 
      <div class="col-lg-4 col-md-6 filter-item culture">
          <div class="card">
              <img src="assets/img/museum.jpg" class="card-img-top" alt="Museum">
              <div class="card-body">
                  <h5 class="card-title">Historical Museums</h5>
                  <p class="card-text">Discover historical artifacts.</p>
                  <a href="#" class="btn btn-success">Visit Now</a>
              </div>
          </div>
      </div>-->
  </div>
</div>



      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Guide</h2>
        <div><span>Check the</span> <span class="description-title">Complete Guide To Riyadh</span></div>
      </div><!-- End Section Title -->

      <section id="faq" class="faq section light-background">

        <div class="container">
          <div class="row gy-4">
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
              <div class="faq-container">
                <div class="faq-item faq-active">
                  <h3><span class="num">1.</span> <span>The Red Sea - Sheybarah</span></h3>
                  <div class="faq-content">
                    <p>The Red Sea is open for business with its first five resorts, These world-class properties are part of phase one of The Red Sea, a pioneering regenerative tourism destination on the west coast of Saudi Arabia. ​
                      Phase one includes an international airport and 16 iconic resorts across three islands and two inland sites. Together, they will offer around 3,000 keys and be operated by globally renowned brands. The resorts will open gradually throughout 2024 and 2025.​
                      On completion in 2030, the destination will include 50 hotels with 8,000 rooms and more than 1,000 residential properties across 22 islands and six inland sites. Development has been limited to accommodate no more than 1 million visitors a year to preserve the ecosystem at The Red Sea. ​.</p>
                    <img src="assets/img/redsea.jpg" class="img-fluid w-70 h-60" alt="Responsive Image">
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End Faq item-->
  

                <div class="faq-item">
                  <h3><span class="num">2.</span> <span>AlUla - Winter at Tantora </span></h3>
                  <div class="faq-content">
                    <p>Discover the Beauty of AlUla with Winter at Tantora, where history, culture, art, music, and unique culinary experiences come together in an extraordinary festival.
                      The festival's name is inspired by the traditional Tantora, an ancient sundial used by the people of AlUla to mark the changing seasons for agriculture. This event takes you on a journey through the region’s rich heritage and traditions.
                      Over the course of three weeks, enjoy world-class concerts, captivating cultural performances, unique dining experiences, and guided tours that unveil the wonders of AlUla. Make this winter unforgettable and be part of an experience that will stay with you forever.</p>
                        <img src="assets/img/alulabackgr.jpg" class="img-fluid w-70 h-60" alt="Responsive Image">
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End Faq item-->
  
                <div class="faq-item">
                  <h3><span class="num">3.</span> <span>Riyadh - Dunes of Arabia</span></h3>
                  <div class="faq-content">
                    <p>Immerse yourself in the magic of the desert and the rich culture of Saudi. From thrilling adventures to cultural experiences,
                       the Dunes of Arabia offers something unforgettable for everyone.
                      A Place for All 
                      Whether you’re seeking adventure, cultural discovery, or peaceful moments with loved ones,
                       this destination blends tradition and modernity, perfect for families, friends, or solo travelers.</p>
                       <img src="assets/img/dunes of arabia.jpg" class="img-fluid w-70 h-60" alt="Responsive Image">
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End Faq item-->
  

                <div class="faq-item">
                  <h3><span class="num">4.</span> <span>Neom - Trojena</span></h3>
                  <div class="faq-content">
                    <p>Trojena will be a world-class destination that blends natural and urban landscapes,
                       offering human-centered experiences for both its residents and visitors alike. 
                       It will feature six distinct districts where reality merges with engineering innovations and virtual architectural artistry, creating a one-of-a-kind destination.</p>
                       <img src="assets/img/Trojena.jpg" class="img-fluid w-70 h-60" alt="Responsive Image">
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End Faq item-->
            </div>
          </div>
        </div>
      </div>
    </section>

  

  </main>

  <footer id="footer" class="footer light-background">

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

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="{{ asset('assets/js/app.js') }}"></script>

</body>

</html>