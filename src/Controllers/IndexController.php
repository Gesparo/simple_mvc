<?php
/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 30.10.2018
 * Time: 8:30
 */

namespace App\Controllers;


use App\Models\BooksModel;
use App\View\View;
use PDO;

class IndexController extends Controller
{
    /**
     * Show index page
     *
     * @throws \Exception
     */
    public function index(): void
    {
        $connection = new PDO('mysql:host=localhost;dbname=simple_mvc', 'root', '');

        $model = new BooksModel($connection);
        $books = $model->get();

        $view = new View();
        $view->render('index', compact('books'));
    }
}