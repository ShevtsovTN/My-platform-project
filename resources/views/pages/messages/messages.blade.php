@extends('layouts.layout')

@section('title')

@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('messagesList') }}
@endsection
@section('content')
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">From</th>
            <th scope="col">Subject</th>
            <th scope="col">Date</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($messages as $index => $message)
        <tr>
            <th class="align-middle" scope="row">{{$message['id']}}</th>
            <td class="align-middle">{{$message['login']}}</td>
            <td class="align-middle">{{$message['subject']}}</td>
            <td class="align-middle">{{date('Y-m-d H:i:s', strtotime($message['created_at']))}}</td>
            <td class="align-middle">
                <a class="btn btn-info" href="{{route('showMessage', $message['id'])}}">View</a>
                @if($message['read'] == 1)
                    <a class="btn btn-danger" href="{{route('deleteMessage', $message['id'])}}">Delete</a>
                @endif
            </td>
        </tr>
            @endforeach
        </tbody>
    </table>
    <div class="">
        <a class="btn btn-dark mt-3" href="{{route('createMessage')}}">New Message</a>
    </div>
    @endsection
