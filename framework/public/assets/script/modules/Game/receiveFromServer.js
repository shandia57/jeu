const socket = io("http://localhost:3000", {
    secure: true,
    transports: ['websocket', 'polling']
});

var messages = document.getElementById('messages');
var form = document.getElementById('form');
var input = document.getElementById('input');

form.addEventListener('submit', function (e) {
    e.preventDefault();
    if (input.value) {
        socket.emit('chat message', input.value);
        input.value = '';
    }
});

socket.on('chat message', function (msg) {
    var item = document.createElement('li');
    item.textContent = msg;
    messages.appendChild(item);
    window.scrollTo(0, document.body.scrollHeight);
});

socket.on("players", function (arrayPlayer) {
    console.log(arrayPlayer);
    document.getElementById("numberOfUsers").innerText = arrayPlayer;

})






