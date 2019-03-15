<?php
namespace Kbb\Model;

use \PDO;


// class Manager
// {
//     protected function dbConnect()
//     {
//         $db = new PDO('mysql:host=db774231146.hosting-data.io;dbname=db774231146;charset=utf8', 'dbo774231146', 'Konii23..', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

//         return $db;
//     }
// }


class Manager
{
    protected function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=kbb_v1;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

        return $db;
    }
}


