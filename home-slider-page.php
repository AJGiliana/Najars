<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Full Content Template
 *
   Template Name:  Home page with slider (no sidebar)
 *
 * @file           home-slider-page.php
 * @package        Responsive 
 * @author         Alen Glina 
 * @copyright      2013 
 * @license        license.txt//
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/home-slider-page.php
 * @link           http://codex.wordpress.org/Theme_Development#Pages_.28page.php.29
 * @since          available since Release 1.0
 */

get_header(); ?>

<div id="content-full" class="grid col-940">
        
	<?php if (have_posts()) : ?>

		<?php while (have_posts()) : the_post(); ?>
        
        <?php get_template_part( 'loop-header' ); ?>
        
			<?php responsive_entry_before(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="flexslider">
					<ul class="slides">
<?php $upload_dir = wp_upload_dir();  //['path'],['baseurl']

if ($handle = opendir($upload_dir['path'])) {
    while (false !== ($entry = readdir($handle))) {	
		$pattern = '/slide\d-400x200[.][A-Za-z]+/';
		if(preg_match($pattern, $entry, $matches, PREG_OFFSET_CAPTURE, 0)){
			//print_r($matches);
			//echo $matches[0][0];
			echo '<li><img src="'.$upload_dir['baseurl'].'/'.$matches[0][0].'" /></li>';
		}
    }
    closedir($handle);
}
?>						
					</ul>
				</div>
			</div><!-- end of #post-<?php the_ID(); ?> -->       
            
        <?php 
		endwhile; 

		get_template_part( 'loop-nav' ); 

	else : 

		get_template_part( 'loop-no-posts' ); 

	endif; 
	?>  
      
</div><!-- end of #content-full -->

<?php get_footer(); ?>
