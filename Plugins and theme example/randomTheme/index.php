<?php get_header();?>
<div class="MainImage"></div>
<div id="main">

<div id="content">
<h1></h1>
<?php if (have_posts() ) : while (have_posts() ) : the_post();?>

<?php if (is_single()){
echo "<h4>Posted on " ;the_time('Y,j,F'); echo"</h4>";
} ?>
<p><?php the_content(_('(more...)')) ?></p>
<hr> <?php endwhile; else: ?>
<p><?php _e('Sorry, no posts matched your criteria.') ?></p>
<?php endif; ?>
<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
</div>
</div>


<?php carsPanel_hook(); ?>
<?php get_footer(); ?>
