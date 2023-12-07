console.log("news_eventos.js");let s=document.getElementById("div_control_videos");function _(e,t="",o="http://imgfz.com/i/RXqL27N.jpeg"){s.innerHTML+=`
        <div id="div${e}" class="relative p-0.5">
            <dialog id="modal${e}" class="bg-slate-100 rounded-2xl relative w-[50%] h-fit">
                <button id="bt_cerrar${e}" type="button" class="absolute right-2 top-3 px-3 py-1 rounded-lg hover:border border-gray-600">
                    X
                </button>

                <div class="border-b border-gray-400 p-3 text-center">
                    <p class="font-semibold text-2xl"> titulo del video </p>
                </div>
                <div class="p-8  flex justify-center items-center">
                    <video id="model_video${e}" class="  max-h-96 rounded-lg"
                    controls src="${t}">

                    </video>
                </div>

                <div class="h-14 border-t border-gray-400 ">

                </div>
            </dialog>

            <button type="button"
            id="bt_imagen${e}"
            class="relative border-2 rounded-lg h-20 w-20 text-center flex justify-center items-center font-bold">
            <img id="img_imagen${e}" class="h-20 w-20 opacity-80 border-2 rounded-lg" 
                src="${o}" alt="">
            <span id="img_contendio${e}" class="absolute text-xs bottom-2">
                Listo para reproducir...${e}
            </span>
            </button>

            <button id="bt_eliminar${e}" class="absolute top-0 right-0 border p-2 rounded-lg bg-gray-800 opacity-50 hover:opacity-100">
                <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                </svg>
            </button>


            <div class="flex justify-between p-1">
                <button id="bt_izquierda${e}" class="hover:border px-1 rounded-md ">
                    <svg class="w-5 h-5 text-gray-100 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                    </svg>
                </button>
                <button id="bt_derecha${e}" class="hover:border px-1 rounded-md ">
                    <svg class="w-5 h-5 text-gray-100 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </button>
            </div>

        </div>
    `}let i=0;function y(){i++,console.warn("creando eventos para: "+i);for(let e=0;e<videos.length;e++)document.getElementById("bt_imagen"+e).addEventListener("click",()=>c(e)),document.getElementById("bt_cerrar"+e).addEventListener("click",()=>m(e)),document.getElementById("bt_derecha"+e).addEventListener("click",()=>a(e)),document.getElementById("bt_izquierda"+e).addEventListener("click",()=>g(e)),document.getElementById("bt_eliminar"+e).addEventListener("click",()=>u(e))}function c(e){console.log("click abrir"+e),document.getElementById("modal"+e).showModal()}function m(e){console.log("click en cerrar modal"+e),document.getElementById("modal"+e).close()}function a(e){if(console.log("click en derech"+e),e+1<videos.length){r(e,"derecha");let t=videos[e];videos[e]=videos[e+1],videos[e+1]=t;let o=document.getElementById("img_contendio"+e);t=o.textContent,o.textContent=document.getElementById("img_contendio"+(e+1)).textContent,document.getElementById("img_contendio"+(e+1)).textContent=t;let n=document.getElementById("img_imagen"+e);t=n.src,n.src=document.getElementById("img_imagen"+(e+1)).src,document.getElementById("img_imagen"+(e+1)).src=t;let d=document.getElementById("model_video"+e);t=d.src,d.src=document.getElementById("model_video"+(e+1)).src,document.getElementById("model_video"+(e+1)).src=t}else console.log("no se puede mover mas a la derecha, llego al limite")}function g(e){if(console.log("click en izquierda"+e),e>0){r(e,"izquierda");let t=videos[e];videos[e]=videos[e-1],videos[e-1]=t;let o=document.getElementById("img_contendio"+e);t=o.textContent,o.textContent=document.getElementById("img_contendio"+(e-1)).textContent,document.getElementById("img_contendio"+(e-1)).textContent=t;let n=document.getElementById("img_imagen"+e);t=n.src,n.src=document.getElementById("img_imagen"+(e-1)).src,document.getElementById("img_imagen"+(e-1)).src=t;let d=document.getElementById("model_video"+e);t=d.src,d.src=document.getElementById("model_video"+(e-1)).src,document.getElementById("model_video"+(e-1)).src=t}else console.log("no se puede mover mas a la izquierda, llego al limite")}function u(e){console.log("click en elimina"+e),videos.splice(e,1);for(let o=e;o<videos.length;o++)v(o);let t=document.getElementById("div"+videos.length);console.log("div: ",t,"videos.length: ",videos.length),t.remove(),console.log(s),r(e,"eliminar")}const v=e=>{console.log("mificarIndica: ",e);let t=document.getElementById("model_video"+e),o=document.getElementById("model_video"+(e+1));t.src=o.src;let n=document.getElementById("img_imagen"+e);o=document.getElementById("img_imagen"+(e+1)),n.src=o.src;let d=document.getElementById("img_contendio"+e);o=document.getElementById("img_contendio"+(e+1)),d.textContent=o.textContent};async function r(e,t){let o=document.querySelector('meta[name="csrf-token"]').getAttribute("content"),n=e-1;t=="derecha"?n=e+1:t=="eliminar"&&(n=e);const d={a:e,b:n,program_id:$programa_id,_token:o};await fetch("/new/update",{method:"POST",headers:{"Content-Type":"application/json"},body:JSON.stringify(d)}).then(l=>l.json()).then(l=>{console.log("response:",l)}).catch(l=>{console.log("entre al error:",l)})}export{_ as a,y as c};
