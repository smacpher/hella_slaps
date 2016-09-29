<div class="comment-area">
<?php  if (have_comments()) { ?> 
    <h1 id="comments"><?php comments_number('No comments', '1 comment', '% comments'); ?></h1>

    <ul class="comment-list">
        <?php wp_list_comments('callback=custom_comments'); ?>
    </ul>

<?php }; ?>



<?php  
                    $comments_args = array(
                    // change the title of send button 
                    'label_submit'=>'Comment',
                    // change the title of the reply section
                    'title_reply'=>'Leave a comment',
                    // remove "Text or HTML to be displayed after the set of comment fields"
                    'comment_notes_after' => '',
                    // redefine your own textarea (the comment body)
                    'comment_field' => '<p class="comment-form-comment"><label for="comment">' . _x( 'Comment', 'noun' ) . '</label><br /><textarea id="comment" name="comment" aria-required="true"></textarea></p>',
                    //user info
                    'logged_in_as' => '<p class="logged-in-as">' .
                        sprintf(
                        __( 'Logged in as <a href="%1$s">%2$s</a> | <a href="%3$s" title="Log out of this account">log out?</a>' ),
                          admin_url( 'profile.php' ),
                          $user_identity,
                          wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) )
                        ) . '</p>',
);?>


    <?php comment_form($comments_args) ;?>
</div>