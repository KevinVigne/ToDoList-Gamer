<?php
require_once(__DIR__ . "/partials/head.view.php");
?>
<div class="card" style="width: 18rem;">
  <img src="..." class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?=  $mytask->getStatus()?></h5>
    <p class="card-text"><?= $mytask->getTitle()?></p>
    <p class="card-text"><?=$mytask->getDescription() ?></p>
    <a href="#" class="btn btn-primary">Modifier</a>
     <a href="#" class="btn btn-primary">Supprimer</a>
  </div>
</div>
<?php

?>
<?php
require_once(__DIR__ . "/partials/footer.view.php");
?>

