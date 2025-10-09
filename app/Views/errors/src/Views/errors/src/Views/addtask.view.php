<?php
require_once(__DIR__ . "/partials/head.view.php");
?>

<h1>Ajouter une tache </h1>
<form method="POST">
    <div class="container">
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title">
             <?php //si ya quelque chose dans le tableau erreur affiche le message 
            if(isset($this->arrayError['title'])){
                ?>
                    <p class="text-danger"><?= $this->arrayError['title']?></p>
                <?php
            }
            ?>
            <label for="task" class="form-label">Description de la tache </label>
            <textarea class="form-control" id="description" name="description" style="height: 100px"></textarea>
            <?php 
            if(isset($this->arrayError['description'])){
                ?>
                    <p class="text-danger"><?= $this->arrayError['description']?></p>
                <?php
            }
            ?>
        </div>
        <button type="submit" name="addtask" class="btn btn-success mt-5">Ajouter !</button>
    </div>
</form>