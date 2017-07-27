<?php
/**
 * Created by PhpStorm.
 * User: cjk
 * Date: 2017/7/27 0027
 * Time: 上午 10:40
 */

namespace core;



use router\RouterClass;

class AppCoreClass{
    static public function run(){
        //自动类加载方法注册
        spl_autoload_register('core\AppCoreClass::autoLoad');
        //实例化路由
        $router = new RouterClass();
        $action = "\\controller\\{$router->module}\\{$router->controller}ControllerClass";
        $obj = new $action;
        $methodName = $router->method;
        $obj->$methodName();
    }

    //自动加载方法
    static public function autoLoad($class){
        $name = $class.'.php';
        if (file_exists($name)){
            include_once $name;
        }else{
            die($class.".php不存在！");
        }
    }
}