<?php


// output function for the components
function get_components() {

    // if we have components for this page
    if( have_rows('components') ):

        // loop through the components
        while ( have_rows('components') ) : the_row();

            // layout switch
            if ( get_row_layout() == 'content-one' ): 
                include 'component/content-one.php';

            elseif ( get_row_layout() == 'content-two' ): 
                include 'component/content-two.php';                                               

            elseif ( get_row_layout() == 'separator' ): 
                include 'component/separator.php';

            elseif ( get_row_layout() == 'shows' ): 
                include 'component/shows.php';
                        
            endif;

        // End loop.
        endwhile;

    endif;

}