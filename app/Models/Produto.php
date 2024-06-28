<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Produto extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'nome',
        'marca',
        'valor_compra',
        'valor_venda',
        'imagem',
        'quantidade'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($produto) {
            $produto->uuid = (string) Str::uuid();
        });
    }

}
