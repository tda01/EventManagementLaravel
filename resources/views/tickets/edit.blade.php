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
                    {!! Form::model($ticket, ['method' => 'PATCH','route' =>
                        ['tickets.update', $ticket->id]]) !!}
                    <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Ticket</h5>
                        <div class="mt-3">
                            @csrf
                            <div class="mb-3">
                                <label for="eventID" class="form-label">Select Speakers</label>
                                <select class="form-select" id="eventID" name="eventID" multiple>
                                    <option disabled>Select Event</option>
                                    @foreach ($events as $event)
                                        <option value="{{ $event->id }}">{{ $event->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" name="description" id="description" cols="30" rows="5">{{$ticket->description}}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" class="form-control" id="price" name="price" value="{{$ticket->price}}">
                            </div>

                        </div>
                    </div>
                </div>


                <div class="mt-3">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('tickets.index') }}" class="btn btn-default">Cancel</a>
                </div>
                    {!! Form::close() !!}

            </div>

@endsection
