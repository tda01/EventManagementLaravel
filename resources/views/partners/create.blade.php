@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="card border-0">
            <div class="card-header custom-card-header fs-4">
                Add a new partner
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
                {{ Form::open(array('route' => 'partners.store','method'=>'POST')) }}
                <div class="mt-3">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Phone</label>
                        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="web" class="form-label">Website</label>
                        <input type="text" class="form-control" id="web" name="web">
                    </div>
                    <div class="mb-3">
                        <label for="img" class="form-label">Img</label>
                        <input type="text" class="form-control" id="img" name="img">
                    </div>
                    <button type="submit" class="btn btn-primary">Add Partner</button>
                    <a href="{{ route('partners.index') }}" class="btn btn-default">Cancel</a>

                </div>
                {{ Form::close() }}

            </div>
@endsection
