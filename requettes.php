<?php
include('class/MyPDO.class.php');
MyPDO::setConfiguration('mysql:host=localhost;dbname=thequizzz;charset=utf8', 'root', '');

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
function creationQuizz($titre, $Idcategorie, $description) {
    $pdo = MyPDO::getInstance();
    $requete = $pdo->prepare("INSERT INTO quizs(Titre, IdCategorie, Description) VALUES (?, ?, ?)");
    $requete -> execute(array($titre, $Idcategorie, $description));
}

//recupère les catégories des quizz
function recupererCategorie() {
    $pdo = MyPDO::getInstance();
    $requete = $pdo->prepare("SELECT * FROM categories");
    $requete -> execute();
    $donnees = $requete -> fetchAll();
    return $donnees;
}

//recupère le dernier idQuizz inséré en bdd
function recupererLastId() {
    $pdo = MyPDO::getInstance();
    $requete = $pdo->prepare("SELECT MAX(IdQuiz) as IdQuiz FROM quizs");
    $requete -> execute();
    $donnees = $requete -> fetch();
    return $donnees["IdQuiz"];

}

//inserer les questions/reponses en bdd
function creationQuestions($idQuiz, $question, $reponse1, $reponse2, $reponse3, $reponse4, $bonneReponse) {
    $pdo = MyPDO::getInstance();
    $requete = $pdo->prepare("INSERT INTO questions(IdQuiz,Question, Reponse1, Reponse2, Reponse3, Reponse4, BonneReponse) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $requete -> execute(array($idQuiz, $question, $reponse1, $reponse2, $reponse3, $reponse4, $bonneReponse));
}