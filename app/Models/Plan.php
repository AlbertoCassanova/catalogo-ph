<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    use HasFactory;
    protected $table = 'planes';
    protected $fillable = [
        'nombre',
        'tiempo_meses',
        'cantidad_anuncios',
        'precio_ar',
        'precio_bo',
        'precio_br',
        'precio_cl',
        'precio_co',
        'precio_ec',
        'precio_mx',
        'precio_pe',
        'precio_ve',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
