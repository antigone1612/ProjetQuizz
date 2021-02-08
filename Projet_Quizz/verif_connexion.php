
<?php
if(isset($_POST['mail']) && isset($_POST['password']) && !empty($_POST['mail']) && !empty($_POST['password']) )
  {
    include("requettes.php");
      //si le mail existe on va comparer les mot de passe
    foreach (recupererUtilisateur($_POST['mail']) as $donnee){
        var_dump(recupererUtilisateur($_POST['mail']));
        //on utilise password_verify pour comparer les hashs , celui du mot de pass saisie pour se connecter et celui en BDD
        if (($_POST['mail'] == $donnee["adresse_email"]) && (password_verify($_POST['password'],$donnee["mot_pass"]) )){
          //si l'utilisateur à un compte alors on démarre sa session
          session_start();
          $_SESSION["idUtilisateur"] = $donnee["idUtilisateur"];
          $_SESSION["nom"] = $donnee["prenom"]; 
          header("location: index.php");
          exit();
        }
        else{
          header("location: connexion.php");
        }
    
    }
}
else{
  header("location: connexion.php");
}