<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\ArticleModel;

class DefaultController extends Controller
{

	/**
	 * Page d'accueil par défaut
	 */
	public function home($page = 1)
	{
		$article_manager = new ArticleModel();

		// Pagination
		$articles_by_page = 10;
		$total_articles = count( $article_manager->findAll() );
		$nbrPages = ceil( $total_articles / 10 );
		($page > $nbrPages) ? $this->showNotFound() : "" ;

		$offset = ( $page - 1 ) * $articles_by_page;

		$articles = $article_manager->findAllJoinAuthor("", "",  $articles_by_page, $offset);
		$this->show('default/home', [
			'articles' => $articles,
			'nbrPages' => $nbrPages,
			'page' => $page,
		]);
	}

	public function contact()
	{
		$this->show('default/contact');
	}

}
