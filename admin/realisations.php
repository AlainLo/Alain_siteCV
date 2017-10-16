<?php require 'connexion.php'; ?>
<?php 
// gestion des contenus de la BDD

if(isset($_POST ['realisation'])){// insertion d'une réalisation
	// si on a posté une nouvelle réalisation
	if ($_POST['realisation']!=''){ //si on a posté une réalisation qui n'est pas vide
			$loisir= addslashes($_POST['realisation']);
			$pdoCV->exec(" INSERT INTO t_realisations VALUES (NULL, '$realisation','$titre', '$soustitre', '$dates', '$description''1')");// mettre $id_utilisateur quand on l'aura dans la variable de session.
			header("location: realisations.php");//pour revenir sur la page
			exit();
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
</head>
<html>
	<body>
		<h1>Admin du site cv de <?php echo($ligne_utilisateur['prenom'].' '.$ligne_utilisateur['nom']); ?></h1>
		<!--<p>texte</p>-->
		<hr>
		<?php
				$sql = $pdoCV->prepare("SELECT * FROM t_realisations WHERE utilisateur_id='1'");
				$sql->execute();
				$nbr_realisations = $sql->rowCount();
				//$ligne_realisation = $sql->fetch();
		?>
		<h2> il y a <?php echo $nbr_realisations; ?> realisations</h2>
		<table border="1">
			<tr>
				<th>Réalisation</th>
				<th>titre</th>
				<th>sous-titre</th>
				<th>dates</th>	
				<th>description</th>
				<th>Supression</th>
				<th>Modification</th>
			</tr>
			<tr>
				<?php while ($ligne_realisation = $sql->fetch()){ ?>
				<td><?php echo $ligne_realisation['realisation']; ?></td>
				<td><?php echo $ligne_realisation['titre']; ?></td>
				<td><?php echo $ligne_realisation['soustitre']; ?></td>
				<td><?php echo $ligne_realisation['dates']; ?></td>
				<td><?php echo $ligne_realisation['description']; ?></td>
				<td><a href="realisations.php?id_realisation=<?php echo $ligne_realisation['id_realisation']; ?> ">supprimer</a></td>
				<td><a href="modif_realisation.php?id_realisation=<?php echo $ligne_realisation['id_realisation']; ?> ">modifier</a></td>
				<td></td>
			</tr>
			<?php } ?>
		</table>
		<hr>
		<h3>Insertion d'une réalisation</h3>
		<form action="realisations.php" method="post">
			<label for="realisation">Réalisation</label>
			<input type="text" name="titre" id="realisation" placeholder="Insérer une réalisation">
			<label for="titre">Titre</label>
			<input type="text" name="realisation" id="realisation" placeholder="Insérer un titre">
			<label for="soustitre">Sous-Titre</label>
			<input type="text" name="soustitre" id="soustitre" placeholder="Insérer un sous-titre">
			<label for="dates">Dates</label>
			<input type="text" name="dates" id="dates" placeholder="Insérer des dates">
			<label for="description">Description</label>
			<input type="text" name="description" id="description" placeholder="Insérer une description">
			<input type="submit" value="Insérer">
		</form>
	</body>
</html>

