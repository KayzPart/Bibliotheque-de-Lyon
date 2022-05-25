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
    public static function readBook($id)
    {
        $twig = ControllerTwig::twigControl();

        $datas = new ModelBook();
        $book = $datas->select($id);

        echo $twig->render('book.twig', ['book' => $book[0], 'category' => $book[1], 'root' => ROOT]);
    }
    public static function newBook($datas){
        $datas = $_POST;
        $manager = new ModelBook();
        $newBook = $manager->insertBook($datas);
        require_once './Views/admin_book_ajout.php';
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
    public static function editBookForm($datas)
    {
        $twig = ControllerTwig::twigControl();
        $datas = $_GET;
        $datas = new ModelBook();
        $update = $datas->editBook($datas);
        echo $twig->render('update_book.twig', ['root' => ROOT, 'book' => $update]);
    }
}
