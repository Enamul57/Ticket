@extends('layouts.layout')
@section('title','Admin Register')
@section('ticket')
<div class="max-auto d-flex justify-content-center col-md-10">
    <form action="{{route('admin.register')}}" method='POST' class='col-md-6'>
        @csrf
        <div class="mb-3">
            <h4>Admin Register</h4>
        </div>
        <div class="mb-3 ">
            <label for="exampleInputEmail1" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputEmail1" name='name' aria-describedby="emailHelp">
            @error('name')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3 ">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail1" name='email' aria-describedby="emailHelp">
            @error('email')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <select class="form-select @error('category_name') is-invalid @enderror" name='category_name' id='ticketCategory' aria-label="Default select example">
                <option value="Technical Support">Technical Support</option>
                <option value="Perfomance Issue">Perfomance Issue</option>
                <option value="Network Issue">Network Issue</option>
            </select>
            @error('category_name')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword1" name='password'>
            @error('password')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>
       
        <div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection