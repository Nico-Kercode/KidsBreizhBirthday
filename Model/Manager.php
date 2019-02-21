<?php
namespace Kbb\Model;

use \PDO;


class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=kbb_v1;charset=utf8', 'root', '');
        return $db;
    }
}