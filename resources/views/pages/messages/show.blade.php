@extends('layouts.layout')

@section('title')

@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('showMessage', $message) }}
@endsection
@section('content')
    <div class="bg-white w-50 rounded border border-dark">
        <div class="card-header">
            <h5 class="card-title text-dark">{{$message['subject']}}</h5>
        </div>
        <div class="card-body">
            <h6 class="card-subtitle mb-2 text-muted">From: {{$message['login']}}</h6>
            <p class="card-text text-dark">{{$message['text']}}</p>
        </div>
        <div class="card-footer d-flex align-items-center justify-content-around">
            <form id="readingForm" name="readingForm" action="{{route('updateMessage', $message['id'])}}"  method="post">
                @csrf
                @method('PUT')
                <input type="hidden" name="read" value="true">
                <button type="submit" form="readingForm" class="btn btn-dark">Read</button>
            </form>
            <form id="deleteForm" name="deleteForm" action="{{route('deleteMessage', $message['id'])}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" form="deleteForm" class="btn btn-danger">Delete</button>
            </form>
        </div>
    </div>
@endsection
