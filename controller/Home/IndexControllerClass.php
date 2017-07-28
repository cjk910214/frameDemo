<?php
/**
 * Created by PhpStorm.
 * User: cjk
 * Date: 2017/7/27 0027
 * Time: 下午 3:39
 */

namespace controller\Home;


use controller\ControllerClass;

class IndexControllerClass extends ControllerClass {
    public function index(){
        echo 'my first demo';
    }

    public function demo(){
        echo 'my second demo';
    }
}