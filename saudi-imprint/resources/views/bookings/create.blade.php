<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Tour</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .booking-container {
            max-width: 800px;
            margin: auto;
            margin-top: 50px;
            padding: 30px;
            border-radius: 12px;
            background: rgb(239, 244, 235);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        .booking-container .form-control, .booking-container .form-select {
            border-radius: 8px;
            padding: 10px 15px;
        }
        .booking-container .btn {
            border-radius: 8px;
            font-weight: bold;
            padding: 10px 20px;
        }
        .booking-container .btn-primary {
            background-color: #71c55d;
            border: none;
            transition: background-color 0.3s;
        }
        .booking-container .btn-primary:hover {
            background-color: #5eb14a;
        }
        .booking-container .btn-secondary {
            background-color: #6c757d;
            border: none;
            transition: background-color 0.3s;
        }
        .booking-container .btn-secondary:hover {
            background-color: #5a6268;
        }
        .booking-container .input-group-text {
            background-color: #e9ecef;
            border-radius: 8px 0 0 8px;
        }
        .booking-header {
            text-align: center;
            margin-bottom: 25px;
            font-weight: bold;
            color: #2c3e50;
        }
        .tour-info {
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            margin-bottom: 25px;
            border-left: 4px solid #71c55d;
        }
        .tour-info h5 {
            color: #2c3e50;
            margin-bottom: 10px;
        }
        .tour-price {
            font-weight: bold;
            color: #71c55d;
        }
        .form-label {
            font-weight: 500;
            margin-bottom: 8px;
            color: #2c3e50;
        }
        .booking-summary {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px;
            margin-top: 25px;
            border-left: 4px solid #71c55d;
        }
        .summary-header {
            font-weight: bold;
            margin-bottom: 15px;
            color: #2c3e50;
        }
        .badge {
            font-size: 0.9rem;
            padding: 8px 12px;
            margin-right: 5px;
            margin-bottom: 5px;
        }
        .availability-info {
            background-color: #e8f4ff;
            border-radius: 8px;
            padding: 12px;
            margin-bottom: 15px;
            border-left: 4px solid #3498db;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="booking-container">
        <h3 class="booking-header">Book Your Tour</h3>

        <div class="tour-info">
            <h5>{{ $tour->name }}</h5>
            <p class="mb-1"><i class="bi bi-geo-alt me-2"></i>{{ $tour->location }}</p>
            <p class="mb-1"><i class="bi bi-clock me-2"></i>{{ $tour->duration }} hours</p>
            <p class="mb-3 text-muted">{{ $tour->description }}</p>
            
            <div class="mb-2">
                @php
                    $tourTypes = $tour->type_of_tour;
                    if (is_string($tourTypes)) {
                        // Try to decode JSON string
                        $decodedTypes = json_decode($tourTypes, true);
                        $tourTypes = (is_array($decodedTypes)) ? $decodedTypes : [$tourTypes];
                    } elseif (!is_array($tourTypes)) {
                        $tourTypes = [$tourTypes];
                    }
                @endphp
                
                @foreach($tourTypes as $type)
                    <span class="badge bg-light text-dark">{{ $type }}</span>
                @endforeach
            </div>
            
            <div class="availability-info">
                <p class="mb-2"><i class="bi bi-calendar-event me-2"></i><strong>Available from:</strong> {{ date('F j, Y', strtotime($tour->start_date)) }} to {{ date('F j, Y', strtotime($tour->end_date)) }}</p>
                <p class="mb-0"><i class="bi bi-alarm me-2"></i><strong>Tour starts at:</strong> {{ date('g:i A', strtotime($tour->start_time)) }} </p>
            </div>
            
            <div class="d-flex justify-content-between align-items-center">
                <p class="mb-0"><strong>Included:</strong> {{ $tour->included }}</p>
                <p class="tour-price mb-0">{{ $tour->price }} SAR per person</p>
            </div>
        </div>

        <form action="{{ route('bookings.store') }}" method="POST">
            @csrf
            <input type="hidden" name="tour_id" value="{{ $tour->id }}">
            
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="booking_date" class="form-label">Select Date</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                        <input type="date" id="booking_date" name="booking_date" class="form-control" required
                               min="{{ \Carbon\Carbon::now()->format('Y-m-d') }}" 
                               max="{{ $tour->end_date }}"
                               value="{{ old('booking_date', date('Y-m-d', strtotime($tour->start_date))) }}">
                    </div>
                    <div class="text-danger">{{ $errors->first('booking_date') }}</div>
                    <small class="text-muted">Please select a date within the available range</small>
                </div>
                
                <div class="col-md-6">
                    <label for="number_of_people" class="form-label">Number of People</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="bi bi-people"></i></span>
                        <input type="number" id="number_of_people" name="number_of_people" class="form-control" min="1" max="{{ $tour->max_participants }}" value="1" required>
                    </div>
                    <div class="text-danger">{{ $errors->first('number_of_people') }}</div>
                    <small class="text-muted">Maximum {{ $tour->max_participants }} participants allowed per day</small>
                </div>
            </div>
            
            <div class="booking-summary">
                <h5 class="summary-header">Booking Summary</h5>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <p class="mb-1">Tour Date:</p>
                        <h6 id="display_selected_date">{{ date('F j, Y', strtotime($tour->start_date)) }}</h6>
                        <p class="mb-1">Tour Time:</p>
                        <h6>{{ date('g:i A', strtotime($tour->start_time)) }}</h6>
                    </div>
                    <div class="col-md-6">
                        <p class="mb-1">Price per Person:</p>
                        <h6>{{ $tour->price }} SAR</h6>
                        <p class="mb-1">Total Price:</p>
                        <h5 class="tour-price" id="total_price_display">{{ $tour->price }} SAR</h5>
                        <input type="hidden" name="total_price" id="total_price_input" value="0">
                    </div>
                </div>
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-4">
                <a href="{{ url()->previous() }}" class="btn btn-secondary me-md-2">Cancel</a>
                <button type="submit" class="btn btn-primary">Confirm Booking</button>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const pricePerPerson = {{ $tour->price }};
        const maxParticipants = {{ $tour->max_participants }};
        const numberOfPeopleInput = document.getElementById('number_of_people');
        const totalPriceDisplay = document.getElementById('total_price_display');
        const bookingDateInput = document.getElementById('booking_date');
        const displaySelectedDate = document.getElementById('display_selected_date');
        const totalPriceInput = document.getElementById('total_price_input');
        

        // Calculate and update total price
        function updateTotalPrice() {
        let people = parseInt(numberOfPeopleInput.value) || 0;
        
        // Validate against maximum participants
        if (people > maxParticipants) {
            people = maxParticipants;
            numberOfPeopleInput.value = maxParticipants;
        }
        
        const totalPrice = pricePerPerson * people;
        totalPriceDisplay.textContent = totalPrice + ' SAR';
        totalPriceInput.value = totalPrice;
        }

        // Initialize the total price when page loads
        updateTotalPrice();

        // Update total price when number of people changes
        numberOfPeopleInput.addEventListener('input', updateTotalPrice);

        });
        
        // Update display date when date input changes
        bookingDateInput.addEventListener('change', function() {
            const selectedDate = new Date(this.value);
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            displaySelectedDate.textContent = selectedDate.toLocaleDateString('en-US', options);
    
    });
</script>

</body>
</html>