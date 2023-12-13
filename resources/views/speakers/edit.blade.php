@extends('layouts.master')
@section('content')
    <div class="container mt-5">
        <div class="card border-0">
            <div class="card-header custom-card-header fs-4">
                Edit speaker
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
                    {!! Form::model($speaker, ['method' => 'PATCH','route' =>
['speakers.update', $speaker->id]]) !!}
                    <div class="mt-3">
                        @csrf
                        <div class="mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="firstName" name="firstName" value="{{ $speaker->firstName }}">
                        </div>
                        <div class="mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="lastName" name="lastName" value="{{ $speaker->lastName }}">
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <br>
                            <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{ $speaker->description }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="occupation" class="form-label">Occupation</label>
                            <input type="text" class="form-control" id="occupation" name="occupation" value="{{ $speaker->occupation }}">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{ $speaker->email }}">
                        </div>
                        <div class="mb-3">
                            <label for="img" class="form-label">Img</label>
                            <input type="text" class="form-control" id="img" name="img" value="{{ $speaker->img }}">
                        </div>
                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('speakers.index') }}" class="btn btn-default">Cancel</a>

                    </div>
                    {!! Form::close() !!}
            </div>
@endsection
