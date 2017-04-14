<?php $this->layout('layout', ['title' => 'Inscription']) ?>

<?php $this->start('main_content') ?>

    <form method="POST">
        <div class="form-group">
            <label for="username">login :</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= $username ?>">
        </div>

        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $email ?>">
        </div>

        <div class="form-group">
            <label for="password">Mot de passe:</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group">
            <label for="cfpassword">Confirmer le mot de passe:</label>
            <input type="password" class="form-control" id="cfpassword" name="cfpassword">
        </div>

        <button class="btn btn-default">Inscription</button>
    </form>

    <?php foreach($messages as $error): ?>
        <p><?= $error ?></p>
    <?php endforeach; ?>
<?php $this->stop('main_content') ?>
