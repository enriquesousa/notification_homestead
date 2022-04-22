<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Message;
use App\Models\User;
use App\Notifications\MessageSent;

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
        $request->validate([
            'subject' => 'required|min:10',
            'body' => 'required|min:10',
            'to_user_id' => 'required|exists:users,id',
        ]);

        $message = Message::create([
            'subject' => $request->subject,
            'body' => $request->body,
            'from_user_id' => auth()->id(),
            'to_user_id' => $request->to_user_id,
        ]);

        $user = User::find($request->to_user_id);
        // lo mandamos el $message por el método constructor
        $user->notify(new MessageSent($message));

        // Este banner funciona gracias a que en resources/views/layouts/app.blade.php tenemos <x-jet-banner /> encabezando la pagina del body!, usamos variable de sesión
        $request->session()->flash('flash.banner', 'tu mensaje fue enviado');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect()->back();
    }

}
