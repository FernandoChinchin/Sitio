
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
    <label for="especialidad">Especialidad</label>
    <input  class="form-control" id="especialidad"  name="especialidad"
           aria-describedby="especialidad" placeholder="Ingrese el especialidad">
  </div>
</div>
  <div class="row">
  <div class="form-group">
    <label for="descripcion">Descripcion</label>
    <textarea rows="2" cols="5" class="form-control" id="descripcion"  name="descripcion"
           aria-describedby="descripcion" placeholder="Ingrese los descripcion">
          </textarea>  
  </div>
</div>

<div class="row">


      <div class="col-md-6">
    <label for="estado">Estado</label>
    <select class="form-select" aria-label="Default select example" name="estado" id="estado">
  <option selected></option>
  <option value="1">Activo</option>
  <option value="0">Desactivo</option>
 
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