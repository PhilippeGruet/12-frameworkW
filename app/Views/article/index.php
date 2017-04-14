<?php $this->layout('layout', ['title' => 'Liste des articles']) ?>

<?php $this->start('main_content') ?>

    <div class="">
        <a href="<?= $this->url('article_create') ?>" class="btn btn-success">Ajouter un article</a>
        <a href="<?= $this->url('article_random', ['nbr' => '10']) ?>" class="btn btn-success">Ajouter 10 articles de qualités supérieurs</a>
    </div>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th style="width: 2%;">ID</th>
                <th style="width: 16%;">Titre</th>
                <th style="width: 60%;">Aperçu de l'article</th>
                <th style="width: 5%;">Auteur</th>
                <th style="width: 17%;">Actions</th>
            </tr>
        </thead>
        <tbody>


            <?php foreach ($articles as $article): ?>
            <tr>
                <td><?= $article["id_article"] ?></td>
                <td><?= $article["title"] ?></td>
                <td><?= substr($article['content'], 0, 100); ?></td>
                <td><?= ($article["username"])?$article["username"]:"Anonyme"; ?></td>
                <td>
                    <a href="<?= $this->url( 'article_update', ['id' => $article['id_article']] ) ?>" class="btn btn-primary">Modifier</a>
                    <a href="<?= $this->url( 'article_delete', ['id' => $article['id_article']] ) ?>" class="btn btn-danger">Supprimer</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <ul class="pagination">
        <!-- Previous page '«' -->
        <?php if ( !($page == 1) ): ?>
            <li><a href="<?= $this->url('article_index', ['page' => $page-1])?>"> « </a></li>
        <?php endif; ?>

        <!-- All pages -->
        <?php for($i = 0; $i < $nbrArticles / 10; $i++): ?>
            <li <?= ( $i+1 == $page) ? 'class="active"': ''?>>
                <a href="<?= $this->url('article_index', ['page' => $i+1])?>"><?= $i + 1 ?></a>
            </li>
        <?php endfor; ?>

        <!-- Next page '»' -->
        <?php if ( !($page == ceil($nbrArticles / 10)) ): ?>
            <li><a href="<?= $this->url('article_index', ['page' => $page+1])?>"> » </a></li>
        <?php endif; ?>
    </ul>

<?php $this->stop('main_content') ?>
