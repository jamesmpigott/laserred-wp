<?php 

	$context = Timber::context();

	$context['post'] = Timber::get_post(get_the_ID());

	Timber::render('base.html.twig', $context);
?>