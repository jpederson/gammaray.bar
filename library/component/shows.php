<?php

// get the title
$title = get_sub_field( 'title' );

// get current timestamp minus 6 hours
$start_time = current_time( 'timestamp' )-7200;

// query shows
$the_query = new WP_Query( array(
    'post_type' => 'show',
	'meta_key' => 'show_date',
    'orderby' => 'meta_value',
    'order' => 'ASC',
	'meta_query' => array(
		array(
			'key' => 'show_date',
			'value' => wp_date( 'Y-m-d H:i:s', $start_time ),
			'compare' => '>='
		)                   
	)
) );
query_posts( $args );


if ( $the_query->have_posts() ) : 
    ?>
<div class="show-listing-container">
    <?php if ( !empty( $title ) ) print '<h2>' . $title . '</h2>'; ?>
    <div class="show-listing">
    <?php
    // Start the Loop.
    while ( $the_query->have_posts() ) : $the_query->the_post(); 

        // get date information
        $date = get_field( 'show_date' );
        $date_ts = strtotime( $date );
        $doors = get_field( 'doors_open' );
        $doors_time = str_replace( ':00', '', date( 'g:ia', $date_ts - ( $doors * 60 ) ) );
        $date_formatted = str_replace( 'at', '<span><strong>@</strong></span>', str_replace( ':00', '', date( 'M j \a\t g:ia', $date_ts ) ) );
        
        // get the thumbnail
        $thumbnail_url = ( has_post_thumbnail() ? get_the_post_thumbnail_url() : get_field( 'default_event_image', 'option' ) );
        ?>
        <div class="show">
            <a href="<?php the_permalink(); ?>"><img src="<?php print $thumbnail_url; ?>" class="post-thumbnail"></a>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="show-date"><?php print '<span>Show:</span> ' . $date_formatted . '<br><span>Doors:</span> ' . $doors_time; ?></div>
        </div>
        <?php

    endwhile;
    ?>
    </div>
    <p class="text-center"><a href="/shows" class="btn large">All Upcoming Shows</a></p>
</div>
    <?php
else :

    print "<p>No upcoming shows - come back soon for more!</p>";

endif;
