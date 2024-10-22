<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Productos extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'productos';

    protected $fillable = ['nombre', 'estado', 'descripcion', 'stock', 'precio'];

    protected $casts = [
        'estado' => 'boolean',
        'precio' => 'decimal:2',
    ];
    public function compras()
    {
        return $this->hasMany(Compras::class);
    }
    public function ventas()
    {
        return $this->hasMany(Ventas::class);
    }
}
