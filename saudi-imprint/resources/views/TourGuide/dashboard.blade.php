<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Tour Guide Dashboard</title>
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
  <!-- Add CSS for checkbox columns -->
  <style>
    .checkbox-columns {
      column-count: 2;
    }
    
    /* Make modal larger on bigger screens */
    @media (min-width: 992px) {
      .modal-lg {
        max-width: 800px;
      }
    }
  
  </style>
</head><body class="service-details-page">
  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <h1 class="sitename"><span>S</span>audi Imprint</h1>
      </a>
      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="{{ route('home') }}" class="active">Home</a></li>
          <li><a href="{{ route('add_tour') }}">Add Tours</a></li>
          <li><a href="#edit">Edit Tour</a></li>
          <li><a href="#private">Check Private Tours request</a></li>
          <li><a href="#" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>

  <!-- Success/Error Messages -->
  @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show container mt-4" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <!-- Tour Guide Dashboard Content -->
  <main id="main">
    <section class="service-details">
      <div class="container">
        <div class="section-header">
          <h2>Tour Guide Dashboard</h2>
          <p>Welcome, {{ $user->name }}</p>
        </div>

        <div class="row gy-4">
          <div class="col-lg-4">
            <div class="card">
              <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                <img src="{{ $tourGuide->image_path ?? 'https://static.vecteezy.com/system/resources/previews/009/292/244/original/default-avatar-icon-of-social-media-user-vector.jpg' }}" 
                  alt="Profile Picture" class="rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
                <h2 class="mt-2">{{ $user->name }}</h2>
                <h3>Tour Guide</h3>
                <div class="social-links mt-2">
                  <p class="text-center">{{ $tourGuide?->years_experience ?? 'Experience information not available' }}{{ $tourGuide ? ' years of experience' : '' }}</p>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-8">
            <div class="card">
              <div class="card-body pt-3">
                <h5 class="card-title">Profile Details</h5>
                <div class="row">
                  <div class="col-lg-12">
                    <div class="row mb-3">
                      <div class="col-lg-3 col-md-4 fw-bold text-muted">Bio</div>
                      <div class="col-lg-9 col-md-8">
                        {{ $tourGuide?->bio ?? 'bio not available' }}{{ $tourGuide ? ' Bio' : '' }}
                      </div>
                    </div>
                    
                    <div class="row mb-3">
                      <div class="col-lg-3 col-md-4 fw-bold text-muted">Skills</div>
                      <div class="col-lg-9 col-md-8">
                        {{ $tourGuide?->skills ?? 'skills information not available' }}{{ $tourGuide ? ' Skills' : '' }}
                      </div>
                    </div>
                    
                    <div class="row mb-3">
                      <div class="col-lg-3 col-md-4 fw-bold text-muted">Languages</div>
                      <div class="col-lg-9 col-md-8">{{ $tourGuide?->languages ? implode(', ', json_decode($tourGuide->languages, true)) : 'Languages not available' }}</div>
                    </div>
                    
                    <div class="row mb-3">
                      <div class="col-lg-3 col-md-4 fw-bold text-muted">Regions</div>
                      <div class="col-lg-9 col-md-8">{{ $tourGuide?->ROO ? implode(', ', json_decode($tourGuide->ROO, true)) : 'Regions of operation info is not available' }}</div>
                    </div>
                    
                    <div class="row mb-3">
                      <div class="col-lg-3 col-md-4 fw-bold text-muted">Preferences</div>
                      <div class="col-lg-9 col-md-8">{{ $tourGuide?->prefrences ? implode(', ', json_decode($tourGuide->prefrences, true)) : 'prefrences not available' }}</div>
                    </div>
                    
                    <div class="text-center mt-4">
                      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
  <!-- Edit Profile Modal -->
  <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form method="POST" action="{{ route('TourGuide.updateProfile') }}" enctype="multipart/form-data">
        @csrf
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editProfileModalLabel">Edit Your Profile</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">
            <div class="mb-3 text-center">
              <!-- Preview image -->
              <img id="imagePreview"
                src="{{ $tourGuide->image_path ?? 'https://static.vecteezy.com/system/resources/previews/009/292/244/original/default-avatar-icon-of-social-media-user-vector.jpg' }}" 
                alt="Profile Picture"
                class="rounded-circle border border-secondary mb-2"
                style="width: 120px; height: 120px; object-fit: cover;">
              <!-- Image upload field -->
              <input class="form-control mt-2" type="file" name="image" id="guideImage" accept="image/*" style="max-width: 300px; margin: 0 auto;">
            </div>
            
            <div class="mb-3">
              <label for="guideName" class="form-label">Name</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person"></i></span>
                <input type="text" class="form-control" id="guideName" name="name" value="{{ $user->name }}" placeholder="Enter your name">
              </div>
            </div>

            <div class="mb-3">
              <label for="guideBio" class="form-label">Bio / About Me</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-person-lines-fill"></i></span>
                <textarea class="form-control" id="guideBio" name="bio" rows="3" placeholder="Tell us about yourself and your background">{{ $tourGuide?->bio ?? '' }}</textarea>
              </div>
              <small class="text-muted">Tell us about yourself and your background (max 500 characters)</small>
            </div>

            <div class="mb-3">
              <label for="guideSkills" class="form-label">Skills</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-tools"></i></span>
                <input type="text" class="form-control" id="guideSkills" name="skills" value="{{ $tourGuide?->skills ?? '' }}" placeholder="List your skills, separated by commas">
              </div>
              <small class="text-muted">List your skills, separated by commas (e.g., Navigation, First Aid, Photography)</small>
            </div>

            <div class="mb-3">
              <label for="guideExperience" class="form-label">Years of Experience</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-calendar-check"></i></span>
<input type="number" class="form-control" id="guideExperience" name="years_experience" value="{{ $tourGuide?->years_experience ?? '0' }}" min="0" placeholder="Enter years of experience">
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label">Languages Spoken</label>
              <div class="p-3 bg-light rounded">
                <div class="checkbox-columns">
                  @php
                    $currentLangs = $tourGuide?->languages ? json_decode($tourGuide->languages, true) : [];
                  @endphp
            
                  @foreach (['Arabic', 'English', 'Spanish', 'French', 'German', 'Italian', 'Chinese', 'Japanese', 'Russian', 'Turkish', 'Urdu', 'Hindi'] as $lang)
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="languages[]" value="{{ $lang }}" id="language_{{ strtolower($lang) }}"
                        {{ in_array($lang, $currentLangs) ? 'checked' : '' }}>
                      <label class="form-check-label" for="language_{{ strtolower($lang) }}">{{ $lang }}</label>
                    </div>
                  @endforeach
            
                </div>
              </div>
            </div>
            

            <div class="mb-3">
              <label class="form-label">Regions of Operation (ROO)</label>
              <div class="p-3 bg-light rounded">
                <div class="checkbox-columns">
                  @php
                    $currentROO = $tourGuide?->ROO ? json_decode($tourGuide->ROO, true) : [];
                    $regions = [
                      'Riyadh', 'Makkah', 'Madinah', 'Eastern Province', 'Asir', 'Tabuk',
                      'Hail', 'Northern Borders', 'Jazan', 'Najran', 'Al-Baha', 'Al-Jouf', 'Al-Qassim'
                    ];
                  @endphp
            
                  @foreach ($regions as $region)
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="ROO[]" value="{{ $region }}" id="region_{{ Str::slug($region, '_') }}"
                        {{ in_array($region, $currentROO) ? 'checked' : '' }}>
                      <label class="form-check-label" for="region_{{ Str::slug($region, '_') }}">{{ $region }}</label>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
            

            <div class="mb-3">
              <label class="form-label">Preferences</label>
              <div class="p-3 bg-light rounded">
                <div class="checkbox-columns">
                  @php
                    $currentPrefs = $tourGuide?->prefrences ? json_decode($tourGuide->prefrences, true) : [];
                    $preferences = [
                      'Historical Sites', 'Cultural Experiences', 'Outdoor Adventures', 'Desert Excursions',
                      'Culinary Tours', 'Shopping Tours', 'Religious Sites', 'Photography Tours',
                      'Family Friendly', 'Luxury Experiences'
                    ];
                  @endphp
            
                  @foreach ($preferences as $pref)
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="prefrences[]"
                             value="{{ $pref }}" id="pref_{{ Str::slug($pref, '_') }}"
                             {{ in_array($pref, $currentPrefs) ? 'checked' : '' }}>
                      <label class="form-check-label" for="pref_{{ Str::slug($pref, '_') }}">{{ $pref }}</label>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
            

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
</div><br><br><br>

    <!-- Ttable to display added tours -->
    <h2 class="text-center mb-4 fs-1" id="edit">Added Tours & Edit </h2>
    <div class="table-responsive">
        <table class="table table-bordered table-hover text-center mt-3 shadow-sm rounded">
            <thead class="table-dark">
                <tr>
                    <th>Tour Name</th>
                    <th>Location</th>
                    <th>Date & Time</th>
                    <th>Number of People</th>
                    <th>Type</th>
                    <th>Features</th>
                    <th>Edit | Delete</th>
                </tr>
            </thead>
            <tbody id="tourTableBody">
                <!-- Dynamic rows will be added here -->
            </tbody>
        </table>
    </div>
</div>
<br><br><br><br>

<!--Check Private tours requests -->
<div class="text-center mb-4">
  <h2 id="private" class="fs-1">Private Tours Request</h2>
</div>

<!-- تغليف الجدول لتحجيمه وتنسيقه -->
<div class="d-flex justify-content-center">
  <div class="table-responsive rounded p-3" style="width: 90%; max-width: 1100px;">
    <table class="table table-bordered table-hover text-center mb-0">
      <thead class="table-dark">
        <tr>
          <th>Requester Name</th>
          <th>Tour Location</th>
          <th>Requested Date</th>
          <th>Number of People</th>
          <th>Payment Method</th>
          <th>Communicate</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody id="privateTourTableBody">
        <!-- Private tour requests will be added dynamically -->
      </tbody>
    </table>
  </div>
</div>
<br><br><br><br><br><br>
    <div class="modal fade" id="messageModal" tabindex="-1" aria-labelledby="messageModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="messageModalLabel">Send Message</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p id="recipientName" class="fw-bold"></p>
        <textarea class="form-control" placeholder="Write your message..." rows="4"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Send</button>
      </div>
    </div>
  </div>
</div>
</main>

<!--بيانات تجريبيه غير اساسيه -->
    <script>
  const privateTours = [
    {
      requester: "Sara Ali",
      location: "Riyadh",
      date: "2025-04-10",
      people: 4,
      payment: "Credit Card"
    },
    {
      requester: "Ahmed Alzahrani",
      location: "Jeddah",
      date: "2025-05-15",
      people: 2,
      payment: "Apple Pay"
    },
    {
      requester: "Lama Mohammed",
      location: "AlUla",
      date: "2025-04-25",
      people: 6,
      payment: "Cash"
    }
  ];

  const tableBody = document.getElementById("privateTourTableBody");

  privateTours.forEach(tour => {
    const row = document.createElement("tr");
    row.innerHTML = `
      <td>${tour.requester}</td>
      <td>${tour.location}</td>
      <td>${tour.date}</td>
      <td>${tour.people}</td>
      <td>${tour.payment}</td>
      <td>
      <button class="btn btn-sm btn-primary" onclick="openMessageModal('${tour.requester}')">Message</button>
    </td>
      <td class="d-flex gap-2">
        <button class="btn btn-sm btn-success">Accept</button>
        <button class="btn btn-sm btn-danger">Reject</button>
      </td>
    `;
    tableBody.appendChild(row);
  });
</script>
  <footer id="footer" class="footer white-background">
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

  <!-- JavaScript to preview image before upload -->
  <script>
    document.getElementById('guideImage').addEventListener('change', function(e) {
      const reader = new FileReader();
      reader.onload = function(event) {
        document.getElementById('imagePreview').src = event.target.result;
      }
      reader.readAsDataURL(e.target.files[0]);
    });
  </script>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
 

  <!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="{{ asset('assets/js/app.js') }}"></script>
  
</body>
</html>
