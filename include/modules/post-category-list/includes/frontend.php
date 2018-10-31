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
	<ul>
		<li><a href="#">Test</a></li>
		<li><a href="#">Uncategorized</a></li>
	</ul>
</section>
