<?php 

	$context = Timber::context();

	$newsArgs = [
		'post_type' => 'post',
		'post_per_page' => 2,
		'orderby' => [
			'date' => 'DESC'
		]
	];
	$context['news'] = Timber::get_posts($newsArgs);

	$productsArgs = [
		'post_type' => 'product',
		'posts_per_page' => 4,
		'meta_key' => 'total_sales',
		'orderby' => 'meta_value_num',
	];
	$context['products'] = Timber::get_posts($productsArgs);

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

	$context['events'] = Timber::get_posts($eventArgs);
	
	Timber::render('pages/home.html.twig', $context);
?>