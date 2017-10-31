<?php require 'connexion.php'; ?>
<?php 
// gestion des contenus de la BDD

if(!empty($_POST)){// insertion d'une formation
	// si on a posté une nouvelle formation
	if ($_POST['titre']!='' && $_POST['soustitre']!='' && $_POST['dates']!='' && $_POST['description']!='' ){ //si on a posté une formation qui n'est pas vide
			$titre= addslashes($_POST['titre']);
			$soustitre= addslashes($_POST['soustitre']);
			$dates= addslashes($_POST['dates']);
			$description= addslashes($_POST['description']);
			$pdoCV->exec(" INSERT INTO t_formations VALUES (NULL, '$titre', '$soustitre', '$dates', '$description', '1')");// mettre $id_utilisateur quand on l'aura dans la variable de session.
		//	header("location: formation.php");//pour revenir sur la page
		//	exit();
	} //ferme le "if n'est pas vide"
}// ferme le if(isset) du FORM

// suppression d'une formation
if(isset($_GET ['id_formation'])){// on récupére l'expérience par son id dans l'url
$efface = $_GET['id_formation'];
$sql = "DELETE FROM t_formations WHERE id_formation = '$efface' ";
$pdoCV->query($sql);// on peut aussi utiliser exec si on le souhaite
header("location: formation.php"); // pour revenir sur la page
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
				$sql = $pdoCV->prepare("SELECT * FROM t_formations WHERE utilisateur_id='1'");
				$sql->execute();
				$nbr_formations = $sql->rowCount();
				//$ligne_formation = $sql->fetch();
		?>
		<h2> il y a <?php echo $nbr_formations; ?> formations </h2>
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
				<?php while ($ligne_formation = $sql->fetch()){ ?>
				<td><?php echo $ligne_formation['f_titre']; ?></td>
				<td><?php echo $ligne_formation['f_soustitre']; ?></td>
				<td><?php echo $ligne_formation['f_dates']; ?></td>
				<td><?php echo $ligne_formation['f_description']; ?></td>
				<td><a href="formation.php?id_formation=<?php echo $ligne_formation['id_formation']; ?> ">supprimer</a></td>
				<td><a href="modif_formation.php?id_formation=<?php echo $ligne_formation['id_formation']; ?> ">modifier</a></td>
				<td></td>
			</tr>
			<?php } ?>
		</table>
		<hr>
		<h3>Insertion d'une formation</h3>
		<form action="formation.php" method="post">
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

