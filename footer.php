<?php 
$ac_options = get_option('ac_general_settings');
$footer_options = get_option('ac_footer_settings');

$footer_columns = $footer_options['footer_columns'];
$insurance_logo = $ac_options['insurance_logos'];
$insurance_logo_id = ac_get_image_id($insurance_logo);
$insurance_logo_alt = get_post_meta($insurance_logo_id, '_wp_attachment_image_alt', true);
?>              
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <?= '<img style="margin-top: 40px;" class="img-responsive" src="' . $insurance_logo . '" alt=" '. ( !empty($insurance_logo_alt) ? $insurance_logo_alt : 'We accept insurance. Aeta, Cigna, Humana, BlueCross Blueshild, Hartford Healthcare, United HealthCare and more' )  .'">' ; ?>                    
                </div>                          
            </div>
            <!-- Columns for Insurance Companies -->
        </div>   
        <!-- FOOTER STARTS -->    
        <footer class="footer">
            <div clas="upper-footer">
                <div class="container">
                    <!-- Upper footer -->
                    <div class="row">
                        <?php if($footer_columns > 3 ): ?>
                            <div class="col-md-3">
                                <?php if ( !function_exists('dynamic_sidebar')
                                || !dynamic_sidebar("Footer Left") ) : ?>  
                                <?php endif; ?>                   
                            </div>
                            <div class="col-md-3">
                                <?php if ( !function_exists('dynamic_sidebar')
                                || !dynamic_sidebar("Footer Left Center") ) : ?>  
                                <?php endif; ?>                   
                            </div>
                            <div class="col-md-3">
                                <?php if ( !function_exists('dynamic_sidebar')
                                || !dynamic_sidebar("Footer Right Center") ) : ?>  
                                <?php endif; ?>                   
                            </div>
                            <div class="col-md-3">
                                <?php if ( !function_exists('dynamic_sidebar')
                                || !dynamic_sidebar("Footer Right") ) : ?>  
                                <?php endif; ?>     
                                <p>
                                    <div style="text-align:center">
                                        <div itemscope="" itemtype="http://schema.org/LocalBusiness">
                                            <div itemprop="address" itemscope="" itemtype="http://schema.org/PostalAddress">
                                                <span itemprop="streetAddress">2033 6th Ave, Suite 1013</span>
                                                <span itemprop="addressLocality">Seattle</span>, <span itemprop="addressRegion">WA</span>
                                                <span itemprop="postalCode"> 98121 </span>
                                                <span itemprop="telephone"><a href="tel:2067774098">(206) 777-4098</a></span>      
                                            </div>
                                        </div>
                                    </div>
                                </p>              
                            </div>
                            <span itemprop="name"><h3><?= bloginfo('name'); ?></h3></span>
                        <?php else: ?>
                            <div class="col-md-4">
                                <?php if ( !function_exists('dynamic_sidebar')
                                || !dynamic_sidebar("Footer Left") ) : ?>  
                                <?php endif; ?>                   
                            </div>
                            <div class="col-md-4">
                                <?php if ( !function_exists('dynamic_sidebar')
                                || !dynamic_sidebar("Footer Left Center") ) : ?>  
                                <?php endif; ?>                   
                            </div>
                            <div class="col-md-4">
                                <?php if ( !function_exists('dynamic_sidebar')
                                || !dynamic_sidebar("Footer Right Center") ) : ?>  
                                <?php endif; ?>                   
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 text-left">
                            <p class="copyright-text">Copyright &copy; 2015 <?php bloginfo('name');?>. All Rights Reserved.   </p>
                        </div>
                        <div class="col-md-6">
                            <ul class="lower-footer-links">
                                <li><a href="<?= home_url()?>/privacy-policy">Privacy Policy</a></li>
                                <li><a href="<?= home_url()?>/terms-of-service">Terms and Conditions</a></li>
                                <li><a href="<?= home_url()?>/sitemap_index.xml">Site Map</a></li>
                            </ul>  
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER ENDS -->
        <?php wp_footer(); ?>
    </body>
</html>