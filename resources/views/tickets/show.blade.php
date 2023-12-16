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
                View Ticket
            </div>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <strong>Event</strong>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $ticket->event->title }}</p>
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
                                <p class="card-text">{{ $ticket->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <strong>Price</strong>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $ticket->price }}</p>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="row mb-3">
                    <div class="col-md-12">
                        <a href="{{ route('tickets.index') }}" class="btn btn-primary">Back to Ticket List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
