<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="En 1.989 el rector de la Universidad Nacional de San Luis licenciado Alberto Puchmüller, impulsa la conformación de un grupo de trabajo, para que se aboque al análisis de factibilidad para la puesta en marcha de una radio de frecuencia modulada en la ciudad de San Luis y otra en Villa Mercedes. La comisión elabora el correspondiente anteproyecto de creación de las dos radios universitarias. A solicitud del Sr. Rector, el Poder Ejecutivo Nacional a través del decreto 482/89, autoriza a la Universidad Nacional de San Luis para que instale y opere dos servicios de modulación de frecuencia en las ciudades de San Luis y Villa Mercedes. Sobre la base del anteproyecto y de la autorización de Presidencia de la Nación, el Consejo Superior de la Universidad Nacional de San Luis aprueba la ordenanza 15/1.989, en donde ordena la creación en el ámbito de la U.N.S.L., de dos servicios de radiodifusión sonora con modulación de frecuencia">
  



    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


    <?php
    wp_head();
    ?>

</head>

<body id="fuente" class="bg-[#282828]">

    <!--div class="hidden" id="loader">
        <div class="flex items-center justify-center h-screen">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/loader.gif" alt="Cargando..." />
        </div>
    </div-->


    <?php
    if (is_single()) {
        $namespace = 'single';
    } elseif (is_page('programacion')) {
        $namespace = 'page-programacion';
    } elseif (is_page('noticias')) {
        $namespace = 'page-noticias';
    } elseif (is_home()) {
        $namespace = 'front-page';
    } else {
        $namespace = 'default';
    }
    ?>





            <div class="z-50 w-full fixed" id="navbar">
                <nav class="border-gray-200 relative" id="bg-res">
                    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center">

                            <img class="h-20 hidden md:block" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo2.png" alt="LOGO RADIO UNSL" />
                            <img class="h-20 md:hidden block" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo2m.png" alt="LOGO RADIO UNSL" />


                        </a>
                        <div class="flex md:order-2">

                           

                            <div class="relative hidden md:flex flex gap-5 items-center">
                                <div class="rounded-lg  bg-red-500 text-white p-1 w-full" style="max-width:130px;">

                                    <button type="submit" onclick="togglePlay()" class="flex gap-3 items-center">
                                        <img src="https://i.giphy.com/media/R9vSQdiH6I5Bqi9xzx/giphy.webp" alt="" style="width:7px;"> Radio en vivo
                                    </button>
                                </div>

                                <div class="absolute inset-y-0 right-0 flex items-center pr-3 ">

                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>


                                    <span class="sr-only">Search icon</span>
                                </div>

                                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                                    <input type="search" id="search-navbar-2" name="s" class="block w-full pr-5  text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="¿Qué estás buscando?" style="padding-right: 35px;
    margin-right: 6px;" />

                                </form>
                            </div>
                            <button data-collapse-toggle="navbar-search" type="button" onclick="logostr()" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-search" aria-expanded="false">
                                <span class="sr-only">Open main menu</span>
                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15" />
                                </svg>
                            </button>
                        </div>






                        <div class="md:hidden items-center justify-between hidden w-full md:flex md:w-auto md:order-1" id="navbar-search">
                            <div class="relative mt-3 md:hidden">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                    </svg>
                                </div>
                                <form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                                    <input type="text" id="search-navbar" name="s" class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="¿Qué estás buscando?" />

                                </form>
                            </div>



                            <ul class="flex flex-col p-4 md:p-0 mt-4 font-medium md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 dark:border-gray-700">




                                <li id="menusmobile" class="rounded md:bg-transparent  md:p-0 md:dark:text-blue-500 hover:bg-gray-100 md:hover:bg-transparent hover:text-blue-900 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                    <a href="<?php echo esc_url(home_url('/')); ?>" class="block py-2 pl-3 pr-4 text-white text-white rounded hover:bg-gray-100 md:hover:bg-transparent hover:text-blue-900 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                        <div class="flex items-center gap-3">

                                            <svg class="svgs" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                                <path d="M575.8 255.5c0 18-15 32.1-32 32.1h-32l.7 160.2c0 2.7-.2 5.4-.5 8.1V472c0 22.1-17.9 40-40 40H456c-1.1 0-2.2 0-3.3-.1c-1.4 .1-2.8 .1-4.2 .1H416 392c-22.1 0-40-17.9-40-40V448 384c0-17.7-14.3-32-32-32H256c-17.7 0-32 14.3-32 32v64 24c0 22.1-17.9 40-40 40H160 128.1c-1.5 0-3-.1-4.5-.2c-1.2 .1-2.4 .2-3.6 .2H104c-22.1 0-40-17.9-40-40V360c0-.9 0-1.9 .1-2.8V287.6H32c-18 0-32-14-32-32.1c0-9 3-17 10-24L266.4 8c7-7 15-8 22-8s15 2 21 7L564.8 231.5c8 7 12 15 11 24z" />
                                            </svg>

                                            <p>Inicio</p>
                                        </div>
                                    </a>
                                </li>
                                <li id="menusmobile" class="rounded md:bg-transparent  md:p-0 md:dark:text-blue-500 hover:bg-gray-100 md:hover:bg-transparent hover:text-blue-900 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                    <a href="<?php echo esc_url(home_url('/noticias')); ?>" class="block py-2 pl-3 pr-4 text-white text-white rounded hover:bg-gray-100 md:hover:bg-transparent hover:text-blue-900 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                        <div class="flex items-center gap-3">

                                            <svg class="svgs" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 576 512">
                                                <path d="M249.6 471.5c10.8 3.8 22.4-4.1 22.4-15.5V78.6c0-4.2-1.6-8.4-5-11C247.4 52 202.4 32 144 32C93.5 32 46.3 45.3 18.1 56.1C6.8 60.5 0 71.7 0 83.8V454.1c0 11.9 12.8 20.2 24.1 16.5C55.6 460.1 105.5 448 144 448c33.9 0 79 14 105.6 23.5zm76.8 0C353 462 398.1 448 432 448c38.5 0 88.4 12.1 119.9 22.6c11.3 3.8 24.1-4.6 24.1-16.5V83.8c0-12.1-6.8-23.3-18.1-27.6C529.7 45.3 482.5 32 432 32c-58.4 0-103.4 20-123 35.6c-3.3 2.6-5 6.8-5 11V456c0 11.4 11.7 19.3 22.4 15.5z" />
                                            </svg>

                                            <p> Noticias</p>
                                        </div>
                                    </a>
                                </li>
                                <li id="menusmobile" class="rounded md:bg-transparent  md:p-0 md:dark:text-blue-500 hover:bg-gray-100 md:hover:bg-transparent hover:text-blue-900 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                    <a href="<?php echo esc_url(home_url('/podcasts')); ?>" class="block py-2 pl-3 pr-4 text-white text-white rounded hover:bg-gray-100 md:hover:bg-transparent hover:text-blue-900 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                        <div class="flex items-center gap-3">
                                            <svg class="svgs" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                                <path d="M0 256a256 256 0 1 1 512 0A256 256 0 1 1 0 256zM188.3 147.1c-7.6 4.2-12.3 12.3-12.3 20.9V344c0 8.7 4.7 16.7 12.3 20.9s16.8 4.1 24.3-.5l144-88c7.1-4.4 11.5-12.1 11.5-20.5s-4.4-16.1-11.5-20.5l-144-88c-7.4-4.5-16.7-4.7-24.3-.5z" />
                                            </svg>
                                            <p> Podcasts</p>
                                        </div>
                                    </a>
                                </li>
                                <li id="menusmobile" class="rounded md:bg-transparent  md:p-0 md:dark:text-blue-500 hover:bg-gray-100 md:hover:bg-transparent hover:text-blue-900 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                    <a href="<?php echo esc_url(home_url('/programacion')); ?>" class="block py-2 pl-3 pr-4 text-white text-white rounded hover:bg-gray-100 md:hover:bg-transparent hover:text-blue-900 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                        <div class="flex items-center gap-3">
                                            <svg class="svgs" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                                <path d="M494.8 47c12.7-3.7 20-17.1 16.3-29.8S494-2.8 481.2 1L51.7 126.9c-9.4 2.7-17.9 7.3-25.1 13.2C10.5 151.7 0 170.6 0 192v4V304 448c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V192c0-35.3-28.7-64-64-64H218.5L494.8 47zM368 240a80 80 0 1 1 0 160 80 80 0 1 1 0-160zM80 256c0-8.8 7.2-16 16-16h96c8.8 0 16 7.2 16 16s-7.2 16-16 16H96c-8.8 0-16-7.2-16-16zM64 320c0-8.8 7.2-16 16-16H208c8.8 0 16 7.2 16 16s-7.2 16-16 16H80c-8.8 0-16-7.2-16-16zm16 64c0-8.8 7.2-16 16-16h96c8.8 0 16 7.2 16 16s-7.2 16-16 16H96c-8.8 0-16-7.2-16-16z" />
                                            </svg>
                                            <p>Programación</p>
                                        </div>
                                    </a>
                                </li>
                                <li id="menusmobile" class="rounded md:bg-transparent  md:p-0 md:dark:text-blue-500 hover:bg-gray-100 md:hover:bg-transparent hover:text-blue-900 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                    <a href="<?php echo esc_url(home_url('/institucional')); ?>" class="block py-2 pl-3 pr-4 text-white text-white rounded hover:bg-gray-100 md:hover:bg-transparent hover:text-blue-900 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                        <div class="flex items-center gap-3">
                                            <svg class="svgs" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 384 512">
                                                <path d="M0 48V487.7C0 501.1 10.9 512 24.3 512c5 0 9.9-1.5 14-4.4L192 400 345.7 507.6c4.1 2.9 9 4.4 14 4.4c13.4 0 24.3-10.9 24.3-24.3V48c0-26.5-21.5-48-48-48H48C21.5 0 0 21.5 0 48z" />
                                            </svg>

                                            <p>Institucional</p>



                                        </div>
                                    </a>
                                </li>
                                <li id="menusmobile" class="rounded md:bg-transparent  md:p-0 md:dark:text-blue-500 hover:bg-gray-100 md:hover:bg-transparent hover:text-blue-900 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                    <a href="<?php echo esc_url(home_url('/contacto')); ?>" class="block py-2 pl-3 pr-4 text-white text-white rounded hover:bg-gray-100 md:hover:bg-transparent hover:text-blue-900 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">
                                        <div class="flex items-center gap-3">
                                            <svg class="svgs" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512">
                                                <path d="M48 64C21.5 64 0 85.5 0 112c0 15.1 7.1 29.3 19.2 38.4L236.8 313.6c11.4 8.5 27 8.5 38.4 0L492.8 150.4c12.1-9.1 19.2-23.3 19.2-38.4c0-26.5-21.5-48-48-48H48zM0 176V384c0 35.3 28.7 64 64 64H448c35.3 0 64-28.7 64-64V176L294.4 339.2c-22.8 17.1-54 17.1-76.8 0L0 176z" />
                                            </svg>
                                            <p>Contacto</p>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <div class="md:hidden flex justify-between items-center" style="background-color: #282828;">
                    <a href="https://wa.me/+542664361329" target="_blank" class="block py-2 pl-3 pr-4 text-white text-white rounded    md:p-0 dark:text-white  dark:border-gray-700">
                        <div class="flex items-center gap-3">
                            <div>
                                <svg id="mediasvgs" xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                                    <path d="M380.9 97.1C339 55.1 283.2 32 223.9 32c-122.4 0-222 99.6-222 222 0 39.1 10.2 77.3 29.6 111L0 480l117.7-30.9c32.4 17.7 68.9 27 106.1 27h.1c122.3 0 224.1-99.6 224.1-222 0-59.3-25.2-115-67.1-157zm-157 341.6c-33.2 0-65.7-8.9-94-25.7l-6.7-4-69.8 18.3L72 359.2l-4.4-7c-18.5-29.4-28.2-63.3-28.2-98.2 0-101.7 82.8-184.5 184.6-184.5 49.3 0 95.6 19.2 130.4 54.1 34.8 34.9 56.2 81.2 56.1 130.5 0 101.8-84.9 184.6-186.6 184.6zm101.2-138.2c-5.5-2.8-32.8-16.2-37.9-18-5.1-1.9-8.8-2.8-12.5 2.8-3.7 5.6-14.3 18-17.6 21.8-3.2 3.7-6.5 4.2-12 1.4-32.6-16.3-54-29.1-75.5-66-5.7-9.8 5.7-9.1 16.3-30.3 1.8-3.7.9-6.9-.5-9.7-1.4-2.8-12.5-30.1-17.1-41.2-4.5-10.8-9.1-9.3-12.5-9.5-3.2-.2-6.9-.2-10.6-.2-3.7 0-9.7 1.4-14.8 6.9-5.1 5.6-19.4 19-19.4 46.3 0 27.3 19.9 53.7 22.6 57.4 2.8 3.7 39.1 59.7 94.8 83.8 35.2 15.2 49 16.5 66.6 13.9 10.7-1.6 32.8-13.4 37.4-26.4 4.6-13 4.6-24.1 3.2-26.4-1.3-2.5-5-3.9-10.5-6.6z" />
                                </svg>
                            </div>
                            <p> +542664361329</p>
                        </div>
                    </a>
                    <div>
                        <ul class="flex gap-3 text-white px-3  items-center" style="flex-wrap:wrap;">
                            <li><a href="https://www.facebook.com/unslradio/?locale=es_LA" target="_blank"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="10.0003" cy="9.99996" r="8.33333" fill="#FAFAFA" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M12.2149 7.06571C11.9552 7.01377 11.6044 6.97496 11.3838 6.97496C10.7865 6.97496 10.7476 7.23468 10.7476 7.65024V8.38999H12.2409L12.1107 9.92235H10.7476V14.5833H8.87796V9.92235H7.91699V8.38999H8.87796V7.44215C8.87796 6.14385 9.48816 5.41663 11.0202 5.41663C11.5525 5.41663 11.9421 5.49454 12.4484 5.59843L12.2149 7.06571Z" fill="#282828" />
                                    </svg>
                                </a></li>
                            <li><a href="https://www.instagram.com/unslradio/?hl=es" target="_blank">
                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="10.0003" cy="9.99996" r="8.33333" fill="#FAFAFA" />
                                        <path d="M10 5.9009C11.3351 5.9009 11.4932 5.906 12.0204 5.93005C12.5079 5.95228 12.7727 6.03374 12.9489 6.10221C13.1822 6.19291 13.3488 6.30126 13.5238 6.47621C13.6987 6.65119 13.8071 6.81775 13.8978 7.05114C13.9663 7.22732 14.0477 7.49207 14.0699 7.97956C14.094 8.50679 14.0991 8.66493 14.0991 9.99997C14.0991 11.335 14.094 11.4932 14.0699 12.0204C14.0477 12.5079 13.9663 12.7726 13.8978 12.9488C13.8071 13.1822 13.6987 13.3488 13.5238 13.5237C13.3488 13.6987 13.1822 13.8071 12.9489 13.8978C12.7727 13.9662 12.5079 14.0477 12.0204 14.0699C11.4933 14.094 11.3352 14.0991 10 14.0991C8.66485 14.0991 8.50674 14.094 7.97957 14.0699C7.49208 14.0477 7.22733 13.9662 7.05114 13.8978C6.81776 13.8071 6.6512 13.6987 6.47624 13.5237C6.30128 13.3488 6.19292 13.1822 6.10221 12.9488C6.03374 12.7726 5.95228 12.5079 5.93006 12.0204C5.906 11.4932 5.9009 11.335 5.9009 9.99997C5.9009 8.66493 5.906 8.50679 5.93006 7.97956C5.95228 7.49207 6.03374 7.22732 6.10221 7.05114C6.19292 6.81775 6.30126 6.65119 6.47624 6.47623C6.6512 6.30126 6.81776 6.19291 7.05114 6.10221C7.22733 6.03374 7.49208 5.95228 7.97957 5.93005C8.5068 5.906 8.66495 5.9009 10 5.9009ZM10 5C8.64208 5 8.47181 5.00576 7.93851 5.03009C7.40631 5.05436 7.04285 5.13889 6.72481 5.26248C6.39602 5.39026 6.11718 5.56123 5.83919 5.83919C5.56123 6.11717 5.39026 6.39601 5.2625 6.7248C5.13889 7.04284 5.05436 7.40631 5.03009 7.9385C5.00576 8.4718 5 8.64207 5 9.99997C5 11.3579 5.00576 11.5282 5.03009 12.0615C5.05436 12.5937 5.13889 12.9571 5.2625 13.2752C5.39026 13.604 5.56123 13.8828 5.83919 14.1608C6.11718 14.4387 6.39602 14.6097 6.72481 14.7375C7.04285 14.8611 7.40631 14.9456 7.93851 14.9699C8.47181 14.9942 8.64208 15 10 15C11.3579 15 11.5282 14.9942 12.0615 14.9699C12.5937 14.9456 12.9572 14.8611 13.2752 14.7375C13.604 14.6097 13.8828 14.4387 14.1608 14.1608C14.4388 13.8828 14.6097 13.604 14.7375 13.2752C14.8611 12.9571 14.9456 12.5937 14.9699 12.0615C14.9942 11.5282 15 11.3579 15 9.99997C15 8.64207 14.9942 8.4718 14.9699 7.9385C14.9456 7.40631 14.8611 7.04284 14.7375 6.7248C14.6097 6.39601 14.4388 6.11717 14.1608 5.83919C13.8828 5.56123 13.604 5.39026 13.2752 5.26248C12.9572 5.13889 12.5937 5.05436 12.0615 5.03009C11.5282 5.00576 11.3579 5 10 5Z" fill="#282828" />
                                        <path d="M10.0021 7.43481C8.5841 7.43481 7.43457 8.58434 7.43457 10.0024C7.43457 11.4204 8.5841 12.5699 10.0021 12.5699C11.4202 12.5699 12.5697 11.4204 12.5697 10.0024C12.5697 8.58434 11.4202 7.43481 10.0021 7.43481ZM10.0021 11.669C9.08166 11.669 8.33547 10.9228 8.33547 10.0024C8.33547 9.0819 9.08166 8.33571 10.0021 8.33571C10.9226 8.33571 11.6688 9.0819 11.6688 10.0024C11.6688 10.9228 10.9226 11.669 10.0021 11.669Z" fill="#282828" />
                                        <path d="M13.2713 7.3317C13.2713 7.66305 13.0027 7.93169 12.6713 7.93169C12.3399 7.93169 12.0713 7.66305 12.0713 7.3317C12.0713 7.00033 12.3399 6.73169 12.6713 6.73169C13.0027 6.73169 13.2713 7.00033 13.2713 7.3317Z" fill="#282828" />
                                    </svg>
                                </a></li>
                            <li><a href="https://www.youtube.com/@radiounslcontenidos" target="_blank">

                                    <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="10.0003" cy="9.99996" r="8.33333" fill="#FAFAFA" />
                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M14.7082 6.8242C14.8745 6.99049 14.9943 7.19744 15.0558 7.42445C15.4095 8.84822 15.3277 11.0968 15.0626 12.5755C15.0012 12.8026 14.8814 13.0095 14.7151 13.1758C14.5488 13.3421 14.3418 13.4619 14.1148 13.5234C13.2838 13.75 9.939 13.75 9.939 13.75C9.939 13.75 6.59422 13.75 5.76318 13.5234C5.53617 13.4619 5.32921 13.3421 5.16292 13.1758C4.99663 13.0095 4.8768 12.8026 4.81537 12.5755C4.45961 11.158 4.55713 8.90797 4.80851 7.43132C4.86993 7.20431 4.98976 6.99735 5.15605 6.83106C5.32234 6.66477 5.5293 6.54494 5.75631 6.48352C6.58735 6.25687 9.93213 6.25 9.93213 6.25C9.93213 6.25 13.2769 6.25 14.108 6.47665C14.335 6.53808 14.5419 6.6579 14.7082 6.8242ZM11.6423 10L8.86757 11.6071V8.39285L11.6423 10Z" fill="#282828" />
                                    </svg>
                                </a></li>
                            <li class="header-idioma"></li>
                        </ul>
                    </div>
                </div>
                <style>
                    #letras {
                        transition: opacity 0.3s;
                    }

                    #mobilelogo {
                        -webkit-transition: all 0.5s cubic-bezier(.53, -0.01, .52, 1);
                        -moz-transition: all 0.5s cubic-bezier(.53, -0.01, .52, 1);
                        -ms-transition: all 0.5s cubic-bezier(.53, -0.01, .52, 1);
                        -o-transition: all 0.5s cubic-bezier(.53, -0.01, .52, 1);
                        transition: all 0.5s cubic-bezier(.53, -0.01, .52, 1);
                    }
                </style>
                <script>
                    let activado = false;

                    function logostr() {
                        if (activado) {
                            $("#mobilelogo").css({
                                left: "calc(50% - 58px)"
                            });
                            $("#letras").css({
                                opacity: "1"
                            });
                        } else {
                            $("#mobilelogo").css({
                                transform: "translateX(0)"
                            })
                            $("#mobilelogo").css({
                                left: "15px"
                            });
                            $("#letras").css({
                                opacity: "0"
                            });
                        }
                        activado = !activado;
                    }
                </script>
                <nav style="background-color: #486faf;box-shadow: 0px 5px 5px 0px rgba(0,0,0,0.1); " class="hidden md:block  z-50">
                    <div class="max-w-screen-xl px-4 py-3 mx-auto">
                        <div class="flex items-center justify-between">
                            <?php

                            ?>
                            <ul class="flex flex-row font-medium mt-0 mr-6 space-x-8 text-sm ">
                                <li>
                                    <a href="<?php echo esc_url(home_url('/')); ?>" class="text-white">Inicio</a>
                                </li>
                                <li>
                                    <a href="<?php echo esc_url(home_url('/noticias')); ?>" class="text-white  ">Noticias</a>
                                </li>
                                <li>
                                    <a href="<?php echo esc_url(home_url('/podcasts')); ?>" class="text-white  ">Podcasts</a>
                                </li>
                                <li>
                                    <a href="<?php echo esc_url(home_url('/programacion')); ?>" class="text-white  ">Programación</a>
                                </li>
                                <li>
                                    <a href="<?php echo esc_url(home_url('/institucional')); ?>" class="text-white  ">Institucional</a>
                                </li>
                                <li>
                                    <a href="<?php echo esc_url(home_url('/contacto')); ?>" class="text-white  ">Contacto</a>
                                </li>
                            </ul>

                            <ul class="flex gap-3 text-gray-400 items-center">
                                <a href="https://www.facebook.com/unslradio/?locale=es_LA" target="_blank">
                                    <li><img width="18px" src="https://upload.wikimedia.org/wikipedia/commons/b/b8/2021_Facebook_icon.svg" alt="">
                                    </li>
                                </a>
                                <a href="https://www.instagram.com/unslradio/?hl=es" target="_blank">
                                    <li><img width="18px" src="https://cdn3.iconfinder.com/data/icons/2018-social-media-logotypes/1000/2018_social_media_popular_app_logo_instagram-512.png" alt=""></li>
                                </a>
                                <a href="https://www.youtube.com/@radiounslcontenidos" target="_blank">
                                    <li><img width="18px" src="https://freelogopng.com/images/all_img/1656501968youtube-icon-png.png" alt="">
                                    </li>
                                </a>
                                <li class="header-idioma"></li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>

    <div id="barba-wrapper" data-barba="wrapper">
        <div class="barba-container"
            data-barba="container"
            data-barba-namespace="<?= $namespace ?>">



            <div class="w-full" id="relleno" style="background: rgb(7,55,106);
    background: linear-gradient(180deg, rgba(7,55,106,1) 0%, rgba(0,0,0,1) 100%);"></div>

            <style>
                .header-idioma {
                    padding: 2px;
                    width: 35px;
                    height: 35px;
                }

                .gglobe {
                    width: 100%;
                    height: 100%;
                }



                #relleno {
                    height: 155px;
                }

                @media screen and (max-width:766px) {

                    .notranslate>span {
                        display: none;
                    }

                    #relleno {
                        height: 150px;
                    }

                }
            </style>