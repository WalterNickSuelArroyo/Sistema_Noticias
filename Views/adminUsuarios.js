$(document).ready(function () {
    bsCustomFileInput.init();
    verificar_sesion();
    read_all_usuarios();
    function verificar_sesion() {
        funcion = 'verificar_sesion';
        $.post('../Controllers/UsuarioController.php', { funcion }, (response) => {
            if (response != '') {
                let sesion = JSON.parse(response);
                $('#nav_login').hide();
                $('#nav_register').hide();
                $('#usuario_nav').text(sesion.nombres);
            } else {
                $('#nav_usuario').hide();
                location.href = 'login.php';
            }
        })
    }
    async function read_all_usuarios() {
        funcion = "read_all_usuarios";
        let data = await fetch('../Controllers/UsuarioController.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'funcion=' + funcion
        })
        if (data.ok) {
            let response = await data.text();
            try {
                let usuarios = JSON.parse(response);
                $('#usuario').DataTable({
                    data: usuarios,
                    "aaSorting": [],
                    "searching": true,
                    "scrollX": false,
                    "autoWidth": false,
                    columns: [
                        { data: "nombres" },
                        { data: "apellidos" },
                        { data: "email" },
                        { data: "telefono" },
                        { data: "tipo" },
                        {
                            "render": function (data, type, datos, meta) {
                                return `<button id="${datos.id}" pass="${datos.pass}" nombres="${datos.nombres}" apellidos="${datos.apellidos}" email="${datos.email}" telefono="${datos.telefono}" tipo="${datos.tipo}" class="edit btn btn-info" title="Editar usuario" type="button" data-bs-toggle="modal" data-bs-target="#modal_editar_usuario"><i class="fas fa-pencil-alt"></i></button>
                                    <button id="${datos.id}" pass="${datos.pass}" nombres="${datos.nombres}" apellidos="${datos.apellidos}" email="${datos.email}" telefono="${datos.telefono}" tipo="${datos.tipo}"  class="remove btn btn-danger" title="Eliminar usuario" type="button"><i class="fas fa-trash-alt"></i></button>`
                            }
                        }
                    ],
                    "destroy": true,
                    "language": espanol
                });
            } catch (error) {
                console.error(error);
                console.log(response);
            }
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Hubo conflicto al editar sus datos, comuniquese con el area de soporte',
            })
        }
    }
    async function crear_usuario(datos) {
        let data = await fetch('../Controllers/UsuarioController.php', {
            method: 'POST',
            body: datos
        })
        if (data.ok) {
            let response = await data.text();
            try {
                let respuesta = JSON.parse(response);
                if (respuesta.mensaje == 'listo') {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Se ha creado el usuario',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                        read_all_usuarios();
                        $('#form-usuario').trigger('reset');
                    })
                }

            } catch (error) {
                console.error(error);
                console.log(response);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se pudo crear el usuario, comuniquese con el area de soporte',
                })
            }
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Hubo conflicto al editar sus datos, comuniquese con el area de soporte',
            })
        }
    }
    $.validator.setDefaults({
        submitHandler: function () {
            let funcion = "crear_usuario";
            let datos = new FormData($('#form-usuario')[0]);
            datos.append("funcion", funcion);
            crear_usuario(datos);
        }
    });
    $('#form-usuario').validate({
        rules: {
            nombres: {
                required: true,
            },
            apellidos: {
                required: true,
            },
            email: {
                required: true,
            },
            pass: {
                required: true,
            },
            telefono: {
                required: true,
            },
            tipo: {
                required: true,
            }
        },
        messages: {
            nombres: {
                required: "Este campo es obligatorio"
            },
            apellidos: {
                required: "Este campo es obligatorio"
            },
            email: {
                required: "Este campo es obligatorio"
            },
            pass: {
                required: "Este campo es obligatorio"
            },
            telefono: {
                required: "Este campo es obligatorio"
            },
            tipo: {
                required: "Este campo es obligatorio"
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
            $(element).removeClass('is-valid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
            $(element).addClass('is-valid');
        }
    });

    $(document).on('click', '.edit', (e) => {
        $('#form-usuario-mod').trigger('reset');
        let elemento = $(this)[0].activeElement;
        let id = $(elemento).attr('id');
        let nombres = $(elemento).attr('nombres');
        let apellidos = $(elemento).attr('apellidos');
        let email = $(elemento).attr('email');
        let telefono = $(elemento).attr('telefono');
        $('#nombres_mod').val(nombres);
        $('#apellidos_mod').val(apellidos);
        $('#email_mod').val(email);
        $('#telefono_mod').val(telefono);
        $('#id_usuario_mod').val(id);
    });
    async function editar_usuario(datos) {
        let data = await fetch('../Controllers/UsuarioController.php', {
            method: 'POST',
            body: datos
        })
        if (data.ok) {
            let response = await data.text();
            try {
                let respuesta = JSON.parse(response);
                if (respuesta.mensaje == 'success') {
                    $('#form-usuario-mod').trigger('reset');
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Se ha editado el usuario',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                        read_all_usuarios();
                        $('#form-usuario-mod').trigger('reset');
                        $('#modal_editar_usuario').modal('hide');
                    })
                }
                else if (respuesta.mensaje == 'danger') {
                    Swal.fire({
                        icon: 'warning',
                        title: 'No altero ningun cambio',
                        text: 'Modifique algun cambio para realizar la edicion',
                    })
                }
            } catch (error) {
                console.error(error);
                console.log(response);
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'No se edito el usuario, comuniquese con el area de soporte',
                })
            }
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Hubo conflicto al editar datos, comuniquese con el area de soporte',
            })
        }
    }
    $.validator.setDefaults({
        submitHandler: function () {
            let funcion = "editar_usuario";
            let datos = new FormData($('#form-usuario-mod')[0]);
            datos.append('funcion', funcion);
            editar_usuario(datos);
        }
    });
    $('#form-usuario-mod').validate({
        rules: {
            nombres_mod: {
                required: true,
            },
            apellidos_mod: {
                required: true,
            },
            email_mod: {
                required: true,
            },
            telefono_mod: {
                required: true,
            }
        },
        messages: {
            nombres_mod: {
                required: "Este campo es obligatorio"
            },
            apellidos_mod: {
                required: "Este campo es obligatorio"
            },
            email_mod: {
                required: "Este campo es obligatorio"
            },
            telefono_mod: {
                required: "Este campo es obligatorio"
            }
        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid');
            $(element).removeClass('is-valid');
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
            $(element).addClass('is-valid');
        }
    });
    async function eliminar_usuario(id) {
        let funcion = "eliminar_usuario";
        let respuesta = '';
        let data = await fetch('../Controllers/UsuarioController.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'funcion=' + funcion + '&&id=' + id
        })
        if (data.ok) {
            let response = await data.text();
            try {
                respuesta = JSON.parse(response);

            } catch (error) {
                console.error(error);
                console.log(response);
            }
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Hubo conflicto al eliminar usuario, comuniquese con el area de soporte',
            })
        }
        return respuesta;
    }
    $(document).on('click', '.remove', (e) => {
        let elemento = $(this)[0].activeElement;
        let id = $(elemento).attr('id');
        let nombres = $(elemento).attr('nombres');
        let apellidos = $(elemento).attr('apellidos');
        let email = $(elemento).attr('email');
        let telefono = $(elemento).attr('telefono');
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger mr-2'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: '¿Deseas eliminar el usuario ' + nombres + ' ' + apellidos + '?',
            text: "¡No podras revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-check"></i>',
            cancelButtonText: '<i class="fas fa-times"></i>',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                eliminar_usuario(id).then(respuesta => {
                    if (respuesta.mensaje == 'success') {
                        swalWithBootstrapButtons.fire(
                            '¡Borrado!',
                            'El usuario ' + nombres + ' ' + apellidos + ' fue borrado',
                            'success'
                        )
                        read_all_usuarios();
                    }
                });
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelado',
                    'No se borro el usuario',
                    'error'
                )
            }
        })
    });
})
let espanol = {
    "processing": "Procesando...",
    "lengthMenu": "Mostrar _MENU_ registros",
    "zeroRecords": "No se encontraron resultados",
    "emptyTable": "Ningún dato disponible en esta tabla",
    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
    "search": "Buscar:",
    "infoThousands": ",",
    "loadingRecords": "Cargando...",
    "paginate": {
        "first": "Primero",
        "last": "Último",
        "next": "Siguiente",
        "previous": "Anterior"
    },
    "aria": {
        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad",
        "collection": "Colección",
        "colvisRestore": "Restaurar visibilidad",
        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
        "copySuccess": {
            "1": "Copiada 1 fila al portapapeles",
            "_": "Copiadas %ds fila al portapapeles"
        },
        "copyTitle": "Copiar al portapapeles",
        "csv": "CSV",
        "excel": "Excel",
        "pageLength": {
            "-1": "Mostrar todas las filas",
            "_": "Mostrar %d filas"
        },
        "pdf": "PDF",
        "print": "Imprimir",
        "renameState": "Cambiar nombre",
        "updateState": "Actualizar",
        "createState": "Crear Estado",
        "removeAllStates": "Remover Estados",
        "removeState": "Remover",
        "savedStates": "Estados Guardados",
        "stateRestore": "Estado %d"
    },
    "autoFill": {
        "cancel": "Cancelar",
        "fill": "Rellene todas las celdas con <i>%d<\/i>",
        "fillHorizontal": "Rellenar celdas horizontalmente",
        "fillVertical": "Rellenar celdas verticalmentemente"
    },
    "decimal": ",",
    "searchBuilder": {
        "add": "Añadir condición",
        "button": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "clearAll": "Borrar todo",
        "condition": "Condición",
        "conditions": {
            "date": {
                "after": "Despues",
                "before": "Antes",
                "between": "Entre",
                "empty": "Vacío",
                "equals": "Igual a",
                "notBetween": "No entre",
                "notEmpty": "No Vacio",
                "not": "Diferente de"
            },
            "number": {
                "between": "Entre",
                "empty": "Vacio",
                "equals": "Igual a",
                "gt": "Mayor a",
                "gte": "Mayor o igual a",
                "lt": "Menor que",
                "lte": "Menor o igual que",
                "notBetween": "No entre",
                "notEmpty": "No vacío",
                "not": "Diferente de"
            },
            "string": {
                "contains": "Contiene",
                "empty": "Vacío",
                "endsWith": "Termina en",
                "equals": "Igual a",
                "notEmpty": "No Vacio",
                "startsWith": "Empieza con",
                "not": "Diferente de",
                "notContains": "No Contiene",
                "notStartsWith": "No empieza con",
                "notEndsWith": "No termina con"
            },
            "array": {
                "not": "Diferente de",
                "equals": "Igual",
                "empty": "Vacío",
                "contains": "Contiene",
                "notEmpty": "No Vacío",
                "without": "Sin"
            }
        },
        "data": "Data",
        "deleteTitle": "Eliminar regla de filtrado",
        "leftTitle": "Criterios anulados",
        "logicAnd": "Y",
        "logicOr": "O",
        "rightTitle": "Criterios de sangría",
        "title": {
            "0": "Constructor de búsqueda",
            "_": "Constructor de búsqueda (%d)"
        },
        "value": "Valor"
    },
    "searchPanes": {
        "clearMessage": "Borrar todo",
        "collapse": {
            "0": "Paneles de búsqueda",
            "_": "Paneles de búsqueda (%d)"
        },
        "count": "{total}",
        "countFiltered": "{shown} ({total})",
        "emptyPanes": "Sin paneles de búsqueda",
        "loadMessage": "Cargando paneles de búsqueda",
        "title": "Filtros Activos - %d",
        "showMessage": "Mostrar Todo",
        "collapseMessage": "Colapsar Todo"
    },
    "select": {
        "cells": {
            "1": "1 celda seleccionada",
            "_": "%d celdas seleccionadas"
        },
        "columns": {
            "1": "1 columna seleccionada",
            "_": "%d columnas seleccionadas"
        },
        "rows": {
            "1": "1 fila seleccionada",
            "_": "%d filas seleccionadas"
        }
    },
    "thousands": ".",
    "datetime": {
        "previous": "Anterior",
        "next": "Proximo",
        "hours": "Horas",
        "minutes": "Minutos",
        "seconds": "Segundos",
        "unknown": "-",
        "amPm": [
            "AM",
            "PM"
        ],
        "months": {
            "0": "Enero",
            "1": "Febrero",
            "10": "Noviembre",
            "11": "Diciembre",
            "2": "Marzo",
            "3": "Abril",
            "4": "Mayo",
            "5": "Junio",
            "6": "Julio",
            "7": "Agosto",
            "8": "Septiembre",
            "9": "Octubre"
        },
        "weekdays": [
            "Dom",
            "Lun",
            "Mar",
            "Mie",
            "Jue",
            "Vie",
            "Sab"
        ]
    },
    "editor": {
        "close": "Cerrar",
        "create": {
            "button": "Nuevo",
            "title": "Crear Nuevo Registro",
            "submit": "Crear"
        },
        "edit": {
            "button": "Editar",
            "title": "Editar Registro",
            "submit": "Actualizar"
        },
        "remove": {
            "button": "Eliminar",
            "title": "Eliminar Registro",
            "submit": "Eliminar",
            "confirm": {
                "_": "¿Está seguro que desea eliminar %d filas?",
                "1": "¿Está seguro que desea eliminar 1 fila?"
            }
        },
        "error": {
            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
        },
        "multi": {
            "title": "Múltiples Valores",
            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
            "restore": "Deshacer Cambios",
            "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
        }
    },
    "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
    "stateRestore": {
        "creationModal": {
            "button": "Crear",
            "name": "Nombre:",
            "order": "Clasificación",
            "paging": "Paginación",
            "search": "Busqueda",
            "select": "Seleccionar",
            "columns": {
                "search": "Búsqueda de Columna",
                "visible": "Visibilidad de Columna"
            },
            "title": "Crear Nuevo Estado",
            "toggleLabel": "Incluir:"
        },
        "emptyError": "El nombre no puede estar vacio",
        "removeConfirm": "¿Seguro que quiere eliminar este %s?",
        "removeError": "Error al eliminar el registro",
        "removeJoiner": "y",
        "removeSubmit": "Eliminar",
        "renameButton": "Cambiar Nombre",
        "renameLabel": "Nuevo nombre para %s",
        "duplicateError": "Ya existe un Estado con este nombre.",
        "emptyStates": "No hay Estados guardados",
        "removeTitle": "Remover Estado",
        "renameTitle": "Cambiar Nombre Estado"
    }
}; 