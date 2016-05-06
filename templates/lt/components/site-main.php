<main class="site-main">
	
	<?php
		
		if ($_url == '/') {
			
			include('templates/'.$_lang.'/pages/default.php');
			
		} else {
		
			include('templates/'.$_lang.'/pages/'.$_url.'.php');
		
		}
		
	?>	
	
</main>