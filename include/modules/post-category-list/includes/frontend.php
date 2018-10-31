<?php
/**
 * Module HTML.
 *
 * @see https://kb.wpbeaverbuilder.com/article/600-cmdg-05-module-html
 * @since 1.0
 * @package WDS_BB_Custom_Field
 */

?>
<section class="widget widget-post-category-list">
	<?php if ( $settings->list_title ) : ?>
		<h2 class="widget-title"><?php echo esc_html( $settings->list_title ); ?></h2>
	<?php endif; ?>
	<?php $query = $module->category_posts_query(); ?>
	<?php if ( $query->have_posts() ) : ?>
		<ul>
		<?php while ( $query->have_posts() ) : ?>
			<?php $query->the_post(); ?>
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
		</ul>
	<?php endif; ?>
</section>
