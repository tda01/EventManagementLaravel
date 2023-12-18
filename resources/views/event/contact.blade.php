@extends('layouts.event')
@section("content")
    <div class="custom-container">
        <div class="container mt-4">
            <h1 class="text-center mb-5">Contact Information</h1>
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="card-title">Contact Person</h3>
                            <p class="card-text"><strong>Name:</strong> {{ $event->contact->firstName }} {{ $event->contact->lastName }}</p>
                            <p class="card-text"><strong>Email:</strong> {{ $event->contact->email }}</p>
                            <p class="card-text"><strong>Phone:</strong> {{ $event->contact->phoneNumber }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Event Location</h3>
                            <p class="card-text"><strong>Address:</strong> {{ $event->location }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    </div>
@endsection

