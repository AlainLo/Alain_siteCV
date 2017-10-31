<?php require 'connexion.php'; ?>
<?php 
// gestion des contenus de la BDD

if(!empty($_POST)){// insertion d'une réalisation
	// si on a posté une nouvelle réalisation
	if ($_POST['titre']!='' && $_POST['soustitre']!='' && $_POST['dates']!='' && $_POST['description']!='' ){ //si on a posté une réalisation qui n'est pas vide
			$titre= addslashes($_POST['titre']);
			$soustitre= addslashes($_POST['soustitre']);
			$dates= addslashes($_POST['dates']);
			$description= addslashes($_POST['description']);
			$pdoCV->exec(" INSERT INTO t_realisations VALUES (NULL, '$titre', '$soustitre', '$dates', '$description', '1')");// mettre $id_utilisateur quand on l'aura dans la variable de session.
		//	header("location: realisations.php");//pour revenir sur la page
		//	exit();
	} //ferme le "if n'est pas vide"
}// ferme le if(isset) du FORM

// suppression d'une réalisation
if(isset($_GET ['id_realisation'])){// on récupére la réalisation par son id dans l'url
$efface = $_GET['id_realisation'];
$sql = "DELETE FROM t_realisations WHERE id_realisation = '$efface' ";
$pdoCV->query($sql);// on peut aussi utiliser exec si on le souhaite
header("location: realisations.php"); // pour revenir sur la page
}// ferme le if(isset)
?>

<!Doctype html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php 
		$sql = $pdoCV -> query("SELECT * FROM t_utilisateurs WHERE id_utilisateur = '1' "); 
		$ligne_utilisateur = $sql -> fetch(PDO::FETCH_ASSOC); 
	?>
	<title> Admin : <?= $ligne_utilisateur['prenom']; ?> <?= $ligne_utilisateur['nom']; ?></title>

	<!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<!--personal css-->
	<link href="css/styleadmin.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
	<!--nav en include -->
	<?php include('inc/navbar.php');?>
	<section>
      	<div class="container">
		<h1>Admin du site cv de <?php echo($ligne_utilisateur['prenom'].' '.$ligne_utilisateur['nom']); ?></h1>
		<!--<p>texte</p>-->
		<hr>
		<?php
				$sql = $pdoCV->prepare("SELECT * FROM t_realisations WHERE utilisateur_id='1'");
				$sql->execute();
				$nbr_realisations = $sql->rowCount();
				//$ligne_realisation = $sql->fetch();
		?>
			<div class="row">
		        <div class="col-md-8">
		            <table class="table  table-hover table-condensed">
							<tr>
							<th>titre</th>
							<th>sous-titre</th>
							<th>dates</th>	
							<th>description</th>
							<th>Supression</th>
							<th>Modification</th>
							</tr>
							<tr>
							<?php while ($ligne_realisation = $sql->fetch()){ ?>
								<td><?php echo $ligne_realisation['r_titre']; ?></td>
								<td><?php echo $ligne_realisation['r_soustitre']; ?></td>
								<td><?php echo $ligne_realisation['r_dates']; ?></td>
								<td><?php echo $ligne_realisation['r_description']; ?></td>
								<td><a href="realisations.php?id_realisation=<?php echo $ligne_realisation['id_realisation']; ?> ">supprimer</a></td>
								<td><a href="modif_realisation.php?id_realisation=<?php echo $ligne_realisation['id_realisation']; ?> ">modifier</a></td>
							</tr>
							<?php } ?>
					</table>
		       	</div>
		    	<div class="col-md-4">
		    		<table class="table  table-hover table-condensed">
						<hr>
						<form="form-control" action="realisations.php" method="post">
						<h3>Insertion d'une réalisation</h3>
							<div class="form-group">
								<label for="titre">Titre</label>
								<input type="text" name="titre" id="titre" placeholder="Insérer un titre">
							</div>

							<div class="form-group">
								<label for="soustitre">Sous-Titre</label>
								<input type="text" name="soustitre" id="soustitre" placeholder="Insérer un sous-titre">
							</div>

							<div class="form-group">
								<label for="dates">Dates</label>
								<input type="text" name="dates" id="dates" placeholder="Insérer des dates">
							</div>

							<div class="form-group">
								<label for="description">Description</label>
								<input type="text" name="description" id="description" placeholder="Insérer une description">
							</div>

							<div>
								<input type="submit" value="Insérer">
							</div>
						</form>
					</table>
				</div>
			</div>
		</div>
	</section>	
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
		<?php include('inc/footer.php');?>   
</body>
</html>

