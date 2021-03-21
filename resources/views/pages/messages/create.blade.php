@extends('layouts.layout')

@section('title')

@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('createMessage') }}
@endsection
@section('content')
    <form class="" action="{{route('storeMessages')}}" name="createMessage" method="post" id="createMessage">
        @csrf
        <div class="form-group w-25">
            <label for="toLogin">Recipient of the message</label>
            <input type="text" name="to" class="form-control @error('to') is-invalid @enderror" id="toLogin" aria-describedby="toLoginHelp">
            @error('to')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group w-50">
            <label for="subjectMessage">Message subject</label>
            <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" id="subjectMessage" aria-describedby="subjectMessageHelp">
            @error('subject')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group w-75">
            <label for="textMessage">Message</label>
            <textarea class="form-control @error('text') is-invalid @enderror" name="text" id="textMessage" aria-describedby="textMessageHelp"></textarea>
            @error('text')
                <div class="invalid-feedback">{{$message}}</div>
            @enderror
        </div>
        <div class="form-group">
            <button class="btn btn-dark" type="submit" form="createMessage">Create Message</button>
        </div>
    </form>
@endsection
