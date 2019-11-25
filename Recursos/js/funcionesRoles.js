var dt;

function rol(){
    $(".content-header").on("click", "a.editar", function() {
        $("#titulo").html("Editar Roles");

        var codigo = $(this).data("codigo");
    
         $("#nuevo-editar").load("./Vista/roles/editarRol.php");
         $("#nuevo-editar").removeClass("hide");
         $("#nuevo-editar").addClass("show");
         $("#rol").removeClass("show");
         $("#rol").addClass("hide");
              $.ajax({
                  type:"get",
                  url:"./Controlador/controladorRoles.php",
                  data: {codigo: codigo, accion:'consultar'},
                  dataType:"json"
                  }).done(function(rol) {        
                      if(rol.respuesta === "no existe"){
                          swal({
                          type: 'error',
                          title: 'Oops...',
                          text: 'Rol no existe!'                         
                          })
                      } else {
                          $("#id_rol").val(rol.codigo);                   
                          $("#nombre_rol").val(rol.nombre_rol);
                      }
              });
                    $.ajax({
                        type:"get",
                        url:"./Controlador/controladorrolesxPermisos.php",
                        data: {codigo: codigo, accion:'listar'},
                        dataType:"json"
                    }).done(function( resultado ) {
                        var i = 1;
                        $.each(resultado.data, function (index, value) {       
                           console.log(index+":"+value.estado_rolxpermiso);       
                           if(value.estado_rolxpermiso == 1){
                            ($("#"+i+"P").prop('checked',true));
                            i++;
                           } 
                           else{
                            ($("#"+i+"P").prop('checked',false));  
                            i++;
                           }
                        }); 
                    });  
              
          });

          $(".content-header").on("click","a.borrar",function(){

            var codigo = $(this).data("codigo");
            
            swal({
                  title: '¿Está seguro?',
                  text: "¿Realmente desea borrar el rol con codigo : " + codigo + " ?",
                  type: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Si, Borrarlo!'
            }).then((decision) => {
                    if (decision.value) {
                        var request = $.ajax({
                            method: "get",                  
                            url: "./Controlador/controladorrolesxPermisos.php",
                            data: {codigo: codigo, accion:'borrar'},
                            dataType: "json"
                        });
                        request.done(function( resultado ) {
                            if(resultado.respuesta == 'correcto'){
                              var request = $.ajax({
                                  method: "get",                  
                                  url: "./Controlador/controladorRoles.php",
                                  data: {codigo: codigo, accion:'borrar'},
                                  dataType: "json"
                              })
                              request.done(function( resultado ) {
                              if(resultado.respuesta == 'correcto'){
                                  swal(
                                    "Borrado!",
                                    "La pelicula con codigo : " + codigo + " fue borrada",
                                    "success"
                                    );       
                                    /* var info = dt.page.info();   */ 
/*                                     if((info.end-1) == info.length)
                                        dt.page( info.page-1 ).draw( 'page' );
                                    dt.ajax.reload(null, false);
                              } 
                              });   */
                              dt.ajax.reload();
                            } else {
                                swal({
                                    type: "error",
                                    title: "Oops...",
                                    text: "Error al borrar!"                        
                                });
                            }
                        });
                        request.fail(function(jqXHR, textStatus) {
                            swal({
                                type: "error",
                                title: "Oops...",
                                text: "Error al borrar!" + textStatus
                            });
                        });
                    }
                });
            };
        });
    });

    $(".content-header").on("click", "button.btncerrar", function() {
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $(".content-header").html("");
    });

        $(".content-header").on("click", "button.btncerrar2", function() {
          $("#titulo").html("Listado de roles");
          $("#nuevo-editar").html("");
          $("#nuevo-editar").removeClass("show");
          $("#nuevo-editar").addClass("hide");
          $("#rol").removeClass("hide");
          $("#rol").addClass("show");
      });

          $(".content-header").on("click", "button#nuevo", function() {
            $("#titulo").html("Nuevo Rol");
            $("#nuevo-editar").load("./Vista/roles/nuevoRol.php");
            $("#nuevo-editar").removeClass("hide");
            $("#nuevo-editar").addClass("show");
            $("#rol").removeClass("show");
            $("#rol").addClass("hide");
      
  });

  $(".content-header").on("click","button#grabar",function(){
    var datos=$("#frol").serialize();
    //console.log(datos);
    $.ajax({
          type:"get",
          url:"./Controlador/controladorRoles.php",
          data: datos,
          dataType:"json"
        }).done(function( resultado ) {
            if(resultado.respuesta){  
            $.ajax({
            type:"get",
            url:"./Controlador/controladorRoles.php",
            data: {accion:'identificarM'},
            dataType:"json"
            }).done(function(resultado){
            var id_rol = resultado.id_rol;                 
            if(resultado.respuesta){
                $.ajax({
                    type:"get",
                    url:"./Controlador/controladorrolesxPermisos.php",
                    data: {codigo: id_rol, accion:'nuevo'},
                    dataType:"json"  
                }).done(function(resultado){
                    if(resultado.respuesta){
                        $.ajax({
                            type:"get",
                            url:"./Controlador/controladorrolesxPermisos.php",
                            data: {codigo: id_rol, accion:'consultar'},
                            dataType:"json"  
                        }).done(function(id_rolxpermiso){
                         if(id_rolxpermiso.respuesta == 'existe'){
                         var id_rolxpermiso = id_rolxpermiso.codigo;    
                            for(var i=1; i <=18; i++){
                             if($("#"+i+"R").prop('checked')){
                                $.ajax({
                                    type:"get",
                                    url:"./Controlador/controladorrolesxPermisos.php",
                                    data: {codigo: id_rol, codigoP: id_rolxpermiso, codigoM: i , codigoE: '1', accion:'editar'},
                                    dataType:"json"
                                }); 
                                id_rolxpermiso++;
                             }
                             else{
                                $.ajax({
                                    type:"get",
                                    url:"./Controlador/controladorrolesxPermisos.php",
                                    data: {codigo: id_rol, codigoP: id_rolxpermiso, codigoM: i , codigoE: '0', accion:'editar'},
                                    dataType:"json"
                                });
                                id_rolxpermiso++;
                             }     
                            }
                            if(resultado.respuesta){
                                swal({
                                    position: 'center',
                                    type: 'success',
                                    title: 'El rol fue grabado con éxito',
                                    showConfirmButton: false,
                                    timer: 1200
                                })     
                                $("#titulo").html("Listado de roles");
                                $("#nuevo-editar").html("");
                                $("#nuevo-editar").removeClass("show");
                                $("#nuevo-editar").addClass("hide");
                                $("#rol").removeClass("hide");
                                $("#rol").addClass("show");
                                    dt.page( 'last' ).draw( 'page' );
                                    dt.ajax.reload(null, false);  
                             }
                         }
                        });  
                        } 
                }); 
            }
            });                       
           } else {
              swal({
                  position: 'center',
                  type: 'error',
                  title: 'Ocurrió un erro al grabar',
                  showConfirmButton: false,
                  timer: 1500
              });
             
          }
      });
  });

  $(".content-header").on("click","button#actualizar",function(){
       var id_rol = document.forms["frol"]["id_rol"].value;
       var nombre_rol = document.forms["frol"]["nombre_rol"].value; 
      // console.log(datos);
       $.ajax({
          type:"get",
          url:"./Controlador/controladorRoles.php",
          data: {codigo: id_rol, codigoN: nombre_rol, accion: 'editar'},
          dataType:"json"
        }).done(function( resultado ) {
            if(resultado.respuesta){  
           $.ajax({
            type:"get",   
            url:"./Controlador/controladorrolesxPermisos.php",
            data: {codigo: id_rol, accion:'consultar'},
            dataType:"json"    
           }).done(function(id_rolxpermiso){
            if(id_rolxpermiso.respuesta == 'existe'){
                var id_rolxpermiso = id_rolxpermiso.codigo;    
                for(var i=1; i <=18; i++){
                 if($("#"+i+"P").prop('checked')){
                    $.ajax({
                        type:"get",
                        url:"./Controlador/controladorrolesxPermisos.php",
                        data: {codigo: id_rol, codigoP: id_rolxpermiso, codigoM: i, codigoE: '1', accion:'editar'},
                        dataType:"json"
                    }); 
                    id_rolxpermiso++;
                 }
                 else{
                    $.ajax({
                        type:"get",
                        url:"./Controlador/controladorrolesxPermisos.php",
                        data: {codigo: id_rol, codigoP: id_rolxpermiso, codigoM: i , codigoE: '0', accion:'editar'},
                        dataType:"json"
                    });
                    id_rolxpermiso++;
                 }     
                }
                 if(resultado.respuesta){
                    swal({
                        position: 'center',
                        type: 'success',
                        title: 'Se actualizaron los datos correctamente',
                        showConfirmButton: false,
                        timer: 1500
                    }) 
                    $("#titulo").html("Listado de roles");
                    $("#nuevo-editar").html("");
                    $("#nuevo-editar").removeClass("show");
                    $("#nuevo-editar").addClass("hide");
                    $("#rol").removeClass("hide");
                    $("#rol").addClass("show");
                    dt.ajax.reload(null, false);   
                 }
            }
         }); 
           } else {
              swal({
                type: 'error',
                title: 'Oops...',
                text: 'Something went wrong!'                         
              })
          }
      });
  })
  
  }

  $(document).ready(() => {
    $(".content-header").off("click", "a.editar");
    $(".content-header").off("click", "button#actualizar");
    $(".content-header").off("click", "a.borrar");
    $(".content-header").off("click", "button#nuevo");
    $(".content-header").off("click", "button#grabar");
    $("#titulo").html("Listado de Roles");
    dt = $("#tabla").DataTable({
    "ajax": "./Controlador/controladorRoles.php?accion=listar",
    "columns": [
        { "data": "id_rol"} ,
        { "data": "nombre_rol" },
        {                 "data": "id_rol",
        render: function(data) {
            return '<a href="#" data-codigo="' + data +
                '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>'
        }
    },
    {
        "data": "id_rol",
        render: function(data) {
            return '<a href="#" data-codigo="' + data +
                '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
            }
        }
    ]
});
rol();
});
