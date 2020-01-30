<?php get_header(); ?>
    <h1>index.php</h1>
<?php if (have_posts()): while (have_posts()): the_post(); ?>
    <a href="<?php echo get_permalink(); ?>"><?php echo get_the_title(); ?></a>
<?php endwhile; endif; ?>
<?php get_footer(); ?>
