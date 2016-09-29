<?php
function minimal_resources() {


    wp_enqueue_style('style', get_stylesheet_uri());


};

add_action('wp_enqueue_scripts', 'minimal_resources');



//add our widget locations

function ourWidgetsInit() {

    register_sidebar( array(
        'name' => 'Sidebar', 
        'id' => 'sidebar1',
        'before_widget' => '<div class="widget-item">',
        'after_widget' => '</div>',
        'before_title' => '<div class="widget-title">',
        'after_title' => '</div>'
        ));
};

add_action('widgets_init', 'ourWidgetsInit');

function custom_comments($comment, $args, $depth) {

    $GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class('single-comment'); ?> id="li-comment-<?php comment_ID(); ?>">
        <div id="comment-<?php comment_ID(); ?>">
            <div class="comment-author vcard">
                <?php printf(__('<cite class="fn">%s</cite> <span class="says">says:</span>')); ?>
            </div>
            <?php if ($comment->comment_approved == '0') { ?>
                <em><?php _e('Your comment is awaiting moderation.'); ?></em>
                <br />
            <?php }; ?>
            <div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link($comment->comment_ID)); ?>"><?php if ($comment->user_id) {
$user=get_userdata($comment->user_id);
echo $user->user_nicename;
}?> | <?php printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time()); ?> | </a><?php edit_comment_link(__('edit'),'  ',''); ?></div>
            <div class="comment-text">
                <?php comment_text(); ?>
            </div>
        </div>
<?php }; ?>
<?php register_nav_menus(array(
    'genres' => __('genres'),
));?>