<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Saudi Imprint</title>
  <meta name="description" content=""> 
  <meta name="keywords" content="">

  <!-- Favicons 
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">-->

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

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
          <li><a href="signup.html" target="_blank">Sign Up</a></li>
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
          </div><!-- End Service Item -->

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
          </div><!-- End Service Item -->

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
          </div><!-- End Service Item -->

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
            <div class="destinations-item position-relative">
              <div class="icon">
                <i class="bi bi-geo-alt"></i>
              </div>
              <a href="{{ route('aljouf') }}" class="stretched-link">
                <h3>AlJouf</h3>
              </a>
              <p>Explore the beauty of Aljouf with its rich history,stunning landscapes, and authentic Arabian heritage.</p>
              <a href="service-details.html" class="stretched-link"></a>
            </div>
          </div><!-- End service Item -->
        </div>
      </div>

    </section><!-- /Services Section -->

    <!-- Features Section -->
    <section id="features" class="features section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>NEW</h2>
        <div><span>Check the</span> <span class="description-title">Latest in Saudi Arabia</span></div>
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
    </section></section><!-- /Features Section -->


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
  <script src="js/app.js"></script>
  <script src="{{ asset('assets/js/app.js') }}"></script>


</body>

</html>