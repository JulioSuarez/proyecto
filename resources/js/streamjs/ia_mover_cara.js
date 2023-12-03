// let ia_video = document.getElementById('ia_video');
let ip_mensaje = document.getElementById('ip_mensaje');
let butom_ia = document.getElementById('butom_ia');
let bt_mostrar_video = document.getElementById(' bt_mostrar_video');
let div_control = document.getElementById('div_control_videos');
let genero = 0; //0 = hombre, 1 = mujer
let id_video = '';




const apiKeyDId = 'bnVzdGlqaWtub0BndWZ1bS5jb20:adFca_o7gfTMrl79dQgOa';
const imagen_url = 'https://imgfz.com/i/QgIHbXC.jpeg';

let voz = '';
let url_imagen = '';
if(genero == 0){
    voz = 'es-MX-GerardoNeural';
    url_imagen = imagen_url;
}else{
    voz = 'es-MX-DaliaNeural';
    url_imagen = imagen_url;
}

console.log('hola desde ia_mover_cara.js');


async function postCargarFoto() {

  try {

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
    bt_mostrar_video.classList.remove('btn-green');
    bt_mostrar_video.classList.add('btn-red');

    let new_video = document.createElement('div');
    new_video.className = 'border-2 rounded-lg bg-blue-600 h-28 w-28 text-center flex justify-center items-center font-bold';
    new_video.textContent = 'Subiendo Imagen...';

    let new_img = document.createElement('img');

    new_video.appendChild(new_img);
    div_control.appendChild(new_video);
   

    bt_mostrar_video.textContent = 'Subiendo Imagen...';

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
            

          bt_mostrar_video.textContent = 'Procesando video...';
          //poner el boton en la lista de control de videos 
          new_video.textContent = 'Procesando video...';
          new_video.classList.remove('bg-blue-600');
          // new_img.src = response.source_url;
          new_img.src = "https://i.pinimg.com/550x/b6/a3/d0/b6a3d082786c2b16f28d24ddf7cb88f2.jpg"

          
            id_video = response.id;
            console.log('id_video:',id_video);
            // bt_mostrar_video.textContent = 'Procesando...';
            

            let estado = 'procesando';

            while (estado !== 'done') {
               // Esperar un tiempo antes de realizar la siguiente verificación
               console.log();('esperando 5 segundos')
               await new Promise(resolve => setTimeout(resolve, 5000)); // Esperar 5 segundos
      

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
            estado = respuesta.status;

            if(respuesta.status == 'done'){
                // mp4_video = respuesta.result_url;
                // console.log('mp4_video:',mp4_video);
                // ia_video.src = respuesta.result_url;
              //agregar al array 
                videos.push(respuesta.result_url);
                
                // ia_video.classList.remove('hidden');
                // document.getElementById('xdxd').classList.add('hidden')
                bt_mostrar_video.textContent = 'Reproduciendo...';
                bt_mostrar_video.classList.remove('btn-red');
                bt_mostrar_video.classList.add('btn-green');

                new_video.textContent = '';
                new_video.classList.remove('bg-blue-600');
                new_video.classList.add('bg-red-500');
                // new_img.src = respuesta.result_url;


            }else{
                console.warn('EL VIDEO SIGUE EN PROCESO')
            }

            })
             
          }
          console.log('termine de cargar')

        })
        .catch(err => {
            console.log('entre al error:',err)
        });
        console.log('fin xd xd')




    } catch (error) {
      console.error('Error al realizar el POST:', error);
  }

}



//realizando una peticion a la ia 
butom_ia.addEventListener('click',async function () {

  //ejecuat la funcion post de la ap
  postCargarFoto()
        
});


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

