# ProjetQuizz
Projet Quizz Antigone PAKLOGLOU/Thomas ARENAS

Le projet Quizz est, comme son nom l'indique, un site web de quiz où les utilisateurs pourront jouer à différents quizs mais aussi en créer.
Toutes les données seront sauvegardées grâce à une BDD et les utilisateurs pourront créer un compte pour pouvoir consulter leurs données de jeu ou créer des quizs.

INSTALLATION DU PROJET

- La BDD
    Dans PHPMyAdmin, créez une nouvelle BDD appelée "thequizz" et sélectionnez-la.
    Cliquez ensuite sur l'onglet "Importer", sélectionnez le fichier thequizz.sql dans l'option "Choisir un fichier", puis "Exécuter".
    Cinq nouvelles tables sont alors créées dans la BDD : categories, questions, quizs, reponses, users.

- Le site
    Copier le dossier "TheQuizz-main" dans votre localhost.
    Pour y accéder avec votre navigateur, tapez "localhost/TheQuizz-main/index.php" dans l'url.

USES CASES

- Utilisateur
    S'authentifier
        Consulter ses informations 
        Créer de quizz
        Jouer aux quizz

- Visiteur
    Jouer aux quizz
    S'incrire

- Administrateur 
    Valider les nouveaux quizz
    Bannir les utilisateurs
