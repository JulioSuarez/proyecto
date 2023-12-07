import { addNewView , crearEventos} from './news_eventos.js';

console.log('hola desde ia_mover_cara.js');

// let ia_video = document.getElementById('ia_video');
let butom_ia = document.getElementById('butom_ia');
// let genero = 0; //0 = hombre, 1 = mujer


const apiKeyDId = 'dmlsbWVjYXN0b0BndWZ1bS5jb20:XkqeCy4ddaOBlfaTBOh38';
let imagen_url = ''; //validar que no este vacio
//https://imgfz.com/i/QgIHbXC.jpeg foto de julico




async function postCargarFoto() {

    try {
        let cc = videos.length;
        console.log('cc='+cc);
     
        let animacion =  document.querySelector('input[name="animacion"]:checked');
        let gender =  document.querySelector('input[name="voces"]:checked');
        let ip_mensaje = document.getElementById('ip_mensaje');
        // console.log('ip_mensaje: ', ip_mensaje.value);
        // console.log('gender: ', gender.value);
        // console.log('animacion: ', animacion.value);

        // console.log('cc: ', cc);

        let voz = "es-MX-GerardoNeural";
        if( gender.value == 0){
            voz = "es-MX-DaliaNeural";
        }

        console.log('voz: ', voz);
        
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
                            "expression": animacion.value,
                            "intensity": 1
                        }
                    ]
                },
            },
            source_url: imagen_url,  //aqui va ser de un avatar
        };

       
        addNewView(cc);
        
        let new_span = document.getElementById('img_contendio' + cc);
        let new_img = document.getElementById('img_imagen' + cc);
        let model_video = document.getElementById('model_video' + cc);

        // console.log('new_span: ', new_span);
        // console.log('new_img: ', new_img);
        // console.log('model_video: ', model_video);
        // console.log('formulario: ', formulario);
       
        //POST crear video d-id
       await fetch('https://api.d-id.com/talks', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json', // Indicar que estamos enviando datos en formato JSON
                'Authorization': 'Basic ' + apiKeyDId, // Encabezado de autenticación con token
            },
            body: JSON.stringify(formulario), // Convertir el objeto JSON a una cadena JSON
        })
            .then((data) => data.json())
            .then(async (response) => {
                console.log(response);
                new_span.textContent = 'Procesando video...';

                let id_video = response.id;
                console.log('id_video:', id_video);

                let estado = 'procesando';
              
                while (estado !== 'done') {
                    // Esperar un tiempo antes de realizar la siguiente verificación
                    console.log(); ('esperando 5 segundos')
                    await new Promise(resolve => setTimeout(resolve, 5000)); // Esperar 5 segundos

                    //GET al video de i-id
                    await fetch('https://api.d-id.com/talks/' + id_video, { //'tlk_Xye4C03vIGPPx3Bzeo-_5
                        method: 'GET',
                        headers: {
                            'Content-Type': 'application/json', // Indicar que estamos enviando datos en formato JSON
                            'Authorization': 'Basic ' + apiKeyDId, // Encabezado de autenticación con token
                        },
                    })
                        .then((data) => data.json())
                        .then((respuesta) => {
                            //quitar animacion y poner video
                            console.log('respuesta:', respuesta);
                            estado = respuesta.status;

                            if (respuesta.status == 'done') {
                                videos.push(respuesta.result_url);

                                new_span.textContent = 'Listo para reproducir' + cc;
                                new_img.src = respuesta.source_url;
                                model_video.src = respuesta.result_url;

                                // debugger;
                                //subir a la base de datos
                                subirNewVideo(cc,respuesta.result_url, ip_mensaje.value,  gender.value, animacion.value);
                                crearEventos();

                            } else {
                                if(respuesta.status == 'error'){
                                    console.error('ERROR mostrar mensaje de error')
                                }else{
                                    console.warn('EL VIDEO SIGUE EN PROCESO')
                                }
                            }

                        })

                }

                console.log('termine de cargar')

            })
            .catch(err => {
                console.log('entre al error:', err)
            });
        console.log('fin xd xd')

    } catch (error) {
        console.error('Error al realizar el POST:', error);
    }

}


//realizando una peticion a la ia
butom_ia.addEventListener('click', async function () {
    
    let ip_mensaje = document.getElementById('ip_mensaje');
    let ip_error = document.getElementById('ip_error');
    //validar de que sean minimo 3 letras 
    if (ip_mensaje.value.length < 3 || imagen_url == '') {
        if( imagen_url == ''){
            ip_error.textContent = "*selecciona un avatar" ;
        }else{
            ip_error.textContent = "*minimum 3 characters" ;
        }

   
    }else{
        ip_error.textContent = '';
        postCargarFoto();
    }
    //prueba de subri video a la base de datos 
    // subirNewVideo(0,'https://d-id-talks-prod.s3.us-west-2.amazonaws.com/auth0%7C656bedcf106159f3792da7c9/tlk_EUeBvDaHJ240UOM0U5dFF/1701593320368.mp4?AWSAccessKeyId=AKIA5CUMPJBIK65W6FGA&Expires=1701679726&Signature=OZM2jbzzQeQh25zInfg6zsSQqEE%3D&X-Amzn-Trace-Id=Root%3D1-656c40ee-2f2420c62dfb8953697d030a%3BParent%3Dfd4422fdb4572f2e%3BSampled%3D1%3BLineage%3D6b931dd4%3A0', ip_mensaje.value, '1', 'happy');
});



//metood para subir new videos a la base de datos
const subirNewVideo = async (sort,result_url,mensaje,voz,animacion ) => {
    console.log('subiendo video a la base de datos');

    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
    console.log('token: ', token);

    //buscar quien esta seleccionado en el input avatar
    let avatar = document.querySelector('input[name="avatar"]:checked');

    try {
        const formulario = {
            'message': mensaje, //mensaje
            'expression': animacion, //animacion
            'gender': voz, //voz
            'route_path': result_url, //url del video 
            'sort': sort, //posicion en la lista
            'avatar_id': avatar.value, //sacar del input seleccionado
            'program_id': $programa_id, //porner en el blade
            "_token": token,
        };


        await fetch('/new/store', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json', // Indicar que estamos enviando datos en formato JSON
            },
            body: JSON.stringify(formulario), // Convertir el objeto JSON a una cadena JSON
        })
            .then((data) => data.json())
            .then((response) => {
                console.warn('response:', response);

                if(response.status == 'success'){
                    //se agrego la base de datos 
                    //devolver para que se actualice la lista de videos

                    //quitar un cretido!!
                    let credits = document.getElementById('credits');
                    credits.textContent = response.credits;
                    console.log('Creditos actualizados');
                    //se puede mostar un alert




                }else{
                    //hubo un error en la base de datos

                    //mostrar mensaje de error y 
                    //eliminar ultimo video
                }




            })
            .catch(err => {
                console.log('entre al error:', err)

            });
        console.log('fin xd xd')

    } catch (error) {
        console.error('Error al realizar el POST:', error);
    }
}




//seleccionar avatar 

// let avatars = document.querySelectorAll('input[type="radio"][name]');

// avatars.forEach((avatar) => {
//     avatar.addEventListener('click', function () {
//         console.log('avatar seleccionado: ', avatar.value);
//         imagen_url = avatar.value;
//     });
// });

// let len_avatar = document.getElementById('len_avatar');
for (let i = 0; i < $len_avatars; i++) {
    let avatar = document.getElementById('img_avatar' + i);
    // console.log(avatar);
    avatar.addEventListener('click', function () {
        // console.log('avatar seleccionado: ', avatar);
        //agregar a la iista principal
        document.getElementById('foto_seleccionada').src = avatar.src;
        imagen_url = avatar.src;
    });
}

