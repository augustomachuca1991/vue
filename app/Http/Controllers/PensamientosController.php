<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Notifications\NotificationPensamiento;
use App\Events\MyEvent;
use App\Pensamiento;
use App\User;

class PensamientosController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Pensamiento::with('user')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $pensamiento = new Pensamiento();
        $pensamiento->descripcion = $request->descripcion;
        $pensamiento->user_id = auth()->id();
        $pensamiento->save();
        $when = now()->addSeconds(10);
        auth()->user()->notify((new NotificationPensamiento())->delay($when));
        $notify = auth()->user()->unreadNotifications;
        event(new MyEvent($notify));
        return $pensamiento;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
        $pensamiento = Pensamiento::find($id);
        $pensamiento->descripcion = $request->descripcion;
        $pensamiento->updated_at = now();
        $pensamiento->save();
        return $pensamiento;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pensamiento = Pensamiento::find($id);
        $pensamiento->delete();
    }
}
