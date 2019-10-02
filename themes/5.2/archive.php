<?php get_header(); ?>    
    	
        <!-- Content -->
        <div id="Content">
    <?php
    if (have_posts ()) {
        while (have_posts ()) {
            the_post(); ?>

        	<!-- cx post -->
            <div class="CxPost">
            	<div class="tpPost">
                	<p><?php the_category(' &gt; '); ?></p>
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></h2>
                </div>
                
                <div class="txtPost">
                	<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail', array('class' => 'alignright size-full')); ?></a>
                	<?php the_excerpt(); ?>
                    <?php echo '<p class="btContinuarLendo"><a href="' . get_permalink($post->ID) . '">Continuar lendo &raquo;</a></p>'; ?>
                    <p class="numComentarios"><iframe src="http://www.facebook.com/plugins/comments.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&permalink=1" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:130px; height:16px;" allowTransparency="true"></iframe></p>
                </div>
                
                <div class="metaPost">
                	<div class="dataPost">
                    	<p>Publicado em</p>
                        <p><?php the_time('\<\s\p\a\n\>d\<\/\s\p\a\n\>\<\b\r\ \/\>\d\e F \d\e Y') ?></p>
                    </div>
                    
                    <div class="infos">
                    	<p class="shareButtons">Compartilhe: <g:plusone href="<?php echo get_permalink($post->ID); ?>" size="medium"></g:plusone> <iframe allowtransparency="true" frameborder="0" scrolling="no" src="http://platform.twitter.com/widgets/tweet_button.html?url=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;text=<?php the_title(); ?>" style="width:100px; height:20px;"></iframe> <iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode(get_permalink($post->ID)); ?>&amp;layout=button_count&amp;show_faces=false&amp;width=95&amp;action=like&amp;colorscheme=light" scrolling="no" frameborder="0" allowTransparency="true" style="border:none; overflow:hidden; width:95px; height:20px"></iframe></p>
                        <div class="autorPost">
                        	<?php echo get_avatar( get_the_author_email(), '50' ); ?>
                            <h3><?php the_author_posts_link(); ?></h3>
                            <p>Twitter: <a href="http://twitter.com/<?php the_author_nickname(); ?>">@<?php the_author_nickname(); ?></a></p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /cx post -->
    <?php
        }
    } else {?>
    	<!-- cxPost -->
        <div class="cxPost">
            <div class="txtPost">
            <h2>Oops!</h2>
            <p>Nada foi encontrado. Vamos tentar de novo com outras palavras? :)</p>
            <p>&raquo; Ir para a <a href="<?php bloginfo('home'); ?>">página inicial</a></p>
            </div>
        </div>
        <!-- /cxPost -->
    <?php
    }
	wp_reset_query(); ?>

			<!-- Navegacao -->
            <div id="Navegacao">
            	<p class="anteriores"><?php next_posts_link('&laquo; posts anteriores') ?></p>
            	<p class="recentes"><?php previous_posts_link('posts recentes &raquo;') ?></p>
            </div>
            <!-- /Navegacao -->
        	
        </div>
        <!-- /Content -->

<?php get_sidebar(); ?>
        
<?php get_footer(); ?>