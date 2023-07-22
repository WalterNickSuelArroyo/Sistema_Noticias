$(document).ready(function () {
    bsCustomFileInput.init();
    verificar_sesion();
    llenar_noticias();
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
    async function llenar_noticias(){
        funcion = "llenar_noticias";
        let data = await fetch('../Controllers/NoticiaController.php',{
            method:'POST',
            headers:{'Content-Type':'application/x-www-form-urlencoded'},
            body:'funcion=' + funcion
        })
        if (data.ok) {
            let response=await data.text();
            try {
                let noticias = JSON.parse(response);
                //console.log(noticias);
                let template=``;
                noticias.forEach(noticia => {
                    template+=`
                    <div class="col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 text-center">
                                        <img src="../Util/Img/noticias/${noticia.imagen}" class="img-fluid">
                                    </div>
                                    <div class="col-sm-12">
                                        <span class="text-muted float-left">${noticia.titulo}</span><br>
                                        <span>${noticia.texto}</span><br>
                                        <span>Fecha de publicacion: ${noticia.fecha}</span><br>
                                        <span>Autor: ${noticia.id_user} - ${noticia.nombres} ${noticia.apellidos}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    `;
                });
                $('#noticias').html(template);
            } catch (error) {
                console.log(error);
                console.log(response);
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
