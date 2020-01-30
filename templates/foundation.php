<?php
/*
 * Template Name: Foundation
 */
get_header();
?>
<h1>Base template</h1>
<?php
if (have_posts()):
    while (have_posts()):
        the_content();
    endwhile;
endif;
?>

<?php get_footer() ?>

