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
                Partners
            </div>

            <div class="card-body custom-card-body">
                <div class="text-end ">
                    <a href="{{ route('partners.create') }}" class="btn btn-sm btn-primary">Add Partner</a>
                </div>
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Email</th>
                        <th scope="col">Website</th>
                        <th scope="col">Img</th>
                        <th scope="col"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($partners) > 0)
                        @foreach($partners as $key => $partner)
                            <tr>
                                <th class="align-middle" scope="row">{{ ++$i }}</th>
                                <td class="align-middle">{{ $partner->name }}</td>
                                <td class="align-middle">{{ $partner->phoneNumber }}</td>
                                <td class="align-middle">{{ $partner->email }}</td>
                                <td class="align-middle">{{ $partner->web }}</td>
                                <td class="align-middle">{{ $partner->img }}</td>
                                <td class="align-middle">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a class="btn btn-success" href="{{
route('partners.show',$partner->id) }}">Vizualizare</a>
                                        <a class="btn btn-primary" href="{{
route('partners.edit',$partner->id) }}">Modificare</a>
                                        {{ Form::open(['method' => 'DELETE','route' => ['partners.destroy', $partner->id],'style'=>'display:inline']) }}
                                        {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
                                        {{ Form::close() }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan=7 class="align-middle">Nu exista parteneri</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
                {{$partners->render()}}
            </div>
        </div>
    </div>


@endsection
