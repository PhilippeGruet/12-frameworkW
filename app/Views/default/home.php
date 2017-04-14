<?php $this->layout('layout', ['title' => 'Accueil']) ?>

<?php $this->start('main_content') ?>
	<?php foreach ($articles as $article): ?>
		<article class="well">
			<h2><a href="<?= $this->url( 'article_view', ['id' => $article['id_article']] ) ?>"><?= $article['title'] ?></a></h2>
			<p>
				<?php if( isset($article['username']) ) :?>
					Ecrit par <a href="#"><?= $article['username']; ?></a>
				<?php else: ?>
					Article anonyme écrit
				<?php endif; ?>
				le
				<?php
					$datetime = new DateTime($article['created_at']);
					$intl = new IntlDateFormatter(
						'rf_FR',
						IntlDateFormatter::FULL,
						IntlDateFormatter::MEDIUM
					);
					echo $intl->format($datetime);
				?>
			</p>
			<p><?= $article['content'] ?></p>
		</article>
		<p class="text-right">
			<a href="<?= $this->url( 'article_view', ['id' => $article['id_article']] ) ?>" class="btn btn-primary btn-sm">Lire l'article</a>
		</p>
	<?php endforeach; ?>

	<ul class="pagination">
        <!-- Previous page '«' -->
        <?php if (! ($page == 1) ): ?>
            <li><a href="<?= $this->url('default_home', ['page' => $page-1])?>"> « </a></li>
        <?php endif; ?>

        <!-- All pages -->
        <?php for($i = 0; $i < $nbrPages; $i++): ?>
            <li <?= ( $i+1 == $page) ? 'class="active"': ''?>>
                <a href="<?= $this->url('default_home', ['page' => $i+1])?>"><?= $i + 1 ?></a>
            </li>
        <?php endfor; ?>

        <!-- Next page '»' -->
        <?php if ( !( $page == $nbrPages ) ): ?>
            <li><a href="<?= $this->url('default_home', ['page' => $page+1])?>"> » </a></li>
        <?php endif; ?>
    </ul>

<?php $this->stop('main_content') ?>

<?php $this->start('side_bar') ?>
    <h1>Side bar</h1>
<?php $this->stop('side_bar') ?>
