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
            max-width: 600px;
            margin: auto;
            margin-top: 80px;
            padding: 30px;
            border-radius: 10px;
            background: rgb(239, 244, 235);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .booking-container .form-control {
            border-radius: 8px;
        }
        .booking-container .btn {
            border-radius: 8px;
            font-weight: bold;
        }
        .booking-container .btn-primary {
            background-color: #71c55d;
            border: none;
        }
        .booking-container .btn-secondary {
            background-color: #6c757d;
            border: none;
        }
        .booking-container .input-group-text {
            background-color: #e9ecef;
            border-radius: 8px 0 0 8px;
        }
        .booking-header {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="booking-container">
        <h3 class="booking-header">Book Tour: {{ $tour->name }}</h3>

        <form action="/bookings" method="POST">
            <input type="hidden" name="tour_id" value="1">
            
            <div class="mb-3">
                <label class="form-label">Tour Information</label>
                <div class="p-3 bg-light rounded">
                    <h5>{{ $tour->name }}</h5>
                    <p class="text-muted">{{ $tour->description }}</p>
                </div>
            </div>
            
            <div class="mb-3">
                <label for="booking_date" class="form-label">Select Date</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                    <input type="date" id="booking_date" name="booking_date" class="form-control" required min="2025-03-24">
                </div>
                <div class="text-danger" id="booking_date_error"></div>
            </div>
            
            <div class="mb-3">
                <label for="number_of_people" class="form-label">Number of People</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-people"></i></span>
                    <input type="number" id="number_of_people" name="number_of_people" class="form-control" min="1" value="1" required>
                </div>
                <div class="text-danger" id="number_of_people_error"></div>
            </div>
            
            <div class="mb-3">
                <label class="form-label">Price per Person</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-tag"></i></span>
                    <input type="text" class="form-control" value="500 SAR" readonly>
                </div>
            </div>
            
            <div class="mb-4">
                <label class="form-label">Total Price</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-cash"></i></span>
                    <input type="text" class="form-control" id="total_price_display" value="500 SAR" readonly>
                </div>
            </div>
            
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="{{ url()->previous() }}" class="btn btn-secondary me-md-2">Cancel</a>
                <button type="submit" class="btn btn-primary">Confirm Booking</button>
            </div>
        </form>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.getElementById('number_of_people').addEventListener('change', function() {
        const pricePerPerson = 500;
        const numberOfPeople = this.value;
        const totalPrice = pricePerPerson * numberOfPeople;
        document.getElementById('total_price_display').value = totalPrice + ' SAR';
    });
</script>

</body>
</html>