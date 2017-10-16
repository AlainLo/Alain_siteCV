<?php require 'connexion.php'; ?>
<?php 
// gestion des contenus de la BDD

if(isset($_POST ['loisir'])){// insertion d'un loisir
	// si on a posté un nouveau loisir
	if ($_POST['loisir']!=''){ //si on a posté un loisir qui n'est pas vide
			$loisir= addslashes($_POST['loisir']);
			$pdoCV->exec(" INSERT INTO t_loisirs VALUES (NULL, '$loisir', '1')");// mettre $id_utilisateur quand on l'aura dans la variable de session.
			header("location: loisirs.php");//pour revenir sur la page
			exit();
	} //ferme le "if n'est pas vide"
}// ferme le if(isset) du FORM

// suppression d'un loisir
if(isset($_GET ['id_loisir'])){// on récupére le loisir par son id dans l'url
$efface = $_GET['id_loisir'];
$sql = "DELETE FROM t_loisirs WHERE id_loisir = '$efface' ";
$pdoCV->query($sql);// on peut aussi utiliser exec si on le souhaite
header("location: loisirs.php"); // pour revenir sur la page
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
				$sql = $pdoCV->prepare("SELECT * FROM t_loisirs WHERE utilisateur_id='1'");
				$sql->execute();
				$nbr_loisirs = $sql->rowCount();
				//$ligne_loisir = $sql->fetch();
		?>
		<h2> il y a <?php echo $nbr_loisirs; ?> loisirs</h2>
		<table border="1">
			<tr>
				<th>loisirs</th>
				<th>Suppression</th>
				<th>Modification</th>
			</tr>
			<tr>
				<?php while ($ligne_loisir = $sql->fetch()){ ?>
				<td><?php echo $ligne_loisir['loisir']; ?></td>
				<td><a href="loisirs.php?id_loisir=<?php echo $ligne_loisir['id_loisir']; ?> ">supprimer</a></td>
				<td><a href="modif_loisir.php?id_loisir=<?php echo $ligne_loisir['id_loisir']; ?> ">modifier</a></td>
				<td></td>
			</tr>
			<?php } ?>
		</table>
		<hr>
		<h3>Insertion d'un loisir</h3>
		<form action="loisirs.php" method="post">
			<label for="loisir">Loisir</label>
			<input type="text" name="loisir" id="loisir" placeholder="Insérer un loisir">
			<input type="submit" value="Insérer">
		</form>
	</body>
</html>

