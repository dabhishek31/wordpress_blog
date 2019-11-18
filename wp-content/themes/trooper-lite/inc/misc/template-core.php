<?php
/**
 * Get tags via post page
 *
 * @package Radar Themes
 * @subpackage Trooper Lite
 * @since Trooper Lite 1.0.0
 *
 */

if ( ! function_exists( 'trooper_lite_get_tags' ) ) :
    function trooper_lite_get_tags() {
        $tags = get_the_tags();
        if(!empty($tags)) {
            $html = '<ul>';
            foreach ($tags as $tag) {
                $tag_link = get_tag_link($tag->term_id);

                $html .= "<li><a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
                $html .= "#{$tag->name}</a></li>";
            }
            $html .= '</ul>';
            echo $html;
        }
    }
endif;

if ( ! function_exists( 'trooper_lite_gets_tags_single' ) ) :
    /** Get tags single page */
    function trooper_lite_get_tags_single() {
        $tags = get_the_tags();
        $html = '';

        if(!empty($tags)) {
            $html .= "<ul>";
            foreach ($tags as $tag) {
                $tag_link = get_tag_link($tag->term_id);
                $html .= "<li><a href='{$tag_link}' title='{$tag->name} Tag' class='{$tag->slug}'>";
                $html .= "#{$tag->name}</a></li>";
            }
            $html .= "</ul>";
            echo $html;
        }
    }
endif;

if ( ! function_exists( 'trooper_lite_menu_style' ) ) :

    function trooper_lite_menu_style() {
        $classes = array();
        $markup = "";

        $menu_params = array(
            'container' => 'ul',
            'menu_class' => 'style-2',
            'depth' => 2,
            'walker' => new stdClass()
        );

        if (get_theme_mod('trooper_lite_menu_transition') == "menu_toggle") {
            array_push($classes, "-alt");
            $menu_params['walker'] = new trooper_lite_submenu_alt();
        } else {
            $menu_params['walker'] = new trooper_lite_submenu();
            $menu_params['menu_class'] = 'drilldown-root';
        }

        return wp_nav_menu($menu_params);
    }
endif;

if ( ! function_exists( 'trooper_lite_post_thumbnail' ) ) :
    /**
     * Displays an optional post thumbnail.
     *
     * Wraps the post thumbnail in an anchor element on index views, or a div
     * element when on single views.
     */
    function trooper_lite_post_thumbnail() {
        if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
            return;
        }

        if ( is_singular() ) :
            ?>

            <div class="post-thumbnail">
                <?php the_post_thumbnail(); ?>
            </div><!-- .post-thumbnail -->

        <?php else : ?>

        <a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
            <?php
            the_post_thumbnail( 'post-thumbnail', array(
                'alt' => the_title_attribute( array(
                    'echo' => false,
                ) ),
            ) );
            ?>
        </a>

        <?php
        endif; // End is_singular().
    }
endif;


function _trooper_lite_comment($comment, $args, $depth) {
    if ( 'div' === $args['style'] ) {
        $tag       = 'div';
        $add_below = 'comment';
    } else {
        $tag       = 'li';
        $add_below = 'div-comment';
    }?>
    <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>"><?php
    if ( 'div' != $args['style'] ) { ?>

        <div id="div-comment-<?php comment_ID() ?>" class="comment-body">

            <?php
            if ( $args['avatar_size'] != 0 ):
                echo get_avatar( $comment, $args['avatar_size'] );
            endif;
    } ?>
    <div id="comment-wrap">
        
        <div class="comment-author vcard">
            <?php printf('<cite class="fn">%s</cite> <span class="says">says:</span>', get_comment_author_link()); ?>
        </div>

        <?php if ( $comment->comment_approved == '0' ): ?>
            <em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'trooper-lite' ); ?></em><br/>
        <?php endif; ?>

        <div class="comment-meta commentmetadata">
            <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
                <?php
                /* translators: 1: date, 2: time */
                printf(
                    __('%1$s at %2$s', 'trooper-lite'),
                    get_comment_date(),
                    get_comment_time()
                ); ?>
            </a>
            <?php edit_comment_link( __( '(Edit)', 'trooper-lite' ), '  ', '' ); ?>
        </div>

        <?php comment_text(); ?>

            </div><!--/#comment-wrap -->

        <div class="reply">
            <?php
                comment_reply_link(
                    array_merge(
                        $args,
                        array(
                            'add_below' => $add_below,
                            'depth'     => $depth,
                            'max_depth' => $args['max_depth']
                        )
                    )
                ); ?>
        </div>
        <?php if ( 'div' != $args['style'] ) : ?>
        </div>
        <?php endif;
}
