<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreForoRequest;
use App\Models\Foro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ForoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $includeSubforos = $request->query('includeSubforos');

        if ($includeSubforos) {
            $foros = Foro::with('subforos')->get();
        } else {
            $foros = Foro::all();
        }
        return response()->json($foros);
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
    public function store(StoreForoRequest $request)
    {
        $foro = Foro::create([
            'nombre' => $request->nombre,
            'slug' => Foro::slug($request->nombre)
        ]);
        return response()->json($foro);
    }

    /**
     * Display the specified resource.
     */
    public function show(Foro $foro)
    {
        $foro->load('subforos');
        return response()->json($foro);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Foro $foro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Foro $foro)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 422);
        }
        $foro->update($request->all());
        return response()->json($foro);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Foro $foro)
    {
        $foro->delete();
        return response()->json(['message' => 'Foro eliminado con exito']);
    }
}
