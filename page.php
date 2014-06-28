<?php get_header(); ?>
    <div class="content grid-u-1 grid-u-med-3-4">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h1 class="content-subhead">
            <a href="<?php bloginfo('url');?>">
                主页
            </a>
            &raquo;
            <?php the_title(); ?>
        </h1>
        <article class="post" id="post">
            <header class="post-header">
                <a href="<?php the_permalink(); ?>" class="post-title">
                    <?php the_title(); ?>
                </a>
            </header>
            <div class="post-content">
                <p>
                    <?php the_content(); ?>
                </p>
            </div>
        </article>
		<?php comments_template(); ?>
		<?php endwhile; endif; ?>
        <?php get_footer('second'); ?>