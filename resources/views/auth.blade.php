@extends('layouts.default')

@section('content')
    <h1>Iniciar Sesión</h1>
    @if($errors->has())
        <div class="alert alert-danger">
            <ul class="list-unstyled">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('auth_store_path') }}" method="post">
        {{ csrf_field() }}
        <label for="email">Email:</label>
        <input class="form-control" type="text" name="email" value="">
        <label for="password">Contraseña:</label>
        <input class="form-control" type="password" name="password">
        <br>
        <input class="btn btn-primary" type="submit" value="Iniciar">
    </form>
@stop