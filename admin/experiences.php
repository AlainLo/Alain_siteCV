<?php require 'connexion.php'; ?>
<?php 
// gestion des contenus de la BDD

if(!empty($_POST)){// insertion d'une expérience
	// si on a posté une nouvelle expérience
	if ($_POST['titre']!='' && $_POST['soustitre']!='' && $_POST['dates']!='' && $_POST['description']!='' ){ //si on a posté une expérience qui n'est pas vide
			$titre= addslashes($_POST['titre']);
			$soustitre= addslashes($_POST['soustitre']);
			$dates= addslashes($_POST['dates']);
			$description= addslashes($_POST['description']);
			$pdoCV->exec(" INSERT INTO t_experiences VALUES (NULL, '$titre', '$soustitre', '$dates', '$description', '1')");// mettre $id_utilisateur quand on l'aura dans la variable de session.
		//	header("location: experiences.php");//pour revenir sur la page
		//	exit();
	} //ferme le "if n'est pas vide"
}// ferme le if(isset) du FORM

// suppression d'une expérience
if(isset($_GET ['id_experience'])){// on récupére l'expérience par son id dans l'url
$efface = $_GET['id_experience'];
$sql = "DELETE FROM t_experiences WHERE id_experience = '$efface' ";
$pdoCV->query($sql);// on peut aussi utiliser exec si on le souhaite
header("location: experiences.php"); // pour revenir sur la page
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
</head>
<html>
	<body>
		<h1>Admin du site cv de <?php echo($ligne_utilisateur['prenom'].' '.$ligne_utilisateur['nom']); ?></h1>
		<!--<p>texte</p>-->
		<hr>
		<?php
				$sql = $pdoCV->prepare("SELECT * FROM t_experiences WHERE utilisateur_id='1'");
				$sql->execute();
				$nbr_experiences = $sql->rowCount();
				//$ligne_experience = $sql->fetch();
		?>
		<h2> il y a <?php echo $nbr_experiences; ?> expériences</h2>
		<table border="1">
			<tr>
				<th>titre</th>
				<th>sous-titre</th>
				<th>dates</th>	
				<th>description</th>
				<th>Supression</th>
				<th>Modification</th>
			</tr>
			<tr>
				<?php while ($ligne_experience = $sql->fetch()){ ?>
				<td><?php echo $ligne_experience['e_titre']; ?></td>
				<td><?php echo $ligne_experience['e_soustitre']; ?></td>
				<td><?php echo $ligne_experience['e_dates']; ?></td>
				<td><?php echo $ligne_experience['e_description']; ?></td>
				<td><a href="experiences.php?id_experience=<?php echo $ligne_experience['id_experience']; ?> ">supprimer</a></td>
				<td><a href="modif_experience.php?id_experience=<?php echo $ligne_experience['id_experience']; ?> ">modifier</a></td>
				<td></td>
			</tr>
			<?php } ?>
		</table>
		<hr>
		<h3>Insertion d'une expérience</h3>
		<form action="experiences.php" method="post">
			<label for="titre">Titre</label>
			<input type="text" name="titre" id="titre" placeholder="Insérer un titre">
			<label for="soustitre">Sous-Titre</label>
			<input type="text" name="soustitre" id="soustitre" placeholder="Insérer un sous-titre">
			<label for="dates">Dates</label>
			<input type="text" name="dates" id="dates" placeholder="Insérer des dates">
			<label for="description">Description</label>
			<input type="text" name="description" id="description" placeholder="Insérer une description">
			<input type="submit" value="Insérer">
		</form>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
		<?php include('inc/footer.php');?>   
	</body>
</html>

