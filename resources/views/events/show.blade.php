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
                View Event
            </div>

            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <strong>Title</strong>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $event->title }}</p>
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
                                <p class="card-text">{{ $event->description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <strong>Location</strong>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{ $event->location }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <strong>Speakers</strong>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    @if($event->speakers->isEmpty())
                                        Nu exista speakeri
                                    @else
                                        @foreach($event->speakers as $speaker)
                                            {{ $speaker->firstName }} {{ $speaker->lastName }}
                                            @if (!$loop->last)
                                                <br>
                                            @endif
                                        @endforeach
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <strong>Partners</strong>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    <td class="align-middle">
                                        @if($event->partners->isEmpty())
                                            Nu exista parteneri
                                        @else
                                            @foreach($event->partners as $partner)
                                                {{ $partner->name }}
                                                @if (!$loop->last)
                                                    <br>
                                                @endif
                                            @endforeach
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <strong>Contact</strong>
                            </div>
                            <div class="card-body">
                                <p class="card-text">Name: {{ $event->contact->firstName }} {{ $event->contact->lastName }}</p>
                                <p class="card-text">Phone: {{ $event->contact->phoneNumber }}</p>
                                <p class="card-text">Email: {{ $event->contact->email }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card mb-3">
                            <div class="card-header">
                                <strong>Date</strong>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    @if($event->eventDays->isNotEmpty())
                                        {{ \Carbon\Carbon::createFromFormat('Y-m-d', $event->eventDays->first()->date)->format('d M y') }}
                                        @if($event->eventDays->count() > 1)
                                            - {{ \Carbon\Carbon::createFromFormat('Y-m-d', $event->eventDays->last()->date)->format('d M y') }}
                                        @endif
                                    @endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-12">
                        <a href="{{ route('events.index') }}" class="btn btn-primary">Back to Event List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
