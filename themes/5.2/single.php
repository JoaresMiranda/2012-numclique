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
                    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                </div>
                
                <div class="AdSenseTopPost">
                	<?php if (function_exists('dfrads')) { echo dfrads('8998482'); } ?>
                </div>
                
                <div class="txtPost">
                    <div id="HOTWordsTxt" name="HOTWordsTxt">
                    <?php the_content(); ?>
                    </div>
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

			<!-- banners -->
            <div id="BannerPosPost">
            	<div class="quadrado1">
                	<?php if (function_exists('dfrads')) { echo dfrads('1971103'); } ?>
                </div>
                
                <div class="quadrado2">
                	<?php if (function_exists('dfrads')) { echo dfrads('5790617'); } ?>
                </div>
            </div>
            <!-- /banners -->

            <!-- posts relacionados -->
            <div class="postsRelacionados">
                <h3>Posts relacionados</h3>
                <?php similar_posts(); ?>
            </div>
            <!-- /posts relacionados -->


            <!-- comentarios -->
            <div id="Comentarios">
                <h3>Comentários</h3>
                <div id="fb-root"></div>
                <script>(function(d){
                  var js, id = 'facebook-jssdk'; if (d.getElementById(id)) {return;}
                  js = d.createElement('script'); js.id = id; js.async = true;
                  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1";
                  d.getElementsByTagName('head')[0].appendChild(js);
                }(document));</script>
                <div class="fb-comments" data-href="<?php echo urlencode(get_permalink($post->ID)); ?>" data-num-posts="10" data-width="630"></div>
            </div>
            <!-- /comentarios -->
        
            <?php }
            } ?>

        	
        </div>
        <!-- /Content -->

<?php get_sidebar(); ?>
        
<?php get_footer(); ?>