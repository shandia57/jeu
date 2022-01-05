const express = require('express');
const app = express();
const http = require('http').createServer(app);
const io = require('socket.io')(http);
const port = process.env.PORT || 3000;


let players = [];
let playersWon = []
let MAXPLAYERS = 0;
let currentPlayer = 0
let goodAnswer = "";
let level = "";
let indexQuestion = 0;
let maxPoints = 48;


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

    socket.on("getQuestionsAndAnswers", (questionsAnswers) => {
        goodAnswer = questionsAnswers[2];
        level = questionsAnswers[3];
        indexQuestion = questionsAnswers[4];
        questionsAnswers.push(players[currentPlayer].id);
        console.log("this id", players[currentPlayer].id)
        io.emit("answerToTheQuestion", questionsAnswers);

    })

    socket.on("player answered", (answer) => {
        answer.push(players[currentPlayer].id);
        if (answer[1] === true) {
            io.emit("player answered", answer);
        } else {
            answer.push(goodAnswer);
            io.emit("player answered", answer);
        }
    })

    socket.on("endOfTurn", (newCurrentUser) => {
        console.log("je suis le noueveau user", newCurrentUser);
        currentPlayer = newCurrentUser;
        io.emit("newTurn", [players[currentPlayer].id, level, indexQuestion]);

    })


    socket.on('disconnect', () => {
        console.log('user disconnected');
    });


});



http.listen(port, () => {
    console.log("Server running on port ", port);
})

