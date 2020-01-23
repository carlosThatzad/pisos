<?php


namespace Rentit\Controllers;


use Rentit\DB;

/**
 * @property  tableName
  */
abstract class Entity
{
    protected static $tableName;
    protected static $db;



    public function __construct()
    {
        try{
            self::$db = new DB;
        }
        catch (\Exception $e){
            throw new \Exception("Error acessing database ( este msg esta en Entity)");
        }

    }

    public function save(){
      $class = new \ReflectionClass(($this));
      $tablename='';

      if($this->tableName != ''){
          $tablename= $this->tableName;

      }
      else{
          $tablename = strtolower($class->getShortName());
      }
        //takes new set values for propieties
        foreach ($class->getProperty(\ReflectionProperty::IS_PRIVATE) as $property){
            $propName=$property->getName();
            try{
                $propValueMethod= $class->getMethod('get'.$propName)->getName();
            }catch (\ReflectionException $e){

            }
            //remove id so its autoincremented
            if($propName!='id'){
                $val=call_user_func_array([$this,$propValueMethod], []);
                $props[]=$propName.'="'.$val.'"';
            }
        }
        $setClause = implode(',',$props);

        $sqlQuery ='';
        if($this->getId()> 0){
            $sqlQuery= 'UPDATE '.$tablename.'SET'.$setClause.' WHERE id ='.$this->getId();

        }else{
            $sqlQuery = 'INSERT INTO '.$tablename.' SET '.$setClause;
        }


        //persist on db

        try{
            self::$db=DB::singleton();

        }catch (\Exception $e){
            throw new \Exception(self::$db->errorInfo()[2]);

        }

    }

    /*
    * @param array $object
    * @return Entity
    */

    public static function morph(array $object):entity
    {
        $class= new \ReflectionClass(get_called_class());
        $entity =$class->newInstance();
        foreach ($class->getStaticProperties(\ReflectionProperty::IS_PRIVATE) as $prop){
            if(isset($object[$prop->getName()])){
                $prop->setValue($entity,$object[$prop->getName()]);
            }
        }
        $entity->initialize();//inicializar la entidad y retornarla
        return $entity;

    }

    public static function find( $options){
        $result=[];
        $query='';
        $whereClause='';
        $whereConditions=[];
        $tablename='';
        $class= new \ReflectionClass(get_called_class());

        if(self::$tableName != ''){
            $tablename= self::$tableName;

        }
        else{
            $tablename = strtolower($class->getShortName());
        }

        if(!empty($options)){
            foreach ($options as $key => $value){
                $whereConditions[]=$key.'="'.$value.'"';
            }
            $whereClause='WHERE '.implode(' AND ', $whereConditions);
            $query='SELECT * FROM '.$tablename.' '.$whereClause;
        }
        elseif (is_string($options)) {
             $query='WHERE'.$options;
        }
        else{
            throw new \Exception("Wrong parametro , vaya que esta mal (este mnsg esta en Entity)");
        }

        self::$db=DB::singleton();
        $raw=self::$db->query($query);
            foreach ($raw as $rawRow){
            $result[]=self::morph($rawRow);
            }
            return $result;
    }
}