<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment for Tour Booking</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .payment-container {
            max-width: 600px;
            margin: auto;
            margin-top: 80px;
            padding: 30px;
            border-radius: 10px;
            background: rgb(239, 244, 235);
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        .payment-header {
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
        .moyasar-form {
            margin-top: 20px;
        }
    </style>
      <!-- Moyasar Styles -->
  <link rel="stylesheet" href="https://cdn.moyasar.com/mpf/1.15.0/moyasar.css" />
</head>
<body>

<div class="container">
    <div class="payment-container">
        <h3 class="payment-header">Complete Your Payment</h3>

        <!-- error handling-->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill me-2"></i> {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        
        
        <div class="booking-details">
            <h5>Booking Summary</h5>
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Tour:</strong> {{ $booking->tour->name }}</p>
                    <p><strong>Date:</strong> {{ date('F d, Y', strtotime($booking->booking_date)) }}</p>
                </div>
                <div class="col-md-6">
                    <p><strong>People:</strong> {{ $booking->number_of_people }}</p>
                    <p><strong>Total:</strong> {{ $booking->total_price }} SAR</p>
                </div>
            </div>
        </div>
        
        <div class="moyasar-form">
            <!-- Moyasar Payment Form -->
            <div class="mysr-form"></div>
        </div>
    </div>
</div>


  <!-- Moyasar Scripts -->
  <script src="https://cdn.moyasar.com/mpf/1.15.0/moyasar.js"></script>
  <script src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp"></script>


<script>
    Moyasar.init({
    
        element: '.mysr-form',
        amount: {{ $booking->total_price * 100 }}, // Amount in halalas (SAR * 100)
        currency: 'SAR',
        description: 'Payment for {{ $booking->tour->name }} Tour',
        publishable_api_key: '{{ config("moyasar.publishable_key") }}',
        callback_url: '{{ route("bookings.processPayment", $booking) }}',
        methods: ['creditcard'],
        metadata: {
            booking_id: '{{ $booking->id }}',
            user_id: '{{ Auth::id() }}'
        }
    });
</script>

</body>
</html>