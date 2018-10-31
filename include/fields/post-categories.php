<?php
/**
 * Custom field to select Post Categories.
 *
 * @see https://kb.wpbeaverbuilder.com/article/620-cmdg-14-create-custom-fields
 * @since 1.0
 * @package WDS_BB_Custom_Field
 */

$cats = get_categories();
foreach ( $cats as $category ) :
?>
	<div>
		<label>
			<#
			// debugger;
			var checked = '';
			if ( 'object' === typeof data.value && jQuery.inArray( '<?php echo esc_attr( $category->term_id ); ?>', data.value ) != -1 ) {
				checked = ' checked="checked"';
			}
			#>
			<input type="checkbox" name="{{data.name}}[]" value="<?php echo esc_attr( $category->term_id ); ?>"{{{checked}}}/>
			<?php echo esc_html( $category->name ); ?>
		</label>
	</div>
<?php
endforeach;
