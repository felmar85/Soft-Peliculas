var dt;

function cliente(){
  $(".content-header").on("click", "a.editar", function() {
    $("#titulo").html("Editar Cliente");

    var codigo = $(this).data("codigo");
    var pais, ciudad;

    $("#nuevo-editar").load("./Vista/Clientes/editarCliente.php");
    $("#nuevo-editar").removeClass("hide");
    $("#nuevo-editar").addClass("show");
    $("#cliente").removeClass("show");
    $("#cliente").addClass("hide");
         $.ajax({
             type:"get",
             url:"./Controlador/controladorCliente.php",
             data: {codigo: codigo, accion:'consultar'},
             dataType:"json"
             }).done(function( cliente ) {        
                 if(cliente.respuesta === "no existe"){
                     swal({
                     type: 'error',
                     title: 'Oops...',
                     text: 'Cliente no existe!'                         
                     })
                 } else {
                     $("#id_cliente").val(cliente.codigo);                   
                     $("#nombre_cliente").val(cliente.nombre);
                     $("#apellido_cliente").val(cliente.apellido);
                     $("#direccion_cliente").val(cliente.direccion);
                     $("#telefono_cliente").val(cliente.telefono);
                     pais = cliente.pais;
                     ciudad = cliente.ciudad;
                     
                 }
                });
            $.ajax({
                type:"get",
                url:"./Controlador/controladorCliente.php",
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
             });            $.ajax({
              type:"get",
              url:"./Controlador/controladorCliente.php",
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
                  text: "¿Realmente desea borrar el cliente con codigo : " + codigo + " ?",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#3085d6",
                  cancelButtonColor: "#d33",
                  confirmButtonText: "Si, Borrarlo!"
              }).then(decision => {
                  if (decision.value) {
                      var request = $.ajax({
                          method: "get",
                          url: "./Controlador/controladorCliente.php",
                          data: { codigo: codigo, accion: "borrar" },
                          dataType: "json"
                      });
      
                      request.done(function(resultado) {
                          if (resultado.respuesta == "correcto") {
                              swal(
                                  "Borrado!",
                                  "El cliente con codigo : " + codigo + " fue borrada",
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
              $("#titulo").html("Listado de Clientes");
              $("#nuevo-editar").html("");
              $("#nuevo-editar").removeClass("show");
              $("#nuevo-editar").addClass("hide");
              $("#cliente").removeClass("hide");
              $("#cliente").addClass("show");
          });

      $(".content-header").on("click", "button#nuevo", function() {
        $("#titulo").html("Nuevo cliente");

        var codigo = $(this).data("codigo");
        var pais, ciudad;

        $("#nuevo-editar").load("./Vista/Clientes/nuevoCliente.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#cliente").removeClass("show");
        $("#cliente").addClass("hide");    
        $.ajax({
          type:"get",
          url:"./Controlador/controladorCliente.php",
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
       });            $.ajax({
        type:"get",
        url:"./Controlador/controladorcliente.php",
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
        var datos = $("#fcliente").serialize();
        $.ajax({
            type: "get",
            url: "./Controlador/controladorCliente.php",
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
                $("#titulo").html("Listado cliente");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#cliente").removeClass("hide");
                $("#cliente").addClass("show");
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
    var codigo = document.forms["fcliente"]["id_cliente"].value;
    $.ajax({
      type:"get",
      url:"./Controlador/controladorCliente.php",
      data: {codigo: codigo, accion:'consultar'},
      dataType:"json"
      }).done(function( cliente ) {        
           if(cliente.respuesta == "no existe"){
            var datos=$("#fcliente").serialize();
            
            $.ajax({
                  type:"get",
                  url:"./Controlador/controladorCliente.php",
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
                      $("#titulo").html("Listado de Clientes");
                      $("#nuevo-editar").html("");
                      $("#nuevo-editar").removeClass("show");
                      $("#nuevo-editar").addClass("hide");
                      $("#cliente").removeClass("hide");
                      $("#cliente").addClass("show")                   
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
              text: 'El cliente ya existe!!!!!'                         
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
  $("#titulo").html("Listado de Clientes");
  dt = $("#tabla").DataTable({
          "ajax": "./Controlador/controladorCliente.php?accion=listar",
          "columns": [
              { "data": "id_cliente"} ,
              { "data": "nombre_cliente" },
              { "data": "apellido_cliente" },
              { "data": "direccion_cliente" },
              { "data": "telefono_cliente" },
              { "data": "nombre_pais" },
              { "data": "nombre_ciudad" },
              { "data": "id_cliente",
                  render: function (data) {
                            return '<a href="#" data-codigo="'+ data + 
                                  '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>'
                            +      '<a href="#" data-codigo="'+ data + 
                                  '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>'
                  }
              }
          ]
  });
  cliente();
});
