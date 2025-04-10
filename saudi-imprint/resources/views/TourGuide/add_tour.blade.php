<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Tour</title>
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
</head>
<body>
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
            </div>
        </div>
    </section>

</body>
</html>
