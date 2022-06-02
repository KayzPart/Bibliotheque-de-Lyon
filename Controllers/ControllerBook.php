<?php
class ControllerBook extends ControllerTwig
{
    // Affichage des nouveautés et des suggestion (homepage)
    public static function listAllBook()
    {
        $twig = ControllerTwig::twigControl();

        $datas = new ModelBook();
        $allBooks = $datas->suggestBook();
        $allListNews = $datas->listNewsBook();
        echo $twig->render('homepage.twig', ['books' => $allListNews, 'sBook' => $allBooks, 'root' => ROOT]);
    }
    public static function readBook($id){
        $twig = ControllerTwig::twigControl();
        $twig->getExtension(\Twig\Extension\CoreExtension::class)->setDateFormat('d/m/Y', '%d days');
        $datas = new ModelBook();
        $cmt = new ModelComment();
        $gend = new ModelGender();
        $book = $datas->select($id);
        $comment = $cmt->commentUser($id);
        $gender = $gend->readGender($id);
        // $reserv = $datasReserv->bookReserv();
        echo $twig->render('book.twig', ['book' => $book[0], 'category' => $book[1], 'condition' => $book[2], 'c' => $comment[0], 'u' => $comment[1], 'g' => $gender, 'root' => ROOT]);

    }
    public static function newBook($datas){
        $twig = ControllerTwig::twigControl();
        $datas = $_POST;
        $manager = new ModelBook();
        $manager->insertBook($datas);
        
        header('Refresh: 2; url = ./spaceAdmin');
    }
    public static function Show(){
        session_start();
        if(!isset($_SESSION['adminId'])){
            header("Refresh: 0.01; url = ./connectAdmin");
        }
        $twig = ControllerTwig::twigcontrol();
        echo $twig->render('admin_book_ajout.twig', ['root' => ROOT]);
    }
    
    public static function spaceSearch(){
        $searchcat = $_GET['searchcat'];
        $p = isset($_GET['p']) ? $_GET['p'] - 1 : 0;
        if($searchcat == 'id_category'){
            $search = $_GET['categories'];
        }else{
            $search = $_GET['s'];
        }
        $twig = Controllertwig::twigcontrol();
        $manager = new ModelBook();
        $result = $manager->spaceSearch($searchcat, $search, $p);
        echo $twig->render('search.twig', ['root' => ROOT, 'books' => $result[0], 'nbrpages' => $result[1]]);
    }
        


    // Modification Book
    public static function editBookForm($id)
    {
        $twig = ControllerTwig::twigControl();
        $twig->getExtension(\Twig\Extension\CoreExtension::class)->setDateFormat('d/m/Y', '%d days');
        $datas = $_GET;
        $datas = new ModelBook();
        $gend = new ModelGender();
        $upB = $datas->select($id);
        $datas->editBook($id);
        $gender = $gend->readGender($id);
        echo $twig->render('admin_book_ajout.twig', ['book' => $upB[0], 'category' => $upB[1], 'condition' => $upB[2], 'g' => $gender,'root' => ROOT]);
    }
    public static function redirectionAfterEdit(){
        $twig = ControllerTwig::twigControl();
        $datas = new ModelBook();
        echo $twig->render('spaceAdmin.twig',['root' => ROOT]);
    }
}
