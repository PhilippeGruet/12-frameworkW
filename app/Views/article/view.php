<?php $this->layout('layout', ['title' => $article['title'] ] ) ?>

<?php $this->start('main_content') ?>
    <article>
    	<p>Publié le <?= $article['created_at'] ?></p>
        <h4><?= $article['content'] ?></h4>
        <p>Auteur <?= $article['username'] ?></p>
    </article>
    <a href="<?= $this->url('default_home', ['page'=>1]) ?>">Retour</a>
<?php $this->stop('main_content') ?>

<?php $this->start('side_bar') ?>
    <h1>Side bar</h1>
<?php $this->stop('side_bar') ?>
