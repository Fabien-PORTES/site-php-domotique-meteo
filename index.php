<!DOCTYPE html>
    <head>
        <meta charset="utf-8" />
    <link href="css/metro-bootstrap.css" rel="stylesheet">
    <link href="css/metro-bootstrap-responsive.css" rel="stylesheet">
    <link href="css/iconFont.css" rel="stylesheet">
    <link href="css/docs.css" rel="stylesheet">
    <link href="js/prettify/prettify.css" rel="stylesheet">
	
	<!-- Load JavaScript Libraries -->
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/jquery/jquery.widget.min.js"></script>
    <script src="js/jquery/jquery.mousewheel.js"></script>
    <script src="js/prettify/prettify.js"></script>
	<!-- Metro UI CSS JavaScript plugins -->
    <script src="js/load-metro.js"></script>
	<script src="js/metro/metro-calendar.js" rel="stylesheet"></script>
	<script src="js/metro/metro-locale.js" rel="stylesheet"></script>
	<script src="js/metro/metro-global.js" rel="stylesheet"></script>
	<!-- Local JavaScript -->
    <script src="js/docs.js"></script>
    <script src="js/github.info.js"></script>
	
	<title>Domotique-Raspberry</title>
	<style>
        .container {
            width: 1140px;
        }
    </style>
    </head>
	
<?php
try
{
	$bdd = new PDO('mysql:host=127.0.0.1;dbname=Arduino', '', '');
}
catch (Exception $e)
{
	die('Erreur : ' . $e->getMessage());
}
	$Temp_table = $bdd->query('SELECT * FROM temperature WHERE nom="exterieur" ORDER BY ID DESC LIMIT 1');
	$donnees = $Temp_table->fetch();
	$Temperature=floatval($donnees['valeur']);
	$Temperature=round($Temperature,1,PHP_ROUND_HALF_EVEN);
	$temps=substr($donnees['date_temps'],-8,5);
	$Temp_table->closeCursor(); // Termine le traitement de la requête
?>

<div class="ribbed-green">
<body class="metro">


<!--Creation du container utilisant METRO UI CSS Master-->
<div class="container">
			<?php include("includes/menu.php"); ?>
			
<div class="grid fluid">
	<div class="row">
		
		<!--Insertion du calendrier. On adapte la largeur de la colonne a celle du calendrier (250px)-->
		<div class="span" style="width:250px;">
		<div class="small calendar" data-role="calendar" data-locale="fr"></div>
		</div>
		
		<div class="span5 bg-blue bg-hover-darkBlue">
				<i class="icon-cloudy on-right-more" style="font-size: 100px; float:left"></i> <!--insertion de l'image météo-->
				<small style="float:bottom"> <?php echo $temps;?></small>	<!--insertion de date_temps d'actualsation-->	
				<h1 class="on-right-more" style="float:left">	<b><?php echo $Temperature; ?>°C</b></h1>		<!--insertion de la temperature-->
				<h3 style="float:left; left-margin:10px;">35°<br>12°<br> </h3>			
		</div>
		
		<div class="span bg-blue" style="width:90px;">
		<i class="icon-box-add on-right-more bg-blue" style="padding:0px; margin:0px; font-size: 90px; float:right;"></i>
		</div>
		

	</div>

</div>

</div>	
        
</body>
</div>
</html>

