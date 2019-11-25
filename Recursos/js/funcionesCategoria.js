var dt;

function categoria() {
    $(".content-header").on("click", "button#actualizar", function() {
        var datos = $("#fcategoria").serialize();
        $.ajax({
            type: "get",
            url: "./Controlador/controladorCategoria.php",
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
                $("#titulo").html("Listado de Categorias");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#categoria").removeClass("hide");
                $("#categoria").addClass("show")
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
            text: "¿Realmente desea borrar la categoria con codigo : " + codigo + " ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Borrarlo!'
        }).then((decision) => {
            if (decision.value) {

                var request = $.ajax({
                    method: "get",
                    url: "./Controlador/controladorCategoria.php",
                    data: { codigo: codigo, accion: 'borrar' },
                    dataType: "json"
                })

                request.done(function(resultado) {
                    if (resultado.respuesta == 'correcto') {
                        swal(
                            'Borrado!',
                            'La categoria con codigo : ' + codigo + ' fue borrado',
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
        $("#titulo").html("Listado de categoriaes");
        $("#nuevo-editar").html("");
        $("#nuevo-editar").removeClass("show");
        $("#nuevo-editar").addClass("hide");
        $("#categoria").removeClass("hide");
        $("#categoria").addClass("show");

    })

    $(".content-header").on("click", "button.btncerrar", function() {
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $(".content-header").html('')
    })

    $(".content-header").on("click", "button#nuevo", function() {
        $("#titulo").html("Nuevo categoria");
        $("#nuevo-editar").load("./Vista/Categorias/nuevoCategoria.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#categoria").removeClass("show");
        $("#categoria").addClass("hide");
    })

    $(".content-header").on("click", "button#grabar", function() {
        var codigo = document.forms["fcategoria"]["id_categoria"].value;
        $.ajax({
            type: "get",
            url: "./Controlador/controladorCategoria.php",
            data: { codigo: codigo, accion: 'consultar' },
            dataType: "json"
        }).done(function(categoria) {
            if (categoria.respuesta == "no existe") {
                var datos = $("#fcategoria").serialize();
                console.log(datos);
                $.ajax({
                    type: "get",
                    url: "./Controlador/controladorCategoria.php",
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
                        $("#titulo").html("Listado de Categorias");
                        $("#nuevo-editar").html("");
                        $("#nuevo-editar").removeClass("show");
                        $("#nuevo-editar").addClass("hide");
                        $("#categoria").removeClass("hide");
                        $("#categoria").addClass("show")
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
                    text: 'La categoria ya existe!!!!!'
                })
            }
        });
    });

    $(".content-header").on("click", "a.editar", function() {
        $("#titulo").html("Editar categoria");
        //Recupera datos del fromulario
        var codigo = $(this).data("codigo");
        /* console.log(codigo); */

        $("#nuevo-editar").load("./Vista/Categorias/editarCategoria.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#categoria").removeClass("show");
        $("#categoria").addClass("hide");
        $.ajax({
            type: "get",
            url: "./Controlador/controladorCategoria.php",
            data: { codigo: codigo, accion: 'consultar' },
            dataType: "json"
        }).done(function(categoria) {
            if (categoria.respuesta === "no existe") {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'categoria no existe!'
                })
            } else {
                $("#id_categoria").val(categoria.id_categoria);
                $("#nombre_categoria").val(categoria.nombre_categoria);
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
    $("#titulo").html("Listado de categoria");
    dt = $("#tabla").DataTable({
        "ajax": "./Controlador/controladorCategoria.php?accion=listar",
        "columns": [
            { "data": "id_categoria" },
            { "data": "nombre_categoria" },
            {
                "data": "id_categoria",
                render: function(data) {
                    return '<a href="#" data-codigo="' + data +
                        '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>'
                }
            },
            {
                "data": "id_categoria",
                render: function(data) {
                    return '<a href="#" data-codigo="' + data +
                        '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
                }
            }
        ]
    });

    categoria();
});