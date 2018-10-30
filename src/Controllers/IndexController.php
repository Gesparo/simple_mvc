<?php
/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 30.10.2018
 * Time: 8:30
 */

namespace App\Controllers;


use App\View\View;

class IndexController extends Controller
{
    public function index(): void
    {
        $view = new View();

        $view->render('index');
    }
}