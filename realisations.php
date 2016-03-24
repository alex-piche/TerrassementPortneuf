<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
	<meta name="description" content="Les réalisations de Terrassement Portneuf."/>
	<meta name="keywords" content="terrassement, portneuf, québec, aménagement, paysager"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Réalisations - Terrassement Portneuf</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link href="favicon.ico" rel="icon" type="image/x-icon" />
    <script src="js/modernizr.js"></script>
  </head>
  <body>
  
    <div class="row">
			<a href = "index.html"><img src="img/entete.jpg"/></a>
	</div>	
	
    <div id="page" class="row panel">
		
		<div class="large-3 medium-4 columns">
			<div class="row">
				<div class="large-12 medium-12 columns text-center">
					<ul class="side-nav">
						<li><a href="index.html" class="button radius round">Accueil</a></li>
						<li><a href="equipement.html" class="button radius round">Équipement</a></li>
						<li><a href="services.html" class="button radius round">Services</a></li>
						<li><a id="current" href="realisations.php" class="button radius round">Réalisations</a></li>
						<li><a href="contacter.html" class="button radius round">Contacter</a></li>
					</ul>
				</div>
			</div>
		</div>
		<div class="large-9 medium-8 columns">
			<div class="row">
				<div class="large-12 columns text-center">
					<div class="callout panel ombre">
						<h1>Réalisations</h1>
						<table id="Galerie">
						
							<?php
								$k = 0;				
								
								function glob_recursive($pattern, $flags = 0)
								{
									$files = glob($pattern, $flags);
									foreach (glob(dirname($pattern).'/*', GLOB_ONLYDIR|GLOB_NOSORT) as $dir)
									{
										$files = array_merge($files, glob_recursive($dir.'/'.basename($pattern), $flags));
									}
									return $files;
								}	
								
								$files = glob_recursive("thumbs/*.jpg");
								
								$nbPhoto = count($files);
								
								for($i = 0; $i < $nbPhoto/3; $i++)
								{
									echo "<tr>";

									for($j = 0; $j < 3; $j++)
									{
										if($k < $nbPhoto)
										{
											echo "<td>";

											echo "<a href=\"", utf8_encode(str_replace("thumbs", "photo", $files[$k])), "\"><img src=\"", utf8_encode($files[$k]), "\" class=\"imgGalerie ombre\"/></a>";

											echo "</td>";
											
											$k++;
										}								
									}
									
									echo "</tr>";
								}
								
								
							?>
							
						</table>
					</div>	
				</div>
			</div>	
		</div>
    </div>
	
    <script src="js/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script>
      $(document).foundation();
    </script>
  </body>
</html>
