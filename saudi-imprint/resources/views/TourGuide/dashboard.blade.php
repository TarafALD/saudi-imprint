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
          <li><a href="#add">Add Tour</a></li>
          <li><a href="#edit">Edit Tour</a></li>
          <li><a href="#private">Check Private Tours request</a></li>
          <li><a href="#" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit Profile</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
    </div>
  </header>
  <!-- Edit Profile Modal -->
<div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="..." enctype="multipart/form-data">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editProfileModalLabel">Edit Your Profile</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
        <div class="mb-3 text-center">
  <!-- صورة المعاينة الدائرية -->
  <img id="imagePreview"
     src="https://static.vecteezy.com/system/resources/previews/009/292/244/original/default-avatar-icon-of-social-media-user-vector.jpg" 
     alt="Profile Picture"
     class="rounded-circle border border-secondary mb-2"
     style="width: 120px; height: 120px; object-fit: cover;">
  <!-- حقل رفع الصورة -->
  <input class="form-control mt-2" type="file" id="guideImage" accept="image/*" style="max-width: 300px; margin: 0 auto;">
</div>
          <div class="mb-3">
            <label for="guideName" class="form-label">Name</label>
            <input type="text" class="form-control" id="guideName" placeholder="Enter your name">
          </div>

          <div class="mb-3">
            <label for="guideAge" class="form-label">Age</label>
            <input type="number" class="form-control" id="guideAge" placeholder="Enter your age">
          </div>

          <div class="mb-3">
            <label for="guideExperience" class="form-label">Years of Experience</label>
            <input type="number" class="form-control" id="guideExperience" placeholder="Enter years of experience">
          </div>

          <div class="mb-3">
            <label for="guideLanguages" class="form-label">Languages</label>
            <input type="text" class="form-control" id="guideLanguages" placeholder="e.g. English, Arabic">
          </div>

          <div class="mb-3">
          <label for="guideEmail" class="form-label">Contact Method</label>
          <input type="email" class="form-control" id="guideEmail" placeholder="Enter your email">
          </div>
          </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div>
    </form>
  </div>
</div>

  
    <!-- 1 Section -->
    <section id="hero" class="hero section light-background">
    <div class="container my-5" id="add">
        <h2 class="text-center mb-4 fs-1">Add New Tour</h2>

        <div class="card shadow">
            <div class="card-body">
                <form id="tourForm">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Tour Name</label>
                            <input type="text" class="form-control" id="tourName" placeholder="Enter tour name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-medium">Location</label>
                            <select class="form-control" id="tourLocation" required>
                                <option value="" disabled selected>Select a location</option>
                                <option value="Riyadh">Riyadh</option>
                                <option value="Al-Jouf">Al-Jouf</option>
                                <option value="AlUla">AlUla</option>
                                <option value="Jeddah">Jeddah</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Date & Time</label>
                            <input type="datetime-local" class="form-control" id="tourDateTime" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Number of People</label>
                            <input type="number" class="form-control" id="tourPeople" placeholder="Enter number of people" min="1" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-medium">Tour Type</label>
                            <select class="form-control" id="tourType" required>
                                <option value="" disabled selected>Select tour type</option>
                                <option value="Adventure">Adventure</option>
                                <option value="Historical">Historical</option>
                                <option value="Cultural">Cultural</option>
                                <option value="Nature">Nature</option>
                            </select>
                        </div>
                    </div>

                    <label class="form-label fw-medium">Available Features</label>
                    <div class="row mb-3">
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Car" id="car">
                                <label class="form-check-label" for="car">Car</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Snacks" id="snacks">
                                <label class="form-check-label" for="snacks">Snacks</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Private Guide" id="guide">
                                <label class="form-check-label" for="guide">Private Guide</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Entrance Tickets" id="tickets">
                                <label class="form-check-label" for="tickets">Entrance Tickets</label>
                            </div>
                        </div>
                    </div>

                    <button type="button" class="btn btn-primary w-100" onclick="addTour()">Add Tour</button>
                </form>
            </div>
        </div><br><br><br>

    <!-- Table to display added tours -->
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
</section>
  <!-- Section for Private Tour Requests -->
 


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
