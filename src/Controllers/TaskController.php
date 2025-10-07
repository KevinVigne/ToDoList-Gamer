<?php

namespace App\Controllers;
use App\Models\Task;
use App\Utils\AbstractController;

class TaskController extends AbstractController{
      public function addTask()
      {
            if(isset($_POST['addtask'])){
                  $title = htmlspecialchars($_POST['title']);
                  $description = htmlspecialchars($_POST['description']);
                  $this->totalCheck('title',$title);
                  $this->totalCheck('description',$description);
                  //si ya aucune erreur 
                  if(empty($this->arrayError)){
                        
                  }
            }
          require_once(__DIR__ . "/../Views/addtask.view.php"); 
      }
      
}
