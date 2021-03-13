@extends('layouts.layout')


@section('title')

@endsection

@section('breadcrumbs')
    {{ Breadcrumbs::render('users') }}
@endsection

@section('content')
    <div class="d-flex align-content-start justify-content-center">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Login</th>
                    <th scope="col">Email</th>
                    <th scope="col">Currency</th>
                    <th scope="col">Balance</th>
                    <th scope="col">Online</th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $index => $user)
                    <tr>
                        <th class="align-middle" scope="row">{{$user->id}}</th>
                        <td class="align-middle">{{$user->login}}</td>
                        <td class="align-middle">{{$user->email}}</td>
                        <td class="align-middle">{{$user->currency}}</td>
                        <td class="align-middle">{{$user->cash}}</td>
                        <td class="align-middle">
                            @if($user->online == 1)
                                <span class="uil uil-check-circle text-success"></span>
                            @else
                                <span class="uil uil-times-circle text-danger"></span>
                            @endif
                        </td>
                        <td class="align-middle">
                            <a class="btn btn-info" href="{{route('user', $user->id)}}">View</a>
                            <a class="btn btn-dark" href="{{route('userSettings', $user->id)}}">Edit</a>
                            <a class="btn btn-danger" href="#">Delete</a>
                        </td>
                    </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
@endsection

