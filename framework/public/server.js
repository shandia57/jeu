const express = require('express');
const app = express();
const http = require('http').createServer(app);
const io = require('socket.io')(http);
const port = process.env.PORT || 3000;

app.get('/', (req, res) => {
    res.sendFile("../templates/test.html.twig");
})

let players = [];


io.on('connection', (socket) => {
    console.log('a user connected');
    socket.on('chat message', (msg) => {
        console.log('coucou: ' + msg);
        io.emit('chat message', "Zoulette : " + msg);
    });
    socket.on('disconnect', () => {
        console.log('user disconnected');
    });

    socket.emit("init", socket.id);
    socket.on("players", (player) => {
        players.push(player);
        socket.emit("playersLength", players.length);
        console.log(players);
    })


});



http.listen(port, () => {
    console.log("Server running on port ", port);
})

