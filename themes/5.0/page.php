<?php get_header(); ?>
    	
        <!-- Content -->
        <div id="Content">
    <?php
    if (have_posts ()) {
        while (have_posts ()) {
            the_post(); ?>
			<!-- cxPost -->
			<div class="cxPost">
            	<div class="tpPost">
				<h2>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h2>
                </div>
				<div class="txtPost">
					<?php the_content(); ?>
				</div>
			</div>
			<!-- /cxPost -->
    <?php }
    } ?>

        </div>
        <!-- /Content -->

<?php get_sidebar(); ?>
        
<?php get_footer(); ?>