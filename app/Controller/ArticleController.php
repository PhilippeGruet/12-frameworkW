<?php

namespace Controller;

use \W\Controller\Controller;
use \Model\ArticleModel;

class ArticleController extends Controller
{

	public function index($page) {
		$this->allowTo('admin');
		$article_manager = new ArticleModel();
		$articles = $article_manager->findAllJoinAuthor("", "", 10, ($page-1) * 10);
		$nbrArticles = $article_manager->findAllJoinAuthor();
		$this->show( 'article/index', [
			'articles' => $articles,
			'nbrArticles' => sizeof($nbrArticles),
			'page' => $page,
		]);
	}


	public function create() {
		$this->allowTo('admin');
        // Traitement du formulaire
        if (!empty($_POST)) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $article_manager = new ArticleModel();
            $article_manager->insert([
                'title' => $title,
                'content' => $content,
                'author_id' => $this->getUser()['id'],
            ]);
			$this->redirectToRoute('article_index', ['page'=>1]);
        }
		$this->show('article/create');
	}


	public function delete($id) {
		$this->allowTo('admin');
		$article_manager = new ArticleModel();
		$article_manager->delete($id);
		$this->redirectToRoute('article_index', ['page'=>1]);
	}


	public function random($nbr) {
		$this->allowTo('admin');
		$faker = \Faker\Factory::create('fr_FR');
		$article_manager = new ArticleModel();
		for ($i=0; $i < $nbr; $i++) {
			$article_manager->insert([
				'title' => $faker->sentence(),
				'content' => $faker->realText(),
				'author_id' => $this->getUser()['id'],
				'created_at' => $faker->dateTimeBetween('-1 year')->format('Y-m-d H:i:s'),
			]);
		}
		$this->redirectToRoute('article_index', ['page'=>1]);
	}

	public function update($id) {
		$this->allowTo('admin');
		$article_manager = new ArticleModel();
		$article = $article_manager->find($id);

		if (!empty($_POST)) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $article_manager->update([
                'title' => $title,
                'content' => $content,
            	], $id);
			$this->redirectToRoute('article_index', ['page' => 1]);
        }
		$this->show('article/update', ['article' => $article]);
	}

	public function view($id) {
		$article_manager = new ArticleModel();
		$article = $article_manager->find($id);
		$this->show('article/view', ['article' => $article]);
	}

}
