<aside class="col-md-4">	
	<div class="sidebar">		
		<?php if ( !function_exists( 'dynamic_sidebar' ) ||		!dynamic_sidebar('Main Sidebar') ) : ?>
			<h2 class="title-header">Search</h2>			
			<?php get_search_form(); ?>		
		<?php endif; ?>			
	</div>
</aside>