<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProdutoController extends Controller
{

    public function home()
    {
        $produtos = Produto::where("user_id", Auth::user()->id)->get();

        return Inertia::render("Produto/Home.vue", [
            "titulo"    => "Produtos",
            "produtos"  => $produtos
        ]);
    }


    public function create()
    {
        return Inertia::render("Produto/Create.vue", [
            "titulo"    => "Cadastrar Produto",
            "produto"   => [
                'nome'          => "",
                'marca'         => "",
                'valor_compra'  => "",
                'valor_venda'   => "",
                'imagem'        => "",
                'quantidade'    => ""
            ]
        ]);

    }

    public function store(Request $request)
    {
        $request->validate([
            "nome"              => "required",
            "marca"             => "required",
            "quantidade"        => "required",
            "imagem"            => "image",
            "valor_venda"       => "required",
            "valor_compra"      => "required",
        ]);

        if ($request->hasFile('imagem')) {
            $uploadedImage = $request->file('imagem');
            $imageName = time() . '.' . $uploadedImage->getClientOriginalExtension();
            $uploadedImage->storeAs('public/produtos', $imageName);
        }


        $produtoData = Produto::create([
            "user_id"       => Auth::user()->id,
            "nome"          => $request->nome,
            "marca"         => $request->marca,
            "quantidade"    => $request->quantidade,
            "valor_venda"   => $request->valor_venda,
            "valor_compra"  => $request->valor_compra,
            'imagem'        => $imageName ? $imageName :  public_path('storage/produtos/voxlabs.png')
        ]);

        return to_route("produto.home")->with("sucess", "Produto ". $produtoData->nome . " Cadastrado com sucesso");
    }


    public function show(Produto $produto)
    {
        //
    }


    public function edit(Produto $produto)
    {
        //
    }


    public function update(Request $request, Produto $produto)
    {
        //
    }


    public function destroy(Produto $produto)
    {
        //
    }
}
