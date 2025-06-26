<?php
/* Template Name: NADA SECRETO */
get_header();
?>

<div class="bg-white">

    <div class="relative  flex justify-center items-center h-96">
        <img class="w-full h-full absolute z-0  object-cover" src="<?php echo get_template_directory_uri(); ?>/assets/images/fondo.jpg" alt="Fondo programación">
  <div class="absolute size-full bg-black/60"></div>
        <p class="z-10 relative  md:!text-6xl !text-2xl  text-gray-100 font-bold">NADA SECRETO</p>
    </div>
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <section class="mb-12">
            <h1 class="font-extrabold text-xl sm:text-2xl leading-tight mb-1 tracking-wide">
                NADA SECRETO
            </h1>
            <p class=" sm:text-sm text-[#2a6ad1] font-semibold mb-6">
                LUNES A VIERNES DE 7 A 9 H
            </p>
            <p class="  mb-2 leading-tight">
                <b>Staff:</b> Producción general y conducción de Mario Otero. En la producción e
                informes especiales, Verónica Miranda. La información judicial Cristina Sosa.
                Desde exteriores participa Gladys Aguilar. La locución es de Leonardo
                Mancuello. El operador técnico es Rodrigo Moraga
            </p>
            <p class="  mb-2 leading-tight">
                <b>Descripción:</b> un programa "típicamente periodístico", en tanto sólo hace
                periodismo. Procura mantener la centralidad de los temas locales, con voces
                plurales, de todos los sectores políticos y sociales. En este sentido ha marcado
                una agenda alternativa a la clásica de los gobiernos. Se caracteriza por las
                entrevistas a los protagonistas de las noticias, con los que invariablemente se
                procura profundizar los temas. Es referencia en la información parlamentaria.
            </p>
            <div class="flex flex-wrap gap-3">
                <a class="flex items-center gap-2 bg-[#3b8a3b] text-white  sm:text-sm font-semibold px-3 py-1 rounded" href="tel:+2664555555">
                    <i class="fab fa-whatsapp">
                    </i>
                    2664555555
                </a>
                <a class="flex items-center gap-2 bg-[#3b5998] text-white  sm:text-sm font-semibold px-3 py-1 rounded" href="https://www.facebook.com/NADASECRETO97.9" rel="noopener noreferrer" target="_blank">
                    <i class="fab fa-facebook-f">
                    </i>
                    Nada Secreto UNSL
                </a>
                <a class="flex items-center gap-2 bg-[#b72f8a] text-white  sm:text-sm font-semibold px-3 py-1 rounded" href="https://www.instagram.com/nadasecretounsl/?hl=es" rel="noopener noreferrer" target="_blank">
                    <i class="fab fa-instagram">
                    </i>
                    nadasecretounsl
                </a>
            </div>
        </section>
        <?php
        mostrar_noticias_por_categoria('nada-secreto');
        mostrar_podcasts_por_categoria('nada-secreto');
        ?>
    </main>

</div>

<?php get_footer(); ?>