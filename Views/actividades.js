$(document).ready(function () {
    bsCustomFileInput.init();
    verificar_sesion();
    read_all_actividades();
    llenar_usuarios();
    llenar_camiones();
    llenar_zonas();
    llenar_usuarios_mod();
    llenar_camiones_mod();
    llenar_zonas_mod();
    $('#id_usuario').select2({
        placeholder: 'Seleccione un trabajador',
        language: {
            noResults: function () {
                return "No hay resultados";
            },
            searching: function () {
                return "Buscando...";
            }
        }
    });
    $('#id_usuario_mod').select2({
        placeholder: 'Seleccione un trabajador',
        language: {
            noResults: function () {
                return "No hay resultados";
            },
            searching: function () {
                return "Buscando...";
            }
        }
    });
    $('#id_camion').select2({
        placeholder: 'Seleccione un camion',
        language: {
            noResults: function () {
                return "No hay resultados";
            },
            searching: function () {
                return "Buscando...";
            }
        }
    });
    $('#id_camion_mod').select2({
        placeholder: 'Seleccione un camion',
        language: {
            noResults: function () {
                return "No hay resultados";
            },
            searching: function () {
                return "Buscando...";
            }
        }
    });
    $('#id_zona').select2({
        placeholder: 'Seleccione una zona',
        language: {
            noResults: function () {
                return "No hay resultados";
            },
            searching: function () {
                return "Buscando...";
            }
        }
    });
    $('#id_zona_mod').select2({
        placeholder: 'Seleccione una zona',
        language: {
            noResults: function () {
                return "No hay resultados";
            },
            searching: function () {
                return "Buscando...";
            }
        }
    });
    function llenar_usuarios() {
        funcion = "llenar_usuarios";
        $.post('../Controllers/UsuarioController.php', { funcion }, (response) => {
            let usuarios = JSON.parse(response);
            let template = '';
            usuarios.forEach(usuario => {
                template += `
                <option value="${usuario.id}">${usuario.nombres} ${usuario.apellidos}</option>
                `;
            });
            $('#id_usuario').html(template);
            $('#id_usuario').val('');
        })
    }
    function llenar_usuarios_mod() {
        funcion = "llenar_usuarios_mod";
        $.post('../Controllers/UsuarioController.php', { funcion }, (response) => {
            let usuarios = JSON.parse(response);
            let template = '';
            usuarios.forEach(usuario => {
                template += `
                <option value="${usuario.id}">${usuario.nombres} ${usuario.apellidos}</option>
                `;
            });
            $('#id_usuario_mod').html(template);
            $('#id_usuario_mod').val('');
        })
    }
    function llenar_zonas() {
        funcion = "llenar_zonas";
        $.post('../Controllers/ZonaController.php', { funcion }, (response) => {
            let zonas = JSON.parse(response);
            let template = '';
            zonas.forEach(zona => {
                template += `
                <option value="${zona.id}">${zona.nombre}</option>
                `;
            });
            $('#id_zona').html(template);
            $('#id_zona').val('');
        })
    }
    function llenar_zonas_mod() {
        funcion = "llenar_zonas_mod";
        $.post('../Controllers/ZonaController.php', { funcion }, (response) => {
            let zonas = JSON.parse(response);
            let template = '';
            zonas.forEach(zona => {
                template += `
                <option value="${zona.id}">${zona.nombre}</option>
                `;
            });
            $('#id_zona_mod').html(template);
            $('#id_zona_mod').val('');
        })
    }
    function llenar_camiones() {
        funcion = "llenar_camiones";
        $.post('../Controllers/CamionController.php', { funcion }, (response) => {
            let camiones = JSON.parse(response);
            let template = '';
            camiones.forEach(camion => {
                template += `
                <option value="${camion.id}">${camion.placa} ${camion.marca}</option>
                `;
            });
            $('#id_camion').html(template);
            $('#id_camion').val('');
        })
    }
    function llenar_camiones_mod() {
        funcion = "llenar_camiones_mod";
        $.post('../Controllers/CamionController.php', { funcion }, (response) => {
            let camiones = JSON.parse(response);
            let template = '';
            camiones.forEach(camion => {
                template += `
                <option value="${camion.id}">${camion.placa} ${camion.marca}</option>
                `;
            });
            $('#id_camion_mod').html(template);
            $('#id_camion_mod').val('');
        })
    }
    function verificar_sesion() {
        funcion = 'verificar_sesion';
        $.post('../Controllers/UsuarioController.php', { funcion }, (response) => {
            if (response != '') {
                let sesion = JSON.parse(response);
                $('#nav_login').hide();
                $('#nav_register').hide();
                $('#usuario_nav').text(sesion.user);
                $('#avatar_nav').attr('src', '../Util/Img/Users/' + sesion.avatar);
                $('#avatar_menu').attr('src', '../Util/Img/Users/' + sesion.avatar);
                $('#usuario_menu').text(sesion.user);
            } else {
                $('#nav_usuario').hide();
                location.href = 'login.php';
            }
        })
    }
    async function read_all_actividades() {
        funcion = "read_all_actividades";
        let data = await fetch('../Controllers/ActividadController.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'funcion=' + funcion
        })
        if (data.ok) {
            let response = await data.text();
            try {
                let actividades = JSON.parse(response);
                $('#actividad').DataTable({
                    data: actividades,
                    "aaSorting": [],
                    "searching": true,
                    "scrollX": false,
                    "autoWidth": false,
                    columns: [
                        { data: "id" },
                        { data: "hora_inicio" },
                        { data: "hora_final" },
                        { data: "id_usuario" },
                        { data: "id_zona" },
                        { data: "id_camion" },
                        {
                            "render": function (data, type, datos, meta) {
                                return `<button id="${datos.id}" hora_inicio="${datos.hora_inicio}" hora_final="${datos.hora_final}" id_usuario="${datos.id_usuario}" id_zona="${datos.id_zona}" id_camion="${datos.id_camion}" class="edit btn btn-info" title="Editar actividad" type="button" data-bs-toggle="modal" data-bs-target="#modal_editar_actividad"><i class="fas fa-pencil-alt"></i></button>
                                    <button id="${datos.id}" hora_inicio="${datos.hora_inicio}" hora_final="${datos.hora_final}" id_usuario="${datos.id_usuario}" id_zona="${datos.id_zona}" id_camion="${datos.id_camion}" class="remove btn btn-danger" title="Eliminar actividad" type="button"><i class="fas fa-trash-alt"></i></button>`
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
    $(document).on('click', '.edit', (e) => {
        $('#form-actividad-mod').trigger('reset');
        let elemento = $(this)[0].activeElement;
        let id = $(elemento).attr('id');
        let hora_inicio = $(elemento).attr('hora_inicio');
        let hora_final = $(elemento).attr('hora_final');
        let id_usuario = $(elemento).attr('id_usuario');
        let id_zona = $(elemento).attr('id_zona');
        let id_camion = $(elemento).attr('id_camion');
        $('#hora_inicio_mod').val(hora_inicio);
        $('#hora_final_mod').val(hora_final);
        $('#id_usuario_mod').val(id_usuario);
        $('#id_zona_mod').val(id_zona);
        $('#id_camion_mod').val(id_camion);
        $('#id_actividad_mod').val(id);
    });
    async function editar_actividad(datos) {
        let data = await fetch('../Controllers/ActividadController.php', {
            method: 'POST',
            body: datos
        })
        if (data.ok) {
            let response = await data.text();
            try {
                let respuesta = JSON.parse(response);
                if (respuesta.mensaje == 'success') {
                    $('#form-actividad-mod').trigger('reset');
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Se ha editado la actividad',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                        read_all_actividades();
                        $('#form-actividad-mod').trigger('reset');
                        $('#modal_editar_actividad').modal('hide');
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
                    text: 'No se pudo crear la actividad, comuniquese con el area de soporte',
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
            let funcion = "editar_actividad";
            let datos = new FormData($('#form-actividad-mod')[0]);
            datos.append('funcion', funcion);
            editar_actividad(datos);
        }
    });
    $('#form-actividad-mod').validate({
        rules: {
            hora_inicio_mod: {
                required: true,
            },
            hora_final_mod: {
                required: true,
            },
            id_usuario_mod: {
                required: true,
            },
            id_zona_mod: {
                required: true,
            },
            id_camion_mod: {
                required: true,
            }
        },
        messages: {
            hora_inicio_mod: {
                required: "Este campo es obligatorio"
            },
            hora_final_mod: {
                required: "Este campo es obligatorio"
            },
            id_usuario_mod: {
                required: "Este campo es obligatorio"
            },
            id_zona_mod: {
                required: "Este campo es obligatorio"
            },
            id_camion_mod: {
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
    async function eliminar_actividad(id) {
        let funcion = "eliminar_actividad";
        let respuesta = '';
        let data = await fetch('../Controllers/ActividadController.php', {
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
                text: 'Hubo conflicto al editar sus datos, comuniquese con el area de soporte',
            })
        }
        return respuesta;
    }
    $(document).on('click', '.remove', (e) => {
        let elemento = $(this)[0].activeElement;
        let id = $(elemento).attr('id');
        let hora_inicio = $(elemento).attr('hora_inicio');
        let hora_final = $(elemento).attr('hora_final');
        let id_usuario = $(elemento).attr('id_usuario');
        let id_zona = $(elemento).attr('id_zona');
        let id_camion = $(elemento).attr('id_camion');

        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger mr-2'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: '¿Deseas eliminar la actividad ' + id + '?',
            text: "¡No podras revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: '<i class="fas fa-check"></i>',
            cancelButtonText: '<i class="fas fa-times"></i>',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                eliminar_actividad(id).then(respuesta => {
                    if (respuesta.mensaje == 'success') {
                        swalWithBootstrapButtons.fire(
                            '¡Borrado!',
                            'La actividad ' + id + ' fue borrado',
                            'success'
                        )
                        read_all_actividades();
                    }
                });
            } else if (
                result.dismiss === Swal.DismissReason.cancel
            ) {
                swalWithBootstrapButtons.fire(
                    'Cancelado',
                    'No se borro la actividad',
                    'error'
                )
            }
        })
    });
    $('#form-actividad').submit(e => {
        var funcion = 'crear_actividad';
        let hora_inicio = $('#hora_inicio').val();
        let hora_final = $('#hora_final').val();
        let id_usuario = $('#id_usuario').val();
        let id_zona = $('#id_zona').val();
        let id_camion = $('#id_camion').val();
        
        try {
            $.post('../Controllers/ActividadController.php', { hora_inicio, hora_final, id_usuario, id_zona, id_camion, funcion }, (response) => {
                if (response == 'success') {
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Se ha creado la actividad',
                        showConfirmButton: false,
                        timer: 1500
                    }).then(function () {
                        read_all_actividades();
                        $('#form-actividad').trigger('reset');
                    });
                } else {
                    console.log(response);
                    console.log(id_usuario)
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'Hubo conflicto al crear actividad, tarao comuníquese con el área de soporte',
                    });
                }
            });
        } catch (error) {
            console.error(error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Ocurrió un error al enviar la solicitud, consulte la consola para obtener más información',
            });
        }
        
        e.preventDefault();
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