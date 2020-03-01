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
	Timber::render('pages/home.html.twig', $context);
?>