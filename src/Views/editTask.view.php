<?php
require_once(__DIR__ . "/partials/head.view.php");
?>

<h1>Ajouter une tache </h1>
<form method="POST">
    <div class="container">
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" name="title" id="title" value="<?=$mytask->getTitle()?>">
             <?php //si ya quelque chose dans le tableau erreur affiche le message 
            if(isset($this->arrayError['title'])){
                ?>
                    <p class="text-danger"><?= $this->arrayError['title']?></p>
                <?php
            }
            ?>
            <label for="description" class="form-label">Description de la tache </label>
            <textarea class="form-control" id="description" name="description" style="height: 100px"><?= $mytask->getDescription() ?></textarea>
            <?php 
            if(isset($this->arrayError['description'])){
                ?>
                    <p class="text-danger"><?= $this->arrayError['description']?></p>
                <?php
            }
            ?>
            <label for="status">Statut</label>
            <select name="status" id="status">
                <option value =""> Veuillez choisir un statut </option>
                <option value ="à faire"> A faire </option>
                <option value ="en cours"> En cours </option>
                <option value ="terminé"> Terminé </option>
            </select>
             <?php //si ya quelque chose dans le tableau erreur affiche le message 
            if(isset($this->arrayError['status'])){
                ?>
                    <p class="text-danger"><?= $this->arrayError['status']?></p>
                <?php
            }
            ?>
        </div>
        <button type="submit" name="editTask" class="btn btn-success mt-5">Modifier!</button>
    </div>
</form>
<form action="/supprimer" method="POST">
    <input type="hidden" name="id" value="<?= $mytask->getIdTask()?>">
    <button type="submit" name="deleteTask" class="btn btn-danger mt-5">Supprimer!</button>

</form>
<?php
require_once(__DIR__ . "/partials/footer.view.php");
?>