
    const themeURL = "http://10.230.5.252/radiounsl/wp-content/themes/TemplateRADIOUNSL/";

document.addEventListener('DOMContentLoaded', function() {

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
