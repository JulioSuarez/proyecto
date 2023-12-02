import { io } from 'socket.io-client';

console.log('hola de socket_client.js');
// export const socket = io('http://cristiancuellar.tech:3000', {
export const socket = io('http://localhost:3000', {
    transports: ['websocket'],
});


        socket.on('connect', function(payload){
            console.log('conectado con el servidor desde socket_client.js');
            //emitir al servidor el nombre de usuario y diagrama

            //mostrar todo los usarios conectados
            // socket.emit('conectado', {
            //      usuario: usuario,
            //      diagrama_id : diagrama.id,
            // });
        });

      

        socket.on('disconnecte', function(payload){
            // console.log('perdimos conexion con el servidor'+payload.usuario_id);
            console.log('perdimos conexion con el servidor desde client_socket.js');
            //verificar si no esta en otra pestaña
            // if( diagrama.id == payload.diagrama_id){
            //     let dic_conec = document.getElementById('div_conect'+payload.usuario_id);
            //     if(dic_conec){
            //         dic_conec.remove();
            //     }else{
            //         console.warn('NO EXISTE EL DIV CONECTADO');
            //     }   
            // }         
        });





