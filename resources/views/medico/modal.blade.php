
<div class="modal fade" id="modal-id">
    <div class="modal-dialog">
        <div class="modal-content">
            
            <div class="modal-header">
                <h4 class="modal-title" id="userCrudModal"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>

            <div class="modal-body">
  <div class="container-fluid">
  <input   id="id"  name="id" hidden/>
  <div class="row">
  <div class="form-group">
    <label for="cedula">Cedula</label>
    <input  class="form-control" id="cedula"  name="cedula"
           aria-describedby="cedula" placeholder="Ingrese los cedula">
  </div>
</div>
  <div class="row">
  <div class="form-group">
    <label for="nombres">Nombres</label>
    <input  class="form-control" id="nombres"  name="nombres"
           aria-describedby="nombres" placeholder="Ingrese los nombres">
  </div>
</div>

<div class="row">

  <div class="form-group">
    <label for="apellidos">Apellidos</label>
    <input  class="form-control" id="apellidos"  name="apellidos"
           aria-describedby="apellidos" placeholder="Ingrese los apellidos" required="required">
         
  </div>

</div>
  <div class="row">
      <div class="col-md-4">
    <label for="celular">Celular</label>
    <input  class="form-control" id="celular"  name="celular"
           aria-describedby="apellidos" placeholder="Ingrese telefono">
</div>
      <div class="col-md-6 ">
        
    <label for="mail">Email</label>
    <input  class="form-control" id="mail"  name="mail"
           aria-describedby="mail" placeholder="Ingrese email">


    </div>
</div>
<div class="row">

<div class="col-md-5 ">
        
        <label for="fecha_nacimiento">Fecha Nacimiento</label>
        <input  type='text' class="form-control datetimepicker"  id="fecha_nacimiento"  name="fecha_nacimiento"
               aria-describedby="fecha_nacimiento" placeholder="Ingrese Fecha Nacimiento">
    
    
        </div>

      <div class="col-md-6">
    <label for="genero">Gener</label>
    <select class="form-select" aria-label="Default select example" name="generdo" id="genero">
  <option selected>Seleccione</option>
  <option value="Masculido">Masculino</option>
  <option value="Fenemenio">Fenemenio</option>
 
</select>


     
</div>



</div>
<div class="row">

<div class="col-md-6">
    <label for="genero">Esppecialidad</label>
    <select class="form-select" aria-label="Default select example" name="especialidad" id="especialidad">

</select>
</div>
</div>

<div class="modal-footer">
        <button type="button"  type="submit"id="guardar" class="btn btn-primary">Guardar</button>
       
      </div>
            </div>

        </div>
    </div>
</div> 