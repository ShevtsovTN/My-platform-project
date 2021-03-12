@extends('layouts.non-auth-layout')

@section('content')
    <div class="w-100 h-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center">
            <a href="{{route('loginPage')}}">Login</a>
        </div>
    </div>
    @endsection
