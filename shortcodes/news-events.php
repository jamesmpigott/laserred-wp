<?php
add_shortcode( 'news-events', 'news_events' );

function news_events( $atts ) {
	$currentDate = date('Y-m-d H:i:s');
	$eventArgs = [
		'post_type' => 'events',
		'posts_per_page' => 1,
		'meta_key' => 'start_date',
		'orderby' => 'start_date',
		'order' => 'ASC',
		'meta_query' => [
			[
				'key' => 'start_date',
				'value' => $currentDate,
				'compare' => '>=',
				'type' => 'DATE',
			],
		],
	];

	$posts['events'] = Timber::get_posts($eventArgs);

	$newsArgs = [
		'post_type' => 'post',
		'post_per_page' => 2,
		'orderby' => [
			'date' => 'DESC'
		]
	];

	$posts['news'] = Timber::get_posts($newsArgs);

	$context = Timber::context();
    return Timber::compile( 'partial/news-events.html.twig', [
    	'context' => $context,
    	'posts' => $posts
    ]);
}