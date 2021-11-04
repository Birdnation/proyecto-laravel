<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Solcitud extends Model
{
    use HasFactory;

    protected $fillable = [
        'tipo'
    ];

    public function users(){
        return $this->belongsToMany(User::class)->withTimestamps()->withPivot('id','telefono' ,'estado', 'NRC', 'nombre_asignatura', 'detalles', 'calificacion_aprob', 'cant_ayudantias', 'tipo_facilidad', 'created_at', 'nombre_profesor', 'archivos');;
    }
}
