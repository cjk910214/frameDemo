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
    //模型实例
    protected $model;
    //SQL语句
    protected $sql=array();
    //表名
    private $table;

    public function __construct($tableName){
        $this->table = $tableName;
        $this->model = DbClass::createDb();
    }

    //字段
    public function fileds($filedsList){
        if (is_array($filedsList)){
            //数组解析
            $filedsStr = "";
            foreach ($filedsList AS $value){
                $filedsStr.=$value.",";
            }
            $filedsStr = trim($filedsStr,",");
        }else{
            //字符串解析
            $filedsStr = trim($filedsList,",");
        }
        $this->sql['fileds'] = $filedsStr;
        return $this;
    }

    //条件
    public function where($conditionsList){
        if (is_array($conditionsList)){
            $conditionsStr = "";
            $conditionsData = array();
            if (isset($conditionsList['logic'])){
                $logic = $conditionsList['logic'];
                array_pop($conditionsList);
                foreach ($conditionsList AS $key=>$value){
                    $conditionsStr.=$key.$value[0]."? ".$logic." ";
                    array_push($conditionsData,$value[1]);
                }
                $conditionsStr = trim($conditionsStr,$logic." ");
            }else{
                foreach ($conditionsList AS $key=>$value){
                    $conditionsStr.=$key.$value[0]."? AND ";
                    array_push($conditionsData,$value[1]);
                }
                $conditionsStr = trim($conditionsStr,"AND ");
            }
            $this->sql['whereData'] = $conditionsData;
        }else{
            $conditionsStr = $conditionsList;
        }
        $this->sql['where'] = "WHERE ".$conditionsStr;
        return $this;
    }

    //排序
    public function order($orderList){
        if (is_array($orderList)){
            $orderStr = "";
            foreach ($orderList AS $key=>$value){
                $orderStr.=$key." ".$value.",";
            }
            $orderStr = trim($orderStr,", ");
        }else{
            $orderStr = $orderList;
        }
        $this->sql['order'] = "ORDER BY ".$orderStr;
        return $this;
    }

    //分页
    public function limit($limitNo){
        $this->sql['limit'] = "LIMIT {$limitNo}";
        return $this;
    }

    //查询
    public function select(){
        $fileds = isset($this->sql['fileds'])?$this->sql['fileds']:"*";
        $where = isset($this->sql['where'])?$this->sql['where']:"";
        $order = isset($this->sql['order'])?$this->sql['order']:"";
        $limit = isset($this->sql['limit'])?$this->sql['limit']:"";
        $params = isset($this->sql['whereData'])?$this->sql['whereData']:array();
        $sql = "SELECT {$fileds} FROM {$this->table} {$where} {$order} {$limit}";
        $result = $this->model->queryDb($sql,$params);
        return $result;
    }

}