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
                Tickets
            </div>

            <div class="card-body custom-card-body">
                <div class="text-end ">
                    <a href="{{ route('tickets.create') }}" class="btn btn-sm btn-primary">Add Ticket</a>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Event</th>
                        <th scope="col">Description</th>
                        <th scope="col">Price</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($tickets) > 0)
                        @foreach($tickets as $key => $ticket)
                            <tr>
                                <th class="align-middle" scope="row">{{ ++$i }}</th>
                                <td class="align-middle">{{ $ticket->event->title }}</td>
                                <td class="align-middle">{{ $ticket->description }}</td>
                                <td class="align-middle">{{ $ticket->price }} RON</td>
                                <td class="align-middle">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a class="btn btn-success" href="{{
route('tickets.show',$ticket->id) }}">Vizualizare</a>
                                        <a class="btn btn-primary" href="{{
route('tickets.edit',$ticket->id) }}">Modificare</a>
                                        {{ Form::open(['method' => 'DELETE','route' => ['tickets.destroy', $ticket->id],'style'=>'display:inline']) }}
                                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                        {{ Form::close() }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan=8 class="align-middle">Nu exista bilete</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                {{$tickets->render()}}
            </div>
        </div>
    </div>


@endsection
