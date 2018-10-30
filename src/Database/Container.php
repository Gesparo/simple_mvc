<?php

namespace App\Database;

use App\Globals\Globals;
use PDO;

/**
 * Created by PhpStorm.
 * User: gesparo
 * Date: 30.10.2018
 * Time: 12:12
 */

class Container
{
    /**
     * Get connection to database
     */
    public static function get(): PDO
    {
        $host = Globals::getHost();
        $database = Globals::getDatabase();
        $user = Globals::getUser();
        $password = Globals::getPassword();

        return new PDO("mysql:host=$host;dbname=$database", $user, $password);
    }
}