<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/7/27 0027
 * Time: 下午 1:56
 */

namespace router;


class RouterClass{
    //模块，控制器，方法,参数
    public $module='Home';
    public $controller='Index';
    public $method='index';
    public $params='';

    public function __construct(){
        $url = $_SERVER['PATH_INFO'];
        if ($url=='/'){
            return ;
        }
        $arr = explode("/",trim($url,"/"));
        $this->module = isset($arr[0])?$arr[0]:$this->module;
        $this->controller = isset($arr[1])?$arr[1]:$this->controller;
        $this->method = isset($arr[2])?$arr[2]:$this->method;
    }
}