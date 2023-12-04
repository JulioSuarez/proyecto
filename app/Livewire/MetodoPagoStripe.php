<?php

namespace App\Livewire;

use Livewire\Component;



class MetodoPagoStripe extends Component
{

    public $id_suscripcion;
   public $nombre = '';
   public $meses = [ 'Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Nobiembre','Diciembre'];
   public $tipo_tarjeta = [
       'visa' => '<svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg BrandIcon-svg BrandIcon--size--32-svg" height="32" width="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="M0 0h32v32H0z" fill="#00579f"></path><g fill="#fff" fill-rule="nonzero"><path d="M13.823 19.876H11.8l1.265-7.736h2.023zm7.334-7.546a5.036 5.036 0 0 0-1.814-.33c-1.998 0-3.405 1.053-3.414 2.56-.016 1.11 1.007 1.728 1.773 2.098.783.379 1.05.626 1.05.963-.009.518-.633.757-1.216.757-.808 0-1.24-.123-1.898-.411l-.267-.124-.283 1.737c.475.213 1.349.403 2.257.411 2.123 0 3.505-1.037 3.521-2.641.008-.881-.532-1.556-1.698-2.107-.708-.354-1.141-.593-1.141-.955.008-.33.366-.667 1.165-.667a3.471 3.471 0 0 1 1.507.297l.183.082zm2.69 4.806.807-2.165c-.008.017.167-.452.266-.74l.142.666s.383 1.852.466 2.239h-1.682zm2.497-4.996h-1.565c-.483 0-.85.14-1.058.642l-3.005 7.094h2.123l.425-1.16h2.597c.059.271.242 1.16.242 1.16h1.873zm-16.234 0-1.982 5.275-.216-1.07c-.366-1.234-1.515-2.575-2.797-3.242l1.815 6.765h2.14l3.18-7.728z"></path><path d="M6.289 12.14H3.033L3 12.297c2.54.641 4.221 2.189 4.912 4.049l-.708-3.556c-.116-.494-.474-.633-.915-.65z"></path></g></g></svg>',
       'mastercard' => '<svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg BrandIcon-svg BrandIcon--size--32-svg" height="32" width="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="M0 0h32v32H0z" fill="#000"></path><g fill-rule="nonzero"><path d="M13.02 10.505h5.923v10.857H13.02z" fill="#ff5f00"></path><path d="M13.396 15.935a6.944 6.944 0 0 1 2.585-5.43c-2.775-2.224-6.76-1.9-9.156.745s-2.395 6.723 0 9.368 6.38 2.969 9.156.744a6.944 6.944 0 0 1-2.585-5.427z" fill="#eb001b"></path><path d="M26.934 15.935c0 2.643-1.48 5.054-3.81 6.21s-5.105.851-7.143-.783a6.955 6.955 0 0 0 2.587-5.428c0-2.118-.954-4.12-2.587-5.429 2.038-1.633 4.81-1.937 7.142-.782s3.811 3.566 3.811 6.21z" fill="#f79e1b"></path></g></g></svg>',
       'amex' => '<svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg BrandIcon-svg BrandIcon--size--32-svg" height="32" width="32" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"><g fill="none" fill-rule="evenodd"><path fill="#0193CE" d="M0 0h32v32H0z"></path><path d="M17.79 18.183h4.29l1.31-1.51 1.44 1.51h1.52l-2.2-2.1 2.21-2.27h-1.52l-1.44 1.51-1.26-1.5H17.8v-.85h4.68l.92 1.18 1.09-1.18h4.05l-3.04 3.11 3.04 2.94h-4.05l-1.1-1.17-.92 1.17h-4.68v-.84zm3.67-.84h-2.53v-.84h2.36v-.83h-2.36v-.84h2.7l1.01 1.26-1.18 1.25zm-14.5 1.68h-3.5l2.97-6.05h2.8l.35.67v-.67h3.5l.7 1.68.7-1.68h3.31v6.05h-2.63v-.84l-.34.84h-2.1l-.35-.84v.84H8.53l-.35-1h-.87l-.35 1zm9.96-.84v-4.37h-1.74l-1.4 3.03-1.41-3.03h-1.74v4.04l-2.1-4.04h-1.4l-2.1 4.37h1.23l.35-1h2.27l.35 1h2.43v-3.36l1.6 3.36h1.05l1.57-3.36v3.36h1.04zm-8.39-1.85-.7-1.85-.87 1.85h1.57z" fill="#FFF"></path></g></svg>',
       'discover' => '<svg class="SVGInline-svg SVGInline--cleaned-svg SVG-svg BrandIcon-svg BrandIcon--size--32-svg" height="32" width="32" viewBox="0 0 32 32" xmlns="http://www.w3.org/2000/svg"><g fill="none" fill-rule="evenodd"><path d="M0 0h32v32H0z" fill="#ebf1f8"></path><path d="M0 0h32v32H0z" fill="#fff"></path><g fill-rule="nonzero"><path d="M30 17.9h-1.068l-1.203-1.53h-.114v1.53h-.871v-3.8h1.286c1.006 0 1.586.4 1.586 1.12 0 .59-.363.97-1.016 1.09zm-1.286-2.65c0-.37-.29-.56-.83-.56h-.27v1.15h.25c.56 0 .85-.2.85-.59zm-5.02-1.15h2.469v.64h-1.597v.85H26.1v.65h-1.535v1.03h1.597v.64h-2.468zm-2.8 3.9-1.887-3.91h.954l1.193 2.56 1.203-2.56h.933L21.382 18h-.466zm-7.891-.01c-1.327 0-2.364-.87-2.364-2 0-1.1 1.057-1.99 2.385-1.99.373 0 .684.07 1.068.23v.88a1.586 1.586 0 0 0-1.089-.43c-.83 0-1.462.58-1.462 1.31 0 .77.622 1.32 1.503 1.32.395 0 .695-.12 1.048-.42v.88c-.394.16-.726.22-1.089.22zm-2.634-1.25c0 .74-.633 1.25-1.545 1.25-.664 0-1.141-.22-1.545-.72l.57-.47c.197.34.529.51.944.51.394 0 .674-.23.674-.53 0-.17-.083-.3-.26-.4a3.693 3.693 0 0 0-.601-.22c-.82-.25-1.1-.52-1.1-1.05 0-.62.602-1.09 1.39-1.09.498 0 .944.15 1.317.43l-.456.5a.97.97 0 0 0-.705-.3c-.373 0-.643.18-.643.42 0 .2.155.31.674.48.996.3 1.286.58 1.286 1.2zM6.086 14.1h.871v3.81h-.871zm-2.8 3.81H2V14.1h1.286c1.41 0 2.385.78 2.385 1.9 0 .57-.29 1.11-.798 1.47-.436.3-.923.44-1.597.44zm1.016-2.86c-.29-.22-.622-.3-1.192-.3h-.24v2.52h.239c.56 0 .912-.1 1.192-.3.301-.24.477-.6.477-.97s-.176-.72-.477-.95z" fill="#000"></path><path d="M16.75 14c-1.1 0-2 .88-2 1.97 0 1.16.86 2.03 2 2.03 1.12 0 2-.88 2-2s-.87-2-2-2z" fill="#f27712"></path></g></g></svg>',
       'JCB' => 'JCB',
       'Diners Club' => 'Diners Club',
       'UnionPay' => 'UnionPay',
   ];

   //constriuctor
   public function mount($id )
    {
            $this->id_suscripcion = $id;
    }

    public function addMetodoPago($id_metodo_pago){
        auth()->user()->addPaymentMethod($id_metodo_pago);
        //verificar si ya tiene un metodo de pago
        if(!auth()->user()->hasDefaultPaymentMethod()){
            auth()->user()->updateDefaultPaymentMethod($id_metodo_pago);
        }
   }

   public function deleteMetodoPago($id_metodo_pago){

        auth()->user()->deletePaymentMethod($id_metodo_pago);

   }

   public function elegirMetodoPago($id_metodo_pago){
            auth()->user()->updateDefaultPaymentMethod($id_metodo_pago);

    }

    public function nuevaSuscripcion()
    {
        // dd('llegeu a nueva suscripcion');
        // $this->dispatch('errorxd', 'No tiene ningun metodo de pago registrado');

        //pregunatar si tieen algun metodo registrado
        if(! auth()->user()->hasDefaultPaymentMethod()){
            //emitir evento en session
            // session()->flash('errorxd', 'No tiene ningun metodo de pago registrado');
            $this->dispatch('errorxd', 'No tiene ningun metodo de pago registrado');
            return ;
        }

        // buscar esa suscripcion
        // $membresia = Membresia::find($this->id_membresia);
        // // dd($membresia);
        $user = auth()->user();
                      //nombre coomo esta en stripe   //id de stripe, plan basico
        $user->newSubscription( 'suscripcion' , 'price_1OJTfHJrLfX1VoDJWE4uOVib')
            ->create($user->defaultPaymentMethod()->id);

        //guardar en la tabla de suscripciones
        //asignar algun rol

        return redirect()->route('dashboard')->with('success', 'Plan Basico adquirido con exito');
    }


    public function render()
    {
        return view('livewire.metodo-pago-stripe',[
            'intent' => auth()->user()->createSetupIntent(),
            'metodos_pago' => auth()->user()->paymentMethods(),
            // 'predeterminado' => auth()->user()->defaultPaymentMethod()->id,
        ]);
    }
}
