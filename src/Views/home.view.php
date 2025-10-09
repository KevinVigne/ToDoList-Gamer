<?php
require_once(__DIR__ . "/partials/head.view.php");
?>
<h1>Liste des taches </h1>
<?php
if(isset($allTask)){
  foreach($allTask as $task){

    ?>
    <div class="card">
      <div class="card-header">
     <?= $task->getStatus();?>
      </div>
      <div class="card-body">
      <h5 class="card-title"><?= $task->getTitle();?></h5>
      <p class="card-text"><?= $task->getDescription();?></p>
      <a class="btn btn-success"href="/tache?id= <?= $task->getIdTask()?>">Voir+</a> <!-- on creer un button pour afficher la tache -->
      </div>
    </div>
    <?php
  }
}
?>

