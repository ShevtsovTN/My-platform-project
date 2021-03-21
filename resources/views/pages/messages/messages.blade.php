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
                <div class="d-flex align-items-center justify-content-start">
                    <a class="btn btn-info mr-2" href="{{route('showMessage', $message['id'])}}">View</a>
                    @if($message['read'] == 1)
                        <form id="deleteForm" name="deleteForm" action="{{route('deleteMessage', $message['id'])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" form="deleteForm" class="btn btn-danger">Delete</button>
                        </form>
                    @endif
                </div>
            </td>
        </tr>
            @endforeach
        </tbody>
    </table>
    @if($group == 0)
    <div class="">
        <a class="btn btn-dark mt-3" href="{{route('createMessage')}}">New Message</a>
    </div>
    @endif
    @endsection
