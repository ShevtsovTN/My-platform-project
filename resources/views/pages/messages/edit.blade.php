@extends('layouts.layout')

@section('title')

@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('editMessage', $message) }}
@endsection
@section('content')
@endsection
