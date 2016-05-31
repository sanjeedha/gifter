<?php get_header(); ?>

	<?php if (have_posts()) : ?>
		
		<?php while (have_posts()) : the_post(); ?>
		
		<div class="post">

			<?php the_date('m.d.y', '<h1 class="storydate">', '</h1>'); ?> 
			<h2 id="post-<?php the_ID(); ?>" class="storytitle"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to'); ?> <?php the_title(); ?>"><?php the_title(); ?></a></h2>
			<p class="meta"><?php _e('Posted in'); ?> <?php the_category(', ') ?> <?php _e('at'); ?> <?php the_time(); ?> <?php _e('by'); ?> <?php the_author(); ?></p>
		
			<?php if (is_search()) { ?>
				<?php the_excerpt() ?>
			<?php } else { ?>
				<?php the_content(__('Read the rest of this entry &raquo;')); ?>
			<?php } ?>

			<p class="feedback">
			<a href="<?php the_permalink() ?>" rel="bookmark" title="<?php _e('Permanent link to'); ?> <?php the_title(); ?>" class="permalink"><?php _e('Permalink'); ?></a>
			<?php comments_popup_link(__('Comments'), __('1 Comment'), __('% Comments'), 'commentslink', __('Comments off')); ?>
			<?php edit_post_link(__('Edit'), ' &#183; ', ''); ?>
			</p>
			
			<!--
			<?php trackback_rdf(); ?>
			-->

			</div>
	
		<?php endwhile; ?>

		<p>
			<?php posts_nav_link('', __(''), __('&laquo; Previous entries')); ?>
			<?php posts_nav_link(' &#183; ', __(''), __('')); ?>
			<?php posts_nav_link('', __('Next entries &raquo;'), __('')); ?>
		</p>
		
	<?php else : ?>

		<h2><?php _e('Not Found'); ?></h2>

		<p><?php _e('Sorry, but no posts matched your criteria.'); ?></p>
		
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>

	<?php endif; ?>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
