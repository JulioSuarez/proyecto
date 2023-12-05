// let ia_video = document.getElementById('ia_video');
let ip_mensaje = document.getElementById('ip_mensaje');
let butom_ia = document.getElementById('butom_ia');
let div_control = document.getElementById('div_control_videos');
let genero = 0; //0 = hombre, 1 = mujer
let id_video = '';
let cc = 0;


const apiKeyDId = 'Z2FsYWNhbDYwNkBuZXdjdXBvbi5jb20:UGFyUJNzaZu0U5WzRqZe-';
const imagen_url = 'https://imgfz.com/i/QgIHbXC.jpeg';

let voz = '';
let url_imagen = '';
if (genero == 0) {
    voz = 'es-MX-GerardoNeural';
    url_imagen = imagen_url;
} else {
    voz = 'es-MX-DaliaNeural';
    url_imagen = imagen_url;
}

console.log('hola desde ia_mover_cara.js');


async function postCargarFoto() {

    try {
        cc = videos.length;
        // console.log('cc: ', cc);
        
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

        // let new_img = document.createElement('img');
        // new_img.className = 'h-28 w-28 opacity-80 border-2 rounded-lg';
       

        div_control.innerHTML += `
                        <div id="div${cc}" class="relative">
                            <dialog id="modal${cc}" class="bg-slate-100 rounded-2xl relative w-[50%] h-fit">
                                <button id="bt_cerrar${cc}" type="button" class="absolute right-2 top-3 px-3 py-1 rounded-lg hover:border border-gray-600">
                                    X
                                </button>

                                <div class="border-b border-gray-400 p-3 text-center">
                                     <p class="font-semibold text-2xl"> titulo del video </p>
                                </div>
                                <div class="p-8  flex justify-center items-center">
                                    <video id="model_video${cc}" class="  max-h-96 rounded-lg"
                                    controls src="">

                                    </video>
                                </div>

                                <div class="h-14 border-t border-gray-400 ">

                                </div>
                            </dialog>

                            <button type="button"
                            id="bt_imagen${cc}"
                            class="relative border-2 rounded-lg h-28 w-28 text-center flex justify-center items-center font-bold">
                            <img id="img_imagen${cc}" class="h-28 w-28 opacity-80 border-2 rounded-lg" src="" alt="">
                            <span id="img_contendio${cc}" class="absolute ">
                                Subiendo imagen...${cc}
                            </span>
                            </button>

                            <button id="bt_eliminar${cc}" class="absolute top-0 right-0 border p-2 rounded-lg bg-gray-800 opacity-50 hover:opacity-100">
                                <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>


                            <div class="flex justify-between px-3 py-1">
                                <button id="bt_izquierda${cc}" class="hover:border px-1 rounded-md ">
                                    <svg class="w-5 h-5 text-gray-100 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                                      </svg>
                                </button>
                                <button id="bt_derecha${cc}" class="hover:border px-1 rounded-md ">
                                    <svg class="w-5 h-5 text-gray-100 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                      </svg>
                                </button>
                            </div>

                        </div>
    `;

   

        
        let new_span = document.getElementById('img_contendio' + cc);
        let new_img = document.getElementById('img_imagen' + cc);
        let model_video = document.getElementById('model_video' + cc);

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

                new_span.textContent = 'Procesando video...';


                id_video = response.id;
                console.log('id_video:', id_video);


                let estado = 'procesando';

                while (estado !== 'done') {
                    // Esperar un tiempo antes de realizar la siguiente verificación
                    console.log(); ('esperando 5 segundos')
                    await new Promise(resolve => setTimeout(resolve, 5000)); // Esperar 5 segundos


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
                            console.log('respuesta:', respuesta.status);
                            estado = respuesta.status;

                            if (respuesta.status == 'done') {
                                videos.push(respuesta.result_url);

                                new_span.textContent = 'Listo para reproducir' + cc;
                                new_img.src = respuesta.source_url;
                                model_video.src = respuesta.result_url;


                            } else {
                                console.warn('EL VIDEO SIGUE EN PROCESO')
                            }

                        })

                }
                console.log('termine de cargar')

            })
            .catch(err => {
                console.log('entre al error:', err)
            });
        console.log('fin xd xd')
        crearEventos();
        // cc++;

    } catch (error) {
        console.error('Error al realizar el POST:', error);
    }

}


//realizando una peticion a la ia
butom_ia.addEventListener('click', async function () {
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




//eventos de los botones
// let i_endice = 0;

function abriModal(i) {
    console.log('click abrir' + i);
    document.getElementById('modal' + i).showModal();
}

function cerrarModal(i) {
    console.log('click en cerrar modal' + i);
    document.getElementById('modal' + i).close();
}


function clickDerecha(i) {

    console.log('click en derech' + i);

    if (i + 1 < videos.length) {
        // console.log('ahora i vale: ', i);
        //lista de reproduccion
        let aux = videos[i];
        videos[i] = videos[i + 1];
        videos[i + 1] = aux;

        //texto
        let new_span = document.getElementById('img_contendio' + i);
        aux = new_span.textContent;
        new_span.textContent = document.getElementById('img_contendio' + (i + 1)).textContent;
        document.getElementById('img_contendio' + (i + 1)).textContent = aux;

        //imagen
        let new_img = document.getElementById('img_imagen' + i);
        aux = new_img.src;
        new_img.src = document.getElementById('img_imagen' + (i + 1)).src;
        document.getElementById('img_imagen' + (i + 1)).src = aux;

        //video
        let new_video = document.getElementById('model_video' + i);
        aux = new_video.src;
        new_video.src = document.getElementById('model_video' + (i + 1)).src;
        document.getElementById('model_video' + (i + 1)).src = aux;
    } else {
        console.log('no se puede mover mas a la derecha, llego al limite')
    }

}

function clickIzquierda (i) {

    console.log('click en izquierda' + i);

    if (i > 0) {
        //lista de reproduccion
        let aux = videos[i];
        videos[i] = videos[i - 1];
        videos[i - 1] = aux;

        //     //texto
        let new_span = document.getElementById('img_contendio' + i);
        aux = new_span.textContent;
        new_span.textContent = document.getElementById('img_contendio' + (i - 1)).textContent;
        document.getElementById('img_contendio' + (i - 1)).textContent = aux;

        //     //imagen
        let new_img = document.getElementById('img_imagen' + i);
        aux = new_img.src;
        new_img.src = document.getElementById('img_imagen' + (i - 1)).src;
        document.getElementById('img_imagen' + (i - 1)).src = aux;

        // video
        let new_video = document.getElementById('model_video' + i);
        aux = new_video.src;
        new_video.src = document.getElementById('model_video' + (i - 1)).src;
        document.getElementById('model_video' + (i - 1)).src = aux;
    } else {
        console.log('no se puede mover mas a la izquierda, llego al limite')
    }


}

function eliminarDiv(i) {

    // let i = i_endice;
    console.log('click en elimina' + i);
    //lista de reproduccion
    videos.splice(i, 1);

    //vamos a eliminar el ultimo div, pa eso necesitamos mover todos los datos 
  //  0 1 2
    for (let c = i; c < videos.length; c++) {
        mificarIndica(c);
    }

    //remover el ultimo
    let div = document.getElementById('div' + videos.length);
    console.log('div: ', div, 'videos.length: ', videos.length);
    div.remove();
    console.log(div_control);
}




const crearEventos = () => {

    for (let i = 0; i < videos.length; i++) {

    console.warn('creando eventos para: ' + i);
    document.getElementById('bt_imagen' + i)
        .addEventListener('click',()=> abriModal(i) );

    document.getElementById('bt_cerrar' + i)
        .addEventListener('click',()=> cerrarModal(i));

    document.getElementById('bt_derecha' + i)
        .addEventListener('click',()=> clickDerecha(i));

    document.getElementById('bt_izquierda' + i)
        .addEventListener('click',()=> clickIzquierda(i) );

    document.getElementById('bt_eliminar' + i)
        .addEventListener('click', () => eliminarDiv(i) );
    }
}


const mificarIndica = (indice) => {
    console.log('mificarIndica: ', indice);
    //video
    let modal_video = document.getElementById('model_video' + indice);
    let aux = document.getElementById('model_video' + (indice + 1));
    modal_video.src = aux.src;

    //imagen
    let img_imagen = document.getElementById('img_imagen' + indice);
    aux = document.getElementById('img_imagen' + (indice + 1));
    img_imagen.src = aux.src;

    let img_contendio = document.getElementById('img_contendio' + indice);
    aux = document.getElementById('img_contendio' + (indice + 1));
    img_contendio.textContent = aux.textContent;


}


// const eliminarEventos = () => {

//     for (let i = 0; i < videos.length; i++) {
//         i_endice = i;
//     console.warn('creando eventos para: ' + i);
//     document.getElementById('bt_imagen' + i)
//         .removeEventListener('click',  abriModal );

//     document.getElementById('bt_cerrar' + i)
//         .removeEventListener('click', cerrarModal);

//     document.getElementById('bt_derecha' + i)
//         .removeEventListener('click', clickDerecha);

//     document.getElementById('bt_izquierda' + i)
//         .removeEventListener('click', clickIzquierda );

//     document.getElementById('bt_eliminar' + i)
//         .removeEventListener('click', () =>  eliminarDiv(i) );

//     }
// }



// var miBoton = document.getElementById('prueba');
// var miBoton2 = document.getElementById('prueba2');


// function miFuncionEvento() {
//     console.log('click en prueba');

//     // Intentar eliminar el evento desde el mismo contexto
//     // miBoton.removeEventListener('click', miFF(1));
//     document.getElementById('bt_eliminar' + 2)
//     .removeEventListener('click', function(){
//         eliminarDiv(2);
//     });


// }

// const miFF = (i) => () => miFuncionEvento(i);


// Agregar el evento
// miBoton.addEventListener('click', miFuncionEvento);


// miBoton2.addEventListener('click', function () {
//     console.log('click en prueba2');
//     // Intentar eliminar el evento desde el mismo contexto
//     miBoton.removeEventListener('click', miFF(1));
// });



// crearEventos();

crearEventos();
// crearEventos(1);
// crearEventos(2);
