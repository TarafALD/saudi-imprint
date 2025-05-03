<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Saudi Imprint - Tourist Dashboard</title>
  <meta name="description" content="Tourist Dashboard for Saudi Imprint"> 
  <meta name="keywords" content="tourism, dashboard, bookings">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Poppins:wght@300;400;500;600;700&family=Raleway:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  
  <!-- CDN for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

  <!-- Link to custom CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">

</head>
<body>
  <div class="container">
    <!-- Top Navigation -->
    <div class="top-nav">
      <a href="{{ route('home') }}" class="back-btn" >
        <i class="fas fa-arrow-left"></i> Back
        <a href="{{ route('profile.edit') }}" id="edit-profile-link" class="edit-profile-btn">Edit Profile</a>
    </div>

    <!-- Header -->
    <header class="header">
      <div class="greeting">
        Welcome, <span id="user-name">{{ auth()->user()->name }}</span>!
      </div>
      <div class="greeting-subtitle">
        Here's an overview of your bookings and activities.
      </div>
      <div class="header-decoration"></div>
    </header>
    
    <!-- Dashboard Cards -->
    <div class="dashboard-grid">
      <div class="card">
        <div class="card-header">
          <div class="card-title">Active Bookings</div>
          <div class="card-icon">
            <i class="fas fa-calendar-check"></i>
          </div>
        </div>
        <div class="card-value" id="active-bookings-count">{{ $activeBookingsCount }}</div>
        <div class="card-description">Upcoming tours you've booked</div>
      </div>

      <div class="card">
        <div class="card-header">
          <div class="card-title">Past Tours</div>
          <div class="card-icon">
            <i class="fas fa-history"></i>
          </div>
        </div>
        <div class="card-value" id="past-bookings-count">{{ $pastBookingsCount }}</div>
        <div class="card-description">Tours you've enjoyed with us</div>
      </div>
    </div>
    
      <!-- Messages Card -->
      <div class="card">
        <div class="card-header">
          <div class="card-title">Messages</div>
          <div class="card-icon">
            <i class="fas fa-envelope"></i>
          </div>
        </div>
        <div class="card-description">Check your conversations</div>
        <a href="{{ route('messages.index') }}" class="card-link">Go to Messages</a>
      </div>

    </div>

    <!-- Bookings Table -->
    <section class="bookings-section">
      <div class="section-header">
        <div class="section-title">
          <i class="fas fa-calendar"></i> Your Bookings
        </div>
        <a href="{{ route('bookings.index') }}" class="view-all">View All</a>
      </div>
      
      <!-- Table will be shown if there are bookings -->
      @if($bookings->isNotEmpty())
      <div id="bookings-table-container">
        <table>
          <thead>
            <tr>
              <th>Tour Name</th>
              <th>Date</th>
              <th>Guests</th>
              <th>Price</th>
              <th>Status</th>
              
            </tr>
          </thead>
          <tbody>
            @foreach($bookings as $booking)
            <tr>
              <td>
              <a href="{{ route('bookings.show', $booking) }}" style="color:#71c55d; text-decoration: none">
                {{ $booking->tour->name }}
              </a>
              </td>
              <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('d M, Y') }}</td>
              <td>{{ $booking->number_of_people }}</td>
              <td>SAR {{ $booking->total_price }}</td>
              <td>
                <span class="status {{ $booking->payment_status }}">{{ ucfirst($booking->payment_status) }}</span>
          
                @if($booking->status !== 'completed' && $booking->status !== 'cancelled')
                  <form action="{{ route('bookings.cancel', $booking) }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-danger" style="border: none; box-shadow: none;" onclick="return confirm('Are you sure you want to cancel this booking?');">
                      Cancel
                    </button>
                  </form>
                @else
                  <span class="badge bg-secondary">{{ ucfirst($booking->status) }}</span>
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>          
        </table>
      </div>
      @else
      <!-- Empty state will be shown if there are no bookings -->
      <div id="empty-bookings" class="empty-state">
        <i class="fas fa-calendar-xmark"></i>
        <h3 class="empty-state-message">No bookings yet</h3>
        <p class="empty-state-description">
          You haven't made any tour bookings yet. Explore our available tours and start your Saudi adventure!
        </p>
        <a href="{{ route('tours.index') }}" class="btn btn-primary">Browse Tours</a>
      </div>
      @endif
    </section>
  </div>

</body>
</html>
