<?php
include_once 'Views/Layouts/header.php';
?>
<title>Home | NoticiasWeb</title>
<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1>Noticias Web</h1>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

<style>
  .content {
    display: flex;
    flex-wrap: wrap;
  }

  .card {
    flex-basis: 50%;
    /* Los divs .card ocupan el 50% del ancho del contenedor */
    display: flex;
    flex-wrap: wrap;
  }

  .card-body {
    flex-basis: 50%;
  }

  .parrafo_noticia {
    flex-basis: 50%;
  }

  .titulo_noticia {
    font-weight: 800;
    font-size: 30px;
  }

  .parrafo_noticia {
    padding: 25px;
    text-align: justify;
  }
</style>

<section class="content">
  <div class="card">
    <div class="card-body">
      <img src="Util/Img/futbol.jpg" width="300px">
      <p class="titulo_noticia">Noticias de Deportes</p>
    </div>
    <div class="parrafo_noticia">
      <p>Descubre las últimas novedades en el mundo del deporte, desde emocionantes partidos de fútbol y baloncesto hasta eventos deportivos de clase mundial. Mantente al tanto de las noticias sobre tus equipos favoritos, destacados atletas y análisis de los momentos más impactantes en el deporte mundial. ¡Prepárate para vivir la pasión y la adrenalina del deporte como nunca antes!
      </p>
      <a href="Views/noticias.php">Mas noticias...</a>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <img src="Util/Img/paisaje.jpg" width="300px">
      <p class="titulo_noticia">Noticias de Viajes</p>
    </div>
    <div class="parrafo_noticia">
      <p>Embárcate en una emocionante aventura por los destinos más asombrosos del mundo. Explora exóticas playas de arena blanca, majestuosas montañas cubiertas de nieve y ciudades llenas de historia y cultura. Descubre consejos útiles para planificar tu próximo viaje, reseñas de hoteles y restaurantes, y las mejores actividades para vivir experiencias inolvidables en tus escapadas. ¡Viaja, descubre y crea recuerdos inolvidables!
      </p>
      <a href="Views/noticias.php">Mas noticias...</a>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <img src="Util/Img/tecnologia.jpg" width="300px">
      <p class="titulo_noticia">Noticias de Tecnologia</p>
    </div>
    <div class="parrafo_noticia">
      <p>Sumérgete en el fascinante mundo de la tecnología y la innovación. Conoce las últimas tendencias en dispositivos electrónicos, avances en inteligencia artificial, noticias sobre compañías líderes en el sector y desarrollos tecnológicos que están transformando nuestras vidas. Explora reseñas de productos y consejos para sacar el máximo provecho de tus gadgets. ¡Mantente al día con la vanguardia tecnológica y sorpréndete con el futuro!
      </p>
      <a href="Views/noticias.php">Mas noticias...</a>
    </div>
  </div>
  <div class="card">
    <div class="card-body">
      <img src="Util/Img/politica.jpg" width="300px">
      <p class="titulo_noticia">Noticias de Politica</p>
    </div>
    <div class="parrafo_noticia">
      <p>Infórmate sobre los acontecimientos políticos más relevantes a nivel local e internacional. Obtén análisis y cobertura detallada sobre las decisiones de gobierno, elecciones, debates y temas clave que afectan a nuestra sociedad. Conoce las posturas de los líderes políticos y los cambios en las políticas públicas que moldean el curso de la historia. ¡Comprende el panorama político y mantente informado para tomar decisiones fundamentadas!
      </p>
      <a href="Views/noticias.php">Mas noticias...</a>
    </div>
  </div>
</section>
<script src="https://unpkg.com/@popperjs/core@2.10.1/dist/umd/popper.min.js"></script>
<?php
include_once 'Views/Layouts/footer.php';
?>
<script src="index.js"></script>