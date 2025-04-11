<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Jeddah</title>
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
        <h1 class="sitename"><span>S</span>audi Imprint</h1>
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
        <li><a href="{{ route('home') }}" class="active">Home</a></li>
          <li><a href="#tours">Tours</a></li>
          <li><a href="#imap">Map</a></li>
          <li><a href="#list">Things To Do</a></li>
          <li><a href="#CompleteGuide">Complete Guide</a></li>
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
              <h1>About Jeddah City</h1>
              <p class="mb-0">Jeddah is a vibrant coastal city located on the Red Sea, known for its rich history, 
                cultural heritage, and modern development. As the second-largest city in Saudi Arabia, Jeddah serves as a major economic hub and the gateway for pilgrims traveling to Mecca for Hajj. 
                The city boasts beautiful beaches, lively markets, and a mix of contemporary and traditional architecture. Popular landmarks include the King Fahd Fountain, one of the tallest fountains in the world, and the historic Al-Balad district,
                 which is home to traditional houses and ancient souks. Jeddah is also famous for its diverse food scene, art galleries, and as a center for business and tourism in the region. </p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{ route('home') }}">Home</a></li>
            <li class="current">Jeddah </li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->
        <!-- Guided Tours section -->
<div id="tours" class="container py-5" data-aos="fade-up" data-aos-delay="100">
  <div class="container section-title" data-aos="fade-up">
      <h2>Tours</h2>
      <div><span>Guided Tours and</span> <span class="description-title"> Experiences</span></div>
  </div>
  <div class="row g-4">
      @foreach ($tours as $tour)
          <div class="col-md-6 col-lg-3">
              <div class="card custom-card">
                <img src="{{ asset('storage/' . $tour->image_path) }}" class="card-img-top fixed-img" alt="{{ $tour->name }}">
                <div class="card-body text-center d-flex flex-column">
                      <h5 class="card-title">{{ $tour->name }}</h5>
                      <p class="card-text">{{ $tour->description }}<br><strong>{{ $tour->price }} SAR</strong></p>
                      <a href="{{ route('tours.show', $tour->id) }}" class="btn btn-primary mt-auto">View Details</a>
                  </div>
              </div>
          </div>
      @endforeach
  </div>
{{-- </div>

       <!--Guided Tours section-->
     <div id="tours" class="container py-5" data-aos="fade-up" data-aos-delay="100">
      <div class="container section-title" data-aos="fade-up">
        <h2>Tours</h2>
        <div><span>Guided Tours and</span> <span class="description-title"> Experiences</span></div>
      </div>
    <div class="row g-4">
    <div class="col-md-6 col-lg-3">
    <div class="card custom-card">
      <img src="assets/img/Guided tours/Boat Tour In Bayada.jpg" class="card-img-top fixed-img" alt="Product 1">
      <div class="card-body text-center d-flex flex-column">
           <h5 class="card-title">Bayada</h5>
           <p class="card-text">Boat Tour In Bayada <br><strong>250 SAR</strong></p>
            <a href="{{ route('Guided Tours.jeddahBayada') }}" class="btn btn-primary mt-auto">View Details</a>
                            </div>
                        </div>
                    </div>
  <div class="col-md-6 col-lg-3">
 <div class="card custom-card">
    <img src="assets/img/Guided tours/تجربة الغوص الاستكشافي على شاطئ البحر الأحمر.jpg" class="card-img-top fixed-img" alt="Product 2">
     <div class="card-body text-center d-flex flex-column">
      <h5 class="card-title">Red Sea</h5>
         <p class="card-text">Red Sea Diving Adventure<br><strong>100 SAR</strong></p>
         <a href="{{ route('Guided Tours.jeddahDivingAdventure') }}" class="btn btn-primary mt-auto">View Details</a>
                            </div>
                        </div>
                    </div>
 <div class="col-md-6 col-lg-3">
 <div class="card custom-card">
  <img src="assets/img/Guided tours/جولة المشي في جدة التاريخية.jpg" class="card-img-top fixed-img" alt="Product 3">
  <div class="card-body text-center d-flex flex-column">
   <h5 class="card-title">Jeddah</h5>
     <p class="card-text">Walking Tour in Historic Jeddah<br><strong>150 SAR</strong></p>
      <a href="{{ route('Guided Tours.jeddahHistoricJeddah') }}" class="btn btn-primary mt-auto">View Details</a>
                            </div>
                        </div>
                    </div>
<div class="col-md-6 col-lg-3">
 <div class="card custom-card">
  <img src="assets/img/Guided tours/Fishing.jpg" class="card-img-top fixed-img" alt="Product 4">
  <div class="card-body text-center d-flex flex-column">
     <h5 class="card-title">Red Sea</h5>
      <p class="card-text">Fishing in Jeddah<br><strong>70 SAR</strong></p>
      <a href="{{ route('Guided Tours.jeddahFishing') }}" class="btn btn-primary mt-auto">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>  <!--End of Guided Tour section--> --}}

  <!-- Map Section -->
  <section id="imap" class="py-3" data-aos="fade-up" data-aos-delay="100">
    <div class="container">
      <div class="container section-title" data-aos="fade-up">
        <h2>Map</h2>
      <div><span>Jeddah</span> <span class="description-title">Map</span></div>
    </div>
        <div class="row align-items-center gap-4 mt-3">
            <div class="col-lg-6">
                <iframe 
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3623.761761555984!2d46.6752952754608!3d24.713551578048368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3e2f03c4c7a9e42d%3A0x78e5fbdc091822b8!2sJeddah%2C%20Saudi%20Arabia!5e0!3m2!1sen!2sus!4v1708532044870!5m2!1sen!2sus" 
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
  
  <div class="row g-4">
      <!-- Shopping -->
      <div class="col-lg-4 col-md-6 filter-item shopping">
          <div class="card">
              <img src="assets\img\ThingsToDoJeddah\al-arab mall.jpg" class="card-img-top" alt="Shopping">
              <div class="card-body">
                  <h5 class="card-title">Al-Arab Mall</h5>
                  <p class="card-text"> Shopping</p>
                  <a href="{{ route('jeddahArabMall') }}" class="btn btn-success">View Details</a>
              </div>
          </div>
      </div>

      <!-- Nature -->
      <div class="col-lg-4 col-md-6 filter-item nature">
          <div class="card">
              <img src="assets\img\ThingsToDoJeddah\JeddahFront.jpg" class="card-img-top" alt="Nature">
              <div class="card-body">
                  <h5 class="card-title">Jeddah Seafront</h5>
                  <p class="card-text">Nature</p>
                  <a href="{{ route('jeddahSeafront') }}" class="btn btn-success">Explore</a>
              </div>
          </div>
      </div>

      <!-- Culture -->
      <div class="col-lg-4 col-md-6 filter-item culture">
          <div class="card">
              <img src="assets\img\ThingsToDoJeddah\Historic Jeddah.jpg" class="card-img-top" alt="Culture">
              <div class="card-body">
                  <h5 class="card-title">Historic Jeddah</h5>
                  <p class="card-text">Culture & History</p>
                  <a href="{{ route('jeddahHistoric') }}" class="btn btn-success">Learn More</a>
              </div>
          </div>
      </div>
  </div>
</div>

      <!-- Section Title -->
      <div id="CompleteGuide" class="container section-title" data-aos="fade-up">
        <h2>Guide</h2>
        <div><span>Complete Guide</span> <span class="description-title">To Jeddah</span></div>
      </div><!-- End Section Title -->

      <section id="faq" class="faq section light-background">
        <div class="container">
          <div class="row gy-4">
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
              <div class="faq-container">
                <div class="faq-item faq-active">
                  <h3><span class="num">1.</span> <span>Weather</span></h3>
                  <div class="faq-content">
                    <p><ul type="square">
                      <li>Summer: 25°C - 41°C</li>
                      <li>Autumn: 23°C - 37°C</li>
                      <li>Winter: 21°C - 31°C</li>
                      <li>Spring: 23°C - 39°C</li>
                    </ul></p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End item-->
  
                <div class="faq-item">
                  <h3><span class="num">2.</span> <span>Best Time To Visit </span></h3>
                  <div class="faq-content">
                    <p><dl>
                      <dt>Summer Season :</dt>
                      <dd>October to April</dd>
                      <dt>Ramadan Season :</dt>
                      <dd>March to April</dd>
                    </dl></p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End item-->
  
                <div class="faq-item">
                  <h3><span class="num">3.</span> <span>Transportation</span></h3>
                  <div class="faq-content">
                    <p><ul type="none">
                      <li>- Private car</li>
                      <li>- Public Transportation</li>
                      <li>- Ride hailing</li>
                    </ul></p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End item-->
  
                <div class="faq-item">
                  <h3><span class="num">4.</span> <span>City Guide</span></h3>
                  <div class="faq-content">
                  <p>Meet our tour guides to learn more about what to see and do in Jeddah.<br> Discover the city's top sights and explore where to stay, eat, and more.</p>
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End item-->
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