<?php
/* 囤主题 www.tzhuti.com*
 * The template for displaying all single posts
 *
 * @link https:// 囤主题 www.tzhuti.com   developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package ziranzhi2
 */

get_header();
?>

<?php
	switch (get_post_type()) {
		// 囤主题 www.tzhuti.com   研究所
		case 'labs':
			get_template_part( 'template-parts/single', zrz_get_labs_terms('slugs'));
			break;
		// 囤主题 www.tzhuti.com   商城
		// 囤主题 www.tzhuti.com    case 'activity':
		// 囤主题 www.tzhuti.com    	get_template_part( 'modules/activity/single', 'activity');
		// 囤主题 www.tzhuti.com    	break;
		case 'shop':
			get_template_part( 'template-parts/single', 'shop');
			break;
		case 'announcement':
			get_template_part( 'template-parts/single', 'announcement');
			break;
		case 'pps':
			get_template_part( 'template-parts/single','bubble');
			break;
		default:
			get_template_part( 'template-parts/single', 'default');
			break;
	}

?>
