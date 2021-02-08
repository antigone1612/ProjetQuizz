<?php 
include "class/WebPage.class.php";
$body = include("header.php"); 
$body.= include("requettes.php");
$body.= '
      <section class="cParallaxe1 cSection">
        <div class="cConteneur">  
          <div class="wrapper ">
            <form style="opacity: 0.8;" class="form-signin" method="post" action="connexion.php">  <!-- ici action dit ou aller chercher le code PHP -->
              <img class="form-signin-heading" width="100" src="images/image-quizz.jpg" >
              <br>   
              <h1 class="centrer">Se connecter</h1>
              <input  type="email" class="form-control " name="mail" placeholder="email" >
              <input type="password" class="form-control " name="password" placeholder="Mot de Passe">      
              <input name="submit" class="btn btn-lg btn-primary btn-block marge bordure" type="submit" value="Connexion">  ';
             
if(isset($_POST['mail']) && isset($_POST['password']) && !empty($_POST['mail']) && !empty($_POST['password']) )
{
	foreach (recupererUtilisateur($_POST['mail']) as $donnee){
    //on utilise password_verify pour comparer les hashs , celui du mot de pass saisie pour se connecter et celui en BDD
		if (($_POST['mail'] == $donnee["adresse_email"]) && (password_verify($_POST['password'],$donnee["mot_pass"]) )){
      session_start();
      $_SESSION["idUtilisateur"] = $donnee["idUtilisateur"];
			$_SESSION["nom"] = $donnee["prenom"];
      header("location: index.php");
      exit();
		}
	}
	
}

else{
	echo "Veuillez remplir correctement les logins";
}
                
                
                
                
$body .= '
                </form>
          </div>
        </div>
      </section>';



//génère l'affichage
$page = new WebPage("Connexion");
$page->appendContent($body);
$page->appendCssUrl('CSS/style.css');
$page->appendJsUrl("https://code.jquery.com/jquery-3.3.1.slim.min.js");
$page->appendJsUrl("https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js");
$page->appendJsUrl("https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js");
echo $page->buildPage();
		
		
