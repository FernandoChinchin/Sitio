$(document).ready(function () {

    
    $.ajaxSetup({
        headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
  



    function cargarTabla() {
    
	$.ajax({
        url: '/medico/cargarDatos',
        type:'GET',
    	data: { }
	}).done(function(data){
        table_data_row(data)
	});
}
function table_data_row(data) {

  var	rows = '';
  
$.each( data.data, function( key, value ) {
      
    rows = rows + '<tr>';
    rows = rows + '<td>'+value.cedula+'</td>';
    rows = rows + '<td>'+value.nombres+'</td>';
    rows = rows + '<td>'+value.apellidos+'</td>';
    rows = rows + '<td>'+value.celular+'</td>';
    rows = rows + '<td>'+value.mail+'</td>';
 
              rows = rows + '<td><button id="editCompany" data-toggle="modal"  data-toggle="modal" data-id='+value.id +' data-target="#modal-id"  class="btn btn-primary btn-sm">Editar</button> ';
              rows = rows + '<button id="eliminar" data-toggle="modal"  data-toggle="modal" data-id='+value.id+' data-target="#modal-id"  class="btn btn-primary btn-sm">Eliminar</button> ';
              rows = rows + '</td>';
    rows = rows + '</tr>';
});

$("tbody").html(rows);
}


    //Insert company data
    $("body").on("click","#crearMedico",function(e){
    
        e.preventDefault;
        $('#userCrudModal').html("Crear Medico");
        $('#submit').val("Crear");
        $('#modal-id').modal('show');
        $('#idperson').val('');
   
    e
    });
    
    //Save data into database
    $('body').on('click', '#submit', function (event) {
        event.preventDefault()
        var id = $("#company_id").val();
        var name = $("#name").val();
        var address = $("#address").val();
       
        $.ajax({
          url: store,
          type: "POST",
          data: {
            id: id,
            name: name,
            address: address
          },
          dataType: 'json',
          success: function (data) {
              
              $('#companydata').trigger("reset");
              $('#modal-id').modal('hide');
              Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Success',
                showConfirmButton: false,
                timer: 1500
              })
              get_company_data()
          },
          error: function (data) {
              console.log('Error......');
          }
      });
    });


    $(function () {
      $('#fecha_nacimiento').datepicker();
  });
    


  $('body').on('click', '#guardar', function (event) {
    event.preventDefault()
    var id = $("#id").val();
    var nombres = $("#nombres").val();
    var apellidos = $("#apellidos").val();
    var cedula = $("#cedula").val();
    var mail = $("#mail").val();
    var celular = $("#celular").val();
    var fecha_nacimiento = $("#fecha_nacimiento").val();
    var genero = $("#genero").val();
    var idespecialidad = $("#especialidad").val();
    console.log(id);
    $.ajax({
      url: "/medico/actulizar",
      type: "POST",
      data: {
        id: id,
        nombres: nombres,
        apellidos: apellidos,
        cedula:cedula,
        fecha_nacimiento:fecha_nacimiento,
        genero:genero,
        celular:celular,
        mail:mail,
        idespecialidad:idespecialidad

      },
      dataType: 'json',
      success: function (data) {
          
          $('#modal-id').modal('hide');
          Swal.fire({
            position: 'top-end',
            icon: 'success',
            title: 'Success',
            showConfirmButton: false,
            timer: 1500
          })
        cargarTabla();
      },
      error: function (response) {
        console.log(response.responseJSON.errors.apellidos);
        $('#apellidosError').text(response.responseJSON.errors.apellidos);
          console.log('Error......');
      }
  });
});


    //Edit modal window
    $('body').on('click', '#editCompany', function (event) {
    
       
        event.preventDefault();
        var id = $(this).data('id');
       
        $.get('medico/'+ id+'/edit', function (data) {
             
             $('#userCrudModal').html("Medico");
             $('#submit').val("Edit company");
             $('#modal-id').modal('show');
             
             $('#id').val(data.data.id);
             $('#cedula').val(data.data.cedula);
             $('#nombres').val(data.data.nombres);
             $('#apellidos').val(data.data.apellidos);
             $('#celular').val(data.data.celular);
             $('#mail').val(data.data.mail);
             $('#fecha_nacimiento').val(data.data.fecha_nacimiento);
             $('#especialidad').val(data.data.id_especialidad);
             var len = 0;
             if(data.data.ocupacion != null){
                len = data.data.ocupacion.length;
             }

             if(len > 0){
                // Read data and create <option >
                for(var i=0; i<len; i++){

                   var id = data.data.ocupacion[i].id;
                   var name = data.data.ocupacion[i].descripcion;

                   var option = "<option value='"+id+"'>"+name+"</option>";

                   $("#especialidad").append(option); 
                }
             }
            })
    });
    
   
    //Edit modal window
    $('body').on('click', '#crear', function (event) {
    
       
      event.preventDefault();
      var id = 0;
     
      $.get('medico/'+ id+'/edit', function (data) {
             
        $('#userCrudModal').html("Nuevo Medico");
        $('#submit').val("Guardar");
        $('#modal-id').modal('show');
        
        $('#id').val(data.data.id);
        $('#cedula').val(data.data.cedula);
        $('#nombres').val(data.data.nombres);
        $('#apellidos').val(data.data.apellidos);
        $('#celular').val(data.data.celular);
        $('#mail').val(data.data.mail);
        $('#especialidad').val(data.data.id_especialidad);
        $('#fecha_nacimiento').val(data.data.fecha_nacimiento);
        $("#especialidad").append();
        var len = 0;
        if(data.data.ocupacion != null){
           len = data.data.ocupacion.length;
        }

        if(len > 0){
           // Read data and create <option >
           for(var i=0; i<len; i++){

              var id = data.data.ocupacion[i].id;
              var name = data.data.ocupacion[i].descripcion;

              var option = "<option value='"+id+"'>"+name+"</option>";

              $("#especialidad").append(option); 
           }
        }
       })

  });
 
   
    //DeleteCompany
     $('body').on('click', '#eliminar', function (event) {
        if(!confirm("Eesta seguro de eliminar?")) {
           return false;
         }
    
         event.preventDefault();
        var id = $(this).attr('data-id');
     
        $.ajax(
            {
              url: '/medico/eliminar/'+id,
              type: 'delete',
              data: {
                    id: id
            },
            success: function (response){
              
                Swal.fire(
                  
                  'Error...!',
                  'Se elimino con exito...!',
                 
                )
               cargarTabla();
            }
         });
          return false;
       });
    
    }); 