import express from 'express';
import { Server } from 'socket.io';
import http from 'http';
// import path from 'path'; //para trabajar con rutas de archivos
// const express = require('express');
// const { Server } = require('socket.io');
// const http = require('http');


//importar pa lo de patch
// import { fileURLToPath } from 'url';
// import { dirname } from 'path';

// const __filename = fileURLToPath(import.meta.url);
// const __dirname = dirname(__filename);

//definir nombre del archivos donde estara 
// app.use(express.static(path.join(__dirname, "public")));


const app = express();


const server = http.createServer(app);
const io = new Server(server);

let activeSockets = [];

//Mensajes de sockets
io.on('connection', client => {
    console.log('Cliente conectado desde server.js, ' + client.id);
    
    const existingSocket = activeSockets.find(
        existingSocket => existingSocket === client.id
      );

    if (!existingSocket) {
        activeSockets.push(client.id);

        client.emit("update-user-list", {
            users: activeSockets.filter(
              existingSocket => existingSocket !== client.id
            )
          });
    
          client.broadcast.emit("update-user-list", {
            users: [client.id]
          });
        }


        client.on("call-user", data => {
            client.to(data.to).emit("call-made", {
              offer: data.offer,
              socket: client.id
            });
          });

          client.on("make-answer", data => {
            console.log('ejecutando make-answer');
            client.to(data.to).emit("answer-made", {
              socket: client.id,
              answer: data.answer
            });
          });

          client.on("reject-call", data => {
            client.to(data.from).emit("call-rejected", {
              socket: client.id
            });
          });



   client.on('conectado', (payload) => {
        // console.log('Bienvenido: ', payload.usuario.id);
        //agregar el usuario a la lista de conectados

   });

    client.on("disconnect", () => {
        console.log('Cliente desconectado ' + client.id);
        activeSockets = activeSockets.filter(
          existingSocket => existingSocket !== client.id
        );
        client.broadcast.emit("remove-user", {
          socketId: client.id
        });
      });
   
});



server.listen(3000, (err) => {
    //si hay algun error que lo muestre
    if(err) throw new Error(err);
    console.log('Servidor corriendo en puerto 3000!!');
});

