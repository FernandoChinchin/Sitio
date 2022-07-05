<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Especialidad;

class PersonController extends Controller
{

    public function index()
{
$data['personas'] = Persona::orderBy('id','desc')->get();
return view('medico.index', $data);
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
return view('personas.create');
}


public function cargarDatos()
{

$personas = Persona::orderBy('id','desc')->get();
return response()->json([
  'data' => $personas
]);
}


public function edit($id)
  {
    $persona  = Persona::where('id', $id)->first();
   
    $especialidad=Especialidad::where('estado','1')->get();
    if (  $persona === 'undefined' || $persona === null) {
      $persona= new Persona();
    }
    $persona->ocupacion=$especialidad;
    return response()->json([
      'data' => $persona
    ]);
  }


  public function actulizar(Request $request)
  {

    $request->validate([
      'apellidos' => 'required',
      'mail' => 'required|email',
   
  ]);

  if ($request->id>0)
{
    $persona =  Persona::updateOrCreate(
      [
         'id'   =>$request->id,
      ],
      [
         'apellidos'     => $request->apellidos,
         'nombres' => $request->nombres  ,
         'cedula' => $request->cedula  ,
         'genero' => $request->genero  ,
         'mail' => $request->mail  ,
         'fecha_nacimiento' => $request->fecha_nacimiento  ,
         'celular' => $request->celular  ,
         'idtipo_persona'=>1,
         'idespecialidad'=> $request->idespecialidad
        ]);

  
      }else{
        $persona =  Persona::updateOrCreate(
         
          [
             'apellidos'     => $request->apellidos,
             'nombres' => $request->nombres  ,
             'cedula' => $request->cedula  ,
             'genero' => $request->genero  ,
             'mail' => $request->mail  ,
             'fecha_nacimiento' => $request->fecha_nacimiento  ,
             'celular' => $request->celular ,
             'idtipo_persona'=>1,
                 'idespecialidad'=> $request->idespecialidad
            
            ]);
      }

    return response()->json(
      [
        'success' => true,
        'message' => 'Se grabo con exito....'
      ]
    );
  }

  public function eliminar($id)
  {
    $persona  = Persona::where('id', $id)->first();

    $persona->delete();

    return response()->json([
      'message' => 'Se elimino con exito..!'
    ]);
  }

}

