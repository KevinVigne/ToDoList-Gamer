<?php

namespace App\Utils;

abstract class AbstractController
{
    protected array $arrayError = [];

    public function isNotEmpty ($nameInput){

        //si le post avec la valeur est vide alors
        if(empty($_POST[$nameInput])){
            //On rapelle le tableau et on lui donne en clé le nom de la $value et en valeur une string
            $this->arrayError[$nameInput] = "Ce champs ne peut pas être vide.";
            //On retour le tableau
            return $this->arrayError;
        }
        //sinon on retourne false
        return false;
    }


    public function checkFormat($nameInput, $value){

        //Vos regex = vos filtres
     
        $regexDescription = '/^[a-zA-Zà-üÀ-Ü ,!?;.:()<>$@£\'\"\-_°€&%#<>\-+\/0-9œ]{0,1000}$/';
        $regexTitle = '/^[a-zA-Zà-üÀ-Ü ,!?;.:()<>$@£\'\"\-_°€&%#<>\-+\/0-9œ]{5,1000}$/';
      

        //on prend le nom de l'input
        switch($nameInput){

            case 'description':

                if(!preg_match($regexDescription, $value)){
                    $this->arrayError['description'] = 'Merci de mettre une vraie description';
                }
                break;
            case 'title':
                if(!preg_match($regexTitle, $value)){
                    $this->arrayError['title'] = 'Merci de renseigner un texte correcte!';
                }
                break;
        }
    }


    //Méthode qui permet d'appeler les deux autre méthodes
    public function totalCheck($nameInput, $valueInput)
    {
        //appel la méthode checkformat et je lui donne le nom et la valeur de mon input
        $this->checkFormat($nameInput, $valueInput);
        //appel la méthode isNotEmpty et je lui donne le nom de mon input
        $this->isNotEmpty($nameInput);
        //retourne mon tableau d'erreur:
        return $this->arrayError;
    }

    public function errorMessage($myMessage){
        ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $myMessage ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php
    }

    public function debug ($info){
        echo '<pre>';
        var_dump($info);
        echo '</pre>';
    }

    public function redirectToRoute($route, $code){
        http_response_code($code);
        header("Location: {$route}");
        exit;
    }
}