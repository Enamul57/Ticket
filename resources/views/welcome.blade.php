@extends('layouts.layout')
@section('ticket')
    @if(session('success'))
        <div class="alert alert-success">
            <span>{{session('success')}}</span>
        </div>
    @endif
   <h1>Welcome To The Ticket Service!</h1>
@endsection