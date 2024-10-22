<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ventas extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ventas';

    protected $fillable = ['cliente_id', 'producto_id', 'cantidad',  'estado'];

    protected $casts = [
        'estado' => 'boolean',
    ];

    public function cliente()
    {
        return $this->belongsTo(Clientes::class)->withTrashed();
    }

    public function producto()
    {
        return $this->belongsTo(Productos::class)->withTrashed();
    }

    public function realizarVenta()
    {
        $producto = Productos::find($this->producto_id);
        if ($producto->stock >= $this->cantidad) {
            $producto->stock -= $this->cantidad;
            $producto->save();
        } else {
            // Aquí podrías lanzar una excepción o manejar el error de otra manera
            throw new \Exception('Stock insuficiente para el producto seleccionado.');
        }
    }
}
