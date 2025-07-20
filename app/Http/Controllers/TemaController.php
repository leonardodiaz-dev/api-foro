<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTemaRequest;
use App\Http\Requests\UpdateTemaRequest;
use App\Models\Tema;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class TemaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $slugSubforo = $request->query('subforo');

        $temas = Tema::with('subforo')
            ->when(
                $slugSubforo,
                fn($query) =>
                $query->whereHas(
                    'subforo',
                    fn($q) =>
                    $q->where('slug', $slugSubforo)
                )
            )
            ->get();

        return response()->json($temas);
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
    public function store(StoreTemaRequest $request)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $tema = Tema::create([
            'titulo' => $request->titulo,
            'slug' => Tema::slug($request->titulo),
            'contenido' => $request->contenido,
            'user_id' => $user->id,
            'subforo_id' => $request->subforo_id
        ]);
        $tema->load('user');
        return response()->json($tema);
    }

    /**
     * Display the specified resource.
     */
    public function show(Tema $tema)
    {
        $tema->load('user');
        $respuestas = $tema->respuestas()
            ->with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return response()->json([
            'tema' => $tema,
            'respuestas' => $respuestas,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tema $tema)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTemaRequest $request, $slug)
    {
        $tema = Tema::where('slug', $slug)->firstOrFail();
        $user = JWTAuth::parseToken()->authenticate();

        $tema->update([
            'titulo' => $request->titulo,
            'slug' => $request->titulo !== $tema->titulo ? Tema::slug($request->titulo) : $tema->slug,
            'contenido' => $request->contenido,
            'user_id' => $user->id,
            'subforo_id' => $request->subforo_id
        ]);

        $tema->load('user');

        return response()->json($tema);
    }

    public function cerrarTema(Tema $tema){
        $tema->update([
            'status' => 'cerrado',
        ]);
        return response()->json(['message' => 'El tema ha sido cerrado con exito']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        $user = JWTAuth::parseToken()->authenticate();
        $tema = Tema::where('slug', $slug)->firstOrFail();
        if (in_array($user->role, ['admin', 'moderador']) || $user->id === $tema->user_id) {
            $tema->delete();
            return response()->json(['message' => 'Tema eliminado correctamente']);
        }
        return response()->json(['error' => 'No autorizado'], 403);
    }
}
