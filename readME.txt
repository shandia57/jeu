#############################################################################################
####           PROJET TUTORE: Une version revisitée du fameux jeu de l'oie!              ####
#############################################################################################

Chaque joueur doit répondre à des questions dont le niveau de difficulté choisi au préalable lui permet de progresser plus vite sur la grille de jeu en cas de bonne réponse.
Mais attention, c'est à double tranchant car une réponse erronée fera reculer le joueur sur la grille proportionnellement !
Le gagnant sera le premier arrivé sur la 48ème case avant les autres. 


But du projet:

Réaliser un jeu de société multijoueurs en utilisant les technologies:
php, javascript, node.js et socket io.

Participants : 
- Eric HOFFMANN
- Alexandre SCHMITT

lien github : https://github.com/shandia57/jeuDeLoieV2.git

Executer la commande suivante : "composer install" dans le dossier du projet /jeuDeLoieV2/framework/ après avoir cloné le projet.

fichier nécessaire à ne pas oublier dnas le dossier /jeuDeLoieV2/framework/config
- app.conf.php dont voici le code:

<?php

return [
    'database' => [
        'connection' => 'mysql:dbname=jeudeloie;host=localhost',
        'username' => 'mettreLeUserName',
        'password' => 'mettreLeMDP',
        'charset'  => 'UTF-8'
    ]
];


Ensuite, le script SQL se trouve dans le chemin suivant : /jeuDeloieV2/fichiers_utiles/bdd/SQL/


pour se connecter au jeu : 
- en tant qu'ADMIN :
	-> username : admin
	-> MDP : test

- en tant que user: 
	-> username : shandia
	-> MDP: test

/////////////// ATTENTION: un système de cookie est mis en place si l'utilisateur souhaite rester connecté ////////

/////////////////////////////Pour la partie serveur node /////////////////////////////////////////////////////
dans le dossier "/jeuDeLoieV2/framework/public" du projet, faire:

npm install


si toutefois vous avez des questions, nous sommes disponibles sur discord (shandia-sama#0281) et Eric.H#6646
Sinon par mail : alexandre57450@hotmail.fr/ec.ho@orange.fr
