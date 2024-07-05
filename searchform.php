<?php
/**
 * The template for displaying search forms.
 *
 * @file      searchform.php
 * @package   norte_marketing
 * @author    Norte Marketing
 * @link 	  https://www.nortemkt.com
 */
?>
 
<form method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
	<div>
		<input class="searchfield" type="text" value="<?php _e('Search', 'norte_marketing');?>" name="s" id="s" onfocus="if (this.value == 'Buscar') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Buscar';}" />
	</div>
</form>
