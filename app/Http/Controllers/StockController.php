<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use App\Models\Stock;
use App\Models\Message;
use App\Models\Sell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StockController extends Controller
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
        $datos = Stock::with('condition', 'user')->where('sell_id', null)->paginate(10);

        foreach ($datos as $item) {

            $game = app(ApiController::class)->gameId($item->game_id);
            $plat = app(ApiController::class)->platformId($item->platform_id);


            $item->platform_id = $plat->name;

            $item->game_id = $game->name;
        }

        return view('stocks.index', compact('datos'));
    }

    /**
     * Display a list of your self resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function my()
    {
        if (isset(Auth::user()->id)) {
            session()->put('CountMessages', count(Message::where('read', false)->where('to_user_id', Auth::user()->id)->get()));
        }
        $datos = Stock::with('condition', 'user')->where('user_id', Auth::user()->id)->paginate(10);

        foreach ($datos as $item) {

            $game = app(ApiController::class)->gameId($item->game_id);
            $plat = app(ApiController::class)->platformId($item->platform_id);


            $item->platform_id = $plat->name;

            $item->game_id = $game->name;
        }

        return view('stocks.my', compact('datos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if (isset(Auth::user()->id)) {
        //     session()->put('CountMessages', count(Message::where('read', false)->where('to_user_id', Auth::user()->id)->get()));
        // }

        // $games = app(ApiController::class)->games();
        // $plats = app(ApiController::class)->platforms();
        // $conditions = Condition::all();

        // return view('stocks.new', compact('games','conditions','plats'));

        return redirect()->route("catalogo");
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
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (isset(Auth::user()->id)) {
            session()->put('CountMessages', count(Message::where('read', false)->where('to_user_id', Auth::user()->id)->get()));
        }

        $datos = Stock::with('condition', 'user')->find($id);

        $datos->game = app(ApiController::class)->gameId($datos->game_id);
        $datos->plat = app(ApiController::class)->platformId($datos->platform_id);

        return view('stocks.show', compact('datos'));
    }



    public function sell($id)
    {
        $datos = Stock::find($id);

        $sell = new Sell();
        $sell->user_id = Auth::user()->id;
        $sell->save();

        $datos->sell_id = $sell->id;
        $datos->save();

        return redirect()->route("compras");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (isset(Auth::user()->id)) {
            session()->put('CountMessages', count(Message::where('read', false)->where('to_user_id', Auth::user()->id)->get()));
        }
        $datos = Stock::with('condition', 'user')->find($id);

        if ($datos->user_id == Auth::user()->id) {
            $conditions = Condition::all();
            $datos->game = app(ApiController::class)->gameId($datos->game_id);
            $datos->plat = app(ApiController::class)->platformId($datos->platform_id);

            return view('stocks.edit', compact('datos', 'conditions'));
        } else {

            return redirect()->route("misjuegos");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $stock = Stock::find($id);

        $request->validate([
            'price' => 'required|numeric',
            'condition_id' => 'required|integer',
        ]);

        $stock->price = $request->price;
        $stock->condition_id = $request->condition_id;

        $stock->save();

        return redirect()->route('misjuegos')->with([
            'message' => "¡Juego editado correctamente!",
            'status' => "ok",
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock = Stock::find($id);

        if ($stock->sell_id == null && $stock->user_id == Auth::user()->id) {
            if ($stock->delete()) {
                return redirect()->route('misjuegos')->with([
                    'message' => "¡Juego eliminado!",
                    'status' => "ok",
                ]);
            } else {
                return redirect()->route('misjuegos')->with([
                    'message' => "Juego no eliminado",
                    'status' => "error",
                ]);
            }
        }else {
            return redirect()->route('misjuegos')->with([
                'message' => "No se puede eliminar un juego ya vendido",
                'status' => "error",
            ]);
        }
    }
}
