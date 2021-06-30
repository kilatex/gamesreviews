<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class UserController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    public function config(){
        return view('user.config');
    }

    public function update(Request $request){
        // Conseguir el Usuario Identificado
        $user =  \Auth::user();
        $id = $user->id;


         
        // Validar Formulario
        $validate = $this->validate($request,[
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'description' => 'string',
            'nick' => 'required|string|max:255|unique:users,nick,'.$id,
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
        ]);

        // Recoger Datos del Formulario
        $name = $request->input('name');
        $surname = $request->input('surname');

        $description = $request->input('description_user');
        $nick = $request->input('nick');
        $email = $request->input('email');

        // Asignar nuevos valores al objeto del usuario
        $user->name = $name;
        $user->surname = $surname;
        $user->nick = $nick;
        $user->email = $email;
        $user->description = $description;
        
        // Subir la Imagen
        $image_path = $request->file('image_path');

        if($image_path){
            $image_path_name = time().$image_path->getClientOriginalName();

            Storage::disk('users')->put($image_path_name,File::get($image_path));

            $user->image = $image_path_name;
        }

        // Ejecutar la Consulta

        $user->update();

        return redirect()->route('config')
                        ->with(['message' => 'User Info Updated']);

    }

    public function getImage($filename){
         $file = Storage::disk('users')->get($filename);
         return new Response($file,200);
    }

    public function profile($id){

        $user = User::find($id);
        
        return view('user.profile',[
            'user' => $user
        ]);
    }
}
