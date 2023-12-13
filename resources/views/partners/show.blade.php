@extends('layouts.master')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="container mt-5">
        <div class="card border-0">
            <div class="card-header custom-card-header fs-4">
                View Partner
            </div>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <strong>Name</strong>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $partner->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <strong>Phone</strong>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $partner->phoneNumber }}</p>
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
                                <p class="card-text">{{ $partner->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <strong>Website</strong>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $partner->web }}</p>
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
                                <p class="card-text">{{ $partner->img }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <div class="col-md-12">
                        <a href="{{ route('partners.index') }}" class="btn btn-primary">Back to Partner List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
