<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>{{ $tour->name }}</title>
  <meta name="description" content="{{ $tour->description }}">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

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
  <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">

  <!-- Leaflet CSS -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
  <!-- Leaflet JS -->
  <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
</head>

<body class="service-details-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="{{ route('home') }}" class="logo d-flex align-items-center">
        <h1 class="sitename"><span>S</span>audi Imprint</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('home') }}" class="active">Home</a></li>
          <li><a href="#view">Tour Details</a></li>
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
              <h1>{{ $tour->name }}</h1>
              <p class="mb-0">{{ $tour->description }}</p>
            </div>
          </div>
        </div>
      </div>
      <nav class="breadcrumbs">
        <div class="container">
          <ol>
            <li><a href="{{ route('riyadh') }}">{{ $tour->location }}</a></li>
            <li class="current">{{ $tour->name }}</li>
          </ol>
        </div>
      </nav>
    </div><!-- End Page Title -->

    <div class="container my-5" id="view" data-aos="fade-up" data-aos-delay="100">
      <div class="container section-title" data-aos="fade-up"></div>
      <div class="row align-items-center" data-aos="fade-up">
        <!-- الصورة على اليسار -->
        <div class="col-md-4 text-center">
          <img src="{{ asset('storage/' . $tour->image_path) }}" alt="Tour image" class="img-fluid">
        </div>

        <!-- التفاصيل على اليمين -->
        <div class="col-md-8">
          <h2>Tour Details : </h2>
          <a href="#" data-bs-toggle="modal" data-bs-target="#guideModal" style="color: black; text-decoration: none;">By the Tour Guide, <span style="color: forestgreen;">{{ $tour->guide->name ?? 'Unknown Guide' }}</span></a>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <strong>Available Dates:</strong>
              {{ \Carbon\Carbon::parse($tour->start_date)->format('F j, Y') }} –
              {{ \Carbon\Carbon::parse($tour->end_date)->format('F j, Y') }}
            </li>
            <li class="list-group-item">
              <strong>Start Time:</strong>
              {{ \Carbon\Carbon::parse($tour->start_time)->format('g:i A') }}
            </li>            
            <li class="list-group-item"><strong>Duration:</strong> {{ $tour->duration }}</li>
            <li class="list-group-item"><strong>Group Size:</strong> {{ $tour->max_participants }}</li>
            @php
                $types = is_array($tour->type_of_tour) ? $tour->type_of_tour : json_decode($tour->type_of_tour, true);
            @endphp
            <li class="list-group-item"><strong>Type of Tour:</strong> {{ $types ? implode(', ', $types) : 'Unknown' }} </li>
            <li class="list-group-item"><strong>Price:</strong> {{ $tour->price }} SAR per person</li>
            <li class="list-group-item"><strong>Included:</strong>
              <ul>
                @foreach (explode(',', $tour->included) as $item)
                  <li>{{ $item }}</li>
                @endforeach
              </ul>
            </li>
            <li class="list-group-item"><strong>Cancellation Policy:</strong> Free cancellation up to 24 hours before the tour.</li>
          </ul>
          {{-- <a href="#" class="btn btn-primary w-25 mt-3" style="margin-left: 250px;">Book Now</a> --}}
          <a href="{{ route('bookings.create', $tour->id) }}" class="btn btn-primary w-25 mt-3" style="margin-left: 250px;">Book Now</a>

        </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="guideModal" tabindex="-1" aria-labelledby="guideModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="guideModalLabel">Tour Guide: {{ $tour->guide->name ?? 'Unknown '}}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
        
            <p><strong>Languages Spoken:</strong> {{ $tour->tourGuide->languages ? implode(', ', $tour->tourGuide->languages) : 'Unknown' }}</p>
            <p><strong>Years of Experience:</strong> {{ $tour->tourGuide->years_experience ?? 'Unknown ' }}</p>
            <p><strong>Bio:</strong> {{ $tour->tourGuide->bio ?? 'Unknown '}}</p>
            <p><strong>Skills:</strong> {{ $tour->tourGuide->skills ?? 'Unknown '}}</p>
            <p><strong>Languages Spoken:</strong> {{ $tour->tourGuide->languages ? implode(', ', $tour->tourGuide->prefrences) : 'Unknown' }}</p>
            <p><strong>For any questions or assistance, please email me at:</strong> {{ $tour->guide->email ?? 'Unknown ' }}</p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

  </main>

  <footer id="footer" class="footer light-background">

    <div class="container">
      <div class="copyright text-center ">
        <p>© <span>Copyright</span> <strong class="px-1 sitename">Saudi Imprint</strong> <span>All Rights Reserved</span></p>
      </div>
  

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets/js/main.js') }}"></script>
  <script src="{{ asset('assets/js/app.js') }}"></script>

</body>

</html>