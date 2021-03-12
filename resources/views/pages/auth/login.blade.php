@extends('layouts.non-auth-layout')

@section('title')

@endsection

@section('content')
    <div class="account-pages w-100 d-flex justify-content-center align-items-center">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="p-5">
                                <p class="mt-1 mb-4 text-white">Enter your Name and Password to
                                    access admin panel.</p>
                                <form action="{{route('logIn')}}" class="authentication-form" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label class="form-control-label  text-white">Your Name</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="uil uil-user"></i>
                                                        </span>
                                            </div>
                                            <input type="text" class="form-control" id="name" name="name">
                                        </div>
                                    </div>

                                    <div class="form-group mt-4">
                                        <label class="form-control-label text-white">Password</label>
                                        <div class="input-group input-group-merge">
                                            <div class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="uil uil-lock"></i>
                                                        </span>
                                            </div>
                                            <input type="password" name="password" class="form-control" id="password"
                                                   placeholder="Enter your password">
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-dark btn-block" type="submit"> Log In
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    @endsection
