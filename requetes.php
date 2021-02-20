<?php

include('class/MyPDO.class.php');
MyPDO::setConfiguration('mysql:host=localhost;dbname=thequizz;charset=utf8', 'root', '');

//crée un utilisateur en BDD
function ajouterUtilisateur($nom,$prenom,$email,$motPass) {
    $pdo = MyPDO::getInstance();
    $requete = $pdo->prepare("INSERT INTO users(Nom, Prenom, Mail, MotDePasse, QuizsGagnes, QuizsJoues) VALUES (?, ?, ?, ?, 0, 0)");
    $requete -> execute(array($nom,$prenom, $email, $motPass));
}

//retourne un client en fonction de son mail
function recupererUtilisateur($mail) {
    $pdo = MyPDO::getInstance();
    $requete = $pdo->prepare("SELECT * FROM users WHERE Mail = ?");
    $requete -> execute(array($mail));
    $donnees = $requete -> fetchAll();
    return $donnees;
}

//crée un quizz en BDD
function creationQuizz($titre, $Idcategorie, $description, $IdUser) {
    $pdo = MyPDO::getInstance();
    $requete = $pdo->prepare("INSERT INTO quizs(Titre, IdCategorie, Description, IdUser) VALUES (?, ?, ?, ?)");
    $requete -> execute(array($titre, $Idcategorie, $description, $IdUser));
    return $pdo->lastInsertId();
}

//recupère les quizz en fonction de leur id
function recupererQuizz($id) {
    $pdo = MyPDO::getInstance();
    $requete = $pdo->prepare("SELECT * FROM quizs WHERE IdQuiz = ?");
    $requete -> execute(array($id));
    $donnees = $requete -> fetchAll();
    return $donnees;
}

//recupère les quizz en fonction de leur catégorie
function recupererQuizzCategorie($categorie, $all) {
    $pdo = MyPDO::getInstance();
    $requete = $pdo->prepare("SELECT * FROM quizs WHERE IdCategorie = ? OR ?");
    $requete -> execute(array($categorie, $all));
    $donnees = $requete -> fetchAll();
    return $donnees;
}

//recupère les catégories des quizz
function recupererCategorie() {
    $pdo = MyPDO::getInstance();
    $requete = $pdo->prepare("SELECT * FROM categories");
    $requete -> execute();
    $donnees = $requete -> fetchAll();
    return $donnees;
}

//insère les questions en BDD
function creationQuestions($idQuiz, $question) {
    $pdo = MyPDO::getInstance();
    $requete = $pdo->prepare("INSERT INTO questions(IdQuiz,Question, IdBonneReponse) VALUES (?, ?, Null)");
    $requete -> execute(array($idQuiz, $question));
    return $pdo->lastInsertId();
}

//recupère les questions en fonction du quizz auquel elles appartiennent
function recupererQuestions($idQuiz) {
    $pdo = MyPDO::getInstance();
    $requete = $pdo->prepare("SELECT * FROM questions WHERE IdQuiz = ?");
    $requete -> execute(array($idQuiz));
    $donnees = $requete -> fetchAll();
    return $donnees;
}

//insertion des réponses possibles
function creationReponses($idQuestion, $reponse) {
    $pdo = MyPDO::getInstance();
    $requete = $pdo->prepare("INSERT INTO reponses(IdQuestion,Reponse) VALUES (?, ?)");
    $requete -> execute(array($idQuestion, $reponse));
    return $pdo->lastInsertId();
}

//recupère les réponses en fonction de la question à laquelle elles appartiennent
function recupererReponses($idQuestion) {
    $pdo = MyPDO::getInstance();
    $requete = $pdo->prepare("SELECT * FROM reponses WHERE IdQuestion = ?");
    $requete -> execute(array($idQuestion));
    $donnees = $requete -> fetchAll();
    return $donnees;
}

//mise à jour de la bonne réponse
function majBonneReponse($idQuestion, $idReponse) {
    $pdo = MyPDO::getInstance();
    $requete = $pdo->prepare("UPDATE questions SET IdBonneReponse = ? WHERE IdQuestion = ?");
    $requete -> execute(array( $idReponse, $idQuestion));
}

//mise à jour du nombre de quizz joués
function updateJeu($idUser) {
    $pdo = MyPDO::getInstance();
    $requete = $pdo->prepare("UPDATE users SET QuizsJoues = QuizsJoues + 1 WHERE IdUser = ?");
    $requete -> execute(array($idUser));
}

//mise à jour du nombre de quizz gagnés
function updateScore($idUser) {
    $pdo = MyPDO::getInstance();
    $requete = $pdo->prepare("UPDATE users SET QuizsGagnes = QuizsGagnes + 1 WHERE IdUser = ?");
    $requete -> execute(array($idUser));
}

//récupère les infos de l'utilisateur
function recupererInfosUtilisateurs($idUser) {
    $pdo = MyPDO::getInstance();
    $requete = $pdo->prepare("SELECT QuizsGagnes,QuizsJoues FROM users WHERE IdUser=?");
    $requete -> execute(array($idUser));
    $donnees = $requete -> fetchAll();
    return $donnees;
}

//récupère le nbr de quizz créés par un utilisateur
function recupererNbrQuizzUtilisateur($idUser) {
    $pdo = MyPDO::getInstance();
    $requete = $pdo->prepare("SELECT COUNT(*) FROM quizs WHERE IdUser=?");
    $requete -> execute(array($idUser));
    $donnees = $requete -> fetchAll();
    return $donnees;
}