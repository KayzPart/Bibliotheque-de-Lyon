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

    public static function newBook($datas)
    {
        $datas = $_POST;
        $manager = new ModelBook();
        $newBook = $manager->insertBook($datas);
        require_once './Views/admin_book_ajout.php';
    }
    public static function Show()
    {
        $manager = new ModelBook();
        $sBook = $manager->ViewCate();
        require_once './Views/admin_book_ajout.php';
    }
    public static function ShowCondi()
    {
        $manager = new ModelBook();
        $cBook = $manager->ViewCondi();
        require_once './Views/admin_book_ajout.php';
    }
    // public static function ShowGender(){
    //     $manager = new ModelBook();
    //     $gBook = $manager->ViewGender();
    //     require_once './Views/admin_book_ajout.php';
    // }

    public static function spaceSearch()
    {
        $searchcat = $_GET['searchcat'];
        $p = isset($_GET['p']) ? $_GET['p'] - 1 : 0;
        if ($searchcat == 'id_category') {
            $search = $_GET['categories'];
        } else {
            $search = $_GET['s'];
        }
        var_dump($searchcat);
        $twig = Controllertwig::twigcontrol();
        $manager = new ModelBook();
        $result = $manager->spaceSearch($searchcat, $search, $p);
        echo $twig->render('search.twig', ['root' => ROOT, 'books' => $result[0], 'nbrpages' => $result[1]]);
    }


    // Modification Book
    public static function editBookForm($id)
    {
        $twig = ControllerTwig::twigControl();
        $datas = $_GET;
        $datas = new ModelBook();
        $book = $datas->select($id);
        $update = $datas->editBook($id);
        echo $twig->render('update_book.twig', ['book' => $book[0], 'category' => $book[1], 'condition' => $book[2],'root' => ROOT]);
    }
    public static function redirectionAfterEdit(){
        $twig = ControllerTwig::twigControl();
        $datas = new ModelBook();
        echo $twig->render('spaceAdmin.twig',['root' => ROOT]);
    }
}

