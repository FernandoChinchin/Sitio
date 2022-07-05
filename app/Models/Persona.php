<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
   

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'persona';


    const CREATED_AT = 'last_created';
    const UPDATED_AT = 'last_updated';

    public $especialidades;
    protected $fillable = [
        'id',
        'nombres',
        'apellidos',
        'cedula',
        'celular',
        'mail',
        'fecha_nacimiento',
        'genero',
        'especialidades',
        'idtipo_persona',
        'idespecialidad'
    ];

}
