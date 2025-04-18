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
    <!-- Main CSS File -->
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
                    <form action="{{ route('tours.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Tour Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Enter tour name" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Location</label>
                                <select class="form-control @error('location') is-invalid @enderror" id="location" name="location" required>
                                    <option value="" disabled selected>Select a location</option>
                                    <option value="Riyadh" {{ old('location') == 'Riyadh' ? 'selected' : '' }}>Riyadh</option>
                                    <option value="Aljouf" {{ old('location') == 'Aljouf' ? 'selected' : '' }}>Al-Jouf</option>
                                    <option value="Alula" {{ old('location') == 'Alula' ? 'selected' : '' }}>AlUla</option>
                                    <option value="Jeddah" {{ old('location') == 'Jeddah' ? 'selected' : '' }}>Jeddah</option>
                                </select>
                                @error('location')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Available Date Range</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label class="form-label small">Start Date</label>
                                        <input type="date" class="form-control @error('start_date') is-invalid @enderror" id="start_date" name="start_date" value="{{ old('start_date') }}" min="{{ date('Y-m-d') }}" required>
                                        @error('start_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <label class="form-label small">End Date</label>
                                        <input type="date" class="form-control @error('end_date') is-invalid @enderror" id="end_date" name="end_date" value="{{ old('end_date') }}" min="{{ date('Y-m-d') }}" required>
                                        @error('end_date')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-medium">Start Time</label>
                                <input type="time" class="form-control @error('start_time') is-invalid @enderror" id="start_time" name="start_time" value="{{ old('start_time') }}" required>
                                @error('start_time')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label fw-medium">Duration (hours)</label>
                                <input type="number" class="form-control @error('duration') is-invalid @enderror" id="duration" name="duration" min="1" value="{{ old('duration') }}" placeholder="Enter duration" required>
                                @error('duration')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Maximum Participants per Day</label>
                                <input type="number" class="form-control @error('max_participants') is-invalid @enderror" id="max_participants" name="max_participants" min="1" value="{{ old('max_participants') }}" placeholder="Enter number of people" required>
                                @error('max_participants')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-medium">Price per Person (SAR)</label>
                                <input type="number" step="0.01" class="form-control @error('price') is-invalid @enderror" id="price" name="price" min="0" value="{{ old('price') }}" placeholder="Enter price" required>
                                @error('price')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-medium">What's Included</label>
                            <input type="text" class="form-control @error('included') is-invalid @enderror" id="included" name="included" value="{{ old('included') }}" placeholder="E.g. Transportation, Meals ..etc" required>
                            @error('included')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-medium">Tour Types</label>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="type_of_tour[]" value="Cultural" id="cultural" {{ (is_array(old('type_of_tour')) && in_array('Cultural', old('type_of_tour'))) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="cultural">Cultural</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="type_of_tour[]" value="Adventure" id="adventure" {{ (is_array(old('type_of_tour')) && in_array('Adventure', old('type_of_tour'))) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="adventure">Adventure</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="type_of_tour[]" value="Historical" id="historical" {{ (is_array(old('type_of_tour')) && in_array('Historical', old('type_of_tour'))) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="historical">Historical</label>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="type_of_tour[]" value="Nature" id="nature" {{ (is_array(old('type_of_tour')) && in_array('Nature', old('type_of_tour'))) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="nature">Nature</label>
                                    </div>
                                </div>
                            </div>
                            @error('type_of_tour')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-medium">Description</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="4" placeholder="Enter tour description" required>{{ old('description') }}</textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Hidden User ID Field -->
                        <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                        <!-- Hidden Active Field - Setting to true by default -->
                        <input type="hidden" name="active" value="1">
                        
                        <div class="mb-3">
                            <label class="form-label fw-medium">Tour Image</label>
                            <input type="file" class="form-control @error('tour_image') is-invalid @enderror" id="tour_image" name="tour_image" accept="image/*" required>
                            @error('tour_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Upload an image for your tour (JPG, PNG, GIF formats, max 2MB).</small>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Add Tour</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Set minimum date for start date to today
            const today = new Date().toISOString().split('T')[0];
            document.getElementById('start_date').setAttribute('min', today);
            
            // Update end date minimum value when start date changes
            document.getElementById('start_date').addEventListener('change', function() {
                document.getElementById('end_date').setAttribute('min', this.value);
                
                // If end date is earlier than new start date, update it
                if (document.getElementById('end_date').value < this.value) {
                    document.getElementById('end_date').value = this.value;
                }
            });
        });
    </script>
</body>
</html>