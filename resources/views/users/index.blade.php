@extends('layout/app')
@section('title', 'Test task - SLmax.by')
@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right mb-2">
                    <a class="btn btn-success" href="{{ route('users.create') }}"> Create User</a>
                </div>
                <div class="pull-right mb-2">
                    <input type="text" id="search" class="form-control"/>
                </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Surname</th>
                <th>BirthDate / Years</th>
                <th>Sex</th>
                <th>Birth place</th>
                <th width="280px">Action</th>
            </tr>
            </thead>
            <tbody id="table">
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->surname }}</td>
                    <td>{{ $user->birthdate }} / {{ $user->getYears($user->birthdate) }} y.o </td>
                    <td>{{ $user->getSex($user->sex) }}</td>
                    <td>{{ $user->birthplace }}</td>
                    <td>
                        <form action="{{ route('users.destroy',$user->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $users->links() !!}
    </div>
@endsection
