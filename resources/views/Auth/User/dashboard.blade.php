@extends('layouts.layout')
@section('title','User Dashboard')
@section('ticket')
@if(session('success'))
        <div class="alert alert-success">
            <span>{{session('success')}}</span>
        </div>
    @endif
<div class="mx-auto">
    <h3>Welcome User</h3>
    <form action="{{route('ticket.store')}} " method='POST' class='col-md-6'>
        @csrf
        <div class="mb-3 mt-5">
            <h4> Create Ticket</h4>
        </div>
        <div class="mb-3 ">
            <label for="exampleInputEmail1" class="form-label">Ticket Title</label>
            <input type="text" name='title' class="form-control  @error('title') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp">
            @error('title')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3 ">
            <label for="exampleInputEmail1" class="form-label">Description</label>
            <textarea name='description'  id='summernote' class="form-control  @error('description') is-invalid @enderror" id="exampleInputEmail1" aria-describedby="emailHelp"></textarea>
            @error('description')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Support</label>
            <select class="form-select @error('user_category_name') is-invalid @enderror" name='user_category_name' id='ticketCategory' aria-label="Default select example">
                <option value="Technical Support">Technical Support</option>
                <option value="Perfomance Issue">Perfomance Issue</option>
                <option value="Network Issue">Network Issue</option>
            </select>
            @error('user_category_name')
                <div class="alert alert-danger">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3 ">
        <label for="exampleInputEmail1" class="form-label">Priority</label>
        <select class="form-select" name='priority' aria-label="Default select example">
         <option value="low">Low</option>
         <option value="medium">Medium</option>
         <option value="high">High</option>
         <option value="critical">Critical</option>
        </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection