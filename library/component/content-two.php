<?php

// get the title and theme
$valign = get_sub_field( 'valign' );
$style = get_sub_field( 'style' );
$content_one = get_sub_field( 'content-one' );
$content_two = get_sub_field( 'content-two' );


// if it's not empty, lets output it
if ( !empty( $content_one ) ) {
	?>
<div class="content-two-container">
    <div class="wrap">
        <div class="content-two <?php print $valign; ?> <?php print $style ?>">
            <div class="column one">
                <?php print $content_one ?>
            </div>
            <div class="column two">
                <?php print $content_two ?>
            </div>
        </div>
    </div>
</div>
	<?php
}
