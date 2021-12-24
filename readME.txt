///////////////////////// projet tuteuré ////////////////////////////////////////

Participants : 
- Eric HOFFMANN
- Alexandre SCHMITT

lien github : https://github.com/shandia57/jeuDeLoieV2.git

Executer la commande suivante : "composer install" dans /jeuDeLoieV2/framework/


fichier nécessaire : 
- app.conf.php (à mettre dans le dossier suivant : /jeuDeLoieV2/framework/config )

-> code nécessaire : 


<?php

return [
    'database' => [
        'connection' => 'mysql:dbname=jeudeloie;host=localhost',
        'username' => 'mettreLeUserName',
        'password' => 'mettreLeMDP',
        'charset'  => 'UTF-8'
    ]
];





Le fichier SQL se trouve dans le chemin suivant : /jeuDeloieV2/fichiers utile/bdd/SQL/


pour se connecter au jeu : 
- en tant qu'ADMIN :
	-> username : admin
	-> MDP : test

- en tant que user: 
	-> username : shandia
	-> MDP: test

/////////////// ATTENTION: un système de cookie est mis en place si l'utilisateur souahite rester connecté



si toutefois vous avez des questions, je suis disponible sur discord (shandia-sama#0281)
Sinon par mail : alexandre57450@hotmail.fr