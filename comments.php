<div id="comments">
    <?php
        if (isset($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
            die ('请不要直接加载该页面，谢谢！');
        
        if ( post_password_required() ) { ?>
            <p><?php _e('这篇文章需要密码，请输入密码访问'); ?></p> 
        <?php
            return;
        }
    ?>

    <?php if ( have_comments() ) : ?>
        <h4><?php comments_popup_link('暂无评论', '仅有 1 条评论', '已有 % 条评论'); ?></h4>
		<div class="page-navigator">
			<?php paginate_comments_links(); ?>
		</div>
        <ol class="comment-list">
            <?php wp_list_comments('type=comment&callback=ms_comment'); ?>
        </ol>
    <?php else : ?>
        <?php if ('open' != $post->comment_status) : ?>
            <p>抱歉，暂停评论。</p>
        <?php endif; ?>       
    <?php endif; ?>
    <?php if ( comments_open() ) : ?>
    <div id="respond" class="respond">
        <div class="cancel-comment-reply">
        <?php cancel_comment_reply_link() ?>
        </div>
    	<h4 id="comments" class="subhead"><?php _e('添加新评论'); ?></h4>
    	<form method="post" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" id="comment_form" class="form">
			
            <?php if ( is_user_logged_in() ) : ?>
    		<p><?php _e('登录身份：'); ?><?php printf(__('<a href="%1$s">%2$s</a>，'), get_option('siteurl') . '/wp-admin/profile.php', $user_identity); ?></p>
            <?php else: ?>
    		<p>
    			<input type="text" name="author" id="author" class="text" placeholder="称呼" required="true" value="<?php echo $comment_author; ?>" />
    			<input type="email" name="email" id="mail" class="text" placeholder="电子邮件" value="<?php echo $comment_author_email; ?>" />
    			<input type="url" name="url" id="url" class="text" placeholder="网站" value="<?php echo $comment_author_url; ?>" />
    		</p>
            <?php endif; ?>
			<p>
                <textarea rows="5" required="true" placeholder="在这里输入你的评论..." name="comment" class="textarea"></textarea>
            </p>
    		<p>
				<input type="submit" name="submit" value="提交评论" class="button submit" id="submit">
            </p>
			
			<div class="clear"></div>
            <?php comment_id_fields(); ?> 
            <?php do_action('comment_form', $post->ID); ?>            
    	</form>
    </div>
    <?php endif; ?>

</div>
