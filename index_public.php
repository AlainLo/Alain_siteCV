<?php 
$db = new PDO('mysql:host=localhost;dbname=alainlortal_cvsite;charset=utf8','root', ''); // connexion à MySQL
$sql = 'SELECT * FROM t_utilisateurs';
$req = $pdo->query($sql);
while($row = $req->fetch()){
	echo "Vous êtes sur le site de '.$row['prenom']' '.$row['nom']'";
}
 


?>
<!doctype html>+
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		
		<title> Site de  <?= $ligne_utilisateur['prenom']; ?> <?= $ligne_utilisateur['nom']; ?></title>

		<!-- Bootstrap -->
	    <link href="css/bootstrap.min.css" rel="stylesheet">
		<!--personal css-->
		<link href="css/stylepublic.css" rel="stylesheet">

	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	</head>
	<body>

			<?php include('navbar.php');?>
		<section>
			<h1> site cv de <?php echo($ligne_utilisateur['prenom'].' '.$ligne_utilisateur['nom']); ?></h1>
	      	
	      	<div class="container">
				<hr>
				<?php
						$sql = $pdoCV->prepare("SELECT * FROM t_realisations");
						$sql->execute();
						$nbr_realisations = $sql->rowCount();
						//$ligne_realisation = $sql->fetch();
				?>
				<div class="row">
			        <div class="col-md-8">
			        	<h2> il y a <?php echo $nbr_realisations; ?> réalisations</h2>
			            <table class="table  table-hover table-condensed">
								<tr>
									<th>titre</th>
									<th>sous-titre</th>
									<th>dates</th>	
									<th>description</th>
								</tr>
								<tr>
								<?php while ($ligne_realisation = $sql->fetch()){ ?>
									<td><?php echo $ligne_realisation['r_titre']; ?></td>
									<td><?php echo $ligne_realisation['r_soustitre']; ?></td>
									<td><?php echo $ligne_realisation['r_dates']; ?></td>
									<td><?php echo $ligne_realisation['r_description']; ?></td>
								</tr>
								<?php } ?>
						</table>
					</div>

				</div>
			</div>
			<div class="container">
				<?php
						$sql = $pdoCV->prepare("SELECT * FROM t_formations");
						$sql->execute();
						$nbr_formations = $sql->rowCount();
						//$ligne_formation = $sql->fetch();
				?>
				<div class="row">	
			        	<div class="col-md-8">
			        		<h2> il y a <?php echo $nbr_formations; ?> formations </h2>
							<table class="table  table-hover table-condensed">
								<tr>
									<th>titre</th>
									<th>sous-titre</th>
									<th>dates</th>	
									<th>description</th>
								</tr>
								<tr>
									<?php while ($ligne_formation = $sql->fetch()){ ?>
									<td><?php echo $ligne_formation['f_titre']; ?></td>
									<td><?php echo $ligne_formation['f_soustitre']; ?></td>
									<td><?php echo $ligne_formation['f_dates']; ?></td>
									<td><?php echo $ligne_formation['f_description']; ?></td>
								</tr>
							</table>
						</div>
					</div>	
		</section>	







		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
		<?php include('footer.php');?>  
	</body>
</html>