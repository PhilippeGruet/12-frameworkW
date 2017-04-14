<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title><?= $this->e($title) ?></title>

	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/bootstrap-tagsinput.css') ?>">
	<link rel="stylesheet" href="<?= $this->assetUrl('css/style.css') ?>">
</head>
<body>
	<nav class="navbar navbar-inverse">
		<div class="container">
		<!-- Brand and toggle get grouped for better mobile display -->
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="<?= $this->url('default_home'); ?>"><?= $w_site_name; ?></a>
			</div>

			<!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<!-- Left nav -->
				<ul class="nav navbar-nav">
					<li class="<?= $w_current_route == "default_home" ? "active" : ""; ?>"><a href="<?= $this->url('default_home'); ?>">Accueil<span class="sr-only">(current)</span></a></li>

					<li class="<?= $w_current_route == "default_contact" ? "active" : ""; ?>"><a href="<?= $this->url('default_contact'); ?>">Contact</a></li>
				</ul>

				<!-- Right nav -->
				<ul class="nav navbar-nav navbar-right">
					<?php if ($w_user): ?>
						<!-- Membre -->
						<li class="<?= $w_current_route == "article_index" ? "active" : ""; ?>">
							<a href="<?= $this->url('article_index', ['page' => 1]); ?>">Liste des articles</a>
						</li>
						<li>
							<a href="<?= $this->url('security_logout'); ?>">Déconnexion</a>
						</li>
					<?php else: ?>
						<!-- Visiteur -->
						<li class="<?= $w_current_route == "security_login" ? "active" : ""; ?>">
							<a href="<?= $this->url('security_login'); ?>">Connexion</a>
						</li>
						<li class="<?= $w_current_route == "security_register" ? "active" : ""; ?>">
							<a href="<?= $this->url('security_register'); ?>">Inscription</a>
						</li>
					<?php endif; ?>
				</ul>

			</div><!-- /.navbar-collapse -->
		</div><!-- /.container-fluid -->
	</nav>

	<div class="container">
		<header>
			<h1><?= $this->e($title) ?></h1>
		</header>

		<section>
			<?php if ($this->section('side_bar')): ?>
				<div class="row">
					<div class="col-md-9">
						<?= $this->section('main_content') ?>
					</div>
					<div class="col-md-3">
						<?= $this->section('side_bar') ?>
					</div>
				</div>
			<?php else: ?>
				<div class="row">
					<div class="col-md-12">
						<?= $this->section('main_content') ?>
					</div>
				</div>
			<?php endif; ?>
		</section>

		<footer>
		</footer>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src=""></script>
	<script src="<?= $this->assetUrl('js/bootstrap-tagsinput.min.js'); ?>"></script>
	<script src="<?= $this->assetUrl('js/app.js'); ?>"></script>
</body>
</html>
