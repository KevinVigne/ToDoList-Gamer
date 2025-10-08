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
