<?php
/* 囤主题 www.tzhuti.com*
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https:// 囤主题 www.tzhuti.com   developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package 7b2
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> class="avgrund-ready">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
	<meta http-equiv="Cache-Control" content="no-transform" />
	<meta http-equiv="Cache-Control" content="no-siteapp" />
	<meta name="renderer" content="webkit"/>
	<meta name="force-rendering" content="webkit"/>
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1"/>
	<link rel="profile" href="http:// 囤主题 www.tzhuti.com   gmpg.org/xfn/11">

	<?php wp_head(); ?>
	<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "https:// 囤主题 www.tzhuti.com   hm.baidu.com/hm.js?49cc02c62fdb09c867c9340508d5af34";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

</head>

<body <?php body_class(); ?>>

<?php do_action( 'before_site_7b2' ); ?>

<div id="page" class="site">
	<header id="masthead" class="site-header">

		<?php do_action( 'header_7b2' ); ?>

		<div class="top-menu-parent">
			<div class="pos-r site-branding-parent" data-sticky-class="is-top-sticky">
				<div class="site-branding pos-r clearfix">
					<div class="site-branding-in">

						<?php do_action( 'header_menu_7b2' ); ?>

					</div>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
	<div id="content" class="site-content">
	<?php do_action( 'content_before_7b2' ); ?>
