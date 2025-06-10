




document.addEventListener("DOMContentLoaded", function () {
    const myAudio = document.getElementById("player");
    const volumeSliders = [document.getElementById("vol"), document.getElementById("vol-mobile")];
    volumeSliders.forEach(slider => {
        slider.addEventListener("input", function () {
            myAudio.volume = this.value;
        });
    });
    function changevolume(amount) {
        var audioobject = document.getElementById("player");
        audioobject.volume = amount;
    }
    const playButton = document.querySelectorAll(".btn.play-pause");
    const playIcon = document.getElementById('playbutton-5');
    const stopIcon = document.getElementById('stopbutton-5');
    let isPlaying = false;

    // Asigna el evento por JavaScript
    playButton.forEach(btn => {
        btn.addEventListener("click", function () {
            togglePlay();
        });
    });

    function togglePlay() {
        isPlaying ? myAudio.pause() : myAudio.play();
    }

    myAudio.onplaying = function () {
        isPlaying = true;
        playIcon.style.opacity = '0';
        playIcon.style.transform = 'translate(-50%, -50%)';
        stopIcon.style.opacity = '1';
        stopIcon.style.transform = 'translate(-50%, -50%)';
    };

    myAudio.onpause = function () {
        isPlaying = false;
        playIcon.style.opacity = '1';
        playIcon.style.transform = 'translate(-50%, -50%)';
        stopIcon.style.opacity = '0';
        stopIcon.style.transform = 'translate(-50%, -50%)';
    };

    const ciudades = [
        { nombre: "San Luis", lat: -33.30157712276608, lon: -66.3405876778769 },
        { nombre: "Villa de Merlo", lat: -32.34837185554736, lon: -65.01371473234181 }, 
        { nombre: "Unión", lat: -33.283, lon: -65.835 },
        { nombre: "La Punta", lat: -33.215, lon: -66.291 },
        { nombre: "Luján", lat: -32.385, lon: -65.622 },
        { nombre: "El Trapiche", lat: -33.10679314167354, lon: -66.06208112533947 },
        { nombre: "Santa Rosa del Conlara", lat: -32.343, lon: -65.195 },
        { nombre: "Renca", lat: -32.981, lon: -65.663 },
        { nombre: "Potrero de los Funes", lat: -33.246, lon: -66.239 },
        { nombre: "San Francisco del Monte de Oro", lat: -32.603, lon: -66.117 }
    ];
    const iconos = {
        clear: `<img class="weather-icon" src="https://openweathermap.org/img/wn/01d.png" alt="Sol despejado" />`,
        partly_cloudy: `<img class="weather-icon" src="https://openweathermap.org/img/wn/03d.png" alt="Parcialmente nublado" />`,
        cloudy: `<img class="weather-icon" src="https://openweathermap.org/img/wn/04d.png" alt="Nublado" />`,
        rain: `<img class="weather-icon" src="https://openweathermap.org/img/wn/09d.png" alt="Lluvia" />`,
        snow: `<img class="weather-icon" src="https://openweathermap.org/img/wn/13d.png" alt="Nieve" />`,
        default: `<img class="weather-icon" src="https://placehold.co/24x24/png?text=?" alt="Clima desconocido" />`,
    };


    function obtenerIcono(code) {
        if ([0].includes(code)) return iconos.clear;
        if ([1, 2, 3].includes(code)) return iconos.partly_cloudy;
        if ([45, 48].includes(code)) return iconos.cloudy;
        if ([51, 53, 55, 61, 63, 65, 80, 81, 82].includes(code)) return iconos.rain;
        if ([71, 73, 75, 85, 86].includes(code)) return iconos.snow;
        return iconos.default;
    }

    function descripcionClima(code) {
        if ([0].includes(code)) return "Despejado";
        if ([1, 2, 3].includes(code)) return "Parcial";
        if ([45, 48].includes(code)) return "Nublado";
        if ([51, 53, 55, 61, 63, 65, 80, 81, 82].includes(code)) return "Lluvia";
        if ([71, 73, 75, 85, 86].includes(code)) return "Nieve";
        return "Desconocido";
    }

    async function obtenerClima(ciudad) {
        const url = `https://api.open-meteo.com/v1/forecast?latitude=${ciudad.lat}&longitude=${ciudad.lon}&daily=temperature_2m_max,temperature_2m_min,weathercode&timezone=America/Argentina/Buenos_Aires`;
        const res = await fetch(url);
        const data = await res.json();
        const hoy = 0;
        return {
            nombre: ciudad.nombre,
            tempMin: data.daily.temperature_2m_min[hoy],
            tempMax: data.daily.temperature_2m_max[hoy],
            weathercode: data.daily.weathercode[hoy],
        };
    }

    async function cargarMarquee() {
        const datos = await Promise.all(ciudades.map(obtenerClima));
        const contenido = datos
            .map(({ nombre, tempMin, tempMax, weathercode }) => {
                const icono = obtenerIcono(weathercode);
                const desc = descripcionClima(weathercode);
                return `
            <span class="city-block" aria-label="Clima en ${nombre}: mínimo ${tempMin} grados, máximo ${tempMax} grados, ${desc}">
              <span class="city-name">${nombre}:</span>
              <span class="temp">${tempMin}° / ${tempMax}°C</span>
              ${icono}
            </span>
          `;
            })
            .join("");
        document.getElementById("marquee").innerHTML = contenido;
    }

    cargarMarquee();


    const themeURL = miTema.themeURL;


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



    const buttons = Array.from(document.querySelectorAll("button"));
    buttons.forEach(btn => {
        btn.addEventListener("click", () => {
            btn.classList.toggle("active");

        });

    });



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
    var msg = function () {
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
    $(window).on('load', function () {
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




});

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



    /*
            const isMobile = /Mobi|Android|iPhone|iPad|iPod/i.test(navigator.userAgent);
    
            if (isMobile) return;
            
    */

     const grid = document.querySelector("#grids");

    if (!grid) return;

    const audios = grid.querySelectorAll("audio");

    audios.forEach((audio) => {
      audio.style.display = "none";

      const controls = document.createElement("div");
      controls.className =
        "flex items-center justify-center space-x-3 p-2 bg-gray-100 rounded-lg shadow";

      const restartBtn = document.createElement("button");
      restartBtn.className =
        "p-2 rounded-full bg-red-500 w-full cursor-pointer h-10 relative flex justify-center items-center text-white hover:bg-red-600 transition focus:outline-none focus:ring-2 focus:ring-red-400";
      restartBtn.setAttribute("aria-label", "Restart audio");
      restartBtn.innerHTML = '<i class="fas absolute text-sm fa-undo"></i>';

      const back10Btn = document.createElement("button");
      back10Btn.className =
        "p-2 rounded-full bg-gray-300 w-full h-10 cursor-pointer relative flex justify-center items-center text-gray-700 hover:bg-gray-400 transition focus:outline-none focus:ring-2 focus:ring-gray-400";
      back10Btn.setAttribute("aria-label", "Rewind 10 seconds");
      back10Btn.innerHTML = '<i class="fas absolute text-sm fa-backward"></i>';

      const playBtn = document.createElement("button");
      playBtn.className =
        "p-3 rounded-full bg-[#486faf] w-full h-10 cursor-pointer relative flex justify-center items-center text-white hover:bg-[#d8b90a] transition focus:outline-none focus:ring-2 focus:ring-[#d8b90a]";
      playBtn.setAttribute("aria-label", "Play audio");
      playBtn.innerHTML = '<i class="fas absolute text-sm fa-play"></i>';

      const forward10Btn = document.createElement("button");
      forward10Btn.className =
        "p-2 rounded-full bg-gray-300 w-full h-10 cursor-pointer relative flex justify-center items-center text-gray-700 hover:bg-gray-400 transition focus:outline-none focus:ring-2 focus:ring-gray-400";
      forward10Btn.setAttribute("aria-label", "Forward 10 seconds");
      forward10Btn.innerHTML = '<i class="fas absolute text-sm fa-forward"></i>';

      let playing = false;

      playBtn.addEventListener("click", () => {
        if (playing) {
          audio.pause();
          playBtn.innerHTML = '<i class="fas absolute text-sm fa-play"></i>';
          playBtn.setAttribute("aria-label", "Play audio");
        } else {
          audio.play();
          playBtn.innerHTML = '<i class="fas absolute text-sm fa-pause"></i>';
          playBtn.setAttribute("aria-label", "Pause audio");
        }
        playing = !playing;
      });

      back10Btn.addEventListener("click", () => {
        audio.currentTime = Math.max(0, audio.currentTime - 10);
      });

      forward10Btn.addEventListener("click", () => {
        audio.currentTime = Math.min(audio.duration, audio.currentTime + 10);
      });

      restartBtn.addEventListener("click", () => {
        audio.currentTime = 0;
        audio.play();
        playing = true;
        playBtn.innerHTML = '<i class="fas text-sm fa-pause"></i>';
        playBtn.setAttribute("aria-label", "Pause audio");
      });

      controls.appendChild(restartBtn);
      controls.appendChild(back10Btn);
      controls.appendChild(playBtn);
      controls.appendChild(forward10Btn);

      audio.parentElement.appendChild(controls);
    });



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

    jQuery(document).ready(function ($) {
        $('#entrada img').each(function (index) {
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
        effect: "fade",
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
document.addEventListener("DOMContentLoaded", function () {
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

});