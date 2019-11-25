var dt;

function lenguaje() {
    $(".content-header").on("click", "button#actualizar", function() {
        var datos = $("#flenguaje").serialize();
        $.ajax({
            type: "get",
            url: "./Controlador/controladorLenguaje.php",
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
                $("#titulo").html("Listado lenguaje");
                $("#nuevo-editar").html("");
                $("#nuevo-editar").removeClass("show");
                $("#nuevo-editar").addClass("hide");
                $("#lenguaje").removeClass("hide");
                $("#lenguaje").addClass("show")
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
            text: "¿Realmente desea borrar el lenguaje con codigo : " + codigo + " ?",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Borrarlo!'
        }).then((decision) => {
            if (decision.value) {

                var request = $.ajax({
                    method: "get",
                    url: "./Controlador/controladorLenguaje.php",
                    data: { codigo: codigo, accion: 'borrar' },
                    dataType: "json"
                })

                request.done(function(resultado) {
                    if (resultado.respuesta == 'correcto') {
                        swal(
                            'Borrado!',
                            'El lenguaje con codigo : ' + codigo + ' fue borrado',
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
        $("#titulo").html("Listado de lenguajes");
        $("#nuevo-editar").html("");
        $("#nuevo-editar").removeClass("show");
        $("#nuevo-editar").addClass("hide");
        $("#lenguaje").removeClass("hide");
        $("#lenguaje").addClass("show");

    })

    $(".content-header").on("click", "button.btncerrar", function() {
        $("#contenedor").removeClass("show");
        $("#contenedor").addClass("hide");
        $(".content-header").html('')
    })

    $(".content-header").on("click", "button#nuevo", function() {
        $("#titulo").html("Nuevo lenguaje");
        $("#nuevo-editar").load("./Vista/Lenguajes/nuevoLenguaje.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#lenguaje").removeClass("show");
        $("#lenguaje").addClass("hide");
    })

    $(".content-header").on("click", "button#grabar", function() {
        var codigo = document.forms["flenguaje"]["id_lenguaje"].value;
        $.ajax({
            type: "get",
            url: "./Controlador/controladorLenguaje.php",
            data: { codigo: codigo, accion: 'consultar' },
            dataType: "json"
        }).done(function(lenguaje) {
            if (lenguaje.respuesta == "no existe") {
                var datos = $("#flenguaje").serialize();

                $.ajax({
                    type: "get",
                    url: "./Controlador/controladorLenguaje.php",
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
                        $("#titulo").html("Listado de lenguajes");
                        $("#nuevo-editar").html("");
                        $("#nuevo-editar").removeClass("show");
                        $("#nuevo-editar").addClass("hide");
                        $("#lenguaje").removeClass("hide");
                        $("#lenguaje").addClass("show")
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
                    text: 'El lenguaje ya existe!!!!!'
                })
            }
        });
    });

    $(".content-header").on("click", "a.editar", function() {
        $("#titulo").html("Editar lenguaje");
        //Recupera datos del fromulario
        var codigo = $(this).data("codigo");

        $("#nuevo-editar").load("./Vista/Lenguajes/editarLenguaje.php");
        $("#nuevo-editar").removeClass("hide");
        $("#nuevo-editar").addClass("show");
        $("#lenguaje").removeClass("show");
        $("#lenguaje").addClass("hide");
        $.ajax({
            type: "get",
            url: "./Controlador/controladorLenguaje.php",
            data: { codigo: codigo, accion: 'consultar' },
            dataType: "json"
        }).done(function(lenguaje) {
            if (lenguaje.respuesta === "no existe") {
                swal({
                    type: 'error',
                    title: 'Oops...',
                    text: 'lenguaje no existe!'
                })
            } else {
                $("#id_lenguaje").val(lenguaje.codigo);
                $("#nombre_lenguaje").val(lenguaje.lenguaje);
                $("#last_update").val(lenguaje.last_update);

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
    $("#titulo").html("Listado de lenguajes");
    dt = $("#tabla").DataTable({
            "ajax": "./Controlador/controladorLenguaje.php?accion=listar",
            "columns": [
                { "data": "id_lenguaje"} ,
                { "data": "nombre_lenguaje" },
                { "data": "last_update" },
                {                "data": "id_lenguaje",
                render: function(data) {
                    return '<a href="#" data-codigo="' + data +
                        '" class="btn btn-danger btn-sm borrar"> <i class="fa fa-trash"></i></a>'
                }
            },
            {
                "data": "id_lenguaje",
                render: function(data) {
                    return '<a href="#" data-codigo="' + data +
                        '" class="btn btn-info btn-sm editar"> <i class="fa fa-edit"></i></a>';
                }
            }
        ]
    });
    lenguaje();
});