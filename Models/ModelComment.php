<?php 
    class ModelComment extends Model{
        // Afficher Commentaire
        public function commentUser($id){
            $db = $this->getDb();

            $req = $db->prepare('SELECT `id_comment`, `title_comment`, `content_comment`, `id_book`, `id_user` FROM `comment` WHERE `id_book` = :id');

            $req->bindParam(':id', $id['id_book'], PDO::PARAM_INT);
            $req->execute();

            $comment = []; 
            while($data = $req->fetch(PDO::FETCH_ASSOC)){
                $comment[] = new Comment($data);
            }
            return $comment;
        }

        // Ajout commentaire 
        public function addComments(){
            if(isset($_GET['submit'])){
                $id = $_GET['id_book'];
                $idUser = $_GET['id_user'];
                $firstname = $_GET['firstname']; 
                $name_comment = ['comment'];

                $db = $this->getDb();

                $reqUser = $db->prepare('SELECT `id_user`, `firstname` FROM `user` WHERE `id_user` = :idUser');
                $reqUser->bindParam(':id_user', $idUser);

                $req = $db->prepare('INSERT INTO `comment` (`name_comment`, `id_book`, `id_user`) VALUES (:name_comment, :id_book; :id_user)');

                $req->bindParam('name_comment', $name_comment, PDO::PARAM_STR);
                $req->bindParam('id_book', $id, PDO::PARAM_INT);
                $req->bindParam('id_user', $idUser, PDO::PARAM_INT);

                $req->execute();
            }
        }
    }