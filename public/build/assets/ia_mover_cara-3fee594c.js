let b=document.getElementById("ip_mensaje"),p=document.getElementById("butom_ia"),v=document.getElementById("div_control_videos"),m=0,r="",n=0;const g="Z2FsYWNhbDYwNkBuZXdjdXBvbi5jb20:UGFyUJNzaZu0U5WzRqZe-",u="https://imgfz.com/i/QgIHbXC.jpeg";let c="",s="";m==0?(c="es-MX-GerardoNeural",s=u):(c="es-MX-DaliaNeural",s=u);console.log("hola desde ia_mover_cara.js");async function E(){try{n=videos.length;const e={script:{type:"text",input:b.value,provider:{type:"microsoft",voice_id:c,voice_config:{style:"Cheerful"}}},config:{stitch:!0,driver_expressions:{expressions:[{start_frame:0,expression:"surprise",intensity:1}]}},source_url:s};v.innerHTML+=`
                        <div id="div${n}" class="relative">
                            <dialog id="modal${n}" class="bg-slate-100 rounded-2xl relative w-[50%] h-fit">
                                <button id="bt_cerrar${n}" type="button" class="absolute right-2 top-3 px-3 py-1 rounded-lg hover:border border-gray-600">
                                    X
                                </button>

                                <div class="border-b border-gray-400 p-3 text-center">
                                     <p class="font-semibold text-2xl"> titulo del video </p>
                                </div>
                                <div class="p-8  flex justify-center items-center">
                                    <video id="model_video${n}" class="  max-h-96 rounded-lg"
                                    controls src="">

                                    </video>
                                </div>

                                <div class="h-14 border-t border-gray-400 ">

                                </div>
                            </dialog>

                            <button type="button"
                            id="bt_imagen${n}"
                            class="relative border-2 rounded-lg h-28 w-28 text-center flex justify-center items-center font-bold">
                            <img id="img_imagen${n}" class="h-28 w-28 opacity-80 border-2 rounded-lg" src="" alt="">
                            <span id="img_contendio${n}" class="absolute ">
                                Subiendo imagen...${n}
                            </span>
                            </button>

                            <button id="bt_eliminar${n}" class="absolute top-0 right-0 border p-2 rounded-lg bg-gray-800 opacity-50 hover:opacity-100">
                                <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>


                            <div class="flex justify-between px-3 py-1">
                                <button id="bt_izquierda${n}" class="hover:border px-1 rounded-md ">
                                    <svg class="w-5 h-5 text-gray-100 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                                      </svg>
                                </button>
                                <button id="bt_derecha${n}" class="hover:border px-1 rounded-md ">
                                    <svg class="w-5 h-5 text-gray-100 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                      </svg>
                                </button>
                            </div>

                        </div>
    `;let t=document.getElementById("img_contendio"+n),o=document.getElementById("img_imagen"+n),i=document.getElementById("model_video"+n);await fetch("https://api.d-id.com/talks",{method:"POST",headers:{"Content-Type":"application/json",Authorization:"Basic "+g},body:JSON.stringify(e)}).then(d=>d.json()).then(async d=>{t.textContent="Procesando video...",r=d.id,console.log("id_video:",r);let a="procesando";for(;a!=="done";)console.log(),await new Promise(l=>setTimeout(l,5e3)),await fetch("https://api.d-id.com/talks/"+r,{method:"GET",headers:{"Content-Type":"application/json",Authorization:"Basic "+g}}).then(l=>l.json()).then(l=>{console.log("respuesta:",l.status),a=l.status,l.status=="done"?(videos.push(l.result_url),t.textContent="Listo para reproducir"+n,o.src=l.source_url,i.src=l.result_url):console.warn("EL VIDEO SIGUE EN PROCESO")});console.log("termine de cargar")}).catch(d=>{console.log("entre al error:",d)}),console.log("fin xd xd"),h()}catch(e){console.error("Error al realizar el POST:",e)}}p.addEventListener("click",async function(){E()});let _=document.getElementById("img_hombre"),y=document.getElementById("img_mujer");document.getElementById("bt_hombre").addEventListener("click",function(){console.log("click en hombre"),m=0,y.classList.remove("border-blue-600"),_.classList.add("border-blue-600")});document.getElementById("bt_mujer").addEventListener("click",function(){console.log("click en mujer"),m=1,_.classList.remove("border-blue-600"),y.classList.add("border-blue-600")});function B(e){console.log("click abrir"+e),document.getElementById("modal"+e).showModal()}function I(e){console.log("click en cerrar modal"+e),document.getElementById("modal"+e).close()}function w(e){if(console.log("click en derech"+e),e+1<videos.length){let t=videos[e];videos[e]=videos[e+1],videos[e+1]=t;let o=document.getElementById("img_contendio"+e);t=o.textContent,o.textContent=document.getElementById("img_contendio"+(e+1)).textContent,document.getElementById("img_contendio"+(e+1)).textContent=t;let i=document.getElementById("img_imagen"+e);t=i.src,i.src=document.getElementById("img_imagen"+(e+1)).src,document.getElementById("img_imagen"+(e+1)).src=t;let d=document.getElementById("model_video"+e);t=d.src,d.src=document.getElementById("model_video"+(e+1)).src,document.getElementById("model_video"+(e+1)).src=t}else console.log("no se puede mover mas a la derecha, llego al limite")}function x(e){if(console.log("click en izquierda"+e),e>0){let t=videos[e];videos[e]=videos[e-1],videos[e-1]=t;let o=document.getElementById("img_contendio"+e);t=o.textContent,o.textContent=document.getElementById("img_contendio"+(e-1)).textContent,document.getElementById("img_contendio"+(e-1)).textContent=t;let i=document.getElementById("img_imagen"+e);t=i.src,i.src=document.getElementById("img_imagen"+(e-1)).src,document.getElementById("img_imagen"+(e-1)).src=t;let d=document.getElementById("model_video"+e);t=d.src,d.src=document.getElementById("model_video"+(e-1)).src,document.getElementById("model_video"+(e-1)).src=t}else console.log("no se puede mover mas a la izquierda, llego al limite")}function f(e){console.log("click en elimina"+e),videos.splice(e,1);for(let o=e;o<videos.length;o++)k(o);let t=document.getElementById("div"+videos.length);console.log("div: ",t,"videos.length: ",videos.length),t.remove(),console.log(v)}const h=()=>{for(let e=0;e<videos.length;e++)console.warn("creando eventos para: "+e),document.getElementById("bt_imagen"+e).addEventListener("click",()=>B(e)),document.getElementById("bt_cerrar"+e).addEventListener("click",()=>I(e)),document.getElementById("bt_derecha"+e).addEventListener("click",()=>w(e)),document.getElementById("bt_izquierda"+e).addEventListener("click",()=>x(e)),document.getElementById("bt_eliminar"+e).addEventListener("click",()=>f(e))},k=e=>{console.log("mificarIndica: ",e);let t=document.getElementById("model_video"+e),o=document.getElementById("model_video"+(e+1));t.src=o.src;let i=document.getElementById("img_imagen"+e);o=document.getElementById("img_imagen"+(e+1)),i.src=o.src;let d=document.getElementById("img_contendio"+e);o=document.getElementById("img_contendio"+(e+1)),d.textContent=o.textContent};h();
