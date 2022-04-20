<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Message;

class MessageController extends Controller
{
    // Mostrar los Mensajes
    // Usar Message $message para recibir la propiedad $message desde el modelo 
    public function show(Message $message){
        return view('messages.show', compact('message'));
    }

    // Guardar los Mensajes
    // Usar Request $request para recibir los datos desde un formulario
    public function store(Request $request){

    }

}
