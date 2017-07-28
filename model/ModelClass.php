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

    public function select($fields,$tbName,$conditions=array()){
        if (is_array($fields)){
            $fieldStr = "";
            foreach ($fields AS $value){
                $fieldStr.=$value.",";
            }
            $fieldStr = trim($fieldStr,",");
        }else{
            $fieldStr = "*";
        }
        $conditionsValue = array();
        if (!empty($conditions)){
            $conditionFields = "";
            foreach ($conditions AS $key=>$val){
                $conditionFields.=$key."=?,";
                array_push($conditionsValue,$val);
            }
            $conditionFields = trim($conditionFields,",");
            $sql = "SELECT {$fieldStr} FROM {$tbName} WHERE $conditionFields";
        }else{
            $sql = "SELECT {$fieldStr} FROM {$tbName}";
        }
        $res = $this->model->queryDb($sql,$conditionsValue);
        return $res;
    }
}