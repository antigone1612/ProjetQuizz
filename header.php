<?php 
session_start();
//Navigation
$html = <<<HTML
<nav style="background-color:  #34B8E9" class="navbar navbar-expand-lg navbar-dark  fixed-top">
    <div class="container">
        <a  style="font-size:26px;" class="navbar-brand" href="index.php">The Quizzz</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        	<span class="navbar-toggler-icon"></span>
      	</button>
      	<div class="collapse navbar-collapse" id="navbarResponsive">
        	<ul class="navbar-nav ml-auto">    
HTML;

if(isset($_SESSION["IdUser"])) {
    $nom = $_SESSION["nom"] ;
	$html .= <<<HTML
            	<li class="nav-item active">
                	<div class="dropdown">
                  		<button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">$nom</button>
                  		<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    		<a class="dropdown-item" href="infos_utilisateur.php">Mes informations</a>
                    		<a class="dropdown-item" href="creationQuizz.php">Créer un quizz</a>
                    		<a class="dropdown-item" href="deconnexion.php">DECONNEXION</a>
                  		</div>
                	</div>                
            	</li>
HTML;
} else{
	$html .= <<<HTML
            	<a class="nav-link" href="connexion.php">Connexion
                	<span class="sr-only">(current)</span>
              	</a>
				<a class="nav-link" href="inscription.php">Inscription
					<span class="sr-only">(current)</span>
				</a>
HTML;
} 

$html .= <<<HTML
        	</ul>
      	</div>
    </div>
</nav>
HTML;

return $html;