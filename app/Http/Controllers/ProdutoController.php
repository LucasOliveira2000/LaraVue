<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProdutoController extends Controller
{

    public function home()
    {

        return Inertia::render("Produto/Home.vue", [
            "titulo"    => "Produtos"
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
        //
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
