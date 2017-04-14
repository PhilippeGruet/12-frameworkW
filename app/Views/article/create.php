<?php $this->layout('layout', ['title' => 'Créer un article']) ?>

<?php $this->start('main_content') ?>

	<form method="post">
        <div class="form-group">
            <label for="title">Titre de l'article :</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>

        <div class="form-group">
            <label for="category">Catégories de l'article :</label>
			<input type="text" class="form-control" id="category" value="Amsterdam,Washington,Sydney" data-role="tagsinput"/>
        </div>

        <div class="form-group">
            <label for="content">Contenu de l'article :</label>
            <textarea class="form-control" id="content" name="content"></textarea>
        </div>

        <button class="btn btn-default">Publier</button>
    </form>

<?php $this->stop('main_content') ?>
