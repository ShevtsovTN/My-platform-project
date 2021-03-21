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
            <input type="text" name="to" class="form-control" id="toLogin" aria-describedby="toLoginHelp">
            <small id="toLoginHelp" class="form-text text-muted">Field is required.</small>
        </div>
        <div class="form-group w-50">
            <label for="subjectMessage">Message subject</label>
            <input type="text" name="subject" class="form-control" id="subjectMessage" aria-describedby="subjectMessageHelp">
            <small id="subjectMessageHelp" class="form-text text-muted">Field is required.</small>
        </div>
        <div class="form-group w-75">
            <label for="textMessage">Message</label>
            <textarea class="form-control" name="text" id="textMessage" aria-describedby="textMessageHelp"></textarea>
            <small id="textMessageHelp" class="form-text text-muted">Field is required.</small>
        </div>
        <div class="form-group">
            <button class="btn btn-dark" type="submit" form="createMessage">Create Message</button>
        </div>
    </form>
@endsection
