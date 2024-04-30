<?php
/*
Home/catch-all template
*/

get_header(); 

?>
	<div class="main-content" role="main">

		<?php
		if ( is_search() ) {
			?><h1>Search Results for <span>'<?php print $_REQUEST["s"]; ?>'</span></h1><hr><?php
		} else {
			?><h1>News</h1><hr><?php
		}

		if ( have_posts() ) : 

			// Start the Loop.
			while ( have_posts() ) : the_post(); 
				?>
				<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<?php the_excerpt(); ?>
				<p class="quiet">Posted by <?php print get_the_author_link() ?> in <?php print get_the_category_list( ', ' ) ?>.</p>
				<hr />
				<?php
			endwhile;

		else :

			print "<p>There are currently no posts to list here.</p>";

		endif;
		?>
		
		<?php paginate(); ?>

	</div><!-- #primary -->


<?php get_footer(); ?>