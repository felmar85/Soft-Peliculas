var dt;

function pelicula() {
    $(".content-header").on("click", "a.editar", function() {
        $("#titulo").html("Editar pelicula");

        var codigo = $(this).data("codigo");

        $("#nuevo-editar").load("./Vista/Peliculas/editarPelicula.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#pelicula").removeClass("show");
        $("#pelicula").addClass("hide");
        $.ajax({
            type: "get",
            url: "./Controlador/controladorPelicula.php",
            data: { codigo: codigo, accion: 'consultar' },
            dataType: "json"
        }).done(function(pelicula) {
            if (pelicula.respuesta === "no existe") {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'pelicula no existe!'
                })
            } else {
                $("#id_pelicula").val(pelicula.id_pelicula);
                $("#nombre_pelicula").val(pelicula.nombre_pelicula);
                $("#descripcion_pelicula").val(pelicula.descripcion_pelicula);
                $("#fecha_pelicula").val(pelicula.fecha_pelicula);
                $("#valor_pelicula").val(pelicula.valor_pelicula);
                lenguaje = pelicula.lenguaje;
            }
        });
        $.ajax({
            type: "get",
            url: "./Controlador/controladorLenguaje.php",
            data: { accion: 'listar' },
            dataType: "json"
        }).done(function(resultado) {
            $("#id_lenguaje option").remove();
            $.each(resultado.data, function(index, value) {

                if (lenguaje === value.id_lenguaje) {
                    $("#id_lenguaje").append("<option selected value='" + value.id_lenguaje + "'>" + value.nombre_lenguaje + "</option>")
                } else {
                    $("#id_lenguaje").append("<option value='" + value.id_lenguaje + "'>" + value.nombre_lenguaje + "</option>")
                }
            });
        });
    });

    $(".content-header").on("click", "a.borrar", function() {

        var codigo = $(this).data("codigo");

        swal({
            title: '¿Está seguro?',
            text: "¿Realmente desea borrar la pelicula con codigo : " + codigo + " ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Borrarlo!'
        }).then((decision) => {
            if (decision.value) {
                var request = $.ajax({
                    method: "get",
                    url: "./Controlador/controladorPelicula.php",
                    data: { codigo: codigo, accion: 'borrar' },
                    dataType: "json"
                })

                    request.done(function(resultado) {
                        if (resultado.respuesta == "correcto") {
                            swal(
                                "Borrado!",
                                "La pelicula con codigo : " + codigo + " fue borrada",
                                "success"
                            );
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
        });

        $(".content-header").on("click", "button.btncerrar", function() {
            $("#contenedor").removeClass("show");
            $("#contenedor").addClass("hide");
            $(".content-header").html("");
        });

            $(".content-header").on("click", "button.btncerrar2", function() {
              $("#titulo").html("Listado de peliculas");
              $("#nuevo-editar").html("");
              $("#nuevo-editar").removeClass("show");
              $("#nuevo-editar").addClass("hide");
              $("#pelicula").removeClass("hide");
              $("#pelicula").addClass("show");
          });

          $(".content-header").on("click", "button#nuevo", function() {
            $("#titulo").html("Nueva pelicula");
            $("#nuevo-editar").load("./Vista/Peliculas/nuevaPelicula.php");
            $("#nuevo-editar").removeClass("hide");
            $("#nuevo-editar").addClass("show");
            $("#pelicula").removeClass("show");
            $("#pelicula").addClass("hide");
            $.ajax({
                type: "get",
                url: "./Controlador/controladorLenguaje.php",
                data: { accion: 'listar' },
                dataType: "json"
            }).done(function(resultado) {
                
                $("#id_lenguaje option").remove()
                $("#id_lenguaje").append("<option selected value=''>Seleccione un lenguaje</option>")
                $.each(resultado.data, function(index, value) {
                    $("#id_lenguaje").append("<option value='" + value.id_lenguaje + "'>" + value.nombre_lenguaje + "</option>")
                });
            });
        });

    $(".content-header").on("click", "button#actualizar", function() {
        var datos = $("#fpelicula").serialize();
        $.ajax({
            type: "get",
            url: "./Controlador/controladorPelicula.php",
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
                $("#titulo").html("Listado peliculas");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#pelicula").removeClass("hide");
                $("#pelicula").addClass("show");
            } else {
                swal({
                    type: "error",
                    title: "Oops...",
                    text: "Error al Actualizar!"
                });
            }
        });
    });

    $(".content-header").on("click", "button#grabar", function() {
        var codigo = document.forms["fpelicula"]["id_pelicula"].value;
        $.ajax({
            type: "get",
            url: "./Controlador/controladorPelicula.php",
            data: { codigo: codigo, accion: 'consultar' },
            dataType: "json"
        }).done(function(pelicula) {
            if (pelicula.respuesta == "no existe") {
                var datos = $("#fpelicula").serialize();

                $.ajax({
                    type: "get",
                    url: "./Controlador/controladorPelicula.php",
                    data: datos,
                    dataType: "json"
                }).done(function(resultado) {
                    if (resultado.respuesta) {
                        swal(
                            'Grabado!!',
                            'El registro se grabó correctamente',
                            'success'
                        )
                        dt.ajax.reload();
                        $("#titulo").html("Listado de Peliculas");
                        $("#nuevo-editar").html("");
                        $("#nuevo-editar").removeClass("show");
                        $("#nuevo-editar").addClass("hide");
                        $("#pelicula").removeClass("hide");
                        $("#pelicula").addClass("show")
                    } else {
                        swal({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        })
                    }
                });
            } else {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'la pelicula ya existe!!!!!'
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
    $("#titulo").html("Listado de Peliculas");
    dt = $("#tabla").DataTable({
        "ajax": "./Controlador/controladorPelicula.php?accion=listar",
        "columns": [
            { "data": "id_pelicula" },
            { "data": "nombre_pelicula" },
            { "data": "descripcion_pelicula"},
            { "data": "nombre_lenguaje"},
            { "data": "fecha_pelicula"},
            { "data": "valor_pelicula"},
            {                 
                "data": "id_pelicula",
            render: function(data) {
                return '<a href="#" data-codigo="' + data +
                    '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>'
            }
        },
        {
            "data": "id_pelicula",
            render: function(data) {
                return '<a href="#" data-codigo="' + data +
                    '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
            }
        }
    ]
});
pelicula();
});
