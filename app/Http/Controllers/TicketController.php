<?php

namespace App\Http\Controllers;

use App\Events\TicketCreateEvent;
use App\Mail\CloseTicket;
use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $rows = Ticket::with('user')->get();
        return view('Auth.User.index',compact('rows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'priority' => 'required',
        ]);

        $ticket = Ticket::create(
            [
                'title' => $request->title,
                'description' => $request->description,
                'priority' => $request->priority,
                'user_id' => Auth::id(),
                'user_category_name' => $request->user_category_name,
                'ticket_number' => Str::uuid(),
                'contact_email' => Auth::user()->email,
            ]
        );
        event(new TicketCreateEvent($ticket));
        return redirect()->back()->with("success",'Ticket Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Ticket $ticket)
    {
        //
        $users = User::all();
        return view('Auth.User.edit',compact('ticket','users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        //
       $ticket = Ticket::find($id);
       $ticket->title = $request->title;
       $ticket->description = $request->description;
       $ticket->priority = $request->priority;
       $ticket->user_category_name = $request->user_category_name;
       $ticket->save();
       return redirect()->route('ticket.index')->with('success','Ticket Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function mail($id){
        $user = User::find($id);
        Mail::to($user->email)->send(new CloseTicket());
    }
    public function destroy(string $id)
    {
        //
    }
}
