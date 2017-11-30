<!--<?php 
$db = new PDO('mysql:host=localhost;dbname=alainlortal_cvsite;charset=utf8','root', ''); // connexion à MySQL
$db->setAttribute(PDO::FETCH_ASSOC);
$sql = 'SELECT * FROM t_utilisateurs';
$resultat = $pdo->query($sql);
$resultat['nom'] . ' ' . $resultat['nom']; ?>
-->
 


?>
<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		
		<!--<title> Site de <?= $resultat['prenom'] . ' ' . $resultat['nom']; ?></title> -->

		<!-- Bootstrap -->
	  <!--  <link href="css/bootstrap.min.css" rel="stylesheet"> -->
		<!--personal css-->
		<link href="css/stylepublic.css" rel="stylesheet">

	   
	</head>
    
   
	<body>
        <header>
         <h1> <!--Site de  <?= $resultat['prenom']; ?> <?= $resultat['nom']; ?>--></h1>
        </header>
         <section>
           éclairage
            <img src="eclairage.svg" alt="eclairage" style="width: 100%; height: auto;">
        </section>
        
        <section>
            Moi
            <img src="moi.svg" alt="moi" style="width: 100%; height: auto;">
        </section>

        <section>
            compétences
            <img src="competences.svg" alt="competences" style="width: 100%; height: auto;">
		</section>	
        
        <section>
            experiences
            <img src="experiences.svg" alt="experiences" style="width: 100%; height: auto;">
		</section>	
        
        <section>
            realisations
            <img src="realisations.svg" alt="realisations" style="width: 100%; height: auto;">
		</section>	
        
        <section>
            formation
            <img src="formation.svg" alt="formation" style="width: 100%; height: auto;">
		</section>	
        
        <section>
            loisirs
            <img src="loisirs.svg" alt="loisirs" style="width: 100%; height: auto;">
		</section>	
        
         <section>
            Plus...
             <img src="loisirs.svg" alt="loisirs" style="width: 100%; height: auto;">
		</section>	







		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
		<?php include('footer.php');?>  
	</body>
</html>