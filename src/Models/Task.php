<?php
namespace App\Models;
use PDO;
use Config\Database;

class Task
{
    private ?int $id_task; 
    private ?string $title;
    private ?string $description;
    private ?string $status;

// faire la methode construct .... elle se lance à l'instanciation de la class task
    public function __construct(?int $id_task,?string $title,?string $description,?string $status)
    {
        $this->id_task = $id_task;
        $this->title = $title;
         $this->description = $description;
         $this->status=$status;

    }
    //requette sql 
      public function addtask(){
        //connexion à la base de données
          $pdo = Database::getConnection();
        //requette sql
           $sql = "INSERT INTO `task` (`title`,`description`, `status`)
                VALUES (?,?,?)";
           $stmt = $pdo->prepare($sql);
           return $stmt->execute([$this->title, $this->description, $this->status]);
    }

        public function allTask()
    {
        $pdo = Database::getConnection();
        $sql = "SELECT `id_task`,`title`,`description`,`status` FROM `task`";
       
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $alltask = [];

        foreach($result as $row){
            $task = new Task($row['id_task'],$row['title'],$row['description'],$row['status']);
            $alltask[] = $task;
        } return $alltask; 
      }
      //recuperer une tache par son id
      public function getTaskById(){
        $pdo = Database::getConnection();
        $sql = "SELECT `id_task`,`title`,`description`,`status` FROM `task` WHERE `id_task`=?" ;
        $stmt = $pdo->prepare($sql);
        $stmt->execute($this->id_task);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if($result){
            return new Task($result['id_task'],$result['title'],$result['description'],$result['status']);
        }else {
            return false;
        }
      }

    //Faire les Get  
     public function getIdTask():?int
     {
        return $this->id_task;
     }
     public function getTitle():?string
     {
         return $this->title;
     }
     public function getDescription():?string 
     {
        return $this->description;
     }
     public function getStatus():?string
     {
         return $this->status;
     }
    // faire les Set 
     public function setIdTask(?int $id_task): void
     {
        $this->id_task = $id_task; 
     } 
    public function steTitle(?string $title): void
     {
        $this->title = $title;
     }
     public function setDescription(?string $description): void
     {
        $this->desccription = $description;
     }
     public function setStatus(?string $status): void
     {
        $this->status = $status;
     }
        
}
