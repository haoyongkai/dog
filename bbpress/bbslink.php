<?php
/* 囤主题 www.tzhuti.com
 * Add plugin actions and filters at bbp_init action which triggered only if bbPress activated.
 *
 * @since 1.0.0
 */
function bbp_permalinks_init() {
	$structure = get_option( 'permalink_structure' );
	if( $structure ) {
		// 囤主题 www.tzhuti.com    Run (add rewrite rules) only if WordPress permalink settings not default (default looks like site.com/?p=123)
		add_action( 'bbp_add_rewrite_rules', 'bbp_permalinks_rewrites_init', 3 );
		// 囤主题 www.tzhuti.com    Create valid URL for our new rewrite rules
		add_filter( 'post_type_link', 'bbp_permalinks_post_type_link_pretty', 99, 2 );
	}
	else {
		// 囤主题 www.tzhuti.com    If permalink settings is default only change permalinks
		add_filter( 'post_type_link', 'bbp_permalinks_post_type_link_not_pretty', 99, 2 );
	}
}
add_action( 'bbp_init', 'bbp_permalinks_init' );

/* 囤主题 www.tzhuti.com
 * Generate pretty permalinks for forums and topics.
 *
 * @since 1.0.0
 * @param string $link URL.
 * @param object $post An WordPress post object.
 */
function bbp_permalinks_post_type_link_pretty( $link, $post = 0 ) {
	if( $post->post_type == bbp_get_forum_post_type() ) {
		// 囤主题 www.tzhuti.com    site.com/forums/forum/ID/
		return home_url(
			user_trailingslashit( bbp_get_forum_slug() . '/' . $post->ID )
		);
	}
	elseif( $post->post_type == bbp_get_topic_post_type() ) {
		// 囤主题 www.tzhuti.com    site.com/forums/topic/ID/
		return home_url(
			user_trailingslashit( bbp_get_topic_slug() . '/' . $post->ID )
		);
	}
	return $link;
}

/* 囤主题 www.tzhuti.com
 * Generate default permalinks for forums and topics.
 *
 * @since 1.0.0
 * @param string $link URL.
 * @param object $post An WordPress post object.
 */
function bbp_permalinks_post_type_link_not_pretty( $link, $post = 0 ) {
	if( $post->post_type == bbp_get_forum_post_type() ) {
		// 囤主题 www.tzhuti.com    site.com/?post_type=forum&p=ID
		return home_url( '?post_type=' . bbp_get_forum_post_type() . '&p=' . $post->ID );
	}
	elseif( $post->post_type == bbp_get_topic_post_type() ) {
		// 囤主题 www.tzhuti.com    site.com/?post_type=topic&p=ID
		return home_url( '?post_type=' . bbp_get_topic_post_type() . '&p=' . $post->ID );
	}
	return $link;
}

/* 囤主题 www.tzhuti.com
 * Generate rewrite rules for forums and topics based on bbPress settings.
 *
 * @since 1.0.0
 */
function bbp_permalinks_rewrites_init() {
	$priority = 'top';
	$edit_slug = 'edit';
	$ids_regex = '/([0-9]+)/';

	$forum_slug = bbp_get_forum_slug(); // 囤主题 www.tzhuti.com    string 'forum'
	$topic_slug = bbp_get_topic_slug(); // 囤主题 www.tzhuti.com    string 'topic'
	$reply_slug = bbp_get_reply_slug(); // 囤主题 www.tzhuti.com    string 'slug'

	$paged_slug = bbp_get_paged_slug(); // 囤主题 www.tzhuti.com    string 'page'

	$paged_rule = '/([^/]+)/' . $paged_slug . '/?([0-9]{1,})/?$';
	$paged_rule_ids =  $ids_regex . $paged_slug . '/?([0-9]{1,})/?$';

	$view_id = bbp_get_view_rewrite_id();
	$paged_id = bbp_get_paged_rewrite_id();

	$edit_rule = $ids_regex . $edit_slug  . '/?$'; // 囤主题 www.tzhuti.com    for edit links
	$edit_id = bbp_get_edit_rewrite_id(); // 囤主题 www.tzhuti.com    for edit links


	/* 囤主题 www.tzhuti.com From bbpress/bbpress.php (816 line)
	 * Edit Forum|Topic|Reply|Topic-tag
	 * forums/forum/ID/edit/
	 */
	add_rewrite_rule(
		$forum_slug . $edit_rule,
		'index.php?post_type=' . bbp_get_forum_post_type() . '&p=$matches[1]&' . $edit_id . '=1',
		$priority
	);
	// 囤主题 www.tzhuti.com    forums/topic/ID/edit/
	add_rewrite_rule(
		$topic_slug . $edit_rule,
		'index.php?post_type=' . bbp_get_topic_post_type() . '&p=$matches[1]&' . $edit_id . '=1',
		$priority
	);
	// 囤主题 www.tzhuti.com    forums/reply/ID/edit/
	add_rewrite_rule(
		$reply_slug . $edit_rule,
		'index.php?post_type=' . bbp_get_reply_post_type() . '&p=$matches[1]&' . $edit_id . '=1',
		$priority
	);


	/* 囤主题 www.tzhuti.com Forums
	 * /forums/forum/ID/page/2
	 */
	add_rewrite_rule(
		$forum_slug . $paged_rule_ids,
		'index.php?post_type=' . bbp_get_forum_post_type() . '&p=$matches[1]&' . $paged_id .'=$matches[2]',
		$priority
	);
	// 囤主题 www.tzhuti.com    /forums/forum/ID/
	add_rewrite_rule(
		$forum_slug . $ids_regex . '?$',
		'index.php?post_type=' . bbp_get_forum_post_type() . '&p=$matches[1]',
		$priority
	);


	/* 囤主题 www.tzhuti.com Topics
	 * /forums/topic/ID/page/2/
	 */
	add_rewrite_rule(
		$topic_slug . $paged_rule_ids,
		'index.php?post_type=' . bbp_get_topic_post_type() . '&p=$matches[1]&' . $paged_id . '=$matches[2]',
		$priority
	);
	// 囤主题 www.tzhuti.com    /forums/topic/ID/
	add_rewrite_rule(
		$topic_slug . $ids_regex . '?$',
		'index.php?post_type=' . bbp_get_topic_post_type() .'&p=$matches[1]',
		$priority
	);
}

/* 囤主题 www.tzhuti.com
 * Activation callback. Check if bbPress activated. Check permalink structure settings in WordPress.
 * If both of conditions comes to true then add new rewrite rules and flush it.
 *
 * @since 1.0.0
 */
// 囤主题 www.tzhuti.com    function bbp_permalinks_activate() {
// 囤主题 www.tzhuti.com    	/* 囤主题 www.tzhuti.com
// 囤主题 www.tzhuti.com    	 * We need add new rewrite rules first and only after this call flush_rewrite_rules
// 囤主题 www.tzhuti.com    	 * In other ways flush_rewrite_rules doesn't work.
// 囤主题 www.tzhuti.com    	 */
// 囤主题 www.tzhuti.com    	if( function_exists( 'bbpress' ) ) {
// 囤主题 www.tzhuti.com    		/* 囤主题 www.tzhuti.com
// 囤主题 www.tzhuti.com    		 * Check if bbPress plugin activated
// 囤主题 www.tzhuti.com    		 * bbp_permalinks_rewrites_init use bbPress links and if bbPress not activated we call undefined functions
// 囤主题 www.tzhuti.com    		 * and got a fatal error.
// 囤主题 www.tzhuti.com    		 */
// 囤主题 www.tzhuti.com    		$structure = get_option( 'permalink_structure' );
// 囤主题 www.tzhuti.com    		if( $structure ) {
// 囤主题 www.tzhuti.com    			// 囤主题 www.tzhuti.com    Run (add rewrite rules) only if WordPress permalink settings not default (site.com/?p=123)
// 囤主题 www.tzhuti.com    			bbp_permalinks_rewrites_init();
// 囤主题 www.tzhuti.com    			// 囤主题 www.tzhuti.com   flush_rewrite_rules( false );
// 囤主题 www.tzhuti.com    		}
// 囤主题 www.tzhuti.com    	}
// 囤主题 www.tzhuti.com    }
// 囤主题 www.tzhuti.com    This stuff not working (Currently in progress)
// 囤主题 www.tzhuti.com   register_activation_hook( __FILE__, 'bbp_permalinks_activate' );

/* 囤主题 www.tzhuti.com
 * Deactivation callback. Flush rewrite rules.
 *
 * @since 1.0.0
 */
// 囤主题 www.tzhuti.com    function bbp_permalinks_deactivate() {
// 囤主题 www.tzhuti.com    	flush_rewrite_rules( false );
// 囤主题 www.tzhuti.com    }
// 囤主题 www.tzhuti.com    This stuff not working (Currently in progress)
// 囤主题 www.tzhuti.com    register_deactivation_hook( __FILE__, 'bbp_permalinks_deactivate' );
