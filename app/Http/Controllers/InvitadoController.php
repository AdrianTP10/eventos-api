<?php

namespace App\Http\Controllers;

use App\Models\Invitado;
use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Invitacion;
use Illuminate\Support\Facades\DB;

class InvitadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Invitado::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'evento_id' => ['required', 'max:10','exists:eventos,id'],
            'correo' => ['required', 'email'],
        ]);

       
        if (DB::table('invitados')->where('evento_id','=',$request->evento_id)->where('correo','=',$request->correo)->exists()) {
            return [
                "estatus" => "Este invitado ya se encuentra registrado",
            ];
        }else{

           
            
            $invitado = new Invitado($validated);
            $invitado->identificador_qr = fake()->unique()->numberBetween($min = 1000, $max = 32000);
            $invitado->save();
            $evento = Evento::find($invitado->evento_id);
            Mail::to($invitado->correo)->send(new Invitacion($evento, $invitado));
            return [
                "estatus" => "Se ha enviado una invitacion al correo: ".$invitado->correo,
            ]; 
        }
        
        
        
        

        
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
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $qr)
    {
        $invitado = Invitado::where('identificador_qr' , $qr)->where('evento_id' , $request->evento_id)->firstOrFail();
       /*  $flight = Flight::findOrFail(1);
 
        $flight = Flight::where('legs', '>', 3)->firstOrFail(); */

        $request->validate([
            'identificador_qr' => 'exists:invitados,identificador_qr',
        ]);
           
        $invitado->asistio = 1;
        $invitado->update();
        return [
            "invitado" => $invitado->correo
        ];
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invitado $invitado)
    {
        //
    }
}
