@extends('layouts.layout')


@section('title')

@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('user', $user) }}
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
            @foreach($users as $index => $child)
                <tr>
                    <th class="align-middle" scope="row">{{$child->id}}</th>
                    <td class="align-middle">{{$child->login}}</td>
                    <td class="align-middle">{{$child->email}}</td>
                    <td class="align-middle">{{$child->currency}}</td>
                    <td class="align-middle"><a class="nav-link text-dark" href="{{route('balanceUser',$child->id)}}">{{$child->cash}} <span class="uil uil-bill"></span></a></td>
                    <td class="align-middle">
                        @if($child->online == 1)
                            <span class="uil uil-check-circle text-success"></span>
                        @else
                            <span class="uil uil-times-circle text-danger"></span>
                        @endif
                    </td>
                    <td class="align-middle">
                        <a class="btn btn-info" href="{{route('user', $child->id)}}">View</a>
                        <a class="btn btn-dark" href="{{route('userSettings', $child->id)}}">Edit</a>
                        <a class="btn btn-danger" href="#">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection

