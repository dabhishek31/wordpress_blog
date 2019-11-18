<?php
/**
 * Trooper Lite functions and definitions to setup theme
 * and provides some helper functions.
 *
 * @package Radar Themes
 * @subpackage Trooper Lite
 * @since Trooper Lite 1.0.0
 *
 */

$avatarIMG = get_theme_mod('trooper_lite_logo');
$trooper_lite_checked = get_theme_mod('trooper_lite_sm_exopt') == '1' ? 'checked' : '';

?>

<div id="sidebar-wrapper">
    <div class="sidebar-nav <?php echo (get_theme_mod('trooper_lite_menu_transition') == "menu_toggle") ? "drilldown" : ""; ?> mCustomScrollbar">

        <div class="module about-site">

            <?php if (has_custom_logo()): ?>
                <div class="author">
                    <?php echo get_custom_logo(get_theme_mod('custom_logo'), 'trooper-lite'); ?>
                </div>
           <?php endif; ?>
            
            <?php if (get_theme_mod('trooper_lite_logo_name')): ?>
                <h1 id="site-title" class="upcase">
                    <?php 
                    echo sprintf('<a href="%s" title="%s">%s</a>', 
                    esc_url(site_url()), 
                    esc_attr(get_theme_mod('trooper_lite_logo_name')),
                    esc_attr(get_theme_mod('trooper_lite_logo_name'))); ?>
                </h1>    
            <?php endif; ?>
            
            <?php if ( esc_attr(get_theme_mod('trooper_lite_author_snippet')) || is_customize_preview() ) : ?>
                <p id="site-description">
                    <?php printf("%s", esc_attr(get_theme_mod('trooper_lite_author_snippet'), 'trooper-lite')); ?>        
                </p>
            <?php endif; ?>

            <?php
                if($trooper_lite_checked == 'checked'):
                    $content = '<ul class="social-icons">';

                        if(esc_attr(get_theme_mod('trooper_lite_sm_tw'))):
                            $content .= '<li class="twitter"><a title="'.__('Twitter','trooper-lite').'" href="' . esc_attr(get_theme_mod('trooper_lite_sm_tw')) . '"><i class="fa fa-twitter"></i></a></li>';
                        endif;

                        if(esc_attr(get_theme_mod('trooper_lite_sm_fb'))):
                            $content .= '<li class="facebook"><a title="'.__('Facebook','trooper-lite').'" href="' . esc_attr(get_theme_mod('trooper_lite_sm_fb')) . '"><i class="fa fa-facebook"></i></a></li>';
                        endif;
                        
                        if(esc_attr(get_theme_mod('trooper_lite_sm_gp'))):
                            $content .= '<li class="googleplus"><a title="'.__('Google+','trooper-lite').'" href="' . esc_attr(get_theme_mod('trooper_lite_sm_gp')) . '"><i class="fa fa-google-plus"></i></a></li>';
                        endif;
                                                
                        if(esc_attr(get_theme_mod('trooper_lite_sm_pt'))):
                            $content .= '<li class="pinterest"><a title="'.__('Pinterest','trooper-lite').'" href="' . esc_attr(get_theme_mod('trooper_lite_sm_pt')) . '"><i class="fa fa-pinterest"></i></a></li>';
                        endif;
                                                
                        if(esc_attr(get_theme_mod('trooper_lite_sm_insta'))):
                            $content .= '<li class="instagram"><a title="'.__('Instagram','trooper-lite').'" href="' . esc_attr(get_theme_mod('trooper_lite_sm_insta')) . '"><i class="fa fa-instagram"></i></a></li>';
                        endif;
                                           
                        if(esc_attr(get_theme_mod('trooper_lite_sm_vm'))):
                            $content .= '<li class="vimeo"><a title="'.__('Vimeo','trooper-lite').'" href="' . esc_attr(get_theme_mod('trooper_lite_sm_vm')) . '"><i class="fa fa-vimeo"></i></a></li>';
                        endif;
                        
                        if(esc_attr(get_theme_mod('trooper_lite_sm_flkr'))):
                            $content .= '<li class="flickr"><a title="'.__('Flickr','trooper-lite').'" href="' . esc_attr(get_theme_mod('trooper_lite_sm_flkr')) . '"><i class="fa fa-flickr"></i></a></li>';
                        endif;
                        
                        if(esc_attr(get_theme_mod('trooper_lite_sm_sc'))):
                            $content .= '<li class="soundcloud"><a title="'.__('Soundcloud','trooper-lite').'" href="' . esc_attr(get_theme_mod('trooper_lite_sm_sc')) . '"><i class="fa fa-soundcloud"></i></a></li>';
                        endif;
                        
                        if(esc_attr(get_theme_mod('trooper_lite_sm_yt'))):
                            $content .= '<li class="youtube"><a title="'.__('Youtube','trooper-lite').'" href="' . esc_attr(get_theme_mod('trooper_lite_sm_yt')) . '"><i class="fa fa-youtube"></i></a></li>';
                        endif;
                        
                        if(esc_attr(get_theme_mod('trooper_lite_sm_twch'))):
                            $content .= '<li class="twitch"><a title="'.__('Twitch','trooper-lite').'" href="' . esc_attr(get_theme_mod('trooper_lite_sm_twch')) . '"><i class="fa fa-twitch"></i></a></li>';
                        endif;
                        
                        if(esc_attr(get_theme_mod('trooper_lite_sm_lnk'))):
                            $content .= '<li class="linkedin"><a title="'.__('Linkedin','trooper-lite').'" href="' . esc_attr(get_theme_mod('trooper_lite_sm_lnk')) . '"><i class="fa fa-linkedin"></i></a></li>';
                        endif;
                            
                        if(esc_attr(get_theme_mod('trooper_lite_sm_so'))):
                            $content .= '<li class="stackoverflow"><a title="'.__('Stackoverflow','trooper-lite').'" href="' . esc_attr(get_theme_mod('trooper_lite_sm_so')) . '"><i class="fa fa-stack-overflow"></i></a></li>';
                        endif;
                        
                    $content .= '</ul>';

                    echo $content;
                endif;
            ?>
        </div>

        <!-- TODO: Refactor -->
        <?php if(get_theme_mod('trooper_lite_menu_transition') == "menu_toggle"): ?>
        <div class="drilldown-container-alt">
            <nav>
        <?php else: ?>
        <div class="drilldown">
            <div class="drilldown-container">
        <?php endif; ?>
            <?php trooper_lite_menu_style() ?>
        <?php if(get_theme_mod('trooper_lite_menu_transition') == "menu_toggle"): ?>
            </nav>
        </div>
        <?php else: ?>
            </div>
        </div>
        <?php endif; ?>


    </div>

    <div class="sidebar-bottom">
        <p id="footer-text">
          <?php
            if(esc_attr(get_theme_mod('trooper_lite_footer_cpy'))):
                echo esc_attr(get_theme_mod('trooper_lite_footer_cpy'));
            else:
                echo sprintf(
                    '&copy; %1$s %2$s. Theme by <a href="%3$s" title="%4$s" target="_blank" rel="nofollow">%5$s</a>. Powered by <a href="%6$s" target="_blank" rel="nofollow">WordPress</a>', 
                    esc_attr(date("Y"), 'trooper-lite'), 
                    esc_attr(get_bloginfo('name'), 'trooper-lite'), 
                    esc_url(__("https://radarthemes.com", 'trooper-lite')), 
                    esc_html__("Premium Wordpress Themes", 'trooper-lite'), 
                    esc_html__("RadarThemes", 'trooper-lite'),
                    esc_url(__('https://wordpress.org', 'trooper-lite'))
                );
            endif;
            ?>
        </p>
    </div>
</div>

<?php get_sidebar(); ?>
