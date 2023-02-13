@extends('layout/app')
@section('title', 'Edit user #'.$user->id.' - SLmax.by')
@section('content')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Edit {{$user->name}}</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('users.index') }}" enctype="multipart/form-data">
                        Back</a>
                </div>
            </div>
        </div>
        @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('users.update',$user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Name:</strong>
                        <input type="text"
                               name="name"
                               value="{{ $user->name }}"
                               class="form-control @error('name') is-invalid @enderror">
                        @error('name')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Surname:</strong>
                        <input type="text"
                               name="surname"
                               value="{{ $user->surname }}"
                               class="form-control @error('surname') is-invalid @enderror">
                        @error('surname')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Birth Date:</strong>
                        <input type="date"
                               name="birthdate"
                               value="{{ $user->birthdate }}"
                               class="form-control @error('birthdate') is-invalid @enderror">
                        @error('birthdate')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Sex ({{$user->getSex($user->sex)}}):</strong>
                        <select name="sex" class="form-control @error('sex') is-invalid @enderror">
                            <option value="-1">None</option>
                            <option value="0">Male</option>
                            <option value="1">Female</option>
                        </select>
                        @error('sex')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Birth Place:</strong>
                        <input type="text"
                               name="birthplace"
                               value="{{ $user->birthplace }}"
                               class="form-control @error('birthplace') is-invalid @enderror">
                        @error('birthplace')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary ml-3">Submit</button>
            </div>
        </form>
    </div>
@endsection
