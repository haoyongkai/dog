<?php

/* 囤主题 www.tzhuti.com*
 * Pagination for pages of replies (when viewing a topic)
 *
 * @package bbPress
 * @subpackage Theme
 */

do_action( 'bbp_template_before_pagination_loop' ); ?>

<div class="bbp-pagination">
	<div class="bbp-pagination-count"><?php bbp_topic_pagination_count(); ?></div>
	<div class="bbp-pagination-links"><?php bbp_topic_pagination_links(); ?></div>
</div>

<?php do_action( 'bbp_template_after_pagination_loop' );
