//dom acciones
console.log('news_eventos.js');

let div_control = document.getElementById('div_control_videos');


export function addNewView(cc, route_path = '', route_path_image = '') {
    div_control.innerHTML += `
        <div id="div${cc}" class="relative p-0.5">
            <dialog id="modal${cc}" class="bg-slate-100 rounded-2xl relative w-[50%] h-fit">
                <button id="bt_cerrar${cc}" type="button" class="absolute right-2 top-3 px-3 py-1 rounded-lg hover:border border-gray-600">
                    X
                </button>

                <div class="border-b border-gray-400 p-3 text-center">
                    <p class="font-semibold text-2xl"> titulo del video </p>
                </div>
                <div class="p-8  flex justify-center items-center">
                    <video id="model_video${cc}" class="  max-h-96 rounded-lg"
                    controls src="${route_path}">

                    </video>
                </div>

                <div class="h-14 border-t border-gray-400 ">

                </div>
            </dialog>

            <button type="button"
            id="bt_imagen${cc}"
            class="relative border-2 rounded-lg h-20 w-20 text-center flex justify-center items-center font-bold">
            <img id="img_imagen${cc}" class="h-20 w-20 opacity-80 border-2 rounded-lg" 
                src="${route_path_image}" alt="">
            <span id="img_contendio${cc}" class="absolute text-xs bottom-2">
                Listo para reproducir...${cc}
            </span>
            </button>

            <button id="bt_eliminar${cc}" class="absolute top-0 right-0 border p-2 rounded-lg bg-gray-800 opacity-50 hover:opacity-100">
                <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>


            <div class="flex justify-between p-1">
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

    //averigiar xq no crear uno por uno, osea enviando cc
    // crearEventos();
   
}

let cant_eventos = 0;
export function crearEventos () {
    cant_eventos++;	
    console.warn('creando eventos para: ' + cant_eventos	);
    for (let i = 0; i < videos.length; i++) {
   
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

        actualizandoNew(i, 'derecha');

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
// function actualizandoNew(){
//     console.log('hla xd xd nno');
// }

function clickIzquierda (i) {

    console.log('click en izquierda' + i);

    if (i > 0) {

        //actualizar en la base de datos 
        // 0,1,2,3, hacer peticoin post 

        actualizandoNew(i, 'izquierda');

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

    actualizandoNew(i, 'eliminar');
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


async function actualizandoNew (a,tipo ){
    // console.log('hla xd xd');
    let token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    // console.log($news);
    //0, 1, 2, 3,

    // debugger;
    let b = a - 1;
    if( tipo == 'derecha' ){
        b = a + 1;
    }else{
        if( tipo == 'eliminar' ){
            b = a;
        }
    }

    const formulario = {
        // 'tipo': mensaje, //mensaje
        'a': a, //posicion en la lista
        'b': b,
        'program_id': $programa_id, //porner en el blade
        "_token": token,
    };

    // console.log('formulario: ', formulario);
    // debugger;

    await fetch('/new/update', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json', // Indicar que estamos enviando datos en formato JSON
        },
        body: JSON.stringify(formulario), // Convertir el objeto JSON a una cadena JSON
    }).then((data) => data.json())
    .then((response) => {
        console.log('response:', response);
        // if(response.status == 'success'){
        //     onsole.error('success')
        // }else{
        //         console.error('ERROR mostrar mensaje de error')
        // }
    })
    .catch(err => {
        console.log('entre al error:', err)

    });
}