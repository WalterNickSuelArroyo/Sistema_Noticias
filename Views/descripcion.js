$(document).ready(function () {
    verificar_sesion();
    verificar_zona();
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
            }
        })
    }
    async function verificar_zona() {
        funcion = "verificar_zona";
        let data = await fetch('../Controllers/ZonaController.php', {
            method: 'POST',
            headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
            body: 'funcion=' + funcion
        })
        if (data.ok) {
            let response = await data.text();
            //console.log(response);
            try {
                let zona = JSON.parse(response);
                console.log(zona);
                let template = '';
                template = `
                    <div class="col-12">
                    <iframe src="${zona.mapa}" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                   </div>
                `;
                $('#mapa').html(template);
                $('#zona').html(zona.nombre);
                $('#tipo').html(zona.tipo);
                $('#dias_Recojo').html(zona.dias_recojo);
                $('#horario_recojo').html(zona.horario_recojo);
                $('#responsable').html(zona.responsable);
                $('#estado').html(zona.estado);
                $('#zona-desc').text(zona.descripcion);
                let template2 = '';
                let cont = 0;
                cont++;
                template2 =`
                    <tr>
                         <td>${cont}</td>
                        <td>Nombre</td>
                        <td>${zona.nombre}</td>
                    </tr>
                    <tr>
                         <td>${cont+1}</td>
                        <td>Tipo</td>
                        <td>${zona.tipo}</td>
                    </tr>
                    <tr>
                         <td>${cont+2}</td>
                        <td>Dias de recojo</td>
                        <td>${zona.dias_recojo}</td>
                    </tr>
                    <tr>
                         <td>${cont+3}</td>
                        <td>Horario de recojo</td>
                        <td>${zona.horario_recojo}</td>
                    </tr>
                    <tr>
                         <td>${cont+4}</td>
                        <td>Responsable</td>
                        <td>${zona.responsable}</td>
                    </tr>
                    <tr>
                         <td>${cont+5}</td>
                        <td>Estado</td>
                        <td>${zona.estado}</td>
                    </tr>
                `;
                $('#caracteristicas').html(template2);

            } catch (error) {
                console.error(error);
                console.log(response);
                if (response=='error') {
                    location.href = '../index.php';
                }
            }

        } else {
            Swal.fire({
                icon: 'error',
                title: data.statusText,
                text: 'Hubo conflicto de codigo: ' + data.status,
            })
        }


    }
})
