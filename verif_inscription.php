<?php
//vérification des champs renseignés par l'utilisateur
if(!empty( $_POST["password"]) && isset( $_POST["password"]) && !empty($_POST["nom"]) && isset($_POST["nom"]) && !empty($_POST["prenom"]) && isset($_POST["prenom"]) && isset($_POST["mail"]) && !empty($_POST["mail"])){
//on récupère les paramètres passé en post dans le formulaire
include("requettes.php");
//on hash le mot de pass pour ne pas le stocker en clair en BDD
$motPass = password_hash($_POST["password"],PASSWORD_DEFAULT);
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$email= $_POST["mail"];

ajouterUtilisateur($nom,$prenom,$email,$motPass);
//on crée la session du nouvel inscrti
foreach (recupererUtilisateur($_POST['mail']) as $donnee){
        session_start();
        $_SESSION["IdUser"] = $donnee["IdUser"];
        $_SESSION["nom"] = $donnee["Prenom"];
        header("location: index.php");
        exit();
}
}
//sinon on lui affiche de nouveau la page d'inscription 
else{header("location: inscription.php");
}
?>