@extends('layouts.layout')
@section('title','Admin Dashboard')
@section('ticket')
@if(session('success'))
        <div class="alert alert-success">
            <span>{{session('success')}}</span>
        </div>
    @endif
<div class="mx-auto">
    <h3>Welcome Admin</h3>
</div>
@endsection