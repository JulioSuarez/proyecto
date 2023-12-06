import { addNewView , crearEventos} from './news_eventos.js';

//etiquestas de video
let ia_video = document.getElementById('ia_video'); 
let videoPreCargar = document.getElementById('videoPreCargar');
// console.log(videos);
// console.log($news);
$news.forEach(e => {
    videos[e.sort] = e.route_path;
    addNewView(e.sort, e.route_path,images_news[e.sort] );
    crearEventos();
});


//contador para leer videos 
let contador = 0;

document.getElementById('bt_play').addEventListener('click', function() {
    console.log('click en PLAY')
    // console.log(videos);
    //elegir video que se reproducira
    if (contador >= videos.length) {
        contador = 0;
    }

    // precargar video
    videoPreCargar.src = videos[calciularSigContador()];
    videoPreCargar.load();

    ia_video.src = videos[contador];
    ia_video.load();
    ia_video.play();

});

ia_video.addEventListener('play', function() {
    console.log('se reproduce en al posicion: '+ contador);
});

document.getElementById('bt_pause').addEventListener('click', function() {
    console.log('click en pause')
    ia_video.pause();
});

document.getElementById('bt_reset').addEventListener('click', function() {
    console.log('click en reset')
    contador = 0;
    ia_video.currentTime = 0;
    ia_video.play();
});


ia_video.addEventListener('ended', function() {
    console.log('se termino de reproducir el video');
    contador++;
    // console.log(contador);

    //elegir video que se reproducira
    if (contador >= videos.length) {
        contador = 0;
        ia_video.pause();
    }else{

    // precargar video
    console.log('contador = ' + contador);
    // console.log('contador++ = '+ calciularSigContador());
    // console.log('contador++ = ' calciularSigContador);
    videoPreCargar.src = videos[calciularSigContador()];
    videoPreCargar.load();



    console.log(videos[contador]);
    ia_video.src = videos[contador];

    ia_video.load();
    ia_video.play();
    }
});


//function
function calciularSigContador() {
    // console.log('contadorxd: '+contador++);
    let aux = contador + 1;
    console.log(('aux: ' + aux));
    if (aux >= videos.length) {
        aux = 0;
    }
    return aux;
}