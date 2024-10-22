<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedores extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'proveedores';
    protected $fillable = ['nombre', 'correo', 'telefono', 'estado'];

    protected $casts = [
        'estado' => 'boolean',
    ];

    public function compras()
    {
        return $this->hasMany(Compras::class);
    }
}
