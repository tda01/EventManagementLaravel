@extends('layouts.master')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                View Speaker
            </div>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <strong>Name</strong>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $speaker->firstName }} {{ $speaker->lastName }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <strong>Email</strong>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $speaker->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <strong>Description</strong>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $speaker->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <strong>Occupation</strong>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $speaker->occupation }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <strong>Image</strong>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $speaker->img }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <a href="{{ route('speakers.index') }}" class="btn btn-primary">Back to Speaker List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
