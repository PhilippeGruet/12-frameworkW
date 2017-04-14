<?php

	$w_routes = array(
		['GET', 	 '/[i:page]?/', 'Default#home', 'default_home'],
		['GET', 	 '/contact', 'Default#contact', 'default_contact'],

		// Article
		['GET', 	 '/article/index/[i:page]', 'Article#index', 'article_index'],
		['GET|POST', '/article/create', 'Article#create', 'article_create'],
		['GET', 	 '/article/delete/[i:id]', 'Article#delete', 'article_delete'],
		['GET', 	 '/article/random/[i:nbr]', 'Article#random', 'article_random'],
		['GET|POST', '/article/update/[i:id]', 'Article#update', 'article_update'],
		['GET', 	 '/article/view/[i:id]', 'Article#view', 'article_view'],

		// User
		['GET|POST', '/login', 'Security#login', 'security_login'],
		['GET|POST', '/register', 'Security#register', 'security_register'],
		['GET',		 '/logout', 'Security#logout', 'security_logout'],
	);
