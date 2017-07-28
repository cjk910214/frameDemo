<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/27 0027
 * Time: 下午 3:59
 */

namespace controller\Home;


use controller\ControllerClass;
use model\ModelClass;

class UserControllerClass extends ControllerClass {

    public function index(){
        echo 'hello world';
    }

    public function user(){
        $userModel = new ModelClass();
        $res = $userModel->select("*","tb_1",array("id"=>3));
        var_dump($res);
    }

}