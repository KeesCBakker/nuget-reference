<?php
/*
* Plugin Name: NuGet Reference
* Description: Adds a nice looking NuGet reference to your blog posts. Example: [nuget href="https://www.nuget.org/packages/Microsoft.CodeAnalysis/2.0.0-beta1"]Install-Package Microsoft.CodeAnalysis -Pre[/nuget]
* Version: 0.1.8
* Author: Kees C. Bakker
* Author URI: http://keestalkstech.com 
* Text Domain: nuget-reference
* License: MIT
* License URI: https://opensource.org/licenses/MIT
*/

 add_shortcode('nuget', '__keestalkstech__nuget__reference');

 function __keestalkstech__nuget__reference($atts, $content = '') {

     __keestalkstech__nuget__includes();

     $nuget = '<div class="nuget">'.
                '<div class="nuget__inner">'.
                    '<code class="nuget__code">'.
                        $content.
                    '</code>';

     if (!empty($atts)) {
         $link = $atts['href'];
         if (!empty($link)) {
             $nuget. =
                '<a class="nuget__link" href="'.$link.'" title="Nuget" target="_blank" rel="nofollow">'.
                    '<span class="nuget__link-label">'.
                        '<span class="nuget__link-label-caption">&raquo;</span>'.
                    '</span>'.
                '</a>';
         }
     }

     $nuget. = '</div></div>';

     return $nuget;
 }

 function __keestalkstech__nuget__includes() {

     if (!wp_script_is('jquery')) {
         wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js', false, '1.11.3');
         wp_enqueue_script('jquery');
     }

     if (!wp_script_is('nuget.js')) {
         wp_enqueue_script('nuget.js', plugins_url('nuget.js', __FILE__));
         wp_enqueue_style('nuget.css', plugins_url('nuget.css', __FILE__));
     }
 }

?>