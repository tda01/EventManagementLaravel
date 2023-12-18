@extends('layouts.event')
@section("content")
    <div class="custom-container">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <h1>Partners</h1>
                </div>
            </div>
            <div class="row">
                @foreach($event->partners as $partner)
                    <div class="col-md-4 mb-4 speaker-card">
                        <div class="card">
                            <img src="https://via.placeholder.com/150x150" class="card-img-top" alt="{{ $partner->name }} Logo">
                            <div class="card-body">
                                <h5 class="card-title">{{ $partner->name }}</h5>
                                <a class="link-light link-underline-opacity-0" href="https://{{$partner->web}}"><p class="card-text">{{ $partner->web }}</p></a>
                                <p class="card-text">{{ $partner->phoneNumber }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>
@endsection
