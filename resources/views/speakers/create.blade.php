@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Add a new speaker
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
                    {{ Form::open(array('route' => 'speakers.store','method'=>'POST')) }}
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
                            <label for="description" class="form-label">Description</label>
                            <br>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="5"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="occupation" class="form-label">Occupation</label>
                            <input type="text" class="form-control" id="occupation" name="occupation">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label">Img</label>
                            <input type="text" class="form-control" id="img" name="img">
                        </div>
                        <button type="submit" class="btn btn-primary">Add Speaker</button>
                        <a href="{{ route('speakers.index') }}" class="btn btn-default">Cancel</a>

                    </div>
                    {{ Form::close() }}

            </div>
@endsection
