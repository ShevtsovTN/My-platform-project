@extends('layouts.layout')


@section('title')

@endsection
@section('breadcrumbs')
{{ Breadcrumbs::render('deleteUser', $login) }}
@endsection
@section('content')
    <form action="{{route('deleteUser')}}" name="deleteUser" id="deleteUser" method="post">
        @csrf
        <p class="text-uppercase text-danger">Attention, you are deleting the user <span>{{$login}}</span></p>
        <div class="d-flex align-items-center justify-content-start">
            <input type="hidden" name="id" value="{{$id}}">
            <a href="{{route('users')}}" class="btn btn-dark mr-3">Back</a>
            <input class="btn btn-danger" type="submit" form="deleteUser" value="Delete User">
        </div>
    </form>
@endsection
