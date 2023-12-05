let p=document.getElementById("ip_mensaje"),h=document.getElementById("butom_ia"),E=document.getElementById("div_control_videos"),m=0,c="",o=0;const g="Z2FsYWNhbDYwNkBuZXdjdXBvbi5jb20:UGFyUJNzaZu0U5WzRqZe-",v="https://imgfz.com/i/QgIHbXC.jpeg";let s="",a="";m==0?(s="es-MX-GerardoNeural",a=v):(s="es-MX-DaliaNeural",a=v);console.log("hola desde ia_mover_cara.js");async function B(){try{const e={script:{type:"text",input:p.value,provider:{type:"microsoft",voice_id:s,voice_config:{style:"Cheerful"}}},config:{stitch:!0,driver_expressions:{expressions:[{start_frame:0,expression:"surprise",intensity:1}]}},source_url:a};E.innerHTML+=`
                        <div id="div${o}" class="relative">
                            <dialog id="modal${o}" class="bg-slate-100 rounded-2xl relative w-[50%] h-fit">
                                <button id="bt_cerrar${o}" type="button" class="absolute right-2 top-3 px-3 py-1 rounded-lg hover:border border-gray-600">
                                    X
                                </button>

                                <div class="border-b border-gray-400 p-3 text-center">
                                     <p class="font-semibold text-2xl"> titulo del video </p>
                                </div>
                                <div class="p-8  flex justify-center items-center">
                                    <video id="model_video${o}" class="  max-h-96 rounded-lg"
                                    controls src="">

                                    </video>
                                </div>

                                <div class="h-14 border-t border-gray-400 ">

                                </div>
                            </dialog>

                            <button type="button"
                            id="bt_imagen${o}"
                            class="relative border-2 rounded-lg h-28 w-28 text-center flex justify-center items-center font-bold">
                            <img id="img_imagen${o}" class="h-28 w-28 opacity-80 border-2 rounded-lg" src="" alt="">
                            <span id="img_contendio${o}" class="absolute ">
                                Subiendo imagen...${o}
                            </span>
                            </button>

                            <button id="bt_eliminar${o}" class="absolute top-0 right-0 border p-2 rounded-lg bg-gray-800 opacity-50 hover:opacity-100">
                                <svg class="w-4 h-4 text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                                </svg>
                            </button>


                            <div class="flex justify-between px-3 py-1">
                                <button id="bt_izquierda${o}" class="hover:border px-1 rounded-md ">
                                    <svg class="w-5 h-5 text-gray-100 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 5H1m0 0 4 4M1 5l4-4"/>
                                      </svg>
                                </button>
                                <button id="bt_derecha${o}" class="hover:border px-1 rounded-md ">
                                    <svg class="w-5 h-5 text-gray-100 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                                      </svg>
                                </button>
                            </div>

                        </div>
    `;let t=document.getElementById("img_contendio"+o),l=document.getElementById("img_imagen"+o),r=document.getElementById("model_video"+o);await fetch("https://api.d-id.com/talks",{method:"POST",headers:{"Content-Type":"application/json",Authorization:"Basic "+g},body:JSON.stringify(e)}).then(n=>n.json()).then(async n=>{t.textContent="Procesando video...",c=n.id,console.log("id_video:",c);let u="procesando";for(;u!=="done";)console.log(),await new Promise(i=>setTimeout(i,5e3)),await fetch("https://api.d-id.com/talks/"+c,{method:"GET",headers:{"Content-Type":"application/json",Authorization:"Basic "+g}}).then(i=>i.json()).then(i=>{console.log("respuesta:",i.status),u=i.status,i.status=="done"?(videos.push(i.result_url),t.textContent="Listo para reproducir"+o,l.src=i.source_url,r.src=i.result_url):console.warn("EL VIDEO SIGUE EN PROCESO")});console.log("termine de cargar")}).catch(n=>{console.log("entre al error:",n)}),console.log("fin xd xd"),y(),o++}catch(e){console.error("Error al realizar el POST:",e)}}h.addEventListener("click",async function(){B()});let _=document.getElementById("img_hombre"),b=document.getElementById("img_mujer");document.getElementById("bt_hombre").addEventListener("click",function(){console.log("click en hombre"),m=0,b.classList.remove("border-blue-600"),_.classList.add("border-blue-600")});document.getElementById("bt_mujer").addEventListener("click",function(){console.log("click en mujer"),m=1,_.classList.remove("border-blue-600"),b.classList.add("border-blue-600")});let d=0;function w(){console.log("click abrir"+d),document.getElementById("modal"+d).showModal()}function I(){console.log("click en cerrar modal"+d),document.getElementById("modal"+d).close()}function x(){console.log("click en derech"+d);let e=d;if(e+1<videos.length){let t=videos[e];videos[e]=videos[e+1],videos[e+1]=t;let l=document.getElementById("img_contendio"+e);t=l.textContent,l.textContent=document.getElementById("img_contendio"+(e+1)).textContent,document.getElementById("img_contendio"+(e+1)).textContent=t;let r=document.getElementById("img_imagen"+e);t=r.src,r.src=document.getElementById("img_imagen"+(e+1)).src,document.getElementById("img_imagen"+(e+1)).src=t;let n=document.getElementById("model_video"+e);t=n.src,n.src=document.getElementById("model_video"+(e+1)).src,document.getElementById("model_video"+(e+1)).src=t}else console.log("no se puede mover mas a la derecha, llego al limite")}function f(){console.log("click en izquierda"+d);let e=d;if(e>0){let t=videos[e];videos[e]=videos[e-1],videos[e-1]=t;let l=document.getElementById("img_contendio"+e);t=l.textContent,l.textContent=document.getElementById("img_contendio"+(e-1)).textContent,document.getElementById("img_contendio"+(e-1)).textContent=t;let r=document.getElementById("img_imagen"+e);t=r.src,r.src=document.getElementById("img_imagen"+(e-1)).src,document.getElementById("img_imagen"+(e-1)).src=t;let n=document.getElementById("model_video"+e);t=n.src,n.src=document.getElementById("model_video"+(e-1)).src,document.getElementById("model_video"+(e-1)).src=t}else console.log("no se puede mover mas a la izquierda, llego al limite")}function k(e){console.log("click en elimina"+e)}const j=()=>{},y=()=>{for(let e=0;e<videos.length;e++)d=e,console.warn("creando eventos para: "+e),document.getElementById("bt_imagen"+e).addEventListener("click",w),document.getElementById("bt_cerrar"+e).addEventListener("click",I),document.getElementById("bt_derecha"+e).addEventListener("click",x),document.getElementById("bt_izquierda"+e).addEventListener("click",f),document.getElementById("bt_eliminar"+e).addEventListener("click",()=>j)};var C=document.getElementById("prueba");document.getElementById("prueba2");function L(){console.log("click en prueba"),document.getElementById("bt_eliminar2").removeEventListener("click",function(){k(2)})}C.addEventListener("click",L);y();
