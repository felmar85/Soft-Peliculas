var dt;

function empleado(){
  $(".content-header").on("click", "a.editar", function() {
    $("#titulo").html("Editar Empleado");

    var codigo = $(this).data("codigo");
    var pais, ciudad, local;

    $("#nuevo-editar").load("./Vista/Empleados/editarEmpleado.php");
    $("#nuevo-editar").removeClass("hide");
    $("#nuevo-editar").addClass("show");
    $("#empleado").removeClass("show");
    $("#empleado").addClass("hide");
         $.ajax({
             type:"get",
             url:"./Controlador/controladorEmpleados.php",
             data: {codigo: codigo, accion:'consultar'},
             dataType:"json"
             }).done(function( empleado ) {        
                 if(empleado.respuesta === "no existe"){
                     swal({
                     type: 'error',
                     title: 'Oops...',
                     text: 'Empleado no existe!'                         
                     })
                 } else {
                     $("#id_empleado").val(empleado.codigo);                   
                     $("#nombre_empleado").val(empleado.nombre);
                     $("#apellido_empleado").val(empleado.apellido);
                     $("#cargo_empleado").val(empleado.cargo);
                     $("#direccion_empleado").val(empleado.direccion);
                     $("#telefono_empleado").val(empleado.telefono);
                     $("#email_empleado").val(empleado.email);
                     local = empleado.local;
                     pais = empleado.pais;
                     ciudad = empleado.ciudad;
                    }
                  });
                  $.ajax({
                    type:"get",
                    url:"./Controlador/controladorEmpleados.php",
                    data: { accion:'listarP'},
                    dataType:"json"
                 }).done(function(resultado) { 
                  $("#id_pais option").remove()
                     $.each(resultado.data, function (index, value) { 
    
                      if (pais === value.id_pais) {
                        $("#id_pais").append("<option selected value='" + value.id_pais + "'>" + value.nombre_pais + "</option>")
                      } else {
                        $("#id_pais").append("<option value='" + value.id_pais + "'>" + value.nombre_pais + "</option>")
                      }
                      });
                 }); 
                 $.ajax({
                  type:"get",
                  url:"./Controlador/controladorEmpleados.php",
                  data: { accion:'listarL'},
                  dataType:"json"
               }).done(function(resultado) { 
                $("#id_local option").remove()
                   $.each(resultado.data, function (index, value) { 
  
                    if (local === value.id_local) {
                      $("#id_local").append("<option selected value='" + value.id_local + "'>" + value.nombre_local + "</option>")
                    } else {
                      $("#id_local").append("<option value='" + value.id_local + "'>" + value.nombre_local + "</option>")
                    }
                    });
               });              
                 $.ajax({
                  type:"get",
                  url:"./Controlador/controladorEmpleados.php",
                  data: { accion:'listarC'},
                  dataType:"json"
               }).done(function(resultado) { 
                $("#id_ciudad option").remove()
                   $.each(resultado.data, function (index, value) { 
    
                    if (ciudad === value.id_ciudad) {
                      $("#id_ciudad").append("<option selected value='" + value.id_ciudad + "'>" + value.nombre_ciudad + "</option>")
                    } else {
                      $("#id_ciudad").append("<option value='" + value.id_ciudad + "'>" + value.nombre_ciudad + "</option>")
                    }
                    });
               });
                }); 

                $(".content-header").on("click", "a.borrar", function() {
        
                  var codigo = $(this).data("codigo");
                  
                  swal({
                    title: "¿Está seguro?",
                    text: "¿Realmente desea borrar el empleado con codigo : " + codigo + " ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, Borrarlo!"
                }).then(decision => {
                          if (decision.value) {
                              var request = $.ajax({
                                  method: "get",                  
                                  url: "./Controlador/controladorEmpleados.php",
                                  data: {codigo: codigo, accion:'borrar'},
                                  dataType: "json"
                              });

                      request.done(function(resultado) {
                          if (resultado.respuesta == "correcto") {
                              swal(
                                  "Borrado!",
                                  "El empleado con codigo : " + codigo + " fue borrada",
                                  "success"
                              );
                              dt.ajax.reload();
                          } else {
                              swal({
                                  type: "error",
                                  title: "Oops...",
                                  text: "Something went wrong!"
                              });
                          }
                      });
      
                      request.fail(function(jqXHR, textStatus) {
                          swal({
                              type: "error",
                              title: "Oops...",
                              text: "Something went wrong!" + textStatus
                          });
                      });
                  }
              });
          });            

          $(".content-header").on("click", "button.btncerrar", function() {
            $("#contenedor").removeClass("show");
            $("#contenedor").addClass("hide");
            $(".content-header").html("");
        });

            $(".content-header").on("click", "button.btncerrar2", function() {
              $("#titulo").html("Listado de Empleados");
              $("#nuevo-editar").html("");
              $("#nuevo-editar").removeClass("show");
              $("#nuevo-editar").addClass("hide");
              $("#empleado").removeClass("hide");
              $("#empleado").addClass("show");
          });

          $(".content-header").on("click", "button#nuevo", function() {
            $("#titulo").html("Nuevo Empleado");
    
            var codigo = $(this).data("codigo");
            var pais, ciudad, local;
    
            $("#nuevo-editar").load("./Vista/Empleados/nuevoEmpleado.php");
            $("#nuevo-editar").removeClass("hide");
            $("#nuevo-editar").addClass("show");
            $("#empleado").removeClass("show");
            $("#empleado").addClass("hide");  
            $.ajax({
              type:"get",
              url:"./Controlador/controladorEmpleados.php",
              data: { accion:'listarP'},
              dataType:"json"
           }).done(function(resultado) { 
            $("#id_pais option").remove()
               $.each(resultado.data, function (index, value) { 
    
                if (pais === value.id_pais) {
                  $("#id_pais").append("<option selected value='" + value.id_pais + "'>" + value.nombre_pais + "</option>")
                } else {
                  $("#id_pais").append("<option value='" + value.id_pais + "'>" + value.nombre_pais + "</option>")
                }
                });
           });  
           $.ajax({
            type:"get",
            url:"./Controlador/controladorEmpleados.php",
            data: { accion:'listarL'},
            dataType:"json"
         }).done(function(resultado) { 
          $("#id_local option").remove()
             $.each(resultado.data, function (index, value) { 
  
              if (local === value.id_local) {
                $("#id_local").append("<option selected value='" + value.id_local + "'>" + value.nombre_local + "</option>")
              } else {
                $("#id_local").append("<option value='" + value.id_local + "'>" + value.nombre_local + "</option>")
              }
              });
         });            
           $.ajax({
            type:"get",
            url:"./Controlador/controladorEmpleados.php",
            data: { accion:'listarC'},
            dataType:"json"
         }).done(function(resultado) { 
          $("#id_ciudad option").remove()
             $.each(resultado.data, function (index, value) { 
    
              if (ciudad === value.id_ciudad) {
                $("#id_ciudad").append("<option selected value='" + value.id_ciudad + "'>" + value.nombre_ciudad + "</option>")
              } else {
                $("#id_ciudad").append("<option value='" + value.id_ciudad + "'>" + value.nombre_ciudad + "</option>")
              }
              });
         });
          });

          $(".content-header").on("click", "button#actualizar", function() {
            var datos = $("#fempleado").serialize();
            $.ajax({
              type: "get",
              url: "./Controlador/controladorEmpleados.php",
              data: datos,
              dataType: "json"
          }).done(function(resultado) {
      
            if (resultado.respuesta) {
              swal(
                  "Actualizado!",
                  "Se actualizaron los datos correctamente",
                  "success"
              );
              dt.ajax.reload();
              $("#titulo").html("Listado empleado");
              $("#nuevo-editar").html("");
              $("#nuevo-editar").removeClass("show");
              $("#nuevo-editar").addClass("hide");
              $("#empleado").removeClass("hide");
              $("#empleado").addClass("show");
          } else {
              swal({
                  type: "error",
                  title: "Oops...",
                  text: "Something went wrong!"
              });
          }
      });
  });

  $(".content-header").on("click","button#grabar",function(){
    var codigo = document.forms["fempleado"]["id_empleado"].value;
    $.ajax({
      type:"get",
      url:"./Controlador/controladorEmpleados.php",
      data: {codigo: codigo, accion:'consultar'},
      dataType:"json"
      }).done(function( empleado ) {        
           if(empleado.respuesta == "no existe"){
            var datos=$("#fempleado").serialize();
            
            $.ajax({
              type:"get",
              url:"./Controlador/controladorEmpleados.php",
              data: datos,
              dataType:"json"
            }).done(function( resultado ) {
                if(resultado.respuesta){
                  swal(
                    'Grabado!!',
                    'El registro se grabó correctamente',
                    'success'
                  )   
                  dt.ajax.reload();
                  $("#titulo").html("Listado de Empleados");
                  $("#nuevo-editar").html("");
                  $("#nuevo-editar").removeClass("show");
                  $("#nuevo-editar").addClass("hide");
                  $("#empleado").removeClass("hide");
                  $("#empleado").addClass("show")                   
               } else {
                  swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!'
                  })  
              }
          });
      }else {
        swal({
          type: 'error',
          title: 'Oops...',
          text: 'El empleado ya existe!!!!!'                         
        })
      }
    });

});
  
}
$(document).ready(() => {
  $(".content-header").off("click", "a.editar");
  $(".content-header").off("click", "button#actualizar");
  $(".content-header").off("click", "a.borrar");
  $(".content-header").off("click", "button#nuevo");
  $(".content-header").off("click", "button#grabar");
  $("#titulo").html("Listado de Empleados");
  dt = $("#tabla").DataTable({
          "ajax": "./Controlador/controladorEmpleados.php?accion=listar",
          "columns": [
              { "data": "id_empleado"} ,
              { "data": "nombre_empleado" },
              { "data": "apellido_empleado" },
              { "data": "cargo_empleado" },
              { "data": "nombre_pais" },
              { "data": "nombre_ciudad" },
              { "data": "direccion_empleado" },
              { "data": "telefono_empleado" },
              { "data": "email_empleado" },
              { "data": "nombre_local" },
            { "data": "id_empleado",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>'
                          +      '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>'
                }
            }
          ]
  });
  empleado();
});
