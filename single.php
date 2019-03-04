<?php 
	get_header(); 
	global $post;
	$title = $post->post_title;
	$page_options = get_option('ac_page_settings');
	$sidebar_side = $page_options['sidebar_position'];
	$homepage_options = get_option('ac_homepage_settings');
	$general_options = get_option('ac_general_settings');
	$call_image_url = $homepage_options['cta_button_image_one'];
	$call_image_id = ac_get_image_id($call_image_url);
	$call_alt = get_post_meta($call_image_id, '_wp_attachment_image_alt', true);
	$chat_image_url = $homepage_options['cta_button_image_two'];
	$chat_image_id = ac_get_image_id($chat_image_url);
	$chat_alt = get_post_meta($chat_image_id, '_wp_attachment_image_alt', true);
	$image_url = $homepage_options['ac_main_image'];
	$phone_number = $general_options['ac_number'];

?>
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="cta-buttons">
                <div class="col-md-6" style="padding-right: 0;">
                    <?php 
                    echo '<div class="call-wrap"><a href="tel:'. preg_replace("/[^0-9,.]/", "", $phone_number) .'"><img class="call-image contact-image" src="'. $call_image_url .'" alt="'. ( !empty($call_alt) ? $call_alt : get_bloginfo( 'name') ) .'"></a></div>';
                    ?>
                </div>
                <div class="col-md-6" style="padding-left: 0;">
                    <?php 
                    echo '<div class="chat-wrap"><a href="#" onclick="Comm100API.open_chat_window(event, 1225);"><img class="chat-image contact-image" src="'. $chat_image_url .'" alt="'  . ( !empty($chat_alt) ? $call_alt : get_bloginfo( 'name') ) . '"></a></div>';
                    ?>
                </div>
            </div>    
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="page-title">
                    <?php echo '<h1>' . $title . '</h1>'; ?>                    
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
	<div class="row">
		<div class="box">
			<div class="col-md-8">
				<div class="ac-content">
					<?php if(have_posts()) : while(have_posts()) : the_post(); ?>
						<?php if ( has_post_thumbnail()) : ?>
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail('full', array( 'class'   =>"img-responsive feature-image")); ?></a>
						<?php endif; ?>	
						<div class="byline">
							<p>by <?php the_author_posts_link(); ?> on <span class="date"> <?php the_time('l F d, Y'); ?></span><br/>Posted in: <?php the_category(', '); ?> | <?php the_tags('Tagged with: ',' • ','<br />'); ?></p>
						</div>
						<?php edit_post_link( 'Edit Post' ); ?>
						<?php the_content('Read More...'); ?>
						<div class="navi">
							<div class="right">
								<?php previous_post_link(''); ?>
								<?php next_post_link(''); ?></div>
						</div>
						<?php endwhile; else: ?>
						<p><?php _e('No posts were found. Sorry!'); ?></p>
					<?php endif; ?>
				</div>
			</div>
			<?php get_sidebar(); ?>		
		</div>
	</div>
</div>
<?php get_footer(); ?>