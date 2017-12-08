<!-- Contact.class.php -->
<!--
Une classe c'est en fait un plan à partir duquel on va pouvoir créer plusieurs objets
un peu comme un moule dont on en obtient comme objets des gâteaux
Une classe peut contenir plusieurs méthodes (ou fonctions)
par ex. une classe voiture peut avoir comme méthodes 'freiner' et 'accélerer'
et quand je crée un objet de la classe voiture, par ex. un 308 ou une porsche qui auront les
fonctionnalités de la classe voiture comme 'freiner' et 'accélerer'
 -->
 <?php
 class Contact {
 	// déclaration des variables = champs de la table t_commentaires.sql
    private $nom;
    private $email;
    private $sujet;
    private $message;
     
     // fonction d'insertion en BDD
    public function insertContact($nom, $email, $sujet, $message) {
    	// on récupère les données rentrées par l'utilisateur
        $this->nom = strip_tags($nom);
		$this->email = strip_tags($email);
        $this->sujet = strip_tags($sujet);
        $this->message = strip_tags($message);
        
        // appelle la connexion à la BDD
        require('connexion.php');
        
        // on crée une requête puis on l'exécute
        $req = $bdd->prepare('INSERT INTO t_commentaires (co_nom, co_email, co_sujet, co_message) VALUES (:co_nom, :co_email, :co_sujet, :co_message)');
        $req->execute([
        	':co_nom'	=> $this->nom, // on attribue à la variable co_nom la valeur de l'objet en cours d'instanciation, le nom de l'auteur du message qui vient d'être posté.
            ':co_email' => $this->email,
            ':co_sujet' => $this->sujet,
            ':co_message' => $this->message]);
        echo 'bonjour';
        // on ferme la requête pour protéger des injections
        $req->closeCursor();
    } 
 }


?>