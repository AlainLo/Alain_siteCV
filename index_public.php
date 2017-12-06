<?php
?>

<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		
		<!--personal css-->
		<link href="css/stylepublic.css" rel="stylesheet">
        <!-- fonts for this site-->
        <link href="https://fonts.googleapis.com/css?family=Exo|Faustina|Fira+Sans:700" rel="stylesheet"> 
	</head>
   
	<body>
        <header>
         <h1>le site de Alain </h1>
            <?php include('navbar.php');?>  
        </header>
        <section>
                         
            <div class="container"> 
                
                <div id="moi_fond" class="onglet">
                    <div class="svg-container">
                        <object type="image/svg+xml" data="svg/moi_fond.svg" class="svg-content">
                        </object>
                    </div>
                </div>
                
                <div id="plus" class="onglet">
                    <div class="svg-container">
                        <object type="image/svg+xml" data="svg/plus.svg" class="svg-content" >
                        </object>
                    </div>
                </div>
                
                <div id="loisirs" class="onglet">
                    <div class="svg-container">
                        <object type="image/svg+xml" data="svg/loisirs.svg" class="svg-content" >
                        </object>
                    </div>
                </div>
                
                <div id="formation" class="onglet">
                    <div class="svg-container">
                        <object type="image/svg+xml" data="svg/formation.svg" class="svg-content" >
                        </object>
                    </div>
                </div>	
                
                <div id="realisations" class="onglet">
                    <div class="svg-container">
                        <object type="image/svg+xml" data="svg/realisations.svg"  class="svg-content" >
                        </object>
                    </div>
                </div>
                
                <div id="competences" class="onglet">
                    <div class="svg-container">
                        <object type="image/svg+xml" data="svg/competences.svg"  class="svg-content" >
                        </object>
                    </div>   
                </div>
                
                <div id="experiences" class="onglet">
                    <div class="svg-container">
                        <object type="image/svg+xml" data="svg/experiences.svg"  class="svg-content" >
                        </object>
                        <div class="svg-etiquette">
                            <p> Moi, ma vie, mon oeuvre </p>
                        </div>
                    </div>
                    <div class="svg-text">
                        <p> Le ver est dans le fruit, et les premiers nuages font leur apparition. Toute à son élan créatif, Paz décide de partir au Yémen pour un projet photo. Arguant de sa connaissance de ce pays dangereux, et de l’impréparation de la jeune femme, César s’oppose à son voyage. Paz cède, et tombe enceinte. C’est la deuxième partie du film. </p>
                    </div>
               </div>
                
                <div id="moi" class="onglet">
                    <div class="svg-container">
                        <object type="image/svg+xml" data="svg/moi.svg" class="svg-content" >
                        </object> 
                        <div class="svg-etiquette">
                            <p> Moi, ma vie, mon oeuvre </p>
                        </div>
                    </div>
                    <div class="svg-text">
                        <p> Le ver est dans le fruit, et les premiers nuages font leur apparition. Toute à son élan créatif, Paz décide de partir au Yémen pour un projet photo. Arguant de sa connaissance de ce pays dangereux, et de l’impréparation de la jeune femme, César s’oppose à son voyage. Paz cède, et tombe enceinte. C’est la deuxième partie du film. </p>
                    </div>
                </div>
                
                
            </div>
        </section>
		<!-- jQuery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
		<?php include('footer.php');?>  
	</body>
</html>