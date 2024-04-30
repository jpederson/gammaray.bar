<?php
/**
 * The Template for displaying all single posts
 */

get_header();

?>

	<div class="main-content show" role="main">

		<?php 
		if ( have_posts() ) :
			while ( have_posts() ) : the_post(); 

                // get date information
                $date = get_field( 'show_date' );
                $date_ts = strtotime( $date );
                $doors = get_field( 'doors_open' );
                $doors_time = str_replace( ':00', '', date( 'g:ia', $date_ts - ( $doors * 60 ) ) );
                $date_formatted = str_replace( 'at', '<span>@</span>', str_replace( ':00', '', date( 'M j \a\t g:ia', $date_ts ) ) );

                // get the thumbnail
				$thumbnail_url = ( has_post_thumbnail() ? get_the_post_thumbnail_url() : get_field( 'default_event_image', 'option' ) );

                // get pricing
                $price_advance = get_field( 'price_advance' );
                $price_door = get_field( 'price_door' );
                $price_virtual = get_field( 'price_virtual' );

                // get ticket link
                $ticket_link = get_field( 'ticket_link' );

				?>
                <div class="show-info">
                    <div class="thumbnail">
                        <img src="<?php print $thumbnail_url; ?>" class="show-thumbnail">
                    </div>
                    <div class="info">
                        <h1 class="show-title"><?php the_title(); ?></h1>
                        <p><span class="label">Show Date:</span>
                            <?php the_field( 'show_date' ); ?></p>
                        <p><span class="label">Price:</span>
                            <?php if ( empty( $price_advance ) && empty( $price_door ) && empty( $price_virtual ) ) { print "TBA"; } ?>
                            <?php if ( !empty( $price_advance ) ) { ?>$<?php print $price_advance; ?> <span class="light">advance</span><?php } ?>
                            <?php if ( !empty( $price_door ) ) { ?><br>$<?php print $price_door; ?> <span class="light">door</span><?php } ?>
                            <?php if ( !empty( $price_virtual ) ) { ?><br>$<?php print $price_virtual; ?> <span class="light">virtual</span><?php } ?>
                        </p>
                        <?php if ( !empty( $ticket_link ) ) { ?><p><a href="<?php print $ticket_link; ?>" class="btn large">Buy Tickets</a></p><?php } ?>
                    </div>
                </div>
                <div class="show-description">
                    <p class="label">Show Description:</p>
				    <?php the_content(); ?>
                </div>
                <?php 
                $artists = get_field( 'acts' );
                if ( !empty ( $acts ) ) { ?>
                <div class="artist-info">
                    <h2>Artist Information</h2>
                    <div class="artist-list">
                    <?php 
                    foreach ( $acts as $act ) {

                    }
                    ?>
                    </div>
                </div>
                    <?php
                }
			endwhile;
		endif;
		?>
	</div>

<?php

get_footer();

?>