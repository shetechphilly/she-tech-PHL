<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * Home Widgets Template
 *
 *
 * @file           sidebar-home.php
 * @package        Responsive 
 * @author         Emil Uzelac 
 * @copyright      2003 - 2013 ThemeID
 * @license        license.txt
 * @version        Release: 1.0
 * @filesource     wp-content/themes/responsive/sidebar-home.php
 * @link           http://codex.wordpress.org/Theme_Development#Widgets_.28sidebar.php.29
 * @since          available since Release 1.0
 */
?>  
	<?php responsive_widgets_before(); // above widgets container hook ?>
    <div id="sub-featured" class="grid col-940">
         <?php responsive_widgets(); // above widgets hook ?>
             
             <?php if (!dynamic_sidebar('home-secondary-sidebar-1')) : ?>
             <div class="widget-wrapper">
             
                 <div class="widget-title-home"><h3><?php _e('Home Secondary Sidebar 1', 'responsive'); ?></h3></div>
                 <div class="textwidget"><?php _e('This is your first home widget box. To edit please go to Appearance > Widgets and choose 6th widget from the top in area 6 called Home Widget 1. Title is also manageable from widgets as well.','responsive'); ?></div>
             
 			</div><!-- end of .widget-wrapper -->
 			<?php endif; //end of home-widget-1 ?>
 
         <?php responsive_widgets_end(); // responsive after widgets hook ?>

    </div><!-- end of #sub-featured -->
	<?php responsive_widgets_after(); // after widgets container hook ?>