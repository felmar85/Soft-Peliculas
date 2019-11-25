var dt;

function tienda(){
  $(".content-header").on("click", "a.editar", function() {
    $("#titulo").html("Editar tienda");

    var codigo = $(this).data("codigo");
    var pais, ciudad;

    $("#nuevo-editar").load("./Vista/gestion_tiendas/editarTienda.php");
    $("#nuevo-editar").removeClass("hide");
    $("#nuevo-editar").addClass("show");
    $("#tienda").removeClass("show");
    $("#tienda").addClass("hide");
         $.ajax({
             type:"get",
             url:"./Controlador/controladorGestionT.php",
             data: {codigo: codigo, accion:'consultar'},
             dataType:"json"
             }).done(function( tienda ) {        
                 if(tienda.respuesta === "no existe"){
                     swal({
                     type: 'error',
                     title: 'Oops...',
                     text: 'tienda no existe!'                         
                     })
                 } else {
                     $("#id_local").val(tienda.codigo);                   
                     $("#nombre_local").val(tienda.nombre_local);
                     $("#direccion_local").val(tienda.direccion_local);
                     $("#telefono_local").val(tienda.telefono_local);
                     pais = tienda.pais;
                     ciudad = tienda.ciudad;
                    }
                  });
                  $.ajax({
                    type:"get",
                    url:"./Controlador/controladorGestionT.php",
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
                  url:"./Controlador/controladorGestionT.php",
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
                    text: "¿Realmente desea borrar el Tienda con codigo : " + codigo + " ?",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Si, Borrarlo!"
                }).then(decision => {
                          if (decision.value) {
                              var request = $.ajax({
                                  method: "get",                  
                                  url: "./Controlador/controladorGestionT.php",
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
              $("#titulo").html("Listado de Tienda");
              $("#nuevo-editar").html("");
              $("#nuevo-editar").removeClass("show");
              $("#nuevo-editar").addClass("hide");
              $("#tienda").removeClass("hide");
              $("#tienda").addClass("show");
          });

          $(".content-header").on("click", "button#nuevo", function() {
            $("#titulo").html("Nueva tienda");
            var codigo = $(this).data("codigo");
            var pais, ciudad;
            $("#nuevo-editar").load("./Vista/gestion_tiendas/nuevaTienda.php");
            
            $("#nuevo-editar").removeClass("hide");
            $("#nuevo-editar").addClass("show");
            $("#tienda").removeClass("show");
            $("#tienda").addClass("hide");  
            $.ajax({
                type:"get",
                url:"./Controlador/controladorGestionT.php",
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
              url:"./Controlador/controladorGestionT.php",
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
         /*   $.ajax({
            type:"get",
            url:"./Controlador/controladorGestionT.php",
            data: { accion:'listarE'},
            dataType:"json"
         }).done(function(resultado) { 
           console.log(resultado);
            $("#id_empleado option").remove()
               $.each(resultado.data, function (index, value) {  
                 console.log(value);
                $("#id_empleado").append("<option value='" + value.id_empleado + "'>" + value.nombre_empleado + "</option>");          
              });
         }); */
        });

          $(".content-header").on("click", "button#actualizar", function() {
            var datos = $("#ftienda").serialize();
            $.ajax({
              type: "get",
              url: "./Controlador/controladorGestionT.php",
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
    var codigo = document.forms["ftienda"]["id_local"].value;
    $.ajax({
      type:"get",
      url:"./Controlador/controladorGestionT.php",
      data: {codigo: codigo, accion:'consultar'},
      dataType:"json"
      }).done(function( tienda ) {        
           if(tienda.respuesta == "no existe"){
            var datos=$("#ftienda").serialize();
            
            $.ajax({
              type:"get",
              url:"./Controlador/controladorGestionT.php",
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
                  $("#titulo").html("Listado de Tiendas");
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
          text: 'El local ya existe!!!!!'                         
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
  $("#titulo").html("Listado de Tienda");
  dt = $("#tabla").DataTable({
          "ajax": "./Controlador/controladorGestionT.php?accion=listar",
          "columns": [
              { "data": "id_local"} ,
              { "data": "nombre_local" },
              { "data": "direccion_local" },
              { "data": "telefono_local" },
              { "data": "nombre_ciudad" },
              { "data": "nombre_pais" },
          /*     { "data": "nombre" }, */
              
           
            { "data": "id_local",
                render: function (data) {
                          return '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>'
                          +      '<a href="#" data-codigo="'+ data + 
                                 '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>'
                }
            }
          ]
  });
  tienda();
});
