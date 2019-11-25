var dt;

function categoriaxpelicula() {
    $(".content-header").on("click", "button#actualizar", function() {
        var datos = $("#fcategoriaxpelicula").serialize();
        $.ajax({
            type: "get",
            url: "./Controlador/controladorCategoriaxpelicula.php",
            data: datos,
            dataType: "json"
        }).done(function(resultado) {
            if (resultado.respuesta) {
                swal(
                    'Actualizado!',
                    'Se actualizaron los datos correctamente',
                    'success'
                )
                dt.ajax.reload();
                $("#titulo").html("Listado de Categoria por Pelicula");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#categoriaxpelicula").removeClass("hide");
                $("#categoriaxpelicula").addClass("show")
            } else {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'Something went wrong!'
                })
            }
        });
    })

    $(".content-header").on("click", "a.borrar", function() {
        //Recupera datos del formulario
        var codigo = $(this).data("codigo");

        swal({
            title: '¿Está seguro?',
            text: "¿Realmente desea borrar la categoria por pelicula con codigo : " + codigo + " ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Borrarlo!'
        }).then((decision) => {
            if (decision.value) {

                var request = $.ajax({
                    method: "get",
                    url: "./Controlador/controladorCategoriaxpelicula.php",
                    data: { codigo: codigo, accion: 'borrar' },
                    dataType: "json"
                })

                request.done(function(resultado) {
                    if (resultado.respuesta == 'correcto') {
                        swal(
                            'Borrado!',
                            'La categoria por pelicula con codigo : ' + codigo + ' fue borrado',
                            'success'
                        )
                        dt.ajax.reload();
                    } else {
                        swal({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        })
                    }
                });

                request.fail(function(jqXHR, textStatus) {
                    swal({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Something went wrong!' + textStatus
                    })
                });
            }
        })

    });

    $(".content-header").on("click", "button.btncerrar2", function() {
        $("#titulo").html("Listado de categoriaxpeliculaes");
        $("#nuevo-editar").html("");
        $("#nuevo-editar").removeClass("show");
        $("#nuevo-editar").addClass("hide");
        $("#categoriaxpelicula").removeClass("hide");
        $("#categoriaxpelicula").addClass("show");

    })

    $(".content-header").on("click", "button.btncerrar", function() {
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $(".content-header").html('')
    })

    $(".content-header").on("click", "button#nuevo", function() {
        $("#titulo").html("Nuevo categoriaxpelicula");
        $("#nuevo-editar").load("./Vista/Categoriaxpelicula/nuevocategoriaxpelicula.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#categoriaxpelicula").removeClass("show");
        $("#categoriaxpelicula").addClass("hide");
        $.ajax({
            type: "get",
            url: "./Controlador/controladorPelicula.php",
            data: { accion: 'listar' },
            dataType: "json"
        }).done(function(resultado) {
            
            $("#id_pelicula option").remove()
            $("#id_pelicula").append("<option selected value=''>Seleccione un pelicula</option>")
            $.each(resultado.data, function(index, value) {
                $("#id_pelicula").append("<option value='" + value.id_pelicula + "'>" + value.nombre_pelicula + "</option>")
            });
        });
        $.ajax({
            type: "get",
            url: "./Controlador/controladorCategoria.php",
            data: { accion: 'listar' },
            dataType: "json"
        }).done(function(resultado) {
            
            $("#id_categoria option").remove()
            $("#id_categoria").append("<option selected value=''>Seleccione una categoria</option>")
            $.each(resultado.data, function(index, value) {
                $("#id_categoria").append("<option value='" + value.id_categoria + "'>" + value.nombre_categoria + "</option>")
            });
        });
    });

    $(".content-header").on("click", "button#grabar", function() {
        var codigo = document.forms["fcategoriaxpelicula"]["id_pelicula"].value;
        $.ajax({
            type: "get",
            url: "./Controlador/controladorCategoriaxpelicula.php",
            data: { codigo: codigo, accion: 'consultar' },
            dataType: "json"
        }).done(function(categoriaxpelicula) {
         /*    if (categoriaxpelicula.respuesta == "no existe") { */
                var datos = $("#fcategoriaxpelicula").serialize();
                console.log(datos);
                $.ajax({
                    type: "get",
                    url: "./Controlador/controladorCategoriaxpelicula.php",
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
                        $("#titulo").html("Listado de Categoriaxpeliculas");
                        $("#nuevo-editar").html("");
                        $("#nuevo-editar").removeClass("show");
                        $("#nuevo-editar").addClass("hide");
                        $("#categoriaxpelicula").removeClass("hide");
                        $("#categoriaxpelicula").addClass("show")
                    } else {
                        swal({
                            type: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!'
                        })
                    }
                });
/*             } else {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'La categoria por pelicula ya existe!!!!!'
                })
            } */
        });
    });

    $(".content-header").on("click", "a.editar", function() {
        $("#titulo").html("Editar categoria por pelicula");
  
        var codigo = $(this).data("codigo");
        console.log(codigo); 

        $("#nuevo-editar").load("./Vista/Categoriaxpelicula/editarcategoriaxpelicula.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#categoriaxpelicula").removeClass("show");
        $("#categoriaxpelicula").addClass("hide");
        $.ajax({
            type: "get",
            url: "./Controlador/controladorCategoriaxpelicula.php",
            data: { codigo: codigo, accion: 'consultar' },
            dataType: "json"
        }).done(function(categoriaxpelicula) {
            if (categoriaxpelicula.respuesta === "no existe") {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'categoria por pelicula no existe!'
                })
            } else {
                id_pelicula = categoriaxpelicula.id_pelicula;
                id_categoria = categoriaxpelicula.id_categoria;
            }
        });
        $.ajax({
            type: "get",
            url: "./Controlador/controladorPelicula.php",
            data: { accion: 'listar' },
            dataType: "json"
        }).done(function(resultado) {
            $("#id_pelicula option").remove();
            $.each(resultado.data, function(index, value) {

                if (id_pelicula === value.id_pelicula) {
                    $("#id_pelicula").append("<option selected value='" + value.id_pelicula + "'>" + value.nombre_pelicula + "</option>")
                } else {
                    $("#id_pelicula").append("<option value='" + value.id_pelicula + "'>" + value.nombre_pelicula + "</option>")
                }
            });
        });
        $.ajax({
            type: "get",
            url: "./Controlador/controladorCategoria.php",
            data: { accion: 'listar' },
            dataType: "json"
        }).done(function(resultado) {
            $("#id_categoria option").remove();
            $.each(resultado.data, function(index, value) {

                if (id_categoria === value.id_categoria) {
                    $("#id_categoria").append("<option selected value='" + value.id_categoria + "'>" + value.nombre_categoria + "</option>")
                } else {
                    $("#id_categoria").append("<option value='" + value.id_categoria + "'>" + value.nombre_categoria + "</option>")
                }
            });
        });
    });

}
$(document).ready(() => {
    $(".content-header").off("click", "a.editar");
    $(".content-header").off("click", "button#actualizar");
    $(".content-header").off("click", "a.borrar");
    $(".content-header").off("click", "button#nuevo");
    $(".content-header").off("click", "button#grabar");
    $("#titulo").html("Listado de categorias por Pelicula");
    dt = $("#tabla").DataTable({
        "ajax": "./Controlador/controladorCategoriaxpelicula.php?accion=listar",
        "columns": [
            { "data": "id_pelicula" },
            { "data": "nombre_pelicula" },
            { "data": "nombre_categoria" },
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

    categoriaxpelicula();
});