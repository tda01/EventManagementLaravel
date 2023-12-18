@extends('layouts.event')
@section("content")
    <div class="custom-container">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="event-title">{{ $event->title }}</h1>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8">
                    <p>{{ $event->description }}</p>
                </div>
                <div class="col-md-4">
                    <img src="https://via.placeholder.com/300x200" class="img-fluid event-image" alt="Event Image">
                </div>
            </div>

            <hr>

            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-12">
                        <h2>Important Speakers</h2>
                    </div>
                </div>
                <div class="row mt-4">
                    @php
                        $speakers = $event->speakers()->take(3)->get();
                    @endphp
                    @foreach($speakers as $speaker)
                        <div class="col-md-4 mb-4 speaker-card">
                            <div class="card" style="width: 18rem;">
                                <img src="https://via.placeholder.com/150x150" class="card-img-top" alt="{{ $speaker->firstName }} {{ $speaker->lastName }}">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $speaker->firstName }} {{ $speaker->lastName }}</h5>
                                    <p class="card-text">{{ $speaker->occupation }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection

