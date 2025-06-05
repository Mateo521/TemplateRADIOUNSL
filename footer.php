<?php
wp_footer();
?>



<!-- FOOTER -->

<style>
    #seccion-radio {
        bottom: -116px;
    }
</style>

<div class="footer">
    <footer id="footer">



        <div class="grid md:grid-cols-4 w-full max-w-screen-xl p-4">
            <div class="p-2">
                <p class="pb-8"> INFORMACIÓN INSTITUCIONAL</p>

                <img class="footer-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/unsl.png" alt="">
                <p class="py-3">Teléfono: +54(0266) 4520300</p>
                <p>Dirección: Ejército de Los Andes 950, <br> San Luis, Argentina</p>
            </div>
            <div class="p-2">
                <p class="pb-8"> CONTACTO</p>
                <div class="w-full">
                             <img class="footer-icon" src="<?php echo get_template_directory_uri(); ?>/assets/images/logo2m.png" alt="">

                </div>
                <p class="py-3">Teléfono: +54(0266)</p>
                <p>Dirección: Ejército de Los Andes 950, <br> San Luis, Argentina</p>
                <p class="py-3">Email: ejemplo@gmail.com</p>
            </div>
            <div class="p-2 md:block flex gap-5 items-center">
                <p class="">REDES SOCIALES</p>
                <ul class="flex gap-3 text-gray-400 items-center md:py-8 ">
                    <a href="https://www.facebook.com/unslradio/?locale=es_LA" target="_blank">
                        <li><img width="35px" src="https://upload.wikimedia.org/wikipedia/commons/b/b8/2021_Facebook_icon.svg" alt="">
                        </li>
                    </a>
                    <a href="https://www.instagram.com/unslradio/?hl=es" target="_blank">
                        <li><img width="35px" src="https://cdn3.iconfinder.com/data/icons/2018-social-media-logotypes/1000/2018_social_media_popular_app_logo_instagram-512.png" alt=""></li>
                    </a>
                    <a href="https://www.youtube.com/@radiounslcontenidos" target="_blank">
                        <li><img width="35px" src="https://freelogopng.com/images/all_img/1656501968youtube-icon-png.png" alt=""></li>
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
                <ul class="my-4 space-y-3">
                    <li>
                        <a target="_blank" href="https://wa.me/?text=radiouniversidad.unsl.edu.ar" data-action="share/whatsapp/share" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <img class="h-5" src="<?php echo get_template_directory_uri(); ?>/assets/images/WhatsApp.svg" />

                            <span class="flex-1 ml-3 whitespace-nowrap">Whatsapp</span>
                        </a>
                    </li>
                    <li>
                        <a target="_blank" href="https://instagram.com" class="flex items-center p-3 text-base font-bold text-gray-900 rounded-lg bg-gray-50 hover:bg-gray-100 group hover:shadow dark:bg-gray-600 dark:hover:bg-gray-500 dark:text-white">
                            <img class="h-4" src="<?php echo get_template_directory_uri(); ?>/assets/images/Instagram_logo_2016.svg" />

                            <span class="flex-1 ml-3 whitespace-nowrap">Instagram</span>
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
        <h2 class="accordion-collapse-heading-4">
            <button class="absolute flex gap-3 items-center" data-accordion-target="#accordion-collapse-body-4" aria-expanded="false" aria-controls="accordion-collapse-body-4" style="right:0; top:-53px; padding:15px 20px; background: linear-gradient(180deg, rgba(249, 250, 251, 0.9) 30%, rgba(212, 212, 212, 0.9) 100%);" type="button" onclick="displayfooter();" value="prueba">
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
            <input type="range" id="vol-mobile" min="0" max="1" value="1" step="0.01" onchange="changevolume(this.value)" style="background-color:inherit;" />
            <!-- 
        <span id="display1">
            100
        </span>
         -->
        </label>
        <button onclick="togglePlay()" class="btn play-pause">
            <div class="icon-container">
                <svg class="icon play">
                    <use xlink:href="#play"></use>
                </svg>
            </div>
            <div class="icon-container">
                <svg class="icon pause">
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
            <button class="absolute md:flex cursor-pointer hidden flex gap-3 items-center" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3" style="right:0; top:-53px; padding:15px 20px; background: linear-gradient(180deg, rgba(249, 250, 251, 0.9) 30%, rgba(212, 212, 212, 0.9) 100%);" type="submit" onclick="displayfooter();" value="prueba">
                REPRODUCTOR
                <svg data-accordion-icon="" class="w-3 h-3 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"></path>
                </svg>
            </button>
        </h2>
        <div id="accordion-collapse-body-3"></div>
    </div>

    <div class=" w-full hidden md:flex" id="radio-3">

        <img id="radio-imagen" src="" alt="">
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
            <input type="range" id="vol" min="0" max="1" value="1" step="0.01" onchange="changevolume(this.value)" style="background-color:inherit;" />
            <!--
        <span id="display1">
            100
        </span>
          -->
        </label>
        <button class="btn play-pause" onclick="togglePlay()">
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


<script>
    const themeURL = "<?php echo get_template_directory_uri(); ?>";

    function Adelantar() {
        console.log("adelantar a vivo.");
    }


    function isiOS() {
        return /iPad|iPhone|iPod/.test(navigator.userAgent) && !window.MSStream;
    }

    if (isiOS()) {
        const volumeSlider = document.getElementById("vol-mobile");
        volumeSlider.style.display = "none"; // o: volumeSlider.disabled = true;
    }



    function changevolume(amount) {
        var audioobject = document.getElementById("player");
        audioobject.volume = amount;
    }
    const buttons = Array.from(document.querySelectorAll("button"));
    buttons.forEach(btn => {
        btn.addEventListener("click", () => {
            btn.classList.toggle("active");

        });

    });
    var myAudio = document.getElementById("player");
    var isPlaying = false;

    function togglePlay() {
        isPlaying ? myAudio.pause() : myAudio.play();
    };
    myAudio.onplaying = function() {
        isPlaying = true;
        const play = document.getElementById('playbutton-5');
        play.style.opacity = '0';
        play.style.transform = 'translate(-50%, -50%)';

        const stop = document.getElementById('stopbutton-5');
        stop.style.opacity = '1';
        stop.style.transform = 'translate(-50%, -50%)';

    };
    myAudio.onpause = function() {
        isPlaying = false;
        const play = document.getElementById('playbutton-5');
        play.style.opacity = '1';
        play.style.transform = 'translate(-50%, -50%)';
        const stop = document.getElementById('stopbutton-5');
        stop.style.opacity = '0';
        stop.style.transform = 'translate(-50%, -50%)';
    };


    function setRadioImage(src) {
        const img1 = document.getElementById("radio-imagen");
        const img2 = document.getElementById("radio-imagen2");

        if (img1 && img2) {
            img1.src = src;
            img2.src = src;
        } else {
            console.warn("No se encontraron las imágenes del radio.");
        }
    }

    function horarioslav(date) {
        const total = date.getHours() * 60 + date.getMinutes();

        const horarios = [{
                start: 421,
                end: 569,
                text: "Nada secreto",
                img: "icon-7.png"
            },
            {
                start: 570,
                end: 719,
                text: "Sonido urbano",
                img: "icon-6.png"
            },
            {
                start: 720,
                end: 749,
                text: "<p style='font-size:12px;'>Frecuencia <br> Informativa 1° Edición</p>",
                img: "icon-6.png"
            },
            {
                start: 750,
                end: 779,
                text: "Frecuencia <br> Universitaria",
                img: "icon-6.png"
            },
            {
                start: 780,
                end: 899,
                text: "Sólo un café",
                img: "icon-6.png"
            },
            {
                start: 900,
                end: 1079,
                text: "La locomotora",
                img: "locomotora.png"
            },
            {
                start: 1080,
                end: 1199,
                text: "Más que Noticias",
                img: "icon-6.png"
            },
            {
                start: 1200,
                end: 1259,
                text: "<p style='font-size:12px;'>Frecuencia <br> Informativa 2da Edición</p>",
                img: "icon-6.png"
            },
            {
                start: 1260,
                end: 1439,
                text: "Rock del país",
                img: "icon-8.png"
            }
        ];

        const match = horarios.find(h => total >= h.start && total <= h.end);

        if (match) {

            setRadioImage(themeURL + `/assets/images/${match.img}`);
            return match.text;
        }

        setRadioImage(themeURL + "/assets/images/icon-5.png");
        return "Música";
    }

    function horariossab(date) {
        const total = date.getHours() * 60 + date.getMinutes();

        const horarios = [{
                start: 481,
                end: 539,
                text: "Rock Nacional"
            },
            {
                start: 540,
                end: 599,
                text: "Sonidos de Latinoamérica"
            },
            {
                start: 600,
                end: 659,
                text: "Tangos y milongas"
            }
        ];

        const match = horarios.find(h => total >= h.start && total <= h.end);

        if (match) {

            setRadioImage(themeURL + "/assets/images/radio-9.png");
            return match.text;
        }


        setRadioImage(themeURL + "/assets/images/icon-5.png");

        return "Música";
    }

    var date = new Date();
    var dayOfWeek = date.getDay();
    var openClosed = false;
    var hour = date.getHours()
    var minutes = date.getMinutes();
    var horario = hour + ":" + minutes;
    var radio = "apagado"
    var msg = function() {
        if (openClosed == true) {
            return "-";
        } else {
            switch (dayOfWeek) {
                case 1:
                    return horarioslav(date);
                    break;
                case 2:
                    return horarioslav(date);
                    break;
                case 3:
                    return horarioslav(date);
                    break;
                case 4:
                    return horarioslav(date);
                    break;
                case 5:
                    return horarioslav(date);
                    break;
                case 6:
                    return horariossab(date);
                    break;
                default:
                    document.getElementById("radio-imagen").src = themeURL + "/assets/images/icon-5.png";
                    document.getElementById("radio-imagen2").src = themeURL + "/images/icon-5.png";
                    return "Música";
            }
        }
    }
    $(window).on('load', function() {
        $("#open_close").html(msg());
        $("#open_close-2").html(msg());
        $("#prog").html("Escuchá en vivo " + msg());


    });

    $(document).ready(function () {
    setTimeout(function () {
        const mensaje = $("#prog").text().trim(); 
        const url = "https://radiouniversidad.unsl.edu.ar"; 
        const texto = encodeURIComponent(`${mensaje} ${url}`);

      
        $('a[href^="https://wa.me/"]').attr('href', `https://wa.me/?text=${texto}`);

       
        $('a[href*="twitter.com/intent/tweet"]').attr('href', `https://twitter.com/intent/tweet?text=${texto}`);

      
        $('a[href*="facebook.com/sharer/sharer.php"]').attr('href', `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}&quote=${encodeURIComponent(mensaje)}`);

        
        $('a[href^="mailto:"]').attr('href', `mailto:?subject=${encodeURIComponent("Escuchá en vivo")}&body=${encodeURIComponent(`${mensaje} ${url}`)}`);
    }, 300);
});

    function hideLoader() {

        $('#loading').hide();
        $('#loading-2').hide();
    }

    $(window).ready(hideLoader);

    // Strongly recommended: Hide loader after 20 seconds, even if the page hasn't finished loading
    setTimeout(hideLoader, 20 * 1000);



    let activado2 = false;

    function displayfooter() {

        if (activado2) {
            $("#radio").css({
                bottom: "0"
            });
            $("#seccion-radio").css({
                bottom: "0"
            });
        } else {

            var con = document.getElementById('open_close').innerHTML;

            if (con == "Frecuencia <br> Universitaria") {
                $("#radio").css({
                    bottom: "-135px"
                });
                $("#seccion-radio").css({
                    bottom: "-140px"
                });


            } else if (con == '<p style="font-size:12px;">Frecuencia <br> Informativa 2da Edición</p>' || con == '<p style="font-size:12px;">Frecuencia <br> Informativa 1° Edición</p>') {
                $("#radio").css({
                    bottom: "-135px"
                });

                $("#seccion-radio").css({
                    bottom: "-128px"
                });
            } else {
                $("#radio").css({
                    bottom: "-135px"
                });
                $("#seccion-radio").css({
                    bottom: "-116px"
                });
            }
        }
        activado2 = !activado2;
    }


    
</script>




<script src="https://unpkg.com/@barba/core"></script>


<script>
    function initGlobalScripts() {



    }


    function initHomeScripts() {



        /*    document.addEventListener('DOMContentLoaded', function() {*/
        var swiper3 = new Swiper('.swiper-container', {
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            loop: true,
            slidesPerView: 1,
            spaceBetween: 20,
            grabCursor: true
        });
        /*   });*/



        const swiper = new Swiper('.mySwiper', {
            loop: true,
            grabCursor: true,
            spaceBetween: 20,
            slidesPerView: 1,
            centeredSlides: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            autoplay: {
                delay: 5000,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                },
                1024: {
                    slidesPerView: 1,
                }
            }
        });


        const swiper2 = new Swiper('.newSwiper', {
            loop: true,
            grabCursor: true,
            spaceBetween: 20,
            slidesPerView: 1,
            centeredSlides: true,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            autoplay: {
                delay: 5000,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                },
                1024: {
                    slidesPerView: 1,
                }
            }
        });

    }



function initSinglePageScripts() {
    // Asegura que el DOM del container esté listo
    requestAnimationFrame(() => {
        const subtituloElement = document.getElementById('subtitulo');
        const subtextoElement = document.getElementById('subtexto');
        const podcastElement = document.getElementById('podcast');

        const otraUbicacionContainer_1 = document.querySelector('.subtitulos');
        const otraUbicacionContainer_2 = document.querySelector('.subtextos');
        const otraUbicacionContainer_3 = document.querySelector('.podcasts');

        if (subtituloElement && otraUbicacionContainer_1) {
            const subtituloClone = subtituloElement.cloneNode(true);
            subtituloElement.remove();
            otraUbicacionContainer_1.appendChild(subtituloClone);
        }

        if (subtextoElement && otraUbicacionContainer_2) {
            const subtextoClone = subtextoElement.cloneNode(true);
            subtextoElement.remove();
            otraUbicacionContainer_2.appendChild(subtextoClone);
        }

        if (podcastElement && otraUbicacionContainer_3) {
            const podcastClone = podcastElement.cloneNode(true);
            podcastElement.remove();
            otraUbicacionContainer_3.appendChild(podcastClone);
        }
    });

  jQuery(document).ready(function($) {
        $('#entrada img').each(function(index) {
            var imgSrc = $(this).attr('src');
            var hasGalleryParent = $(this).parents('figure.wp-block-gallery').length > 0;
            var imgLink = $('<a>', {
                href: imgSrc,
                'data-lightbox': hasGalleryParent ? 'img-gallery' : 'img-' + (index + 1)
            });
            var imgElement = $('<img>', {
                src: imgSrc
            });
            $(this).wrap(imgLink).after(imgElement).remove();
        });
    });
    
}


    function initNoticiasPageScripts() {


        const swiper = new Swiper('.swiper-container', {
            loop: false,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            slidesPerView: 1,
            spaceBetween: 10,

        });




    }

    function initProgramacionPageScripts() {
        function toggleSection(buttonId, contentId, iconId) {
            const button = document.getElementById(buttonId);
            const content = document.getElementById(contentId);
            const icon = document.getElementById(iconId);

            document.getElementById('content-lunes').style.height = '0px';
            document.getElementById('content-lunes').style.opacity = '0';
            document.getElementById('content-lunes').style.overflow = 'hidden';

            document.getElementById('content-sabados').style.height = '0px';
            document.getElementById('content-sabados').style.opacity = '0';
            document.getElementById('content-sabados').style.overflow = 'hidden';


            button.addEventListener('click', () => {
                if (content.style.height && content.style.height !== '0px') {
                    const currentHeight = content.scrollHeight;
                    content.style.height = currentHeight + 'px';
                    requestAnimationFrame(() => {
                        content.style.height = '0px';
                        content.style.opacity = '0';
                    });


                    icon.style.transform = 'rotate(0deg)';
                } else {
                    content.style.height = 'auto';
                    const autoHeight = content.scrollHeight;
                    content.style.height = '0px';
                    content.style.opacity = '0';
                    requestAnimationFrame(() => {
                        content.style.height = autoHeight + 'px';
                        content.style.opacity = '1';
                    });


                    icon.style.transform = 'rotate(180deg)';
                }
            });



            content.addEventListener('transitionend', (e) => {
                if (e.propertyName === 'height') {
                    if (content.style.height !== '0px') {
                        content.style.height = 'auto';
                    }
                }
            });
        }

        toggleSection('toggle-lunes', 'content-lunes', 'icon-lunes');
        toggleSection('toggle-sabados', 'content-sabados', 'icon-sabados');

    }

    barba.init({
        transitions: [{
            name: 'fade',
            async leave(data) {
                await data.current.container.animate([{
                    opacity: 1
                }, {
                    opacity: 0
                }], {
                    duration: 300,
                    easing: 'ease'
                }).finished;
            },
            enter(data) {

                window.scrollTo({
                    top: 0,
                    behavior: 'smooth'
                });




                data.next.container.animate([{
                    opacity: 0
                }, {
                    opacity: 1
                }], {
                    duration: 300,
                    easing: 'ease'
                });
            }
        }],
        views: [{
                namespace: 'single',
                afterEnter() {
                    initSinglePageScripts();

                }
            },
            {
                namespace: 'page-programacion',
                afterEnter() {
                    initProgramacionPageScripts();
                }
            },
            {
                namespace: 'front-page',
                afterEnter() {
                    initHomeScripts();
                }
            },
            {
                namespace: 'page-noticias',
                afterEnter() {
                    initNoticiasPageScripts();
                }
            },
        ]
    });


    barba.hooks.afterEnter(() => {



        const menu = document.getElementById('navbar-search');
        const toggle = document.querySelector('[data-collapse-toggle]');
        const links = menu?.querySelectorAll('a');

        if (menu && toggle && links) {
            links.forEach(link => {
                link.addEventListener('click', () => {
                    if (!menu.classList.contains('hidden')) {
                        menu.classList.add('hidden');
                    }
                });
            });
        }


    });
</script>


</body>

</html>