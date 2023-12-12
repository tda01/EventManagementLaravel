@extends('layouts.master')
@section('content')
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                Speakers
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Occupation</th>
                        <th scope="col">Email</th>
                        <th scope="col">Img</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($speakers) > 0)
                        @foreach($speakers as $key => $speaker)
                            <tr>
                                <th class="align-middle" scope="row">{{ ++$i }}</th>
                                <td class="align-middle">{{ $speaker->firstName }} {{ $speaker->lastName }}</td>
                                <td class="align-middle">{{ $speaker->description }}</td>
                                <td class="align-middle">{{ $speaker->occupation }}</td>
                                <td class="align-middle">{{ $speaker->email }}</td>
                                <td class="align-middle">{{ $speaker->img }}</td>
                                <td>
                                    <a class="btn btn-success" href="">Vizualizare</a>
                                    <a class="btn btn-primary" href="">Modificare</a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan=6 class="align-middle">Nu exista speakeri</td>
                        </tr>
                     @endif
                    </tbody>
                </table>
                {{$speakers->render()}}
            </div>
        </div>
    </div>


@endsection
