<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubforoRequest;
use App\Http\Requests\UpdateSubforoRequest;
use App\Models\SubForo;
use App\Models\Tema;
use Illuminate\Http\Request;

class SubForoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subforos = SubForo::with('foro')->get();
        return response()->json($subforos);
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
    public function store(StoreSubforoRequest $request)
    {
        $subforo = Subforo::create([
            'nombre'=>$request->nombre,
            'slug'=>SubForo::slug($request->nombre),
            'descripcion'=>$request->descripcion,
            'foro_id'=>$request->foro_id
        ]);
        $subforo->load('foro');
        return response()->json($subforo);
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $subforo = SubForo::where('slug', $slug)->first();
        $temas = Tema::with([
            'user',
            'ultimaRespuesta.user'
        ])
            ->withCount('respuestas')
            ->whereHas(
                'subforo',
                fn($q) =>
                $q->where('slug', $slug)
            )
            ->orderBy('created_at', 'desc')
            ->paginate(10);
        return response()->json([
            'subforo' => $subforo,
            'temas' => $temas
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubForo $subForo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubforoRequest $request, SubForo $subforo)
    {
        $subforo->update([
            'nombre'=>$request->nombre,
            'slug'=>$subforo->nombre !== $request->nombre ? Subforo::slug($request->nombre):$subforo->slug,
            'descripcion'=>$request->descripcion,
            'foro_id'=>$request->foro_id
        ]);
        $subforo->load('foro');
        return response()->json($subforo);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubForo $subforo)
    {
        $subforo->delete($subforo);
        return response()->json(['message'=>'Suforo eliminado con exito']);
    }
}
