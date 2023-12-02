let ia_video = document.getElementById('ia_video');
let ip_mensaje = document.getElementById('ip_mensaje');
let butom_ia = document.getElementById('butom_ia');
let  bt_mostrar_video = document.getElementById(' bt_mostrar_video');
let genero = 0; //0 = hombre, 1 = mujer
let id_video = '';
let mp4_video = '';

const apiKeyDId = 'Y29raWtpNzA0MUBidXN0YXllcy5jb20:aC2rsfK9WxHjgWKhvJK2c';
const imagen_url = 'https://imgfz.com/i/QgIHbXC.jpeg';


//realizando una peticion a la ia 
butom_ia.addEventListener('click',async function () {
    console.log('hola');
    // console.log(genero)
    let voz = '';
    let url_imagen = '';
    if(genero == 0){
        voz = 'es-MX-GerardoNeural';
        url_imagen = imagen_url;
    }else{
        voz = 'es-MX-DaliaNeural';
        url_imagen = imagen_url;
    }
    
   
    const formulario = {
        script: {
          type: 'text',
          input: ip_mensaje.value,
          provider: {
            type: 'microsoft',
            voice_id: voz,
            voice_config: {
              style: 'Cheerful',
            },
          },
        },
        config: {
          stitch: true,
          "driver_expressions": {
            "expressions": [
              {
                "start_frame": 0,
                "expression": "surprise",
                "intensity": 1
              }
            ]
          },
        },
        source_url: url_imagen,
      };

      //poder animacion de cargando 
      bt_mostrar_video.classList.remove('hidden');
      bt_mostrar_video.value = 'Cargando...';
      
      await fetch('https://api.d-id.com/talks', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json', // Indicar que estamos enviando datos en formato JSON
          'Authorization': 'Basic '+apiKeyDId, // Encabezado de autenticación con token
        },
        body: JSON.stringify(formulario), // Convertir el objeto JSON a una cadena JSON
      })
        .then((data) => data.json())
        .then(async(response) => {
            
            console.log('entee a response')
            console.log(response);
            
            //vovler a hacer una peticion para obtener el video
            id_video = response.id;
            console.log('id_video:',id_video);
            bt_mostrar_video.value = 'Procesando...';
            await fetch('https://api.d-id.com/talks/'+id_video,{
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json', // Indicar que estamos enviando datos en formato JSON
                    'Authorization': 'Basic '+apiKeyDId, // Encabezado de autenticación con token
                  },
            })
            .then((data) => data.json())
            .then((respuesta) => {
            //quitar animacion y poner video
            // console.log('respuesta:',respuesta);
            bt_mostrar_video.value = 'Mostrar video!!';
            bt_mostrar_video.classList.remove('disabled');
      
            })
            .catch(err => {
                console.log('entre al error en el 1er post:',err)
            });

        })
        .catch(err => {
            console.log('entre al error:',err)
        });
        console.log('fin xd xd')
        
});

//array de videos
let videos = [
      "{{ asset('/videos/video_prueba.mp4')  }}",
      "{{ asset('/videos/video1.mp4')  }}",
      "{{ asset('/videos/video2.mp4')  }}",
      "{{ asset('/videos/video3.mp4')  }}",
];
let contador = 0;

let img_hombre = document.getElementById('img_hombre')
let img_mujer = document.getElementById('img_mujer')


document.getElementById('bt_hombre').addEventListener('click', function () {
    console.log('click en hombre')
    genero = 0;
    img_mujer.classList.remove('border-blue-600');
    img_hombre.classList.add('border-blue-600');
});

document.getElementById('bt_mujer').addEventListener('click', function () {
   console.log('click en mujer')
    genero = 1;
    img_hombre.classList.remove('border-blue-600');
    img_mujer.classList.add('border-blue-600');
});

document.getElementById('bt_pause').addEventListener('click', function () {
    console.log('click en pause')
    ia_video.pause();
});

document.getElementById('bt_play').addEventListener('click', function () {
    console.log('click en PLAY')

    //elegir video que se reproducira
    if( contador >= videos.length ){
       contador = 0;
    }

    console.log(videos[contador]);

    let video_src = document.getElementById('video_src');
    video_src.scr = videos[contador];

    ia_video.play();
    
});

ia_video.addEventListener('play', function () {
  console.log('se incio el video');
  // if( contador = videos.length ){
  //   contador = 0;
  //   }

  //   ia_video.src = videos[contador];
  //   ia_video.play();
});


ia_video.addEventListener('ended', function () {
    console.log('se termino de reproducir el video');
    // contador++;
    // ia_video.play();
});


bt_mostrar_video.addEventListener('click',async function () {
    console.log('click en mostrar video')
    await fetch('https://api.d-id.com/talks/'+id_video,{ //'tlk_Xye4C03vIGPPx3Bzeo-_5
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json', // Indicar que estamos enviando datos en formato JSON
                    'Authorization': 'Basic '+apiKeyDId, // Encabezado de autenticación con token
                  },
            })
            .then((data) => data.json())
            .then((respuesta) => {
            //quitar animacion y poner video
            console.log('respuesta:',respuesta.status);
            if(respuesta.status == 'done'){
                mp4_video = respuesta.result_url;
                console.log('mp4_video:',mp4_video);
                ia_video.src = respuesta.result_url;
                ia_video.classList.remove('hidden');
                document.getElementById('xdxd').classList.add('hidden')

            }else{
                console.warn('EL VIDEO SIGUE EN PROCESO')
            }
            })
        console.log('termine de cargar')
});


let ai_video2 = document.getElementById('ai_video2');
ia_video2.addEventListener('play', function () {
  console.log('se incio el video');

});
ia_video2.addEventListener('ended', function () {
    console.log('se termino de reproducir el video');

});