<?php
/**
 * Created by PhpStorm.
 * User: cjk
 * Date: 2017/7/28 0028
 * Time: 上午 11:14
 */

namespace core;


class DbClass
{
    static private $dbObj = null;
    private $db;

    private function __construct(){
        //获取配置信息连接数据库(PDO方式)
        $dsn = "mysql:dbname=test;host:127.0.0.1;port=3306";
        $username = "root";
        $pwd = "123456";
        try{
            $this->db = new \PDO($dsn,$username,$pwd);
        }catch (\PDOException $e){
            die('连接数据库失败：'.$e);
        }
    }

    static public function createDb(){
        if (!isset(self::$dbObj)){
            self::$dbObj = new DbClass();
        }
        return self::$dbObj;
    }

    public function queryDb($sql,$params){
        $pdoObj = $this->db->prepare($sql);
        $pdoObj->execute($params);
        $result = $pdoObj->fetchAll(\PDO::FETCH_ASSOC);
        return $result;
    }
}