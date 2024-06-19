<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;
use Throwable;

class UserController extends Controller
{
   
    public function create()
    {
        return Inertia::render("User/Create.vue",[
            "titulo" => "Login",
            "users"  => [
                "name"          => '',
                "email"         => '',
                "password"      => ''
            ]
        ]);
        
    }

    public function store(Request $request)
    {

        $request->validate([
            "name"          => "required",
            "email"         => "required|email|unique:users",
            "password"      => "required"
        ],[
            "name.required"         => "Nome é Obrigatório",
            "email.required"        => "Email é Obrigatório",
            "email.email"           => "Formato do Email é invalido",
            "email.unique"          => "Campo Email tem que ser Único",
            "password.required"     => "Senha é Obrigatório"
        ]);

        try{
            $user = User::create([
                "name"          => $request->name,
                "email"         => $request->email,
                "password"      => Hash::make($request->password)
            ]);

            Auth::login($user);
            $request->session()->regenerate();

        }catch(Exception $e){
            return $e->getMessage();
        }

        return to_route("site.home");
    }

   
    public function edit(string $id)
    {
       
    }

    
    public function update(Request $request, string $id)
    {
        
    }

   
    public function destroy(string $id)
    {
       
    }
}
