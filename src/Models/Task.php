<?php
namespace App\Models;
use PDO;
use Config\Database;

class task
{
    private ?int $id_task;
    private ?string $title;
    private ?string $description;
    private ?string $statut;

// faire la methode construct .... elle se lance à l'instanciation de la class task
    public function __construct__(?int $id_task,?string $title,?string $description,?string $statut)
    {
        $this->id_task = $id_task;
        $this->title = $title;
         $this->description = $description;
         $this->statut=$statut;

    }
    //requette sql 
      public function addtask(){
        //connexion à la base de données
          $pdo = Database::getConnection();
        //requette sql
           $sql = "INSERT INTO `task` (`title`,`description`, `statut`) 
                VALUES (?,?,?)";
           $stmt = $pdo->prepare($sql);
           return $stmt->execute([$this->tttle, $this->description, $this->statut]);
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
     public function getStatut():?string
     {
         return $this->statut;
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
     public function setStatut(?string $statut): void
     {
        $this->statut = $statut;
     }
        
}
