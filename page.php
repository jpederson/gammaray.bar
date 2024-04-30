<?php

get_header();

?>

<div class="main-content purple first" role="main">
	<?php 
	
	if ( have_posts() ) :
		while ( have_posts() ) : the_post(); 
			?>
	<h1><?php the_title(); ?></h1>
	<hr>
	<?php the_content(); ?>
			<?php
		endwhile;
	endif;

	?>
</div><!-- #content -->

<?php

get_footer();

?>