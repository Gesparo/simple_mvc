<?php
/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 30.10.2018
 * Time: 9:34
 */

namespace App\Controllers;

use App\Database\Container;
use App\Models\SingleBookModel;
use App\View\View;

class BooksController
{
    public function show()
    {
        $bookId = (int) $_GET['id'];

        if($bookId <= 0) {
            throw new \Exception("$bookId is not correct identifier of book");
        }

        $page = (int) $_GET['page'] > 0 ? (int) $_GET['page'] : 1;

        $connection = Container::get();

        $model = new SingleBookModel($connection, $bookId, $page);
        $book = $model->get();

        $view = new View();
        $view->render('show', compact('book'));
    }
}