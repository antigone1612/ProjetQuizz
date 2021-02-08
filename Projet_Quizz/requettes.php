<?php
include('MyPDO.class.php');
MyPDO::setConfiguration('mysql:host=localhost;dbname=quizz;charset=utf8', 'root', '');

//créé un utilisateur en bdd
function ajouterUtilisateur($nom,$prenom,$email, $motPass){
    $pdo = MyPDO::getInstance();
    $requette = $pdo->prepare("INSERT INTO utilisateur (nom, prenom,adresse_email, mot_pass) VALUES (?,?,?,?)");
    $requette -> execute(array($nom,$prenom, $email, $motPass));
}
//retourne un client en fonction de son mail
function recupererUtilisateur($mail){
    $pdo = MyPDO::getInstance();
    $requette = $pdo->prepare("SELECT * FROM utilisateur WHERE adresse_email = ? ");
    $requette -> execute(array($mail));
    
    $donnees = $requette -> fetchAll();
    return $donnees;
}
