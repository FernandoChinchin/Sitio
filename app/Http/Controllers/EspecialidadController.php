<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Especialidad;

class EspecialidadController extends Controller
{

    public function index()
{
$data['especialidades'] = Especialidad::orderBy('id','desc')->get();
return view('especialidad.index', $data);
}
/**
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
return view('especialidad.create');
}


public function cargarDatos()
{

$especialidades = Especialidad::orderBy('id','desc')->get();
return response()->json([
  'data' => $especialidades
]);
}


public function edit($id)
  {
    $especialidad  = Especialidad::where('id', $id)->first();
    if (  $especialidad === 'undefined' || $especialidad === null) {
      $especialidad= new Especialidad();
    }
   return response()->json([
      'data' => $especialidad
    ]);
  }


  public function actulizar(Request $request)
  {


  if ($request->id>0)
{
    $especialidad =  Especialidad::updateOrCreate(
      [
         'id'   =>$request->id,
      ],
      [
         'descripcion'     => $request->descripcion,
         'estado' => $request->estado  ,
         'especialidad' => $request->especialidad  
       
        ]);

  
      }else{
        $especialidad =  Especialidad::updateOrCreate(
         
          [
             'descripcion'     => $request->descripcion,
             'estado' => $request->estado  ,
             'especialidad' => $request->especialidad
          
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

   
    $especialidad  = Especialidad::where('id', $id)->first();

    $persona  = Persona::where('idespecialidad', $especialidad->id)->first();

    if ($persona!=null){
      abort(404);
    }else{

    $especialidad->delete();
    return response()->json([
      'message' => 'Se elimino con exito..!'
    ]);
    }

   
  }

}

