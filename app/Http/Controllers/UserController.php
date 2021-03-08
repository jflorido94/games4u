<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
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
        $datos = User::with('sells', 'sells.stocks', 'stocks')->paginate(10);
        return view('users.index', compact('datos'));
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
    public function show($id)
    {
        if (isset(Auth::user()->id)) {
            session()->put('CountMessages', count(Message::where('read', false)->where('to_user_id', Auth::user()->id)->get()));
        }

        $datos = User::with('sells', 'stocks')->find($id);

        return view('users.profile', compact('datos'));
    }

    /**
     * Show the form for editing the self Auth user resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        if (isset(Auth::user()->id)) {
            session()->put('CountMessages', count(Message::where('read', false)->where('to_user_id', Auth::user()->id)->get()));
        }

        $datos = User::find(Auth::user()->id);

        return view('users.edit', compact('datos'));
    }

    /**
     * Update the the self Auth user resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'nick' => 'required|string|max:255|unique:users,nick,' . $user->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
        ]);

        if ($request->password != "") {
            $request->validate([
                'password' => 'required|string|confirmed|min:6',
            ]);
        }

        if (Hash::check($request->passwordOld, $user->password)) {

            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->nick = $request->nick;
            $user->email = $request->email;
            if ($request->password != "") {
                $user->password = Hash::make($request->password);
            }

            $user->save();

            return redirect()->route('perfil')->with([
                'message' => "¡Usuario editado correctamente!",
                'status' => "ok",
            ]);
        } else {
            return redirect()->route('perfil')->with([
                'message' => "Contraseña incorrecta",
                'status' => "error",
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $user = User::find(Auth::user()->id);


        Auth::logout();

        if ($user->delete()) {
            return redirect()->route('welcome')->with([
                'message' => "¡Tu cuenta a sido eliminada!",
                'status' => "ok",
            ]);
        } else {
            return redirect()->route('perfil')->with([
                'message' => "Cuenta no eliminada",
                'status' => "error",
            ]);
        }
    }
}
