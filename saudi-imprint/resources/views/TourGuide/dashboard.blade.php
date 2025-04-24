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
          <li><a href="{{ route('messages.index') }}">Messages <span id="unreadBadge" class="badge bg-danger" style="display: none;"></span></a></li>
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
                        {{ $tourGuide?->bio ?? 'Bio not available' }}
                      </div>
                    </div>
                   

                    <div class="row mb-3">
                      <div class="col-lg-3 col-md-4 fw-bold text-muted">Skills</div>
                      <div class="col-lg-9 col-md-8">
                        {{ $tourGuide?->skills ?? 'Skills information not available' }}
                      </div>
                    </div>

                    {{-- Each field may be stored as a JSON string or an array in the database.
                    decode the data if it's stored as a string and handle any missing or empty values 
                    by displaying a fallback message --}}

                    @php
                    $languages = is_string($tourGuide->languages) ? json_decode($tourGuide->languages, true) : $tourGuide->languages;
                    $regions = is_string($tourGuide->ROO) ? json_decode($tourGuide->ROO, true) : $tourGuide->ROO;
                    $preferences = is_string($tourGuide->prefrences) ? json_decode($tourGuide->prefrences, true) : $tourGuide->prefrences;
                    @endphp
                
                <div class="row mb-3">
                  <div class="col-lg-3 col-md-4 fw-bold text-muted">Languages</div>
                  <div class="col-lg-9 col-md-8">
                    @if(!empty($languages))
                      {{ is_array($languages) ? implode(', ', $languages) : $languages }}
                    @else
                      Languages not available
                    @endif
                  </div>
                </div>
                
                <div class="row mb-3">
                  <div class="col-lg-3 col-md-4 fw-bold text-muted">Regions</div>
                  <div class="col-lg-9 col-md-8">
                    @if(!empty($regions))
                      {{ is_array($regions) ? implode(', ', $regions) : $regions }}
                    @else
                      Regions of operation info is not available
                    @endif
                  </div>
                </div>
                
                <div class="row mb-3">
                  <div class="col-lg-3 col-md-4 fw-bold text-muted">Preferences</div>
                  <div class="col-lg-9 col-md-8">
                    @if(!empty($preferences))
                      {{ is_array($preferences) ? implode(', ', $preferences) : $preferences }}
                    @else
                      Preferences not available
                    @endif
                  </div>
                </div>
                
                    
                    <div class="text-center mt-4">
                      <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</button>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
          
    
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
              <small class="text-muted">List your skills, separated by commas (e.g., Sign Language, First Aid, Photography)</small>
            </div>

            <div class="mb-3">
              <label for="guideExperience" class="form-label">Years of Experience</label>
              <div class="input-group">
                <span class="input-group-text"><i class="bi bi-calendar-check"></i></span>
<input type="number" class="form-control" id="guideExperience" name="years_experience" value="{{ $tourGuide?->years_experience ?? '0' }}" min="0" placeholder="Enter years of experience">
              </div>
            </div>

            <div class="mb-3">
              <label class="form-label" for="languages-group">Languages Spoken</label>
              <div id="languages-group" class="p-3 bg-light rounded">
                <div class="checkbox-columns">
                  @php
                  // Check if languages is already an array, otherwise decode it
                  $currentLangs = old('languages', is_array($tourGuide?->languages) ? $tourGuide->languages : (json_decode($tourGuide->languages, true) ?: []));
                @endphp
                
            
                  @foreach (['Arabic', 'English', 'Spanish', 'French', 'German', 'Italian', 'Chinese', 'Japanese', 'Russian', 'Turkish', 'Urdu', 'Hindi'] as $lang)
                    <div class="form-check">
                      <input 
                        class="form-check-input" 
                        type="checkbox" 
                        name="languages[]" 
                        value="{{ $lang }}" 
                        id="language_{{ strtolower($lang) }}"
                        {{ in_array($lang, $currentLangs) ? 'checked' : '' }}
                      >
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
                    $currentROO = is_array($tourGuide?->ROO) ? $tourGuide->ROO : (json_decode($tourGuide->ROO, true) ?: []);
                    
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
                    $currentPrefs = is_array($tourGuide?->prefrences) ? $tourGuide->prefrences : (json_decode($tourGuide->prefrences, true) ?: []);
                    
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
<div class="text-center mb-4">
  <h2 class="fs-1" id="edit">Added Tours</h2>
</div>
<div class="d-flex justify-content-center">
  <div class="table-responsive rounded p-3" style="width: 90%; max-width: 1100px;">
    <table class="table table-bordered table-hover text-center mb-0">
      <thead class="table-dark">
          <tr>
              <th>Tour Name</th>
              <th>Location</th>
              <th>Date & Time</th>
              <th>Max Participants</th>
              <th>Tour Type</th>
              <th>Description</th>
              <th>Price (SAR)</th>
              <th>Duration</th>
              <th>Included</th>
              <th>Actions</th>
          </tr>
      </thead>
      <tbody id="tourTableBody">
          @forelse($tours as $tour)
              <tr>
                  <td>{{ $tour->name }}</td>
                  <td>{{ $tour->location }}</td>
                  <td>{{ \Carbon\Carbon::parse($tour->date)->format('M d, Y - h:i A') }}</td>
                  <td>{{ $tour->max_participants }}</td>
                  <td>
                    @php
                        $types = is_string($tour->type_of_tour)
                            ? json_decode($tour->type_of_tour, true)
                            : $tour->type_of_tour;
                
                        $typesList = is_array($types) ? implode(', ', $types) : 'N/A';
                    @endphp
                    {{ $typesList }}
                </td>
                  <td>{{ Str::limit($tour->description ?? 'No description available', 50) }}</td>
                  <td>{{ number_format($tour->price, 2) }}</td>
                  <td>{{ $tour->duration ?? 'N/A' }}</td>
                  <td>{{ $tour->included ?? 'N/A' }}</td>
                  <td>
                      <div class="d-flex justify-content-center gap-2">
                          <a href="{{ route('tours.edit', $tour->id) }}" class="btn btn-sm btn-primary d-flex align-items-center gap-1">
                              <i class="bi bi-pencil"></i> Edit
                          </a>
                          <form action="{{ route('tours.destroy', $tour->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this tour?')">
                              @csrf
                              @method('DELETE')
                              <button type="submit" class="btn btn-sm btn-danger d-flex align-items-center gap-1">
                                  <i class="bi bi-trash"></i> Delete
                              </button>
                          </form>
                      </div>
                  </td>
              </tr>
          @empty
              <tr>
                  <td colspan="10" class="text-center">No tours added yet</td>
              </tr>
          @endforelse
      </tbody>
  </table>  
  </div>
</div>
<br><br><br><br>

<!-- Reviews Section -->
@if(isset($averageRating) && isset($reviews))
<div class="card mt-4">
  <div class="card-header">
      <h5>Your Reviews</h5>
      <div class="d-flex align-items-center">
          <strong>Average Rating: </strong>
          <div class="ms-2">
              @if($averageRating)
                  @for($i = 1; $i <= 5; $i++)
                      @if($i <= round($averageRating))
                          <i class="bi bi-star-fill text-warning"></i>
                      @else
                          <i class="bi bi-star text-warning"></i>
                      @endif
                  @endfor
                  <span class="ms-2">({{ number_format($averageRating, 1) }})</span>
              @else
                  <span class="text-muted">No ratings yet</span>
              @endif
          </div>
      </div>
  </div>
  <div class="card-body">
      @if($reviews->count() > 0)
          @foreach($reviews as $review)
              <div class="border-bottom mb-3 pb-3">
                  <div class="d-flex justify-content-between">
                      <div>
                          <strong>{{ $review->user->name }}</strong> 
                          <small class="text-muted">{{ $review->created_at->format('M d, Y') }}</small>
                      </div>
                      <div>
                          @for($i = 1; $i <= 5; $i++)
                              @if($i <= $review->rating)
                                  <i class="bi bi-star-fill text-warning"></i>
                              @else
                                  <i class="bi bi-star text-warning"></i>
                              @endif
                          @endfor
                      </div>
                  </div>
                  <div class="mt-2">
                      <small class="text-muted">Tour: {{ $review->tour->name }}</small>
                  </div>
                  @if($review->comment)
                      <p class="mt-2 mb-0">{{ $review->comment }}</p>
                  @endif
              </div>
          @endforeach
      @else
          <p class="text-muted">No reviews yet.</p>
      @endif
  </div>
</div>
@endif
<!-- edit form-->
@if(request()->routeIs('tours.edit') && isset($editingTour))
<div class="d-flex justify-content-center mt-4">
  <div class="p-4 rounded shadow bg-light" style="width: 90%; max-width: 1100px;">
    <h3 class="mb-4 text-center">Edit Tour</h3>
    <form action="{{ route('tours.update', $editingTour->id) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
 

      <div class="mb-3">
        <label for="name" class="form-label">Tour Name</label>
        <input type="text" class="form-control" name="name" value="{{ $editingTour->name }}" required>
      </div>

      <div class="mb-3">
        <label for="location" class="form-label">Location</label>
        <input type="text" class="form-control" name="location" value="{{ $editingTour->location }}" required>
      </div>

     
      <div class="mb-3">
        <label class="form-label fw-medium">Available Date Range</label>
        <div class="row">
          <div class="col-md-6">
            <label class="form-label small">Start Date</label>
            <input type="date" class="form-control" name="start_date" value="{{ old('start_date', \Carbon\Carbon::parse($editingTour->start_date)->format('Y-m-d')) }}" required>
          </div>
          <div class="col-md-6">
            <label class="form-label small">End Date</label>
            <input type="date" class="form-control" name="end_date" value="{{ old('end_date', \Carbon\Carbon::parse($editingTour->end_date)->format('Y-m-d')) }}" required>
          </div>
        </div>
      </div>
      
      <div class="mb-3">
        <label class="form-label fw-medium">Start Time</label>
        <input type="time" class="form-control" name="start_time" value="{{ old('start_time', \Carbon\Carbon::parse($editingTour->start_time)->format('H:i')) }}" required>
      </div>
      
      <div class="mb-3">
        <label for="max_participants" class="form-label">Max Participants</label>
        <input type="number" class="form-control" name="max_participants" value="{{ $editingTour->max_participants }}" required>
      </div>

      <div class="mb-3">
          <label for="tour_image" class="form-label">Tour Image</label>
          <div class="mb-2">
              @if($editingTour->image_path)
                  <div class="mb-2">
                      <strong>Current Image:</strong>
                      <img src="{{ asset('storage/' . $editingTour->image_path) }}" alt="Tour image" class="img-thumbnail" style="max-height: 150px;">
                  </div>
              @else
                  <div class="alert alert-info">No image currently set for this tour.</div>
              @endif
          </div>
          <input type="file" class="form-control" id="tour_image" name="tour_image" accept="image/*">
          <small class="form-text text-muted">Upload a new image only if you want to replace the current one (JPG, PNG, GIF formats, max 2MB).</small>
      </div>

      <div class="mb-3">
        <label class="form-label">Tour Type</label><br>
        @php
            $availableTypes = ['Historical', 'Adventure', 'Cultural', 'Nature'];
            $selectedTypes = is_array($editingTour->type_of_tour) ? $editingTour->type_of_tour : json_decode($editingTour->type_of_tour, true);
        @endphp
        @foreach($availableTypes as $type)
            <div class="form-check form-check-inline">
              <input class="form-check-input" type="checkbox" name="type_of_tour[]" value="{{ $type }}" 
              {{ in_array($type, $selectedTypes ?? []) ? 'checked' : '' }}>
              <label class="form-check-label">{{ $type }}</label>
            </div>
        @endforeach
      </div>

      <div class="mb-3">
        <label for="description" class="form-label">Description</label>
        <textarea class="form-control" name="description" rows="3">{{ $editingTour->description }}</textarea>
      </div>

      <div class="mb-3">
        <label for="price" class="form-label">Price (SAR)</label>
        <input type="number" class="form-control" name="price" value="{{ $editingTour->price }}" required>
      </div>

      <div class="mb-3">
        <label for="duration" class="form-label">Duration (Hours)</label>
        <input type="number" class="form-control" name="duration" value="{{ $editingTour->duration }}" required>
      </div>

      <div class="mb-3">
        <label for="included" class="form-label">Included</label>
        <input type="text" class="form-control" name="included" value="{{ $editingTour->included }}" required>
      </div>
      <div class="d-flex justify-content-end gap-3 mt-3">
        <a href="{{ route('TourGuide.dashboard') }}" class="btn btn-outline-secondary">Cancel Edit</a>
        <button type="submit" class="btn btn-success">Update Tour</button>
      </div>    
    </form>
  </div>
</div>
@endif

  <footer id="footer" class="footer white-background">
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
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
 

  <!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="{{ asset('assets/js/app.js') }}"></script>
  
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Check for unread messages every 30 seconds
        checkUnreadMessages();
        setInterval(checkUnreadMessages, 30000);
        
        function checkUnreadMessages() {
            fetch('{{ route("messages.unread-count") }}')
                .then(response => response.json())
                .then(data => {
                    const badge = document.getElementById('unreadBadge');
                    if (data.unread_count > 0) {
                        badge.innerText = data.unread_count;
                        badge.style.display = 'inline';
                    } else {
                        badge.style.display = 'none';
                    }
                });
        }
    });
    </script>
  
</body>
</html>
