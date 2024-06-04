<?php

// get the title and theme
$content_one = get_sub_field('content-one');


// if it's not empty, lets output it
if ( !empty( $content_one ) ) {
	?>
<div class="content-one">
	<?php print $content_one ?>
</div>
	<?php
}
