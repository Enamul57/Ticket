@extends('layouts.layout')
@section('title','User Ticket')
@section('ticket')
@if(session('success'))
<div class="alert alert-success">
    <span>{{session('success')}}</span>
</div>
@endif
<div class="mx-auto col-md-10">
    <h3>Welcome User</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Ticket Number</th>
                <th scope="col">Priority</th>
                <th scope="col">User</th>
                <th scope="col">Handle</th>
            </tr>
        </thead>
        <tbody>
            @foreach($rows as $key=>$row)
            <tr>
                <th scope="row">{{++$key}}</th>
                <td>{{$row->ticket_number}}</td>
                <td>{{$row->priority}}</td>
                @if($row->user)
                <td>{{ $row->user->name }}</td>
                @else
                <td>No tickets available</td>
            @endif

            <td>
                <a href="{{route('ticket.edit',['ticket'=>$row->id])}}" ><i class="las la-edit" style='font-size:32px;margin-right:1rem;'></i></a>
                <a href="{{route('ticket.mail',['id'=>$row->user_id])}}" ><i class="las la-window-close" style='font-size:32px;color:red'></i></a>
            </td>

            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection