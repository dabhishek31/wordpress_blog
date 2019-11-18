<?php
/**
 * Template file for the single posts pages
 *
 * @package Radar Themes
 * @subpackage Trooper Lite
 * @since Trooper Lite 1.0.0
 *
 */

    get_header();
?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main">

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="inner p60">

          <div class="date">
              <?php printf("%s ", get_the_date(get_option( 'date_format' ))); ?>
          </div>

          <div class="post-content">
              <?php
                  while ( have_posts() ) :
                      the_post();

                          if ( is_singular() ) :
                              the_title( '<h1 class="entry-title">', '</h1>' );
                          else :
                              the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
                          endif;

                          the_content( sprintf(
                              wp_kses(
                                  /* translators: %s: Name of current post. Only visible to screen readers */
                                  __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'trooper-lite' ),
                                  array(
                                      'span' => array(
                                          'class' => array(),
                                      ),
                                  )
                              ),
                              get_the_title()
                          ) );
              ?>
          </div>

          <?php
          /**
           * Allows user to split posts into multiple pages
           */
          wp_link_pages( array(
              'before' => '<div class="page-links">' . __( 'Pages:', 'trooper-lite' ),
              'after'  => '</div>',
          ) );
          ?>

          <?php
          /**
           * Displays author section in single post page
           */
          if(get_the_author_meta('description')): ?>
              <div class="rt-author-box">
                  <div class="author-box">
                      <?php echo get_avatar( get_the_author_meta('email') , 90 );  ?>
                      <div class="author-body">
                          <h4><?php the_author_link(); ?></h4>
                          <p><?php echo esc_attr(get_the_author_meta('description'), 'trooper-lite'); ?></p>
                      </div>
                  </div>
              </div>
          <?php endif; ?>

          <div class="post-footer">

            <div class="top-half">
              <div class="post-tag">
                  <?php trooper_lite_get_tags_single(); ?>
              </div>

              <div class="post-footer"></div>
            </div> <!--/. top-half -->

              <div class="navigation post-navigation">
                  <div class="nav-links">
                      <div class="nav-previous col alt-border alt-pad">
                          <span class="nav-link-meta">
                              <span class="meta-nav"><?php printf("%s ", esc_html('Previous Post:', 'trooper-lite')); ?></span>
                              <span class="post-title"><?php previous_post_link(); ?></span>
                          </span>
                      </div>
                      <div class="nav-next col alt-pad">
                              <span class="meta-nav align-right"><?php printf("%s ", esc_html('Next Post:', 'trooper-lite')); ?></span>
                              <span class="post-title align-right"><?php next_post_link(); ?></span>
                          </span>
                      </div>
                  </div>
              </div>

          </div>

          <?php

          // End the loop.
          endwhile;

              // If comments are open or we have at least one comment, load up the comment template.
              if ( comments_open() || get_comments_number() ) :
                  comments_template();
              endif;

          ?>
        </div>
      </article><!-- end .inner -->
      </main>
    </div>


<?php get_sidebar(); ?>
<?php get_footer(); ?>