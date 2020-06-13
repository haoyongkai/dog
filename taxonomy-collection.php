<?php
/* 囤主题 www.tzhuti.com*
 * The template for displaying archive pages
 *
 * @link https:// 囤主题 www.tzhuti.com   codex.wordpress.org/Template_Hierarchy
 *
 * @package ziranzhi2
 */

get_header();
$des = get_the_archive_description();
global $wp_query;
$nub = get_option('posts_per_page',10);
$ipaged = get_query_var('paged') ? get_query_var('paged') : 1;
$ipages = ceil( $wp_query->found_posts / $nub);
$cat_id = get_queried_object_id();
?>
<div id="cat-header" class="cat-header pos-r box mar10-b">
	<div class="cat-header-in pos-r">
		<label class="label-switch" v-if="isAdmin" v-clock><input class="zrz-switch zrz-switch-anim mouh" v-model="blur" type="checkbox" @click.stop="blurChange"></label>
		<div :class="['cat-bg','pos-a','img-bg',{'blur':blur}]" :style="{ backgroundImage: 'url(\'' + bgimage + '\')',margin:!blur ? 0 : '-10px' }"></div>
		<div class="cat-title pos-a lm">
			<h1 class="mar10-b shadow"><?php echo get_the_archive_title('',false); ?></h1>
			<p class="shadow"><?php echo $des ? $des : __('没有描述','ziranzhi2'); ?></p>
		</div>
		<span class="pos-a cat-button mobile-hide" v-if="isAdmin" v-clock>
			<label for="cat-input" class="button empty"><b :class="{'loading':locked}"></b>上传专题封面图片</button>
			<input id="cat-input" type="file" accept="image/jpg,image/jpeg,image/png,image/gif" class="hide" @change="getFile($event)">
		</span>
	</div>
</div>
<div id="primary-home" class="content-area fd mobile-full-width" ref="primaryHome">
	<main id="main" class="site-main grid clearfix pos-r arc" ref="grid">
	<?php
	if ( have_posts() ) :
		echo '<div ref="postList" class="'.(zrz_get_theme_style() === 'pinterest' ? 'grid-bor' : '').'">';
		/* 囤主题 www.tzhuti.com Start the Loop */
		while ( have_posts() ) : the_post();
			/* 囤主题 www.tzhuti.com
			 * Include the Post-Format-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
			get_template_part( 'formats/content');

		endwhile;

			echo '</div><page-nav class="box" nav-type="collection'.$cat_id.'" :paged="'.$ipaged.'" :pages="'.$ipages.'" :show-type="\'p\'"></page-nav>';

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif; ?>
	</main><!-- #main -->
</div><?php
get_sidebar();
get_footer();
