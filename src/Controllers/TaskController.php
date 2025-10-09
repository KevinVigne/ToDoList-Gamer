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
                        $today = date("Y-m-d");
                        $task= new Task (null,$title,$description,'à faire');
                        $task->addtask();
                        //on fois la tache est ajoutée on redirige vers accueil ('/')
                         $this->redirectToRoute('/', 200);//code formulaire
            }
            }   
                  require_once(__DIR__ . "/../Views/addtask.view.php"); 
      }
      public function task(){
            //si ya un get on recupere l'id pour faire en sorte de l'afficher une seule tache 
            if(isset($_GET['id'])){
                  $id =htmlspecialchars($_GET['id']);
                  $task = new Task($id, null, null,null);
                  $mytask = $task->getTaskById();
            }
             require_once(__DIR__ . "/../Views/taskById.view.php"); 
      }
      //on doit recuperer toutes info chaque fois pour pouvoir les modifier 
      public function editTask(){
            if(isset($_GET['id'])){// on recupere id dans l'url
                  $id=htmlspecialchars($_GET['id']);//on la stock 
                  $task= new Task($id,null,null,null);//on instancie une nouvelle tache 
                  $mytask = $task->getTaskById();//on lui récupére les données grace a son id
                  if($mytask){ //si la tache existe 
                        if(isset($_POST['editTask'])) {//si l'user a cliquer sur le bouton
                              $title = htmlspecialchars($_POST['title']);
                              $description  = htmlspecialchars($_POST['description']);
                              $status  = htmlspecialchars($_POST['status']);
                              if(empty($this->arrayError)){
                                    $updateTask = new Task($id,$title,$description,$status);
                                    $updateTask->editTask();
                                    $this->redirectToRoute('/tache?id='.$id,200);
                              }
                        }
                        require_once(__DIR__ . "/../Views/taskById.view.php"); //si la tache existe on affiche re required on le fait toujours dans la fonction créé
                  }else{
                        $this->redirectToRoute('/', 302);
                  }
            }else{
                        $this->redirectToRoute('/', 302);
                  }
            
      }

}
