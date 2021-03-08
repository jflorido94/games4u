<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset(Auth::user()->id)) {
            session()->put('CountMessages', Message::where('read', false)->where('to_user_id', Auth::user()->id)->count());
        }
        // $datos = User::with('sent_messages', 'received_messages')
        //     ->where('to_user_id', Auth::user()->id)
        //     ->orWhere('from_user_id', Auth::user()->id)
        //     ->paginate(10);

        $users = User::with(['sent_messages' => function($q){
            $q->where('to_user_id', Auth::user()->id);
        }])->with(['received_messages' => function($q){
            $q->where('from_user_id', Auth::user()->id);
        }])
        ->get();

        $datos = new Collection();

        foreach ($users as $item ) {
            if ($item->sent_messages->count()>0 || $item->received_messages->count()>0 ) {
                $datos->push((object)$item);
            }
        }

        $datos; //intente hacer paginate con esta variable. La cree para quitar los usuarios con los que nunca se haya tenido conversacion.

            // return dd($datos);
        return view('messages.index', compact('datos'));
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
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route("mensajes");
        // if (isset(Auth::user()->id)) {
        //     session()->put('CountMessages', Message::where('read', false)->where('to_user_id', Auth::user()->id)->count());
        // }
        // $datos = Message::with('from_user', 'to_user')
        //     ->where('to_user_id', Auth::user()->id)
        //     ->orWhere('from_user_id', Auth::user()->id)
        //     ->where
        //     ->paginate(10);

        //     // return dd($datos);
        // return view('messages.show', compact('datos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
