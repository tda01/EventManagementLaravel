@extends('layouts.event')
@section("content")
    <div class="custom-container">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-12">
                    <h1>Agenda</h1>
                </div>
            </div>

            @php
                $dayNumber = 1;
            @endphp
            @foreach($event->eventDays as $day)
                <div class="row mt-4">
                    <div class="col-md-12">
                        <h2>Day {{ $dayNumber }} - {{$day->date}}</h2>
                    </div>
                </div>
                <div class="row">
                    @foreach($day->activities as $activity)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $activity->name }}</h5>
                                    <p class="card-text"><strong>Speaker:</strong> {{ $activity->speaker->firstName }} {{ $activity->speaker->lastName }}</p>
                                    <p class="card-text"><strong>Time:</strong> {{ $activity->hour }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                @php
                    $dayNumber++;
                @endphp
            @endforeach
        </div>
    </div>
@endsection

