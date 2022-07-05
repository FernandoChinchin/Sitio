<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
   

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'especialidad';


    const CREATED_AT = 'last_created';
    const UPDATED_AT = 'last_updated';


    protected $fillable = [
        'id',
        'descripcion',
        'especialidad',
        'estado',
         ];

}
