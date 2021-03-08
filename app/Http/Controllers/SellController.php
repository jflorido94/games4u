<?php

namespace App\Http\Controllers;

use App\Models\Sell;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SellController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isset(Auth::user()->id)) {
            session()->put('CountMessages', count(Message::where('read', false)->where('to_user_id', Auth::user()->id)->get()));
        }
        $datos = Sell::with('stocks')->where('user_id', Auth::user()->id)->paginate(10);

        return view('sells.index', compact('datos'));
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
     * @param  \App\Models\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (isset(Auth::user()->id)) {
            session()->put('CountMessages', count(Message::where('read', false)->where('to_user_id', Auth::user()->id)->get()));
        }

        $datos = Sell::with('stocks', 'stocks.user', 'stocks.condition')->find($id);


        if ($datos->user_id == Auth::user()->id) {

            foreach ($datos->stocks as $item) {

                $game = app(ApiController::class)->gameId($item->game_id);
                $plat = app(ApiController::class)->platformId($item->platform_id);


                $item->platform_id = $plat->name;

                $item->game_id = $game->name;
            }

            return view('sells.show', compact('datos'));
        } else {

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sell  $sell
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
     * @param  \App\Models\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sell  $sell
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
