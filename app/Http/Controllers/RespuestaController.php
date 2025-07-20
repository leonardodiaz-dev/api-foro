<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateRespuestaRequest;
use App\Http\Requests\UpdateTemaRequest;
use App\Models\Respuesta;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class RespuestaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $user = JWTAuth::parseToken()->authenticate();
        $respuesta = Respuesta::create([
            'contenido' => $request->contenido,
            'user_id' => $user->id,
            'tema_id' => $request->tema_id
        ]);
        $respuesta->load('user');

        return response()->json($respuesta);
    }

    /**
     * Display the specified resource.
     */
    public function show(Respuesta $respuesta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Respuesta $respuesta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRespuestaRequest $request, $id)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $respuesta = Respuesta::where('id', $id)
            ->where('user_id', $user->id)->firstOrFail();
        $respuesta->update([
            'contenido' => $request->contenido,
            'user_id' => $user->id,
            'tema_id' => $request->tema_id
        ]);
        $respuesta->load('user');
        return response()->json($respuesta);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Respuesta $respuesta)
    {
        //
    }
}
