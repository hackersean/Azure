<?php get_header(); ?>
    <div class="content grid-u-1 grid-u-med-3-4">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1 class="content-subhead">
            <a href="<?php bloginfo('url'); ?>">
                首页
            </a>
            >
            <?php 
		if( is_single() ){
			$categorys = get_the_category();
			$category = $categorys[0];
		echo( get_category_parents($category->term_id,true,' >') );
		}
		?> 
                <?php the_title(); ?>
                    <span class="date">
                        <?php the_time('Y年m月j日') ?>
                    </span> 
        </h1>
        <article class="post" id="<?php the_ID(); ?>">
            <header class="post-header">
                <a href="<?php the_permalink(); ?>" class="post-title">
                    <?php the_title(); ?>
                </a>
            </header>
            <div class="post-description">
                <p>
                    <?php the_content(); ?>
                </p>
            </div>
            <div class="tags">
                <?php //$this->tags('&nbsp;', true, '无'); ?>
				<?php echo get_the_tag_list('','&nbsp;','');  ?>
            </div>
        </article>
        <ul class="pager">
		<?php 
				$current_category=get_the_category();
				$prev_post = get_previous_post($current_category,'');
				$next_post = get_next_post($current_category,''); ?>
			
							
							
			<?php if($prev_post->post_title != "") { ?>
            <li class="previous">
                <a href="<?php echo get_permalink( $prev_post->ID ); ?>" title="<?php echo $prev_post->post_title; ?>">← 上一篇文章</a>
            </li>
			<?php } ?>
			<?php if($next_post->post_title != "") { ?>
            <li class="next">
               <a href="<?php echo get_permalink( $next_post->ID ); ?>" title="<?php echo $next_post->post_title; ?>">下一篇文章 →</a>
            </li>
			<?php } ?>
        </ul>
		<br>
		<?php comments_template(); ?>
		<?php endwhile; endif; ?>
		<?php get_footer(); ?>
		</div>
		
        
