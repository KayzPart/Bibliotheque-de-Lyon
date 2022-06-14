<?php 
    class ModelComment extends Model{
        // Afficher Commentaire
        public function commentUser($id){
            $db = $this->getDb();

            $req = $db->prepare('SELECT `id_comment`, `title_comment`, `content_comment`, `id_book`, `id_user`  FROM `comment` WHERE `id_book` = :id');

            $req->bindParam(':id', $id['id_book'], PDO::PARAM_INT);
            $req->execute();

            $comment = []; 
            $user = [];
            while($data = $req->fetch(PDO::FETCH_ASSOC)){
                $comment[] = new Comment($data);
                
            }
            $reqUser = $db->query('SELECT `id_user`, `num_member` FROM `user`');
            while($dataUser = $reqUser->fetch(PDO::FETCH_ASSOC)){
                $user[] = new User($dataUser);
            }
            return [$comment, $user];

            
        }

        // Ajout commentaire 
        public function addComments($datas){
            if(isset($_GET['submit'])){
                $id = $_SESSION['userId'];

                $db = $this->getDb();
                $addComment = $db->prepare('INSERT INTO `comment`(`title_comment`, `content_comment`, `id_book`, `id_user`) VALUES (:titleComment, :contentComment, :idBook, :id)');
                $addComment->bindParam('titleComment', $datas['titleComment'], PDO::PARAM_STR);
                $addComment->bindParam('contentComment', $datas['contentComment'], PDO::PARAM_STR); 
                $addComment->bindParam('idBook', $datas['id_book'], PDO::PARAM_INT); 
                $addComment->bindParam('id', $id, PDO::PARAM_INT); 
                $addComment->execute();

            }
        }
    }