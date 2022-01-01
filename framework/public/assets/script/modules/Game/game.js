import { Player } from "./../../class/Player.js";
import { JeuDeLoie } from "./../../class/JeuDeLoie.js";
import * as questions from "./../librairie/questions.js";
import * as answers from "./../librairie/answers.js";
import * as gameInterface from "./interface";

//////////////////////// START GAME INITIALIZE


let MJ = new Player("Admin", "Admin");
let player1 = new Player("Shandia", "Player");
let player2 = new Player("Slykillah", "Player");
let player3 = new Player("Shimotsuki", "Player");
let player4 = new Player("Kaiyo", "Player");
let player5 = new Player("Toran", "Player");
let player6 = new Player("Kenitoh", "Player");
let game = new JeuDeLoie();


// FIRST STEP add players into the game
game.setPlayers(player1, player2, player3, player4, player5, player6);
console.log(game.getPlayers());
console.log("number Player : ", game.getNumberPlayer());

// SECOND STEP get Questions from the data base
questions.getBlackQuestions("Green");
questions.getBlackQuestions("Yellow");
questions.getBlackQuestions("Blue");
questions.getBlackQuestions("Orange");
questions.getBlackQuestions("Red");
questions.getBlackQuestions("Black");

// THRID STEP set Questions to class game
game.setQuestionsLevel1(JSON.parse(localStorage.getItem("Green")));
game.setQuestionsLevel2(JSON.parse(localStorage.getItem("Yellow")));
game.setQuestionsLevel3(JSON.parse(localStorage.getItem("Blue")));
game.setQuestionsLevel4(JSON.parse(localStorage.getItem("Orange")));
game.setQuestionsLevel5(JSON.parse(localStorage.getItem("Red")));
game.setQuestionsLevel6(JSON.parse(localStorage.getItem("Black")));

//////////////////////// GAME INITIALIZED

if (game.getNumberPlayer() === game.getEndGameWithNumberPlayer()) {
    console.log("C'est la fin là non ? ")
} else {
    console.log("Que la fête continue ! ")
    let getLevel = prompt("Quelle niveau de jeu souhaitez vous jouer ? ");
    let questions = game.getQuestionsWithLevel(getLevel);
    if (gameInterface.controlLevelQuestion(getLevel)) {
        // FOURTH STEP get a random index from 0 to length Of arrayQuestions
        let index = game.getRandomIndex(questions.length);

        // FITH STEP get a random question
        let singleQuestion = game.getSingleQuestion(index, questions);
        document.getElementById("questionGame").innerText = singleQuestion.question;


        // SIXTH SETP get answer(s)
        answers.getAnswers(singleQuestion.id_question);

        // SEVENTH STEP control the length of the arrayAnswers
        game.setAnswers(JSON.parse(localStorage.getItem("answer")));


        // HEIGTH STEP ask to answer the question
        if (game.getAnswers().length === 1) {
            gameInterface.createInterfaceSingleAnswer();
            let goodAnswer = game.findGoodAnswer();
            console.log("answer : ", goodAnswer);
            const btns = document.getElementsByClassName("btn-outline-info");
            for (let i = 0; i < btns.length; i++) {
                btns[i].addEventListener('click', () => {
                    let rep = btns[i].innerText;
                    let boolAnswer = game.isAGoodAnser(rep, goodAnswer);
                    gameInterface.sendMessage(boolAnswer);

                    // get the current player !
                    let currentPlayer = game.getCurrentPlayer()
                    boolAnswer ? currentPlayer.setPoints(game.getNumberPointsToAttribute(getLevel)) : currentPlayer.setPoints(0);
                    console.log(currentPlayer);
                })
            }
        } else {
            gameInterface.createInterfaceAnswers(game.getAnswers());
            let goodAnswer = game.findGoodAnswer();
            console.log("answer : ", goodAnswer);
            const btns = document.getElementsByClassName("btn-outline-info");
            for (let i = 0; i < btns.length; i++) {
                btns[i].addEventListener('click', () => {
                    let rep = btns[i].innerText;
                    let boolAnswer = game.isAGoodAnser(rep, goodAnswer);
                    gameInterface.sendMessage(boolAnswer);

                    // get and set the ppints to the current player !
                    let currentPlayer = game.getCurrentPlayer()
                    boolAnswer ? currentPlayer.setPoints(game.getNumberPointsToAttribute(getLevel)) : currentPlayer.setPoints(0);
                    console.log(currentPlayer);

                    // Control if the current player won 
                    // -> if he won, increment the numberOf actuels players !  

                    // 


                    // delete the question from the array


                })
            }
        }


    } else {
        console.log("Mauvaise couleur !");
    }
}








