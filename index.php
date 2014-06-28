<?php get_header(); ?>    
        <div class="content grid-u-1 grid-u-med-3-4">
        <!--[if lt IE 10]> 
        <div class="alert danger">
         当前网页 <strong>不支持</strong> 你正在使用的浏览器. 为了正常的访问, 请 <a href="http://browsehappy.com/">升级你的浏览器</a>.
        </div>
        <![endif]-->
            <div class="posts">
                
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
            </div>
			<?php pagination($query_string); ?>
			<h4 class="subhead">
            友情链接:
			</h4>
			<div class="links">
            <ul>
				<?php
        		   $bookmarks = get_bookmarks('title_a=&orderby=rand'); //全部链接随机输出
       			   //如果你要输出某个链接分类的链接，更改一下get_bookmarks参数即可
      			   //如要输出链接分类ID为5的链接 title_a=&categorize=0&category=5&orderby=rand
    			   if ( !empty($bookmarks) ) {
            			foreach ($bookmarks as $bookmark) {
            				echo '<li><a href="' , $bookmark->link_url , '" title="' , $bookmark->link_description , '" target="_blank" class="'.$random.'">' , $bookmark->link_name , '</a></li>';
            			}
        		   }
			   
        		?>
            </ul>
			</div>
			<?php get_footer(); ?>