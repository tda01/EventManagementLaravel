@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="card border-0">
            <div class="card-header custom-card-header fs-4">
                Add a new event
            </div>
            <div class="card-body">
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Errors:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                {{ Form::open(array('route' => 'events.store','method'=>'POST')) }}
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Event Details</h5>
                            <div class="mt-3">
                                @csrf
                                <div class="mb-3">
                                    <label for="title" class="form-label">Title</label>
                                    <input type="text" class="form-control" id="title" name="title">
                                </div>
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description</label>
                                    <textarea class="form-control" name="description" id="description" cols="30" rows="5"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="form-control" id="location" name="location">
                                </div>
                                <div class="mb-3">
                                    <label for="img" class="form-label">Img</label>
                                    <input type="text" class="form-control" id="img" name="img">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">Contact</h5>
                            <div class="mt-3">
                                @csrf
                                <div class="mb-3">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName">
                                </div>
                                <div class="mb-3">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastName">
                                </div>
                                <div class="mb-3">
                                    <label for="phoneNumber" class="form-label">Phone</label>
                                    <input type="text" class="form-control" id="phoneNumber" name="phoneNumber">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">Speakers</h5>
                            <label for="speaker" class="form-label">Select Speakers</label>
                            <select class="form-select" id="speaker" name="speaker[]" multiple>
                                <option disabled>Select Speakers</option>
                                @foreach ($speakers as $speaker)
                                    <option value="{{ $speaker->id }}">{{ $speaker->firstName }} {{ $speaker->lastName }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-body">
                            <h5 class="card-title">Partners</h5>
                            <div class="mb-3">
                                <label for="partner" class="form-label">Select Partners</label>
                                <select class="form-select" id="partner" name="partner[]" multiple>
                                    <option disabled>Select Partners</option>
                                    @foreach ($partners as $partner)
                                        <option value="{{ $partner->id }}">{{ $partner->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>



                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">Add Event</button>
                        <a href="{{ route('events.index') }}" class="btn btn-default">Cancel</a>
                    </div>
                {{ Form::close() }}

            </div>
@endsection
