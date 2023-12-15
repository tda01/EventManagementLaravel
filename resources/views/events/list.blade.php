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
                Events
            </div>

            <div class="card-body custom-card-body">
                <div class="text-end ">
                    <a href="{{ route('events.create') }}" class="btn btn-sm btn-primary">Add Event</a>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Title</th>
                        <th scope="col">Description</th>
                        <th scope="col">Location</th>
                        <th scope="col">Speakers</th>
                        <th scope="col">Partners</th>
                        <th scope="col">Img</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($events) > 0)
                        @foreach($events as $key => $event)
                            <tr>
                                <th class="align-middle" scope="row">{{ ++$i }}</th>
                                <td class="align-middle">{{ $event->title }} </td>
                                <td class="align-middle">{{ $event->description }}</td>
                                <td class="align-middle">{{ $event->location }}</td>
                                <td class="align-middle">
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
                                </td>
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
                                </td>
                                <td class="align-middle">{{ $event->img }}</td>
                                <td class="align-middle">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a class="btn btn-success" href="{{
route('events.show',$event->id) }}">Vizualizare</a>
                                        <a class="btn btn-primary" href="{{
route('events.edit',$event->id) }}">Modificare</a>
                                        {{ Form::open(['method' => 'DELETE','route' => ['events.destroy', $event->id],'style'=>'display:inline']) }}
                                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                        {{ Form::close() }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan=8 class="align-middle">Nu exista evenimente</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                {{$events->render()}}
            </div>
        </div>
    </div>


@endsection
