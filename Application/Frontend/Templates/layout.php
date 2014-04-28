<!DOCTYPE html>
<html>
 	<head>
 		<meta charset="utf-8">
		<link rel="stylesheet" media="screen" href="/css/frontend.css" type="text/css" />
		<link rel="stylesheet" media="screen" href="/css/memories.css" type="text/css" />
		<link rel="stylesheet" media="screen" href="/css/inscription.css" type="text/css" />
		
		<title>Rien à Faire <?php echo $title ?></title>
	</head>
	<body>
		<header>
			<a href="/"><h1>Rien à Faire 
							<div class="groupeur">
								<img src="uploads/info.png" />
									<span class="infoSite"> 
										<?php 
										if(isset($infoPage))
											echo $infoPage;
										?>
									</span>
							</div>
						</h1>
			</a>
			
		</header>

		

		<section>		
			<?php echo $content ?>
		</section>
	</body>
</html>