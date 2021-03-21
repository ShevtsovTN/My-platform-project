@extends('layouts.layout')


@section('title')

@endsection
@section('breadcrumbs')
    {{ Breadcrumbs::render('createUser') }}
@endsection
@section('content')
    <x-create-user-form />
    @endsection
