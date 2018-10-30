<?php
/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 30.10.2018
 * Time: 8:30
 */

namespace App\Controllers;


use App\Database\Container;
use App\Models\BooksModel;
use App\View\View;

class IndexController extends Controller
{
    /**
     * Show index page
     *
     * @throws \Exception
     */
    public function index(): void
    {
        $connection = Container::get();

        $model = new BooksModel($connection);
        $books = $model->get();

        $view = new View();
        $view->render('index', compact('books'));
    }
}