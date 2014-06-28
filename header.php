<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>		<?php if ( is_home() && !is_paged() ){ bloginfo('name'); ?> | <?php bloginfo('description'); } ?>
				<?php if (is_single() || is_page()) { ?><?php wp_title('',true); ?> | <?php bloginfo('name'); } ?>
				<?php if ( is_paged() ){ ?><?php printf( __('第%1$s页', ''), intval( get_query_var('paged')), $wp_query->max_num_pages); ?> | <?php bloginfo('name'); } ?>
				<?php if(is_category()) { $category = get_the_category(); echo '分类'.$category[0]->cat_name.'下的文章';  ?> | <?php bloginfo('name');  } ?>
				<?php if(is_search()) { echo '包含关键字 '.$s.' 的文章';  ?> | <?php bloginfo('name'); } ?>
			    <?php if(is_tag()) { echo '标签'.single_tag_title("", true).'下的文章';  ?> | <?php bloginfo('name'); } ?>
			    <?php if(is_author()) { echo wp_title().'发布的文章';  ?> | <?php bloginfo('name'); } ?> 
	</title>
    <?php $是否开启CDN功能 = "否"; ?>
	<?php if($是否开启CDN功能 == "是") { ?>
	<link rel="stylesheet" href="http://img.mywpku.com/azure-style.min.css">
	<?php } else { ?>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/azure-style.min.css">
	<?php } ?>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css">
	<!--请勿删除此统计代码-->
	<script type="text/javascript" src="http://tajs.qq.com/stats?sId=21881508" charset="UTF-8"></script>
	<?php wp_head(); ?>
  </head>
<body>
<div class="grid-g">
    <div class="sidebar grid-u-1 grid-u-med-1-4">
        <div class="header">
            <hgroup>
                <a href="<?php bloginfo('url');?>">
                    <h1 class="title">
                       <?php bloginfo('title');?>
                    </h1>
                </a>
                <h2 class="description">
                   <?php bloginfo('description'); ?>
                </h2>
            </hgroup>
			<nav class="nav">
                <ul class="nav-list">
					<?php if(function_exists('wp_nav_menu')) wp_nav_menu(array('container' => false, 'items_wrap' => '%3$s', 'theme_location' => 'sidebar-nav')); ?>
                       
                </ul>
            </nav>
            <form class="form" id="search" action="http://www.kryptosx.info/">
                <input type="text" class="input" name="s" id="s" required="true" placeholder="搜索....">
            </form>
        </div>
    </div>
