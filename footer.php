<?php

/**
 * The template for displaying the footer.
 *
 * The footer widget area.
 *
 * @file      footer.php
 * @package   norte_marketing
 * @author    Norte Marketing
 * @link 	  https://www.nortemkt.com
 */
?>
<div class="container-fluid rodape  ">
	<div class="container">
		<div class="row">
	 
			<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
				<div class="row row-cols-1 row-cols-md-3 row-cols-lg-3 row-cols-xl-4 row-cols-xxl-4 justify-content-xs-left justify-content-sm-left justify-content-md-left justify-content-lg-left justify-content-xl-left justify-content-xxl-left">
					<?php if (!dynamic_sidebar('sidebar-2')) : ?>
						
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="footer-info mt-3 mb-2">
		<div class="container">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
					<div class="direitos-reservados">
						<p>  
							2024 - Todos os direitos reservados -  <?php bloginfo('name');?><br />
							<a href="<?php echo home_url('/'); ?>/politica-de-privacidade/" title="Política de privacidade">
								Política de privacidade
							</a>
							&
							<a href="<?php echo home_url('/'); ?>/politica-de-cookies/" title="Política de cookies">
								Política de cookies
							</a>
							<br />
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php wp_footer(); ?> 
</body> 
</html> 