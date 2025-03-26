@extends('layouts.app')

@section('content')
<!-- Guided Tours section -->
<div id="tours" class="container py-5" data-aos="fade-up" data-aos-delay="100">
    <div class="container section-title" data-aos="fade-up">
        <h2>Tours</h2>
        <div><span>Guided Tours and</span> <span class="description-title"> Experiences</span></div>
    </div>
    <div class="row g-4">
        @foreach ($tours as $tour)
            <div class="col-md-6 col-lg-3">
                <div class="card custom-card">
                    <!-- Tour Image -->
                    <img src="{{ asset('assets/img/Guided tours/' . $tour->image_path) }}" class="card-img-top fixed-img" alt="{{ $tour->name }}">
                    <div class="card-body text-center d-flex flex-column">
                        <!-- Tour Name -->
                        <h5 class="card-title">{{ $tour->name }}</h5>
                        <!-- Tour Description and Price -->
                        <p class="card-text">{{ $tour->description }}<br><strong>{{ $tour->price }} SAR</strong></p>
                        <!-- View Details Button -->
                        <a href="{{ route('tours.show', $tour->id) }}" class="btn btn-primary mt-auto">View Details</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div><!-- End of Guided Tour section -->
@endsection