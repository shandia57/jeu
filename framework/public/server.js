const express = require('express');
const app = express();
const http = require('http').createServer(app);
const io = require('socket.io')(http);
const port = process.env.PORT || 3000;


let players = [];
let MAXPLAYERS = 0;
let currentPlayer = 0


io.on('connection', (socket) => {
    console.log('a user connected');

    socket.on('chat message', (msg) => {
        console.log('coucou: ' + msg);
        io.emit('chat message', "Zoulette : " + msg);
    });


    socket.emit("init", socket.id);

    socket.on("players", (player) => {
        players.push(
            {
                "id": player[0],
                "username": player[1]
            }
        );
        io.emit("players connected", players.length);
        console.log(players);
    })

    socket.on("numberMaxPlayers", (numberMax) => {
        MAXPLAYERS = numberMax;
        console.log("max players", MAXPLAYERS);
        if (players.length === MAXPLAYERS) {
            io.emit("startGame", [true, players, players[currentPlayer].id]);
        }
    })

    socket.on("playerTurn", (index) => {
        io.emit("playerTurn", players[index].id);
    })


    socket.on('disconnect', () => {
        console.log('user disconnected');
    });


});



http.listen(port, () => {
    console.log("Server running on port ", port);
})

