﻿<?php get_header(); ?>

	<div id="content" class="narrowcolumn">
		<?php if (have_posts()) : ?>

 	  <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
 	  <?php /* If this is a category archive */ if (is_category()) { ?>
		<h2 class="pagetitle">أرشيف تصنيف &#8216;<?php single_cat_title(); ?>&#8216;</h2>
 	  <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
		<h2 class="pagetitle">أرشيف الوسم &#8216;<?php single_tag_title(); ?>&#8217;</h2>
 	  <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
		<h2 class="pagetitle">أرشيف يوم <?php the_time('j F Y'); ?></h2>
 	  <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
		<h2 class="pagetitle">أرشيف شهر <?php the_time('F Y'); ?></h2>
 	  <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
		<h2 class="pagetitle">أرشيف عام <?php the_time('Y'); ?></h2>
	  <?php /* If this is an author archive */ } elseif (is_author()) { ?>
		<h2 class="pagetitle">أرشيف الكاتب</h2>
 	  <?php /* If this is a paged archive */ } elseif (isset($_GET['paged']) && !empty($_GET['paged'])) { ?>
		<h2 class="pagetitle">أرشيف المدونة</h2>
 	  <?php } ?>


		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; المواضيع السابقة') ?></div>
			<div class="alignright"><?php previous_posts_link('المواضيع اللاحقة &raquo;') ?></div>
		</div>
<div class="clear"></div>
		<?php while (have_posts()) : the_post(); ?>
		<div class="post">
				<h3 id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h3>
				<small><?php the_time('j F Y') ?></small>

				<div class="entry">
					<?php the_content() ?>
				</div>

				<p class="postmetadata"><?php the_tags('الوسوم: ', ', ', '<br />'); ?> ضمن تصنيف <?php the_category(', ') ?> | <?php edit_post_link('تحرير', '', ' | '); ?>  <?php comments_popup_link('لا تعليقات &#187;', '1 تعليق &#187;', '% عدد التعليقات &#187;'); ?></p>

			</div>

		<?php endwhile; ?>

		<div class="navigation">
			<div class="alignleft"><?php next_posts_link('&laquo; المواضيع السابقة') ?></div>
			<div class="alignright"><?php previous_posts_link('المواضيع اللاحقة &raquo;') ?></div>
		</div>

	<?php else : ?>

		<h2 class="center">غير موجود</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>

	<?php endif; ?>

	</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>
