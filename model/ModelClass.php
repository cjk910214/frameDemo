<?php
/**
 * Created by PhpStorm.
 * User: cjk
 * Date: 2017/7/28 0028
 * Time: 上午 11:37
 */

namespace model;


use core\DbClass;

class ModelClass{
    private $model;

    public function __construct(){
        $this->model = DbClass::createDb();
    }

    public function select($sql){
        $res = $this->model->queryDb($sql);
        return $res;
    }
}