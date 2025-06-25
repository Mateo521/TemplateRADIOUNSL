<?php
wp_footer();
?>



<!-- FOOTER -->

<div class="marquee-wrapper" aria-label="Clima actual de ciudades">
    <div class="marquee-content" id="marquee"></div>
</div>



<div class="footer">
    <footer id="footer">



        <div class="grid md:grid-cols-4 w-full max-w-screen-xl p-4">
            <div class="p-2">
                <p class="pb-8"> INFORMACIÓN INSTITUCIONAL</p>

                <img width="200" height="60" class="footer-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/unsl.png" alt="">
                <p class="py-3">Teléfono: +54(0266) 4520300</p>
                <p>Dirección: Ejército de Los Andes 950, <br> San Luis, Argentina</p>
            </div>
            <div class="p-2">
                <p class="pb-8"> CONTACTO</p>
                <div class="w-full">
                    <img width="200" height="60" class="footer-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo2m.png" alt="">

                </div>
                <p class="py-3">Teléfono:  +542664361329</p>
                <p>Dirección: Ejército de Los Andes 950, <br> San Luis, Argentina</p>
                <p class="py-3">Email: ejemplo@gmail.com</p>
            </div>
            <div class="p-2 md:block flex gap-5 items-center">
                <p class="">REDES SOCIALES</p>
                <ul class="flex gap-3 text-gray-400 items-center md:py-8 ">
                    <a href="https://www.facebook.com/unslradio/?locale=es_LA" target="_blank">
                        <li><img width="35" height="35" src="https://upload.wikimedia.org/wikipedia/commons/b/b8/2021_Facebook_icon.svg" alt="">
                        </li>
                    </a>
                    <a href="https://www.instagram.com/unslradio/?hl=es" target="_blank">
                        <li><img width="35" height="35" src="<?php echo get_template_directory_uri(); ?>/assets/images/Instagram_logo_2016.svg" alt=""></li>
                    </a>
                    <a href="https://www.youtube.com/@radiounslcontenidos" target="_blank">
                        <li><img width="35" height="35" src="https://freelogopng.com/images/all_img/1656501968youtube-icon-png.png" alt=""></li>
                    </a>
                </ul>
            </div>
            <div class="p-2">
                <p class="pb-8">MAPA DE SITIO</p>
                <ul>
                    <li>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="text-white">Inicio</a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/noticias')); ?>" class="text-white  ">Noticias</a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url(home_url('/podcasts')); ?>" class="text-white  ">Podcast</a>
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
            </div>

        </div>
        <hr>

        <p class="px-6" style="font-size:13px;">Diseño y Desarrollo a cargo de la Secretaría de Comunicación Institucional - Versión 1.0-beta - Contacto: <a href="mailto:sci@unsl.edu.ar" style="color:#007bff">sci@unsl.edu.ar</a></p>

    </footer>
</div>










</div> <!-- cierra .barba-container -->
</div> <!-- cierra #barba-wrapper -->




<!-- Main modal -->
<div id="modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative w-full max-w-md max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="modal">
                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                </svg>
                <span class="sr-only">Close modal</span>
            </button>
            <!-- Modal header -->
            <div class="px-6 py-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-base font-semibold text-gray-900 lg:text-xl dark:text-white">
                    Compartir vínculo:
                </h3>
            </div>
            <!-- Modal body -->
            <div class="p-6">
                <p id="prog" class="text-sm font-normal text-gray-500 dark:text-gray-400"></p>
                <ul id="social-share" class="my-4 space-y-3">
                    <li>
                        <a target="_blank" href="https://wa.me/?text=radiouniversidad.unsl.edu.ar" data-action="share/whatsapp/share" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <img class="h-5" src="<?php echo get_template_directory_uri(); ?>/assets/images/WhatsApp.svg" />

                            <span class="flex-1 ml-3 whitespace-nowrap">Whatsapp</span>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="https://facebook.com/sharer/sharer.php?u=radiouniversidad.unsl.edu.ar" rel="noopener noreferrer" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <img class="h-4" src="<?php echo get_template_directory_uri(); ?>/assets/images/2021_Facebook_icon.svg.png" />

                            <span class="flex-1 ml-3 whitespace-nowrap">Facebook</span>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/intent/tweet?text=radiouniversidad.unsl.edu.ar" rel="noopener noreferrer" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <img class="h-4" src="<?php echo get_template_directory_uri(); ?>/assets/images/Twitter-X-New-Logo-Vector-2.png" />
                            <span class="flex-1 ml-3 whitespace-nowrap">X</span>
                        </a>
                    </li>
                    <li>
                        <a href="mailto:?Título&body=Contenido:%20[radiouniversidad.unsl.edu.ar]" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <img class="h-5" src="<?php echo get_template_directory_uri(); ?>/assets/images/Circle-icons-mail.svg" />
                            <span class="flex-1 ml-3 whitespace-nowrap">Correo</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>



<!-- FINFOOTER -->
<!-- SECCION RADIO -->
<div class="w-full block" style="height: 115px; background-color:#282828;"></div>
<!--REPRODUCTOR MOBILE-->
<div id="radio" class="w-full  md:hidden fixed flex bottom-0 z-30" style=" background: rgb(249,250,251);
background: linear-gradient(0deg, rgba(249,250,251,0.9) 30%, rgba(212,212,212,0.9) 100%);">
    <div data-accordion="collapse2" id="accordion-collapse2">
        <h2 class="accordion-collapse-heading-4 ">
            <button class="absolute flex gap-3 items-center rounded-tl-xl" data-accordion-target="#accordion-collapse-body-4" aria-expanded="false" aria-controls="accordion-collapse-body-4" style="right:0; top:-53px; padding:15px 20px; background: linear-gradient(180deg, rgba(249, 250, 251, 0.9) 30%, rgba(212, 212, 212, 0.9) 100%);" type="button" onclick="displayfooter();" value="">
                REPRODUCTOR<svg data-accordion-icon="" class="w-3 h-3 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"></path>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-4"></div>
    </div>
    <div class="flex justify-between w-full">
        <div class="m-2 flex justify-between w-full ">
            <div class="p-1 text-sm rounded-lg text-white flex items-center gap-1 inline-flex h-5" style="background-color:  #486faf;"><img src="https://i.giphy.com/media/R9vSQdiH6I5Bqi9xzx/giphy.webp" alt="" style="width:7px;"> En
                vivo</div>

            <div class="flex flex-col items-center pb-3">
                <img id="radio-imagen2" src="" alt="" class="rounded-lg h-full" style="width:85px;">
                <div id="loading-2">
                    <span class="loader"></span>
                </div>
                <p class="m-0 p-0" id="open_close-2"></p>
            </div>
        </div>
    </div>
    <div id="radio" class="container-4 md:hidden absolute flex justify-center w-full items-center md:gap-5 gap-1" style="left:-49px;">
        <label class=" md:hidden flex">
           <input type="range" id="vol-mobile" min="0" max="1" value="1" step="0.01" style="background-color:inherit;" />   <!-- 
        <span id="display1">
            100
        </span>
         -->
        </label>



        <button class="btn play-pause">
            <div class="icon-container">
                <svg class="icon play" id="playbutton-5">
                    <use xlink:href="#play"></use>
                </svg>
            </div>
            <div class="icon-container">
                <svg class="icon pause" id="stopbutton-5">
                    <use xlink:href="#pause"></use>
                </svg>
            </div>
        </button>




        <button type="button" data-modal-target="modal" data-modal-toggle="modal">
            <svg class="px-1" width="35" height="35" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 20C14.1667 20 13.4583 19.7083 12.875 19.125C12.2917 18.5417 12 17.8333 12 17C12 16.8833 12.0083 16.7623 12.025 16.637C12.0417 16.5123 12.0667 16.4 12.1 16.3L5.05 12.2C4.76667 12.45 4.45 12.6457 4.1 12.787C3.75 12.929 3.38333 13 3 13C2.16667 13 1.45833 12.7083 0.875 12.125C0.291667 11.5417 0 10.8333 0 10C0 9.16667 0.291667 8.45833 0.875 7.875C1.45833 7.29167 2.16667 7 3 7C3.38333 7 3.75 7.07067 4.1 7.212C4.45 7.354 4.76667 7.55 5.05 7.8L12.1 3.7C12.0667 3.6 12.0417 3.48767 12.025 3.363C12.0083 3.23767 12 3.11667 12 3C12 2.16667 12.2917 1.45833 12.875 0.875C13.4583 0.291667 14.1667 0 15 0C15.8333 0 16.5417 0.291667 17.125 0.875C17.7083 1.45833 18 2.16667 18 3C18 3.83333 17.7083 4.54167 17.125 5.125C16.5417 5.70833 15.8333 6 15 6C14.6167 6 14.25 5.929 13.9 5.787C13.55 5.64567 13.2333 5.45 12.95 5.2L5.9 9.3C5.93333 9.4 5.95833 9.51233 5.975 9.637C5.99167 9.76233 6 9.88333 6 10C6 10.1167 5.99167 10.2373 5.975 10.362C5.95833 10.4873 5.93333 10.6 5.9 10.7L12.95 14.8C13.2333 14.55 13.55 14.354 13.9 14.212C14.25 14.0707 14.6167 14 15 14C15.8333 14 16.5417 14.2917 17.125 14.875C17.7083 15.4583 18 16.1667 18 17C18 17.8333 17.7083 18.5417 17.125 19.125C16.5417 19.7083 15.8333 20 15 20Z" fill="#282828" />
            </svg>
        </button>
    </div>
</div>
<!--

 REPRODUCTOR ESCRITORIO-->
<div id="seccion-radio" class="z-30 w-full fixed" style="background: rgb(249,250,251);
background: linear-gradient(0deg, rgba(249,250,251,0.9) 30%, rgba(212,212,212,0.9) 100%);">
    <div data-accordion="collapse" id="accordion-collapse">
        <h2 class="accordion-collapse-heading-3">
            <button class="absolute md:flex cursor-pointer hidden flex gap-3 rounded-tl-xl items-center" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3" style="right:0; top:-53px; padding:15px 20px; background: linear-gradient(180deg, rgba(249, 250, 251, 0.9) 30%, rgba(212, 212, 212, 0.9) 100%);" type="submit" onclick="displayfooter();" value="prueba">
                REPRODUCTOR
                <svg data-accordion-icon="" class="w-3 h-3 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"></path>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-3"></div>
    </div>

    <div class=" w-full hidden md:flex" id="radio-3">

        <img class="h-[116px] w-[200px]" id="radio-imagen" src="" alt="">
        <div id="loading">
            <span class="loader"></span>
        </div>
        <div class="flex justify-between w-full">
            <div class="m-4">
                <div class="p-1 text-sm rounded-lg text-white flex items-center gap-1 inline-flex" style="background-color:  #486faf;"><img src="https://i.giphy.com/media/R9vSQdiH6I5Bqi9xzx/giphy.webp" alt="" style="width:7px;"> En
                    vivo</div>
                <p class="font-bold py-4" id="open_close"></p>
            </div>
        </div>
    </div>
    <div class="container-4 hidden absolute md:flex justify-center w-full gap-8" style="top: 50%; transform: translateY(-50%); align-items:center; left:-46px;">
        <label class=" hidden md:block" style=" margin:0;z-index:45; padding:0;  ">
<input type="range" id="vol" min="0" max="1" value="1" step="0.01" style="background-color:inherit;" />            <!--
        <span id="display1">
            100
        </span>
          -->
        </label>
        <button class="btn play-pause">
            <div class="icon-container">
                <svg class="icon play" id="playbutton-5">
                    <use xlink:href="#play"></use>
                </svg>
            </div>
            <div class="icon-container">
                <svg class="icon pause" id="stopbutton-5">
                    <use xlink:href="#pause"></use>
                </svg>
            </div>
        </button>


        <!--
<button onclick="Adelantar();">Adelantar</button>
-->

        <button type="button" data-modal-target="modal" data-modal-toggle="modal">
            <svg class="px-1" width="35" height="35" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M15 20C14.1667 20 13.4583 19.7083 12.875 19.125C12.2917 18.5417 12 17.8333 12 17C12 16.8833 12.0083 16.7623 12.025 16.637C12.0417 16.5123 12.0667 16.4 12.1 16.3L5.05 12.2C4.76667 12.45 4.45 12.6457 4.1 12.787C3.75 12.929 3.38333 13 3 13C2.16667 13 1.45833 12.7083 0.875 12.125C0.291667 11.5417 0 10.8333 0 10C0 9.16667 0.291667 8.45833 0.875 7.875C1.45833 7.29167 2.16667 7 3 7C3.38333 7 3.75 7.07067 4.1 7.212C4.45 7.354 4.76667 7.55 5.05 7.8L12.1 3.7C12.0667 3.6 12.0417 3.48767 12.025 3.363C12.0083 3.23767 12 3.11667 12 3C12 2.16667 12.2917 1.45833 12.875 0.875C13.4583 0.291667 14.1667 0 15 0C15.8333 0 16.5417 0.291667 17.125 0.875C17.7083 1.45833 18 2.16667 18 3C18 3.83333 17.7083 4.54167 17.125 5.125C16.5417 5.70833 15.8333 6 15 6C14.6167 6 14.25 5.929 13.9 5.787C13.55 5.64567 13.2333 5.45 12.95 5.2L5.9 9.3C5.93333 9.4 5.95833 9.51233 5.975 9.637C5.99167 9.76233 6 9.88333 6 10C6 10.1167 5.99167 10.2373 5.975 10.362C5.95833 10.4873 5.93333 10.6 5.9 10.7L12.95 14.8C13.2333 14.55 13.55 14.354 13.9 14.212C14.25 14.0707 14.6167 14 15 14C15.8333 14 16.5417 14.2917 17.125 14.875C17.7083 15.4583 18 16.1667 18 17C18 17.8333 17.7083 18.5417 17.125 19.125C16.5417 19.7083 15.8333 20 15 20Z" fill="#282828" />
            </svg>
        </button>



    </div>
</div>
<svg xmlns="http://www.w3.org/2000/svg" class="icons svgs" style="position: absolute;top:0; ">
    <symbol id="play" viewBox="0 0 448 512">
        <path d="M424.4 214.7L72.4 6.6C43.8-10.3 0 6.1 0 47.9V464c0 37.5 40.7 60.1 72.4 41.3l352-208c31.4-18.5 31.5-64.1 0-82.6z" />
    </symbol>
    <symbol id="pause" viewBox="0 0 448 512">
        <path d="M144 479H48c-26.5 0-48-21.5-48-48V79c0-26.5 21.5-48 48-48h96c26.5 0 48 21.5 48 48v352c0 26.5-21.5 48-48
                        48zm304-48V79c0-26.5-21.5-48-48-48h-96c-26.5 0-48 21.5-48 48v352c0 26.5 21.5 48 48 48h96c26.5 0 48-21.5 48-48z" />
    </symbol>
</svg>
<!-- FINSECCION RADIO -->
<audio id="player" preload="none" controls="controls" class="hidden" src="http://01.solumedia.com.ar:8366/stream"></audio> <!-- http://190.122.236.218:8000/stream -->





</body>

</html>