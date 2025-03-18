<?php

namespace App\Http\Controllers\Admin\Ticket;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Ticket\TicketRequest;
use App\Models\Ticket\Ticket;
use Illuminate\Http\Request;

class TicketController extends Controller
{
    public function openTickets()
    {
        $tickets = Ticket::where('seen',1)->get();
        foreach($tickets as $newTicket)
        {
            $newTicket->seen =1;
            $resault = $newTicket->save();
        }
        return view('admin.ticket.index',compact('tickets'));    }

        public function closeTickets()
    {
        $tickets = Ticket::where('seen',0)->get();
        foreach($tickets as $newTicket)
        {
            $newTicket->seen =1;
            $resault = $newTicket->save();
        }
        return view('admin.ticket.index',compact('tickets'));
    }
    

        public function newTickets()
    {
        $tickets = Ticket::where('seen',0)->get();
        foreach($tickets as $newTicket)
        {
            $newTicket->seen =1;
            $resault = $newTicket->save();
        }
        return view('admin.ticket.index',compact('tickets'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $tickets = Ticket::all();
        return view('admin.ticket.index',compact('tickets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return view('admin.ticket.show',compact('ticket'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function change(Ticket $ticket)
    {
        $ticket->status = $ticket->status == 0 ? 1 : 0;
        $result = $ticket->save();
        return redirect()->route('admin.ticket.index')->with('swal-success', 'تغییر شما با موفقیت ثبت شد');
    }

    public function answer(TicketRequest $request , Ticket $ticket)
    {
        $inputs = $request->all();
        $inputs['seen'] = 1;
        $inputs['description'] = $ticket->description;
        $inputs['subject'] = $ticket->subject;
        $inputs['refrence_id'] = $ticket->refrence_id;
        $inputs['user_id'] = 1;
        $inputs['category_id'] = $ticket->category_id;
        $inputs['priority_id'] = $ticket->priority_id;
        $inputs['ticket_id'] = $ticket->ticket_id;;
        $menu = Ticket::create($inputs);
        return redirect()->route('admin.ticket.index')->with('swal-success', 'پاسخ   شما با موفقیت ثبت شد');
    }

}
