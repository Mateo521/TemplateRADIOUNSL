




const ciudades = [
    { nombre: "San Luis", lat: -33.30157712276608, lon: -66.3405876778769 },
    { nombre: "Villa de Merlo", lat: -32.34837185554736, lon: -65.01371473234181 },
    { nombre: "Unión", lat: -35.155887436753396, lon: -65.94699228708224 },
    { nombre: "La Punta", lat: -33.18257333353946, lon: -66.31320965944896 },
    { nombre: "Luján", lat: -32.368137719121115, lon: -65.93754975594317 },
    { nombre: "El Trapiche", lat: -33.10679314167354, lon: -66.06208112533947 },
    { nombre: "Santa Rosa del Conlara", lat: -32.340927546749306, lon: -65.21182420380036 },
    { nombre: "Renca", lat: -32.77252345913084, lon: -65.36450706994445 },
    { nombre: "Potrero de los Funes", lat: -33.21925819909259, lon: -66.22899030838029 },
    { nombre: "San Francisco del Monte de Oro", lat: -32.59766621771288, lon: -66.1254636518732 }
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
    const url = `https://api.open-meteo.com/v1/forecast?latitude=${ciudad.lat}&longitude=${ciudad.lon}&current_weather=true&timezone=America/Argentina/Buenos_Aires`;
    const res = await fetch(url);
    const data = await res.json();

    return {
        nombre: ciudad.nombre,
        temperatura: data.current_weather.temperature,
        weathercode: data.current_weather.weathercode,
    };
}





function initClimaMarquee() {
    const marquee = document.getElementById("marquee");

    if (!marquee) {
        console.warn("No se encontró el marquee");
        return;
    }

    cargarMarquee();



    async function cargarMarquee() {
        try {

            const datos = await Promise.all(ciudades.map(obtenerClima));


            const contenido = datos
                .map(({ nombre, temperatura, weathercode }) => {
                    const icono = obtenerIcono(weathercode);
                    const desc = descripcionClima(weathercode);
                    return `
            <span class="city-block" aria-label="Clima en ${nombre}: temperatura actual ${temperatura} grados, ${desc}">
                <span class="city-name">${nombre}:</span>
                <span class="temp">${temperatura}°C</span>
                ${icono}
            </span>
        `;
                })
                .join("");




            marquee.innerHTML = contenido + contenido;
        } catch (error) {
            console.error("Error al cargar el clima:", error);
            marquee.innerHTML = `
  <span class="error text-center">
    No se pudo cargar el clima.
    <button onclick="location.reload()" style="margin-left: 10px;">Recargar página</button>
  </span>
`;

        }
    }



}

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





















    function actualizarRadio() {
        const programa = obtenerProgramaActual();

        $("#open_close").html(programa.text);
        $("#open_close-2").html(programa.text);
        $("#prog").html("Escuchá en vivo " + programa.text);

        const imageUrl = `${themeURL}/assets/images/${programa.img}`;
        const metaImageUrl = programa.metaImg
            ? `${themeURL}${programa.metaImg}`
            : imageUrl;
        document.getElementById("radio-imagen").src = imageUrl;
        document.getElementById("radio-imagen2").src = imageUrl;


        if ('mediaSession' in navigator) {
            navigator.mediaSession.metadata = new MediaMetadata({
                title: programa.text,
                artist: "Radio Universidad Nacional de San Luis",
                album: "En Vivo",
                artwork: [
                    { src: metaImageUrl, sizes: '512x512', type: 'image/png' }
                ]
            });

            navigator.mediaSession.setActionHandler('play', function () {
                document.getElementById('player').play();
            });
            navigator.mediaSession.setActionHandler('pause', function () {
                document.getElementById('player').pause();
            });



        }
    }


    $(window).on('load', actualizarRadio);


    setInterval(actualizarRadio, 60000);


    $(document).ready(function () {
        setTimeout(function () {
            const mensaje = $("#prog").text().trim();
            const url = "https://radiouniversidad.unsl.edu.ar";
            const texto = encodeURIComponent(`${mensaje} ${url}`);


            $('#social-share a[href^="https://wa.me/"]').attr('href', `https://wa.me/?text=${texto}`);


            $('#social-share a[href*="twitter.com/intent/tweet"]').attr('href', `https://twitter.com/intent/tweet?text=${texto}`);


            $('#social-share a[href*="facebook.com/sharer/sharer.php"]').attr('href', `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(url)}&quote=${encodeURIComponent(mensaje)}`);


            $('#social-share a[href^="mailto:"]').attr('href', `mailto:?subject=${encodeURIComponent("Escuchá en vivo")}&body=${encodeURIComponent(`${mensaje} ${url}`)}`);
        }, 300);
    });

    function hideLoader() {

        $('#loading').hide();
        $('#loading-2').hide();
    }

    $(window).ready(hideLoader);


    setTimeout(hideLoader, 20 * 1000);


    initClimaMarquee();

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


function normalizarTexto(texto) {
    return texto
        .toLowerCase()
        .normalize("NFD")
        .replace(/[\u0300-\u036f]/g, "")
        .replace(/\(.*?\)/g, "")
        .replace(/[^\w\s]/g, "")
        .trim();
}



const programacion = {
    all: [
        { start: 1380, end: 1439, text: "Música", img: "icon-5.png" }
    ],
    weekdays: [
        { start: 420, end: 539, text: "Nada secreto", img: "/institucional/nada-secreto.png", metaImg: "/assets/images/institucional/512x512/nada-secreto.png" },
        { start: 540, end: 599, text: "Haciendo Ruido", img: "/institucional/haciendo-ruido.png", metaImg: "/assets/images/institucional/512x512/haciendo-ruido.png" },
        { start: 600, end: 614, text: "Frecuencia Informativa (10 hs)", img: "/institucional/frecuencia-informativa.png", metaImg: "/assets/images/institucional/512x512/frecuencia-informativa.png" },
        { start: 615, end: 719, text: "Haciendo Ruido", img: "/institucional/haciendo-ruido.png", metaImg: "/assets/images/institucional/512x512/haciendo-ruido.png" },
        { start: 720, end: 734, text: "Frecuencia Informativa (12 hs)", img: "/institucional/frecuencia-informativa.png", metaImg: "/assets/images/institucional/512x512/frecuencia-informativa.png" },
        { start: 735, end: 779, text: "Haciendo Ruido", img: "/institucional/haciendo-ruido.png", metaImg: "/assets/images/institucional/512x512/haciendo-ruido.png" },
        { start: 780, end: 839, text: "Sólo un café", img: "/institucional/solo-un-cafe.png", metaImg: "/assets/images/institucional/512x512/solo-un-cafe.png" },
        { start: 900, end: 959, text: "La locomotora", img: "/institucional/la-locomotora.png", metaImg: "/assets/images/institucional/512x512/la-locomotora.png" },
        { start: 960, end: 974, text: "Frecuencia Informativa (16 hs)", img: "/institucional/frecuencia-informativa.png", metaImg: "/assets/images/institucional/512x512/frecuencia-informativa.png" },
        { start: 975, end: 1079, text: "La locomotora", img: "/institucional/la-locomotora.png", metaImg: "/assets/images/institucional/512x512/la-locomotora.png" },
        { start: 1080, end: 1199, text: "Bajá un cambio", img: "/institucional/baja-un-cambio.png", metaImg: "/assets/images/institucional/512x512/baja-un-cambio.png" },
        { start: 1200, end: 1214, text: "Frecuencia Informativa (20 hs)", img: "/institucional/frecuencia-informativa.png", metaImg: "/assets/images/institucional/512x512/frecuencia-informativa.png" },
        { start: 1215, end: 1259, text: "Bajá un cambio", img: "/institucional/baja-un-cambio.png", metaImg: "/assets/images/institucional/512x512/baja-un-cambio.png" },
        { start: 1260, end: 1379, text: "Rock del País", img: "/institucional/rock-del-pais.png", metaImg: "/assets/images/institucional/512x512/rock-del-pais.png" }
    ]
    ,
    1: [
        { start: 840, end: 854, text: "Entre Corcheas", img: "icon-6.png" }
    ],
    2: [
        { start: 840, end: 854, text: "Finanzas para Todos", img: "icon-6.png" }
    ]
};

function obtenerProgramaActual(date = new Date()) {
    const total = date.getHours() * 60 + date.getMinutes();
    const day = date.getDay();

    const bloques = [
        ...(programacion.all || []),
        ...(day >= 1 && day <= 5 ? programacion.weekdays : []),
        ...(programacion[day] || [])
    ];

    return bloques.find(p => total >= p.start && total <= p.end) || {
        text: "Música",
        img: "icon-5.png"
    };
}

let newSwiper;

function marcarProgramaAlAire() {
    const programaActual = obtenerProgramaActual();
    const actualNormalizado = normalizarTexto(programaActual.text);

    const swiperContainer = document.querySelector(".swiper.newSwiper");
    const slidesWrapper = swiperContainer.querySelector(".swiper-wrapper");
    const slides = Array.from(slidesWrapper.querySelectorAll(".swiper-slide"));

    let slideAlAire = null;


    if (window.newSwiper && typeof window.newSwiper.destroy === "function") {
        window.newSwiper.destroy(true, true);
    }

    slides.forEach(slide => {
        const programaSlide = slide.getAttribute("data-programa") || "";
        const slideNormalizado = normalizarTexto(programaSlide);
        const btn = slide.querySelector(".btn-programa");

        if (btn) {
            if (actualNormalizado.includes(slideNormalizado)) {
                btn.innerHTML = '<div class="flex gap-2 items-center"><img class="w-2 h-2" src="' + miTema.themeURL + '/assets/images/giphy.webp" alt=""  > AL AIRE </div>';
                btn.classList.remove("bg-red-700");
                btn.classList.add("bg-green-700", "hover:bg-green-800");
                slideAlAire = slide;
            } else {
                btn.textContent = "";
                btn.classList.add("hidden");
            }
        }
    });


    if (slideAlAire) {
        slidesWrapper.insertBefore(slideAlAire, slidesWrapper.firstChild);
    }


    window.newSwiper = new Swiper(".newSwiper", {
        loop: false,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });


    window.newSwiper.slideTo(0);
}



function initGlobalScripts() {



}





function initHomeScripts() {


    requestAnimationFrame(() => {
        marcarProgramaAlAire();
    });



    function obtenerDuracionDeTodosLosAudios() {
        var tiempo = [];
        var bloquesAudio = document.querySelectorAll('#podcasts-6 .max-w-sm');
        let elementsArray = Array.from(bloquesAudio);

        var hora1 = document.getElementsByClassName("hora");

        function cargarMetadato(audio) {
            return new Promise(function (resolve) {
                audio.onloadedmetadata = function () {

                    resolve(audio.duration);

                };
            });
        }
        var promesas = elementsArray.map(function (bloquesAudio) {

            var reproductorAudio = bloquesAudio.querySelector('audio');



            if (reproductorAudio) {
                return cargarMetadato(reproductorAudio);
            } else {
                return Promise.resolve(0);
            }
        });
        Promise.all(promesas).then(function (duraciones) {


            for (var j = 0; j < duraciones.length; j++) {
                //   console.log(duraciones[j]);
                if (duraciones[j] != 0) {
                    hora1[j].innerHTML = Math.floor(duraciones[j] / 60) + ' min';
                }
            }
        });
    }
    obtenerDuracionDeTodosLosAudios();
    class Slider {
        constructor(el) {
            this.el = el;
            this.container = this.el.querySelector('.slides-container');
            this.slides = this.container.querySelectorAll('.slide');
            this.parallaxes = this.container.querySelectorAll('.parallax');
            this.current = 0;
            this.currentPos;
            this.mouseOffset;
            this.moving = false;
            this.container.style.width = this.slides.length * 100 + '%';
            this.slides[0].classList.add('current');
            let startPos, lastTouchX;
            const
                dragStart = e => {
                    e.stopPropagation();
                    if (e.touches) lastTouchX = e.touches[0].clientX;
                    startPos = e.clientX || lastTouchX;
                    this.mouseOffset = 0;
                    this.currentPos = this.container.getBoundingClientRect().left;
                    this.moving = true;
                    requestAnimationFrame(this.move.bind(this));
                },

                dragEnd = e => {
                    if (this.moving) {
                        const moveX = e.clientX || lastTouchX;
                        if (moveX < startPos - 100) this.next();
                        else
                            if (moveX > startPos + 100) this.prev();
                            else
                                this.goTo(this.current);
                        this.moving = false;
                    }
                },

                dragMove = e => {
                    if (e.touches) lastTouchX = e.touches[0].clientX;
                    const moveX = e.clientX || lastTouchX;
                    this.mouseOffset = moveX - startPos;
                };

            this.container.addEventListener('mousedown', dragStart);
            this.container.addEventListener('touchstart', dragStart);

            window.addEventListener('mouseup', dragEnd);
            this.container.addEventListener('touchend', dragEnd);

            window.addEventListener('mousemove', dragMove);
            this.container.addEventListener('touchmove', dragMove);

            window.addEventListener('keydown', e => {
                e = e || window.event;
                if (e.keyCode == '39') { // der arrow
                    this.next();
                } else
                    if (e.keyCode == '37') { // izq arrow
                        this.prev();
                    }
            });
        }
        move() {
            if (this.moving) {
                this.container.style.transform = 'translate3d(' + (this.currentPos + this.mouseOffset) + 'px, 0, 0)';
                this.container.classList.add('moving');
                const slideWidth = this.slides[0].offsetWidth;
                this.slides.forEach(($_slide, i) => {
                    const coef = 1 - Math.abs($_slide.getBoundingClientRect().left / slideWidth);
                    //  $_slide.style.opacity = .5 + coef * .5;
                    $_slide.style.transform = 'scale(' + (.9 + coef * .1) + ')';
                });
                this.parallaxes.forEach(($_item, i) => {
                    const coef = this.slides[i].getBoundingClientRect().left / slideWidth;
                    // $_item.style.opacity = 1 - Math.abs(coef * 1.8);
                    $_item.style.transform = 'translate3d(' + -coef * 85 + '%, 0, 0)';
                });
                requestAnimationFrame(this.move.bind(this));
            }
        }

        goTo(i) {
            if (i >= 0 && i < this.slides.length) this.current = i;
            this.container.classList.remove('moving');
            this.container.style.transform = 'translate3d(' + this.current * -100 / this.slides.length + '%, 0, 0)';

            this.slides.forEach(($_slide, i) => {
                $_slide.classList.remove('current');
                //  $_slide.removeAttribute('style');
            });
            this.slides[this.current].classList.add('current');
            //this.slides[this.current].removeAttribute('style');

            this.parallaxes.forEach(($_item, i) => {
                $_item.removeAttribute('style');
                $_item.style.transform = 'translate3d(' + (i <= this.current ? 85 : -85) + '%, 0, 0)';
            });
            this.slides[this.current].querySelector('.parallax').removeAttribute('style');
        }

        next() {
            this.goTo(this.current + 1);
        }

        prev() {
            this.goTo(this.current - 1);
        }
    }



    const $sliders = document.querySelectorAll('.slider');
    const sliders = [];
    $sliders.forEach($slider => {
        sliders.push(new Slider($slider));
    });




    /*
            const isMobile = /Mobi|Android|iPhone|iPad|iPod/i.test(navigator.userAgent);
    
            if (isMobile) return;
            
    */

    document.querySelectorAll(".audio-wrapper").forEach((wrapper) => {
        const audio = wrapper.querySelector("audio");

        if (!audio) return;

        audio.style.display = "none";

        const controls = document.createElement("div");
        controls.className =
            "flex items-center justify-center space-x-3 p-2  rounded-lg ";

        const restartBtn = document.createElement("button");
        restartBtn.className =
            "p-2 rounded-full bg-red-500/40 w-full cursor-pointer h-10 relative flex justify-center items-center text-white hover:bg-red-600 transition focus:outline-none focus:ring-2 focus:ring-red-400";
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

                document.querySelectorAll("audio").forEach((a) => {
                    if (a !== audio) {
                        a.pause();
                        a.currentTime = 0;
                    }
                });

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

        wrapper.appendChild(controls);
    });



    /* document.addEventListener('DOMContentLoaded', function() {*/
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
        effect: "fade",
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

    /*
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
    */
}
let currentAudio = null;
let currentLottie = null;


function toggleAudio(button) {
    const article = button.closest("article");
    const audioWrapper = article.querySelector(".audio-wrapper");
    const audio = audioWrapper.querySelector("audio");


    document.querySelectorAll(".audio-wrapper.active").forEach(wrapper => {
        if (wrapper !== audioWrapper) {
            wrapper.classList.remove("active");
            const otherAudio = wrapper.querySelector("audio");
            otherAudio.pause();
            otherAudio.currentTime = 0;
            const otherButton = wrapper.closest("article").querySelector(".play-button");
            if (otherButton) {
                otherButton.classList.remove("hidden");
            }
        }
    });


    audioWrapper.classList.add("active");
    audio.play();
    button.classList.add("hidden");


    audio.onpause = () => {
        audioWrapper.classList.remove("active");
        button.classList.remove("hidden");
        audio.currentTime = 0;
    };
}



function cleanupSinglePageScripts() {
    if (currentAudio && currentAudio._listeners) {
        currentAudio.removeEventListener('play', currentAudio._listeners.handlePlay);
        currentAudio.removeEventListener('pause', currentAudio._listeners.handlePause);
        currentAudio.removeEventListener('ended', currentAudio._listeners.handleEnded);
        currentAudio._listeners = null;
    }


    if (currentLottie) {
        currentLottie.pause?.();
        currentLottie.classList.add('lottie-hidden');
    }

    currentAudio = null;
    currentLottie = null;
}


function initSinglePageScripts(container = document) {
    const btn = container.querySelector('#podcastBtn');
    const player = container.querySelector('#podcastPlayer');
    const iconPlay = container.querySelector('#iconPlay');
    const btnText = container.querySelector('#btnText');

    if (!btn || !player || !iconPlay || !btnText) return;

    btn.addEventListener('click', () => {
        const expanded = btn.getAttribute('aria-expanded') === 'true';

        if (expanded) {
            player.style.maxHeight = '0';
            player.style.padding = '0';
            player.setAttribute('aria-hidden', 'true');
            btn.setAttribute('aria-expanded', 'false');

            iconPlay.style.transform = 'rotate(0deg)';
            btnText.style.opacity = '1';

            btn.classList.remove('rounded-b-none');
            btn.classList.add('rounded');

             
            if (audio) {
                audio.pause();
                audio.currentTime = 0;
            }

        } else {
            player.style.maxHeight = player.scrollHeight + 24 + 'px';
            player.style.padding = '0.5rem 0.5rem';
            player.setAttribute('aria-hidden', 'false');
            btn.setAttribute('aria-expanded', 'true');

            iconPlay.style.transform = 'rotate(90deg)';
            btnText.style.opacity = '0';

            btn.classList.remove('rounded');
            btn.classList.add('rounded-t');

            
            if (audio) {
                audio.play();
            }
        }
    });


    const audio = container.querySelector('#podcastPlayer audio');
    const lottie = container.querySelector('.podcast-lottie');


    currentAudio = audio;
    currentLottie = lottie;

    if (audio && lottie) {

        if (audio.paused) {
            lottie.classList.add('lottie-hidden');
            lottie.pause?.();
        }

        const handlePlay = () => {
            lottie.classList.remove('lottie-hidden');
            lottie.play?.();
        };

        const handlePause = () => {
            lottie.classList.add('lottie-hidden');
            lottie.pause?.();
        };

        const handleEnded = () => {
            lottie.classList.add('lottie-hidden');
            lottie.pause?.();
        };

        audio.addEventListener('play', handlePlay);
        audio.addEventListener('pause', handlePause);
        audio.addEventListener('ended', handleEnded);

        audio._listeners = { handlePlay, handlePause, handleEnded };
    }



    jQuery(container).find('#entrada img').each(function (index) {
        const imgSrc = jQuery(this).attr('src');
        const hasGalleryParent = jQuery(this).parents('figure.wp-block-gallery').length > 0;
        const imgLink = jQuery('<a>', {
            href: imgSrc,
            'data-lightbox': hasGalleryParent ? 'img-gallery' : 'img-' + (index + 1)
        });
        const imgElement = jQuery('<img>', {
            src: imgSrc
        });
        jQuery(this).wrap(imgLink).after(imgElement).remove();
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

            beforeLeave() {
                cleanupSinglePageScripts();
            },
            afterEnter({ next }) {
                initSinglePageScripts(next.container);
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
            namespace: 'archive-noticias',
            afterEnter() {
                initNoticiasPageScripts();
            }
        },
          {
            namespace: 'tax-categoria-noticia',
            afterEnter() {
                console.log('tax-categoria-noticia');
                initNoticiasPageScripts();
            }
        },

        ]
    });


    barba.hooks.afterLeave(() => {
        const oldPodcast = document.querySelector('#podcast');
        if (oldPodcast) {
            oldPodcast.remove();
        }

        const clone = document.querySelector('.podcasts #podcast');
        if (clone) clone.remove();
    });



    barba.hooks.afterEnter(() => {


        initClimaMarquee();


        const menu = document.getElementById('navbar-search');
        const toggle = document.querySelector('[data-collapse-toggle]');
        const links = menu?.querySelectorAll('a');

        /*
        const oldPodcast = document.querySelector('#podcast');
        if (oldPodcast) {
            oldPodcast.remove(); 
        }

        const clone = document.querySelector('.podcasts #podcast');
        if (clone) clone.remove();
*/

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