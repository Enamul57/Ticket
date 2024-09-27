@extends('layouts.layout')
@section('title','Admin Login')
@section('ticket')
<div class="max-auto d-flex justify-content-center">

    <form action="{{route('admin.login')}} " method='POST'>
        @csrf
        <div class="mb-3">
            <h4> Admin Login</h4>
        </div>
        <div class="mb-3 ">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" name='email' class="form-control  @error('email') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            @error('email')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password"  name='password' class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1">
            @error('password')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>
        <a href="{{route('admin.registerPage')}}">Register</a>
        <div>
            <span>Don't have any account?</span>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection