<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Confirmation</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .confirmation-container {
            max-width: 600px;
            margin: auto;
            margin-top: 80px;
            padding: 30px;
            border-radius: 10px;
            background: rgb(239, 244, 235);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .confirmation-header {
            text-align: center;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .booking-details {
            background-color: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .payment-status {
            text-align: center;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-weight: bold;
        }
        .status-paid {
            background-color: #d4edda;
            color: #155724;
        }
        .status-pending {
            background-color: #fff3cd;
            color: #856404;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="confirmation-container">
        <h3 class="confirmation-header">Booking Confirmation</h3>
        
        @if (session('success'))
            <div class="alert alert-success mb-4">
                {{ session('success') }}
            </div>
        @endif
        
        <div class="payment-status {{ $booking->payment_status == 'paid' ? 'status-paid' : 'status-pending' }}">
            @if ($booking->payment_status == 'paid')
                <i class="bi bi-check-circle"></i> Payment Completed
            @else
                <i class="bi bi-exclamation-circle"></i> Payment Pending
            @endif
        </div>
        
        <div class="booking-details">
            <h5>Booking Details</h5>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Booking ID:</strong> #{{ $booking->id }}</p>
                    <p><strong>Tour:</strong> {{ $booking->tour->name }}</p>
                    <p><strong>Date:</strong> {{ date('F d, Y', strtotime($booking->booking_date)) }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>People:</strong> {{ $booking->number_of_people }}</p>
                    <p><strong>Total:</strong> {{ $booking->total_price }} SAR</p>
                    @if ($booking->payment_id)
                        <p><strong>Payment ID:</strong> {{ $booking->payment_id }}</p>
                    @endif
                </div>
            </div>
        </div>
        
        @if ($booking->payment_status != 'paid')
            <div class="d-grid gap-2">
                <a href="{{ route('bookings.payment', $booking) }}" class="btn btn-primary">
                    Complete Payment
                </a>
            </div>
        @endif
        
        <div class="d-grid gap-2 mt-3">
            <a href="{{route('home')}}" class="btn btn-outline-secondary">Back to home</a>
        </div>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>