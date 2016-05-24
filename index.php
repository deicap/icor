<?php require ('engine.php') ?><!DOCTYPE html>
<html class="loading" lang="<?php echo $_lang ?>">
<head>

	<title><?php echo $_page_meta['meta_title'] ?></title>
	
	<meta charset="UTF-8" />
	
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.6.2/css/font-awesome.min.css">
	<link rel="stylesheet" href="/css/site.css">

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="/js/jquery.flexslider-min.js"></script>
	<script src="/js/site-scripts.js"></script>

	<?php if ($_lang != 'ru') { ?>
	
		<script src="//use.typekit.net/pph1ico.js"></script>
		<script>try{Typekit.load({ async: true });}catch(e){}</script>
		
	<?php } else { ?>
		
		<link rel="stylesheet" href="/css/fonts-ru.css">
		
	<?php } ?>
	
</head>
<body>

<div class="site-wrapper">

	<?php
		include ('templates/'.$_lang.'/components/site-header.php');
	?>

	<?php
		include ('templates/'.$_lang.'/components/site-main.php');
	?>

</div>

</body>
</html>