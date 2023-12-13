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
                <div class="mt-3">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title">
                    </div>
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <br>
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
                    <button type="submit" class="btn btn-primary">Add Event</button>
                    <a href="{{ route('events.index') }}" class="btn btn-default">Cancel</a>

                </div>
                {{ Form::close() }}

            </div>
@endsection
