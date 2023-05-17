<?php

namespace App\Http\Controllers;

use App\Models\Invitado;
use Illuminate\Http\Request;

class InvitadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'evento_id' => ['required', 'max:10','exists:rutas'],
            'correo' => ['required', 'email'],
            'identificador_qr' => ['required', 'string','max:30'],
        ]);
        
        Invitado::create($validated);
        /* $ruta = Ruta::firstWhere('nombre', $request->nombre);
        $pedido = new Pedido();
        $pedido->cantidad_pedido = $request->cantidad_pedido;
        $pedido->ruta_id = $ruta->id;
        $pedido->user_id = Auth::id();
        $pedido->bdr = $request->bdr;
        $pedido->save(); */
    }

    /**
     * Display the specified resource.
     */
    public function show(Invitado $invitado)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invitado $invitado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invitado $invitado)
    {
        //
    }
}
