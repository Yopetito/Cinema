<?php 
namespace Model;

abstract class Connect {

    const HOST = "localhost";
    const DB = "cinema_yofer";
    const USER = "root";
    const PASS = "Jifomeye1207";

    public static function seConnecter() {
        try {
            return new \PDO(
                'mysql:host='.self::HOST.';dbname='.self::DB.';charset=utf8', self::USER, self::PASS);   
        } catch(\PDOException $ex) {
            return $ex->getMessage();
        }
    }
}
