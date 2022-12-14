<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Ticket;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Priority;
use Status;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index() : View
    {
        return view("tickets/tickets", [
            "tickets" => Ticket::with("area")->orderBy("created_at", "desc")->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view("tickets/create", [
            "areas" => Area::all(),
            "priorities" => Priority::cases()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attributes = $request->validate([
            "subject" => ["required", "min:3", "max:50"],
            "description" => ["required", "min:10", "max:5000"],
            "area_id" => "required",
            "priority" => "required"
        ]);

        $ticket = new Ticket($attributes);
        $ticket->owner_id = auth()->id();
        $ticket->save();

        return redirect("tickets/");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return View
     */
    public function show(int $id): View
    {
        $ticket = Ticket::findOrFail($id);
        return view("/tickets/ticket", [
            "ticket" => $ticket,
            "replies" => $ticket->replies,
            "priorities" => Priority::cases(),
            "statuses" => Status::cases()
        ]);
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

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function solve(Request $request, $id)
    {
        $status = request()->input("status", Status::FINISHED);
        $ticket = Ticket::findOrFail($id);
        $ticket->status = $status;
        $ticket->save();

        return back();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Ticket::find($id);
        if ($ticket->owner == auth()->user()) {
            $ticket->delete();
        }
        return redirect("/tickets/");
    }
}
