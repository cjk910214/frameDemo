<?php
/**
 * Created by PhpStorm.
 * User: cjk
 * Date: 2017/7/27 0027
 * Time: 上午 10:26
 */
    header("Content-type: text/html; charset=utf-8");
    //定义项目名称
    define("APP_NAME","myrbac");
    //定义项目路径
    define("APP_PATH",dirname(__FILE__));
    //引入核心类库
    require 'core/AppCoreClass.php';
    //程序运行
    \core\AppCoreClass::run();
?>