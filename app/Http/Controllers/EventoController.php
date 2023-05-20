<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Invitado;
use App\Http\Requests\StoreEventoRequest;
use App\Http\Requests\UpdateEventoRequest;

class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Evento::all()->map(function ($evento) {
            return [
                'id' => $evento->id,
                'descripcion' => $evento->descripcion,
                'ubicacion' => $evento->ubicacion,
                'fecha' => $evento->fecha,
                'invitados' => Invitado::where('evento_id', $evento->id)->count(),
                'asistentes' => Invitado::where('evento_id', $evento->id)->where('asistio', true)->count(),
            ];
        });
    }

    /**
     * Show the form for creating a new resource.
     */
    /* public function create()
    {
        //
    } */

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventoRequest $request)
    {
        Evento::create($request->validated());
        /* $evento = new Evento();
        $evento->descripcion = $request->descripcion;
        $evento->ubicacion = $request->ubicacion;
        $evento->fecha = $request->fecha;
        $evento->save(); */
    }

    /**
     * Display the specified resource.
     */
    public function show(Evento $evento)
    {
        return [
            "evento" => $evento, 
            "invitados"=>Invitado::where('evento_id',$evento->id)->get()->map(function($invitado){
                return [
                    'id' => $invitado->id,
                    'asistio' => $invitado->asistio,
                    'correo' => $invitado->correo,
                ];
            })
        ];
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEventoRequest $request, Evento $evento)
    {
        
        $evento->descripcion = $request->descripcion;
        $evento->ubicacion = $request->ubicacion;
        $evento->fecha = $request->fecha;
        $evento->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Evento $evento)
    {
        //
    }
}
