<?php 

    class ControllerComment extends ControllerTwig{
        public static function comment(){
            session_start(); 
            $twig = Controllertwig::twigcontrol();
            $datas = $_GET;

            if(isset($_SESSION['userId'])){

                $add = new ModelComment();
                $add->addComments($datas);

                header('Location: ../book/'. $_GET['id_book']);
            }
            if(!isset($_SESSION['userId'])){
                echo 'Veuillez vous connecter afin d\'ajouter un commentaire';
                header('Location: ../connectUser');
            }
        }
    }