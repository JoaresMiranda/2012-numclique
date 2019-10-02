        <!-- Sidebar -->
        <div id="Sidebar">
        	
            <div id="Square">
            	<h3>Publicidade</h3>
                <div class="banner primeiroColuna">
                	<?php if (function_exists('dfrads')) { echo dfrads('7101671'); } ?>
                </div>

                <div class="banner segundoColuna">
                	<?php if (function_exists('dfrads')) { echo dfrads('7563931'); } ?>
                </div>
            </div>
            
            <div id="PostsRecentes">
            	<h3>Posts Recentes</h3>
				<?php
                global $post;
                if (is_home()) {
                ?>
                <ul>
                <?php
                foreach( (array) get_posts('offset=7') as $post ) :
                    setup_postdata($post);
                    ?>
                    <li>
                        <?php
                        if(has_post_thumbnail()) {
                        echo '<a href="'.get_permalink().'">';
                        echo get_the_post_thumbnail($post->ID, array(50,50) );
                        echo '</a>';
                        } ?>
                        <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?></a>
                    </li>
                    <?php
                endforeach;
                ?>
                </ul>
                <?php
                } else {
                ?>
                <ul>
                <?php
                foreach( (array) get_posts('offset=0') as $post ) :
                    setup_postdata($post);
                    ?>
                    <li>
                        <?php
                        if(has_post_thumbnail()) {
                        echo '<a href="'.get_permalink().'">';
                        echo get_the_post_thumbnail($post->ID, array(50,50) );
                        echo '</a>';
                        } ?>
                        <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?></a>
                    </li>
                    <?php
                endforeach;
                ?>
                </ul>
                <?php
                }
                ?>
            </div>
            
            <p id="BannerRSS"><a href="http://feeds.feedburner.com/numclique"><img src="<?php bloginfo('template_directory'); ?>/imagens/banner-assinerss.jpg" /></a></p>
            
            <div id="Facebook">
            	<h3>Facebook</h3>
            	<iframe src="//www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2Fnumclique&amp;width=300&amp;colorscheme=light&amp;show_faces=true&amp;border_color&amp;stream=false&amp;header=false&amp;height=555" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:555px;" allowTransparency="true"></iframe>
            </div>

            <div id="GPlus">
            	<h3>Google+</h3>
            	<g:plus href="https://plus.google.com/114796839011859603607" rel="publisher" width="300" height="131" theme="light"></g:plus>
            </div>
         
            <div id="FiltroPosts">
            	<h3>Ver posts por...</h3>
                <p>Categoria: <?php wp_dropdown_categories('show_option_none=Escolha uma categoria'); ?>
				<script type="text/javascript"><!--
                    var dropdown = document.getElementById("cat");
                    function onCatChange() {
                        if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
                            location.href = "<?php echo get_option('home');
                ?>/?cat="+dropdown.options[dropdown.selectedIndex].value;
                        }
                    }
                    dropdown.onchange = onCatChange;
                --></script></p>
                <p>Mês/Ano: <select name="archive-dropdown" onChange='document.location.href=this.options[this.selectedIndex].value;'>
        <option value=""><?php echo attribute_escape(__('Select Month')); ?></option>
        <?php wp_get_archives('type=monthly&format=option&show_post_count=0'); ?> </select></p>
            </div>
            
            <div id="SitesBacanas">
            	<h3>Sites Bacanas</h3>
				<?php
                $the_query = new WP_Query('page_id=19766');
        
                while ($the_query->have_posts()) : $the_query->the_post();
                    the_content();
                endwhile;
        
                wp_reset_postdata();
                ?>
            </div>
        
            <div id="Blogroll">
                <h3>Blogroll</h3>
                <ul>
                    <?php
                    $bookmarks = get_bookmarks(array(
                                'orderby' => 'name',
                                'order' => 'ASC'
                            ));
        
                    foreach ($bookmarks as $bm) {
                        printf('<li><a href="%s">%s</a></li>', $bm->link_url, __($bm->link_name));
                    } ?>
                </ul>
            </div>
            <!-- /Links -->
            
            <div id="Tags">
            	<h3>Tags</h3>
                <div>
                    <?php wp_tag_cloud('number=60'); ?>
                </div>
            </div>
            
        </div>
        <!-- /Sidebar -->