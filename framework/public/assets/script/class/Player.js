export class Player {

    #id
    #username;
    #role;
    #points = 0;
    #players = [];
    #currentIndexPlayer = 0;

    constructor(username, role) {
        this.setUsername(username);
        this.setRole(role);
    }

    setId(id) {
        this.#id = id;
    }

    getId() {
        return this.#id;
    }

    setUsername(username) {
        this.#username = username;
    }

    getUsername() {
        return this.#username;
    }

    setRole(role) {
        this.#role = role;
    }

    getRole() {
        return this.#role;
    }

    setPoints(points) {
        this.#points += points;
    }

    getPoints() {
        return this.#points;
    }

    setPlayers(...players) {
        this.#players = players;
    }

    getPlayers() {
        return this.#players;
    }

    getNumberPlayer() {
        return this.#players.length;
    }

    getSinglePlayer(index) {
        return this.#players[index];;
    }

    setCurrentIndexPlayer(index) {
        this.#currentIndexPlayer = index;
    }

    getcurrentIndexPlayer() {
        return this.#currentIndexPlayer;
    }

    getCurrentPlayer() {
        return this.#players[this.#currentIndexPlayer];
    }
}
