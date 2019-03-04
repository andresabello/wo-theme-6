<?php
	//Header 	
	get_header();
	//Slider
	get_template_part( 'template/home', 'slider' ); 

	//variables for current template
	$homepage_options = get_option('ac_homepage_settings');
	$general_options = get_option('ac_general_settings');
	$contact_cta = $homepage_options['contact_page_cta_text'];
	$mid_cta = $general_options['upper_cta'];
	$form_position = $homepage_options['form_position'];
	
	//If Form is on top
	if($form_position === "top" ){
		//Home Form
		echo '<div class="form-top">';
		get_template_part( 'template/home', 'form' );
		echo '</div>';
		get_template_part( 'template/home', 'features' );
	}
?>

	<div class="home-content">
		<div class="container">
			<div class="row">
			    <div class="col-md-12 ac-content">
			    	<?php if($form_position === "bottom" ): ?>
				    	<div class="middle-cta text-center">
				    		<?= htmlspecialchars_decode($mid_cta); ?>
				    	</div>
			    	<?php endif; ?>
			        <?php if(have_posts()) : while(have_posts()) : the_post(); ?>
			            <?php the_content(); ?>
			        <?php endwhile; else: ?>
			        <p><?php _e('No pages were found. Sorry!'); ?></p>
			        <?php endif; ?>
			    </div>               
			</div>
		</div>
	</div>
<?php
	//If Form is at the bottom 
	if($form_position === "bottom" ){
		// Features Section
		get_template_part( 'template/home', 'features' );
		//Home Form
		get_template_part( 'template/home', 'form' );
	}
?>
<?php get_footer(); ?>

