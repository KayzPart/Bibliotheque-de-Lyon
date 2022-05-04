<?php 

    class ControllerConnexion {
        public static function connect(){
            require_once './Views/connexion.php';
        }

        public static function selectSession($id){
            if(isset($_POST['submit'])){
                $chooseConnect = $_POST['chooseConnect'];

                if($chooseConnect === 'admin'){
                    $manager = new ModelAdmin();
                    $log = $manager->sessionAdmin($id);
                    require_once './Views/spaceAdmin.php';
                }else{
                    $manager = new ModelUser;
                    $log = $manager->sessionUser($id);
                    require_once './Views/spaceUser.php';
                }
            }
        }
    }