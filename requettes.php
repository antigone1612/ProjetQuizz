<?php
include('class/MyPDO.class.php');
MyPDO::setConfiguration('mysql:host=localhost;dbname=thequizz;charset=utf8', 'root', '');

//créé un utilisateur en bdd
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

//créer un quizz en bdd
function creationQuizz($titre, $Idcategorie, $description, $IdUser) {
    $pdo = MyPDO::getInstance();
    $requete = $pdo->prepare("INSERT INTO quizs(Titre, IdCategorie, Description, IdUser) VALUES (?, ?, ?, ?)");
    $requete -> execute(array($titre, $Idcategorie, $description, $IdUser));
    return $pdo->lastInsertId();
}

//recupère les catégories des quizz
function recupererCategorie() {
    $pdo = MyPDO::getInstance();
    $requete = $pdo->prepare("SELECT * FROM categories");
    $requete -> execute();
    $donnees = $requete -> fetchAll();
    return $donnees;
}

//inserer les questions en bdd
function creationQuestions($idQuiz, $question) {
    $pdo = MyPDO::getInstance();
    $requete = $pdo->prepare("INSERT INTO questions(IdQuiz,Question, IdBonneReponse) VALUES (?, ?, Null)");
    $requete -> execute(array($idQuiz, $question));
    return $pdo->lastInsertId();
}


//insertion des reponses possibles
function creationReponses($idQuestion, $reponse) {
    $pdo = MyPDO::getInstance();
    $requete = $pdo->prepare("INSERT INTO reponses(IdQuestion,Reponse) VALUES (?, ?)");
    $requete -> execute(array($idQuestion, $reponse));
    return $pdo->lastInsertId();
}

//Mise a jour de la bonne reponse
function majBonneReponse($idQuestion, $idReponse) {
    $pdo = MyPDO::getInstance();
    $requete = $pdo->prepare("UPDATE questions SET IdBonneReponse = ? WHERE IdQuestion = ?");
    $requete -> execute(array( $idReponse, $idQuestion));
}

//Récupérer les infos de l'utilisateurs
function recupererInfosUtilisateurs($idUser) {
    $pdo = MyPDO::getInstance();
    $requete = $pdo->prepare("SELECT QuizsGagnes,QuizsJoues FROM users WHERE IdUser=?");
    $requete -> execute(array($idUser));
    $donnees = $requete -> fetchAll();
    return $donnees;
}