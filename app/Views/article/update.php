<?php $this->layout( 'layout', ['title' => 'Modifier l\'article ' . $article['title']] ) ?>

<?php $this->start('main_content') ?>

	<form method="post">

        <div class="form-group">
            <label for="title">Titre de l'article :</label>
            <input type="text" class="form-control" id="title" name="title" value="<?= $article['title']; ?>">
        </div>

        <div class="form-group">
            <label for="content">Contenu de l'article :</label>
            <textarea class="form-control" id="content" name="content"><?= $article['content'] ?></textarea>
        </div>

        <button class="btn btn-success">Editer</button>
        <a class="btn btn-danger" href="<?= $this->url('article_index', ['page' => 1]); ?>">Annuler</a>
    </form>

<?php $this->stop('main_content') ?>
