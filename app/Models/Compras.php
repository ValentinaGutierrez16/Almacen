<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compras extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'compras';
    protected $fillable = ['proveedor_id', 'producto_id', 'cantidad', 'precio_unitario', 'estado'];

    protected $casts = [
        'estado' => 'boolean',
    ];

    public function proveedor()
    {
        return $this->belongsTo(Proveedores::class)->withTrashed();
    }

    public function producto()
    {
        return $this->belongsTo(Productos::class)->withTrashed();
    }

    public function realizarCompra()
    {
        // Encuentra el producto asociado a la compra
        $producto = Productos::find($this->producto_id);

        // Aumenta el stock del producto con la cantidad de la compra
        if ($producto) {
            $producto->stock += $this->cantidad;
            $producto->save();
        }
    }
}
