<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use GuzzleHttp\Psr7\Request as Psr7Request;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Inertia\Inertia;

class UserController extends Controller
{
    public function logar()
    {
        return Inertia::render("User/Login.vue",[
            "titulo" => "Login",
            "users"  => [
                "email"         => '',
                "password"      => ''
            ]
        ]);

    }

    public function login(Request $request)
    {
        $request->validate([
            "email"     => "required|email",
            "senha"     => "required"
        ]);

        $credentials = $request->only('email', 'password');

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route("produto.home");
        }else{
            return to_route("user.login")->with("error", "Usuário ou Senha Incorretos!!!");
        }
    }

    public function create()
    {
        return Inertia::render("User/Create.vue",[
            "titulo" => "Cadastro de Usuários",
            "erros"  => "erros",
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

            return redirect()->route("produto.home")->with("sucess", "Usuário Cadastrado com Sucesso");

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


    public function deslogar(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return Inertia::render('Site/Home.vue');
    }
}
