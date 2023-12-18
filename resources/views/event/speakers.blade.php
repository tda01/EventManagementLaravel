@extends('layouts.event')
@section("content")
    <div class="custom-container">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <h1>Speakers</h1>
                </div>
            </div>
            <div class="row">
                @foreach($event->speakers as $speaker)
                    <div class="col-md-4 mb-4 speaker-card">
                        <div class="card">
                            <img src="https://via.placeholder.com/150x150" class="card-img-top" alt="{{ $speaker->firstName }} {{ $speaker->lastName }}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $speaker->firstName }} {{ $speaker->lastName }}</h5>
                                <p class="card-text">{{ $speaker->occupation }}</p>
                                <p class="card-text">{{ $speaker->description }}</p>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
