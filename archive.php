<?php get_header(); ?>
    <div class="content grid-u-1 grid-u-med-3-4">
        <h1 class="content-subhead">
    	<?php if(is_category()) { $category = get_the_category(); echo '分类 '.$category[0]->cat_name.' 下的文章'; }
			  if(is_search()) { echo '包含关键字 '.$s.' 的文章'; }
			  if(is_tag()) { echo '标签 '.single_tag_title("", true).' 下的文章'; }
			  if(is_author()) { echo wp_title().' 发布的文章'; } ?>
		</h1>
				 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <article class="post" id="<?php the_ID(); ?>">
						 <?php if ( has_post_format( 'status' )): ?>
                            <a href="<?php the_permalink(); ?>" title="<?php the_time('Y年m月j日'); ?>">
                                <div class="post-content">
                                    <div class="well">
                                        <?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 500,"......","utf-8"); ?>
                                    </div>
                                </div>
                            </a>
                            <?php else: ?>
                                <header class="post-header">
                                    <a href="<?php the_permalink(); ?>" class="post-title">
                                        <?php the_title(); ?>
                                    </a>
                                    <p class="post-meta">
                                        <span class="date">
                                            <?php the_time('Y年m月j日'); ?>
                                        </span>
                                        <span class="commentsnum">
                                            <a href="<?php the_permalink(); ?>#comments">
												<?php comments_number('抢沙发咯','沙发被抢','% 条评论');?>
											</a>
                                        </span>
                                    </p>
                                </header>
                                <div class="post-content">
                                    <p>
                                        <?php echo mb_strimwidth(strip_tags(apply_filters('the_content', $post->post_content)), 0, 500,"......","utf-8"); ?>
                                    </p>
                                </div>
								<?php endif; ?>
                    </article>
                    <hr>
                    <?php endwhile; endif; ?>
						<div class="page-nav">
							<?php pagination($query_string); ?>
						</div>
<?php get_footer('second'); ?>