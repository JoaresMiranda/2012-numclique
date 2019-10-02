<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
        if (!empty($post->post_password)) { // if there's a password
            if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
				?>

	<p class="nocomments">Este post &eacute; protegido por senha. Insira sua senha para poder visualizar os coment&aacute;rios<p>
  
	<?php
				return;
            }
        }
		/* This variable is for alternating comment background */
		$oddcomment = 'odd';
	?>

<div class="boxcomments">
  <?php if ($comments) : ?>
  <?php 
	/* Count the totals */
	$numPingBacks = 0;
	$numComments  = 0;
	/* Loop through comments to count these totals */
	foreach ($comments as $comment) {
		if (get_comment_type() != "comment") { $numPingBacks++; }
		else { $numComments++; }
	}
?>
  <?php 
	/* This is a loop for printing comments */
	if ($numComments != 0) : ?>
  <div id="comentarios">
  <h2 id="comments">Coment&aacute;rios</h2>
    <?php foreach ($comments as $comment) : ?>
    <?php if (get_comment_type()=="comment") : ?>
    
    <div id="comment-<?php comment_ID() ?>"> 
			<?php echo get_avatar( $comment, $size = '50' ); ?>

      <div class="comentarista">
        <p>
          <strong><?php get_autor_comentarios_link() ?></strong><br />
          <span>em <?php comment_date('j \d\e F \d\e Y') ?></span>
        </p>
      </div>
      <?php if ($comment->comment_approved == '0') : ?>
      <em>Seu coment&aacute;rio est&aacute; aguardando modera&ccedil;&atilde;o.</em>
      <?php endif; ?>
      <div class="textoComentarios">
      <?php comment_text() ?>
      </div>
    </div>
    <?php /* Changes every other comment to a different class */	

	if ('alt' == $oddcomment) $oddcomment = '';

	else $oddcomment = 'odd';

	?>
    <?php endif; endforeach; ?>
  </div>
  <?php endif; ?>
  <?php



	/* This is a loop for printing trackbacks if there are any */



	if ($numPingBacks != 0) : ?>
  <h2 id="trackbacks">Quem linkou este post</h2>
  <ol class="tblist">
    <?php foreach ($comments as $comment) : ?>
    <?php if (get_comment_type()!="comment") : ?>
    <li id="comment-<?php comment_ID() ?>">
	 <?php comment_author_link() ?> (<small><?php comment_date('j M Y') ?></small>)
      :  <?php comment_text() ?>
      <?php if ($comment->comment_approved == '0') : ?>
      <em>Seu coment&aacute;rio est&aacute; em modera&ccedil;&atilde;o.</em>
      <?php endif; ?>
    </li>
    <?php if('odd'==$thiscomment) { $thiscomment = 'even'; } else { $thiscomment = 'odd'; } ?>
    <?php endif; endforeach; ?>
  </ol>
  <?php endif; ?>
  <?php else : 



	/* No comments at all means a simple message instead */ 



?>
  <?php endif; ?>
  <?php if (comments_open()) : ?>
  <?php if (get_option('comment_registration') && !$user_ID ) : ?>
  <p id="comments-blocked">Voc&ecirc; precisa <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logar</a> para comentar.</p>
  <?php else : ?>

  <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

    <h3 id="respond">Inserir coment&aacute;rio</h3>
    <?php if ($user_ID) : ?>
    <p>Voc&ecirc; est&aacute; logado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"> <?php echo $user_identity; ?></a>. Para deslogar, <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Log out of this account">clique aqui</a>. </p>
    <?php else : ?>
    <p>
      <label for="author">Nome
      <?php if ($req) _e(' (obrigat&oacute;rio)'); ?>
      </label>
      <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" />
    </p>
    <p>
      <label for="email">E-mail (n&atilde;o ser&aacute; publicado)
      <?php if ($req) _e(' (obrigat&oacute;rio)'); ?>
      </label>
      <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" tabindex="2" size="22" />
    </p>
    <p>
      <label for="url">Website</label>
      <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" />
    </p>
    <?php endif; ?>
    <p>
      <textarea name="comment" id="comment" cols="5" rows="10" tabindex="4"></textarea>
    </p>
    <p>
      <input name="submit" type="submit" id="submit" tabindex="5" value="Enviar coment&aacute;rio" />
      <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
    </p>
    <?php do_action('comment_form', $post->ID); ?>
  </form>
  <?php endif; // If registration required and not logged in ?>
  <?php else : // Comments are closed ?>
  <p id="comments-closed">Oops! Os coment&aacute;rios est&atilde;o encerrados.</p>
  <?php endif; ?>
</div>
