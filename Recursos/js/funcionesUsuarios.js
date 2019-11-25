var dt;

function usuarios(){
    $(".content-header").on("click", "a.editar", function() {
        $("#titulo").html("Editar usuarios");

        var codigo = $(this).data("codigo");
        var estado, rol;

    $("#nuevo-editar").load("./Vista/Usuarios/editarUsuario.php");
    $("#nuevo-editar").removeClass("hide");
    $("#nuevo-editar").addClass("show");
    $("#usuario").removeClass("show");
    $("#usuario").addClass("hide");
             $.ajax({
                 type:"get",
                 url:"./Controlador/controladorUsuarios.php",
                 data: {codigo: codigo, accion:'consultar'},
                 dataType:"json"
                 }).done(function( usuario ) {        
                     if(usuario.respuesta === "no existe"){
                         swal({
                         type: 'error',
                         title: 'Oops...',
                         text: 'Comuna no existe!'                         
                         })
                     } else {
                         $("#id_usuario").val(usuario.codigo);                   
                         $("#nombre_usuario").val(usuario.nombre);
                         $("#clave_usuario").val(usuario.clave);
                         $("#fechacreacion_usuario").val(usuario.fecha); 
                         estado = usuario.estado;
                         rol = usuario.rol;

                        }
                    });
                         $.ajax({
                           type:"get",
                           url:"./Controlador/controladorUsuarios.php",
                           data: {accion:'listarE'},
                           dataType:"json"
                       }).done(function( resultado ) { 
                        $("#id_estado option").remove()                     
                           $.each(resultado.data, function (index, value) { 
                           
                            if(estado === value.id_estado){
                               $("#id_estado").append("<option selected value='" + value.id_estado + "'>" + value.nombre_estado + "</option>")
                           }else {
                               $("#id_estado").append("<option value='" + value.id_estado + "'>" + value.nombre_estado + "</option>")
                           }
                           });
                       });             $.ajax({
                         type:"get",
                         url:"./Controlador/controladorUsuarios.php",
                         data: {accion:'listarR'},
                         dataType:"json"
                     }).done(function( resultado ) {      
                        $("#id_rol option").remove()                
                         $.each(resultado.data, function (index, value) { 
                         
                         if(rol === value.id_rol){
                             $("#id_rol").append("<option selected value='" + value.id_rol + "'>" + value.nombre_rol + "</option>")
                         }else {
                             $("#id_rol").append("<option value='" + value.id_rol + "'>" + value.nombre_rol + "</option>")
                            }
                        });
                   });
                    }); 
                     $(".content-header").on("click", "a.borrar", function() {
        
                        var codigo = $(this).data("codigo");
                        
                        swal({
                            title: "¿Está seguro?",
                            text: "¿Realmente desea borrar el usuario con codigo : " + codigo + " ?",
                            type: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Si, Borrarlo!"
                        }).then(decision => {
                            if (decision.value) {
                                var request = $.ajax({
                                    method: "get",
                                    url: "./Controlador/controladorUsuarios.php",
                                    data: { codigo: codigo, accion: "borrar" },
                                    dataType: "json"
                                });
                                
                                request.done(function(resultado) {
                                    if (resultado.respuesta == "correcto") {
                                        swal(
                                            "Borrado!",
                                            "El usuario con codigo : " + codigo + " fue borrada",
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
                          $("#titulo").html("Listado de usuarios");
                          $("#nuevo-editar").html("");
                          $("#nuevo-editar").removeClass("show");
                          $("#nuevo-editar").addClass("hide");
                          $("#usuario").removeClass("hide");
                          $("#usuario").addClass("show");
                      });

                      $(".content-header").on("click", "button#nuevo", function() {
                        $("#titulo").html("Nuevo usuario");

                        var codigo = $(this).data("codigo");
                        var estado, rol;

        $("#nuevo-editar").load("./Vista/Usuarios/nuevoUsuario.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#usuario").removeClass("show");
        $("#usuario").addClass("hide");           
        $.ajax({
            type:"get",
            url:"./Controlador/controladorUsuarios.php",
            data: {accion:'listarE'},
            dataType:"json"
        }).done(function( resultado ) { 
         $("#id_estado option").remove()                     
            $.each(resultado.data, function (index, value) { 
            
             if(estado === value.id_estado){
                $("#id_estado").append("<option selected value='" + value.id_estado + "'>" + value.nombre_estado + "</option>")
            }else {
                $("#id_estado").append("<option value='" + value.id_estado + "'>" + value.nombre_estado + "</option>")
            }
            });
        });             $.ajax({
          type:"get",
          url:"./Controlador/controladorUsuarios.php",
          data: {accion:'listarR'},
          dataType:"json"
      }).done(function( resultado ) {      
         $("#id_rol option").remove()                
          $.each(resultado.data, function (index, value) { 
          
          if(rol === value.id_rol){
              $("#id_rol").append("<option selected value='" + value.id_rol + "'>" + value.nombre_rol + "</option>")
          }else {
              $("#id_rol").append("<option value='" + value.id_rol + "'>" + value.nombre_rol + "</option>")
             }
         });
    });
     }); 

        $(".content-header").on("click", "button#actualizar", function() {
            var datos = $("#fusuario").serialize();
            $.ajax({
           type:"get",
           url:"./Controlador/controladorUsuarios.php",
           data: datos,
           dataType:"json"
         }).done(function( resultado ) {

            if (resultado.respuesta) {
                swal(
                    "Actualizado!",
                    "Se actualizaron los datos correctamente",
                    "success"
                );
                dt.ajax.reload();
                $("#titulo").html("Listado usuarios");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#usuario").removeClass("hide");
                $("#usuario").addClass("show");
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
        var codigo = document.forms["fusuario"]["id_usuario"].value;
        $.ajax({
                type:"get",
                url:"./Controlador/controladorUsuarios.php",
                data: {codigo: codigo, accion:'consultar'},
                dataType:"json"
                }).done(function( usuario ) {        
                     if(usuario.respuesta == "no existe"){
                      var datos=$("#fusuario").serialize();
                      
                      $.ajax({
                        type:"get",
                        url:"./Controlador/controladorUsuarios.php",
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
                            $("#titulo").html("Listado de usuarios");
                            $("#nuevo-editar").html("");
                            $("#nuevo-editar").removeClass("show");
                            $("#nuevo-editar").addClass("hide");
                            $("#usuario").removeClass("hide");
                            $("#usuario").addClass("show")                   
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
                    text: 'El usuario ya existe!!!!!'                         
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
    $("#titulo").html("Listado de Usuarios");
    dt = $("#tabla").DataTable({
            "ajax": "./Controlador/controladorUsuarios.php?accion=listar",
            "columns": [
                { "data": "id_usuario"} ,
                { "data": "nombre_usuario" },
                { "data": "clave_usuario" },
                { "data": "nombre_estado" },
                { "data": "nombre_rol" },
                { "data": "fechacreacion_usuario" },
                { "data": "id_usuario",
                    render: function (data) {
                                return '<a href="#" data-codigo="'+ data + 
                                    '"class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>'
                                +      '<a href="#" data-codigo="'+ data + 
                                    '"class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>'
                    }
                }
            ]
    });
    usuarios();
});
