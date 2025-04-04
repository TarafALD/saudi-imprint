<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Saudi Imprint</title>
  <meta name="description" content=""> 
  <meta name="keywords" content="">

  <!-- Favicons 
  <link href="assets/img/favicon.png" rel="icon"><link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">-->

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
        <!-- Uncomment the line below if you also wish to use an image logo -->
        <!-- <img src="assets/img/logo.png" alt=""> -->
        <h1 class="sitename"><span>S</span>audi Imprint</h1>
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#about">About</a></li>
          <li class="dropdown"><a href="#"><span>Destinations</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
            <ul>
            <li><a href="{{ route('riyadh') }}">Riyadh</a></li>
    <li><a href="{{ route('aljouf') }}">AlJouf</a></li>
    <li><a href="{{ route('alula') }}">AlUla</a></li>
    <li><a href="{{ route('jeddah') }}">Jeddah</a></li>
            </ul>
          </li>
          <li><a href="#contact">Contact us</a></li>
          <li><a href="{{ route('signupT') }}" target="_blank">Sign Up</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <main class="main">
    <!-- Hero Section -->
    <section id="hero" class="hero section light-background">
      <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-5">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h2>Welcome </h2>
            <p>Discover the most beautiful tourist destinations in Saudi Arabia and enjoy a unique experience</p>
            <div class="d-flex">
              <a href="#about" class="btn-get-started">Get Started</a>
              <a href="https://youtu.be/Y_00GXSsmMs?si=HrsCN0n9OQ_OeNsE" class="glightbox btn-watch-video d-flex align-items-center"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
            </div>
          </div>
          <div class="col-lg-6 order-1 order-lg-2">
            <img src="assets/img/travel1.png" class="img-fluid" alt="">
          </div>
        </div>
      </div>

      <div class="icon-boxes position-relative" data-aos="fade-up" data-aos-delay="200">
        <div class="container position-relative">
          <div class="row gy-4 mt-5">

            <div class="col-xl-3 col-md-6">
              <div class="icon-box">
                <div class="icon"><i class="bi bi-easel"></i></div>
                <h4 class="title"><a href="" class="stretched-link">Plan Your Next Trips</a></h4>
              </div>
            </div><!--End Icon Box -->

            <div class="col-xl-3 col-md-6">
              <div class="icon-box">
                <div class="icon"><i class="bi bi-gem"></i></div>
                <h4 class="title"><a href="" class="stretched-link">Discover Saudi Arabia</a></h4>
              </div>
            </div><!--End Icon Box -->

            <div class="col-xl-3 col-md-6">
              <div class="icon-box">
                <div class="icon"><i class="bi bi-geo-alt"></i></div>
                <h4 class="title"><a href="" class="stretched-link">Enjoy and learn more with our Tour Guides</a></h4>
              </div>
            </div><!--End Icon Box -->

            <div class="col-xl-3 col-md-6">
              <div class="icon-box">
                <div class="icon"><i class="bi bi-command"></i></div>
                <h4 class="title"><a href="" class="stretched-link">Stay Updated with the Latest in Saudi Arabia</a></h4>
              </div>
            </div><!--End Icon Box -->
          </div>
        </div>
      </div>
    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">
      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 content" data-aos="fade-up" data-aos-delay="100">
            <p class="who-we-are">Who We Are</p>
            <h3>Saudi Imprint</h3>
            <p class="fst-italic">
              Saudi Imprint is a tourism platform that offers comprehensive destinations and ready-made trips.
               It also provides professional tour guides to enhance the travel experience.
            </p>
            <ul>
              <li><i class="bi bi-check-circle"></i> <span>Tour Guides for each city we have</span></li>
              <li><i class="bi bi-check-circle"></i> <span>Lists of thigs to do for each city</span></li>
              <li><i class="bi bi-check-circle"></i> <span>comprehensive information for all trips</span></li>
            </ul>
          </div>

          <div class="col-lg-6 about-images" data-aos="fade-up" data-aos-delay="200">
            <div class="row gy-4">
              <div class="col-lg-12">
                <img src="assets/img/Road trip-bro.png" class="img-fluid" alt="">
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /About Section -->

    <!-- Services Section -->
    <section id="destinations" class="destinations section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Destinations</h2>
        <div><span>Check Our</span> <span class="description-title">Destinations</span></div>
      </div><!-- End Section Title -->

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="destinations-item  position-relative">
              <div class="icon">
                <i class="bi bi-geo-alt"></i>
              </div>
              <a href="{{ route('riyadh') }}" class="stretched-link">
                <h3>Riyadh</h3>
              </a>
              <p>Explore Riyadh and enjoy its vibrant events and diverse attractions in every visit.</p>
            </div>
          </div><!-- End Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
            <div class="destinations-item position-relative">
              <div class="icon">
                <i class="bi bi-geo-alt"></i>
              </div>
              <a href="{{ route('jeddah') }}" class="stretched-link">
                <h3>Jeddah</h3>
              </a>
              <p>Explore the beauty of Jeddah city and enjoy its lively atmosphere, stunning coastline.</p>
            </div>
          </div><!-- End Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
            <div class="destinations-item position-relative">
              <div class="icon">
                <i class="bi bi-geo-alt"></i>
              </div>
              <a href="{{ route('alula') }}" class="stretched-link">
                <h3>AlUla</h3>
              </a>
              <p>Experience AlUla and immerse yourself in its breathtaking landscapes,and unique cultural wonders.</p>
            </div>
          </div><!-- End Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="destinations-item position-relative">
              <div class="icon">
                <i class="bi bi-geo-alt"></i>
              </div>
              <a href="{{ route('aljouf') }}" class="stretched-link">
                <h3>AlJouf</h3>
              </a>
              <p>Explore the beauty of Aljouf with its rich history,stunning landscapes, and authentic Arabian heritage.</p>
              <a href="{{ route('aljouf') }}" class="stretched-link"></a>
            </div>
          </div><!-- End Item -->
        </div>
      </div>

    </section><!-- End Services Section -->

    <!-- Features Section -->
    <section id="features" class="features section light-background">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Top</h2>
        <div><span>Saudi Arabia’s</span> <span class="description-title">Top Destinations & Experiences</span></div>
      </div><!-- End Section Title -->

      <section id="faq" class="faq section light-background">
        <div class="container">
          <div class="row gy-4">
            <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
              <div class="faq-container">
                <div class="faq-item faq-active">
                  <h3><span class="num">1.</span> <span>The Red Sea - Sheybarah</span></h3>
                  <div class="faq-content">
                    <p>Discover the beauty of Shibara, one of the first islands to open to visitors as part of The Red Sea Project. 
      With its crystal-clear waters, pristine white sands, and vibrant coral reefs,
      Enjoy luxurious overwater villas, world-class snorkeling and diving, or simply unwind surrounded by the serene nature of the Red Sea. 
      Whether you're seeking tranquility or adventure, Shibara is a destination that redefines coastal tourism in Saudi Arabia.</p>
                    <img src="assets/img/redsea.jpg" class="img-fluid w-70 h-60" alt="Responsive Image">
                  </div>
                  <i class="faq-toggle bi bi-chevron-right"></i>
                </div><!-- End item-->
  
                <div class="faq-item">
  <h3><span class="num">2.</span> <span>Rijal Almaa - Asir Region</span></h3>
  <div class="faq-content">
    <p>Nestled in the mountains of the Asir region, Rijal Almaa is a historic village known for its stunning stone architecture, vibrant painted walls, and rich cultural heritage. 
      Once a vital trade hub, the village is now one of Saudi Arabia’s most captivating tourist destinations. 
      Visitors can explore traditional houses, museums, and charming alleyways that tell stories of the past. 
      The area also offers breathtaking views, cool weather, and seasonal festivals that highlight the unique traditions of the Asir region.</p>
    <img src="assets/img/رجال المع.jpg" class="img-fluid w-70 h-60" alt="Rijal Almaa Village">
  </div>
  <i class="faq-toggle bi bi-chevron-right"></i>
</div><!-- End item -->
  
<div class="faq-item">
  <h3><span class="num">3.</span> <span>AlUla - Hot Air Balloon Experience</span></h3>
  <div class="faq-content">
    <p>Soar above the breathtaking landscapes of AlUla in a magical hot air balloon ride. 
      Experience the golden sunrise as it bathes the majestic rock formations, ancient tombs, and lush valleys in warm light.
      This unforgettable journey offers a peaceful yet thrilling perspective of one of Saudi Arabia’s most stunning heritage sites.
      Whether you're an adventure seeker or a romantic at heart, this serene flight over history and nature is a must-try experience in AlUla.</p>
    <img src="assets/img/العلا.jpg" class="img-fluid w-70 h-60" alt="Hot Air Balloon in AlUla">
  </div>
  <i class="faq-toggle bi bi-chevron-right"></i>
</div><!-- End item -->
  
                <div class="faq-item">
          <h3><span class="num">4.</span> <span>Taif - Rose Season</span></h3>
            <div class="faq-content">
          <p>Every spring, Taif transforms into a breathtaking landscape of blooming roses. 
           The Rose Season is a celebration of beauty, fragrance, and culture — featuring rose farms, traditional distilleries, and vibrant festivals
          , pick their own roses, and experience the enchanting scent that fills the cool mountain air.</p>
          <img src="assets/img/taif.jpg" class="img-fluid w-70 h-60" alt="Taif Rose Season">
          </div>
             <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End item -->
            </div>
          </div>
        </div>
      </div>
    </section></section><!-- End Features Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">
      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <div><span>Need Help?</span> <span class="description-title">Contact Us</span></div>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade" data-aos-delay="100">
        <div class="row gy-4">
          <div class="col-lg-4">
            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="200">
              <i class="bi bi-geo-alt flex-shrink-0"></i>
              <div>
                <h3>Address</h3>
                <p>2805, North of Al-Laqaeet Cemetery, Skaka</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="300">
              <i class="bi bi-telephone flex-shrink-0"></i>
              <div>
                <h3>Call Us</h3>
                <p>050555555</p>
              </div>
            </div><!-- End Info Item -->

            <div class="info-item d-flex" data-aos="fade-up" data-aos-delay="400">
              <i class="bi bi-envelope flex-shrink-0"></i>
              <div>
                <h3>Email Us</h3>
                <p>SaudiImprintTeam@gmail.com</p>
              </div>
            </div><!-- End Info Item -->
          </div>

          <div class="col-lg-8">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>
              </div>
            </form>
          </div><!-- End Contact Form -->
        </div>
      </div>
    </section><!-- /Contact Section -->
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
    </div></footer>

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
  <script src="js/app.js"></script>
  <script src="{{ asset('assets/js/app.js') }}"></script>
</body>
</html>